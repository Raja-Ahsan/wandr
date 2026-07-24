<!-- Page Heading -->
<h3><?= __tr('Super Like Settings') ?></h3>
<hr>
<form class="lw-ajax-form lw-form" method="post" action="<?= route('manage.configuration.write', ['pageType' => request()->pageType]) ?>">
	<div class="col-12 mb-3 alert alert-dark">
		<?= __tr('Users buy Super Like packages with real payment on the Credit Wallet page (same checkout as credits). Create packages under Super Like Packages.') ?>
		<br>
		<a class="btn btn-sm btn-primary mt-2 lw-ajax-link-action lw-action-with-url" href="<?= route('manage.super_like_package.read.list') ?>">
			<?= __tr('Manage Super Like Packages') ?>
		</a>
	</div>
	<div class="form-group row">
		<div class="col-sm-12 mb-3">
			<label for="lwEnableSuperLike"><?= __tr('Enable Super Like') ?></label>
			<select name="enable_super_like" class="form-control" id="lwEnableSuperLike" required>
				<option value="1" <?= ((int) $configurationData['enable_super_like'] === 1) ? 'selected' : '' ?>><?= __tr('Yes') ?></option>
				<option value="0" <?= ((int) $configurationData['enable_super_like'] === 0) ? 'selected' : '' ?>><?= __tr('No') ?></option>
			</select>
		</div>
	</div>
	{{-- Keep legacy fields hidden so existing DB values are preserved on save --}}
	<input type="hidden" name="super_like_price" value="<?= (int) ($configurationData['super_like_price'] ?? 0) ?>">
	<input type="hidden" name="super_like_price_premium" value="<?= (int) ($configurationData['super_like_price_premium'] ?? 0) ?>">
	<input type="hidden" name="super_like_daily_free" value="<?= (int) ($configurationData['super_like_daily_free'] ?? 0) ?>">
	<input type="hidden" name="super_like_daily_free_premium" value="<?= (int) ($configurationData['super_like_daily_free_premium'] ?? 0) ?>">
	<a href class="lw-ajax-form-submit-action btn btn-primary btn-user lw-btn-block-mobile mt-3">
		<?= __tr('Update') ?>
	</a>
</form>
