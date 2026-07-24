@section('page-title', __tr("Buy Super Likes"))
@section('head-title', __tr("Buy Super Likes"))
@section('keywordName', strip_tags(__tr("Buy Super Likes")))
@section('keyword', strip_tags(__tr("Buy Super Likes")))
@section('description', strip_tags(__tr("Buy Super Likes")))
@section('keywordDescription', strip_tags(__tr("Buy Super Likes")))
@section('page-image', getStoreSettings('logo_image_url'))
@section('twitter-card-image', getStoreSettings('logo_image_url'))
@section('page-url', url()->current())

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-200"><?= __tr('Buy Super Likes') ?></h1>
	<a class="btn btn-light btn-sm lw-ajax-link-action lw-action-with-url mt-3" href="<?= route('user.credit_wallet.read.view') ?>">
		<?= __tr('Credit Wallet') ?>
	</a>
</div>

<div class="row mb-4">
	<div class="col-md-6 mb-3">
		<div class="card h-100">
			<div class="card-body">
				<div class="text-muted small"><?= __tr('Your Super Like Balance') ?></div>
				<div class="h3 mb-0" id="lwSuperLikeBalanceValue"><?= (int) ($superLikeBalance ?? 0) ?></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 mb-3">
		<div class="card h-100">
			<div class="card-body">
				<div class="text-muted small"><?= __tr('Your Credits') ?></div>
				<div class="h3 mb-0" id="lwCreditsBalanceValue"><?= (int) ($creditsBalance ?? 0) ?></div>
				<a class="small lw-ajax-link-action lw-action-with-url" href="<?= route('user.credit_wallet.read.view') ?>"><?= __tr('Buy more credits') ?></a>
			</div>
		</div>
	</div>
</div>

@if(empty($superLikeEnabled))
<div class="alert alert-warning"><?= __tr('Super Like is currently disabled by admin.') ?></div>
@endif

<div class="row">
	@if(!__isEmpty($packages))
		@foreach($packages as $package)
		<div class="col-md-4 mb-4">
			<div class="card h-100 lw-super-like-shop-card">
				<div class="card-body d-flex flex-column">
					<h5 class="card-title"><?= e($package['title']) ?></h5>
					@if(!empty($package['description']))
					<p class="text-muted small"><?= e($package['description']) ?></p>
					@endif
					<div class="mb-3">
						<span class="h4"><?= (int) $package['total_likes'] ?></span>
						<span class="text-muted"><?= __tr('Super Likes') ?></span>
					</div>
					<div class="mb-3">
						<strong><?= (int) $package['credit_price'] ?></strong> <?= __tr('credits') ?>
					</div>
					<button type="button"
						class="btn btn-primary mt-auto lw-buy-super-like-package"
						data-url="<?= route('user.super_like_package.write.buy', ['packageUId' => $package['_uid']]) ?>"
						<?= empty($superLikeEnabled) ? 'disabled' : '' ?>>
						<?= __tr('Buy Package') ?>
					</button>
				</div>
			</div>
		</div>
		@endforeach
	@else
		<div class="col-12">
			<div class="alert alert-dark text-center"><?= __tr('No Super Like packages are available right now.') ?></div>
		</div>
	@endif
</div>

@lwPush('appScripts')
<script>
(function () {
	$(document).on('click', '.lw-buy-super-like-package', function () {
		var btn = $(this);
		var url = btn.data('url');
		if (!url || typeof __DataRequest === 'undefined' || btn.prop('disabled')) {
			return;
		}
		btn.prop('disabled', true);
		__DataRequest.post(url, {}, function (response) {
			btn.prop('disabled', false);
			if (response && response.reaction == 1) {
				if (response.data) {
					if (typeof response.data.superLikeBalance !== 'undefined') {
						$('#lwSuperLikeBalanceValue').text(response.data.superLikeBalance);
					}
					if (typeof response.data.creditsRemaining !== 'undefined') {
						$('#lwCreditsBalanceValue').text(response.data.creditsRemaining);
					}
				}
			} else if (response && response.data && response.data.redirectToWallet) {
				setTimeout(function () {
					window.location.href = '<?= route('user.credit_wallet.read.view') ?>';
				}, 700);
			}
		});
	});
})();
</script>
@lwPushEnd
