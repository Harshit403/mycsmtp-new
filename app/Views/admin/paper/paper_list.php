<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Paper List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Level</label>
                            <select id="level_id" class="form-select form-select-sm">
                                <option value="">Select Level</option>
                                <?php foreach ($level_list as $levelRow): ?>
                                    <option value="<?=$levelRow->level_id?>"><?=$levelRow->level_name?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Type</label>
                            <select id="type_id" class="form-select form-select-sm">
                                <option value="">Select Types</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Subject</label>
                            <select id="subject_id" class="form-select form-select-sm">
                                <option value="">Select Subject</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Status</label>
                            <select id="type_status" class="form-select form-select-sm">
                                <option value="paid">Paid</option>
                                <option value="free">Free</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <table class="table table-striped" id="paperListTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Edit</th>
                                        <th>Level Name</th>
                                        <th>Type Name</th>
                                        <th>Subject Name</th>
                                        <th>Paper Name</th>
                                        <th>Q. Preview</th>
                                        <th>A. Preview</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Schedule Date</th>
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
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/admin_common.js?v=1.0.0"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/paper.js?v=1.0.1"></script>
<script type="text/javascript">
    var pageType = 'paper_list';
</script>
<?= $this->endSection() ?>
