<?php
/**
* CreditWalletEngine.php - Main component file
*
* This file is part of the Credit Wallet User component.
*-----------------------------------------------------------------------------*/

namespace App\Yantrana\Components\User;

use Auth;
use Carbon\Carbon;
use Razorpay\Api\Api;
use Illuminate\Support\Arr;
use App\Yantrana\Base\BaseEngine;
use Imdhemy\Purchases\Facades\Product as InAppProduct;
use App\Yantrana\Components\User\Models\loginLogsModel;
use App\Yantrana\Components\User\Repositories\UserRepository;
use App\Yantrana\Components\User\Models\CreditWalletTransaction;
use App\Yantrana\Components\User\Repositories\LoginLogsRepository;
use App\Yantrana\Components\User\Repositories\ManageUserRepository;
use App\Yantrana\Components\User\Repositories\CreditWalletRepository;
use Imdhemy\GooglePlay\Products\ProductPurchase as InAppProductPrice;
use App\Yantrana\Components\Configuration\Repositories\ConfigurationRepository;
use App\Yantrana\Components\CreditPackage\Repositories\CreditPackageRepository;
use App\Yantrana\Components\FinancialTransaction\Repositories\FinancialTransactionRepository;
use App\Yantrana\Components\SuperLikePackage\Repositories\SuperLikePackageRepository;
use PushBroadcast;

class CreditWalletEngine extends BaseEngine
{
    /**
     * @var  CreditWalletRepository - CreditWallet Repository
     */
    protected $creditWalletRepository;

    /**
     * @var ManageUserRepository - Manage User Repository
     */
    protected $manageUserRepository;

    /**
     * @var  ConfigurationRepository - Configuration Repository
     */
    protected $configurationRepository;

    /**
     * @var PaypalEngine - Paypal Engine
     */
    protected $paypalEngine;

    /**
     * @var StripeEngine - Stripe Engine
     */
    protected $stripeEngine;

    /**
     * @var  CreditPackageRepository - CreditPackage Repository
     */
    protected $creditPackageRepository;

    /**
     * @var SuperLikePackageRepository
     */
    protected $superLikePackageRepository;

    /**
     * @var RazorpayEngine - Razorpay Engine
     */
    protected $razorpayEngine;

    /**
     * @var coinGateEngine - coinGate Engine
     */
    protected $coinGateEngine;

    /**
     * @var razorpayAPI - razorpayAPI
     */
    protected $razorpayAPI;

    /**
     * @var UserRepository - User Repository
     */
    protected $userRepository;

    /**
     * @var LoginLogsRepository - loginLogs Repository
     */
    protected $loginLogsRepository;
     /**
     * @var CryptoEngine - CryptoEngine Engine
     */
    protected $cryptoEngine;
     /**
     * @var PaystackEngine - CryptoEngine Engine
     */
    protected $paystackEngine;
    /**
     *
     * @var financialTransactionRepository - financialTransactionRepository
     */
    protected $financialTransactionRepository;

    /**
     * Constructor
     *
     * @param  CreditWalletRepository  $creditWalletRepository - CreditWallet Repository
     * @param  ManageUserRepository  $manageUserRepository - Manage User Repository
     * @param  ConfigurationRepository  $configurationRepository - Configuration 
     * Repository
      * @param FinancialTransactionRepository - financialTransactionRepository

     * @param  PaypalEngine  $paypalEngine- Paypal Engine
     * @param  StripeEngine  $stripeEngine- Stripe Engine
     * @param  CryptoEngine  $cryptoEngine- CryptoEngine Engine
     * @param  PaystackEngine  $paystackEngine- PaystackEngine Engine
     * @param  CreditPackageRepository  $creditPackageRepository - CreditPackage Repository
     * @param  RazorpayEngine  $razorpayEngine - Razorpay Repository
     * @param  CoinGateEngine  $coinGateEngine - coinGate Engine
     * @param  UserRepository  $userRepository - user Repository
     * @param  LoginLogsRepository  $loginLogsRepository - loginLogs Repository
     * @return  void
     *-----------------------------------------------------------------------*/
    public function  __construct(
        CreditWalletRepository $creditWalletRepository,
        ManageUserRepository $manageUserRepository,
        ConfigurationRepository $configurationRepository,
        PaypalEngine $paypalEngine,
        StripeEngine $stripeEngine,
        CryptoEngine $cryptoEngine,
        PaystackEngine $paystackEngine,
        CreditPackageRepository $creditPackageRepository,
        SuperLikePackageRepository $superLikePackageRepository,
        RazorpayEngine $razorpayEngine,
        CoinGateEngine $coinGateEngine,
        UserRepository $userRepository,
        LoginLogsRepository $loginLogsRepository,
        FinancialTransactionRepository $financialTransactionRepository,
    ) {
        $this->creditWalletRepository = $creditWalletRepository;
        $this->financialTransactionRepository = $financialTransactionRepository;
        $this->manageUserRepository = $manageUserRepository;
        $this->configurationRepository = $configurationRepository;
        $this->paypalEngine = $paypalEngine;
        $this->stripeEngine = $stripeEngine;
        $this->cryptoEngine = $cryptoEngine;
        $this->paystackEngine = $paystackEngine;
        $this->creditPackageRepository = $creditPackageRepository;
        $this->superLikePackageRepository = $superLikePackageRepository;
        $this->razorpayEngine = $razorpayEngine;
        $this->coinGateEngine = $coinGateEngine;
        $this->userRepository = $userRepository;
        $this->loginLogsRepository = $loginLogsRepository;
    }
    public function initSetup()
    {
        if (getStoreSettings('use_test_razorpay')) {
            $razorpayKey = getStoreSettings('razorpay_testing_key');
            $razorpaySecret = getStoreSettings('razorpay_testing_secret_key');
        } else {
            $razorpayKey = getStoreSettings('razorpay_live_key');
            $razorpaySecret = getStoreSettings('razorpay_live_secret_key');
        }
        $this->razorpayAPI = new Api($razorpayKey, $razorpaySecret);
    }

    /**
     * Prepare Credit Wallet User Data.
     *
     *
     *---------------------------------------------------------------- */
    public function prepareCreditWalletUserData()
    {
        //get credit package data
        $packageCollection = $this->creditPackageRepository->fetchAllActiveCreditPackage();

        $creditPackages = [];
        $userId = getUserID();
        // check if user collection exists
        if (! __isEmpty($packageCollection)) {
            foreach ($packageCollection as $key => $package) {
                // Industry rule: hide free packages already claimed by this user.
                if ((float) $package['price'] <= 0
                    && $this->creditWalletRepository->hasUserClaimedFreePackage($userId, $package['_uid'])) {
                    continue;
                }

                $packageImageUrl = '';
                $packageImageFolderPath = getPathByKey('package_image', ['{_uid}' => $package->_uid]);
                $packageImageUrl = getMediaUrl($packageImageFolderPath, $package['image']);
                $creditPackages[] = [
                    '_id' => $package['_id'],
                    '_uid' => $package['_uid'],
                    'package_uid' => toggleProductId($package['_uid']),
                    'package_name' => $package['title'],
                    'package_type' => 'credit',
                    'credit' => $package['credits'],
                    'price' => round((float) $package['price'], 2),
                    'packageImageUrl' => $packageImageUrl,
                ];
            }
        }

        $superLikePackages = [];
        if ((int) getStoreSettings('enable_super_like') === 1) {
            $superLikeCollection = $this->superLikePackageRepository->fetchAllActivePackages();
            if (! __isEmpty($superLikeCollection)) {
                foreach ($superLikeCollection as $package) {
                    $superLikePackages[] = [
                        '_id' => $package->_id,
                        '_uid' => $package->_uid,
                        'package_name' => $package->title,
                        'package_type' => 'super_like',
                        'description' => $package->description,
                        'total_likes' => (int) $package->total_likes,
                        'price' => round((float) $package->price, 2),
                    ];
                }
            }
        }

        return $this->engineReaction(1, [
            'creditWalletData' => [
                'creditPackages' => $creditPackages,
                'superLikePackages' => $superLikePackages,
            ],
            'superLikeBalance' => $this->superLikePackageRepository->getUserBalance($userId),
            'paymentData' => [
                'currencySymbol' => getStoreSettings('currency_symbol'),
                'currency' => getStoreSettings('currency'),
                'enablePaypalCheckout' => getStoreSettings('enable_paypal'),
                'useTestPaypalCheckout' => getStoreSettings('use_test_paypal_checkout'),
                'paypalTestingClientId' => getStoreSettings('paypal_checkout_testing_client_id'),
                'paypalLiveClientId' => getStoreSettings('paypal_checkout_live_client_id'),
                'userName' => getUserAuthInfo('profile.full_name'),
                'userEmail' => getUserAuthInfo('profile.email'),
                'enableRazorpay' => getStoreSettings('enable_razorpay'),
                'useTestRazorpay' => getStoreSettings('use_test_razorpay'),
                'razorpayTestKey' => getStoreSettings('razorpay_testing_key'),
                'razorpayLiveKey' => getStoreSettings('razorpay_live_key'),
                'enableStripe' => getStoreSettings('enable_stripe'),
                'useTestStripe' => getStoreSettings('use_test_stripe'),
                'stripeTestPublishableKey' => getStoreSettings('stripe_testing_publishable_key'),
                'stripeLivePublishableKey' => getStoreSettings('stripe_live_publishable_key'),
            ],
        ]);
    }

    /**
     * Resolve credit or Super Like package for checkout.
     *
     * @param  string  $packageUid
     * @param  string|null  $packageType
     * @return array|null
     */
    public function resolvePurchasablePackage($packageUid, $packageType = null)
    {
        $packageType = $packageType ?: request()->input('package_type');

        if ($packageType === 'super_like') {
            $package = $this->superLikePackageRepository->fetch($packageUid);
            if (__isEmpty($package) || (int) $package->status !== 1) {
                return null;
            }

            return [
                'type' => 'super_like',
                'uid' => $package->_uid,
                'id' => $package->_id,
                'title' => $package->title,
                'price' => (float) $package->price,
                'total_likes' => (int) $package->total_likes,
                'credits' => 0,
                'image' => null,
                'model' => $package,
            ];
        }

        $package = $this->creditPackageRepository->fetch($packageUid);
        if (! __isEmpty($package)) {
            return [
                'type' => 'credit',
                'uid' => $package->_uid,
                'id' => $package->_id,
                'title' => $package->title,
                'price' => (float) $package->price,
                'total_likes' => 0,
                'credits' => (int) $package->credits,
                'image' => $package->image,
                'model' => $package,
            ];
        }

        // Fallback: try Super Like when type omitted (payment callbacks)
        $package = $this->superLikePackageRepository->fetch($packageUid);
        if (! __isEmpty($package) && (int) $package->status === 1) {
            return [
                'type' => 'super_like',
                'uid' => $package->_uid,
                'id' => $package->_id,
                'title' => $package->title,
                'price' => (float) $package->price,
                'total_likes' => (int) $package->total_likes,
                'credits' => 0,
                'image' => null,
                'model' => $package,
            ];
        }

        return null;
    }

    /**
     * After successful payment, grant credits or Super Likes.
     *
     * @param  int  $userId
     * @param  int  $financialTxnId
     * @param  array  $resolvedPackage
     * @return bool
     */
    public function fulfillPurchasedPackage($userId, $financialTxnId, $resolvedPackage)
    {
        if ($resolvedPackage['type'] === 'super_like') {
            return (bool) $this->superLikePackageRepository->storeWalletTransaction([
                'status' => 1,
                'users__id' => $userId,
                'quantity' => (int) $resolvedPackage['total_likes'],
                'super_like_packages__id' => $resolvedPackage['id'],
                'credit_wallet_transactions__id' => null,
                'description' => 'purchase_paid:' . $resolvedPackage['uid'] . ':ft:' . $financialTxnId,
            ]);
        }

        return (bool) $this->creditWalletRepository->storeCredits([
            'userId' => $userId,
            'credits' => (int) $resolvedPackage['credits'],
            'txnId' => $financialTxnId,
        ]);
    }

    /**
     * Prepare Credit wallet Information
     *
     * @return void
     */
    public function prepareCreditWalletInfo()
    {
        return $this->engineReaction(1, [
            'creditBalance' => totalUserCredits()
        ]);
    }

    /**
     * get user transaction list data.
     *
     *
     * @return object
     *---------------------------------------------------------------- */
    public function prepareUserWalletTransactionList()
    {
        $transactionCollection = $this->creditWalletRepository->fetchUserWalletTransactionList();

        $requireColumns = [
            '_id',
            '_uid',
            'created_at' => function ($key) {
                return formatDate($key['created_at']);
            },
            'credits',
            'credit_type',
            'transactionType' => function ($key) {
                $type = null;
                if (! __isEmpty($key['get_user_financial_transaction'])) {
                    $type = 1;
                } elseif (! __isEmpty($key['get_user_gift_transaction'])) {
                    $type = 2;
                } elseif (! __isEmpty($key['get_user_sticker_transaction'])) {
                    $type = 3;
                } elseif (! __isEmpty($key['get_user_boost_transaction'])) {
                    $type = 4;
                } elseif (! __isEmpty($key['get_user_subscription_transaction'])) {
                    $type = 5;
                } elseif ($key['credit_type'] == 1) {
                    $type = 6;
                }

                return $type;
            },
            'formattedTransactionType' => function ($key) {
                $type = null;
                if (! __isEmpty($key['get_user_financial_transaction'])) {
                    $type = 1;
                } elseif (! __isEmpty($key['get_user_gift_transaction'])) {
                    $type = 2;
                } elseif (! __isEmpty($key['get_user_sticker_transaction'])) {
                    $type = 3;
                } elseif (! __isEmpty($key['get_user_boost_transaction'])) {
                    $type = 4;
                } elseif (! __isEmpty($key['get_user_subscription_transaction'])) {
                    $type = 5;
                } elseif ($key['credit_type'] == 1) {
                    $type = 6;
                }

                return isset($type) ? configItem('user_transaction_type', $type) : null;
            },
            'financialTransactionDetail' => function ($key) {
                $financialTransaction = [];
                if (! __isEmpty($key['get_user_financial_transaction'])) {
                    $transactionData = $key['get_user_financial_transaction'];
                    $financialTransaction = [
                        '_id' => $transactionData['_id'],
                        '_uid' => $transactionData['_uid'],
                        'status' => configItem('payments.status_codes', $transactionData['status']),
                        'amount' => priceFormat($transactionData['amount'], true, false),
                        'created_at' => formatDate($transactionData['created_at']),
                        'currency_code' => $transactionData['currency_code'],
                        'payment_mode' => configItem('payments.payment_checkout_modes', $transactionData['is_test']),
                        'method' => $transactionData['method'],
                    ];
                }

                return $financialTransaction;
            },
        ];

        return $this->dataTableResponse($transactionCollection, $requireColumns);
    }

    /**
     * get api user transaction list data.
     *
     *
     * @return object
     *---------------------------------------------------------------- */
    public function apiCreditWalletTransactionList()
    {
        $transactionCollection = $this->creditWalletRepository->fetchApiUserWalletTransactionList();

        $requireColumns = [
            '_id',
            '_uid',
            'created_at' => function ($key) {
                return formatDate($key['created_at']);
            },
            'credits',
            'credit_type',
            'transactionType' => function ($key) {
                $type = null;
                if (! __isEmpty($key['get_user_financial_transaction'])) {
                    $type = 1;
                } elseif (! __isEmpty($key['get_user_gift_transaction'])) {
                    $type = 2;
                } elseif (! __isEmpty($key['get_user_sticker_transaction'])) {
                    $type = 3;
                } elseif (! __isEmpty($key['get_user_boost_transaction'])) {
                    $type = 4;
                } elseif (! __isEmpty($key['get_user_subscription_transaction'])) {
                    $type = 5;
                } elseif ($key['credit_type'] == 1) {
                    $type = 6;
                }

                return $type;
            },
            'formattedTransactionType' => function ($key) {
                $type = null;
                if (! __isEmpty($key['get_user_financial_transaction'])) {
                    $type = 1;
                } elseif (! __isEmpty($key['get_user_gift_transaction'])) {
                    $type = 2;
                } elseif (! __isEmpty($key['get_user_sticker_transaction'])) {
                    $type = 3;
                } elseif (! __isEmpty($key['get_user_boost_transaction'])) {
                    $type = 4;
                } elseif (! __isEmpty($key['get_user_subscription_transaction'])) {
                    $type = 5;
                } elseif ($key['credit_type'] == 1) {
                    $type = 6;
                }

                return isset($type) ? configItem('user_transaction_type', $type) : null;
            },
            'financialTransactionDetail' => function ($key) {
                $financialTransaction = [];
                if (! __isEmpty($key['get_user_financial_transaction'])) {
                    $transactionData = $key['get_user_financial_transaction'];
                    $financialTransaction = [
                        '_id' => $transactionData['_id'],
                        '_uid' => $transactionData['_uid'],
                        'status' => configItem('payments.status_codes', $transactionData['status']),
                        'amount' => priceFormat($transactionData['amount'], true, false),
                        'created_at' => formatDate($transactionData['created_at']),
                        'currency_code' => $transactionData['currency_code'],
                        'payment_mode' => configItem('payments.payment_checkout_modes', $transactionData['is_test']),
                        'method' => $transactionData['method'],
                    ];
                }

                return $financialTransaction;
            },
        ];

        return $this->customTableResponse($transactionCollection, $requireColumns);
    }

    /**
     * Process paypal complete transaction.
     *
     * @param  array  $inputData
     *---------------------------------------------------------------- */
    public function processPaypalTransaction($inputData, $packageUid)
    {
        if ($this->creditWalletRepository->isAlreadyProcessed($inputData['id'])) {
            return $this->engineReaction(2, null,  __tr('Already been processed'));
        }
        // process card charge
        $paypalPaymentDetail = $this->paypalEngine->getOrder($inputData['id']);

        //check reaction code is 1 or not
        if ($paypalPaymentDetail['reaction_code'] == 1) {
            $paypalResponse = $paypalPaymentDetail['data']['transactionResponse'];

            //check transaction status is completed or not
            if ($paypalResponse['status'] == 'COMPLETED') {
                //store transaction data
                if ($this->storePaymentData($paypalResponse, $packageUid, 'paypalPayment')) {
                    return $this->engineReaction(1, null,  __tr('Payment Complete'));
                }
            } else {
                //payment failed response
                return $this->engineReaction(2, null,  __tr('Payment Failed'));
            }
        } else {
            //error response
            return $this->engineReaction(2, [
                'errorMessage' => 'Something went wrong, please contact system administrator',
            ],  __tr('Payment Failed'));
        }
    }

    /**
     * Process paypal complete transaction.
     *
     * @param  array  $inputData
     *---------------------------------------------------------------- */
    public function processPaypalApiTransaction($inputData, $packageUid)
    {
        // process card charge
        $paypalPaymentData = $this->paypalEngine->ApiCapturePaypalTransaction($inputData['id']);

        //check reaction code is 1 or not
        if ($paypalPaymentData['reaction_code'] == 1) {
            $paymentStatus = array_get($paypalPaymentData, 'data.transactionDetail.payer.status');
            $state = $paypalPaymentData['data']['transactionDetail']['state'];
            $paypalResponse = $paypalPaymentData['data']['transactionDetail'];

            if($this->creditWalletRepository->isAlreadyProcessed($paypalResponse['id'])) {
                return $this->engineReaction(2, null, __tr('Already been processed'));
            }

            //check transaction status is completed or not
            if ($paymentStatus == 'VERIFIED' and $state == 'approved') {
                //store transaction data
                if ($this->storePaymentData($paypalResponse, $packageUid, 'apiPaypalPayment')) {
                    return $this->engineReaction(1, null,  __tr('Payment Complete'));
                }
            } else {
                //payment failed response
                return $this->engineReaction(2, null,  __tr('Payment Failed'));
            }
        } else {
            //error response
            return $this->engineReaction(2, [
                'errorMessage' => 'Something went wrong, please contact system administrator',
            ],  __tr('Payment Failed'));
        }
    }

    /**
     * Process Payment request
     *
     * @param  array  $inputData
     *---------------------------------------------------------------- */
    public function processPayment($inputData)
    {
        $paymentMethod = $inputData['select_payment_method'];
        $packageUid = $inputData['select_package'];
        $packageType = isset($inputData['package_type']) ? $inputData['package_type'] : null;

        $resolvedPackage = $this->resolvePurchasablePackage($packageUid, $packageType);

        //if it is empty then throw error
        if (__isEmpty($resolvedPackage)) {
            //success function
            return $this->engineReaction(2, null,  __tr('Package does not exist.'));
        }

        // Block repeat claims for free credit packages across all payment methods.
        if ($resolvedPackage['type'] === 'credit'
            && (float) $resolvedPackage['price'] <= 0
            && $this->creditWalletRepository->hasUserClaimedFreePackage(getUserId(), $packageUid)) {
            return $this->engineReaction(2, [
                'errorMessage' => __tr('You have already claimed this free package. Please choose a paid package.'),
            ], __tr('Already claimed'));
        }

        //check payment method and package data exists
        if ($paymentMethod == 'stripe') {
            // Free packages do not need Stripe Checkout ($0 has no PaymentIntent).
            if ((float) $resolvedPackage['price'] <= 0) {
                if ($resolvedPackage['type'] !== 'credit') {
                    return $this->engineReaction(2, [
                        'errorMessage' => __tr('Free Super Like packages are not allowed. Please set a price.'),
                    ], __tr('Invalid package'));
                }

                $userId = getUserId();

                if ($this->creditWalletRepository->hasUserClaimedFreePackage($userId, $packageUid)) {
                    return $this->engineReaction(2, [
                        'errorMessage' => __tr('You have already claimed this free package. Please choose a paid package.'),
                    ], __tr('Already claimed'));
                }

                $freePaymentData = [
                    'id' => $this->creditWalletRepository->getFreePackageTxnId($userId, $packageUid),
                    'amount' => 0,
                    'status' => 'succeeded',
                    'metadata' => [
                        'userId' => $userId,
                        'packageUid' => $packageUid,
                        'packageType' => $resolvedPackage['type'],
                    ],
                ];

                if ($this->creditWalletRepository->isAlreadyProcessed($freePaymentData['id'])) {
                    return $this->engineReaction(2, [
                        'errorMessage' => __tr('You have already claimed this free package. Please choose a paid package.'),
                    ], __tr('Already claimed'));
                }

                $storeResult = $this->storeStripePaymentData($freePaymentData, $packageUid, $resolvedPackage['type']);
                if ($storeResult['reaction_code'] == 1) {
                    return $this->engineReaction(1, [
                        'freePackageGranted' => true,
                    ], __tr('Credits added successfully'));
                }

                return $this->engineReaction(2, [
                    'errorMessage' => $storeResult['message'] ?? __tr('Unable to add free package credits.'),
                ], __tr('Failed'));
            }

            $packageImageUrl = '';
            if ($resolvedPackage['type'] === 'credit' && !__isEmpty($resolvedPackage['image'])) {
                $packageImageFolderPath = getPathByKey('package_image', ['{_uid}' => $resolvedPackage['uid']]);
                $packageImageUrl = getMediaUrl($packageImageFolderPath, $resolvedPackage['image']);
            }

            $stripeRequestData = [
                'packageUid' => $packageUid,
                'packageType' => $resolvedPackage['type'],
                'package_name' => $resolvedPackage['title'],
                'amount' => $resolvedPackage['price'],
                'currency' => getStoreSettings('currency'),
                'packageImageUrl' => $packageImageUrl,
                'userId'=> getUserId(),
            ];
            //check is mobile app request
            if (isMobileAppRequest()) {
                $stripeRequestData['redirectAppUrl'] = base64_encode($inputData['redirectAppUrl']);
            }

            //get stripe session ata
            $stripeSessionData = $this->stripeEngine->processStripeRequest($stripeRequestData);

            //if reaction code is 1 then success response
            if ($stripeSessionData['reaction_code'] == 1) {
                return $this->engineReaction(1, [
                    'stripeSessionData' => $stripeSessionData['data'],
                ],  __tr('Success'));
            } else {
                //stripe failure response
                return $this->engineReaction(2, [
                    'errorMessage' => $stripeSessionData['data']['errorMessage'],
                ],  __tr('Failed'));
            }
        }

        //failure response
        return $this->engineReaction(2, null,  __tr('Something went wrong, please contact to system administrator'));
    }

    /**
     * Process retrieve stripe payment data
     *
     * @param  array  $inputData
     *---------------------------------------------------------------- */
    public function prepareStripeRetrieveData($inputData)
    {
        //get stripe payment ata
        $stripePaymentData = $this->stripeEngine->retrieveStripeData($inputData['session_id']);
        //check reaction code is 1
        if ($stripePaymentData['reaction_code'] == 1) {
            $stripeData = $stripePaymentData['data']['paymentData'];

            if (empty($stripeData['metadata']['userId'])) {
                $stripeData['metadata']['userId'] = getUserId();
            }
            if (empty($stripeData['metadata']['packageUid']) && ! empty($inputData['packageUid'])) {
                $stripeData['metadata']['packageUid'] = $inputData['packageUid'];
            }

            // Paid intents must succeed; free / no_payment_required sessions use synthetic succeeded status.
            if (! empty($stripeData['status']) && $stripeData['status'] !== 'succeeded') {
                return $this->engineReaction(2, null,  __tr('Payment Failed'));
            }

            if ($this->creditWalletRepository->isAlreadyProcessed($stripeData['id'])) {
                return $this->engineReaction(1, null,  __tr('Already been processed'));
            }

            //store transaction data
            $storeResult = $this->storeStripePaymentData($stripeData, $inputData['packageUid'], $inputData['packageType'] ?? ($stripeData['metadata']['packageType'] ?? null));
            if ($storeResult['reaction_code'] == 1) {
                return $this->engineReaction(1, null,  __tr('Payment Complete'));
            } else {
                //payment failed response
                return $this->engineReaction(2, null,  __tr('Payment Failed'));
            }
        }
        //failure response
        return $this->engineReaction(2, null,  __tr('Payment failed.'));
    }

    /**
     * Process paypal complete transaction.
     *
     * @param  array  $inputData
     *---------------------------------------------------------------- */
    public function storeStripePaymentData($inputData, $packageUid, $packageType = null)
    {
        $resolvedPackage = $this->resolvePurchasablePackage(
            $packageUid,
            $packageType ?: array_get($inputData, 'metadata.packageType')
        );
        //if it is empty then throw error
        if (__isEmpty($resolvedPackage)) {
            //success function
            return $this->engineReaction(2, null,  __tr('Package does not exist.'));
        }

        $userId = array_get($inputData, 'metadata.userId', getUserId());
        $txnId = array_get($inputData, 'id');

        if ($resolvedPackage['type'] === 'credit' && (float) $resolvedPackage['price'] <= 0) {
            $txnId = $this->creditWalletRepository->getFreePackageTxnId($userId, $packageUid);

            if ($this->creditWalletRepository->hasUserClaimedFreePackage($userId, $packageUid)
                || $this->creditWalletRepository->isAlreadyProcessed($txnId)) {
                return $this->engineReaction(2, null, __tr('You have already claimed this free package.'));
            }
        }

        if (! __isEmpty($inputData)) {
            $isStripeTestMode = 1;
            if (!getStoreSettings('use_test_stripe')) {
                $isStripeTestMode = 2;
            }

            // Stripe amount is in cents for paid intents; free packages send amount 0
            $amount = isset($inputData['amount']) ? ((float) $inputData['amount'] / 100) : $resolvedPackage['price'];
            if ((float) $resolvedPackage['price'] <= 0) {
                $amount = 0;
            }

            //collect store data
            $storeData = [
                'status' => 2,
                'amount' => $amount,
                'users__id' => $userId,
                'method' => configItem('payments.payment_methods', 2),
                'currency_code' => getStoreSettings('currency'),
                'is_test' => $isStripeTestMode,
                'txn_id' => $txnId,
                '__data' => [
                    'rawPaymentData' => json_encode($inputData),
                    'packageName' => $resolvedPackage['title'],
                    'packageUid' => $packageUid,
                    'packageType' => $resolvedPackage['type'],
                ],
            ];

            if ($resolvedPackage['type'] === 'super_like') {
                $financialTxnId = $this->creditWalletRepository->storeFinancialTransactionOnly($storeData);
                if ($financialTxnId && $this->fulfillPurchasedPackage($userId, $financialTxnId, $resolvedPackage)) {
                    return $this->engineReaction(1, null, __tr('Purchase successfully'));
                }
            } elseif ($this->creditWalletRepository->storeTransaction($storeData, $resolvedPackage['model'])) {
                return $this->engineReaction(1, null,  __tr('Purchase successfully'));
            }
        }
       
        //error response
        return $this->engineReaction(2, null,  __tr('Purchased failed'));
    }

    /**
     * Process paypal complete transaction.
     *
     * @param  array  $inputData
     *---------------------------------------------------------------- */
    public function processRazorpayCheckout($inputData)
    {
        // process card charge
        $razorpayChargeRequest = $this->razorpayEngine->capturePayment($inputData['razorpayPaymentId']);

        //check reaction code is 1 or not
        if ($razorpayChargeRequest['reaction_code'] == 1) {
            $razorpayResponse = $razorpayChargeRequest['data']['transactionDetail'];

            if ($this->creditWalletRepository->isAlreadyProcessed($razorpayResponse['id'])) {
                return $this->engineReaction(2, null,  __tr('Already been processed'));
            }

            //check transaction status is completed or not
            if ($razorpayResponse['captured'] === true) {
                //store transaction data
                if ($this->storePaymentData($razorpayResponse, $inputData['packageUid'], 'razorpayPayment', null, $inputData['packageType'] ?? ($inputData['package_type'] ?? null))) {
                    return $this->engineReaction(1, null,  __tr('Payment Complete'));
                }
            } else {
                //payment failed response
                return $this->engineReaction(2, null,  __tr('Payment Failed'));
            }
        } else {
            //error response
            return $this->engineReaction(2, [
                'errorMessage' => 'Something went wrong, please contact system administrator',
            ],  __tr('Payment Failed'));
        }
    }

    /**
     * Process paypal complete transaction.
     *
     * @param  array  $inputData
     *---------------------------------------------------------------- */
    public function storePaymentData($inputData, $packageUid, $paymentMethod, $userId = null, $packageType = null)
    {
        $resolvedPackage = $this->resolvePurchasablePackage($packageUid, $packageType);

        //if it is empty then throw error
        if (__isEmpty($resolvedPackage)) {
            //success function
            return $this->engineReaction(2, null,  __tr('Package does not exist.'));
        }

        // check if user collection exists
        if (! __isEmpty($inputData)) {
            $isTestMode = 1;
            $amount = $resolvedPackage['price'];
            $currency = getStoreSettings('currency');
            $paymentType = null;
            //collect paypal payment data
            if ($paymentMethod == 'paypalPayment') {
                $paymentType = configItem('payments.payment_methods', 1);
                //check is live mode
                if (!getStoreSettings('use_test_paypal_checkout')) {
                    $isTestMode = 2;
                }

                //collect razorpay payment data
            } elseif ($paymentMethod == 'razorpayPayment') {
                $paymentType = configItem('payments.payment_methods', 3);
                //check is live mode
                if (!getStoreSettings('use_test_razorpay')) {
                    $isTestMode = 2;
                }
            } elseif ($paymentMethod == 'apiPaypalPayment') {
                $paymentType = configItem('payments.payment_methods', 4);
                //check is live mode
                if (!getStoreSettings('use_test_paypal_checkout')) {
                    $isTestMode = 2;
                }
            }
            if($userId == null){
                $userId = getUserID();
            }
            //collect store data
            $storeData = [
                'status' => 2, //completed
                'amount' => $amount,
                'users__id' => $userId,
                'method' => $paymentType,
                'currency_code' => $currency,
                'is_test' => $isTestMode,
                'txn_id' => array_get($inputData, 'id'),
                '__data' => [
                    'rawPaymentData' => json_encode($inputData),
                    'packageName' => $resolvedPackage['title'],
                    'packageUid' => $packageUid,
                    'packageType' => $resolvedPackage['type'],
                ],
            ];

            if ($resolvedPackage['type'] === 'super_like') {
                $financialTxnId = $this->creditWalletRepository->storeFinancialTransactionOnly($storeData);
                if ($financialTxnId && $this->fulfillPurchasedPackage($userId, $financialTxnId, $resolvedPackage)) {
                    return $this->engineReaction(1, null, __tr('Purchase successfully'));
                }
            } elseif ($financialTransactionId = $this->creditWalletRepository->storeTransaction($storeData, $resolvedPackage['model'], $userId)) {
                //fetch updated user total credits by helper function
                totalUserCredits();
                //success function
                return $this->engineReaction(1, null,  __tr('Purchase successfully'));
            }
        }

        return $this->engineReaction(2, null,  __tr('Purchased failed'));
    }

    /**
     * Prepare Credit Wallet Stripe Intent User Data.
     *
     *
     *---------------------------------------------------------------- */
    public function processCreateStripePaymentIntent($inputData)
    {
        //get package collection
        $packageCollection = $this->creditPackageRepository->fetch($inputData['packageUid']);

        //if it is empty then throw error
        if ( __isEmpty($packageCollection)) {
            //success function
            return $this->engineReaction(2, null,  __tr('Package does not exist.'));
        }

        //get stripe payment intent data
        $stripePaymentIntentData = $this->stripeEngine->createPaymentIntent($packageCollection, $inputData['paymentMethodId']);

        if ($stripePaymentIntentData['reaction_code'] == 1) {
            return $this->engineReaction(1, $stripePaymentIntentData);
        }

        return $this->engineReaction(2, $stripePaymentIntentData);
    }

    /**
     * Prepare Credit Wallet Stripe Intent User Data.
     *
     *
     *---------------------------------------------------------------- */
    public function retrieveStripePaymentIntent($inputData)
    {
        //get package collection
        $packageCollection = $this->creditPackageRepository->fetch($inputData['packageUid']);

        //if it is empty then throw error
        if ( __isEmpty($packageCollection)) {
            //success function
            return $this->engineReaction(2, null,  __tr('Package does not exist.'));
        }

        //get stripe payment intent data
        $retrievePaymentIntentData = $this->stripeEngine->retrievePaymentIntent($packageCollection, $inputData['paymentIntentId']);

        if ($retrievePaymentIntentData['reaction_code'] == 1) {
            return $this->engineReaction(1, $retrievePaymentIntentData);
        }

        return $this->engineReaction(2, $retrievePaymentIntentData);
    }

    public function processInAppPurchase($request)
    {
        try {
            //code...
        $productReceipt = InAppProduct::googlePlay()->id($request->get('productId'))->token($request->get('purchaseToken'))->get();
        // $packageUid = $productReceipt->getProductId();
        $purchaseState = $productReceipt->getPurchaseState();
        $orderId = $productReceipt->getOrderId();
        if($purchaseState != 0) {
            return $this->engineReaction(2, null,  __tr('Purchase not complete'));
        }
         //get package collection
         $packageCollection = $this->creditPackageRepository->fetch(toggleProductId($request->get('productId')));

            if ($this->creditWalletRepository->isAlreadyProcessed($orderId)) {
                return $this->engineReaction(2, null,  __tr('Already been processed'));
            }

            if (! __isEmpty($packageCollection)) {
                //collect store data
                $storeData = [
                    'status' => 2,
                    'amount' => $packageCollection->price,
                    'users__id' => getUserID(),
                    'method' => configItem('payments.payment_methods', 5),
                    'currency_code' => getStoreSettings('currency'),
                    'is_test' => configItem('payments.in_app_test_mode'),
                    'txn_id' => $orderId,
                    ' __data' => [
                        'rawPaymentData' => json_encode($productReceipt->toArray()),
                        'packageName' => $packageCollection->title,
                    ],
                ];

                //store transaction process
                if ($this->creditWalletRepository->storeTransaction($storeData, $packageCollection)) {
                    //success function
                    return $this->engineReaction(1, null,  __tr('Purchase successfully'));
                }
            }
            //error response
            return $this->engineReaction(2, null,  __tr('Transaction not completed'));
        } catch (\Exception $e) {
             __pr($e->getMessage());
            //throw $th;
            return $this->engineReaction(2, null,  __tr('Transaction not completed'));
        }
    }


    public function processCoinGateCheckout($inputData)
    {
        $packageCollection = $this->creditPackageRepository->fetch($inputData['packageUid']);

        if ( __isEmpty($packageCollection)) {
            //success function
            return $this->engineReaction(2, null,  __tr('Package does not exist.'));
        }

        $isCoingateTestMode = 1;
        if (!getStoreSettings('use_test_coingate')) {
            $isCoingateTestMode = 2;
        }

        $storeData = [
            'status' => 4,
            'amount' => $inputData['amount'],
            'users__id' => getUserID(),
            'method' => configItem('payments.payment_methods', 6),
            'currency_code' => getStoreSettings('currency'),
            'is_test' => $isCoingateTestMode,
            'txn_id' => null,
            '__data' => [
                'rawPaymentData' => json_encode($inputData),
                'packageName' => $inputData['packageName'],
            ],
        ];

        //made new function for getting order id
        if ($orderData = $this->coinGateEngine->storeTransaction($storeData, $packageCollection)) {
            //success function
            $coinGateResponse = $this->coinGateEngine->processCoinGateCheckout($inputData, $orderData);
            if ($coinGateResponse['reaction_code'] == 1) {
                return $this->engineReaction(1, $coinGateResponse);
            }
            return $this->engineReaction(2, null,  __tr('Something went wrong'));
        }
        //error response
        return $this->engineReaction(2, null,  __tr('Transaction not completed'));
    }

    /**
     * Coingate Callback Data
     *
     * @return  object
     */
    public function coingateCallbackData()
    {
        return $this->coinGateEngine->captureCoinGateData();
    }

    /**
     * Handle Order Payment Stripe Webhook
     *
     * @return  json message
     */
    public function handleOrderPaymentStripeWebhook()
    {
        $paymentWebhookData = $this->stripeEngine->paymentWebhook();
        if ($paymentWebhookData['reaction_code'] == 1) {
            //check reaction code is 1
            if (isset($paymentWebhookData['data']['paymentIntent'])) {
                // Access the 'paymentIntent' key safely
                $stripeData = $paymentWebhookData['data']['paymentIntent'];
                if ($stripeData['status'] == 'succeeded') {
                    if ($this->creditWalletRepository->isAlreadyProcessed($stripeData['id'])) {
                        return $this->engineReaction(2, null,  __tr('Already been processed'));
                    }
                    //store transaction data
                    if ($this->storeStripePaymentData($stripeData, $stripeData['metadata']['packageUid'])) {
                        return $this->engineReaction(1, null,  __tr('Payment Complete'));
                    } else {
                        //payment failed response
                        return $this->engineReaction(2, null,  __tr('Payment Failed'));
                    }
                }
            } else {
                //failure response
            return $this->engineReaction(2, null,  $paymentWebhookData['data']['paymentIntent']);
            }

        }
        return $this->engineResponse(2, [], __tr('Payment Fail'));
    }

    /**
     * Handle Order Payment RazorPay Webhook
     *
     * @return
     */
    public function handleOrderPaymentRazorPayWebhook()
    {
        $paymentWebhookData = $this->razorpayEngine->paymentWebhook();

        if ($paymentWebhookData['reaction_code'] == 1) {

            $razorpayResponse = $paymentWebhookData['data']['paymentIntent'];
            $paymentWebhookRazorPayData = $razorpayResponse['payload']['payment']['entity'];
            $paymentIntentId = $paymentWebhookRazorPayData['id'];

            if ($this->creditWalletRepository->isAlreadyProcessed($paymentIntentId)) {
                return $this->engineReaction(2, null,  __tr('Already been processed'), 200);
            }

            if ($paymentWebhookRazorPayData['captured'] === true) {
                //store transaction data
                if ($this->storePaymentData($paymentWebhookRazorPayData, $paymentWebhookRazorPayData['notes']['packageUid'], 'razorpayPayment', $paymentWebhookRazorPayData['notes']['userId'], $paymentWebhookRazorPayData['notes']['packageType'] ?? null)) {
                    return $this->engineReaction(1, null,  __tr('Payment Complete'), 200);
                }
            } else {
                //payment failed response
                return $this->engineReaction(2, null,  __tr('Payment Failed'));
            }
        }
        return $this->engineResponse(2, [], __tr('Payment Fail'));
    }


    /**
     * Process To ShowCreditBonus
     *
     * @return json object
     */
    public function processToUpdateLog()
    {
        $loginLogs = loginLogsModel::where('user_id', getUserID())->first();
        $this->loginLogsRepository->updateLoginLogs($loginLogs, ['updated_at' => Carbon::now()]);

        return $this->engineResponse(1, null);
    }


    /**
     * Prepare Order Process
     *
     * @param   array  $inputData
     *
     * @return  json object
     */
    public function prepareOrderProcess($inputData)
    {
        $packageType = isset($inputData['packageType']) ? $inputData['packageType'] : ($inputData['package_type'] ?? null);
        $resolvedPackage = $this->resolvePurchasablePackage($inputData['packageUid'], $packageType);

        if (__isEmpty($resolvedPackage)) {
            //success function
            return $this->engineReaction(2, null,  __tr('Package does not exist.'));
        }

        $isPaypalCheckoutTestMode = 1;
        if (!getStoreSettings('use_test_paypal_checkout')) {
            $isPaypalCheckoutTestMode = 2;
        }

        $inputData['packageType'] = $resolvedPackage['type'];
        $inputData['package_type'] = $resolvedPackage['type'];

        $storeData = [
            'status' => 4,
            'amount' => $inputData['packagePrice'],
            'users__id' => getUserID(),
            'method' => configItem('payments.payment_methods', 4),
            'currency_code' => getStoreSettings('currency'),
            'is_test' => $isPaypalCheckoutTestMode,
            'txn_id' => null,
            '__data' => [
                'rawPaymentData' => json_encode($inputData),
                'packageName' => $inputData['packageName'],
                'packageUid' => $resolvedPackage['uid'],
                'packageType' => $resolvedPackage['type'],
            ],
        ];

        //made new function for getting order id
        // For Super Like packages, pass a fake credit model-compatible object isn't needed —
        // CoinGate/PayPal storeTransaction only needs financial fields; package used for credits later.
        $packageForStore = $resolvedPackage['type'] === 'credit'
            ? $resolvedPackage['model']
            : (object) [
                'credits' => 0,
                'title' => $resolvedPackage['title'],
                '_uid' => $resolvedPackage['uid'],
            ];

        if ($orderData = $this->coinGateEngine->storeTransaction($storeData, $packageForStore)) {
            //success function
            $paypalResponse = $this->paypalEngine->paypalOrderCreate($inputData, $orderData);
          

            if ($paypalResponse['reaction_code'] == 1) {
                return $this->engineReaction(1, $paypalResponse['data']);
            }
            return $this->engineReaction(2, null,  __tr('Something went wrong'));
        }
        //error response
        return $this->engineReaction(2, null,  __tr('Transaction not store'));
    }

    /**
     * Process Capture Paypal Order
     *
     * @param   array  $inputData
     *
     * @return  json   object
     */
    public function processCapturePaypalOrder($inputData)
    {
       return $this->paypalEngine->paypalCaptureOrder($inputData);
    }

    /////crypto
     /**
     * Process Capture crypto Order
     *
     * @param   array  $inputData
     *
     * @return  json   object
     */
    public function processCryptoCheckout($inputData)
    {
        $packageUID=$inputData['metadata']['package_id'];
        $packageName=$inputData['metadata']['package_name'];
        $userID=$inputData['metadata']['customer_id'];
        if($inputData['data']['id']) {
            $paymentTxnId = $inputData['data']['id'];
        } else
         {
            $paymentTxnId = $inputData['id'];
        } 

        if ($this->creditWalletRepository->isAlreadyProcessed($paymentTxnId)) {

            return $this->engineReaction(2, null,  __tr('Already been processed'), 200);
        }
        //fetch package data
        $packageCollection = $this->creditPackageRepository->fetch($packageUID);
       //check package is available
        if ( __isEmpty($packageCollection)) {
            //success function
            return $this->engineReaction(2, null,  __tr('Package does not exist.'));
        }
        //crypto test mode
        $isCryptoTestMode = 1;
        //fetch crypto test keys
        if (!getStoreSettings('use_test_crypto')) {
            $isCryptoTestMode = 2;
        }
        //connvert package amount
        $packageAmount=($inputData['amount']/100);
        //prepare transaction storedata
        $storeData = [
            'status' => 4,
            'amount' => $packageAmount,
            'users__id' => $userID,
            'method' => configItem('payments.payment_methods', 7),
            'currency_code' => getStoreSettings('currency'),
            'is_test' => $isCryptoTestMode,
            'txn_id' => null,
            '__data' => [
                'rawPaymentData' => json_encode($inputData),
                'packageName' => $packageName,
            ],
        ];

        //made new function for getting order id
        if ($orderData = $this->cryptoEngine->storeTransaction($storeData, $packageCollection)) {
            //success function
            $cryptoResponseData = $this->cryptoEngine->processCryptoStoreData($inputData,$orderData,$paymentTxnId);

            if ($cryptoResponseData['reaction_code'] == 1) {
                return $this->engineReaction(1, $cryptoResponseData);
            }
            return $this->engineReaction(2, null,  __tr('Something went wrong'));
        }
        //error response
        return $this->engineReaction(2, null,  __tr('Transaction not completed'));
    }

     /**
     * Handle Order Payment crypto Webhook
     *
     * @return  json message
     */
    public function handleOrderPaymentCryptoWebhook()
    {
         //fetch webhook data
        $paymentWebhookData = $this->cryptoEngine->paymentWebhook();

        if ($paymentWebhookData['reaction_code'] == 1) {
             //prepare webhook data
            $cryptoResponse = $paymentWebhookData['data']['paymentIntent'];
            $paymentTxnId = $cryptoResponse['id'];
              //check is transaction already done
                if ($this->creditWalletRepository->isAlreadyProcessed($paymentTxnId)) {

                return $this->engineReaction(2, null,  __tr('Already been processed'), 200);
            }

              //if txn id not found
            if ($cryptoResponse['status'] === 'succeeded') {
                //store transaction data
                if ($this->processCryptoCheckout($cryptoResponse)) {
                    return $this->engineReaction(1, null,  __tr('Payment Complete'), 200);
                }
            } else {
                //payment failed response
                return $this->engineReaction(2, null,  __tr('Payment Failed'));
            }
        }
        return $this->engineResponse(2, [], __tr('Payment Fail'));
    }

     /**
     * Process Capture paystack Order
     *
     * @param   array  $inputData
     *
     * @return  json   object
     */
    public function processVerifyPaystack($reference,$packageUid)
    {
         //success function
         $paystackResponseData = $this->paystackEngine->capturePaystackPayment($reference,$packageUid);
        if (!$reference and !$packageUid) {
      
         return $this->engineReaction(2, null,  __tr('Reference not provided' ), 400);
       }
        if($paystackResponseData['reaction_code']==1){
         $orderData=$this->paystackEngine->processPaystackStoreData($paystackResponseData['data']);
         if($orderData['reaction_code']==1){
            return $this->engineReaction(1, $paystackResponseData);
         }
        }
        return $this->engineReaction(2, null,  __tr('Payment Failed'));

    }
     /**
     * Handle Order Payment paystack Webhook
     *
     * @return  json message
     */
    public function handleOrderPaymentPaystackWebhook()
    {
        $paymentWebhookData = $this->paystackEngine->paymentWebhook();
         
        if ($paymentWebhookData['reaction_code'] == 1) {
            $paymentData = Arr::get($paymentWebhookData, 'data.transactionData');
            if (__isEmpty($paymentData)) {
                return $this->engineReaction(2,['show_message' => true], __tr('Empty data'));
            }
            if ($paymentData['status'] == "success") {
                $paystackResponse['capturedPaystackData'] = $paymentData;
                $paystackResponse['txn_reference'] = $paymentData['reference'];
                $orderData=$this->paystackEngine->processPaystackStoreData($paystackResponse);
                if($orderData['reaction_code']==1){
                    return $this->engineReaction(1, $orderData);
                 }

            }
               return $this->engineReaction(2, null,  __tr('Payment Failed'));
        }
      }


}
