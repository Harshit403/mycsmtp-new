<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        --primary: #1ab79c;
        --primary-dark: #159080;
        --secondary: #3498db;
        --accent: #9b59b6;
        --success: #2ecc71;
        --warning: #f39c12;
        --danger: #e74c3c;
        --dark: #2c3e50;
        --light: #ecf0f1;
        --gray: #7f8c8d;
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        color: var(--dark);
        min-height: 100vh;
    }

    .dashboard-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        padding: 1.5rem;
    }

    .welcome-banner {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 20px;
        padding: 3rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow);
        color: white;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%);
        z-index: 1;
    }

    .welcome-content {
        position: relative;
        z-index: 2;
    }

    .welcome-banner h1 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.75rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .welcome-banner p {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 70%;
    }

    .welcome-decoration {
        position: absolute;
        right: 2rem;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
        opacity: 0.2;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 1.75rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: var(--primary);
    }

    .countdown-card::before {
        background: var(--danger);
    }

    .social-card::before {
        background: var(--secondary);
    }

    .stat-card h3 {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: var(--gray);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .countdown-card .countdown {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--danger);
        margin: 0.5rem 0;
    }

    .social-icons {
        display: flex;
        gap: 1rem;
        margin-top: 1.25rem;
    }

    .social-icons a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: rgba(52, 152, 219, 0.1);
        color: var(--secondary);
        font-size: 1.25rem;
        transition: var(--transition);
    }

    .social-icons a:hover {
        background: var(--secondary);
        color: white;
        transform: translateY(-3px);
    }

    .dashboard-nav {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
    }

    .nav-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .nav-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark);
    }

    .nav-buttons {
        display: flex;
        gap: 1rem;
    }

    .btn-custom {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(26, 183, 156, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(26, 183, 156, 0.4);
    }

    .btn-secondary {
        background: rgba(26, 183, 156, 0.1);
        color: var(--primary);
    }

    .btn-secondary:hover {
        background: rgba(26, 183, 156, 0.2);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .feature-card {
        background: white;
        border-radius: 16px;
        padding: 1.75rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 160px;
        position: relative;
        overflow: hidden;
        text-decoration: none;
        color: var(--dark);
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .feature-title {
        font-weight: 600;
        margin: 0;
        font-size: 1rem;
    }

    .content-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.75rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--light);
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-icon {
        color: var(--primary);
    }

    .view-all {
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .view-all:hover {
        color: var(--primary-dark);
    }

    .content-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .content-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 1.5rem;
        transition: var(--transition);
        border: 1px solid #e9ecef;
    }

    .content-card:hover {
        background: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border-color: var(--primary);
    }

    .content-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .content-card-title {
        font-weight: 600;
        color: var(--dark);
    }

    .content-card-action {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(26, 183, 156, 0.1);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .content-card:hover .content-card-action {
        background: var(--primary);
        color: white;
    }

    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 4rem 1rem;
        color: var(--gray);
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        color: #bdc3c7;
    }

    .empty-state p {
        margin: 0;
        font-size: 1.1rem;
    }

    .query-card {
        background: linear-gradient(135deg, rgba(26, 183, 156, 0.05) 0%, rgba(52, 152, 219, 0.05) 100%);
        border-radius: 16px;
        padding: 1.75rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        border: 1px solid rgba(26, 183, 156, 0.1);
        transition: var(--transition);
        text-decoration: none;
        color: var(--dark);
        margin-bottom: 2rem;
    }

    .query-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        border-color: var(--primary);
    }

    .query-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.75rem;
    }

    .query-text {
        font-weight: 600;
        font-size: 1.25rem;
    }

    @media (max-width: 1200px) {
        .features-grid {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        }
    }

    @media (max-width: 992px) {
        .welcome-banner h1 {
            font-size: 2.2rem;
        }
        
        .welcome-banner p {
            font-size: 1.1rem;
            max-width: 85%;
        }
        
        .content-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .dashboard-wrapper {
            padding: 1rem;
        }
        
        .welcome-banner {
            padding: 2rem;
            border-radius: 16px;
        }
        
        .welcome-banner h1 {
            font-size: 1.8rem;
        }
        
        .welcome-banner p {
            font-size: 1rem;
            max-width: 100%;
        }
        
        .welcome-decoration {
            display: none;
        }
        
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .nav-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .nav-buttons {
            width: 100%;
            justify-content: space-between;
        }
        
        .features-grid {
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 1rem;
        }
        
        .feature-card {
            min-height: 140px;
            padding: 1.25rem;
        }
        
        .feature-icon {
            font-size: 2rem;
            margin-bottom: 0.75rem;
        }
        
        .feature-title {
            font-size: 0.9rem;
        }
        
        .content-section {
            padding: 1.5rem;
            border-radius: 16px;
        }
        
        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .content-grid {
            grid-template-columns: 1fr;
        }
        
        .query-card {
            padding: 1.25rem;
            border-radius: 12px;
        }
        
        .query-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }
        
        .query-text {
            font-size: 1.1rem;
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <?php
        $studentData = (session()->get('studentDetails')!==null) ? session()->get('studentDetails') : '';
        $timestamp = time();
        $am_pm = date('a', $timestamp);
    ?>
    <div class="dashboard-wrapper">
        <div class="welcome-banner">
            <div class="welcome-content">
                <h1>Good <?=($am_pm=='am') ? 'morning' : 'afternoon'?>, <?=$studentData['student_name']?></h1>
                <p>Today's Decisions Determine Tomorrow's Success</p>
            </div>
            <div class="welcome-decoration">
                <svg width="300" height="200" viewBox="0 0 300 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50C100 50 150 0 200 50C250 100 200 150 150 150C100 150 50 100 100 50Z" fill="rgba(255,255,255,0.2)"/>
                    <path d="M80 100C80 100 130 50 180 100C230 150 180 200 130 200C80 200 30 150 80 100Z" fill="rgba(255,255,255,0.1)"/>
                </svg>
            </div>
        </div>
        
        <div class="stats-container">
            <div class="stat-card countdown-card">
                <h3>Exam Countdown</h3>
                <?php
                    $date1=date_create(EXAM_DATE);
                    $date2=date_create(date('Y-m-d'));
                    $diff=date_diff($date1,$date2);
                    $daysLeft = $diff->days;
                ?>
                <div class="countdown"><i class="far fa-clock"></i> <?=$daysLeft?> Days</div>
            </div>
            
            <div class="stat-card social-card">
                <h3>Connect With Us</h3>
                <div class="social-icons">
                    <a href="https://Instagram.com/mycsmtp"><i class="fab fa-instagram"></i></a>
                    <a href="https://telegram.dog/mycsmtp"><i class="fab fa-telegram"></i></a>
                    <a href="https://facebook.com/mycsmtp"><i class="fab fa-facebook"></i></a>
                    <a href="https://youtube.com/@mycsmtp"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        
        <div class="dashboard-nav">
            <div class="nav-header">
                <h2 class="nav-title">Student Dashboard</h2>
                <div class="nav-buttons">
                    <?php if (!empty($item_type) && $item_type=='free'): ?>
                        <a href="<?=base_url()?>dashboard" class="btn-custom btn-primary">
                            <i class="fas fa-star"></i> Premium Content
                        </a>
                    <?php else: ?>
                        <a href="<?=base_url()?>dashboard/free" class="btn-custom btn-secondary">
                            <i class="fas fa-gift"></i> Free Resources
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        
        <div class="features-grid">
            <a href="<?=base_url()?>my-resources/subject/<?=$item_type?>" class="feature-card">
                <i class="fas fa-file-alt feature-icon"></i>
                <p class="feature-title">Test Papers</p>
            </a>
            <a href="<?=base_url()?>notes/subject-list" class="feature-card">
                <i class="fas fa-book feature-icon"></i>
                <p class="feature-title">Notes</p>
            </a>
            <a href="<?=base_url()?>amendment/subject-list" class="feature-card">
                <i class="fas fa-edit feature-icon"></i>
                <p class="feature-title">Amendments</p>
            </a>
            <a href="<?=base_url()?>qbank/subject-list" class="feature-card">
                <i class="fas fa-question-circle feature-icon"></i>
                <p class="feature-title">Question Bank</p>
            </a>
            <a href="<?=base_url()?>cstestseries.html" class="feature-card">
                <i class="fas fa-shopping-cart feature-icon"></i>
                <p class="feature-title">Buy Now</p>
            </a>
            <a href="#" class="feature-card">
                <i class="fas fa-chalkboard-teacher feature-icon"></i>
                <p class="feature-title">Mentoring</p>
            </a>
            <a href="#" class="feature-card">
                <i class="fas fa-comments feature-icon"></i>
                <p class="feature-title">Doubts</p>
            </a>
            <a href="#" class="feature-card">
                <i class="fas fa-calendar-alt feature-icon"></i>
                <p class="feature-title">Schedule</p>
            </a>
            <a href="<?=base_url()?>contact-us" class="feature-card">
                <i class="fas fa-phone feature-icon"></i>
                <p class="feature-title">Contact Us</p>
            </a>
        </div>
        
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-file-alt section-icon"></i>
                    My Test Papers
                </h2>
                <a href="<?=base_url()?>my-resources/subject/<?=$item_type?>" class="view-all">
                    View All <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="content-grid">
                <?php if (!empty($fetch_sub)): ?>
                    <?php foreach ($fetch_sub as $value): ?>
                        <div class="content-card">
                            <div class="content-card-header">
                                <div class="content-card-title"><?=$value['subject_name']?></div>
                                <a href="<?=base_url()?>my-resources/paper/<?=$value['subject_id'].'/'.$item_type?>" class="content-card-action">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
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
        
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-book section-icon"></i>
                    My Notes
                </h2>
                <a href="<?=base_url()?>notes/subject-list/<?=$item_type?>" class="view-all">
                    View All <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="content-grid">
                <?php if (!empty($notes_sub)): ?>
                    <?php foreach ($notes_sub as $notesRow): ?>
                        <div class="content-card">
                            <div class="content-card-header">
                                <div class="content-card-title"><?=$notesRow->subject_name?></div>
                                <a href="<?=base_url()?>notes/notes-list/<?=$notesRow->subject_id?>" class="content-card-action">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
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
        
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-edit section-icon"></i>
                    Amendments
                </h2>
                <a href="<?=base_url()?>amendment/subject-list" class="view-all">
                    View All <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="content-grid">
                <?php if (!empty($amendment_sub)): ?>
                    <?php foreach ($amendment_sub as $amendmentRow): ?>
                        <div class="content-card">
                            <div class="content-card-header">
                                <div class="content-card-title"><?=$amendmentRow->subject_name?></div>
                                <a href="<?=base_url()?>amendment/amendment-list/<?=$amendmentRow->subject_id?>" class="content-card-action">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
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
        
        <?php if (empty($item_type)): ?>
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-question-circle section-icon"></i>
                        Question Bank
                    </h2>
                    <a href="<?=base_url()?>qbank/subject-list" class="view-all">
                        View All <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="content-grid">
                    <?php if (!empty($qbank_sub)): ?>
                        <?php foreach ($qbank_sub as $qbankRow): ?>
                            <div class="content-card">
                                <div class="content-card-header">
                                    <div class="content-card-title"><?=$qbankRow->subject_name?></div>
                                    <a href="<?=base_url()?>qbank/qbank-list/<?=$qbankRow->subject_id?>" class="content-card-action">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <i class="fas fa-lock"></i>
                            <p>Premium content requires subscription</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-calendar-alt section-icon"></i>
                        Schedule
                    </h2>
                    <a href="#" class="view-all">
                        View All <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="content-grid">
                    <?php if (!empty($schedule_list)): ?>
                        <?php foreach ($schedule_list as $schdeuleRow): ?>
                            <div class="content-card">
                                <div class="content-card-header">
                                    <div class="content-card-title"><?=$schdeuleRow->type_name?></div>
                                    <a href="<?=base_url().$schdeuleRow->schedule_file?>" target="_blank" class="content-card-action">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <i class="fas fa-lock"></i>
                            <p>Premium content requires subscription</p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>
        
        <a href="#" class="query-card">
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
    <script src="<?=base_url()?>assets/js/custom_js/student_dashboard.js?v=1.0.2"></script>
<?= $this->endSection() ?>
