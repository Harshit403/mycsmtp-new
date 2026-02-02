<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Level List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="level_table">
                        <thead>
                            <tr>
                                <th>Edit</th>
                                <th>Level Name</th>
                                <th>Create Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/level.js?v=1.0.0"></script>
<?= $this->endSection() ?>
