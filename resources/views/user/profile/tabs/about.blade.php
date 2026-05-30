	<!-- User Basic Information -->
	<div class="card mb-3">
		<!-- Basic information Header -->
		<div class="card-header">
			<!-- Check if its own profile -->
			@if($isOwnProfile)
			<span class="float-right">
				<a class="lw-icon-btn" href role="button" id="lwEditBasicInformation">
					<i class="fa fa-pencil-alt"></i>
				</a>
				<a class="lw-icon-btn" href role="button" id="lwCloseBasicInfoEditBlock" style="display: none;">
					<i class="fa fa-times"></i>
				</a>
			</span>
			@endif
			<!-- /Check if its own profile -->
			<h5><i class="fas fa-info-circle text-info"></i> <?= __tr('Basic Information') ?></h5>
		</div>
		<!-- /Basic information Header -->
		<!-- Basic Information content -->
		<div class="card-body">
			<!-- Static basic information container -->
			<div id="lwStaticBasicInformation">
				@if($isOwnProfile)
				<div class="form-group row">
					<!-- First Name -->
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label for="first_name"><strong><?= __tr('First Name') ?></strong></label>
						<div class="lw-inline-edit-text" data-model="userData.first_name"><?= __ifIsset($userData['first_name'], $userData['first_name'], '-') ?></div>
					</div>
					<!-- /First Name -->
					<!-- Last Name -->
					<div class="col-sm-6">
						<label for="last_name"><strong><?= __tr('Last Name') ?></strong></label>
						<div class="lw-inline-edit-text" data-model="userData.last_name"><?= __ifIsset($userData['last_name'], $userData['last_name'], '-') ?></div>
					</div>
					<!-- /Last Name -->
				</div>
				@endif
				<div class="form-group row">
					<!-- Gender -->
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label for="select_gender"><strong><?= __tr('Gender') ?></strong></label>
						<div class="lw-inline-edit-text" data-model="profileData.gender_text">
							<?= __ifIsset($userProfileData['gender_text'], $userProfileData['gender_text'], '-') ?>
						</div>
					</div>
					<!-- /Gender -->
					<!-- Preferred Language -->
					<div class="col-sm-6">
						<label><strong><?= __tr('Preferred Language') ?></strong></label>
						<div class="lw-inline-edit-text" data-model="profileData.formatted_preferred_language">
							<?= __ifIsset($userProfileData['formatted_preferred_language'], $userProfileData['formatted_preferred_language'], '-') ?>
						</div>
					</div>
					<!-- /Preferred Language -->
				</div>
				<div class="form-group row">
					<!-- Relationship Status -->
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label><strong><?= __tr('Relationship Status') ?></strong></label>
						<div class="lw-inline-edit-text" data-model="profileData.formatted_relationship_status">
							<?= __ifIsset($userProfileData['formatted_relationship_status'], $userProfileData['formatted_relationship_status'], '-') ?>
						</div>
					</div>
					<!-- /Relationship Status -->
					<!-- Work Status -->
					<div class="col-sm-6">
						<label for="work_status"><strong><?= __tr('Work Status') ?></strong></label>
						<div class="lw-inline-edit-text" data-model="profileData.formatted_work_status">
							<?= __ifIsset($userProfileData['formatted_work_status'], $userProfileData['formatted_work_status'], '-') ?>
						</div>
					</div>
					<!-- /Work Status -->
				</div>
				<div class="form-group row">
					<!-- Education -->
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label for="education"><strong><?= __tr('Education') ?></strong></label>
						<div class="lw-inline-edit-text" data-model="profileData.formatted_education">
							<?= __ifIsset($userProfileData['formatted_education'], $userProfileData['formatted_education'], '-') ?>
						</div>
					</div>
					<!-- /Education -->
					<!-- Birthday --> 
					<div class="col-sm-6">
						<label for="birthday"><strong><?= __tr('Birthday') ?></strong></label>
						<div class="lw-inline-edit-text d-block" data-model="profileData.birthday">
							<?= __ifIsset($userProfileData['birthday'], $userProfileData['birthday'], '-') ?>
						</div>
					</div>
					<!-- /Birthday -->
				</div>
				@if(array_get($userProfileData, 'showMobileNumber'))
				<div class="form-group row">
					<!-- Mobile Number -->
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label for="mobile_number"><strong><?= __tr('Mobile Number') ?></strong></label>
						<div class="lw-inline-edit-text" data-model="profileData.mobile_number">
							<?= __ifIsset($userProfileData['mobile_number'], $userProfileData['mobile_number'], '-') ?>
						</div>
					</div>
					<!-- /Mobile Number -->
				</div>
				@endif
			</div>
			<!-- /Static basic information container -->

			@if($isOwnProfile)
			<!-- User Basic Information Form -->
			<form class="lw-ajax-form lw-form" lwSubmitOnChange method="post" data-show-message="true" action="<?= route('user.write.basic_setting') ?>" data-callback="getUserProfileData" style="display: none;" id="lwUserBasicInformationForm">
				<div class="form-group row">
					<!-- First Name -->
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label for="first_name"><?= __tr('First Name') ?></label>
						<input type="text" value="<?= $userData['first_name'] ?>" class="form-control" name="first_name" placeholder="<?= __tr('First Name') ?>" required>
					</div>
					<!-- /First Name -->
					<!-- Last Name -->
					<div class="col-sm-6">
						<label for="last_name"><?= __tr('Last Name') ?></label>
						<input type="text" value="<?= $userData['last_name'] ?>" class="form-control" name="last_name" placeholder="<?= __tr('Last Name') ?>" required>
					</div>
					<!-- /Last Name -->
				</div>
				<div class="form-group row">
					<!-- Gender -->
					<div class="col-sm-6 mb-3 mb-sm-0 mt-2">
						<label for="select_gender"><?= __tr('Gender') ?></label>
						<select name="gender" class="form-control custom-select" id="select_gender">
							<option value="" selected disabled><?= __tr('Choose your gender') ?></option>
							@foreach($genders as $genderKey => $gender)
							<option value="<?= $genderKey ?>" <?= (__ifIsset($userProfileData['gender']) and $genderKey == $userProfileData['gender']) ? 'selected' : '' ?>><?= $gender ?></option>
							@endforeach
						</select>
					</div>

					<!-- /Gender -->
					<!-- Birthday -->
					<div class="col-sm-6 mt-2">
						<label for="select_preferred_language"><?= __tr('Preferred Language') ?></label>
						<select name="preferred_language" class="form-control custom-select" id="select_preferred_language">
							<option value="" selected disabled><?= __tr('Choose your Preferred Language') ?></option>
							@foreach($preferredLanguages as $languageKey => $language)
							<option value="<?= $languageKey ?>" <?= (__ifIsset($userProfileData['preferred_language']) and $languageKey == $userProfileData['preferred_language']) ? 'selected' : '' ?>><?= $language ?></option>
							@endforeach
						</select>
					</div>
					<!-- /Preferred Language -->
				</div>
				<div class="form-group row">
					<!-- Relationship Status -->
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label for="select_relationship_status"><?= __tr('Relationship Status') ?></label>
						<select name="relationship_status" class="form-control custom-select" id="select_relationship_status">
							<option value="" selected disabled><?= __tr('Choose your Relationship Status') ?></option>
							@foreach($relationshipStatuses as $relationshipStatusKey => $relationshipStatus)
							<option value="<?= $relationshipStatusKey ?>" <?= (__ifIsset($userProfileData['relationship_status']) and $relationshipStatusKey == $userProfileData['relationship_status']) ? 'selected' : '' ?>><?= $relationshipStatus ?></option>
							@endforeach
						</select>
					</div>
					<!-- /Relationship Status -->
					<!-- Work status -->
					<div class="col-sm-6">
						<label for="select_work_status"><?= __tr('Work Status') ?></label>
						<select name="work_status" class="form-control custom-select" id="select_work_status">
							<option value="" selected disabled><?= __tr('Choose your work status') ?></option>
							@foreach($workStatuses as $workStatusKey => $workStatus)
							<option value="<?= $workStatusKey ?>" <?= (__ifIsset($userProfileData['work_status']) and $workStatusKey == $userProfileData['work_status']) ? 'selected' : '' ?>><?= $workStatus ?></option>
							@endforeach
						</select>
					</div>
					<!-- /Work status -->
				</div>
				<div class="form-group row">
					<!-- Education -->
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label for="select_education"><?= __tr('Education') ?></label>
						<select name="education" class="form-control custom-select" id="select_education">
							<option value="" selected disabled><?= __tr('Choose your education') ?></option>
							@foreach($educations as $educationKey => $educationValue)
							<option value="<?= $educationKey ?>" <?= (__ifIsset($userProfileData['education']) and $educationKey == $userProfileData['education']) ? 'selected' : '' ?>><?= $educationValue ?></option>
							@endforeach
						</select>
					</div>
					<!-- /Education -->
					<!-- Birthday -->
					<div class="col-sm-6">
						<label for="birthday"><?= __tr('Birthday') ?></label>
                        <input type="date" min="{{ getAgeDate(configItem('age_restriction.maximum'), 'max')->format('Y-m-d') }}" max="{{ getAgeDate(configItem('age_restriction.minimum'))->format('Y-m-d') }}" class="form-control d-block" name="birthday" placeholder="<?= __tr('DD-MM-YYYY') ?>" value="<?= __ifIsset($userProfileData['dob'], $userProfileData['dob']) ?>" required="true">
					</div>
					<!-- /Birthday -->
				</div>
				@if($isOwnProfile)

				<div class="form-group row">
					<!-- Mobile Number -->
                    <div class="form-group col-sm-6">
                        <label for="lwMobileNUmberField"><?= __tr('Mobile Number') ?></label>
                        <div class="input-group">
                            <select name="country_code" class="custom-select form-control lw-country-code-select" id="country_code" required>
                                <option value="">{{  __tr('Select Country Code') }}</option>
                                @foreach(getCountryPhoneCodes() as $getCountryCode)
                                <option value="<?= $getCountryCode['phone_code'] ?>" <?= ($userData['country_code'] == $getCountryCode['phone_code']) ? 'selected' : '' ?>><?= $getCountryCode['name'] ?> (0{{ $getCountryCode['phone_code'] }})</option>
                                @endforeach
                            </select>
                            <input type="number" value="{{ $userData['mobile_number'] }}" class="form-control lw-remove-spinner" placeholder="{{  __tr('Mobile Number') }}" name="mobile_number" required  minlength="8" maxlength="15">
                          </div>
                   </div>
					<!-- /Mobile Number -->
				</div>
				<!-- About Me -->
				<div class="form-group mt-5">
					<label for="about_me"><?= __tr('About Me') ?></label>
					<textarea class="form-control" name="about_me" id="about_me" rows="3" placeholder="<?= __tr('Say something about yourself.') ?>"><?= __ifIsset($userProfileData['aboutMe'], $userProfileData['aboutMe'], '') ?></textarea>
				</div>
				<!-- /About Me -->
				@endif
			</form>
			<!-- /User Basic Information Form -->
			@endif
		</div>
	</div>
	<!-- /User Basic Information -->
	<div class="card mb-3">
		<div class="card-header">
			@if($isOwnProfile)
			<span class="float-right">
				<a class="lw-icon-btn" href role="button" id="lwEditUserLocation">
					<i class="fa fa-pencil-alt"></i>
				</a>
				<a class="lw-icon-btn" href role="button" id="lwCloseLocationBlock" style="display: none;">
					<i class="fa fa-times"></i>
				</a>
			</span>
			@endif
			<h5><i class="fas fa-map-marker-alt"></i> <?= __tr('Location') ?></h5>
		</div>
		<div class="card-body">
			<div id="lwUserStaticLocation">
			@if(getStoreSettings('display_google_map'))
				<div class="gmap_canvas"><iframe height="300" id="gmap_canvas" src="https://maps.google.com/maps/place?q=<?= $latitude ?>,<?= $longitude ?>&output=embed&language={{ app()->getLocale() }}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				</div>
			@else
			<div id="staticMapId"></div>
			@endif
			</div>
            @if(getStoreSettings('allow_google_map') or getStoreSettings('use_static_city_data'))
			<div id="lwUserEditableLocation" style="display: none;">
			@if(getStoreSettings('use_static_city_data'))
				<div class="form-group">
					<label for="selectLocationCity"><?= __tr('Location') ?></label>
					<input type="text" id="selectLocationCity" class="form-control" placeholder="<?= __tr('Enter a location') ?>">
				</div>
				@else
				<div class="form-group">
					<label for="address_address"><?= __tr('Location') ?></label>
					<input type="text" id="address-input" name="address_address" class="form-control map-input" placeholder="<?= __tr('Enter a location') ?>">

					<!-- show select location on map error -->
					<div class="alert alert-danger mt-2 alert-dismissible" style="display: none" id="lwShowLocationErrorMessage">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<span data-model="locationErrorMessage"></span>
					</div>
					<!-- /show select location on map error -->

					<input type="hidden" name="address_latitude" data-model="profileData.latitude" id="address-latitude" value="<?= $latitude ?>" />
					<input type="hidden" name="address_longitude" data-model="profileData.longitude" id="address-longitude" value="<?= $longitude ?>" />
				</div>
				<div id="address-map-container" style="width:100%;height:400px; ">
					<div style="width: 100%; height: 100%" id="address-map"></div>
				</div>
			</div>
			@endif
			@else
			<!-- info message -->
			<div class="alert alert-info">
				<?= __tr('Something went wrong with Google Api Key, please contact to system administrator.') ?>
			</div>
			<!-- / info message -->
			@endif
		</div>
	</div>
