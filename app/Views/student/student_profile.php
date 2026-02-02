<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Profile
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container mt-3 mb-5 section">
        <div class="text-center">
            <h2>Student Profile</h2>
        </div>
        <div class="profileContainer">
            <div class="container">
                <h3><label class="border-bottom">Personal Details</label></h3>
                <form id="profileForm">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="student_name" placeholder="Enter Name" value="<?=$studentDetails->student_name?>"/>
                        </div>
                        <div class="col-md-6">
                            <label>Email Id</label>
                            <input type="email" class="form-control" name="email" value="<?=$studentDetails->email?>" disabled/>
                        </div>
                        <div class="col-md-6">
                            <label>Mobile No.</label>
                            <input type="number" class="form-control" name="mobile_no" placeholder="Enter Mobile No." value="<?=$studentDetails->mobile_no?>"/>
                        </div>
                        <div class="col-md-6">
                            <label>City Name</label>
                            <input type="text" class="form-control" name="city_name" placeholder="Enter City" value="<?=$studentDetails->city_name?>"/>
                        </div>
                        <div class="col-md-6">
                            <label>State Name</label>
                            <input type="text" class="form-control" name="state_name" placeholder="Enter State" value="<?=$studentDetails->state_name?>"/>
                        </div>
                        <div class="col-md-6">
                            <label>Level Name</label>
                            <select class="form-control form-select" name="current_level">
                                <?php
                                    if(!empty($level_list)){
                                        foreach($level_list as $levelRow){
                                            $selected = '';
                                            if($levelRow['level_id']==$studentDetails->current_level){
                                                $selected = 'selected';
                                            }
                                            ?>
                                                    <option value="<?=$levelRow['level_id']?>" <?=$selected?>><?=$levelRow['level_name']?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="javascript:void(0)" class="btn btn-success updateProfileBtn my-3" data-student-id="<?=$studentDetails->student_id?>">Update Profile</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <h3><label class="border-bottom">Change Password</label></h3>
                <form id="changePasswordForm">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Current Password</label>
                            <input type="password" class="form-control" name="old_pass" placeholder="Enter Old Password"/>
                        </div>
                        <div class="col-md-6">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="new_pass" placeholder="Enter New Password"/>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="javascript:void(0)" class="btn btn-success changePassBtn my-3" data-student-id="<?=$studentDetails->student_id?>">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script src="<?=base_url()?>assets/js/custom_js/student_profile.js?v=1.0.1"></script>
<?= $this->endSection() ?>