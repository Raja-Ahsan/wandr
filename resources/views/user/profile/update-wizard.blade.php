@section('page-title', __tr('Update Profile'))
@section('head-title', __tr('Update Profile'))
@section('keywordName', __tr('Update Profile'))
@section('keyword', __tr('Update Profile'))
@section('description', __tr('Update Profile'))
@section('keywordDescription', __tr('Update Profile'))
@section('page-image', getStoreSettings('logo_image_url'))
@section('twitter-card-image', getStoreSettings('logo_image_url'))
@section('page-url', url()->current())

<!-- include header -->
@include('includes.header')
<!-- /include header -->

<body class="bg-gradient-primary lw-login-register-page lw-profile-wizard-page">
	<div class="lw-page-bg" style="background-image: url(<?= asset('imgs/dating-banner.png') ?>);"></div>
	<div class="lw-wizard-bg-veil" aria-hidden="true"></div>

	<div class="container lw-wizard-shell">
		<div id="smartwizard" class="lw-update-wizard">
			<header class="lw-wizard-header">
				<a class="lw-wizard-logout-btn" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt"></i>
					<span><?= __tr('Logout') ?></span>
				</a>
				<a href="<?= url('') ?>" class="lw-wizard-brand">
					<img class="lw-logo-img" src="<?= getStoreSettings('logo_image_url') ?>" alt="<?= e(getStoreSettings('name')) ?>">
				</a>
				<p class="lw-wizard-eyebrow"><?= __tr('Almost there') ?></p>
				<h1 class="lw-wizard-title"><?= __tr('Complete your profile') ?></h1>
				<p class="lw-wizard-subtitle"><?= __tr('A few details help people discover the real you.') ?></p>
			</header>

			<ul class="lw-wizard-steps nav justify-content-center">
				<li>
					<a class="nav-link" href="#step-1">
						<span class="lw-wizard-step-index">1</span>
						<span class="lw-wizard-step-icon"><i class="fas fa-images"></i></span>
						<span class="lw-wizard-step-label"><?= __tr('Profile') ?></span>
					</a>
				</li>
				<li>
					<a class="nav-link" href="#step-2">
						<span class="lw-wizard-step-index">2</span>
						<span class="lw-wizard-step-icon"><i class="fas fa-map-marker-alt"></i></span>
						<span class="lw-wizard-step-label"><?= __tr('Location') ?></span>
					</a>
				</li>
				<li>
					<a class="nav-link" href="#step-3">
						<span class="lw-wizard-step-index">3</span>
						<span class="lw-wizard-step-icon"><i class="fas fa-check"></i></span>
						<span class="lw-wizard-step-label"><?= __tr('Finish') ?></span>
					</a>
				</li>
			</ul>

			<div class="tab-content lw-wizard-tab-content">
				<div id="step-1" class="tab-pane" role="tabpanel">
					<section class="lw-wizard-panel">
						<div class="lw-wizard-panel-head">
							<span class="lw-wizard-panel-kicker"><i class="fas fa-user"></i> <?= __tr('Step 1') ?></span>
							<h2 class="lw-wizard-panel-title"><?= __tr('About you') ?></h2>
							<p class="lw-wizard-panel-copy"><?= __tr('Add your birthday, gender, and photos so matches can find you.') ?></p>
						</div>

						<form class="lw-ajax-form lw-form lw-wizard-basics-form" lwSubmitOnChange method="post" data-show-message="true" action="<?= route('user.write.update_profile_wizard') ?>" data-callback="checkProfileStatus">
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<label for="birthday"><?= __tr('Birthday') ?></label>
									<input type="date" id="birthday" min="{{ getAgeDate(configItem('age_restriction.maximum'), 'max')->format('Y-m-d') }}" max="{{ getAgeDate(configItem('age_restriction.minimum'))->format('Y-m-d') }}" class="form-control d-block" name="birthday" placeholder="<?= __tr('DD-MM-YYYY') ?>" value="<?= __ifIsset($profileInfo['birthday'], $profileInfo['birthday']) ?>" required="true">
								</div>
								<div class="col-md-6 mb-3">
									<label for="select_gender"><?= __tr('Gender') ?></label>
									<select name="gender" class="form-control custom-select d-block" id="select_gender" required>
										<option value="" selected disabled><?= __tr('Choose your gender') ?></option>
										@foreach($genders as $genderKey => $gender)
										<option value="<?= $genderKey ?>" <?= (__ifIsset($profileInfo['gender']) and $genderKey == $profileInfo['gender']) ? 'selected' : '' ?>><?= $gender ?></option>
										@endforeach
									</select>
								</div>
							</div>
						</form>

						<div class="lw-wizard-upload-block" id="lwProfileAndCoverEditBlock">
							<div class="lw-wizard-upload-card lw-wizard-upload-card--avatar">
								<span class="lw-wizard-upload-label"><?= __tr('Profile photo') ?></span>
								<div class="lw-wizard-avatar-pond">
									<input type="file" name="filepond" class="filepond lw-file-uploader" id="lwFileUploader" data-remove-media="false" data-allowed-media='<?= getMediaRestriction('profile') ?>' data-callback="checkProfileStatus" data-default-image-url="<?= $profileInfo['profile_picture_url'] ?>" data-instant-upload="true" data-action="<?= route('user.upload_profile_image') ?>" data-label-idle="<?= __tr("Drag & Drop or __browseAction__", [
										'__browseAction__' => "<span class='filepond--label-action'>". __tr('Browse')."</span>"
									]) ?>" data-image-preview-height="170" data-image-crop-aspect-ratio="1:1" data-style-panel-layout="compact circle" data-style-load-indicator-position="center bottom" data-style-progress-indicator-position="right bottom" data-style-button-remove-item-position="left bottom" data-style-button-process-item-position="right bottom">
								</div>
								<small class="lw-wizard-upload-hint"><?= __tr('Square photo works best') ?></small>
							</div>
							<div class="lw-wizard-upload-card lw-wizard-upload-card--cover">
								<span class="lw-wizard-upload-label"><?= __tr('Cover photo') ?></span>
								<input type="file" name="filepond" class="filepond lw-file-uploader" id="lwFileUploaderCover" data-allowed-media='<?= getMediaRestriction('profile') ?>' data-default-image-url="<?= $profileInfo['cover_picture_url'] ?>" data-remove-media="false" data-instant-upload="true" data-action="<?= route('user.upload_cover_image') ?>" data-callback="checkProfileStatus" data-label-idle="<?= __tr("Drag & Drop your picture or __browseAction__", [
									'__browseAction__' => "<span class='filepond--label-action'>". __tr('Browse')."</span>"
								]) ?>">
								<small class="lw-wizard-upload-hint"><?= __tr('Wide image for your profile banner') ?></small>
							</div>
						</div>
					</section>
				</div>

				<div id="step-2" class="tab-pane" role="tabpanel">
					<section class="lw-wizard-panel">
						<div class="lw-wizard-panel-head">
							<span class="lw-wizard-panel-kicker"><i class="fas fa-map-marker-alt"></i> <?= __tr('Step 2') ?></span>
							<h2 class="lw-wizard-panel-title"><?= __tr('Where are you?') ?></h2>
							<p class="lw-wizard-panel-copy"><?= __tr('Set your location so nearby people can discover you.') ?></p>
						</div>

						@if(getStoreSettings('allow_google_map'))
						<div id="lwUserEditableLocation" class="lw-wizard-location">
							<div class="form-group">
								<label for="address-input"><?= __tr('Location') ?></label>
								<input type="text" id="address-input" name="address_address" class="form-control map-input" placeholder="<?= __tr('Enter a location') ?>">
								<input type="hidden" name="address_latitude" id="address-latitude" value="<?= $profileInfo['location_latitude'] ?>" />
								<input type="hidden" name="address_longitude" id="address-longitude" value="<?= $profileInfo['location_longitude'] ?>" />
							</div>
							<div id="address-map-container" class="lw-wizard-map">
								<div id="address-map"></div>
							</div>
						</div>
						@elseif(getStoreSettings('use_static_city_data') and ($wizardLocationData['hasStaticCities'] ?? false))
						<div class="form-group">
							<label for="selectLocationCity"><?= __tr('Location') ?></label>
							<input type="text" id="selectLocationCity" class="form-control lw-location-color" placeholder="<?= __tr('Enter a location') ?>">
							<small class="form-text text-muted"><?= __tr('Type at least 2 characters, then pick a city from the list.') ?></small>
						</div>
						@else
						@php
							$wizardCountries = $wizardLocationData['countries'] ?? [];
						@endphp
						<div class="lw-wizard-info-note">
							<i class="fas fa-info-circle"></i>
							<span><?= __tr('No Google API required. Select your country and city, or use your device location.') ?></span>
						</div>
						<div class="form-group">
							<label for="lwWizardCountry"><?= __tr('Country') ?></label>
							<select id="lwWizardCountry" class="form-control">
								<option value=""><?= __tr('Select country') ?></option>
								@foreach($wizardCountries as $country)
								<option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="lwWizardCity"><?= __tr('City') ?></label>
							<select id="lwWizardCity" class="form-control" disabled>
								<option value=""><?= __tr('Select country first') ?></option>
							</select>
						</div>
						<div class="lw-wizard-location-actions">
							<button type="button" class="btn btn-primary" id="lwSaveWizardCountryCity"><?= __tr('Save location') ?></button>
							<button type="button" class="btn btn-outline-light" id="lwUseCurrentLocation"><i class="fas fa-crosshairs mr-1"></i><?= __tr('Use my current location') ?></button>
						</div>
						@endif
					</section>
				</div>

				<div id="step-3" class="tab-pane" role="tabpanel">
					<section class="lw-wizard-panel lw-wizard-finish">
						<div class="lw-wizard-finish-glow" aria-hidden="true"></div>
						<div class="lw-wizard-finish-icon"><i class="fas fa-heart"></i></div>
						<p class="lw-wizard-panel-kicker"><?= __tr('You are ready') ?></p>
						<h2 class="lw-wizard-panel-title"><?= __tr('Congratulations') ?></h2>
						<p class="lw-wizard-panel-copy"><?= __tr('Your profile is set. Jump in and start discovering people near you.') ?></p>
						<a href class="btn btn-primary btn-lg lw-wizard-finish-btn lw-ajax-link-action" data-method="post" data-action="<?= route('user.profile.finish_wizard') ?>" data-callback="finishWizardCallback">
							<?= __tr('Start exploring') ?>
							<i class="fas fa-arrow-right ml-2"></i>
						</a>
					</section>
				</div>
			</div>
		</div>
	</div>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= __tr('Ready to Leave?') ?></h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<?= __tr('Select "Logout" below if you are ready to end your current session.') ?>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal"><?= __tr('Cancel') ?></button>
					<a class="btn btn-primary" href="<?= route('user.logout') ?>"><?= __tr('Logout') ?></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /Logout Modal-->
</body>
@lwPush('appScripts')
@if(getStoreSettings('allow_google_map'))
<script src="https://maps.googleapis.com/maps/api/js?key=<?= getStoreSettings('google_map_key') ?>&libraries=places&callback=initialize&language=en" async defer></script>
@endif
<script type="text/javascript">
	//set buttons
	function setButtons(stepNumber, stepsStatus, stepPosition) {
		if (stepPosition == 'first') {
			if (stepsStatus.step_one) {
				$(".sw-btn-next").attr('disabled', false);
			} else {
				$(".sw-btn-next").attr('disabled', true);
			}
		}else  if (stepPosition == 'middle') {
			if (stepsStatus.step_two) {
				$(".sw-btn-next").attr('disabled', false);
			} else {
				$(".sw-btn-next").attr('disabled', true);
			}
		}else  if (stepPosition == 'last'){
			$("#bonusCreditsImg").addClass('lw-bonus-credits-badge');
			var isEnableBonusCredits = "<?= getStoreSettings('enable_bonus_credits') ?>";
			if(isEnableBonusCredits == true){
				var response = jQuery.parseJSON('<?=bonusCreditNotification()?>');
				if(response.showBadge == true){ //check for show credit badge
					$('.credits-display-text').text(response.credits.credits);
					creditBadgeShow();
				}
			}
		}
	}

	var stepNumber = 0;
    window.stepPosition = 'first';
	//load steps status
	var stepsStatus = <?= json_encode($profileStatus) ?>;

	checkProfileStatus = function() {
		__DataRequest.get("<?= route('user.profile.wizard_completed') ?>", {}, function(response) {
			stepsStatus = response.data.profileStatus;
			setButtons(stepNumber, stepsStatus, stepPosition);
		}, {});
	};

	finishWizardCallback = function(response) {
		if (_.has(response.data, 'redirectURL')) {
			window.location = response.data.redirectURL;
		}
	};

	// Smart Wizard
	$('#smartwizard').smartWizard({
		selected: 0,
		transitionEffect: 'fade',
		showStepURLhash: false,
		transitionEffect: "none",
		transitionSpeed: '0',
        enableURLhash: false,
		toolbarSettings: {
			toolbarPosition: 'bottom',
			showPreviousButton: true,
			showNextButton: true,
		},
		lang: {
			next: "<?= __tr('Continue') ?>",
			previous: "<?= __tr('Back') ?>"
		}
	});

	// Step show event
	$("#smartwizard")
		.on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
			e.preventDefault();
			stepNumber = stepNumber;
            window.stepPosition = stepPosition;
			checkProfileStatus(stepNumber);
			$('.lw-update-wizard').attr('data-step-position', stepPosition);
		});

	setButtons(stepNumber, stepsStatus, stepPosition);

	function initialize() {

		$('form').on('keyup keypress', function(e) {
			var keyCode = e.keyCode || e.which;
			if (keyCode === 13) {
				e.preventDefault();
				return false;
			}
		});
		const locationInputs = document.getElementsByClassName("map-input");

		const autocompletes = [];
		const geocoder = new google.maps.Geocoder;
		for (let i = 0; i < locationInputs.length; i++) {

			const input = locationInputs[i];
			const fieldKey = input.id.replace("-input", "");
			const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

			const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
			const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;

			const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
				center: {
					lat: latitude,
					lng: longitude
				},
				zoom: 13
			});
			const marker = new google.maps.Marker({
				map: map,
				position: {
					lat: latitude,
					lng: longitude
				},
			});

			marker.setVisible(isEdit);

			const autocomplete = new google.maps.places.Autocomplete(input);
			autocomplete.key = fieldKey;
			autocompletes.push({
				input: input,
				map: map,
				marker: marker,
				autocomplete: autocomplete
			});
		}

		for (let i = 0; i < autocompletes.length; i++) {
			const input = autocompletes[i].input;
			const autocomplete = autocompletes[i].autocomplete;
			const map = autocompletes[i].map;
			const marker = autocompletes[i].marker;

			google.maps.event.addListener(autocomplete, 'place_changed', function() {
				marker.setVisible(false);
				const place = autocomplete.getPlace();

				geocoder.geocode({
					'placeId': place.place_id
				}, function(results, status) {
					if (status === google.maps.GeocoderStatus.OK) {
						const lat = results[0].geometry.location.lat();
						const lng = results[0].geometry.location.lng();
						setLocationCoordinates(autocomplete.key, lat, lng, place);
					}
				});

				if (!place.geometry) {
					window.alert("No details available for input: '" + place.name + "'");
					input.value = "";
					return;
				}

				if (place.geometry.viewport) {
					map.fitBounds(place.geometry.viewport);
				} else {
					map.setCenter(place.geometry.location);
					map.setZoom(17);
				}
				marker.setPosition(place.geometry.location);
				marker.setVisible(true);

			});
		}
	}


	function setLocationCoordinates(key, lat, lng, placeData) {

		__DataRequest.post("<?= route('user.write.location_data') ?>", {
			'latitude': lat,
			'longitude': lng,
			'placeData': placeData.address_components
		}, function(responseData) {
			var requestData = responseData.data;
			__DataRequest.updateModels('profileData', {
				city: requestData.city,
				country_name: requestData.country_name
			});

			if (responseData.reaction == 1) {
				_.defer(function() {
					checkProfileStatus();
				});
			}

			var mapSrc = "https://maps.google.com/maps/place?q=" + lat + "," + lng + "&output=embed";
			$('#gmap_canvas').attr('src', mapSrc);
		});
	};

	@if(!getStoreSettings('allow_google_map') and getStoreSettings('use_static_city_data') and ($wizardLocationData['hasStaticCities'] ?? false))
	$('#selectLocationCity').selectize({
		valueField: 'id',
		labelField: 'cities_full_name',
		searchField: [
			'cities_full_name'
		],
		create: false,
		maxItems: 1,
		render: {
			option: function(item, escape) {
				return '<div><span class="title"><span class="name">' + escape(item.cities_full_name) + '</span></span></div>';
			}
		},
		load: function(query, callback) {
			if (!query.length || (query.length < 2)) {
				return callback([]);
			} else {
				__DataRequest.post("<?= route('user.read.search_static_cities') ?>", {
					'search_query': query
				}, function(responseData) {
					callback(responseData.data.search_result);
				});
			}
		},
		onChange: function(value) {
			if (!value.length) {
				return;
			};
			__DataRequest.post("<?= route('user.write.store_city') ?>", {
				'selected_city_id': value
			}, function(responseData) {
				var requestData = responseData.data;
				__DataRequest.updateModels('profileData', {
					city: requestData.city,
					country_name: requestData.country_name
				});

				if (responseData.reaction == 1) {
					_.defer(function() {
						checkProfileStatus();
					});
				}
			});
		}
	});
	@endif

	@if(!getStoreSettings('allow_google_map') and (!getStoreSettings('use_static_city_data') or !($wizardLocationData['hasStaticCities'] ?? false)))
	function onWizardLocationSaved(responseData) {
		if (responseData.reaction == 1) {
			_.defer(function() {
				checkProfileStatus();
			});
		}
	}

	var wizardCitySelectize = $('#lwWizardCity').selectize({
		valueField: 'name',
		labelField: 'name',
		searchField: ['name'],
		create: false,
		maxItems: 1,
		placeholder: "<?= __tr('Select city') ?>",
		render: {
			option: function(item, escape) {
				return '<div><span class="title"><span class="name">' + escape(item.name) + '</span></span></div>';
			}
		}
	})[0].selectize;

	wizardCitySelectize.disable();

	function resetWizardCitySelect(placeholderText) {
		wizardCitySelectize.clear(true);
		wizardCitySelectize.clearOptions();
		wizardCitySelectize.disable();
		wizardCitySelectize.settings.placeholder = placeholderText || "<?= __tr('Select city') ?>";
		if (wizardCitySelectize.$control_input && wizardCitySelectize.$control_input.length) {
			wizardCitySelectize.$control_input.attr('placeholder', wizardCitySelectize.settings.placeholder);
		}
	}

	$('#lwWizardCountry').on('change', function() {
		var countryId = $(this).val();

		resetWizardCitySelect("<?= __tr('Loading cities...') ?>");

		if (!countryId) {
			resetWizardCitySelect("<?= __tr('Select country first') ?>");
			return;
		}

		__DataRequest.post("<?= route('user.read.cities_by_country') ?>", {
			'country_id': countryId
		}, function(responseData) {
			var cities = (responseData.data && responseData.data.cities) ? responseData.data.cities : [];

			wizardCitySelectize.clear(true);
			wizardCitySelectize.clearOptions();

			if (responseData.reaction != 1 || !cities.length) {
				resetWizardCitySelect("<?= __tr('No cities found') ?>");
				return;
			}

			var cityOptions = _.map(cities, function(cityName) {
				return {
					name: cityName
				};
			});

			wizardCitySelectize.addOption(cityOptions);
			wizardCitySelectize.enable();
			wizardCitySelectize.settings.placeholder = "<?= __tr('Select city') ?>";
			if (wizardCitySelectize.$control_input && wizardCitySelectize.$control_input.length) {
				wizardCitySelectize.$control_input.attr('placeholder', wizardCitySelectize.settings.placeholder);
			}
		});
	});

	$('#lwSaveWizardCountryCity').on('click', function() {
		var countryId = $('#lwWizardCountry').val();
		var city = wizardCitySelectize.getValue();

		if (!countryId || !city) {
			alert("<?= __tr('Please select a country and city.') ?>");
			return;
		}

		__DataRequest.post("<?= route('user.write.wizard_country_city') ?>", {
			'country_id': countryId,
			'city': city
		}, onWizardLocationSaved);
	});

	$('#lwUseCurrentLocation').on('click', function() {
		if (!navigator.geolocation) {
			alert("<?= __tr('Geolocation is not supported by your browser.') ?>");
			return;
		}

		$('#lwUseCurrentLocation').prop('disabled', true);

		navigator.geolocation.getCurrentPosition(function(position) {
			__DataRequest.post("<?= route('user.write.wizard_coordinates') ?>", {
				'latitude': position.coords.latitude,
				'longitude': position.coords.longitude
			}, function(responseData) {
				$('#lwUseCurrentLocation').prop('disabled', false);
				onWizardLocationSaved(responseData);
			});
		}, function() {
			$('#lwUseCurrentLocation').prop('disabled', false);
			alert("<?= __tr('Unable to get your location. Please allow location access or select your city.') ?>");
		});
	});
	@endif

	// Get user profile data
	function getUserProfileData(response) {
		// If successfully stored data
		if (response.reaction == 1) {
			__DataRequest.get("<?= route('user.get_profile_data', ['username' => getUserAuthInfo('profile.username')]) ?>", {}, function(responseData) {
				var requestData = responseData.data;
				var specificationUpdateData = [];
				_.forEach(requestData.userSpecificationData, function(specification) {
					_.forEach(specification['items'], function(item) {
						specificationUpdateData[item.name] = item.value;
					});
				});

				__DataRequest.updateModels('profileData', requestData.userProfileData);

			});
		}
	}
</script>
@lwPushEnd

<!-- include footer -->
@include('includes.footer')
<!-- /include footer -->
