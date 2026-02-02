<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Student List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools d-flex align-items-center justify-content-end flex-wrap">
                        <a href="javascript:void(0)" class="btn btn-success btn-sm" id="exportStudentDetails"> <i class="fas fa-file-csv"></i> CSV Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="studentListTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>City Name</th>
                                    <th>State Name</th>
                                    <th>Curr. Level</th>
                                    <th>Block Status</th>
                                    <th>Create Date</th>
                                </tr>
                            </thead>
                        </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/student.js?v=1.0.1"></script>
<script type="text/javascript">
    var pageType = 'student_list';
</script>
<?= $this->endSection() ?>
