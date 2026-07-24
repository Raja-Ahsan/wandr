<?php $package = $packageEditData ?? []; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-200"><?= __tr('Edit Super Like Package') ?></h1>
	<a class="btn btn-light btn-sm lw-ajax-link-action lw-action-with-url mt-3" href="<?= route('manage.super_like_package.read.list') ?>">
		<i class="fa fa-arrow-left" aria-hidden="true"></i> <?= __tr('Back to Packages') ?>
	</a>
</div>
<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card mb-4">
			<div class="card-body">
				<form class="lw-ajax-form lw-form" method="post" action="<?= route('manage.super_like_package.write.edit', ['packageUId' => $package['_uid'] ?? '']) ?>">
					<div class="form-group">
						<label for="lwTitle"><?= __tr('Title') ?></label>
						<input type="text" class="form-control" name="title" id="lwTitle" required minlength="3" maxlength="150" value="<?= e($package['title'] ?? '') ?>">
					</div>
					<div class="form-group">
						<label for="lwDescription"><?= __tr('Description (optional)') ?></label>
						<input type="text" class="form-control" name="description" id="lwDescription" maxlength="255" value="<?= e($package['description'] ?? '') ?>">
					</div>
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<label for="lwTotalLikes"><?= __tr('Super Likes in Package') ?></label>
							<input type="number" class="form-control" name="total_likes" id="lwTotalLikes" required min="1" step="1" value="<?= (int) ($package['total_likes'] ?? 1) ?>">
						</div>
						<div class="col-sm-6">
							<label for="lwPrice"><?= __tr('Price') ?></label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">{{ getCurrencySymbol() }}</span>
								</div>
								<input type="number" class="form-control" name="price" id="lwPrice" required number="true" min="0" step="0.01" value="<?= number_format((float) ($package['price'] ?? 0), 2, '.', '') ?>">
								<div class="input-group-append">
									<span class="input-group-text">{{ getCurrency() }}</span>
								</div>
							</div>
						</div>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline mb-3">
						<input type="checkbox" class="custom-control-input" id="statusCheck" name="status" <?= ((int) ($package['status'] ?? 2) === 1) ? 'checked' : '' ?>>
						<label class="custom-control-label" for="statusCheck"><?= __tr('Active') ?></label>
					</div>
					<br>
					<button type="submit" class="lw-ajax-form-submit-action btn btn-primary"><?= __tr('Update Package') ?></button>
				</form>
			</div>
		</div>
	</div>
</div>
