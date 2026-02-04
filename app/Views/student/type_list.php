<?= $this->extend('layout/student_layout') ?>

<?php 
$levelName = !empty($levelInfo) ? $levelInfo->level_name : 'CS';
$levelId = !empty($levelInfo) ? $levelInfo->level_id : '1';

// Build typesToShow array early for SEO
$typesToShow = [];
if (!empty($fetchedTypes)) {
    foreach ($fetchedTypes as $type) {
        if (empty($type['expiry_date']) || (!empty($type['expiry_date']) && ($type['expiry_date'] > date('Y-m-d H:i:s')))) {
            $typesToShow[] = $type;
        }
    }
}

// Build dynamic meta description from available types
$typeNames = [];
foreach ($typesToShow as $type) {
    $typeNames[] = $type['type_name'];
}
$typeListStr = !empty($typeNames) ? implode(', ', array_slice($typeNames, 0, 3)) : '';

$metaDescription = !empty($typeListStr) 
    ? "Explore {$levelName} Test Series plans - {$typeListStr}. Expert-crafted test papers for ICSI exams with chapterwise, detailed & full syllabus tests. Get detailed evaluation and All India ranking."
    : "Explore {$levelName} Test Series plans at My CS MTP. Expert-crafted test papers for CS Executive & CS Professional exams. Chapterwise, detailed & full syllabus tests with detailed evaluation.";

$metaKeywords = !empty($typeNames) 
    ? "{$levelName} Test Series, " . implode(', ', $typeNames) . ", CS Executive Test Series, CS Professional Test Series, My CS MTP, icsi test series, online test series, cs exam preparation, chapterwise tests"
    : "{$levelName} Test Series, CS Executive Test Series, CS Professional Test Series, My CS MTP, icsi test series, online test series, cs exam preparation, chapterwise tests";
?>

<?= $this->section('title') ?>
<?=!empty($levelInfo) ? $levelInfo->level_name . ' Test Series Plans - ' . (!empty($typeListStr) ? implode(', ', array_slice($typeNames, 0, 2)) . ' | ' : '') . 'My CS MTP' : 'CS Test Series Plans - My CS MTP' ?>
<?= $this->endSection() ?>

<?= $this->section('seoSection') ?>
<meta name="description" content="<?= $metaDescription ?>">
<meta name="keywords" content="<?= $metaKeywords ?>">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<link rel="canonical" href="https://mycsmtp.com/level/type/<?= $levelId ?>">
<meta name="author" content="My CS MTP">
<meta name="publisher" content="My CS MTP Test Series">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://mycsmtp.com/level/type/<?= $levelId ?>">
<meta property="og:title" content="<?= $levelName ?> Test Series Plans - My CS MTP">
<meta property="og:description" content="<?= $metaDescription ?>">
<meta property="og:image" content="https://mycsmtp.com/images/og-image.jpg">
<meta property="og:site_name" content="My CS MTP Test Series">
<meta property="og:locale" content="en_IN">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="<?= $levelName ?> Test Series Plans - My CS MTP">
<meta property="twitter:description" content="<?= $metaDescription ?>">
<meta property="twitter:image" content="https://mycsmtp.com/images/og-image.jpg">

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "<?= $levelName ?> Test Series Plans",
    "description": "<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>",
    "url": "https://mycsmtp.com/level/type/<?= $levelId ?>",
    "publisher": {
        "@type": "Organization",
        "name": "My CS MTP",
        "logo": {
            "@type": "ImageObject",
            "url": "https://mycsmtp.com/images/logo.png"
        }
    },
    "mainEntity": {
        "@type": "ItemList",
        "numberOfItems": <?= count($typesToShow) ?? 0 ?>,
        "itemListElement": [
            <?php if(!empty($typesToShow)): ?>
                <?php $itemCount = 0; foreach($typesToShow as $type): ?>
                    <?php if($itemCount > 0) echo ','; ?>
                    {
                        "@type": "Course",
                        "name": "<?= htmlspecialchars($type['type_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>",
                        "description": "<?= htmlspecialchars(strip_tags($type['type_more_details'] ?? ''), ENT_QUOTES, 'UTF-8') ?>",
                        "provider": {
                            "@type": "Organization",
                            "name": "My CS MTP"
                        }
                    }
                    <?php $itemCount++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        ]
    }
}
</script>

<!-- Breadcrumb Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://mycsmtp.com/"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?> Test Series",
            "item": "https://mycsmtp.com/level/type/<?= $levelId ?>"
        }
    ]
}
</script>

<!-- Service Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?> Test Series",
    "description": "<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>",
    "provider": {
        "@type": "Organization",
        "name": "My CS MTP Test Series",
        "url": "https://mycsmtp.com"
    },
    "areaServed": {
        "@type": "Country",
        "name": "India"
    },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?> Test Series Plans",
        "description": "Expert-crafted test papers for <?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?> exams with detailed evaluation and feedback.",
        "itemListElement": [
            <?php if(!empty($typesToShow)): ?>
                <?php $itemCount = 0; foreach($typesToShow as $type): ?>
                    <?php if($itemCount > 0) echo ','; ?>
                    {
                        "@type": "Offer",
                        "name": "<?= htmlspecialchars($type['type_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>",
                        "description": "<?= htmlspecialchars(strip_tags($type['type_more_details'] ?? ''), ENT_QUOTES, 'UTF-8') ?>",
                        "url": "https://mycsmtp.com/level/type/<?= $levelId ?>"
                    }
                    <?php $itemCount++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            {
                "@type": "Offer",
                "name": "Chapterwise Test Series",
                "description": "Systematic chapter-by-chapter test series for thorough preparation"
            },
            {
                "@type": "Offer",
                "name": "Detailed Test Series",
                "description": "In-depth tests covering detailed aspects of each subject"
            },
            {
                "@type": "Offer",
                "name": "Full Syllabus Test Series",
                "description": "Complete syllabus tests for final revision and exam simulation"
            }
        ]
    }
}
</script>
<?= $this->endSection() ?>



<?= $this->section('content') ?>
<style type="text/css">
    /* Type List Page - Namespaced CSS to prevent conflicts with Bootstrap and main stylesheet */
    .type-list-page {
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        font-size: 1.125rem;
        background-color: hsl(var(--type-bg) / 1);
        color: hsl(var(--type-fg) / 1);
        line-height: 1.6;
        padding: 2rem 1rem;
        padding-top: 100px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .type-list-page {
        --type-bg: 0 0% 100%;
        --type-fg: 222.2 84% 4.9%;
        --type-card: 0 0% 100%;
        --type-card-fg: 222.2 84% 4.9%;
        --type-primary: 160 84% 39%;
        --type-primary-fg: 0 0% 100%;
        --type-secondary: 210 40% 96.1%;
        --type-secondary-fg: 222.2 47.4% 11.2%;
        --type-muted: 210 40% 96.1%;
        --type-muted-fg: 215.4 16.3% 46.9%;
        --type-border: 214.3 31.8% 91.4%;
        --type-radius: 0.75rem;
    }

    /* Page Header */
    .type-list-page .page-header {
        text-align: center;
        margin-bottom: 2rem;
        padding: 0 1rem;
    }

    .type-list-page .page-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: hsl(var(--type-fg) / 1);
        margin-bottom: 0.5rem;
        letter-spacing: -0.02em;
    }

    .type-list-page .page-title span {
        color: hsl(var(--type-primary) / 1);
    }

    .type-list-page .page-description {
        font-size: 0.95rem;
        color: hsl(var(--type-muted-fg) / 1);
        max-width: 600px;
        margin: 0 auto;
    }

    /* Banner Component */
    .type-list-page .type-banner {
        position: relative;
        padding: 1.5rem 1rem;
        border-radius: var(--type-radius);
        margin: 1.5rem 0;
        text-align: center;
        overflow: hidden;
        background: linear-gradient(135deg, hsl(160 84% 39%) 0%, hsl(168 80% 32%) 100%);
        box-shadow: 0 10px 25px -10px hsl(160 84% 39% / 0.3);
    }

    .type-list-page .type-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.1) 0%, transparent 70%);
    }

    .type-list-page .banner-content {
        position: relative;
        z-index: 1;
    }

    .type-list-page .banner-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .type-list-page .banner-text {
        color: rgba(255,255,255,0.9);
        margin-bottom: 1rem;
        font-size: 0.875rem;
    }

    /* Button Component */
    .type-list-page .type-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.6rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: calc(var(--type-radius) - 2px);
        transition: all 0.2s ease;
        cursor: pointer;
        border: none;
        text-decoration: none;
        white-space: nowrap;
    }

    .type-list-page .type-btn:focus-visible {
        outline: 2px solid hsl(var(--type-primary) / 1);
        outline-offset: 2px;
    }

    .type-list-page .type-btn-primary {
        background-color: hsl(var(--type-primary) / 1);
        color: hsl(var(--type-primary-fg) / 1);
        box-shadow: 0 4px 14px 0 hsl(160 84% 39% / 0.39);
    }

    .type-list-page .type-btn-primary:hover {
        background-color: hsl(160 84% 34%);
        color: white;
    }

    .type-list-page .type-btn-secondary {
        background-color: hsl(var(--type-secondary) / 1);
        color: hsl(var(--type-secondary-fg) / 1);
        border: 1px solid hsl(var(--type-border) / 1);
    }

    .type-list-page .type-btn-secondary:hover {
        background-color: hsl(var(--type-muted) / 1);
        border-color: hsl(var(--type-muted-fg) / 1);
        color: hsl(var(--type-secondary-fg) / 1);
    }

    .type-list-page .type-btn-destructive {
        background-color: #ef4444;
        color: white;
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: .8; }
    }

    /* Card Component */
    .type-list-page .type-card {
        background-color: hsl(var(--type-card) / 1);
        border: 1px solid hsl(var(--type-border) / 1);
        border-radius: var(--type-radius);
        box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        width: 352px;
        flex-shrink: 0;
    }

    .type-list-page .type-card:hover {
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        transform: translateY(-1px);
    }

    .type-list-page .type-card-header {
        padding: 0.75rem;
        border-bottom: 1px solid hsl(var(--type-border) / 1);
    }

    .type-list-page .type-card-content {
        padding: 0.75rem;
        flex: 1;
    }

    .type-list-page .type-card-footer {
        padding: 0.75rem;
        border-top: 1px solid hsl(var(--type-border) / 1);
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .type-list-page .type-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: hsl(var(--type-card-fg) / 1);
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .type-list-page .type-card-description {
        font-size: 0.875rem;
        color: hsl(var(--type-muted-fg) / 1);
        line-height: 1.6;
        word-wrap: break-word;
    }

    /* Badge Component */
    .type-list-page .type-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1.25rem;
        font-size: 0.9rem;
        font-weight: 600;
        border-radius: 9999px;
        border: 1px solid hsl(var(--type-border) / 1);
        background-color: hsl(var(--type-secondary) / 1);
        color: hsl(var(--type-secondary-fg) / 1);
    }

    .type-list-page .type-badge-primary {
        background-color: hsl(var(--type-primary) / 1);
        color: hsl(var(--type-primary-fg) / 1);
        border-color: hsl(var(--type-primary) / 1);
    }

    /* Grid Layout */
    .type-list-page .type-grid {
        display: grid;
        gap: 1rem;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        max-width: 100%;
        margin: 0 auto;
    }

    @media (min-width: 640px) {
        .type-list-page .type-grid-sm-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    @media (min-width: 1024px) {
        .type-list-page .type-grid-lg-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }

    /* Section Styling */
    .type-list-page .type-section {
        margin: 2rem 0;
    }

    .type-list-page .type-section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: hsl(var(--type-fg) / 1);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .type-list-page .type-section-title i {
        color: hsl(var(--type-primary) / 1);
    }

    /* Info Card Component */
    .type-list-page .type-info-card {
        background-color: hsl(var(--type-card) / 1);
        border: 1px solid hsl(var(--type-border) / 1);
        border-radius: var(--type-radius);
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .type-list-page .type-info-card h3 {
        font-size: 1rem;
        font-weight: 600;
        color: hsl(var(--type-fg) / 1);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .type-list-page .type-info-card h3 i {
        color: hsl(var(--type-primary) / 1);
    }

    .type-list-page .type-info-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .type-list-page .type-info-card li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: 0.5rem;
        color: hsl(var(--type-muted-fg) / 1);
        font-size: 1rem;
    }

    .type-list-page .type-info-card li::before {
        content: '\2713';
        position: absolute;
        left: 0;
        color: hsl(var(--type-primary) / 1);
        font-weight: bold;
    }

    /* Empty State */
    .type-list-page .type-empty-state {
        text-align: center;
        padding: 3rem 2rem;
        background-color: hsl(var(--type-card) / 1);
        border: 1px solid hsl(var(--type-border) / 1);
        border-radius: var(--type-radius);
        max-width: 600px;
        margin: 2rem auto;
    }

    .type-list-page .type-empty-state i {
        font-size: 3rem;
        color: hsl(var(--type-muted-fg) / 1);
        margin-bottom: 1rem;
    }

    .type-list-page .type-empty-state h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: hsl(var(--type-fg) / 1);
        margin-bottom: 0.5rem;
    }

    .type-list-page .type-empty-state p {
        color: hsl(var(--type-muted-fg) / 1);
    }

    /* Text Content */
    .type-list-page .type-text-content {
        color: hsl(var(--type-muted-fg) / 1);
        line-height: 1.8;
        font-size: 1rem;
    }

    .type-list-page .type-text-content p {
        margin-bottom: 1rem;
    }

    /* Top margin for fixed header */
    .type-list-page .header-offset {
        margin-top: 80px;
    }

    /* Alert Component */
    .type-list-page .type-alert {
        display: flex;
        gap: 0.75rem;
        padding: 1rem;
        border-radius: calc(var(--type-radius) - 2px);
        border: 1px solid;
    }

    .type-list-page .type-alert-info {
        background-color: hsl(210 40% 96.1%);
        border-color: hsl(214.3 31.8% 91.4%);
        color: hsl(215.4 16.3% 46.9%);
    }

    .type-list-page .type-alert i {
        flex-shrink: 0;
    }

    /* Level Info */
    .type-list-page .type-level-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: hsl(var(--type-muted-fg) / 1);
        font-size: 1rem;
        margin-top: 0.75rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .type-list-page {
            padding: 1.5rem 1rem;
        }

        .type-list-page .page-title {
            font-size: 1.875rem;
        }

        .type-list-page .page-description {
            font-size: 1rem;
        }

        .type-list-page .type-banner {
            padding: 2rem 1.5rem;
        }

        .type-list-page .type-card-footer {
            flex-direction: column;
        }

        .type-list-page .type-card-footer .type-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="type-list-page">
    
    <!-- Page Header -->
    <header class="page-header">
        <h1 class="page-title">
            <span><?=!empty($levelInfo) ? $levelInfo->level_name : 'CS Test Series' ?></span> Plans
        </h1>
        <p class="page-description">
            Comprehensive test papers designed by experts to help you ace your CSEET, CS Executive and CS Professional exams with detailed evaluation
        </p>
    </header>

    <!-- Promotional Banner -->
    <section class="type-banner" role="banner" aria-label="Limited time promotional offer">
        <div class="banner-content">
            <h2 class="banner-title">
                <i class="fas fa-bolt" aria-hidden="true"></i>
                Limited Time Offer
            </h2>
            <p class="banner-text">
                Get exclusive discounts on all test series packages. Prepare better, score higher!
            </p>
            <a href="<?=base_url()?>cs-test-series.html" class="type-btn type-btn-destructive" aria-label="Get exclusive offer now">
                <i class="fas fa-gift" aria-hidden="true"></i>
                Grab This Exclusive Offer
            </a>
        </div>
    </section>

    <!-- Test Series Cards Section -->
    <section class="type-section" aria-labelledby="test-series-heading">
        <h2 id="test-series-heading" class="type-section-title">
            <i class="fas fa-layer-group" aria-hidden="true"></i>
            Available Test Series
        </h2>
        
        <?php if(!empty($fetchedTypes)): ?>
            <?php 
            $count = 0;
            foreach ($fetchedTypes as $type): 
                if ((empty($type['expiry_date'])) || (!empty($type['expiry_date']) && ($type['expiry_date'] > date('Y-m-d H:i:s')))):
                    $count++;
                endif;
            endforeach; 
            ?>
            
            <?php if($count > 0): ?>
                <div class="type-grid type-grid-sm-2 type-grid-lg-3">
                    <?php foreach ($typesToShow as $type): ?>
                        <article class="type-card">
                            <div class="type-card-header">
                                <?php if(!empty($type['batch_info'])): ?>
                                    <span class="type-badge type-badge-primary" style="margin-bottom: 0.75rem;">
                                        <?= $type['batch_info'] ?>
                                    </span>
                                <?php endif; ?>
                                <h3 class="type-card-title"><?= htmlspecialchars($type['type_name']) ?></h3>
                                <div class="type-level-info">
                                    <i class="fas fa-layer-group" aria-hidden="true"></i>
                                    <span><?= htmlspecialchars($type['level_name']) ?></span>
                                </div>
                            </div>
                            
                            <div class="type-card-content">
                                <div class="type-card-description">
                                    <?php 
                                    $details = $type['type_more_details'] ?? '';
                                    
                                    // First decode any HTML entities (like &lt;li&gt;)
                                    $details = html_entity_decode($details);
                                    
                                    // If content has HTML list tags
                                    if (strpos($details, '<li>') !== false) {
                                        // Replace opening li with tick icon
                                        $details = str_replace('<li>', '<i class="fas fa-check" style="color: hsl(var(--type-primary) / 1); margin-right: 8px;"></i>', $details);
                                        // Replace closing li with line break
                                        $details = str_replace('</li>', '<br>', $details);
                                        // Remove ul tags
                                        $details = preg_replace('/<\/?ul[^>]*>/', '', $details);
                                        // Clean up extra <br> at the end
                                        $details = preg_replace('/(<br>)+$/', '', $details);
                                    } else {
                                        // For plain text - convert bullet characters to tick icons
                                        $details = str_replace('•', '<i class="fas fa-check" style="color: hsl(var(--type-primary) / 1); margin-right: 8px;"></i>', $details);
                                        // Replace hyphens at start of lines with tick icons
                                        $details = preg_replace('/^-\s+/m', '<i class="fas fa-check" style="color: hsl(var(--type-primary) / 1); margin-right: 8px;"></i> ', $details);
                                        // Replace asterisks at start of lines with tick icons
                                        $details = preg_replace('/^\*\s+/m', '<i class="fas fa-check" style="color: hsl(var(--type-primary) / 1); margin-right: 8px;"></i> ', $details);
                                        // Convert newlines to <br> tags
                                        $details = nl2br($details);
                                    }
                                    
                                    echo $details;
                                    ?>
                                </div>
                            </div>
                            
                            <div class="type-card-footer">
                                <button class="type-btn type-btn-primary typeBtn" data-type-id="<?=$type['type_id']?>" aria-label="View test series for <?= htmlspecialchars($type['type_name']) ?>">
                                    <i class="fas fa-book-open" aria-hidden="true"></i>
                                    View Test Series
                                </button>
                                
                                <?php if(!empty($type['schedule_file'])): ?>
                                    <a class="type-btn type-btn-secondary scheduledBtn" href="<?=base_url().$type['schedule_file']?>" target="_blank" rel="noopener noreferrer" aria-label="Download schedule PDF for <?= htmlspecialchars($type['type_name']) ?>">
                                        <i class="fas fa-file-pdf" aria-hidden="true"></i>
                                        Schedule
                                    </a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="type-empty-state">
                    <i class="fas fa-info-circle" aria-hidden="true"></i>
                    <h3>No Test Series Available</h3>
                    <p>Currently there are no active test series for this level. Please check back later or explore other levels.</p>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="type-empty-state">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <h3>No Test Series Available</h3>
                <p>Currently there are no test series available. Please check back later for updates.</p>
            </div>
        <?php endif; ?>
    </section>

    <!-- Information Section -->
    <section class="type-section" aria-labelledby="plans-heading">
        <h2 id="plans-heading" class="type-section-title">
            <i class="fas fa-clipboard-list" aria-hidden="true"></i>
            Our Test Series Plans
        </h2>
        
        <div class="type-info-card">
            <h3>
                <i class="fas fa-cubes" aria-hidden="true"></i>
                Chapterwise Test Series
            </h3>
            <p class="type-text-content">
                Perfect for students who want to master each unit of the syllabus systematically. The chapterwise approach ensures thorough understanding before moving to full syllabus tests.
            </p>
            <ul>
                <li>One Subject divided into 8 Parts (Units), with dedicated test for each</li>
                <li>Allows you to cover syllabus in more detail</li>
                <li>Includes 2 full syllabus tests of 100 Marks</li>
                <li>Ideal for detailed preparation</li>
            </ul>
        </div>
        
        <div class="type-info-card">
            <h3>
                <i class="fas fa-search-plus" aria-hidden="true"></i>
                Detailed Test Series
            </h3>
            <p class="type-text-content">
                Offers a balanced approach between unit-wise testing and full syllabus evaluation, perfect for students who want deeper understanding of larger Syllabus.
            </p>
            <ul>
                <li>Subject divided into 4 units with dedicated tests</li>
                <li>Delve deeply into understanding of each larger unit</li>
                <li>Includes 1 full syllabus test</li>
                <li>Helps identify strong and weak areas</li>
            </ul>
        </div>
        
        <div class="type-info-card">
            <h3>
                <i class="fas fa-file-alt" aria-hidden="true"></i>
                Full Syllabus Test Series
            </h3>
            <p class="type-text-content">
                Designed for final revision and exam simulation. These tests replicate the actual exam experience with complete syllabus coverage and time management practice.
            </p>
            <ul>
                <li>Complete syllabus coverage in one test</li>
                <li>Exact exam pattern and timing</li>
                <li>Performance benchmarking with All India ranking</li>
                <li>Final revision before actual exam</li>
            </ul>
        </div>

        <!-- Success Formula Section -->
        <div class="type-info-card" style="background: linear-gradient(135deg, hsl(160 84% 39% / 0.05) 0%, hsl(168 80% 32% / 0.05) 100%); border-color: hsl(160 84% 39% / 0.2);">
            <h3>
                <i class="fas fa-lightbulb" aria-hidden="true"></i>
                7-Step Success Formula
            </h3>
            <ul>
                <li><strong>Understand the ICSI Pattern:</strong> Our tests match the latest ICSI exam pattern with relevant amendments</li>
                <li><strong>Practice Chapterwise:</strong> Build foundation with unit-wise tests before full syllabus</li>
                <li><strong>Time Management:</strong> Learn to manage 3 hours effectively through timed tests</li>
                <li><strong>Quality Answers:</strong> Practice writing detailed, structured answers as per ICSI standards</li>
                <li><strong>Expert Feedback:</strong> Get detailed evaluation from subject matter experts</li>
                <li><strong>Track Progress:</strong> Monitor improvement with detailed analytics and scoring</li>
                <li><strong>Rank Analysis:</strong> Compare performance with All India ranking system</li>
            </ul>
        </div>

        <div class="type-text-content" style="margin-top: 2rem;">
            <div class="type-alert type-alert-info" style="margin-bottom: 1.5rem;">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <div>
                    Combine our test series with ICSI study material for best results. Study a topic from ICSI material, then immediately test with our chapter-wise tests. This active recall method significantly improves retention.
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <a href="<?=base_url()?>cs-test-series.html" class="type-btn type-btn-primary" style="font-size: 0.875rem; padding: 0.6rem 1.5rem;" aria-label="Get access to all test series">
                <i class="fas fa-gem" aria-hidden="true"></i>
                Get Access to All Test Series
            </a>
        </div>
    </section>

</div>
<?= $this->endSection() ?>

<?= $this->section('jsContent')?>
<script type="text/javascript">
    var pageType = 'type_list';
</script>
<script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.2"></script>
<?= $this->endSection() ?>