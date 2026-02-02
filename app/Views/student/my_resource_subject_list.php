<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Subject List
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container container mt-3 mb-5 section" style="min-height:400px">
        <div class="text-center">
            <h2>Subject List</h2>
        </div>
        <div class="row my-4 subjectContainer">
            <ul class="grid-list">
                    <?php 
                    if(!empty($fetchAvailbleSubject)){
                        $k = 0;
                        $colorArray = ["351, 83%, 61%","170, 75%, 41%","42, 94%, 55%","229, 75%, 58%","351, 83%, 61%"];
                        foreach ($fetchAvailbleSubject as $subjectRow) {
                            if ($k==4) {
                                $k=0;
                            }
                            $color = $colorArray[$k];
                            $k++;
                            ?>
                                <li>
                                    <div class="category-card" style="--color:<?= $color?>">
                                        <div class="card-icon">
                                            <img src="<?=base_url()?>design_assets/images/category-1.svg" width="40" height="40" loading="lazy" alt="Online Degree Programs" class="img">
                                        </div>
                                        <h3 class="h3">
                                            <a href="#" class="card-title" style="height: 4rem !important;"><?=(strlen($subjectRow['subject_name'])>20) ? substr($subjectRow['subject_name'],0,20).'...' : $subjectRow['subject_name']?>
                                            </a>
                                        </h3>
                                        <h4>Level : <?=$subjectRow['level_name']?></h4>
                                        <h4>Type : <?=$subjectRow['type_name']?></h4>
                                        <!-- <p class="card-text">
                                            Lorem ipsum dolor consec tur elit adicing sed umod tempor.
                                        </p> -->
                                        <span class="card-badge"><a href="<?=base_url()?>my-resources/paper/<?=$subjectRow['subject_id'].'/'.$item_type?>">View Papers</a></span>
                                         <span class="card-badge mt-2" style="padding: 2px 30px;">
                                            <a class="scheduledBtn" href="<?=base_url().$subjectRow['schedule_file']?>" target="_blank">Schedule</a>
                                        </span>
                                    </div>
                                </li>
                            <?php
                        }
                    } else {
                        ?>
                            <li style="display: flex; justify-content: center;">
                                <div>
                                    <div style="text-align: center;">
                                        <i class="fas fa-lock" style="font-size: 100px;"></i>
                                    </div>
                                    <a class="h2 btn" href="<?=base_url()?>level/level-list">Buy any plan</a>
                                </div>
                            </li>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
    <script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.3"></script>
<?= $this->endSection() ?>
