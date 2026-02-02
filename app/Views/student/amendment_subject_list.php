<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Subjects List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container mt-3 mb-5 section">
        <div class="notesSubContainer my-3">
            <div class="row">
                <?php if (!empty($subject_id_details)): ?>
                    <?php $i = 0;?>
                    <?php foreach ($subject_id_details as $value): ?>
                        <div class="col-md-3 <?=($i > 0) ? 'mb-2' : ''?>">
                            <div class="card" style="height: 12rem !important;">
                                <div class="card-body p-3">
                                    <img src="<?=base_url()?>images/icon.svg">
                                    <a href="<?=base_url()?>amendment/amendment-list/<?=$value->subject_id?>" class="stretched-link"><h2 class="text-dark"><?=$value->subject_name?></h2></a>
                                </div>
                            </div>
                        </div>
                        <?php $i++;?>
                    <?php endforeach?>
                <?php else: ?>
                    <ul>
                        <li style="display: flex; justify-content: center;">
                            <div>
                                <div style="text-align: center;">
                                    <i class="fas fa-lock" style="font-size: 100px;"></i>
                                </div>
                                <a class="h2 btn" href="<?=base_url()?>level/level-list">Buy any plan</a>
                            </div>
                        </li>
                    </ul>
                <?php endif ?>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
    <script type="text/javascript">
        var pageType="student_sub_list";
    </script>
    <script src="<?=base_url()?>assets/js/custom_js/student_dashboard.js?v=1.0.2"></script>
<?= $this->endSection() ?>