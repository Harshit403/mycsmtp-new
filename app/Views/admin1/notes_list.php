	<?= $this->extend('layout/layout') ?>
	<?= $this->section('title') ?>View Notes<?= $this->endSection() ?>
	<?= $this->section('content') ?>
	<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex align-items-center pt-2">
                    <div class="font-weight-bold">Notes List</div>
                </div>
                <div class="card-tools">
                    <a href="<?=base_url()?>admin/notes-list/add" class="btn btn-success btn-sm" ><i class="fas fa-plus"></i> Add notes</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="notes_table">
                    <thead>
                        <tr>
                            <th>Edit</th>
                            <th>Subject Name</th>
                            <th>Notes Name</th>
                            <th>View Notes</th>
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
		var pageType = 'upload-notes';
	</script>
	<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/notes.js?v=1.0.1"></script>
	<?= $this->endSection() ?>
