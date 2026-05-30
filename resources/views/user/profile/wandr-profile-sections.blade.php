@php
    $wandr = $wandrProfile ?? defaultWandrProfileExtras();
    $wandrConfig = $wandrProfileConfig ?? config('wandr-profile');
    $wandrDisplay = wandrProfileDisplayData($wandr, $wandrConfig);
    extract($wandrDisplay);
    $ep = $wandr['event_preferences'] ?? [];
    $gp = $wandr['gift_preferences'] ?? [];
    $travelRows = ! empty($wandr['travel_experiences']) ? $wandr['travel_experiences'] : [['destination' => '', 'year' => '', 'description' => '']];
    $hasWandrProfileData = ! empty($wandr['interests'])
        || ! empty($wandr['travel_experiences'])
        || ! empty($ep['types']) || ! empty($ep['frequency']) || ! empty($ep['budget']) || ! empty($ep['notes'])
        || ! empty($gp['categories']) || ! empty($gp['occasions']) || ! empty($gp['notes']);
    $suggestedInterestLabels = array_values($wandrConfig['interest_suggestions']);
    $customInterestsValue = implode(', ', array_filter($wandr['interests'], function ($interest) use ($suggestedInterestLabels, $wandrConfig) {
        return ! in_array($interest, $suggestedInterestLabels, true)
            && ! array_key_exists($interest, $wandrConfig['interest_suggestions']);
    }));
@endphp

@if($isOwnProfile || $hasWandrProfileData)

{{-- Interests --}}
<div class="card mb-3">
	<div style="background: #1B1B23; height:1rem"><br></div>
	<div class="card-header">
		@if($isOwnProfile)
		<span class="float-right">
			<a class="lw-icon-btn" href role="button" id="lwEditWandrInterests" onclick="showHideSpecificationUser('WandrInterests', event)">
				<i class="fa fa-pencil-alt"></i>
			</a>
			<a class="lw-icon-btn" href role="button" id="lwCloseWandrInterestsBlock" onclick="showHideSpecificationUser('WandrInterests', event)" style="display: none;">
				<i class="fa fa-times"></i>
			</a>
		</span>
		@endif
		<h5><i class="fas fa-heart text-danger"></i> <?= __tr('Interests') ?></h5>
	</div>
	<div class="card-body">
		<div id="lwWandrInterestsStaticContainer">
			@include('user.profile.partials.wandr-static.interests', $wandrDisplay)
		</div>
		@if($isOwnProfile)
		<form class="lw-ajax-form lw-form" method="post" action="<?= route('user.write.wandr_profile_extras') ?>" data-show-message="false" data-callback="lwAjaxFormSaved" data-lw-form-key="WandrInterests" data-lw-static-container="lwWandrInterestsStaticContainer" id="lwUserWandrInterestsForm" style="display: none;">
			<input type="hidden" name="wandr_section" value="interests">
			<div class="form-group row">
				<div class="col-sm-12 mb-3 mb-sm-0">
					@foreach($wandrConfig['interest_suggestions'] as $key => $label)
					<div class="custom-control custom-checkbox custom-control-inline mb-2">
						<input type="checkbox" class="custom-control-input" id="wandr_interest_{{ $key }}" name="interests[]" value="{{ $key }}"
							{{ in_array($key, $wandr['interests']) || in_array($label, $wandr['interests']) ? 'checked' : '' }}>
						<label class="custom-control-label" for="wandr_interest_{{ $key }}"><?= __tr($label) ?></label>
					</div>
					@endforeach
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 mb-3 mb-sm-0">
					<label for="wandr_custom_interests"><?= __tr('Other interests (comma separated)') ?></label>
					<input type="text" class="form-control" name="custom_interests" id="wandr_custom_interests" value="{{ $customInterestsValue }}">
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-sm"><?= __tr('Save') ?></button>
		</form>
		@endif
	</div>
</div>

{{-- Travel experiences --}}
<div class="card mb-3">
	<div style="background: #1B1B23; height:1rem"><br></div>
	<div class="card-header">
		@if($isOwnProfile)
		<span class="float-right">
			<a class="lw-icon-btn" href role="button" id="lwEditWandrTravel" onclick="showHideSpecificationUser('WandrTravel', event)">
				<i class="fa fa-pencil-alt"></i>
			</a>
			<a class="lw-icon-btn" href role="button" id="lwCloseWandrTravelBlock" onclick="showHideSpecificationUser('WandrTravel', event)" style="display: none;">
				<i class="fa fa-times"></i>
			</a>
		</span>
		@endif
		<h5><i class="fas fa-plane text-info"></i> <?= __tr('Travel experiences') ?></h5>
	</div>
	<div class="card-body">
		<div id="lwWandrTravelStaticContainer">
			@include('user.profile.partials.wandr-static.travel', $wandrDisplay)
		</div>
		@if($isOwnProfile)
		<form class="lw-ajax-form lw-form" method="post" action="<?= route('user.write.wandr_profile_extras') ?>" data-show-message="false" data-callback="lwAjaxFormSaved" data-lw-form-key="WandrTravel" data-lw-static-container="lwWandrTravelStaticContainer" id="lwUserWandrTravelForm" style="display: none;">
			<input type="hidden" name="wandr_section" value="travel">
			<div id="lwWandrTravelRowsContainer">
				@foreach($travelRows as $trip)
				<div class="form-group row lw-wandr-travel-row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label><?= __tr('Destination') ?></label>
						<input type="text" name="travel_destination[]" class="form-control" value="{{ $trip['destination'] ?? '' }}">
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label><?= __tr('Year') ?></label>
						<input type="text" name="travel_year[]" class="form-control" value="{{ $trip['year'] ?? '' }}">
					</div>
					<div class="col-sm-12 mb-3 mb-sm-0">
						<label><?= __tr('Experience') ?></label>
						<textarea name="travel_description[]" class="form-control" rows="2">{{ $trip['description'] ?? '' }}</textarea>
					</div>
					<div class="col-sm-12 mb-2 text-right">
						<button type="button" class="btn btn-sm btn-link text-danger lw-wandr-remove-travel-row"><?= __tr('Remove') ?></button>
					</div>
				</div>
				@endforeach
			</div>
			<button type="button" class="btn btn-sm btn-link text-primary mb-2" id="lwWandrAddTravelRow">+ <?= __tr('Add another trip') ?></button>
			<br>
			<button type="submit" class="btn btn-primary btn-sm"><?= __tr('Save') ?></button>
		</form>
		@endif
	</div>
</div>

{{-- Event preferences --}}
<div class="card mb-3">
	<div style="background: #1B1B23; height:1rem"><br></div>
	<div class="card-header">
		@if($isOwnProfile)
		<span class="float-right">
			<a class="lw-icon-btn" href role="button" id="lwEditWandrEvents" onclick="showHideSpecificationUser('WandrEvents', event)">
				<i class="fa fa-pencil-alt"></i>
			</a>
			<a class="lw-icon-btn" href role="button" id="lwCloseWandrEventsBlock" onclick="showHideSpecificationUser('WandrEvents', event)" style="display: none;">
				<i class="fa fa-times"></i>
			</a>
		</span>
		@endif
		<h5><i class="fas fa-calendar-alt text-warning"></i> <?= __tr('Event preferences') ?></h5>
	</div>
	<div class="card-body">
		<div id="lwWandrEventsStaticContainer">
			@include('user.profile.partials.wandr-static.events', $wandrDisplay)
		</div>
		@if($isOwnProfile)
		<form class="lw-ajax-form lw-form" method="post" action="<?= route('user.write.wandr_profile_extras') ?>" data-show-message="false" data-callback="lwAjaxFormSaved" data-lw-form-key="WandrEvents" data-lw-static-container="lwWandrEventsStaticContainer" id="lwUserWandrEventsForm" style="display: none;">
			<input type="hidden" name="wandr_section" value="events">
			<div class="form-group row">
				<div class="col-sm-12 mb-3 mb-sm-0">
					@foreach($wandrConfig['event_types'] as $key => $label)
					<div class="custom-control custom-checkbox custom-control-inline mb-2">
						<input type="checkbox" class="custom-control-input" id="wandr_event_{{ $key }}" name="event_types[]" value="{{ $key }}"
							{{ in_array($key, $ep['types'] ?? []) ? 'checked' : '' }}>
						<label class="custom-control-label" for="wandr_event_{{ $key }}"><?= __tr($label) ?></label>
					</div>
					@endforeach
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<label><?= __tr('How often') ?></label>
					<select name="event_frequency" class="form-control custom-select">
						<option value=""><?= __tr('Choose') ?></option>
						@foreach($wandrConfig['event_frequency'] as $key => $label)
						<option value="{{ $key }}" {{ ($ep['frequency'] ?? '') === $key ? 'selected' : '' }}><?= __tr($label) ?></option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-6 mb-3 mb-sm-0">
					<label><?= __tr('Budget') ?></label>
					<select name="event_budget" class="form-control custom-select">
						<option value=""><?= __tr('Choose') ?></option>
						@foreach($wandrConfig['event_budget'] as $key => $label)
						<option value="{{ $key }}" {{ ($ep['budget'] ?? '') === $key ? 'selected' : '' }}><?= __tr($label) ?></option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 mb-3 mb-sm-0">
					<label><?= __tr('Notes') ?></label>
					<textarea name="event_notes" class="form-control" rows="2">{{ $ep['notes'] ?? '' }}</textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-sm"><?= __tr('Save') ?></button>
		</form>
		@endif
	</div>
</div>

{{-- Gift preferences --}}
<div class="card mb-3">
	<div style="background: #1B1B23; height:1rem"><br></div>
	<div class="card-header">
		@if($isOwnProfile)
		<span class="float-right">
			<a class="lw-icon-btn" href role="button" id="lwEditWandrGifts" onclick="showHideSpecificationUser('WandrGifts', event)">
				<i class="fa fa-pencil-alt"></i>
			</a>
			<a class="lw-icon-btn" href role="button" id="lwCloseWandrGiftsBlock" onclick="showHideSpecificationUser('WandrGifts', event)" style="display: none;">
				<i class="fa fa-times"></i>
			</a>
		</span>
		@endif
		<h5><i class="fas fa-gift text-success"></i> <?= __tr('Gift preferences') ?></h5>
	</div>
	<div class="card-body">
		<div id="lwWandrGiftsStaticContainer">
			@include('user.profile.partials.wandr-static.gifts', $wandrDisplay)
		</div>
		@if($isOwnProfile)
		<form class="lw-ajax-form lw-form" method="post" action="<?= route('user.write.wandr_profile_extras') ?>" data-show-message="false" data-callback="lwAjaxFormSaved" data-lw-form-key="WandrGifts" data-lw-static-container="lwWandrGiftsStaticContainer" id="lwUserWandrGiftsForm" style="display: none;">
			<input type="hidden" name="wandr_section" value="gifts">
			<div class="form-group row">
				<div class="col-sm-12 mb-3 mb-sm-0">
					@foreach($wandrConfig['gift_categories'] as $key => $label)
					<div class="custom-control custom-checkbox custom-control-inline mb-2">
						<input type="checkbox" class="custom-control-input" id="wandr_gift_cat_{{ $key }}" name="gift_categories[]" value="{{ $key }}"
							{{ in_array($key, $gp['categories'] ?? []) ? 'checked' : '' }}>
						<label class="custom-control-label" for="wandr_gift_cat_{{ $key }}"><?= __tr($label) ?></label>
					</div>
					@endforeach
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 mb-3 mb-sm-0">
					@foreach($wandrConfig['gift_occasions'] as $key => $label)
					<div class="custom-control custom-checkbox custom-control-inline mb-2">
						<input type="checkbox" class="custom-control-input" id="wandr_gift_occ_{{ $key }}" name="gift_occasions[]" value="{{ $key }}"
							{{ in_array($key, $gp['occasions'] ?? []) ? 'checked' : '' }}>
						<label class="custom-control-label" for="wandr_gift_occ_{{ $key }}"><?= __tr($label) ?></label>
					</div>
					@endforeach
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 mb-3 mb-sm-0">
					<label><?= __tr('Notes') ?></label>
					<textarea name="gift_notes" class="form-control" rows="2">{{ $gp['notes'] ?? '' }}</textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-sm"><?= __tr('Save') ?></button>
		</form>
		@endif
	</div>
</div>

@endif
