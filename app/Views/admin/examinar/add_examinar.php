<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	<?=empty($examinarDetails) ? 'Add ' : 'Edit '?>Examinar
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="examinar_id" value="<?=!empty($examinarDetails) ? $examinarDetails->examinar_id : '';?>">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="examinar_name" class="form-label">Examinar Name</label>
                            <input type="text" class="form-control form-control-sm" id="examinar_name" placeholder="Examinar Name" aria-describedby="examinar_name" value="<?=!empty($examinarDetails) ? $examinarDetails->examinar_name : '';?>">
                        </div>
                        <div class="col-md-12">
                            <label for="examinar_email" class="form-label">Examinar Email</label>
                            <input type="email" class="form-control form-control-sm" id="examinar_email" placeholder="Examinar Email" aria-describedby="examinar_email" value="<?=!empty($examinarDetails) ? $examinarDetails->examinar_email : '';?>">
                        </div>
                        <div class="col-md-12">
                            <label for="examinar_mobile" class="form-label">Examinar Mobile</label>
                            <input type="number" class="form-control form-control-sm" id="examinar_mobile" placeholder="Examinar email" aria-describedby="examinar_mobile" value="<?=!empty($examinarDetails) ? $examinarDetails->examinar_mobile_no : '';?>">
                        </div>
                        <div class="form-password-toggle">
                        <label class="form-label" for="examinar_password">Password</label>
                        <div class="input-group">
                          <input type="password" class="form-control form-control-sm" id="examinar_password" placeholder="Examinar Password" aria-describedby="basic-default-password2">
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addExaminarBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType='add-examinar';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/examinar.js?v=1.0.0"></script>
<?= $this->endSection() ?>