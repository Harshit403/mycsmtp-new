<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
	Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$getStudentCount?></h3>

                <p>Total Students Enrolled</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$studentLastDayEnrolled?></h3>
                <p>Last Day Student Enrolled</p>
              </div>
              <div class="icon">
                <i class="ion ion-user"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=!empty($uploadNotesCount) ? $uploadNotesCount : 0?></h3>

                <p>Total Notes Published</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-paper"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
<?= $this->endSection() ?>