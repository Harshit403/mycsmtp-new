<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Promo codes<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex align-items-center pt-2">
                    <div class="font-weight-bold">Promo code List</div>
                </div>
                <div class="card-tools">
                    <a href="#" class="btn btn-success btn-sm" id="addpromocodes"><i class="fas fa-plus"></i> Add Promocode</a>
                </div>
            </div>
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
<div style="display: none;">
    <div class="promoCodeContainer">
        <form id="promoCodeForm">
            <div class="row">
                <div class="col-md-12">
                    <label>Promo Code Name</label>
                    <input type="text" class="form-control" name="code_name" id="code_name" placeholder="Promocode Name">
                </div>
                <div class="col-md-6 pt-1">
                    <label>Validity Date</label>
                    <input type="date" class="form-control" name="validity_date" id="validity_date">
                </div>
                <div class="col-md-6 pt-1">
                    <label>Discount Type</label>
                    <select name="discount_type" id="discount_type" class="form-control form-select" placeholder="Select Discount Type">
                        <option value="amount">Amount</option>
                        <option value="percent">Percent</option>
                    </select>
                </div>
                <div class="col-md-6 pt-1">
                    <label>Discount Amount</label>
                    <input type="number" class="form-control" name="discount_amt" id="discount_amt" placeholder="Discount amount" step="0.01">
                </div>
                <div class="col-md-6 pt-1">
                    <label>Min Cart Value</label>
                    <input type="number" class="form-control" name="min_cart_amt" id="min_cart_amt" placeholder="Min Cart Amount" step="0.01">
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'promocode';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/promocode.js"></script>
<?= $this->endSection() ?>
