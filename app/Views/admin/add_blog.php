<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Blog List<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <input type="hidden" id="blog_id" value="<?=$blog_id?>">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex align-items-center pt-2">
                    <div class="font-weight-bold">Add Blog</div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Heading</label>
                        <input type="text" id="blog_heading" class="form-control" placeholder="Blog Heading" value="<?=!empty($blog_data) ? $blog_data->blog_heading : '' ?>">
                    </div>
                    <div class="col-md-12">
                        <label>Add Image</label>
                        <input type="file" id="preview_image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Blog Body</label>
                        <textarea id="blog_body" placeholder="Blog Text">
                            <?php if (!empty($blog_data)): ?>
                                <?=$blog_data->blog_text?>
                            <?php endif ?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <a href="<?=base_url()?>admin/blog-list" class="btn btn-secondary" >Cancel</a>
        <a href="javascript:void(0)" class="btn btn-success" id="addBlogBtn">Add Blog</a>
    </div>
</div>
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'add_blog';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/blog_list.js?v=1.0.0"></script>
<?= $this->endSection() ?>