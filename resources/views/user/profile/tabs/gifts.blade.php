	<!-- user gift data -->
	@if(!__isEmpty($userGiftData) or $isOwnProfile)
	<div class="card mb-3">
		<!-- Gift Header -->
		<div class="card-header">
			<h5><i class="fa fa-gifts" aria-hidden="true"></i> <?= __tr('Gifts') ?></h5>
		</div>
		<!-- /Gift Header -->
		<!-- Gift Card Body -->
		<div class="card-body" id="lwUserGift">
			@if(!__isEmpty($userGiftData))
			<div class="row">
				@foreach($userGiftData as $gift)
				<div class="col-sm-12 col-md-6 col-lg-2">
				<div class="lw-user-gift-container">
					<img data-src="<?= imageOrNoImageAvailable($gift['userGiftImgUrl']) ?>" class="lw-user-gift-img lw-lazy-img" />
					<small>
						<?= __tr('sent by') ?> <br>
						<a class="lw-ajax-link-action lw-action-with-url" href="<?= route('user.profile_view', ['username' => $gift['senderUserName']]) ?>"><?= $gift['fromUserName'] ?></a></small>
					@if($gift['status'] === 1)
					<i class="fas fa-mask" title="<?= __tr('This is a private gift you and only sender can see this.') ?>"></i>
					@endif
				</div>
				</div>
				@endforeach
			</div>
			<!-- show more gift button -->
			<div class="mt-3">
				<button class="btn btn-dark btn-sm btn-block" id="showMoreGiftBtn"> <i class="fa fa-chevron-down"></i> <?= __tr('Show More') ?></button>
			</div>
			<!-- /show more gift button -->

			<!-- show less gift button -->
			<div class="mt-3">
				<button class="btn btn-dark btn-sm btn-block" id="showLessGiftBtn"> <i class="fa fa-chevron-up"></i> <?= __tr('Show Less') ?></button>
			</div>
			<!-- /show less gift button -->
			@else
			<!-- info message -->
			<div class="alert alert-info">
				<?= __tr('There are no gifts.') ?>
			</div>
			<!-- / info message -->
			@endif
		</div>
		<!-- Gift Card Body -->
	</div>
	@endif
