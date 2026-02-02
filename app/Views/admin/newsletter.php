<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Newsletter List<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex align-items-center pt-2">
                    <div class="font-weight-bold">Newsletter List</div>
                </div>
                <div class="card-tools">
                    <a href="#" class="btn btn-success btn-sm" id="sendNewsLetter"><i class="fas fa-telegram"></i> Send Newsletter</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="newsletter_table">
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
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'newsletter_admin';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/newsletter.js?v=1.0.1"></script>
<?= $this->endSection() ?>
