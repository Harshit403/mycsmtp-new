<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
    Control Validity
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <?php if (!empty($fetchTypeList)): ?>
        <?php foreach ($fetchTypeList as $type): ?>
            <div class="row">
                <div class="col-lg-3 mb-4">
                    <div><?=$type->type_name?></div>
                    <div><?=$type->batch_info?></div>
                </div>
                <div class="col-lg-3 mb-4 d-flex align-items-center">
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger typeValidityBtn" data-type-id="<?=$type->type_id?>"><i class="bx bx-trash text-white"></i></a>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType = 'control-validity';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/validity.js?v=1.0.2"></script>
<?= $this->endSection() ?>