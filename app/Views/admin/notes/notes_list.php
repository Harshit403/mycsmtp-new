<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>View Notes<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Type</label>
                        <select class="form-control form-select form-select-sm" id="note_type">
                            <option value="paid">Paid</option>
                            <option value="free">Free</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-3">
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
    </div>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'note-list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/note.js?v=1.0.1"></script>
<?= $this->endSection() ?>
