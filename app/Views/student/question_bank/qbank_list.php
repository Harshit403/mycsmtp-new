<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Question Bank List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container mt-3 mb-5 section">
        <div class="notesContainer my-3">
            <div class="row">
                <?php if (!empty($qbank_list)): ?>
                    <?php $i = 0;?>
                    <div class="table-responsive">
                        <div class="col-md-12">
                            <table class="table align-middle">
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Question Bank Name</th>
                                    <th>Question Bank</th>
                                </tr>
                    <?php foreach ($qbank_list as $value): ?>
                            <?php $count = ($i+1)?>
                            <tr>
                                <td><?=$count;?></td>
                                <td><?=!empty($value->qbank_name) ? ($value->qbank_name) : ''?></td>
                                <td><a href="<?=base_url().$value->qbank_file?>" class="btn btn-info" download="<?=!empty($value->qbank_name) ? ($value->qbank_name) : ''?>"><i class="fas fa-file-pdf fa-fw text-danger"></i> <b>Download</b></a></td>
                            </tr>
                        <?php $i++;?>
                    <?php endforeach?>
                            </table>
                        </div>
                <?php else: ?>
                    <h1 class="text-center">No Amendment Available</h1>
                <?php endif ?>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
    <script type="text/javascript">
        var pageType="student_amendment_list";
    </script>
    <script src="<?=base_url()?>assets/js/custom_js/student_dashboard.js?v=1.0.2"></script>
<?= $this->endSection() ?>