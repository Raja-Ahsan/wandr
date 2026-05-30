<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label><strong><?= __tr('Event types') ?></strong></label>
		<div class="lw-inline-edit-text"><?= $eventTypesDisplay ?? '-' ?></div>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label><strong><?= __tr('How often') ?></strong></label>
		<div class="lw-inline-edit-text"><?= $eventFrequencyDisplay ?? '-' ?></div>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label><strong><?= __tr('Budget') ?></strong></label>
		<div class="lw-inline-edit-text"><?= $eventBudgetDisplay ?? '-' ?></div>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label><strong><?= __tr('Notes') ?></strong></label>
		<div class="lw-inline-edit-text"><?= $eventNotesDisplay ?? '-' ?></div>
	</div>
</div>
