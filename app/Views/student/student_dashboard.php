<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Dashboard - My CS MTP
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

    .dashboard-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 24px;
    }

    /* Header */
    .dashboard-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: var(--radius);
        padding: 32px;
        margin-bottom: 24px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .header-text h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .header-text p {
        font-size: 15px;
        opacity: 0.9;
    }

    /* Stats Row */
    .stats-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 24px;
    }

    .stat-box {
        background: var(--card-bg);
        border-radius: var(--radius);
        padding: 20px;
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
    }

    .stat-box h4 {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px;
    }

    .stat-value {
        font-size: 26px;
        font-weight: 700;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .stat-box.danger .stat-value {
        color: #ef4444;
    }

    .social-icons {
        display: flex;
        gap: 8px;
    }

    .social-icons a {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--background);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .social-icons a:hover {
        background: var(--primary);
        color: white;
    }

    /* Card */
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
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        background: var(--background);
    }

    .card-title {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .card-title svg {
        color: var(--primary);
    }

    .view-btn {
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        background: var(--primary-light);
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .view-btn:hover {
        background: var(--primary);
        color: white;
    }

    .card-content {
        padding: 16px 20px;
    }

    /* Quick Access Grid */
    .quick-access {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 12px;
    }

    .access-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px 8px;
        background: var(--background);
        border-radius: 10px;
        text-decoration: none;
        color: var(--text-primary);
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .access-item:hover {
        background: var(--card-bg);
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    .access-item svg {
        width: 28px;
        height: 28px;
        color: var(--primary);
        margin-bottom: 8px;
        transition: transform 0.2s ease;
    }

    .access-item:hover svg {
        transform: scale(1.1);
    }

    .access-item span {
        font-size: 12px;
        font-weight: 600;
        text-align: center;
    }

    /* Buy Now - Prominent */
    .access-item.buy-now {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
    }

    .access-item.buy-now svg {
        color: white;
        width: 32px;
        height: 32px;
    }

    .access-item.buy-now span {
        color: white;
    }

    .access-item.buy-now:hover {
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        transform: translateY(-3px);
    }

    /* List Items */
    .item-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .item-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 16px;
        background: var(--background);
        border-radius: 10px;
        text-decoration: none;
        color: var(--text-primary);
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .item-link:hover {
        background: var(--card-bg);
        border-color: var(--primary);
        box-shadow: var(--shadow);
        padding-left: 20px;
    }

    .item-name {
        font-weight: 600;
        font-size: 14px;
    }

    .item-arrow {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        background: var(--primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s ease;
    }

    .item-link:hover .item-arrow {
        transform: scale(1.1);
    }

    /* Empty State */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
        text-align: center;
        background: var(--background);
        border-radius: 10px;
    }

    .empty-state svg {
        width: 48px;
        height: 48px;
        color: var(--text-secondary);
        margin-bottom: 12px;
    }

    .empty-state p {
        color: var(--text-secondary);
        font-size: 14px;
        font-weight: 500;
    }

    /* Toggle Badge */
    .toggle-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .toggle-link.premium {
        background: var(--primary);
        color: white;
    }

    .toggle-link.free {
        background: var(--card-bg);
        color: var(--text-primary);
        border: 1px solid var(--border);
    }

    .toggle-link:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Query Card */
    .query-box {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 18px 20px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: var(--radius);
        text-decoration: none;
        color: white;
        margin-top: 20px;
        transition: all 0.2s ease;
        box-shadow: var(--shadow-md);
    }

    .query-box:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .query-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .query-icon svg {
        width: 24px;
        height: 24px;
    }

    .query-text {
        font-weight: 600;
        font-size: 15px;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .quick-access {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 640px) {
        .dashboard-container {
            padding: 16px;
        }

        .dashboard-header {
            padding: 24px 20px;
            text-align: center;
        }

        .header-text h1 {
            font-size: 24px;
        }

        .stats-row {
            grid-template-columns: 1fr;
        }

        .quick-access {
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }

        .access-item {
            padding: 16px 6px;
        }

        .access-item svg {
            width: 24px;
            height: 24px;
            margin-bottom: 6px;
        }

        .access-item span {
            font-size: 11px;
        }

        .card-top {
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<?php
    $studentData = (session()->get('studentDetails')!==null) ? session()->get('studentDetails') : '';
    $timestamp = time();
    $am_pm = date('a', $timestamp);
    $greeting = ($am_pm=='am') ? 'Good morning' : 'Good evening';
    
    $date1=date_create(EXAM_DATE);
    $date2=date_create(date('Y-m-d'));
    $diff=date_diff($date1,$date2);
    $daysLeft = $diff->days;
?>

<div class="dashboard-container">
    <!-- Header -->
    <header class="dashboard-header">
        <div class="header-text">
            <h1><?=$greeting?>, <?=$studentData['student_name']?></h1>
            <p>Your progress today shapes your success tomorrow</p>
        </div>
    </header>

    <!-- Stats -->
    <div class="stats-row">
        <div class="stat-box danger">
            <h4>Exam Countdown</h4>
            <div class="stat-value">
                <i class="far fa-clock"></i>
                <?=$daysLeft?> Days
            </div>
        </div>
        
        <div class="stat-box">
            <h4>Connect With Us</h4>
            <div class="social-icons">
                <a href="https://Instagram.com/mycsmtp" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://telegram.dog/mycsmtp" target="_blank"><i class="fab fa-telegram"></i></a>
                <a href="https://facebook.com/mycsmtp" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://youtube.com/@mycsmtp" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Quick Access -->
    <div class="section-card">
        <div class="card-top">
            <h2 class="card-title">
                <i class="fas fa-th-large"></i>
                Quick Access
            </h2>
            <?php if (!empty($item_type) && $item_type=='free'): ?>
                <a href="<?=base_url()?>dashboard" class="toggle-link premium">
                    <i class="fas fa-star"></i> Premium
                </a>
            <?php else: ?>
                <a href="<?=base_url()?>dashboard/free" class="toggle-link free">
                    <i class="fas fa-gift"></i> Free
                </a>
            <?php endif ?>
        </div>
        <div class="card-content">
            <div class="quick-access">
                <a href="<?=base_url()?>my-resources/subject/<?=$item_type?>" class="access-item">
                    <i class="fas fa-file-alt"></i>
                    <span>Test Papers</span>
                </a>
                <a href="<?=base_url()?>notes/subject-list" class="access-item">
                    <i class="fas fa-book"></i>
                    <span>Notes</span>
                </a>
                <a href="<?=base_url()?>amendment/subject-list" class="access-item">
                    <i class="fas fa-edit"></i>
                    <span>Amendments</span>
                </a>
                <a href="<?=base_url()?>buy-courses" class="access-item buy-now">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Buy Now</span>
                </a>
                <a href="#" class="access-item">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Mentoring</span>
                </a>
                <a href="#" class="access-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Schedule</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Test Papers -->
    <div class="section-card">
        <div class="card-top">
            <h2 class="card-title">
                <i class="fas fa-file-alt"></i>
                My Test Papers
            </h2>
            <a href="<?=base_url()?>my-resources/subject/<?=$item_type?>" class="view-btn">
                View All <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="card-content">
            <div class="item-list">
                <?php if (!empty($fetch_sub)): ?>
                    <?php foreach ($fetch_sub as $value): ?>
                        <a href="<?=base_url()?>my-resources/paper/<?=$value['subject_id'].'/'.$item_type?>" class="item-link">
                            <span class="item-name"><?=$value['subject_name']?></span>
                            <span class="item-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </a>
                    <?php endforeach ?>
                <?php else: ?>
                    <div class="empty-state">
                        <?php if (!empty($item_type) && $item_type=='free'): ?>
                            <i class="fas fa-folder-open"></i>
                            <p>No free test papers available</p>
                        <?php else: ?>
                            <i class="fas fa-lock"></i>
                            <p>Premium content requires subscription</p>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <!-- Notes -->
    <div class="section-card">
        <div class="card-top">
            <h2 class="card-title">
                <i class="fas fa-book"></i>
                My Notes
            </h2>
            <a href="<?=base_url()?>notes/subject-list/<?=$item_type?>" class="view-btn">
                View All <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="card-content">
            <div class="item-list">
                <?php if (!empty($notes_sub)): ?>
                    <?php foreach ($notes_sub as $notesRow): ?>
                        <a href="<?=base_url()?>notes/notes-list/<?=$notesRow->subject_id?>" class="item-link">
                            <span class="item-name"><?=$notesRow->subject_name?></span>
                            <span class="item-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </a>
                    <?php endforeach ?>
                <?php else: ?>
                    <div class="empty-state">
                        <?php if (!empty($item_type) && $item_type=='free'): ?>
                            <i class="fas fa-folder-open"></i>
                            <p>No free notes available</p>
                        <?php else: ?>
                            <i class="fas fa-lock"></i>
                            <p>Premium content requires subscription</p>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <!-- Amendments -->
    <div class="section-card">
        <div class="card-top">
            <h2 class="card-title">
                <i class="fas fa-edit"></i>
                Amendments
            </h2>
            <a href="<?=base_url()?>amendment/subject-list" class="view-btn">
                View All <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="card-content">
            <div class="item-list">
                <?php if (!empty($amendment_sub)): ?>
                    <?php foreach ($amendment_sub as $amendmentRow): ?>
                        <a href="<?=base_url()?>amendment/amendment-list/<?=$amendmentRow->subject_id?>" class="item-link">
                            <span class="item-name"><?=$amendmentRow->subject_name?></span>
                            <span class="item-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </a>
                    <?php endforeach ?>
                <?php else: ?>
                    <div class="empty-state">
                        <?php if (!empty($item_type) && $item_type=='free'): ?>
                            <i class="fas fa-folder-open"></i>
                            <p>No free amendments available</p>
                        <?php else: ?>
                            <i class="fas fa-lock"></i>
                            <p>Premium content requires subscription</p>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <!-- Question Bank (Premium Only) -->
    <?php if (empty($item_type)): ?>
        <div class="section-card">
            <div class="card-top">
                <h2 class="card-title">
                    <i class="fas fa-question-circle"></i>
                    Question Bank
                </h2>
                <a href="<?=base_url()?>qbank/subject-list" class="view-btn">
                    View All <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="card-content">
                <div class="item-list">
                    <?php if (!empty($qbank_sub)): ?>
                        <?php foreach ($qbank_sub as $qbankRow): ?>
                            <a href="<?=base_url()?>qbank/qbank-list/<?=$qbankRow->subject_id?>" class="item-link">
                                <span class="item-name"><?=$qbankRow->subject_name?></span>
                                <span class="item-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </a>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <i class="fas fa-lock"></i>
                            <p>Premium content requires subscription</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <!-- Schedule (Premium Only) -->
        <div class="section-card">
            <div class="card-top">
                <h2 class="card-title">
                    <i class="fas fa-calendar-alt"></i>
                    Schedule
                </h2>
                <a href="#" class="view-btn">
                    View All <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="card-content">
                <div class="item-list">
                    <?php if (!empty($schedule_list)): ?>
                        <?php foreach ($schedule_list as $schdeuleRow): ?>
                            <a href="<?=base_url().$schdeuleRow->schedule_file?>" target="_blank" class="item-link">
                                <span class="item-name"><?=$schdeuleRow->type_name?></span>
                                <span class="item-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </a>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <i class="fas fa-lock"></i>
                            <p>Premium content requires subscription</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <!-- Query Card -->
    <a href="#" class="query-box">
        <div class="query-icon">
            <i class="fas fa-comments"></i>
        </div>
        <div class="query-text">Ask Your Query</div>
    </a>
</div>

<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType="student_dashboard";
</script>
<script src="<?=base_url()?>assets/js/custom_js/student_dashboard.js?v=1.0.4"></script>
<?= $this->endSection() ?>
