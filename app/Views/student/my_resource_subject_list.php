<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    My Subjects - My CS MTP
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

    .container-custom {
        max-width: 1200px;
        margin: 0 auto;
        padding: 24px;
    }

    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: var(--radius);
        padding: 32px;
        margin-bottom: 24px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .page-header h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .page-header p {
        font-size: 14px;
        opacity: 0.9;
    }

    /* Section Title */
    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .section-title svg {
        color: var(--primary);
    }

    .section-title h2 {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-primary);
    }

    /* Subject Grid */
    .subjects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .subject-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .subject-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-4px);
    }

    .card-top {
        padding: 20px;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--card-bg) 100%);
        border-bottom: 1px solid var(--border);
        text-align: center;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--card-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        box-shadow: var(--shadow);
    }

    .card-icon svg {
        width: 28px;
        height: 28px;
        color: var(--primary);
    }

    .card-name {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .card-meta {
        display: flex;
        justify-content: center;
        gap: 16px;
        font-size: 12px;
        color: var(--text-secondary);
    }

    .card-meta span {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .card-body {
        padding: 20px;
    }

    .card-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .action-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .action-btn.primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
    }

    .action-btn.primary:hover {
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        transform: translateY(-2px);
    }

    .action-btn.secondary {
        background: var(--background);
        color: var(--text-primary);
        border: 1px solid var(--border);
    }

    .action-btn.secondary:hover {
        background: var(--border);
    }

    /* Empty State */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 80px 20px;
        text-align: center;
        background: var(--card-bg);
        border-radius: var(--radius);
        border: 1px solid var(--border);
    }

    .empty-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: var(--primary-light);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
    }

    .empty-icon svg {
        width: 48px;
        height: 48px;
        color: var(--primary);
    }

    .empty-state h3 {
        font-size: 22px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 10px;
    }

    .empty-state p {
        font-size: 14px;
        color: var(--text-secondary);
        margin-bottom: 24px;
        max-width: 400px;
    }

    .buy-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 28px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .buy-btn:hover {
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container-custom {
            padding: 16px;
        }

        .page-header {
            padding: 24px 20px;
            text-align: center;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .subjects-grid {
            grid-template-columns: 1fr;
        }

        .empty-state {
            padding: 60px 20px;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-custom">
    <!-- Page Header -->
    <header class="page-header">
        <h1>My Subjects</h1>
        <p>Access your purchased test series subjects and start practicing</p>
    </header>

    <!-- Section Title -->
    <div class="section-title">
        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        <h2>Available Subjects</h2>
    </div>

    <!-- Subjects Grid -->
    <?php if(!empty($fetchAvailbleSubject)): ?>
        <div class="subjects-grid">
            <?php 
            $k = 0;
            $colorArray = ["351, 83%, 61%","170, 75%, 41%","42, 94%, 55%","229, 75%, 58%","351, 83%, 61%"];
            foreach ($fetchAvailbleSubject as $subjectRow) {
                if ($k==4) {
                    $k=0;
                }
                $color = $colorArray[$k];
                $k++;
                ?>
                <article class="subject-card">
                    <div class="card-top">
                        <div class="card-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="card-name"><?=htmlspecialchars($subjectRow['subject_name'])?></h3>
                        <div class="card-meta">
                            <span>
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <?=htmlspecialchars($subjectRow['level_name'])?>
                            </span>
                            <span>
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <?=htmlspecialchars($subjectRow['type_name'])?>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-actions">
                            <a href="<?=base_url()?>my-resources/paper/<?=$subjectRow['subject_id'].'/'.$item_type?>" class="action-btn primary">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                View Papers
                            </a>
                            <?php if(!empty($subjectRow['schedule_file'])): ?>
                                <a href="<?=base_url().$subjectRow['schedule_file']?>" target="_blank" class="action-btn secondary">
                                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Schedule
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </div>
    <?php else: ?>
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h3>No Active Subscription</h3>
            <p>You don't have any active test series subscription. Purchase a plan to access all subjects and start your preparation.</p>
            <a href="<?=base_url()?>buy-courses" class="buy-btn">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Buy Any Plan
            </a>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
<script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.4"></script>
<?= $this->endSection() ?>
