<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Notice List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="noticeListTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Edit</th>
                                <th>Notice</th>
                                <th>Create Time</th>
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
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/notice.js?v=1.0.0"></script>
<script type="text/javascript">
    var pageType = 'notice_list';
</script>
<?= $this->endSection() ?>
