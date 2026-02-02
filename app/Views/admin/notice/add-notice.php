<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	<?=empty($levelDetails) ? 'Add ' : 'Edit '?>Notice
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" id="notice_id" value="<?=!empty($noticeDetails) ? $noticeDetails->notice_id : '';?>">
                    <div>
                        <label for="notice_text" class="form-label">Notice</label>
                        <textarea id="notice_text" placeholder="Notice">
                            <?=!empty($noticeDetails->notice_text) ? $noticeDetails->notice_text : '';?>
                        </textarea>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addNoticeBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/notice.js?v=1.0.0"></script>
<?= $this->endSection() ?>