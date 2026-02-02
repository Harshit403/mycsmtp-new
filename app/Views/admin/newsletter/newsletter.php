<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Newsletter List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools d-flex align-items-center justify-content-end flex-wrap">
                        <a href="javascript:void(0)" class="btn btn-success btn-sm" id="sendNewsLetter"> Send</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="newsletterListTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Student Email</th>
                                <th>Exist Student</th>
                                <th>Register Date</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/newsletter.js?v=1.0.0"></script>
<script type="text/javascript">
    var pageType = 'newsletter_list';
</script>
<?= $this->endSection() ?>
