<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Type List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container mt-3 mb-5 section">
        <div class="text-center">
            <h2>Type List</h2>
        </div>
        <div class="row my-4 typeContainer">
            <?php
                if(!empty($fetchAvailbleType)){
                    foreach($fetchAvailbleType as $typeRow){
                        ?>
                            <div class="col-md-4 my-2 mx-2">
                                <div class="customCard">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h1><?=$typeRow['type_name']?></h1>
                                            <small class="font-weight-bold"><?=$typeRow['batch_info']?></small>
                                        </div>
                                        <div class="col-md-12 text-center mt-5" style="height:auto">
                                            <a href="javascript:void(0)" class="typeBtn btn btn-secondary stretched-link" data-type-id="<?=$typeRow['type_id']?>">View subject <i class="fas fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                } else {
                    ?>
                        <div class="col-md-12 text-center">
                            <h2>There is no type available</h2>
                        </div>
                    <?php
                }
            ?>
        </div>
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
    <script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.2"></script>
<?= $this->endSection() ?>
