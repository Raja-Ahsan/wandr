@section('page-title', __tr('Credit Wallet'))
@section('head-title', __tr('Credit Wallet'))
@section('keywordName', __tr('Credit Wallet'))
@section('keyword', __tr('Credit Wallet'))
@section('description', __tr('Credit Wallet'))
@section('keywordDescription', __tr('Credit Wallet'))
@section('page-image', getStoreSettings('logo_image_url'))
@section('twitter-card-image', getStoreSettings('logo_image_url'))
@section('page-url', url()->current())

<style>
	.lw-img-credits-radio-btns-container .lw-group-radio-option-img.active::after {
		content: "<?= __tr('Selected') ?>";
	}
</style>

<!-- Show loader when process payment request -->
<div class="d-flex justify-content-center">
	<div class="lw-page-loader lw-show-till-loading" id="lwCreditPaymentLoader">
		<div class="lw-credit-payment-loader-card">
			<div class="spinner-border text-primary" role="status"></div>
			<p class="lw-credit-payment-loader-text mb-0"><?= __tr('Please wait...') ?></p>
			<small class="text-muted"><?= __tr('Processing your request securely') ?></small>
		</div>
	</div>
</div>
<!-- Show loader when process payment request -->

<div class="lw-credit-wallet-page">
<div class="d-block text-center lw-credit-balance">
	<p class="lw-credit-balance-eyebrow mb-2"><?= __tr('Your Wallet Balance') ?></p>
	<h1 class="text-primary lw-credit-balance-amount">
		<?php $totalUserCreditsAvailable = totalUserCredits(); ?>
		<i class="fas fa-coins fa-fw mr-2"></i>
		<?= __trn('__creditBalance__ Credit', '__creditBalance__ Credits', $totalUserCreditsAvailable, [
													'__creditBalance__' => $totalUserCreditsAvailable
												]) ?>
	</h1>
	<p class="text-muted lw-credit-balance-hint mb-0">
		<?= __tr("Use credits for Premium, Profile Booster, Gifts & Stickers. Buy Super Like packages below with payment.") ?>
		@if(isset($superLikeBalance))
			— <?= __tr('Super Likes left: __count__', ['__count__' => (int) $superLikeBalance]) ?>
		@endif
	</p>
</div>

<!-- buy credits card -->
<div class="lw-credit-buy-section">
	<!-- payment successfully message -->
	@if(session('success'))
	<!--  success message when email sent  -->
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?= session('message') ?>
	</div>
	<!--  /success message when email sent  -->
	@endif
	<!-- / payment successfully message -->

	<!-- payment failed message -->
	@if(session('error'))
	<!--  danger message when email sent  -->
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?= session('message') ?>
	</div>
	<!--  /danger message when email sent  -->
	@endif
	<!-- / payment failed message -->

	<!--  success messages  -->
	<div class="alert alert-success alert-dismissible fade show" id="lwSuccessMessage" style="display:none;"></div>
	<!--  /success messages  -->

	<!--  error messages  -->
	<div class="alert alert-danger alert-dismissible fade show" id="lwErrorMessage" style="display:none;"></div>
	<!--  /error messages  -->
	<ul class="nav nav-tabs lw-credit-wallet-tabs" id="myTab" role="tablist">
		<li class="nav-item disabled" role="presentation">
			<a class="nav-link active disabled" href="<?= route('user.credit_wallet.read.view') ?>">
				<?= __tr('Buy Credits') ?>
			</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link lw-ajax-link-action lw-action-with-url"
				href="<?= route('user.wallet.transactions.read.view') ?>">
				<?= __tr('Wallet Transactions') ?>
			</a>
		</li>
	</ul>
	<div class="lw-credit-buy-heading">
		<h4 class="mb-1"><?= __tr('Buy More Credits') ?></h4>
		<p class="text-muted mb-0">{{ __tr('Select a package, then continue to secure checkout.') }}</p>
	</div>
	<!-- select package form -->
	<form class="lw-ajax-form lw-form text-center" name="credit_wallet_form" method="post"
		action="<?= route('user.credit_wallet.write.payment_process') ?>" data-callback="onSuccessCallback">
		<input type="hidden" name="package_type" id="lwPackageType" value="credit" />
		<!-- show credit packages radio options -->
		<div class="btn-group-toggle lw-img-credits-radio-btns-container" data-toggle="buttons">
			@if(isset($creditWalletData) and !__isEmpty($creditWalletData['creditPackages']))
			@foreach($creditWalletData['creditPackages'] as $key => $package)
			<?php $packagePriceDisplay = number_format((float) $package['price'], 2, '.', ''); ?>
			<span class="btn lw-group-radio-option-img">
				<span class="lw-credit-package-name">
					<?= $package['package_name'] ?>
				</span>
				<input type="radio" value="<?= $package['_uid'] ?>" data-package-price="<?= $packagePriceDisplay ?>"
					data-package-name="<?= e($package['package_name']) ?>"
					data-package-credits="<?= (int) $package['credit'] ?>"
					data-package-type="credit"
					name="select_package" />
				<div class="lw-credit-package-body">
					<div class="lw-credit-package-media">
						<img src="<?= $package['packageImageUrl'] ?>" alt="<?= e($package['package_name']) ?>" />
					</div>
					<h3 class="lw-credit-package-credits">
						<?= __trn('__credits__ Credit', '__credits__ Credits', $package['credit'], [
							'__credits__' => $package['credit']
						]) ?>
					</h3>
					<span class="lw-credit-package-price">
						<?= __tr('for __currencyCode__ __price__ only', [
							'__currencyCode__' => getStoreSettings('currency_symbol'),
							'__price__' => $packagePriceDisplay
						]) ?>
					</span>
				</div>
			</span>
			@endforeach
			@else
			<!-- info message -->
			<div class="alert alert-info">
				<?= __tr('There are no packages') ?>
			</div>
			<!-- / info message -->
			@endif
		</div>
		<!-- / show credit packages radio options -->

		@if(isset($creditWalletData['superLikePackages']) && !__isEmpty($creditWalletData['superLikePackages']))
		<div class="lw-credit-buy-heading mt-4">
			<h4 class="mb-1"><?= __tr('Buy Super Likes') ?></h4>
			<p class="text-muted mb-0">{{ __tr('Stand out — pay once and get Super Likes to use on Find Matches.') }}</p>
		</div>
		<div class="btn-group-toggle lw-img-credits-radio-btns-container" data-toggle="buttons">
			@foreach($creditWalletData['superLikePackages'] as $package)
			<?php $packagePriceDisplay = number_format((float) $package['price'], 2, '.', ''); ?>
			<span class="btn lw-group-radio-option-img lw-super-like-package-option">
				<span class="lw-credit-package-name">
					<?= e($package['package_name']) ?>
				</span>
				<input type="radio" value="<?= $package['_uid'] ?>" data-package-price="<?= $packagePriceDisplay ?>"
					data-package-name="<?= e($package['package_name']) ?>"
					data-package-credits="<?= (int) $package['total_likes'] ?>"
					data-package-type="super_like"
					name="select_package" />
				<div class="lw-credit-package-body">
					<div class="lw-credit-package-media lw-super-like-package-media">
						<span class="lw-super-like-package-icon"><i class="fas fa-star"></i></span>
					</div>
					<h3 class="lw-credit-package-credits">
						<?= __trn('__count__ Super Like', '__count__ Super Likes', $package['total_likes'], [
							'__count__' => $package['total_likes']
						]) ?>
					</h3>
					@if(!empty($package['description']))
					<p class="small text-muted mb-2"><?= e($package['description']) ?></p>
					@endif
					<span class="lw-credit-package-price">
						<?= __tr('for __currencyCode__ __price__ only', [
							'__currencyCode__' => getStoreSettings('currency_symbol'),
							'__price__' => $packagePriceDisplay
						]) ?>
					</span>
				</div>
			</span>
			@endforeach
		</div>
		@endif

		<!-- hidden select payment option input field -->
		<input type="hidden" name="select_payment_method" id="lwSelectPaymentMethod" />
		<!-- / hidden select payment option input field -->

		<!-- payment buttons -->
		<div id="lwPaymentOption" class="lw-credit-payment-panel" style="display:none">
			<div class="lw-credit-payment-panel-inner">
				<div class="lw-credit-payment-panel-header">
					<span class="lw-credit-payment-step"><?= __tr('Step 2') ?></span>
					<h5 class="mb-1"><?= __tr('Secure Checkout') ?></h5>
					<p class="text-muted mb-0"><?= __tr('Choose how you want to pay') ?></p>
				</div>

				<div id="lwSelectedPackageSummary" class="lw-credit-payment-summary" aria-live="polite"></div>

				<div class="lw-credit-payment-methods">
					@if(getStoreSettings('enable_paypal'))
					<div class="lw-credit-payment-method-card">
						<div id="paypal-button-container"></div>
					</div>
					@endif

					@if(getStoreSettings('enable_stripe'))
					<button type="submit"
						class="lw-ajax-form-submit-action btn lw-btn-block-mobile lw-stripe-checkout-btn lw-stripe-payment-btn lw-payment-checkout-btn lw-credit-pay-cta"
						title="<?= __tr('Stripe Payment') ?>">
						<span class="lw-credit-pay-cta-main">
							<i class="fas fa-lock mr-2"></i>
							<span class="lw-stripe-cta-text"><?= __tr('Continue to Secure Payment') ?></span>
						</span>
						<span class="lw-credit-pay-cta-sub">
							<img class="lw-payment-img" src="<?= asset('imgs/payment-images/stripe-payment.svg') ?>"
								alt="<?= __tr('Stripe') ?>">
						</span>
					</button>
					@endif

					@if(getStoreSettings('enable_razorpay'))
					<button type="button" class="btn lw-payment-checkout-btn lw-credit-pay-cta lw-credit-pay-cta--alt" id="lwRazorPayBtn" title="<?= __tr('Razorpay Payment') ?>">
						<span class="lw-credit-pay-cta-main">
							<i class="fas fa-credit-card mr-2"></i>
							<span><?= __tr('Pay with Razorpay') ?></span>
						</span>
						<span class="lw-credit-pay-cta-sub">
							<img class="lw-payment-img" src="<?= asset('imgs/payment-images/razorpay-payment.svg') ?>"
								alt="<?= __tr('Razorpay') ?>">
						</span>
					</button>
					@endif

					@if(getStoreSettings('enable_coingate'))
					<button class="btn lw-payment-checkout-btn lw-credit-pay-cta lw-credit-pay-cta--alt" id="lwCoingateBtn" type="button"
						title="<?= __tr('Coingate Payment') ?>">
						<span class="lw-credit-pay-cta-main">
							<i class="fab fa-bitcoin mr-2"></i>
							<span><?= __tr('Pay with Coingate') ?></span>
						</span>
						<span class="lw-credit-pay-cta-sub">
							<img class="lw-payment-img"
								src="<?= asset('imgs/payment-images/coingate-payment.svg') ?>" alt="<?= __tr('Coingate') ?>">
						</span>
					</button>
					@endif

					<div class="d-flex justify-content-center flex-wrap lw-d-inline lw-credit-payment-extra">
					{{-- crypto btn start --}}
					@if(getStoreSettings('enable_crypto'))
						<div id="crypto-pay-button" class="bg-white p-4 rounded lw-crypto-pay-button "></div>
					@endif
					{{-- crypto btn end --}}
					{{-- paystack btn start --}}
					@if(getStoreSettings('enable_paystack'))
					<button class="btn lw-payment-checkout-btn lw-paystack-pay-button lw-crypto-pay-button p-0 lw-credit-pay-cta lw-credit-pay-cta--alt" id="paystackPaymentButton" type="button"
						title="<?= __tr('Paystack Payment') ?>">
						<span class="lw-credit-pay-cta-main">
							<span><?= __tr('Pay with Paystack') ?></span>
						</span>
						<span class="lw-credit-pay-cta-sub">
							<img class="lw-payment-img"
								src="<?= asset('imgs/payment-images/paystack-small.png') ?>" alt="<?= __tr('Paystack') ?>">
						</span>
					</button>
					@endif
					</div>
					{{-- paystack btn end --}}
				</div>

				<p class="lw-credit-payment-trust mb-0">
					<i class="fas fa-shield-alt mr-1"></i>
					<?= __tr('Encrypted checkout. Your payment details stay private.') ?>
				</p>
			</div>
		</div>
		<!-- / payment buttons -->


	</form>


	<!-- /select package form -->
</div>
</div>

<!-- /buy credits card -->
{{-- paypal keys--}}
@if(getStoreSettings('enable_paypal'))
@if(getStoreSettings('use_test_paypal_checkout'))
<script
	src="https://www.paypal.com/sdk/js?client-id=<?= getStoreSettings('paypal_checkout_testing_client_id') ?>&currency=<?= getStoreSettings('currency') ?>">
</script>
@else
<script
	src="https://www.paypal.com/sdk/js?client-id=<?= getStoreSettings('paypal_checkout_live_client_id') ?>&currency=<?= getStoreSettings('currency') ?>">
</script>
@endif
@endif
{{-- stripe keys--}}
@if(getStoreSettings('enable_stripe'))
<script src="https://js.stripe.com/v3/"></script>
@endif
{{-- razorpay keys--}}
@if(getStoreSettings('enable_razorpay'))
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endif
{{-- crypto start--}}
@if(getStoreSettings('enable_crypto'))
@if(getStoreSettings('crypto_testing_publishable_key'))
<script src="https://js.crypto.com/sdk?publishable-key=<?= getStoreSettings('crypto_testing_publishable_key') ?>">
</script>
@else
<script src="https://js.crypto.com/sdk?publishable-key=<?= getStoreSettings('crypto_live_publishable_key') ?>"></script>
@endif
@endif
{{-- crypto end --}}
{{-- paystack start--}}
@if(getStoreSettings('enable_paystack'))

<script src="https://js.paystack.co/v1/inline.js">
</script>

@endif
{{-- paystack end --}}


@lwPush('appScripts')
<script>
	$(document).ready(function() {
		var enablePaypalCheckout = '<?= getStoreSettings('enable_paypal') ?>',
			enableRazorpayCheckout = '<?= getStoreSettings('enable_razorpay') ?>',
			useTestRazorpayCheckout = '<?= getStoreSettings('use_test_razorpay') ?>',
			enableCoingate = '<?= getStoreSettings('enable_coingate') ?>',
			useTestCoingate = '<?= getStoreSettings('use_test_coingate') ?>',
			enableCrypto = '<?= getStoreSettings('enable_crypto') ?>',
			enablePaystack = '<?= getStoreSettings('enable_paystack') ?>',
			useTestPaystack = '<?= getStoreSettings('use_test_paystack') ?>',
			currencySymbol = <?= json_encode(html_entity_decode((string) getStoreSettings('currency_symbol'), ENT_QUOTES, 'UTF-8'), JSON_UNESCAPED_UNICODE) ?>;

		function lwShowCreditPaymentLoader(message) {
			if (message) {
				$('.lw-credit-payment-loader-text').text(message);
			} else {
				$('.lw-credit-payment-loader-text').text('<?= __tr('Please wait...') ?>');
			}
			$("#lwPaymentOption").addClass('lw-disabled-block-content lw-payment-processing');
			$(".lw-show-till-loading").show();
		}

		function lwHideCreditPaymentLoader() {
			$("#lwPaymentOption").removeClass('lw-disabled-block-content lw-payment-processing');
			$(".lw-show-till-loading").hide();
		}

		function lwUpdateSelectedPackageSummary($input) {
			var packageName = $input.attr('data-package-name') || '',
				packagePrice = parseFloat($input.attr('data-package-price')) || 0,
				packageCredits = $input.attr('data-package-credits') || '',
				packageType = $input.attr('data-package-type') || 'credit',
				priceLabel = (currencySymbol || '$') + ' ' + packagePrice.toFixed(2),
				qtyLabel = (packageType === 'super_like')
					? ('<?= __tr('Super Likes') ?>')
					: ('<?= __tr('Credits') ?>');

			$('#lwPackageType').val(packageType);

			$('#lwSelectedPackageSummary').html(
				'<div class="lw-credit-payment-summary-row">' +
					'<div class="lw-credit-payment-summary-label"><?= __tr('Selected package') ?></div>' +
					'<div class="lw-credit-payment-summary-value">' + _.escape(packageName) + '</div>' +
				'</div>' +
				'<div class="lw-credit-payment-summary-row">' +
					'<div class="lw-credit-payment-summary-label">' + qtyLabel + '</div>' +
					'<div class="lw-credit-payment-summary-value">' + _.escape(String(packageCredits)) + '</div>' +
				'</div>' +
				'<div class="lw-credit-payment-summary-row lw-credit-payment-summary-row--total">' +
					'<div class="lw-credit-payment-summary-label"><?= __tr('Total') ?></div>' +
					'<div class="lw-credit-payment-summary-value">' + _.escape(priceLabel) + '</div>' +
				'</div>'
			);

			if (packagePrice <= 0) {
				$('.lw-stripe-cta-text').text('<?= __tr('Claim Free Credits') ?>');
			} else {
				$('.lw-stripe-cta-text').text('<?= __tr('Continue to Secure Payment') ?>');
			}
		}

		window.lwHideCreditPaymentLoader = lwHideCreditPaymentLoader;
		window.lwShowCreditPaymentLoader = lwShowCreditPaymentLoader;

		//set on click select payment option
		$(".lw-stripe-checkout-btn").on('click', function() {
			$("#lwSelectPaymentMethod").val('stripe');
			lwShowCreditPaymentLoader('<?= __tr('Please wait...') ?>');
		});
		//set on click select payment option
		

		//by default hide payment options
		$('input[type=radio][name=select_package]').on('change', function(event) {
			var $this = $(this),
				packageUid = event.target.value,
				packageName = $this.attr('data-package-name'),
				packagePrice = $this.attr('data-package-price'),
				packageType = $this.attr('data-package-type') || 'credit';
			$('#lwPackageType').val(packageType);
			//on change show payment button options
			lwUpdateSelectedPackageSummary($this);
			$("#lwPaymentOption").stop(true, true).slideDown(220);
            $('#lwErrorMessage, #lwSuccessMessage').hide();
			lwHideCreditPaymentLoader();

			/*************************************************************************************************************
			 RazorPay Payment on Click
			**************************************************************************************************************/
			if (enableRazorpayCheckout) {
				var razorpayKey = null;
				if (useTestRazorpayCheckout) {
					razorpayKey = '<?= getStoreSettings('razorpay_testing_key') ?>';
				} else {
					razorpayKey = '<?= getStoreSettings('razorpay_live_key') ?>';
				}

				$("#lwRazorPayBtn").off('click.lwCreditPay').on('click.lwCreditPay', function() {
					try {
						var options = {
							"key": razorpayKey,
							"amount": getRazorPayAmount(packagePrice).toFixed(2), // 2000 paisa = INR 20
							"currency": "<?= getStoreSettings('currency'); ?>",
							"name": packageName,
							handler: function(response) {
								if (!_.isEmpty(response.razorpay_payment_id)) {
									lwShowCreditPaymentLoader('<?= __tr('Please wait...') ?>');
									var razorPayRequestUrl = __Utils.apiURL("<?= route('user.credit_wallet.write.razorpay.checkout') ?>");
									//post ajax request
									__DataRequest.post(razorPayRequestUrl, {
										'packageUid': packageUid,
										'packageType': packageType,
										'razorpayPaymentId': response.razorpay_payment_id
									}, function(response) {
										//handle callback event data
										handlePaymentCallbackEvent(response);
									});
								} else {
									// Show a cancel page, or return to cart
									//bind error message on div
									$("#lwErrorMessage").text('<?= __tr("Payment Failed") ?>');
									//show hide div
									$("#lwErrorMessage").toggle();
									_.delay(function() {
										//hide div
										$("#lwErrorMessage").toggle();
									}, 10000);
								}
							},
							"prefill": {
								"name": '<?= getUserAuthInfo('profile.full_name') ?>',
								"email": '<?= getUserAuthInfo('profile.email') ?>'
							},
							"notes": {
								"packageUid": packageUid,
								"packageType": packageType,
								"userId": '<?=getUserID()?>',
							},
							"theme": {
								"color": "#050505"
							},
							"modal": {
								ondismiss: function(e) {}
							}
						};
						var rzp1 = new Razorpay(options); // will inherit key and image from above.
						rzp1.open();
					} catch (error) {
						//bind error message on div
						alert(error.message);
					}
				});
			}

			//if paypal button instance available then remove from dom else create instance
			if (!_.isEmpty($("#paypal-button-container").html())) {
				$("#paypal-button-container").empty();
			}
			if (!_.isEmpty($("#crypto-pay-button").html())) {
				$("#crypto-pay-button").empty();
			}
			
			

			//paypal payment button script js
			/*************************************************************************************************************
			 Paypal Payment on Click
			**************************************************************************************************************/
			if (enablePaypalCheckout) {
				try {
					var createOrderUrl = __Utils.apiURL("<?= route('paypal.order.process')?>");
					var orderURL = __Utils.apiURL("<?= route('capture.paypal.checkout')?>");
					paypal.Buttons({
						// Order is created on the server and the order id is returned
						createOrder() {
							
							return fetch(createOrderUrl, {
								method: "post",
								headers: {
									'content-type': 'application/json',
									'X-CSRF-TOKEN': "{{ csrf_token() }}"
								},
								body:JSON.stringify({
									'packagePrice': packagePrice,
									'packageUid' : packageUid,
									'packageName':packageName,
									'packageType': packageType,
									'select_payment_method' : 'paypal-checkout'
								}),
							})
							.then((response) => {
								return response.json();
							})
							.then((order) => {
							
								return order.data.createPaypalOrder.id;
							});
						},
						// Finalize the transaction on the server after payer approval
						onApprove(responseData) {
							lwShowCreditPaymentLoader('<?= __tr('Please wait...') ?>');
							// This function captures the funds from the transaction.
							return fetch(orderURL, {
								method: "post",
								headers: {
									'content-type': 'application/json',
									'X-CSRF-TOKEN': "{{ csrf_token() }}"
								},
								body: JSON.stringify({
									"orderUID": responseData.orderID
								})
							})
							.then((response) => {
								return response.clone().json();
							})
							.then((orderData) => {
								// Successful capture! For dev/demo purposes:
								handlePaymentCallbackEvent(orderData);
							});
						},
						onError: function (err) {
							// Show an error page here, when an error occurs
							alert(err.message);
						},
						onCancel: function (oncancel) {
							$("#lwErrorMessage").text('<?= __tr("Payment Canceled by User") ?>');
							//show hide div
							$("#lwErrorMessage").toggle();
							_.delay(function() {
								//hide div
								$("#lwErrorMessage").hide();
							}, 10000);
						}
					}).render('#paypal-button-container');

				} catch (error) {
					/****Add Stuff error.message ****/
					if ('<?= getStoreSettings('enable_paypal') ?>') {
						__Utils.error('<?= __tr('Something went wrong with paypal checkout, please contact to administrator.') ?>');
					}
				}
			}

			if (enableCoingate) {
				$("#lwCoingateBtn").off('click.lwCreditPay').on('click.lwCreditPay', function() {
				
					lwShowCreditPaymentLoader('<?= __tr('Please wait...') ?>');
						var coinGateRequestUrl = __Utils.apiURL("<?= route('user.credit_wallet.write.coingate.checkout') ?>");
						//post ajax request
						__DataRequest.post(coinGateRequestUrl, {
							'packageUid': packageUid,
							'packageName': packageName,
							'amount': packagePrice
						}, function(response) {
							if (response.reaction == 1) {
								window.location.href = response.data.data.paymentUrl;
							}else{
                                $("#lwErrorMessage").text('<?= __tr('Something went wrong with Coingate, please contact to administrator.') ?>');
                                lwHideCreditPaymentLoader();
                                    //show hide div
                                    // $("#lwErrorMessage").show();
                                    _.delay(function() {
                                        //hide div
                                        $("#lwErrorMessage").hide();
                                    }, 10000);
								__Utils.error('<?= __tr('Something went wrong with Coingate, please contact to administrator.') ?>');
							}
						});
				});
			}
			if (enablePaystack) {
            $("#paystackPaymentButton").off('click.lwCreditPay').on('click.lwCreditPay', function () {
            try {
            // Define payment amount in kobo (multiply by 100)
            var paystackAmount = getPaystackAmount(packagePrice);
			var userCurrency="<?= getStoreSettings('currency_value') ?>"; // set currency which is in paystack developer account.
			var userEmailId="<?= getUserAuthInfo('profile.email') ?>";
            var paystackKey = useTestPaystack ? "<?= getStoreSettings('paystack_testing_publishable_key') ?>" : "<?= getStoreSettings('paystack_live_publishable_key') ?>";
            var userPackageUid = packageUid;
			var usersId="<?= getUserAuthInfo('profile._id') ?>";
            // Set up Paystack payment handler
            const handler = PaystackPop.setup({
                key: paystackKey, // Paystack public key
                email: userEmailId, // Dynamically fetch user's email
                amount: paystackAmount, // Amount in kobo (KES cents)
                currency: userCurrency,    // set currency which is in paystack developer account.
                ref: "{{ uniqid('PS_') }}", // Unique transaction reference
                metadata: {
                    package_uid: userPackageUid, // Pass subscription UID in metadata
					userId:usersId,
                },
                callback: function (response) {
					lwShowCreditPaymentLoader('<?= __tr('Please wait...') ?>');
                    verifyTransaction(response.reference, userPackageUid);
                },
                onClose: function () {
                    showAlert("Payment window closed.");
                },
            });

            // Open Paystack payment modal
            handler.openIframe();
        } catch (error) {
            showAlert(error.message);
        }
    });

    function getPaystackAmount(amount) {
        return amount * 100;
    }

    function verifyTransaction(reference, packageUid) {
        const paystackVerifyUrl = "<?= route('verify.paystack.payment',['reference' => 'REFERENCE']) ?>";
        const url = paystackVerifyUrl.replace('REFERENCE', reference);
        fetch(url, {
            method: "post",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({package_uid: packageUid }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(response => {
			handlePaymentCallbackEvent(response);
        })
        .catch(error => {
			lwHideCreditPaymentLoader();
            console.error("{{ __tr('Error verifying transaction:') }}", error);
			});
		}
	}

	// ***paystack end***

			///crypto payment button
			//crypto payment start

			if (enableCrypto) {
				var userCurrency="<?= getStoreSettings('currency'); ?>";
				var packageUid = event.target.value;
				var userId="<?= getUserID() ?>";
				var paymentUrl="https:js.crypto.com/sdk/payments/checkout/set_wallet?publishableKey=<?= getStoreSettings('crypto_testing_publishable_key') ?>";
				var cryptoUrl=__Utils.apiURL("<?= route('crypto.payment_process')?>");
				var cryptoCallbackUrl=__Utils.apiURL("<?= route('crypto-webhook')?>");
				//crypto start
				cryptopay.Button({
                createPayment: function(actions) {

                return actions.payment.create({

                 currency: userCurrency,
                 amount: packagePrice*100,
				 payment_url: paymentUrl,
                    metadata: {
                    size: 'XL',
                       color: 'black',
					package_Id:packageUid,
				    package_name:packageName,
					customer_id: userId,

                    }
                  });

                   },

                 onApprove: function (data,actions) {
					lwShowCreditPaymentLoader('<?= __tr('Please wait...') ?>');

					fetch(cryptoUrl,{
								method: "post",
								headers: {
									'content-type': 'application/json',
									'X-CSRF-TOKEN': "{{ csrf_token() }}"
								},
								body: JSON.stringify({
                                    metadata:data.metadata,
									amount:data.amount,
									status:data.status,
									cryptoPymentId:data.id,
									payment_url:data.payment_url,
									data:data,

								})

							})

							.then((response) => {
							//check response code
            if (response.ok) {
                return response.clone().json();
            } else {
                throw new Error('Network response was not ok');
            }
        })
        .then((responseData) => {
			handlePaymentCallbackEvent(responseData);
            // Handle the responseData as needed
			//reload page alert
        })

       },

                defaultLang: 'en-US' // Optional: default language for payment page
               }).render("#crypto-pay-button")

			}
			//crypto end////

		});

	});

	//on success callback
	function onSuccessCallback(responseData) {
		var reactionCode = responseData.reaction,
			selectPaymentMethod = $("#lwSelectPaymentMethod").val(),
			enableStripe = "<?= getStoreSettings('enable_stripe'); ?>";

		// Free ($0) packages are credited without Stripe Checkout.
		if (reactionCode == 1 && responseData.data && responseData.data.freePackageGranted) {
			if (typeof lwHideCreditPaymentLoader === 'function') {
				lwHideCreditPaymentLoader();
			} else {
				$(".lw-show-till-loading").hide();
			}
			showConfirmation("<?= __tr('Credits have been added successfully to your wallet') ?>", function() {
				__Utils.viewReload();
			}, {
				showCancelBtn: false,
				type: 'success',
				confirmButtonText: "<?= __tr('Reload to Update') ?>"
			});
			return;
		}

		//check reaction code
		if (reactionCode == 1 && enableStripe && selectPaymentMethod == 'stripe') {
			var requestData = responseData.data.stripeSessionData,
				useTestStripe = "<?= getStoreSettings('use_test_stripe'); ?>",
				stripePublishKey = '';

			//check is testing or live
			if (useTestStripe) {
				stripePublishKey = "<?= getStoreSettings('stripe_testing_publishable_key'); ?>";
			} else {
				stripePublishKey = "<?= getStoreSettings('stripe_live_publishable_key'); ?>";
			}

			//create stripe instance
			var stripe = Stripe(stripePublishKey);

			//check request id is not undefined
			if (typeof requestData.id !== "undefined") {
				if (typeof lwShowCreditPaymentLoader === 'function') {
					lwShowCreditPaymentLoader('<?= __tr('Redirecting to secure checkout...') ?>');
				}
				stripe.redirectToCheckout({
					// Make the id field from the Checkout Session creation API response
					// available to this file, so you can provide it as parameter here
					sessionId: requestData.id
				}).then(function(result) {
					if (typeof lwHideCreditPaymentLoader === 'function') {
						lwHideCreditPaymentLoader();
					} else {
						$(".lw-show-till-loading").hide();
					}
					// If `redirectToCheckout` fails due to a browser or network
					// error, display the localized error message to your customer
					// using `result.error.message`.
					//bind error message on div
					$("#lwErrorMessage").text(result && result.error ? result.error.message : result);
					//show hide div
					$("#lwErrorMessage").show();
					_.delay(function() {
						//hide div
						$("#lwErrorMessage").hide();
					}, 10000);
				});
			} else {
				if (typeof lwHideCreditPaymentLoader === 'function') {
					lwHideCreditPaymentLoader();
				}
			}
		} else {
			if (typeof lwHideCreditPaymentLoader === 'function') {
				lwHideCreditPaymentLoader();
			} else {
				$(".lw-show-till-loading").hide();
			}
			//bind error message on div
			$("#lwErrorMessage").text((responseData.data && responseData.data.errorMessage) ? responseData.data.errorMessage : '<?= __tr('Payment failed.') ?>');
			//show hide div
			$("#lwErrorMessage").show();
			_.delay(function() {
				//hide div
				$("#lwErrorMessage").hide();
			}, 10000);
		}
	}


	/**
	 * get razor pay amount
	 *
	 *-------------------------------------------------------- */
	function getRazorPayAmount(amount) {
		return amount * 100;
	}

	/**
	 * handle callback event data hide/show data
	 *
	 *-------------------------------------------------------- */
	function handlePaymentCallbackEvent(response) {
		if (typeof lwHideCreditPaymentLoader === 'function') {
			lwHideCreditPaymentLoader();
		} else {
			//hide payment options
			$("#lwPaymentOption").hide();
			//hide loader after ajax request complete
			$(".lw-show-till-loading").hide();
			//after process on server enable payment button block
			$("#lwPaymentOption").removeClass('lw-disabled-block-content');
		}
		$("#lwPaymentOption").hide();
		//check reaction code is 1
		if (response.reaction == 1) {
			//show confirmation
			showConfirmation("<?= __tr('Payment Successful, Credits has been added successfully to your wallet') ?>", function() {
                    __Utils.viewReload();
                    return;
                }, {
                showCancelBtn : false,
                type : 'success',
                confirmButtonText: "<?= __tr('Reload to Update') ?>"
			});
			//load transaction list data function
			// _.defer(function() {
			// 	reloadTransactionTable();
			// });
			//bind error message on div
			$("#lwSuccessMessage").text(response.data.message);
			//show div
			$("#lwSuccessMessage").toggle();
			_.delay(function() {
				//hide div
				$("#lwSuccessMessage").toggle();
			}, 10000);
		} else {
			//bind error message on div
			$("#lwErrorMessage").text(response.data.errorMessage);
			//show hide div
			$("#lwErrorMessage").toggle();
			_.delay(function() {
				//hide div
				$("#lwErrorMessage").toggle();
			}, 10000);
		}
	}
//*****************************************************************************************************

</script>

@lwPushEnd
