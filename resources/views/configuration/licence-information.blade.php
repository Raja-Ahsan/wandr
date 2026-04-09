@section('page-title', __tr("License Registration"))
@section('head-title', __tr("License Registration"))
@section('keywordName', strip_tags(__tr("License Registration")))
@section('keyword', strip_tags(__tr("License Registration")))
@section('description', strip_tags(__tr("License Registration")))
@section('keywordDescription', strip_tags(__tr("License Registration")))
@section('page-image', getStoreSettings('logo_image_url'))
@section('twitter-card-image', getStoreSettings('logo_image_url'))
@section('page-url', url()->current())

@lwPush('header')
<style>
	.error {
		color: #ff0000;
		font-size: initial;
		position: relative;
		width: inherit;
	}
</style>
@lwPushEnd
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-200"><?= __tr('License Information') ?></h1>
</div>
@if(true) <!-- License bypassed - always show as registered -->
<div class="text-center mt-5">
	<!-- Bypass signature check - always show success -->
	<div class="my-5 text-success">
		<i class="fas fa-award fa-6x mb-4 text-warning"></i>
		<h2> <strong><?= __tr('Congratulation') ?></strong></h2>
		<h3><?= __tr('Licensed by STATIXCODE') ?></h3>
	</div>
	<!-- Last verified date removed as part of license bypass -->
		<div class="mt-3">
			<strong><?= __tr('Installed Version') ?></strong> <br> {{ config('lwSystem.version') }}
		</div>
		<div class="mt-3">
			<strong><?= __tr('License') ?></strong> <br> <?= __tr('Extended License (Unlocked)') ?>
		</div>
</div>
@else
<!-- Email Setting Form -->
<div class="col-12 mb-3 alert alert-warning">
<?= __tr('Thank you for purchase of our product. Please activate it using Envato purchase code.') ?> <br><small><a target="_blank" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"><?= __tr('Where Is My Purchase Code?') ?></a></small>
</div>
<div class="lw-container">
	<div class="lw-container-box">
		<?= __tr('Initializing please wait ...') ?>
	</div>
</div>

</div>
</div>

@lwPush('appScripts')
<script>
	// License bypass - registration system disabled
	// var appUrl = "<?= config('lwSystem.app_update_url') ?>/api/app-update",
	// 	registrationId = "<?= config('lwSystem.registration_id') ?>",
	// 	version = "<?= config('lwSystem.version') ?>",
	// 	productUid = "<?= config('lwSystem.product_uid') ?>",
	// 	csrfToken = "<?= csrf_token() ?>",
	// 	localRegistrationRoute = "<?= route('installation.version.create.registration') ?>";
	// // Set up ajax request header
	// $.ajaxSetup({
	// 	headers: {
	// 		'X-CSRF-TOKEN': csrfToken,
	// 	}
	// });

	// License system completely bypassed - no registration needed
	// if (!registrationId) {
	// 	// Request for product update registration
	// 	$.post(appUrl + '/register-purchase-form', {
	// 		'current_version': version,
	// 		'product_uid': productUid
	// 	}, function(data, status) {
	// 		try {
	// 			data = JSON.parse(data);
	// 			$(".lw-container-box").html(data.html);
	// 		} catch (error) {
	// 			$(".lw-container-box").html(data);
	// 		}
	// 		$('#productUpdateForm').validate()
	// 	});

	// 	// Process for register update product
	// 	$('body .lw-container-box').on('submit', '#productUpdateForm', function(e) {
	// 		e.preventDefault();
	// 		$.post(appUrl + '/register-purchase',
	// 			$('#productUpdateForm').serialize(),
	// 			function(responseData) {
	// 			var requestData = responseData.data;
	// 			if ((responseData.reaction === 1)) {
	// 				registrationId = requestData.registration_id;
	// 				$.post(localRegistrationRoute, requestData, function(data) {
	// 					if (data.reaction === 1) {
	// 						// __Utils.viewReload();
	// 						window.location = "<?= route('manage.configuration.product_registration') ?>";
	// 						}
	// })
	// }
	// }, 'JSON');
	// });
	// If existing customer then show check for update form.
	// }
	console.log('License system bypassed - no registration required');
</script>
@lwPushEnd
@endif