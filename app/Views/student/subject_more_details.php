<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    More Details
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container mt-3 mb-5 section">
        <div class="row py-3">
            <div class="col-md-12 h2 text-center">
                <?=$moreDetails->subject_name?> (More Details)
            </div>
        </div>
        <div class="moreDetailsContainer py-3">
            <div class="row" style="min-height:50vh !important">
                <div class="col-md-12 text-center">
                    <?=$moreDetails->more_details?>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<?= $this->endSection() ?>