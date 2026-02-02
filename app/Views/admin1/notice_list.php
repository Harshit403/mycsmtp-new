<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>View Notice<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<?php
	if (!empty($getnoticeList)) {
		foreach ($getnoticeList as $value) {
			?>
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-9">
								<?=!empty($value['notice_text']) ? $value['notice_text'] : ''?>
							</div>
							<div class="col-3 d-flex align-items-center justify-content-end">
								<button class="btn btn-danger btnClass deleteNotice" data-id="<?=$value['notice_id']?>">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	} else{
		?>
		<div class="col-md-12 d-flex justify-content-center align-items-center" style="height: 80vh;">
			<div>
				<div class="h3">
					No Items available here right now
					<div class="text-center">
						<img src="<?=base_url()?>images/empty_cart.jpg">
					</div>
				</div>
			</div>
		</div>

		<?php
	}
	?>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'upload-notice';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/dashboard.js?v=1.0.3"></script>
<?= $this->endSection() ?>
