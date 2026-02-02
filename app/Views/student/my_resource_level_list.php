<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Level List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container mt-3 mb-5 section">
        <div class="text-center">
            <h2>Level List</h2>
        </div>
        <div class="row my-4 levelContainer">
            <?php
                if(!empty($fetchAvailbleLevel)){
                    foreach($fetchAvailbleLevel as $levelRow){
                        ?>
                            <div class="col-md-4 my-2 d-flex justify-content-center">
                                    <div class="card" style="width: 18rem;height:fit-content">
                                        <div class="card-body">
                                            <p class="card-text h1 text-center"><?=$levelRow['level_name']?></p>
                                            <div class="text-center">
                                            <a href="javascript:void(0)" class="levelBtn btn btn-secondary stretched-link rounded-circle" data-level-id="<?=$levelRow['level_id']?>" title="View Type"><i class="fas fa-angle-right text-white" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                    }
                } else {
                    ?>
                        <div class="col-md-12 text-center">
                            <h2>There is no level available</h2>
                        </div>
                    <?php
                }
            ?>
        </div>
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
    <script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.3"></script>
<?= $this->endSection() ?>
