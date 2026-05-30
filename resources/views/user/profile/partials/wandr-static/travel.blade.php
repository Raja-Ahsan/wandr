@if(!empty($wandr['travel_experiences']))
	@foreach($wandr['travel_experiences'] as $trip)
	<div class="form-group row">
		<div class="col-sm-6 mb-3 mb-sm-0">
			<label><strong><?= __tr('Destination') ?></strong></label>
			<div class="lw-inline-edit-text">{{ $trip['destination'] ?? '-' }}</div>
		</div>
		<div class="col-sm-6 mb-3 mb-sm-0">
			<label><strong><?= __tr('Year') ?></strong></label>
			<div class="lw-inline-edit-text">{{ !empty($trip['year']) ? $trip['year'] : '-' }}</div>
		</div>
	</div>
	@if(!empty($trip['description']))
	<div class="form-group row">
		<div class="col-sm-12 mb-3 mb-sm-0">
			<label><strong><?= __tr('Experience') ?></strong></label>
			<div class="lw-inline-edit-text">{{ $trip['description'] }}</div>
		</div>
	</div>
	@endif
	@endforeach
@else
<div class="form-group row">
	<div class="col-sm-12 mb-3 mb-sm-0">
		<label><strong><?= __tr('Travel experiences') ?></strong></label>
		<div class="lw-inline-edit-text">-</div>
	</div>
</div>
@endif
