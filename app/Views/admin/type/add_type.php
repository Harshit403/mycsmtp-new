<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Add Type
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <?php 
                        $type_id = !empty($fetchTypeRow) ? $fetchTypeRow->type_id : '';
                        $level_id =  !empty($fetchTypeRow) ? $fetchTypeRow->level_id : '';
                        $type_name =  !empty($fetchTypeRow) ? $fetchTypeRow->type_name : '';
                    ?>
                    <input type="hidden" id="type_id" value="<?=$type_id?>">
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
                            <label for="level_name" class="form-label">Type Name</label>
                            <input type="text" class="form-control form-control-sm" id="type_name" placeholder="Type Name" value="<?=$type_name?>">
                        </div>
                        <div class="col-md-12">
                            <label for="level_name" class="form-label">Type More Details</label>
                            <textarea id="moreTypeDetails" class="summer_note">
                                <?=!empty($fetchTypeRow) ? $fetchTypeRow->type_more_details : ''?>
                            </textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="level_name" class="form-label">Batch Info</label>
                            <textarea id="batch_info" class="summer_note">
                                <?=!empty($fetchTypeRow) && !empty($fetchTypeRow->expiry_date) ?  $fetchTypeRow->batch_info : ''?>
                            </textarea>
                        </div>
                        <div class="col-md-6">
                            <?php 
                                $expiry_date = NULL;
                                if (!empty($fetchTypeRow) && !empty($fetchTypeRow->expiry_date)) {
                                   $expiry_date = explode(' ', $fetchTypeRow->expiry_date);
                                   $expiry_date = implode("T", $expiry_date);
                                }
                            ?>
                            <label>Expiry Date</label>
                            <input type="datetime-local" class="form-control form-control-sm mt-2" id="expiry_date" value="<?=$expiry_date ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="schedule_name" class="form-label">Schedule</label>
                            <div class="fileInputContainer">
                                <input type="file" class="form-control form-control-sm" id="schedule_file">
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn btn-success" id="addTypeBtn">Save</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/type.js?v=1.0.1"></script>
<?= $this->endSection() ?>