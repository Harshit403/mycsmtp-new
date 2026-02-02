<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Pending Payment<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex align-items-center pt-2">
                    <div class="font-weight-bold">Pending Payment List</div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="pending_payment_table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>Payment Details</th>
                            <th>Cart Items</th>
                            <th>Amount Payable</th>
                            <th>Payment Status</th>
                            <th>Action</th>
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
	var pageType = 'pending-payment';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/pending_payment.js"></script>
<?= $this->endSection() ?>