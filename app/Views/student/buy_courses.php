<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Buy Courses - My CS MTP
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    :root {
        --primary: #10b981;
        --primary-dark: #059669;
        --primary-light: #d1fae5;
        --secondary: #f3f4f6;
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

    .container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 24px;
    }

    /* Header */
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
        margin-bottom: 8px;
    }

    .page-header p {
        font-size: 15px;
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

    /* Course Cards Grid */
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .course-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .course-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-4px);
    }

    .course-card-header {
        padding: 20px;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--card-bg) 100%);
        border-bottom: 1px solid var(--border);
    }

    .course-badge {
        display: inline-block;
        background: var(--primary);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .course-name {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 8px;
    }

    .course-level {
        font-size: 13px;
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .course-body {
        padding: 20px;
    }

    .course-description {
        font-size: 14px;
        color: var(--text-secondary);
        margin-bottom: 16px;
        line-height: 1.6;
    }

    .course-features {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: var(--text-secondary);
    }

    .feature-item svg {
        color: var(--primary);
        flex-shrink: 0;
    }

    .course-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 16px;
        border-top: 1px solid var(--border);
    }

    .price-group {
        display: flex;
        align-items: baseline;
        gap: 10px;
    }

    .current-price {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary);
    }

    .original-price {
        font-size: 14px;
        color: var(--text-secondary);
        text-decoration: line-through;
    }

    .buy-btn {
        padding: 12px 24px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .buy-btn:hover {
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        transform: translateY(-2px);
    }

    /* Empty State */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        text-align: center;
        background: var(--card-bg);
        border-radius: var(--radius);
        border: 1px solid var(--border);
    }

    .empty-state svg {
        width: 64px;
        height: 64px;
        color: var(--text-secondary);
        margin-bottom: 16px;
    }

    .empty-state h3 {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 8px;
    }

    .empty-state p {
        color: var(--text-secondary);
        font-size: 14px;
    }

    /* Back Button */
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 20px;
        transition: color 0.2s ease;
    }

    .back-link:hover {
        color: var(--primary);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 16px;
        }

        .page-header {
            padding: 24px 20px;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .courses-grid {
            grid-template-columns: 1fr;
        }

        .course-footer {
            flex-direction: column;
            gap: 12px;
        }

        .buy-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<?php
$levelName = !empty($levelInfo) ? $levelInfo->level_name : 'CS';
$levelId = !empty($levelInfo) ? $levelInfo->level_id : '1';
?>

<div class="container">
    <!-- Back Link -->
    <a href="<?=base_url()?>dashboard" class="back-link">
        <i class="fas fa-arrow-left"></i>
        Back to Dashboard
    </a>

    <!-- Header -->
    <header class="page-header">
        <h1><?= $levelName ?> Test Series Plans</h1>
        <p>Choose the perfect test series plan for your ICSI exam preparation</p>
    </header>

    <!-- Section Title -->
    <div class="section-title">
        <i class="fas fa-layer-group"></i>
        <h2>Available Test Series Plans</h2>
    </div>

    <!-- Course Cards -->
    <?php if(!empty($fetchedTypes)): ?>
        <div class="courses-grid">
            <?php foreach ($fetchedTypes as $type): ?>
                <article class="course-card">
                    <div class="course-card-header">
                        <?php if(!empty($type['batch_info'])): ?>
                            <span class="course-badge"><?= htmlspecialchars($type['batch_info']) ?></span>
                        <?php endif; ?>
                        <h3 class="course-name"><?= htmlspecialchars($type['type_name']) ?></h3>
                        <div class="course-level">
                            <i class="fas fa-layer-group"></i>
                            <span><?= htmlspecialchars($type['level_name']) ?></span>
                        </div>
                    </div>
                    <div class="course-body">
                        <div class="course-description">
                            <?php 
                            $details = $type['type_more_details'] ?? '';
                            $details = strip_tags($details);
                            echo substr($details, 0, 150) . (strlen($details) > 150 ? '...' : '');
                            ?>
                        </div>
                        <div class="course-features">
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Chapter-wise Tests</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Detailed Evaluation</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>All India Ranking</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Performance Analytics</span>
                            </div>
                        </div>
                        <div class="course-footer">
                            <div class="price-group">
                                <?php if(isset($type['type_price']) || isset($type['price'])): ?>
                                    <span class="current-price">₹<?= number_format($type['type_price'] ?? $type['price'] ?? 0) ?></span>
                                    <span class="original-price">₹<?= number_format(($type['type_price'] ?? $type['price'] ?? 0) + 500) ?></span>
                                <?php endif; ?>
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <?php if(!empty($type['schedule_file'])): ?>
                                    <a href="<?=base_url().$type['schedule_file']?>" target="_blank" class="buy-btn" style="background: var(--secondary); color: var(--text-primary);">
                                        <i class="fas fa-file-download"></i>
                                        Schedule
                                    </a>
                                <?php endif; ?>
                                <a href="<?=base_url()?>type/subject/<?=$type['type_id']?>" class="buy-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-folder-open"></i>
            <h3>No Test Series Available</h3>
            <p>Currently there are no test series available for this level. Please check back later.</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<script type="text/javascript">
    var pageType = 'buy_courses';
</script>
<script src="<?=base_url()?>assets/js/custom_js/view.js"></script>
<?= $this->endSection() ?>
