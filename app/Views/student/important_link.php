
<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
Important Links
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    .imp_link a {
        font-size: 20px;
        background-color: rgb(29, 183, 154);
        padding: 5px 10px;
        color: #fff;
    }
</style>
<section class="container mt-3 mb-5 section">

    <div class="row py-3">
        <div class="col-md-12 h1 text-center">
            Important Links
        </div>
    </div>
<hr>
    <div class="row pb-3 imp_link" style="min-height:50vh !important">
        <div class="col-md-12 text-center">
            <a href="https://www.icsi.edu/placement/important-announcement/" class="btn">Visit ICSI Important Announcement</a>
        </div>
          <div class="col-md-12 text-center">

  <a href="https://www.icsi.edu/studymaterialnewsyllabus/" class="btn">Download Study materails</a>

        </div>
           <div class="col-md-12 text-center">

          <a href="https://www.mca.gov.in/content/mca/global/en/acts-rules/ebooks/notifications.html" class="btn">MCA Portal</a>

        </div>
                <div class="col-md-12 text-center">
            <a href="https://www.icsi.edu/media/ResultD2022/index_Dec_2022.html" class="btn">Visit ICSI Result Portal</a>
        </div>
        <div><hr>
</section>
<?= $this->endSection() ?>