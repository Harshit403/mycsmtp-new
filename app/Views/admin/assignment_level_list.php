<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Level List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
	<div class="row">
		<?php foreach($getAssignmentLevelDetails as $levelList):?>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title font-weight-bold"><?=$levelList->level_name?></h5>
					<p class="card-text text-center"><a href="<?=base_url()?>admin/assignment-list/<?=$levelList->level_id?>" class="btn-outline-secondary border rounded-circle px-3 py-2 stretched-link"><i class="fas fa-angle-right"></i></a></p>
					<div class="d-flex justify-content-between">
						<div>Total Available Paper : <span><?=$levelList->assignment_paper_count?></span></div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach?>
	</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'assignment-level-list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/assignment.js?v=1.0.2"></script>
<?= $this->endSection() ?>