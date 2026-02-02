<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Assignment Paper List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <?= $this->section('headingTitle') ?>
        <a href="<?=base_url()?>admin/assignment-level-list" class="btn btn-sm btn-outline-secondary rounded-circle" title="Go back"><i class="fas fa-arrow-left"></i></a>
    <?= $this->endSection() ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title d-flex align-items-center pt-2">
                <div class="font-weight-bold">Assignment Paper Table</div>
            </div>
            <?php
                if(session()->get('userData')!==null && session()->get('userData')['user_type']=='admin'){
                    ?>
                        <div class="card-tools d-flex align-items-center">
                            <div class="form-check mr-1">
                                <input class="form-check-input" type="checkbox" id="onlyCheck">
                                <label class="form-check-label font-weight-bold">Only Recheck</label>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-sm btn-success downloadRecheckCSVBtn"> <i class="fas fa-file-csv"></i> Export</a>
                        </div>
                    <?php
                }
            ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" id="level_id" value="<?=$level_id?>">
                    <?php
                        $user_type = '';
                        if(session()->get('userData')!==null && isset(session()->get('userData')['user_type'])){
                            $user_type = session()->get('userData')['user_type'];
                        }
                    ?>
                    <input type="hidden" id="user_type" value="<?=$user_type?>">
                    <div class="table-responsive">
                        <table style="width:100%" class="table-striped table-bordered display nowrap" id="assignmentPaperTable">
                            <thead>
                                <tr>
                                    <th>Paper Name</th>
                                    <th>Level Name</th>
                                    <th>Type Name</th>
                                    <th>Subject Name</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Student Mobile No.</th>
                                    <th>Download Assignment</th>
                                    <th>Checked By</th>
                                    <th>Upload Recheck Assignment</th>
                                    <th>Create Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<?= $this->endSection() ?>
<?=$this->section('jsContent')?>
<script type="text/javascript">
	var pageType = 'assignment-level-list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/assignment.js?v=1.0.2"></script>
<?= $this->endSection() ?>