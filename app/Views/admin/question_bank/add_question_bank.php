<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	<?=empty($levelDetails) ? 'Add ' : 'Edit '?> Question Bank
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="qbank_id" value="<?=!empty($qbankDetails) ? $qbankDetails->qbank_id : ''?>">
                    <input type="hidden" id="level" value="<?=!empty($qbankDetails) ? $qbankDetails->level_id : ''?>">
                    <input type="hidden" id="type" value="<?=!empty($qbankDetails) ? $qbankDetails->type_id : ''?>">
                    <input type="hidden" id="subject" value="<?=!empty($qbankDetails)? $qbankDetails->subject_id : ''?>">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Levels</label>
                            <select class="form-control form-select-sm form-select" id="level_id">
                                <option value="">Select Levels</option>
                                <?php foreach ($level_list as $value): ?>
                                    <option value="<?=$value->level_id?>" <?=!empty($qbankDetails->level_id) && ($value->level_id==$qbankDetails->level_id)  ? 'selected' : ''?>>
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
                                        <option value="<?=$value->type_id?>" <?=!empty($qbankDetails->type_id) && ($value->type_id==$qbankDetails->type_id)  ? 'selected' : ''?>>
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
                                        <option value="<?=$value->subject_id?>" <?=!empty($qbankDetails->subject_id) && ($value->subject_id==$qbankDetails->subject_id)  ? 'selected' : ''?>>
                                            <?=$value->subject_name?>
                                        </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Question Bank Name</label>
                            <input type="text" id="qbank_name" placeholder="Question Bank Name" class="form-control form-control-sm" value="<?=!empty($qbankDetails) ? $qbankDetails->qbank_name : ''?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Add Question Bank</label>
                            <input type="file" id="qbank_attachment" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addQbankBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/admin_common.js?v=1.0.0"></script>
<script type="text/javascript">
    var pageType = 'add_question_bank';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/qbank.js?v=1.0.1"></script>
<?= $this->endSection() ?>