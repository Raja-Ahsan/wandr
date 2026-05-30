	@if(isset($userProfileData['aboutMe']) and $userProfileData['aboutMe'])
	<div class="card mb-3">
		<div class="card-header">
			<h5><i class="fas fa-user text-primary"></i> <?= __tr('About Me') ?></h5>
		</div>
		<div class="card-body">
			<div class="form-group">
				<div class="lw-inline-edit-text" data-model="profileData.aboutMe">
					<?= __ifIsset($userProfileData['aboutMe'], $userProfileData['aboutMe'], '-') ?>
				</div>
			</div>
		</div>
	</div>
	@endif

	<!-- User Specifications (Looks, Personality, Lifestyle, Favorites, etc.) -->
	@if(!__isEmpty($userSpecificationData))
	@foreach($userSpecificationData as $specificationKey => $specifications)
	<div class="card mb-3">
		<div style="background: #1B1B23; height:1rem"><br></div>
		<!-- User Specification Header -->
		<div class="card-header">
			<!-- Check if its own profile -->
			@if($isOwnProfile)
			<span class="float-right">
				<a class="lw-icon-btn" href role="button" id="lwEdit<?= $specificationKey ?>" onclick="showHideSpecificationUser('<?= $specificationKey ?>', event)">
					<i class="fa fa-pencil-alt"></i>
				</a>
				<a class="lw-icon-btn" href role="button" id="lwClose<?= $specificationKey ?>Block" onclick="showHideSpecificationUser('<?= $specificationKey ?>', event)" style="display: none;">
					<i class="fa fa-times"></i>
				</a>
			</span>
			@endif
			<!-- /Check if its own profile -->
			<h5><?= $specifications['icon'] ?> <?= $specifications['title'] ?></h5>
		</div>
		<!-- /User Specification Header -->
		<div class="card-body">
			<!-- User Specification static container -->
			<div id="lw<?= $specificationKey ?>StaticContainer">
				@foreach(collect($specifications['items'])->chunk(2) as $specKey => $specification)
				<div class="form-group row">
					@foreach($specification as $itemKey => $item)
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label><strong><?= $item['label'] ?></strong></label>
						<div class="lw-inline-edit-text" data-model="specificationData.<?= $item['name'] ?>">
							<?= __tr($item['value'],escapeInputString:false) ?>
						</div>
					</div>
					@endforeach
				</div>
				@endforeach
			</div>
			<!-- /User Specification static container -->
			@if($isOwnProfile)
			<!-- User Specification Form -->
			<form class="lw-ajax-form lw-form" method="post" lwSubmitOnChange action="<?= route('user.write.profile_setting') ?>" data-callback="getUserProfileData" id="lwUser<?= $specificationKey ?>Form" style="display: none;">
				@foreach(collect($specifications['items'])->chunk(2) as $specification)
				<div class="form-group row">
					@foreach($specification as $itemKey => $item)
					<div class="col-sm-6 mb-3 mb-sm-0">
						@if($item['input_type'] == 'select')
						<label for="<?= $item['name'] ?>"><?= $item['label'] ?></label>
						<select name="<?= $item['name'] ?>" class="form-control custom-select">
							<option value="" selected disabled><?= __tr('Choose __label__', [
																	'__label__' => $item['label']
																]) ?></option>
							@if(!__isEmpty($item['options']))
							@foreach($item['options'] as $optionKey => $option)
							<option value="<?= $optionKey ?>" <?= $item['selected_options'] == $optionKey ? 'selected' : '' ?>>
								<?= __tr($option,escapeInputString:false) ?>
							</option>
							@endforeach
							@endif
						</select>
						@elseif($item['input_type'] == 'textbox')
						<label for="<?= $item['name'] ?>"><?= $item['label'] ?></label>
						<input type="text" id="<?= $item['name'] ?>" name="<?= $item['name'] ?>" class="form-control" value="<?= $item['selected_options'] ?>">
						@endif
					</div>
					@endforeach
				</div>
				@endforeach
			</form>
			<!-- /User Specification Form -->
			@endif
		</div>
	</div>
	@endforeach
	@endif
	<!-- /User Specifications -->

	@include('user.profile.wandr-profile-sections')
