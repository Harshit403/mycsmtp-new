<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Blog List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="container mt-3 mb-5 section">
    <div class="row py-3">
        <div class="col-md-12 h4 text-center">
            Blog List
        </div>
    </div>
    <div class="row pb-3" style="min-height:50vh !important">
        <div class="col-md-12 text-center">
        	<?php if (!empty($blog_items)): ?>
        		<?php foreach ($blog_items as $blogRow): ?>
		            <div class="card mb-2" style="border-radius: 10px;">
		            	<div class="row p-3">
		            		<div class="col-md-2 d-flex align-items-center justify-content-center">
		        				<img src="<?=base_url().$blogRow->blog_temp_image?>" style="height: 200px;width: 200px;" class="img-thumbnail">
		            		</div>
		            		<div class="col-md-10">
		            			<div class="h3" style="text-align: justify;">
		            				<?=$blogRow->blog_heading?>
		            			</div>
		            			<div style="text-align:justify; height: 100px;">
		            				<?php 
		            					$blog_text = trim($blogRow->blog_text);
		            					if (!empty($blog_text)) {
		            						if (strlen($blog_text) > 100) {
		            							$blog_text = substr((strip_tags($blog_text)),0,100).'....';
		            						}
		            					}
		            					echo $blog_text;
		            				?>
		            			</div>
		            			<div style="text-align: right !important;">
		            				<a href="<?=base_url()?>blog/<?=$blogRow->blog_id?>" class="btn bnt-sm btn-class" style="padding: 4px 16px; display: inline-block; justify-content:end;" >Read More</a>
		            			</div>
		            		</div>
		            	</div>
		            </div>
        		<?php endforeach ?>
        	<?php endif ?>
        </div>
    <div>
</section>
<?= $this->endSection() ?>