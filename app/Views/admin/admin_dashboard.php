<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<style>
  .custom-card-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;
    max-width: 500px;
    padding: 0 10px;
  }
  .custom-card {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.2s;
    flex: 1;
  }
  .custom-card:hover {
    transform: translateY(-5px);
  }
  .custom-card:nth-child(1) {
    background-color: #ff6b6b;
    color: #ffffff;
  }
  .custom-card:nth-child(2) {
    background-color: #4dabf7;
    color: #ffffff;
  }
  .custom-card p {
    font-size: 1.2em;
    margin: 0;
  }
  @media (min-width: 600px) {
    .custom-card-container {
      flex-direction: row;
      gap: 20px;
    }
  }
</style>



<?php 
    $userData = session()->get('userData');
?>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Congratulations <?=$userData['user_name']?>! 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-medium">72%</span> more sales today. Check your new badge in
                                your profile.
                            </p>
                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="<?=base_url()?>/assets/admin_assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="custom-card-container">
    <div class="custom-card">
      <p>Total Students :- <?=$getStudentCount?></p>
    </div>
    <div class="custom-card">
      <p>Students enrolled in 24 hours:- <?=$studentLastDayEnrolled?></p>
    </div>
  </div>

<?= $this->endSection() ?>
