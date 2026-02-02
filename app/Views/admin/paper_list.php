<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>View Paper <?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
    <div class="card-header">
        <div class="card-title d-flex align-items-center pt-2">
            <div class="font-weight-bold">Paper List</div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div>
                        <table class="display nowrap table-bordered" id="paperListTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Edit</th>
                                    <th>Paper Name</th>
                                    <th>Level Name</th>
                                    <th>Type Name</th>
                                    <th>Subject Name</th>
                                    <th>Question Paper Preview</th>
                                    <th>Answer Paper Preview</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	</div>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'paper-list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/dashboard.js"></script>
<?= $this->endSection() ?>