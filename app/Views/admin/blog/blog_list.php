<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Blog List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="blog_table">
                        <thead>
                            <tr>
                                <th>Edit</th>
                                <th>View Image</th>
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
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType = 'blog_list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/blog.js?v=1.0.0"></script>
<?= $this->endSection() ?>
