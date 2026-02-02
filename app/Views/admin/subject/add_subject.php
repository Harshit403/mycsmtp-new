<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Add Subject
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <?php 
                        $type_id = !empty($fetchSubjectRow) ? $fetchSubjectRow->type_id : '';
                        $subject_id = !empty($fetchSubjectRow) ? $fetchSubjectRow->subject_id : '';
                        $level_id =  !empty($fetchSubjectRow) ? $fetchSubjectRow->level_id : '';
                        $subject_name =  !empty($fetchSubjectRow) ? $fetchSubjectRow->subject_name : '';
                    ?>
                    <input type="hidden" id="subject_id" value="<?=$subject_id?>">
                    <input type="hidden" id="type_edit_id" value="<?=$type_id?>">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="level_name" class="form-label">Level</label>
                            <select class="form-control form-select form-select-sm" id="level_id">
                                <option value="">Select Level</option>
                                <?php if (!empty($fetchLevelList)): ?>
                                    <?php foreach ($fetchLevelList as $levelRow): ?>
                                        <?php 
                                            $select= '';
                                            if (!empty($level_id) && ($level_id==$levelRow->level_id)){
                                                $select='selected';
                                            }
                                        ?>
                                        <option value="<?=$levelRow->level_id?>" <?=$select?> ><?=$levelRow->level_name?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="level_name" class="form-label">Type</label>
                            <select class="form-control form-select form-select-sm" id="type_id">
                                <option value="">Select Type</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="level_name" class="form-label">Subject Name</label>
                            <input type="text" class="form-control form-control-sm" id="subject_name" placeholder="Subject Name" value="<?=$subject_name?>">
                        </div>
                        <div class="col-md-6">
                            <label for="level_name" class="form-label">Original Price</label>
                            <input type="number" class="form-control form-control-sm" id="original_price" placeholder="Original Name" value="<?=!empty($fetchSubjectRow) ? $fetchSubjectRow->original_price : ''?>">
                        </div>
                        <div class="col-md-6">
                            <label for="level_name" class="form-label">Offer Price</label>
                            <input type="number" class="form-control form-control-sm" id="offer_price" placeholder="Offer Name" value="<?=!empty($fetchSubjectRow) ? $fetchSubjectRow->offer_price : ''?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addSubjectBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/subject.js?v=1.0.1"></script>
<?= $this->endSection() ?>