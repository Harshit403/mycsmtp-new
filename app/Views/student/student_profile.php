<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    My Profile - My CS MTP
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    :root {
        --primary: #10b981;
        --primary-dark: #059669;
        --primary-light: #d1fae5;
        --background: #f3f4f6;
        --card-bg: #ffffff;
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --border: #e5e7eb;
        --shadow: 0 1px 3px rgba(0,0,0,0.1);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
        --radius: 12px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--background);
        color: var(--text-primary);
        line-height: 1.5;
    }

    .profile-wrapper {
        max-width: 900px;
        margin: 0 auto;
        padding: 24px;
    }

    /* Profile Header */
    .profile-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: var(--radius);
        padding: 32px;
        margin-bottom: 24px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .profile-header-content {
        display: flex;
        align-items: center;
        gap: 24px;
        position: relative;
        z-index: 1;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid rgba(255,255,255,0.3);
    }

    .profile-avatar svg {
        width: 50px;
        height: 50px;
    }

    .profile-info h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .profile-info p {
        font-size: 14px;
        opacity: 0.9;
    }

    .level-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.2);
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin-top: 10px;
    }

    /* Section Card */
    .section-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
        margin-bottom: 20px;
        overflow: hidden;
    }

    .card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        border-bottom: 1px solid var(--border);
        background: var(--background);
    }

    .card-title {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-title svg {
        color: var(--primary);
    }

    .card-body {
        padding: 24px;
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group.full-width {
        grid-column: span 2;
    }

    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-input {
        padding: 12px 16px;
        border: 1px solid var(--border);
        border-radius: 10px;
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        color: var(--text-primary);
        background: var(--card-bg);
        transition: all 0.2s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .form-input:disabled {
        background: var(--background);
        cursor: not-allowed;
    }

    select.form-input {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 18px;
        padding-right: 44px;
    }

    /* Buttons */
    .btn-update {
        padding: 12px 28px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .btn-update:hover {
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        transform: translateY(-2px);
    }

    .btn-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }

    /* Password Section */
    .password-section .form-grid {
        margin-bottom: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-wrapper {
            padding: 16px;
        }

        .profile-header {
            padding: 24px 20px;
        }

        .profile-header-content {
            flex-direction: column;
            text-align: center;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: span 1;
        }

        .card-top {
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
        }

        .btn-container {
            justify-content: center;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<?php
$levelName = !empty($levelName) ? $levelName : 'CS';
?>

<div class="profile-wrapper">
    <!-- Profile Header -->
    <header class="profile-header">
        <div class="profile-header-content">
            <div class="profile-avatar">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div class="profile-info">
                <h1><?= htmlspecialchars($studentDetails->student_name) ?></h1>
                <p><?= htmlspecialchars($studentDetails->email) ?></p>
                <div class="level-badge">
                    <i class="fas fa-graduation-cap"></i>
                    <?= $levelName ?> Student
                </div>
            </div>
        </div>
    </header>

    <!-- Personal Details Section -->
    <div class="section-card">
        <div class="card-top">
            <h2 class="card-title">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Personal Details
            </h2>
        </div>
        <div class="card-body">
            <form id="profileForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-input" name="student_name" placeholder="Enter Name" value="<?=htmlspecialchars($studentDetails->student_name)?>"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Id</label>
                        <input type="email" class="form-input" name="email" value="<?=htmlspecialchars($studentDetails->email)?>" disabled/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <input type="number" class="form-input" name="mobile_no" placeholder="Enter Mobile No." value="<?=htmlspecialchars($studentDetails->mobile_no)?>"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" class="form-input" name="city_name" placeholder="Enter City" value="<?=htmlspecialchars($studentDetails->city_name)?>"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <input type="text" class="form-input" name="state_name" placeholder="Enter State" value="<?=htmlspecialchars($studentDetails->state_name)?>"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Level</label>
                        <select class="form-input" name="current_level">
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
                <div class="btn-container">
                    <button type="button" class="btn-update updateProfileBtn" data-student-id="<?=$studentDetails->student_id?>">
                        <i class="fas fa-save"></i>
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Change Password Section -->
    <div class="section-card password-section">
        <div class="card-top">
            <h2 class="card-title">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                Change Password
            </h2>
        </div>
        <div class="card-body">
            <form id="changePasswordForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-input" name="old_pass" placeholder="Enter Old Password"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-input" name="new_pass" placeholder="Enter New Password"/>
                    </div>
                </div>
                <div class="btn-container">
                    <button type="button" class="btn-update changePassBtn" data-student-id="<?=$studentDetails->student_id?>">
                        <i class="fas fa-lock"></i>
                        Change Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script src="<?=base_url()?>assets/js/custom_js/student_profile.js?v=1.0.2"></script>
<?= $this->endSection() ?>
