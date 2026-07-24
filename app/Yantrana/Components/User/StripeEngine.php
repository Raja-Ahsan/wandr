<?php

namespace App\Yantrana\Components\User;

use App\Yantrana\Base\BaseEngine;
use Exception;
use Stripe\Stripe;

/**
 * This StripeEngine class for manage globally -
 * mail service in application.
 *---------------------------------------------------------------- */
class StripeEngine extends BaseEngine
{
    /**
     * @var  string $webhookSecret - stripe webhook secret
     */
    protected $webhookSecret;
    protected $initSetup;

    /**
     * Constructor.
     *
     *-----------------------------------------------------------------------*/
    public function __construct()
    {
        /**
         * Set up and return PayPal PHP SDK environment with PayPal access credentials.
         * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
         */
        if (getStoreSettings('use_test_stripe')) {
            $stripeSecretKey = getStoreSettings('stripe_testing_secret_key');
            $stripePublishKey = getStoreSettings('stripe_testing_publishable_key');
            $this->webhookSecret = getStoreSettings('stripe_testing_webhook_secret');
        } else {
            $stripeSecretKey = getStoreSettings('stripe_live_secret_key');
            $stripePublishKey = getStoreSettings('stripe_live_publishable_key');
            $this->webhookSecret = getStoreSettings('stripe_live_webhook_secret');
        }

        //set Stripe Api Secret Key in Stripe static method object
        $this->initSetup = Stripe::setApiKey($stripeSecretKey);
    }

    /**
     * @param  string  $packageData - packageUid
     * @param  string -$stripeToken - Stripe Token

     * request to Stripe checkout
     *---------------------------------------------------------------- */
    public function processStripeRequest($request)
    {
      
        $successUrl = route('user.credit_wallet.write.stripe.callback_url').'?session_id={CHECKOUT_SESSION_ID}'.'&packageUid='.$request['packageUid'].'&packageType='.urlencode($request['packageType'] ?? 'credit');
        $cancelUrl = route('user.credit_wallet.write.stripe.cancel_url').'?&packageUid='.$request['packageUid'].'&packageType='.urlencode($request['packageType'] ?? 'credit');

        try {
            $sessionPayload = [
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => $request['currency'],
                        'unit_amount' => $this->calculateStripeAmount($request['amount']),
                        'product_data' => [
                          'name' => $request['package_name'],
                          'description' => $request['package_name'] . ' @ ' . getStoreSettings('name'),
                          'images' => array_values(array_filter([
                            $request['packageImageUrl'] ?? null
                        ])),
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'metadata' => [
                    'packageUid' => $request['packageUid'],
                    'packageType' => $request['packageType'] ?? 'credit',
                    'userId' => $request['userId'],
                ],
                'mode' => 'payment',
                'success_url' => $successUrl,
                'cancel_url' => $cancelUrl,
            ];

            // $0 checkouts do not create a PaymentIntent; skip payment_intent_data for them.
            if ((float) $request['amount'] > 0) {
                $sessionPayload['payment_intent_data'] = [
                    'metadata' => [
                        'packageUid' => $request['packageUid'],
                        'packageType' => $request['packageType'] ?? 'credit',
                        'userId' => $request['userId'],
                    ],
                ];
            }

            $session = \Stripe\Checkout\Session::create($sessionPayload);

            //success response with session data
            return $this->engineReaction(1, $session);
        } catch (Exception $e) {
            //failure response with message
            return $this->engineReaction(2, [
                'errorMessage' => $e->getMessage(),
            ], __tr('Failed'));
        }
    }

    /**
     * This method use for retrieve stripe payment.
     *
     * @param  string  $sessionId
     *
     *---------------------------------------------------------------- */
    public function retrieveStripeData($sessionId)
    {
        try {
            //retrieve stripe session data
            $sessionData = \Stripe\Checkout\Session::retrieve($sessionId);

            //if session data is empty
            if (__isEmpty($sessionData)) {
                //failure response with message
                return $this->engineReaction(2, null, __tr('Session data does not exist.'));
            }

            $paymentIntentId = $sessionData->payment_intent ?? null;
            $sessionStatus = $sessionData->status ?? null;
            $paymentStatus = $sessionData->payment_status ?? null;

            // Free / $0 checkouts complete without a PaymentIntent.
            if (__isEmpty($paymentIntentId)) {
                if ($sessionStatus === 'complete' && in_array($paymentStatus, ['paid', 'no_payment_required'], true)) {
                    $metadata = [];
                    if (! empty($sessionData->metadata)) {
                        $metadata = json_decode(json_encode($sessionData->metadata), true) ?: [];
                    }
                    if (empty($metadata['userId'])) {
                        $metadata['userId'] = getUserId();
                    }
                    if (empty($metadata['packageUid']) && request()->filled('packageUid')) {
                        $metadata['packageUid'] = request('packageUid');
                    }

                    return $this->engineReaction(1, [
                        'paymentData' => [
                            'id' => $sessionData->id,
                            'amount' => (int) ($sessionData->amount_total ?? 0),
                            'status' => 'succeeded',
                            'currency' => $sessionData->currency ?? getStoreSettings('currency'),
                            'metadata' => $metadata,
                        ],
                    ], __tr('Success'));
                }

                return $this->engineReaction(2, [
                    'errorMessage' => __tr('Payment intent missing for this Stripe session.'),
                ], __tr('Failed Payment'));
            }

            //fetch payment intent data
            $paymentIntentData = \Stripe\PaymentIntent::retrieve($paymentIntentId);

            //Success response with message
            return $this->engineReaction(1, [
                'paymentData' => json_decode(json_encode($paymentIntentData), true),
            ], __tr('Success'));
        } catch (\Throwable $err) {
            //failure response with message
            return $this->engineReaction(2, [
                'errorMessage' => $err->getMessage(),
            ], __tr('Failed Payment'));
        }
    }

    /**
     * This method use for create stripe payment intent data.
     *
     * @param  string  $sessionId
     *
     *---------------------------------------------------------------- */
    public function createPaymentIntent($requestData, $paymentMethodId)
    {
        try {
            // Create new PaymentIntent with a PaymentMethod ID from the client.
            $intent = \Stripe\PaymentIntent::create([
                'amount' => $this->calculateStripeAmount($requestData['price']),
                'currency' => getStoreSettings('currency'),
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,
                // If a mobile client passes `useStripeSdk`, set `use_stripe_sdk=true`
                // to take advantage of new authentication features in mobile SDKs
                'use_stripe_sdk' => true,
                'description' => 'Package Name - '.$requestData['title'],
            ]);

            //success response
            return $this->generateStripeApiResponse($intent);
        } catch (Exception $e) {
            //failure response with message
            return $this->engineReaction(2, [
                'errorMessage' => 'Failed',
            ], $e->getMessage());
        }
    }

    /**
     * This method use for create stripe payment intent data.
     *
     * @param  string  $sessionId
     *
     *---------------------------------------------------------------- */
    public function retrievePaymentIntent($requestData, $paymentIntentId)
    {
        try {
            //retrieve payment intent data
            $intent = \Stripe\PaymentIntent::retrieve($paymentIntentId);
            $intent->confirm();

            //success response
            return $this->generateStripeApiResponse($intent);
        } catch (Exception $e) {
            //failure response with message
            return $this->engineReaction(2, [
                'errorMessage' => 'Failed',
            ], $e->getMessage());
        }
    }

    /**
     * Calculate Stripe Amount
     *
     * @param  number  $amount - Stripe Amount
     *
     * request to Stripe checkout
     *---------------------------------------------------------------- */
    protected function generateStripeApiResponse($intent)
    {
        //on switch case get data
        switch ($intent->status) {
            case 'requires_action':
            case 'requires_source_action':
                // Card requires authentication
                return $this->engineReaction(1, [
                    'requiresAction' => true,
                    'paymentIntentId' => $intent->id,
                    'clientSecret' => $intent->client_secret,
                ]);

            case 'requires_payment_method':
            case 'requires_source':
                // Card was not properly authenticated, suggest a new payment method
                return $this->engineReaction(2, [
                    'error' => 'Failed',
                ], __tr('Your card was denied, please provide a new payment method'));

            case 'succeeded':
                // Payment is complete, authentication not required
                // To cancel the payment after capture you will need to issue a Refund (https://stripe.com/docs/api/refunds)
                //success response with session data
                return $this->engineReaction(1, ['clientSecret' => $intent->client_secret]);
        }
    }

    /**
     * Calculate Stripe Amount
     *
     * @param  int|float  $amount - Stripe Amount
     *
     * request to Stripe checkout
     *---------------------------------------------------------------- */
    protected function calculateStripeAmount($amount)
    {
        return $amount * 100;
    }


    /**
     * Payment Webhook
     *
     * @return  json object
     */
    public function paymentWebhook()
    {
      $this->initSetup;
      // Set your secret key. Remember to switch to your live secret key in production.
      // See your keys here: https://dashboard.stripe.com/apikeys
      // If you are testing your webhook locally with the Stripe CLI you
      // can find the endpoint's secret by running `stripe listen`
      // Otherwise, find your endpoint's secret in your webhook settings in the Developer Dashboard

      // test
      $payload = @file_get_contents('php://input');
      $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

      $event = null;
      try {
        $event = \Stripe\Webhook::constructEvent(
          $payload,
          $sig_header,
          $this->webhookSecret
        );
      } catch (\UnexpectedValueException $e) {
        __logDebug('invalid payload', $e->getMessage());
        // Invalid payload
        http_response_code(400);
        exit();
      } catch (\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        echo 'invalid signature';
        http_response_code(200);
        exit();
      }
      $paymentIntent = null;
      // Handle the event
      switch ($event->type) {
          case 'payment_intent.succeeded':
            $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
            break;
        default:
          echo 'Received unknown event type ' . $event->type;
      }
      http_response_code(200);
      return $this->engineReaction(1, ['paymentIntent' => $paymentIntent]);
    }
}
