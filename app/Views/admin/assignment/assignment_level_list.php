<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Assignment Level List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="ass_sub_table">
                        <thead>
                            <tr>
                                <th>Level Name</th>
                                <?php if (session()->get('userData')['user_type']=='admin'): ?>
                                    <th>Total Assignment(Uncheck)</th>
                                <?php else: ?>
                                    <th>Uncheck Assignment</th>
                                <?php endif ?>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType = 'assignment_level_list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/assignment.js?v=1.0.3"></script>
<?= $this->endSection() ?>