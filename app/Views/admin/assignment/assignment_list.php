<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Assignment List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <?php
                        if(session()->get('userData')!==null && session()->get('userData')['user_type']=='admin'){
                            ?>
                                <div class="card-tools d-flex justify-content-end align-items-center flex-wrap" style="gap:10px;">
                                    <div class="form-check">
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
                    <input type="hidden" id="level_id" value="<?=$level_id?>">
                    <table class="table table-striped" id="assignment_table">
                        <thead>
                            <tr>
                                <th>Paper Name</th>
                                <th>Level Name</th>
                                <th>Type Name</th>
                                <th>Subject Name</th>
                                <th>Student Name</th>
                                <th>Student Email</th>
                                <th>Student Mobile No</th>
                                <th>Download Assignment</th>
                                <th>Checked By</th>
                                <th>Recheck Assignment Status</th>
                                <th>Submitted Date</th>
                                <th>Assignment Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType = 'assignment_list';
</script>
<script type="text/javascript" src="<?=base_url()?>/assets/js/custom_js/admin/assignment.js?v=1.0.3"></script>
<?= $this->endSection() ?>