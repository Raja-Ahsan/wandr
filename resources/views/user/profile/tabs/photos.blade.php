	@if(!__isEmpty($photosData) or $isOwnProfile)
	<div class="card mb-3">
		<div class="card-header">
			@if($isOwnProfile)
			<span class="float-right">
				<a class="lw-icon-btn lw-ajax-link-action lw-action-with-url" data-event-callback="lwPrepareUploadPlugIn" href="<?= route('user.photos_setting', ['username' => getUserAuthInfo('profile.username')]) ?>" role="button">
					<i class="fas fa-cog"></i>
				</a>
			</span>
			@endif
			<h5><i class="fas fa-images text-warning"></i> <?= __tr('Photos') ?></h5>
		</div>

		<div class="card-body">
			<div class="row text-center text-lg-left lw-horizontal-container pl-2">
				@if(!__isEmpty($photosData))
				@foreach($photosData as $key => $photo)
				<img class="lw-user-photo lw-photoswipe-gallery-img lw-lazy-img" data-img-index="<?= $key ?>" data-src="<?= imageOrNoImageAvailable($photo['image_url']) ?>">
				@endforeach
				@else
				<?= __tr('Ooops... No images found...') ?>
				@endif
			</div>
		</div>
	</div>
	@endif
