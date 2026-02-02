<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Notes<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex align-items-center pt-2">
                    <div class="font-weight-bold">Add Notes</div>
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" id="notes_id" value="<?=!empty($notes_list) ? $notes_list->note_id : ''?>">
                <input type="hidden" id="level_id" value="<?=!empty($subject_details) ? $subject_details->level_id : ''?>">
                <input type="hidden" id="type_id" value="<?=!empty($subject_details) ? $subject_details->type_id : ''?>">
                <input type="hidden" id="subject_id" value="<?=!empty($subject_details)? $subject_details->subject_id : ''?>">
                <div class="row">
                    <div class="col-md-4">
                        <label>Levels</label>
                        <select class="form-control form-select" id="levels">
                            <option value="">Select Levels</option>
                            <?php foreach ($level_list as $value): ?>
                                <option value="<?=$value->level_id?>">
                                    <?=$value->level_name?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Types</label>
                        <select class="form-control form-select" id="type">
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Subjects</label>
                        <select class="form-control form-select" id="subject">
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label>Notes Name</label>
                        <input type="text" id="notes_name" placeholder="Notes Name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Add Notes</label>
                        <input type="file" id="notes_attachment" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <a href="<?=base_url()?>admin/blog-list" class="btn btn-secondary" >Cancel</a>
        <a href="javascript:void(0)" class="btn btn-success" id="addNotesBtn">Add Notes</a>
    </div>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'add_note';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/note.js?v=1.0.0"></script>
<?= $this->endSection() ?>