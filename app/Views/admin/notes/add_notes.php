<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	<?=empty($note_details) ? 'Add ' : 'Edit '?>Note
<?= $this->endSection() ?>
<?= $this->section('content') ?>
   <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <input type="hidden" id="note_id" value="<?=!empty($note_details) ? $note_details->note_id : ''?>">
                <input type="hidden" id="level_id" value="<?=!empty($subject_details) ? $subject_details->level_id : ''?>">
                <input type="hidden" id="type_id" value="<?=!empty($subject_details) ? $subject_details->type_id : ''?>">
                <input type="hidden" id="subject_id" value="<?=!empty($subject_details)? $subject_details->subject_id : ''?>">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Levels</label>
                        <select class="form-control form-select-sm form-select" id="levels">
                            <option value="">Select Levels</option>
                            <?php foreach ($level_list as $value): ?>
                                <option value="<?=$value->level_id?>">
                                    <?=$value->level_name?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Types</label>
                        <select class="form-control form-select-sm form-select" id="type">
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Subjects</label>
                        <select class="form-control form-select-sm form-select" id="subject">
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Type</label>
                        <select class="form-control form-select form-select-sm" id="note_type">
                            <option value="paid" <?=(!empty($note_details) && ($note_details->type=='paid')) ? 'selected' : ''?>>Paid</option>
                            <option value="free" <?=(!empty($note_details) && ($note_details->type=='free')) ? 'selected' : ''?>>Free</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Notes Name</label>
                        <input type="text" id="notes_name" placeholder="Notes Name" class="form-control form-control-sm" value="<?=!empty($note_details) ? $note_details->notes_name : ''?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Add Notes</label>
                        <input type="file" id="notes_attachment" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="javascript:void(0)" class="btn btn-success" id="addNotesBtn">Add</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType = 'add-note';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/note.js?v=1.0.1"></script>
<?= $this->endSection() ?>
