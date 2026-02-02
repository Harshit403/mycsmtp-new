<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	<?=empty($levelDetails) ? 'Add ' : 'Edit '?> Amendment
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="amendment_id" value="<?=!empty($amendmentDetails) ? $amendmentDetails->amendment_id : ''?>">
                    <input type="hidden" id="level" value="<?=!empty($amendmentDetails) ? $amendmentDetails->level_id : ''?>">
                    <input type="hidden" id="type" value="<?=!empty($amendmentDetails) ? $amendmentDetails->type_id : ''?>">
                    <input type="hidden" id="subject" value="<?=!empty($amendmentDetails)? $amendmentDetails->subject_id : ''?>">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Levels</label>
                            <select class="form-control form-select-sm form-select" id="level_id">
                                <option value="">Select Levels</option>
                                <?php foreach ($level_list as $value): ?>
                                    <option value="<?=$value->level_id?>" <?=!empty($amendmentDetails->level_id) && ($value->level_id==$amendmentDetails->level_id)  ? 'selected' : ''?>>
                                        <?=$value->level_name?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Types</label>
                            <select class="form-control form-select-sm form-select" id="type_id">
                                <option value="">Select Type</option>
                                <?php if (!empty($type_list)): ?>
                                    <?php foreach ($type_list as $value): ?>
                                        <option value="<?=$value->type_id?>" <?=!empty($amendmentDetails->type_id) && ($value->type_id==$amendmentDetails->type_id)  ? 'selected' : ''?>>
                                            <?=$value->type_name?>
                                        </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                                
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Subjects</label>
                            <select class="form-control form-select-sm form-select" id="subject_id">
                                <option value="">Select Subject</option>
                                <?php if (!empty($subject_list)): ?>
                                    <?php foreach ($subject_list as $value): ?>
                                        <option value="<?=$value->subject_id?>" <?=!empty($amendmentDetails->subject_id) && ($value->subject_id==$amendmentDetails->subject_id)  ? 'selected' : ''?>>
                                            <?=$value->subject_name?>
                                        </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Amendment Name</label>
                            <input type="text" id="amendment_name" placeholder="Amendment Name" class="form-control form-control-sm" value="<?=!empty($amendmentDetails) ? $amendmentDetails->amendment_name : ''?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Add Amendment</label>
                            <input type="file" id="amendment_attachment" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addAmendmentBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/admin_common.js?v=1.0.0"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/amendment.js?v=1.0.0"></script>
<?= $this->endSection() ?>