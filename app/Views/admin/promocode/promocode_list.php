<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Promocode List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="promocode_table">
                        <thead>
                            <tr>
                                <th>Edit</th>
                                <th>Promo code Name</th>
                                <th>Validity</th>
                                <th>Discount Type</th>
                                <th>Discount Amount</th>
                                <th>Min Cart Price</th>
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
    var pageType = 'promocode_list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/promocode.js?v=1.0.1"></script>
<?= $this->endSection() ?>
