<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	<?=empty($levelDetails) ? 'Add ' : 'Edit '?>Paper
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="paper_id" value="<?=!empty($paperDetails) ? $paperDetails->paper_id : '';?>">
                    <input type="hidden" id="type_edit_id" value="<?=!empty($paperDetails) ? $paperDetails->type_id : '';?>">
                    <input type="hidden" id="subject_edit_id" value="<?=!empty($paperDetails) ? $paperDetails->subject_id : '';?>">
                    <?php 
                        $level_id = !empty($paperDetails) ? $paperDetails->level_id : '';
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_name" class="form-label">Level</label>
                            <select class="form-control form-select form-select-sm" id="level_id">
                                <option value="">Select Level</option>
                                <?php if (!empty($fetchLevelList)): ?>
                                    <?php foreach ($fetchLevelList as $levelRow): ?>
                                        <?php 
                                            $select= '';
                                            if (!empty($level_id) && ($level_id==$levelRow->level_id)){
                                                $select='selected';
                                            }
                                        ?>
                                        <option value="<?=$levelRow->level_id?>" <?=$select?> ><?=$levelRow->level_name?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="level_name" class="form-label">Type</label>
                            <select class="form-control form-select form-select-sm" id="type_id">
                                <option value="">Select Type</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subject_name" class="form-label">Subject</label>
                            <select class="form-control form-select form-select-sm" id="subject_id">
                                <option value="">Select Subject</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="paper_name" class="form-label">Paper Name</label>
                            <input type="text"  class="form-control form-control-sm" id="paper_name" value="<?=!empty($paperDetails) ? $paperDetails->paper_name : ''?>" placeholder="Paper Name">
                        </div>
                        <div class="col-md-6">
                            <label for="question_paper_upload" class="form-label">Question Paper</label>
                            <input type="file" id="question_paper_upload" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label for="answer_paper_upload" class="form-label">Answer Paper</label>
                            <input type="file" id="answer_paper_upload" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label for="schedule_date" class="form-label">Schedule Date</label>
                            <input type="datetime-local" id="schedule_date" class="form-control form-control-sm" value="<?=!empty($paperDetails->schedule_date) ? $paperDetails->schedule_date : date('Y-m-d h:i:s')?>">
                        </div>
                        <div class="col-md-6">
                            <label for="type_status" class="form-label">Type</label>
                            <select class="form-control form-select form-select-sm" id="type_status">
                                <option value="paid" <?=!empty($paperDetails->type) && ($paperDetails->type=='paid') ? 'selected' : '' ?>>Paid</option>
                                <option value="free" <?=!empty($paperDetails->type) && ($paperDetails->type=='free') ? 'selected' : '' ?>>Free</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addPaperBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/paper.js?v=1.0.1"></script>
<script type="text/javascript">
    var pageType = 'add_paper';
</script>
<?= $this->endSection() ?>