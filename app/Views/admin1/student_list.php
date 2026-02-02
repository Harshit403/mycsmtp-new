<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Student List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
.dataTables_scroll
{
    overflow:auto;
}
</style>
<div class="card">
    <div class="card-header">
        <div class="card-title d-flex align-items-center pt-2">
            <div class="font-weight-bold">Student Table</div>
        </div>
        <div class="card-tools">
            <a href="javascript:void(0)" class="btn btn-success" id="exportStudentDetails"> <i class="fas fa-file-csv"></i> CSV Export</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div>
                        <table class="table table-bordered" id="studentListTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>City Name</th>
                                    <th>State Name</th>
                                    <th>Blocked</th>
                                    <th>Register Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'student-list';
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/student.js?v=1.0.2"></script>
<?= $this->endSection() ?>