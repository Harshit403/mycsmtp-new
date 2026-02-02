<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	<?=empty($levelDetails) ? 'Add ' : 'Edit '?>Promocode
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="code_id" value="<?=!empty($promocodeDetails) ? $promocodeDetails->code_id : ''?>">
                    <form id="promoCodeForm">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="code_name" class="form-label">Promo Code Name</label>
                                <input type="text" class="form-control form-control-sm" name="code_name" id="code_name" placeholder="Promocode Name" value="<?=!empty($promocodeDetails->code_name) ? $promocodeDetails->code_name : ''?>">
                            </div>
                            <div class="col-md-6 pt-1">
                                <label for="validity_date" class="form-label">Validity Date</label>
                                <input type="date" class="form-control form-control-sm" name="validity_date" id="validity_date" value="<?=!empty($promocodeDetails->validity_date) ? date('Y-m-d',strtotime($promocodeDetails->validity_date)) : ''?>">
                            </div>
                            <div class="col-md-6 pt-1">
                                <label for="discount_type" class="form-label">Discount Type</label>
                                <select name="discount_type" id="discount_type" class="form-control form-select-sm" placeholder="Select Discount Type">
                                    <option value="amount" <?=!empty($promocodeDetails->discount_type)&& $promocodeDetails->discount_type=='amount' ? 'selected' : ''?>>Amount</option>
                                    <option value="percent" <?=!empty($promocodeDetails->discount_type)&& $promocodeDetails->discount_type=='percent' ? 'selected' : ''?>>Percent</option>
                                </select>
                            </div>
                            <div class="col-md-6 pt-1">
                                <label for="discount_amt" class="form-label">Discount Amount</label>
                                <input type="number" class="form-control form-control-sm" name="discount_amt" id="discount_amt" placeholder="Discount amount" step="0.01" value="<?=!empty($promocodeDetails->discount_amt) ? $promocodeDetails->discount_amt : ''?>">
                            </div>
                            <div class="col-md-6 pt-1">
                                <label for="min_cart_amt" class="form-label">Min Cart Value</label>
                                <input type="number" class="form-control form-control-sm" name="min_cart_amt" id="min_cart_amt" placeholder="Min Cart Amount" step="0.01" value="<?=!empty($promocodeDetails->min_cart_amt) ? $promocodeDetails->min_cart_amt : ''?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addPromocodeBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType='add_promocode';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/promocode.js?v=1.0.1"></script>
<?= $this->endSection() ?>
