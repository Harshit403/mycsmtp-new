<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Student Access
<?= $this->endSection() ?>
<?= $this->section('content') ?>
	<div class="card">
        <div class="card-header">
            <div class="card-title">
                <div class="font-weight-bold">Student Access Control</div>
            </div>
        </div>
		<div class="card-body">
			<table class="table table-striped" id="student_access_table">
                <thead>
                    <tr>
                        <th>Type Name</th>
                        <th>Level Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
		</div>
	</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'student-access';
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/student_access.js?v=1.0.0"></script>
<?= $this->endSection() ?>