<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Assign Examinar
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="examinar_id" value="<?=!empty($examinar_id) ? $examinar_id : '';?>">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="level_id" class="form-label">Choose Level</label>
                            <select id="level_id" class="form-control form-select form-select-sm">
                                <option value="">Select Level</option>
                                <?php if (!empty($levelDetails)): ?>
                                    <?php foreach ($levelDetails as $levelRow): ?>
                                        <option value="<?=$levelRow->level_id?>"><?=$levelRow->level_name?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="type_id" class="form-label">Choose Type</label>
                            <select id="type_id" class="form-control form-select form-select-sm">
                                <option value="">Select Type</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="subject_id" class="form-label">Choose Subject</label>
                            <select id="subject_id" class="form-control form-select form-select-sm">
                                <option value="0">All Subject</option>
                            </select>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="javascript:void(0)" class="btn btn-success" id="assignExaminarBtn">Assign</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType='assign-examinar';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/examinar.js?v=1.0.0"></script>
<?= $this->endSection() ?>