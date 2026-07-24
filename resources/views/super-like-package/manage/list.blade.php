@section('page-title', __tr("Manage Super Like Packages"))
@section('head-title', __tr("Manage Super Like Packages"))
@section('keywordName', strip_tags(__tr("Manage Super Like Packages")))
@section('keyword', strip_tags(__tr("Manage Super Like Packages")))
@section('description', strip_tags(__tr("Manage Super Like Packages")))
@section('keywordDescription', strip_tags(__tr("Manage Super Like Packages")))
@section('page-image', getStoreSettings('logo_image_url'))
@section('twitter-card-image', getStoreSettings('logo_image_url'))
@section('page-url', url()->current())

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-200"><?= __tr('Manage Super Like Packages') ?></h1>
	<a class="btn btn-primary btn-sm lw-ajax-link-action lw-action-with-url mt-3" href="<?= route('manage.super_like_package.add.view') ?>" title="{{ __tr('Add New Package') }}"><?= __tr('Add New Package') ?></a>
</div>
<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card mb-4">
			<div class="card-body table-responsive">
				<div class="alert alert-dark mb-3">
					<?= __tr('Create Super Like packages with a money price. They appear on the Credit Wallet page next to credit packages and users pay via the same checkout (Stripe, PayPal, etc.).') ?>
				</div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?= __tr('Title') ?></th>
							<th><?= __tr('Description') ?></th>
							<th class="text-right"><?= __tr('Super Likes') ?></th>
							<th class="text-right"><?= __tr('Price') ?></th>
							<th><?= __tr('Created On') ?></th>
							<th><?= __tr('Status') ?></th>
							<th><?= __tr('Action') ?></th>
						</tr>
					</thead>
					<tbody>
						@if(!__isEmpty($packageData))
						@foreach($packageData as $package)
						<tr id="lw-sl-package-row-<?= $package['_uid'] ?>">
							<td><?= e($package['title']) ?></td>
							<td><?= e($package['description'] ?: '—') ?></td>
							<td class="text-right"><?= (int) $package['total_likes'] ?></td>
							<td class="text-right"><?= priceFormat($package['price'], true) ?></td>
							<td><?= $package['created_at'] ?></td>
							<td><?= $package['status'] ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-black dropdown-toggle lw-datatable-action-dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item lw-ajax-link-action lw-action-with-url" href="<?= route('manage.super_like_package.edit.view', ['packageUId' => $package['_uid']]) ?>"><i class="far fa-edit"></i> <?= __tr('Edit') ?></a>
										<a data-callback="onDeleteSuperLikePackage" data-method="post" class="dropdown-item lw-ajax-link-action" href="<?= route('manage.super_like_package.write.delete', ['packageUId' => $package['_uid']]) ?>"><i class="fas fa-trash-alt"></i> <?= __tr('Delete') ?></a>
									</div>
								</div>
							</td>
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="7" class="text-center"><?= __tr('There are no records. Add a package to start selling Super Likes.') ?></td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@lwPush('appScripts')
<script>
	function onDeleteSuperLikePackage(response) {
		if (response.reaction == 1 && response.data && response.data.packageUId) {
			$("#lw-sl-package-row-" + response.data.packageUId).addClass("lw-deleted-row");
		}
	}
</script>
@lwPushEnd
