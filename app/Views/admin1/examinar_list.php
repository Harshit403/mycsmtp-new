<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Examinar List<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex align-items-center pt-2">
                    <div class="font-weight-bold">Examinar List</div>
                </div>
                <div class="card-tools">
                    <a href="#" class="btn btn-success btn-sm" id="addExaminar"><i class="fas fa-plus"></i> Add Eaxminar</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="examinar_table">
                    <thead>
                        <tr>
                            <th>Edit</th>
                            <th>Examinar Name</th>
                            <th>Examinar Email</th>
                            <th>Examinar Mobile No</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div style="display: none;">
    <div class="examinarAddContainer">
        <form id="examinarAddForm">
            <div class="row">
                <div class="col-md-12">
                    <label>Examinar Name</label>
                    <input type="text" class="form-control form-control-sm" name="examinar_name" id="examinar_name" placeholder="Examinar name">
                </div>
                <div class="col-md-12">
                    <label>Examinar Email</label>
                    <input type="email" class="form-control form-control-sm" name="examinar_email" id="examinar_email" placeholder="Examinar email">
                </div>
                <div class="col-md-12">
                    <label>Examinar Mobile</label>
                    <input type="number" class="form-control form-control-sm" name="examinar_mobile_no" id="examinar_mobile_no" placeholder="Examinar mobile no">
                </div>
                <div class="col-md-12">
                    <label>Examinar Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-sm" name="examinar_password" id="examinar_password">
                        <div class="input-group-append">
                            <span class="input-group-text passwordIcon"><i class="fas fa-lock"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'examinar';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/examinar.js"></script>
<?= $this->endSection() ?>
