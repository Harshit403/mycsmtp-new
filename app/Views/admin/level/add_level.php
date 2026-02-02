<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	<?=empty($levelDetails) ? 'Add ' : 'Edit '?>Level
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="level_id" value="<?=!empty($levelDetails) ? $levelDetails->level_id : '';?>">
                    <div>
                        <label for="level_name" class="form-label">Level Name</label>
                        <input type="text" class="form-control form-control-sm" id="level_name" placeholder="Level Name" aria-describedby="level_name" value="<?=!empty($levelDetails) ? $levelDetails->level_name : '';?>">
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addLevelBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/level.js?v=1.0.0"></script>
<?= $this->endSection() ?>
