<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Subject List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="subject_table">
                        <thead>
                            <tr>
                                <th>Edit</th>
                                <th>Level Name</th>
                                <th>Type Name</th>
                                <th>Subject Name</th>
                                <th>Original Price</th>
                                <th>Offer Price</th>
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
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/subject.js?v=1.0.1"></script>
<?= $this->endSection() ?>
