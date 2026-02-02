<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title font-weight-bold">
						<i class="fas fa-bullhorn"></i> Upload Notice
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<textarea id="notice_text"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-right">
							<button id="uploadNoticeBtn" class="btn btn-sm btnClass btn-success">Upload</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'upload-notice';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/dashboard.js?v=1.0.4"></script>
<?= $this->endSection() ?>
