<?php 
$typeName = !empty($typeInfo) ? $typeInfo->type_name : 'CS';
$typeId = !empty($typeInfo) ? $typeInfo->type_id : '1';
$levelName = !empty($levelInfo) ? $levelInfo->level_name : 'CS';

// Build dynamic meta description from available subjects
$subjectNames = [];
if (!empty($fetchedSubject)) {
    foreach ($fetchedSubject as $subject) {
        $subjectNames[] = $subject['subject_name'];
    }
}
$subjectListStr = !empty($subjectNames) ? implode(', ', array_slice($subjectNames, 0, 3)) : '';

$metaDescription = !empty($subjectListStr)
    ? "Explore {$levelName} - {$typeName} subjects - {$subjectListStr}. Practice tests with ICSI pattern, detailed analytics & All India ranking. Expert-crafted test series for CS exams."
    : "{$levelName} - {$typeName} test series subjects with ICSI pattern practice tests. Expert-crafted questions with detailed analytics and All India ranking.";

$metaKeywords = !empty($subjectNames)
    ? "{$levelName} {$typeName} subjects, " . implode(', ', $subjectNames) . ", CS test series, ICSI practice tests, chapterwise tests, mock exams, online test series"
    : "{$levelName} {$typeName} test series, CS practice tests, ICSI exam preparation, chapterwise tests, mock exams, online test series";
?>

<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
<?=!empty($typeInfo) ? $typeInfo->type_name . ' Subjects - ' . (!empty($subjectListStr) ? implode(', ', array_slice($subjectNames, 0, 2)) . ' | ' : '') . 'My CS MTP' : 'CS Subjects - My CS MTP' ?>
<?= $this->endSection() ?>

<?= $this->section('seoSection') ?>
<meta name="description" content="<?= $metaDescription ?>">
<meta name="keywords" content="<?= $metaKeywords ?>">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="<?= base_url('type/subject/' . $typeId) ?>">
    <meta name="author" content="My CS MTP">
    <meta name="publisher" content="My CS MTP Test Series">
    
    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#1ab79c">
    <meta name="msapplication-TileColor" content="#1ab79c">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://mycsmtp.com/type/subject/<?= $typeId ?>">
    <meta property="og:title" content="<?= $levelName ?> - <?= $typeName ?> Subjects | My CS MTP">
    <meta property="og:description" content="<?= strip_tags($metaDescription) ?>">
    <meta property="og:image" content="<?= base_url('images/og-subjects.jpg') ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="My CS MTP Test Series">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $levelName ?> - <?= $typeName ?> Subjects | My CS MTP">
    <meta name="twitter:description" content="<?= strip_tags($metaDescription) ?>">
    <meta name="twitter:image" content="<?= base_url('images/og-subjects.jpg') ?>">
    <meta name="twitter:site" content="@mycsmtp">

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') ?> Subjects",
    "description": "<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8') ?>",
    "url": "https://mycsmtp.com/type/subject/<?= $typeId ?>",
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
        "numberOfItems": <?= count($fetchedSubject) ?? 0 ?>,
        "itemListElement": [
            <?php if(!empty($fetchedSubject)): ?>
                <?php $itemCount = 0; foreach($fetchedSubject as $subject): ?>
                    <?php if($itemCount > 0) echo ','; ?>
                    {
                        "@type": "Course",
                        "name": "<?= htmlspecialchars($subject['subject_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>",
                        "description": "Practice tests for <?= htmlspecialchars($subject['subject_name'] ?? '', ENT_QUOTES, 'UTF-8') ?> with ICSI pattern questions",
                        "provider": {
                            "@type": "Organization",
                            "name": "My CS MTP"
                        },
                        "offers": {
                            "@type": "Offer",
                            "price": "<?= $subject['offer_price'] ?? 0 ?>",
                            "priceCurrency": "INR"
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
                "name": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?>",
                "item": "https://mycsmtp.com/level/type/<?= !empty($levelInfo) ? $levelInfo->level_id : '' ?>"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "<?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') ?>",
                "item": "https://mycsmtp.com/type/subject/<?= $typeId ?>"
            }
        ]
    }
</script>

    <!-- Course Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Course",
        "name": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') ?> Test Series",
        "description": "<?= strip_tags($metaDescription) ?>",
        "provider": {
            "@type": "Organization",
            "name": "My CS MTP Test Series",
            "url": "<?= base_url() ?>"
        },
        "educationalLevel": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?>",
        "audience": {
            "@type": "Audience",
            "audienceType": "CS Students preparing for ICSI exams"
        },
        "coursePrerequisites": "Basic knowledge of <?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') ?> syllabus",
        "hasCourseInstance": {
            "@type": "CourseInstance",
            "courseMode": "online",
            "courseWorkload": "P0DT20H"
        },
        "about": {
            "@type": "Thing",
            "name": "ICSI Exam Preparation - <?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') ?>"
        }
    }
    </script>
    
    <!-- WebPage Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') ?> Subjects",
        "description": "<?= strip_tags($metaDescription) ?>",
        "url": "<?= base_url('type/subject/' . $typeId) ?>",
        "primaryImageOfPage": {
            "@type": "ImageObject",
            "url": "<?= base_url('images/og-subjects.jpg') ?>"
        },
        "breadcrumb": {
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?= base_url() ?>"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?= htmlspecialchars($levelName, ENT_QUOTES, 'UTF-8') ?>",
                    "item": "<?= base_url('level-list') ?>"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') ?>",
                    "item": "<?= base_url('type/subject/' . $typeId) ?>"
                }
            ]
        }
    }
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    :root {
        --primary: #10b981;
        --primary-dark: #059669;
        --primary-light: #d1fae5;
        --secondary: #6366f1;
        --secondary-dark: #4f46e5;
        --accent: #f59e0b;
        --dark: #1f2937;
        --gray-600: #4b5563;
        --gray-500: #6b7280;
        --gray-400: #9ca3af;
        --gray-200: #e5e7eb;
        --gray-100: #f3f4f6;
        --white: #ffffff;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .tp-mg {
        margin-top: 80px;
        margin-bottom: 60px;
    }
    
    .main-container {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
        color: var(--dark);
        line-height: 1.6;
    }
    
    .hero-section {
        text-align: center;
        padding: 40px 20px 30px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
        animation: heroGlow 15s ease-in-out infinite;
    }
    
    @keyframes heroGlow {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(25%, 25%); }
    }
    
    .hero-content {
        position: relative;
        z-index: 1;
    }
    
    .hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 10px;
        letter-spacing: -0.02em;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
        opacity: 0.95;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .promo-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 10px 20px;
        border-radius: 50px;
        margin-top: 20px;
        font-weight: 600;
        animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.03); }
    }
    
    .promo-badge i {
        font-size: 1.2rem;
    }
    
    .container-custom {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .section-heading {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
    }
    
    .section-heading h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark);
    }
    
    .section-heading .icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
        box-shadow: var(--shadow-md);
    }
    
    .subjects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }
    
    .subject-card {
        background: var(--white);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        border: 1px solid var(--gray-200);
        height: auto;
        min-height: 200px;
    }
    
    .subject-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .subject-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .subject-card:hover::before {
        opacity: 1;
    }
    
    .card-top {
        padding: 18px 20px 12px;
        background: var(--white);
        border-bottom: 1px solid var(--gray-200);
    }
    
    .subject-name {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 10px;
        line-height: 1.3;
    }
    
    .rating-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .stars {
        display: flex;
        gap: 3px;
        color: var(--accent);
        font-size: 0.9rem;
    }
    
    .rating-text {
        color: var(--gray-500);
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .card-body {
        padding: 15px 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .price-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 12px;
        flex-wrap: wrap;
        gap: 8px;
    }
    
    .price-group {
        display: flex;
        align-items: baseline;
        gap: 8px;
    }
    
    .current-price {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--primary);
    }
    
    .original-price {
        font-size: 0.9rem;
        color: var(--gray-400);
        text-decoration: line-through;
    }
    
    .discount-badge {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #dc2626;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
    }
    
    .add-to-cart-btn {
        width: 100%;
        padding: 14px 20px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        margin-top: auto;
    }
    
    .add-to-cart-btn:hover {
        background: var(--primary-dark);
        box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
        transform: translateY(-2px);
    }
    
    .add-to-cart-btn:active {
        transform: translateY(0);
    }
    
    .add-to-cart-btn i {
        font-size: 1.2rem;
    }
    
    .info-section {
        background: var(--white);
        border-radius: 24px;
        padding: 40px;
        margin-bottom: 40px;
        box-shadow: var(--shadow);
        border: 1px solid var(--gray-200);
    }
    
    .info-section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .info-section-title i {
        color: var(--primary);
    }
    
    .feature-highlight {
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(16, 185, 129, 0.1) 100%);
        border-left: 4px solid var(--primary);
        padding: 20px 25px;
        border-radius: 0 12px 12px 0;
        margin-bottom: 25px;
    }
    
    .feature-highlight h4 {
        color: var(--primary-dark);
        font-size: 1.15rem;
        margin-bottom: 8px;
    }
    
    .feature-highlight p {
        color: var(--gray-600);
        font-size: 0.95rem;
        margin: 0;
    }
    
    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .benefit-card {
        padding: 25px;
        background: var(--gray-100);
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    
    .benefit-card:hover {
        background: var(--white);
        box-shadow: var(--shadow-md);
    }
    
    .benefit-icon {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.4rem;
        margin-bottom: 15px;
        box-shadow: var(--shadow);
    }
    
    .benefit-card h5 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 8px;
    }
    
    .benefit-card p {
        color: var(--gray-500);
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0;
    }
    
    .test-types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .test-type-card {
        background: var(--gray-100);
        border-radius: 16px;
        padding: 30px 25px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .test-type-card:hover {
        background: var(--white);
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
    }
    
    .test-type-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(16, 185, 129, 0.15) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    
    .test-type-icon i {
        font-size: 1.8rem;
        color: var(--primary);
    }
    
    .test-type-card h5 {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 10px;
    }
    
    .test-type-card p {
        color: var(--gray-500);
        font-size: 0.9rem;
        margin: 0;
    }
    
    .cta-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 24px;
        padding: 50px 40px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }
    
    .cta-section::after {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }
    
    .cta-content {
        position: relative;
        z-index: 1;
    }
    
    .cta-section h3 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 12px;
    }
    
    .cta-section p {
        font-size: 1.1rem;
        opacity: 0.95;
        margin-bottom: 25px;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 30px;
        background: var(--white);
        border-radius: 24px;
        box-shadow: var(--shadow);
        margin-bottom: 40px;
    }
    
    .empty-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--gray-200) 0%, var(--gray-100) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
    }
    
    .empty-icon i {
        font-size: 3rem;
        color: var(--gray-400);
    }
    
    .empty-state h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 10px;
    }
    
    .empty-state p {
        color: var(--gray-500);
        font-size: 1rem;
        margin-bottom: 25px;
    }

    .empty-state .seo-text {
        color: var(--gray-600);
        font-size: 0.95rem;
        line-height: 1.8;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--gray-200);
    }
    
    .seo-content-section {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid var(--gray-200);
    }
    
    .seo-content-section h3 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--dark);
    }
    
    .seo-content-section h4 {
        font-size: 1.15rem;
        font-weight: 700;
        margin: 25px 0 12px;
        color: var(--dark);
    }
    
    .seo-content-section p {
        color: var(--gray-600);
        font-size: 0.95rem;
        line-height: 1.9;
        margin-bottom: 15px;
    }
    
    /* Sticky Cart Button */
    .sticky-cart-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: linear-gradient(135deg, var(--accent) 0%, #d97706 100%);
        color: var(--dark);
        padding: 18px 28px;
        border-radius: 50px;
        font-weight: 700;
        box-shadow: var(--shadow-xl);
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 1000;
        transition: all 0.3s ease;
        border: none;
    }
    
    .sticky-cart-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 25px 50px -12px rgba(245, 158, 11, 0.4);
    }
    
    .cart-count {
        background: var(--dark);
        color: white;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .tp-mg {
            margin-top: 60px;
            margin-bottom: 40px;
        }
        
        .hero-section {
            padding: 30px 15px;
        }
        
        .hero-title {
            font-size: 1.75rem;
        }
        
        .hero-subtitle {
            font-size: 0.95rem;
        }
        
        .promo-badge {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
        
        .subjects-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .subject-card {
            border-radius: 16px;
        }
        
        .card-top, .card-body {
            padding: 20px;
        }
        
        .subject-name {
            font-size: 1.2rem;
        }
        
        .current-price {
            font-size: 1.6rem;
        }
        
        .info-section {
            padding: 25px 20px;
            border-radius: 16px;
        }
        
        .info-section-title {
            font-size: 1.25rem;
        }
        
        .benefits-grid {
            grid-template-columns: 1fr;
        }
        
        .test-types-grid {
            grid-template-columns: 1fr;
        }
        
        .cta-section {
            padding: 35px 25px;
            border-radius: 16px;
        }
        
        .cta-section h3 {
            font-size: 1.5rem;
        }
        
        .sticky-cart-btn {
            bottom: 20px;
            right: 20px;
            padding: 14px 22px;
            font-size: 0.95rem;
        }
    }
    
    @media (max-width: 480px) {
        .container-custom {
            padding: 0 15px;
        }
        
        .hero-title {
            font-size: 1.5rem;
        }
        
        .section-heading {
            flex-direction: column;
            text-align: center;
        }
        
        .price-wrapper {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .empty-state {
            padding: 40px 20px;
        }
    }
</style>

        <div class="tp-mg">
    <div class="main-container">
        <!-- Hero Section -->
        <section class="hero-section" aria-labelledby="hero-title">
            <div class="hero-content container-custom">
                <div style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;" itemprop="category"><?= htmlspecialchars($levelName) ?> Test Series</div>
                <h1 class="hero-title" id="hero-title" itemprop="name"><?= htmlspecialchars($levelName) ?> - <?= htmlspecialchars($typeName) ?> Subjects</h1>
                <div class="promo-badge" role="status" aria-live="polite">
                    <i class="fas fa-bolt"></i>
                    FLASH SALE! Use Code <strong>RESULT10</strong> for 10% Discount
                </div>
            </div>
        </section>

            <div class="container-custom">
            <!-- Subjects Section -->
            <nav aria-label="Breadcrumb" class="breadcrumb-nav" style="margin-bottom: 20px;">
                <ol style="display: flex; flex-wrap: wrap; gap: 8px; list-style: none; padding: 0; margin: 0; font-size: 0.85rem; color: var(--gray-500);">
                    <li><a href="<?= base_url() ?>" style="color: var(--primary); text-decoration: none;">Home</a></li>
                    <li aria-hidden="true">›</li>
                    <li><a href="<?= base_url('level-list') ?>" style="color: var(--primary); text-decoration: none;"><?= htmlspecialchars($levelName) ?></a></li>
                    <li aria-hidden="true">›</li>
                    <li aria-current="page"><?= htmlspecialchars($typeName) ?></li>
                </ol>
            </nav>
            
            <!-- Subjects Section Heading -->
            <header class="section-heading">
                <div class="icon">
                    <i class="fas fa-book-open" aria-hidden="true"></i>
                </div>
                <div>
                    <h2><?= htmlspecialchars($levelName) ?> - <?= htmlspecialchars($typeName) ?> Subjects</h2>
                    <p style="color: var(--gray-500); font-size: 0.95rem; margin-top: 5px;">
                        <?= count($fetchedSubject) ?? 0 ?> subjects available for practice
                    </p>
                </div>
            </header>

            <?php if(!empty($fetchedSubject)): ?>
                <div class="subjects-grid" role="list">
                    <?php foreach($fetchedSubject as $index => $subject): ?>
                        <article class="subject-card" role="listitem" itemscope itemtype="https://schema.org/Product">
                            <meta itemprop="sku" content="subject-<?= $subject['subject_id'] ?>">
                            <meta itemprop="brand" content="My CS MTP">
                            <div class="card-top">
                                <h3 class="subject-name" itemprop="name"><?= htmlspecialchars($subject['subject_name']) ?></h3>
                                <div class="rating-wrapper" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                                    <div class="stars">
                                        <i class="fas fa-star" itemprop="ratingValue" content="4.7"></i>
                                        <i class="fas fa-star" itemprop="ratingValue" content="4.7"></i>
                                        <i class="fas fa-star" itemprop="ratingValue" content="4.7"></i>
                                        <i class="fas fa-star" itemprop="ratingValue" content="4.7"></i>
                                        <i class="fas fa-star-half-alt" itemprop="ratingValue" content="4.7"></i>
                                    </div>
                                    <span class="rating-text" itemprop="ratingValue" content="4.7">(4.7)</span>
                                    <meta itemprop="reviewCount" content="127">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="price-wrapper">
                                    <div class="price-group">
                                        <span class="current-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                            <meta itemprop="priceCurrency" content="INR">
                                            <span itemprop="price" content="<?= $subject['offer_price'] ?>">₹<?= number_format($subject['offer_price']) ?></span>
                                        </span>
                                        <span class="original-price" itemprop="priceSpecification" content="<?= $subject['original_price'] ?>">₹<?= number_format($subject['original_price']) ?></span>
                                    </div>
                                    <span class="discount-badge">Save <?= round(100 - ($subject['offer_price']/$subject['original_price']*100)) ?>%</span>
                                </div>
                                <div itemprop="description" style="display:none;">
                                    <?= htmlspecialchars($typeName) ?> test series for <?= htmlspecialchars($subject['subject_name']) ?> subject. Expert-crafted ICSI pattern practice tests with detailed analytics.
                                </div>
                                <button class="add-to-cart-btn addToCartBtn" data-subject-id="<?= $subject['subject_id'] ?>" aria-label="Add <?= htmlspecialchars($subject['subject_name']) ?> to cart">
                                    <i class="fas fa-cart-plus"></i>
                                    Add to Cart
                                </button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
                
                <!-- Product List Schema for all subjects -->
                <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "ItemList",
                    "itemListElement": [
                        <?php if(!empty($fetchedSubject)): ?>
                            <?php foreach($fetchedSubject as $index => $subject): ?>
                                {
                                    "@type": "ListItem",
                                    "position": <?= $index + 1 ?>,
                                    "item": {
                                        "@type": "Product",
                                        "name": "<?= htmlspecialchars($subject['subject_name'], ENT_QUOTES, 'UTF-8') ?>",
                                        "description": "<?= htmlspecialchars($typeName, ENT_QUOTES, 'UTF-8') ?> test series for <?= htmlspecialchars($subject['subject_name'], ENT_QUOTES, 'UTF-8') ?> subject. Expert-crafted ICSI pattern practice tests.",
                                        "brand": {
                                            "@type": "Brand",
                                            "name": "My CS MTP"
                                        },
                                        "sku": "subject-<?= $subject['subject_id'] ?>",
                                        "offers": {
                                            "@type": "Offer",
                                            "priceCurrency": "INR",
                                            "price": "<?= $subject['offer_price'] ?>",
                                            "availability": "https://schema.org/InStock",
                                            "url": "<?= base_url('type/subject/' . $typeId) ?>"
                                        },
                                        "aggregateRating": {
                                            "@type": "AggregateRating",
                                            "ratingValue": "4.7",
                                            "reviewCount": "127"
                                        }
                                    }
                                }<?= ($index < count($fetchedSubject) - 1) ? ',' : '' ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    ]
                }
                </script>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <h3>No Subjects Available</h3>
                    <p>We'll be adding new subjects soon. Please check back later.</p>
                    <button class="add-to-cart-btn" style="max-width: 250px; margin: 0 auto;">
                        <i class="fas fa-bell"></i>
                        Notify Me When Available
                    </button>
                    <div class="seo-text">
                        <p><strong>Prepare for Your <?= htmlspecialchars($typeName) ?> Exams</strong></p>
                        <p>Our <?= htmlspecialchars($typeName) ?> test series is coming soon. Be the first to know when we launch comprehensive practice tests designed to help you ace your ICSI exams. Subscribe for updates and get exclusive access to our chapterwise tests, module tests, and full mock exams.</p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Info Section -->
            <section class="info-section" id="about" aria-labelledby="about-title">
                <h2 id="about-title" class="info-section-title">
                    <i class="fas fa-certificate"></i>
                    About Our <?= htmlspecialchars($typeName) ?> Test Series
                </h2>
                
                <div class="feature-highlight">
                    <h3><i class="fas fa-award me-2"></i> Premium Quality <?= htmlspecialchars($typeName) ?> Practice Tests</h3>
                    <p>We provide unseen and amended questions to give environment like real ICSI exam. Each question has been added after analyzing the <?= htmlspecialchars($typeName) ?> syllabus very carefully by subject matter experts.</p>
                </div>
                
                <p style="margin-bottom: 25px; color: var(--gray-600); font-size: 1rem; line-height: 1.8;" itemprop="description">
                    Our <?= htmlspecialchars($typeName) ?> test series is designed to help you master the ICSI exam pattern with comprehensive practice tests. 
                    <?php if(!empty($subjectNames)): ?>
                        Choose from subjects including <?= htmlspecialchars(implode(', ', $subjectNames)) ?> and boost your preparation with detailed performance analytics.
                    <?php else: ?>
                        Build your confidence with chapterwise tests, module tests, and full mock exams designed by experts.
                    <?php endif; ?>
                </p>
                
                <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 20px; color: var(--dark);">Why Choose Our <?= htmlspecialchars($typeName) ?> Test Series?</h3>
                
                <div class="benefits-grid" role="list">
                    <div class="benefit-card" role="listitem">
                        <div class="benefit-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4>100% ICSI Pattern Alignment</h4>
                        <p>Our <?= htmlspecialchars($typeName) ?> tests match exact ICSI format, difficulty level, and marking scheme. Practice with real exam-style questions.</p>
                    </div>
                    
                    <div class="benefit-card" role="listitem">
                        <div class="benefit-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h4>Complete Subject Coverage</h4>
                        <p>From Corporate Laws to Tax Regulations, our test series covers all topics in the <?= htmlspecialchars($typeName) ?> syllabus comprehensively.</p>
                    </div>
                    
                    <div class="benefit-card" role="listitem">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Performance Analytics</h4>
                        <p>Track progress with detailed analytics. Identify strengths and weaknesses to optimize your <?= htmlspecialchars($typeName) ?> exam preparation.</p>
                    </div>
                    
                    <div class="benefit-card" role="listitem">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>All India Ranking</h4>
                        <p>Compare your performance with thousands of other <?= htmlspecialchars($typeName) ?> aspirants across India. Know where you stand.</p>
                    </div>
                    
                    <div class="benefit-card" role="listitem">
                        <div class="benefit-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>Time Management</h4>
                        <p>Learn to manage exam time effectively with our timed practice tests designed for ICSI exam conditions.</p>
                    </div>
                    
                    <div class="benefit-card" role="listitem">
                        <div class="benefit-icon">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <h4>Detailed Solutions</h4>
                        <p>Get comprehensive explanations and solutions for each question to understand concepts thoroughly.</p>
                    </div>
                </div>
                
                <h3 style="font-size: 1.25rem; font-weight: 700; margin: 30px 0 20px; color: var(--dark);"><?= htmlspecialchars($typeName) ?> Test Series Structure</h3>
                
                <div class="test-types-grid">
                    <div class="test-type-card">
                        <div class="test-type-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h4>Chapter-wise Tests</h4>
                        <p>Build strong fundamentals with focused tests on individual chapters and topics in <?= htmlspecialchars($typeName) ?> syllabus</p>
                    </div>
                    
                    <div class="test-type-card">
                        <div class="test-type-icon">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <h4>Module Tests</h4>
                        <p>Comprehensive tests covering multiple chapters together to test integrated understanding of <?= htmlspecialchars($typeName) ?> concepts</p>
                    </div>
                    
                    <div class="test-type-card">
                        <div class="test-type-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h4>Full Mock Exams</h4>
                        <p>Complete syllabus tests under exam conditions to build stamina and time management skills for <?= htmlspecialchars($typeName) ?> exam</p>
                    </div>
                    
                    <div class="test-type-card">
                        <div class="test-type-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h4>Previous Year Papers</h4>
                        <p>Practice with actual ICSI exam papers from previous years to understand question patterns and difficulty levels</p>
                    </div>
                </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h5>Complete Subject Coverage</h5>
                        <p>From Corporate Laws to Tax Regulations, our test series covers all topics in the <?= htmlspecialchars($typeName) ?> syllabus comprehensively.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5>Performance Analytics</h5>
                        <p>Track progress with detailed analytics. Identify strengths and weaknesses to optimize your <?= htmlspecialchars($typeName) ?> exam preparation.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5>All India Ranking</h5>
                        <p>Compare your performance with thousands of other <?= htmlspecialchars($typeName) ?> aspirants across India. Know where you stand.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5>Time Management</h5>
                        <p>Learn to manage exam time effectively with our timed practice tests designed for ICSI exam conditions.</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <h5>Detailed Solutions</h5>
                        <p>Get comprehensive explanations for every question to understand concepts deeply and improve accuracy.</p>
                    </div>
                </div>
                
                <h3 style="font-size: 1.25rem; font-weight: 700; margin: 30px 0 20px; color: var(--dark);"><?= htmlspecialchars($typeName) ?> Test Series Structure</h3>
                
                <div class="test-types-grid">
                    <div class="test-type-card">
                        <div class="test-type-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h5>Chapter-wise Tests</h5>
                        <p>Build strong fundamentals with focused tests on individual chapters and topics in <?= htmlspecialchars($typeName) ?> syllabus</p>
                    </div>
                    
                    <div class="test-type-card">
                        <div class="test-type-icon">
                            <i class="fas fa-puzzle-piece"></i>
                        </div>
                        <h5>Module Tests</h5>
                        <p>Test integrated understanding with comprehensive module assessments covering multiple chapters</p>
                    </div>
                    
                    <div class="test-type-card">
                        <div class="test-type-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <h5>Full Mock Exams</h5>
                        <p>Experience real exam conditions with complete <?= htmlspecialchars($typeName) ?> mock tests simulating actual ICSI exams</p>
                    </div>
                </div>
                
                <!-- Comprehensive SEO Content -->
                <div class="seo-content-section" style="margin-top: 40px; padding-top: 30px; border-top: 1px solid var(--gray-200);">
                    <h3 style="font-size: 1.4rem; font-weight: 700; margin-bottom: 20px; color: var(--dark);">Why CS Test Series Are Essential for Exam Success</h3>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 20px;">
                        The Company Secretary examination conducted by the Institute of Company Secretaries of India (ICSI) is one of the most prestigious professional exams in India. Aspiring Company Secretaries need comprehensive preparation to clear these rigorous exams in their first attempt. This is where CS test series play a crucial role in transforming theoretical knowledge into practical exam-writing skills. Online test series have become an indispensable tool for CS aspirants who want to assess their preparation level and identify areas that need more attention before the actual examination.
                    </p>
                    
                    <h4 style="font-size: 1.15rem; font-weight: 700; margin: 25px 0 12px; color: var(--dark);">Benefits of Practicing with CS Test Series</h4>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        CS test series offer numerous advantages that make them a must-have resource for every serious exam candidate. First and foremost, they provide an excellent platform for self-assessment. By regularly practicing with test papers, candidates can gauge their understanding of various topics and measure their readiness for the actual exam. This self-assessment capability helps in creating a focused study plan that addresses specific weaknesses rather than spending equal time on all topics regardless of their importance.
                    </p>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        Another significant benefit of CS test series is the development of time management skills. The ICSI exams are known for their strict time constraints, and many candidates struggle to complete their papers within the allocated time. Regular practice with timed test series helps candidates improve their speed and accuracy while learning to allocate appropriate time to different sections and question types. This skill is invaluable during the actual examination when every minute counts towards achieving a higher score.
                    </p>
                    
                    <h4 style="font-size: 1.15rem; font-weight: 700; margin: 25px 0 12px; color: var(--dark);">Understanding the ICSI Exam Pattern</h4>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        The ICSI examination pattern is unique and requires specific preparation strategies. CS test series designed by expert faculty members closely mimic the actual exam pattern, including question formats, marking schemes, and difficulty levels. This exposure helps candidates become familiar with what to expect in the real examination, reducing anxiety and building confidence. When candidates practice with test papers that reflect the actual exam structure, they develop the right mindset and approach needed to excel in the examination hall.
                    </p>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        Quality test series also include detailed explanations and solutions for every question. These explanations help candidates understand the underlying concepts and reasoning behind each answer. This learning approach is far more effective than simply memorizing answers, as it builds a strong foundation of knowledge that can be applied to different types of questions. The detailed analysis provided after each test helps candidates learn from their mistakes and avoid repeating them in future attempts.
                    </p>
                    
                    <h4 style="font-size: 1.15rem; font-weight: 700; margin: 25px 0 12px; color: var(--dark);">Performance Tracking and Analytics</h4>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        Modern CS test series platforms come equipped with advanced performance tracking features. These analytics provide valuable insights into a candidate's strengths and weaknesses across different topics and question categories. By analyzing performance trends over multiple tests, candidates can identify patterns in their preparation and make data-driven decisions about their study plan. This analytical approach ensures that preparation efforts are directed towards areas that need the most improvement.
                    </p>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        All India ranking systems available in competitive test series give candidates a realistic assessment of where they stand among their peers. This competitive element motivates candidates to perform better and helps them understand the level of competition they will face in the actual examination. Knowing that thousands of other aspirants are also preparing with the same resources creates a healthy competitive environment that drives candidates to put in their best efforts.
                    </p>
                    
                    <h4 style="font-size: 1.15rem; font-weight: 700; margin: 25px 0 12px; color: var(--dark);">Building Exam-Ready Confidence</h4>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        Confidence plays a vital role in examination success, and CS test series help build this confidence through systematic practice. When candidates consistently perform well in their practice tests, they develop a positive mindset that translates into better performance during the actual examination. This psychological advantage cannot be underestimated, as even well-prepared candidates can underperform if they lack confidence on exam day.
                    </p>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        The journey to becoming a qualified Company Secretary is challenging but rewarding. CS test series serve as a reliable companion throughout this journey, providing the structure, feedback, and motivation needed to succeed. Whether a candidate is preparing for their first attempt or looking to improve their previous scores, incorporating quality test series into their preparation strategy is one of the smartest investments they can make towards their career goals.
                    </p>
                    
                    <h4 style="font-size: 1.15rem; font-weight: 700; margin: 25px 0 12px; color: var(--dark);">Key Features of Effective CS Practice Tests</h4>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 15px;">
                        Effective CS test series should include chapterwise tests for topic-specific practice, module tests for integrated understanding, and full mock exams for comprehensive revision. The questions should be crafted by experienced faculty members who understand the ICSI curriculum and examination patterns. Additionally, the availability of detailed performance reports and All India rankings makes it easier for candidates to track their progress and compete with fellow aspirants across the country.
                    </p>
                    
                    <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.9; margin-bottom: 20px;">
                        In conclusion, CS test series are not just practice tools but comprehensive preparation solutions that address every aspect of examination readiness. From building conceptual clarity to developing exam-taking strategies, these resources provide everything a candidate needs to clear their ICSI exams with flying colors. Investing in quality test series is investing in your success as a future Company Secretary.
                    </p>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="cta-section">
                <div class="cta-content">
                    <h3>Ready to Ace Your <?= htmlspecialchars($typeName) ?> Exams?</h3>
                    <p>Select your subjects above and start your journey to success today!</p>
                    <p style="margin-top: 15px; font-size: 0.95rem; opacity: 0.9;">
                        Join thousands of successful <?= htmlspecialchars($typeName) ?> candidates who cleared their ICSI exams with our practice tests.
                    </p>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Sticky Cart Button -->
<a href="<?= base_url('cart') ?>" class="sticky-cart-btn">
    <span class="cart-count cartCount"><?=!empty($cartCount) ? $cartCount : 0?></span>
    <span>Proceed to Payment</span>
    <i class="fas fa-arrow-right"></i>
</a>

<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
<script type="text/javascript">
    var pageType = 'subject_list';
</script>
<?= $this->endSection() ?>
