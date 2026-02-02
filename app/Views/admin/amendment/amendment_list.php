<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>View Amendment<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="amendment_table">
                    <thead>
                        <tr>
                            <th>Edit</th>
                            <th>Level Name</th>
                            <th>Type Name</th>
                            <th>Subject Name</th>
                            <th>Amendent Name</th>
                            <th>View Amendment</th>
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
	var pageType = 'amendment-list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/amendment.js?v=1.0.0"></script>
<?= $this->endSection() ?>
