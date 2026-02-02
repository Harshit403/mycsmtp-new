<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>View Question Bank<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="qbank_table">
                    <thead>
                        <tr>
                            <th>Edit</th>
                            <th>Level Name</th>
                            <th>Type Name</th>
                            <th>Subject Name</th>
                            <th>Question Bank Name</th>
                            <th>View Question Bank</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'question-bank-list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/qbank.js?v=1.0.1"></script>
<?= $this->endSection() ?>
