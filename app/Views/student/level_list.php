<?= $this->extend('layout/student_layout') ?>

<?php 
// Build dynamic page data
$pageTitle = 'CS Test Series | Executive, Professional & CSEET Test Series - MY CS MTP';
$metaDescription = 'Best CS Test Series for CSEET, CS Executive & Professional exams. ICSI pattern papers with expert evaluation, detailed analysis & All India ranking. Join 10,000+ successful students.';
$keywords = 'cs test series, cseet test series, cs executive test series, cs professional test series, icsi test series, company secretary exam preparation, cs mock tests, online test series';

// Get level names for dynamic content
$levelNames = [];
if(!empty($level_list)) {
    foreach($level_list as $level) {
        $levelNames[] = $level['level_name'];
    }
}
$levelNamesStr = !empty($levelNames) ? implode(', ', $levelNames) : 'CSEET, CS Executive, CS Professional';
?>

<?= $this->section('title') ?>
<?= $pageTitle ?>
<?= $this->endSection() ?>

<?= $this->section('meta') ?>
    <!-- Primary Meta Tags -->
    <meta name="description" content="<?= $metaDescription ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="MY CS MTP TEST SERIES">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="theme-color" content="#1ab79c">
    <meta name="msapplication-TileColor" content="#1ab79c">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= base_url() ?>level-list">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>level-list">
    <meta property="og:title" content="<?= $pageTitle ?>">
    <meta property="og:description" content="<?= $metaDescription ?>">
    <meta property="og:image" content="<?= base_url() ?>images/og-level-list.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="MY CS MTP TEST SERIES">
    <meta property="og:locale" content="en_IN">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= base_url() ?>level-list">
    <meta name="twitter:title" content="CS Test Series | Executive, Professional & CSEET - MY CS MTP">
    <meta name="twitter:description" content="<?= $metaDescription ?>">
    <meta name="twitter:image" content="<?= base_url() ?>images/og-level-list.jpg">
    <meta name="twitter:site" content="@mycsmtp">
    
    <!-- WebPage Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "CS Test Series - Executive, Professional & CSEET",
        "description": "<?= $metaDescription ?>",
        "url": "<?= base_url() ?>level-list",
        "primaryImageOfPage": {
            "@type": "ImageObject",
            "url": "<?= base_url() ?>images/og-level-list.jpg"
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
                    "name": "CS Test Series",
                    "item": "<?= base_url() ?>level-list"
                }
            ]
        },
        "publisher": {
            "@type": "Organization",
            "name": "My CS MTP",
            "logo": {
                "@type": "ImageObject",
                "url": "<?= base_url() ?>images/logo.png"
            }
        }
    }
    </script>
    
    <!-- Structured Data - ItemList (For Course Levels) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "itemListElement": [
            <?php if(!empty($level_list)): ?>
                <?php foreach($level_list as $index => $level): ?>
                    {
                        "@type": "ListItem",
                        "position": <?= $index + 1 ?>,
                        "item": {
                            "@type": "Course",
                            "name": "<?= htmlspecialchars($level['level_name']) ?>",
                            "description": "<?= htmlspecialchars($level['level_name']) ?> test series with ICSI pattern papers, expert evaluation & detailed analysis.",
                            "provider": {
                                "@type": "Organization",
                                "name": "MY CS MTP TEST SERIES"
                            },
                            "educationalLevel": "<?= htmlspecialchars($level['level_name']) ?>",
                            "audience": {
                                "@type": "Audience",
                                "audienceType": "CS Students"
                            }
                        }
                    }<?= ($index < count($level_list) - 1) ? ',' : '' ?>
                <?php endforeach; ?>
            <?php else: ?>
            {
                "@type": "ListItem",
                "position": 1,
                "item": {
                    "@type": "Course",
                    "name": "CSEET Test Series",
                    "description": "CS Executive Entrance Test preparation with practice papers and mock tests",
                    "provider": {
                        "@type": "Organization",
                        "name": "MY CS MTP TEST SERIES"
                    }
                }
            },
            {
                "@type": "ListItem",
                "position": 2,
                "item": {
                    "@type": "Course",
                    "name": "CS Executive Test Series",
                    "description": "Comprehensive test series for CS Executive level with ICSI pattern papers",
                    "provider": {
                        "@type": "Organization",
                        "name": "MY CS MTP TEST SERIES"
                    }
                }
            },
            {
                "@type": "ListItem",
                "position": 3,
                "item": {
                    "@type": "Course",
                    "name": "CS Professional Test Series",
                    "description": "Advanced test series for CS Professional level with detailed evaluation",
                    "provider": {
                        "@type": "Organization",
                        "name": "MY CS MTP TEST SERIES"
                    }
                }
            }
            <?php endif; ?>
        ]
    }
    </script>
    
    <!-- Structured Data - BreadcrumbList -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
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
                "name": "CS Test Series",
                "item": "<?= base_url() ?>level-list"
            }
        ]
    }
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
  :root {
    --primary: #1ab79c;
    --primary-dark: #148f77;
    --primary-light: rgba(26, 183, 156, 0.1);
    --dark: #2d3748;
    --light: #f8fafc;
    --gradient: linear-gradient(135deg, #1ab79c 0%, #0f766e 100%);
    --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  }

  /* Modern Base */
  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    color: var(--dark);
    background-color: #f9fafb;
    font-size: 16px;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }

  /* Hero Section */
  .hero {
    background: var(--gradient);
    color: white;
    padding: 60px 0;
    clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    margin-bottom: 40px;
    position: relative;
  }

  .hero-title {
    font-weight: 700;
    font-size: 2.5rem;
    margin-bottom: 12px;
    line-height: 1.2;
  }

  .hero-subtitle {
    font-size: 1.1rem;
    opacity: 0.95;
    max-width: 700px;
    margin: 0 auto 24px;
    line-height: 1.6;
  }

  /* Card Grid */
  .card-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin: 32px 0 48px;
  }

  .exam-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
  }

  .exam-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: var(--primary);
  }

  .card-header {
    background: var(--primary-light);
    padding: 24px;
    text-align: center;
  }

  .card-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    border-radius: 50%;
    box-shadow: var(--shadow);
  }

  .card-icon img {
    width: 32px;
    height: 32px;
  }

  .card-body {
    padding: 20px 24px 24px;
  }

  .card-title {
    font-weight: 600;
    font-size: 1.25rem;
    color: var(--dark);
    margin-bottom: 8px;
    text-align: center;
    line-height: 1.3;
  }

  .card-desc {
    color: #6b7280;
    text-align: center;
    font-size: 0.95rem;
    margin-bottom: 16px;
    line-height: 1.5;
  }

  .card-cta {
    display: block;
    text-align: center;
    background: var(--primary);
    color: white;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.2s;
    border: none;
    cursor: pointer;
  }

  .card-cta:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
  }

  /* Value Props */
  .value-section {
    background: white;
    border-radius: 12px;
    padding: 32px;
    margin: 32px 0 48px;
    box-shadow: var(--shadow);
    border: 1px solid #e5e7eb;
  }

  .section-title {
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--dark);
    margin-bottom: 16px;
    position: relative;
    display: inline-block;
    line-height: 1.3;
  }

  .section-title:after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 48px;
    height: 4px;
    background: var(--primary);
    border-radius: 2px;
  }

  .section-title:only-child {
    margin-bottom: 0;
  }

  .section-title:only-child:after {
    display: none;
  }

  .value-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
    margin-top: 24px;
  }

  .value-item {
    display: flex;
    gap: 14px;
    align-items: flex-start;
  }

  .value-icon {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    background: var(--primary-light);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: 1.25rem;
  }

  .value-content h3 {
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 4px;
    color: var(--dark);
    line-height: 1.4;
  }

  .value-content p {
    color: #6b7280;
    font-size: 0.9rem;
    margin: 0;
    line-height: 1.6;
  }

  /* CTA Section */
  .cta-section {
    text-align: center;
    margin: 48px 0 64px;
    padding: 0 20px;
  }

  .cta-title {
    font-weight: 700;
    font-size: 1.75rem;
    margin-bottom: 12px;
    color: var(--dark);
    line-height: 1.2;
  }

  .cta-subtitle {
    color: #6b7280;
    max-width: 600px;
    margin: 0 auto 24px;
    font-size: 1rem;
    line-height: 1.6;
  }

  .cta-button {
    display: inline-block;
    background: var(--primary);
    color: white;
    padding: 14px 32px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.2s;
    box-shadow: 0 4px 14px rgba(26, 183, 156, 0.3);
    border: none;
    cursor: pointer;
  }

  .cta-button:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(26, 183, 156, 0.35);
  }

  /* Responsive */
  @media (max-width: 1024px) {
    .card-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
    }
  }

  @media (max-width: 640px) {

    .hero-title {
      font-size: 2rem;
    }

    .hero-subtitle {
      font-size: 1rem;
      padding: 0 20px;
    }

    .value-section {
      padding: 24px;
    }

    .section-title {
      font-size: 1.35rem;
    }

    .card-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
    }
  }

  @media (max-width: 640px) {
    body {
      font-size: 15px;
    }

    .container {
      padding: 0 16px;
    }

    .hero {
      padding: 40px 0;
      clip-path: polygon(0 0, 100% 0, 100% 92%, 0 100%);
      margin-bottom: 32px;
    }

    .hero-title {
      font-size: 1.75rem;
      margin-bottom: 10px;
    }

    .hero-subtitle {
      font-size: 0.95rem;
      padding: 0 12px;
      margin-bottom: 20px;
    }

    .cta-button {
      padding: 12px 28px;
      font-size: 0.95rem;
    }

    .card-grid {
      grid-template-columns: 1fr;
      gap: 16px;
      margin: 24px 0 40px;
      padding: 0 8px;
    }

    .value-section {
      padding: 20px;
      margin: 24px 0 32px;
      border-radius: 10px;
    }

    .section-title {
      font-size: 1.2rem;
      margin-bottom: 12px;
    }

    .section-title:after {
      width: 40px;
      height: 3px;
      bottom: -4px;
    }

    .value-grid {
      grid-template-columns: 1fr;
      gap: 16px;
    }

    .value-item {
      gap: 12px;
    }

    .value-icon {
      width: 44px;
      height: 44px;
      font-size: 1.1rem;
    }

    .value-content h3 {
      font-size: 0.95rem;
    }

    .value-content p {
      font-size: 0.875rem;
    }

    .cta-section {
      margin: 32px 0 48px;
      padding: 0 12px;
    }

    .cta-title {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }

    .cta-subtitle {
      font-size: 0.9rem;
      margin-bottom: 20px;
    }

    .exam-card {
      border-radius: 10px;
    }

    .card-header {
      padding: 20px;
    }

    .card-icon {
      width: 56px;
      height: 56px;
    }

    .card-icon img {
      width: 28px;
      height: 28px;
    }

    .card-body {
      padding: 16px 20px 20px;
    }

    .card-title {
      font-size: 1.1rem;
      margin-bottom: 6px;
    }

    .card-desc {
      font-size: 0.875rem;
      margin-bottom: 12px;
    }

    .card-cta {
      padding: 10px 16px;
      font-size: 0.9rem;
    }
  }

  @media (max-width: 480px) {
    body {
      font-size: 14px;
    }

    .container {
      padding: 0 12px;
    }

    .hero {
      padding: 32px 0;
      clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    }

    .hero-title {
      font-size: 1.5rem;
      margin-bottom: 8px;
    }

    .hero-subtitle {
      font-size: 0.875rem;
      line-height: 1.5;
      padding: 0 8px;
      margin-bottom: 16px;
    }

    .cta-button {
      padding: 10px 24px;
      font-size: 0.875rem;
      border-radius: 6px;
    }

    .card-grid {
      padding: 0 4px;
      gap: 12px;
      margin: 20px 0 32px;
    }

    .value-section {
      padding: 16px;
      margin: 20px 0 28px;
    }

    .section-title {
      font-size: 1.1rem;
      margin-bottom: 10px;
    }

    .section-title:after {
      width: 36px;
      height: 3px;
      bottom: -4px;
    }

    .value-grid {
      gap: 12px;
    }

    .value-item {
      gap: 10px;
    }

    .value-icon {
      width: 40px;
      height: 40px;
      font-size: 1rem;
      border-radius: 8px;
    }

    .value-content h3 {
      font-size: 0.9rem;
    }

    .value-content p {
      font-size: 0.8rem;
      line-height: 1.5;
    }

    .cta-section {
      margin: 24px 0 40px;
      padding: 0 8px;
    }

    .cta-title {
      font-size: 1.25rem;
      margin-bottom: 8px;
    }

    .cta-subtitle {
      font-size: 0.85rem;
      margin-bottom: 16px;
    }

    .exam-card {
      border-radius: 8px;
    }

    .card-header {
      padding: 16px;
    }

    .card-icon {
      width: 48px;
      height: 48px;
    }

    .card-icon img {
      width: 24px;
      height: 24px;
    }

    .card-body {
      padding: 12px 16px 16px;
    }

    .card-title {
      font-size: 1rem;
      margin-bottom: 4px;
    }

    .card-desc {
      font-size: 0.8rem;
      margin-bottom: 10px;
    }

    .card-cta {
      padding: 8px 14px;
      font-size: 0.85rem;
      border-radius: 6px;
    }
  }
</style>
    <style>
        .tp-mg {
            margin: 24px;
        }
        @media (min-width: 480px) {
            .tp-mg {
                margin: 32px;
            }
        }
        @media (min-width: 768px) {
            .tp-mg {
                margin: 48px;
            }
        }
        @media (min-width: 1024px) {
            .tp-mg {
                margin: 64px;
            }
        }
    </style>
    <style>
        .tp-mg {
            margin: 20px;
        }
        @media (min-width: 480px) {
            .tp-mg {
                margin: 30px;
            }
        }
        @media (min-width: 768px) {
            .tp-mg {
                margin: 50px;
            }
        }
        @media (min-width: 992px) {
            .tp-mg {
                margin: 70px;
            }
        }
    </style>
<!-- Breadcrumbs -->
<nav aria-label="Breadcrumb" class="bg-light py-2 border-bottom">
    <div class="container">
        <ol class="breadcrumb mb-0" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?= base_url() ?>" itemprop="item" class="text-decoration-none" style="color: #1ab79c;">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span itemprop="name">CS Test Series</span>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </div>
</nav>

<div class="tp-mg"></div>
<!-- Hero Section -->
<section class="hero" aria-labelledby="hero-title">
  <div class="container text-center">
    <h1 id="hero-title" class="hero-title">Best CS Test Series for CSEET, Executive & Professional Exams</h1>
    <p class="hero-subtitle">Prepare for your ICSI exams with expert-crafted test series. Practice with ICSI pattern papers, get detailed evaluation & track your progress with All India ranking.</p>
    <a href="#courses" class="cta-button" role="button">Explore Test Series</a>
  </div>
</section>

<!-- Exam Cards -->
<div class="container" id="courses">
  <header>
    <h2 class="section-title">Choose Your CS Test Series Level</h2>
  </header>
  <div class="card-grid" role="list" aria-label="CS Test Series Levels">
    <?php if(!empty($level_list)): ?>
      <?php foreach ($level_list as $level): ?>
        <article class="exam-card" role="listitem" itemscope itemtype="https://schema.org/Course">
          <meta itemprop="name" content="<?= htmlspecialchars($level['level_name']) ?>">
          <meta itemprop="description" content="<?= htmlspecialchars($level['level_name']) ?> test series with ICSI pattern papers, expert evaluation & detailed analysis.">
          <div class="card-header">
            <div class="card-icon" aria-hidden="true">
              <img src="<?=base_url()?>design_assets/images/category-1.svg" alt="" loading="lazy" decoding="async">
            </div>
          </div>
          <div class="card-body">
            <h3 class="card-title" itemprop="name"><?=htmlspecialchars($level['level_name'])?></h3>
            <p class="card-desc">Comprehensive test series with detailed solutions and performance analysis</p>
            <a href="javascript:void(0)" class="card-cta levelBtn" data-level-id="<?=$level['level_id']?>" role="button" aria-label="View plans for <?= htmlspecialchars($level['level_name']) ?>">View Plans</a>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No levels available at the moment.</p>
    <?php endif; ?>
  </div>
</div>

<!-- Introduction to CS Test Series -->
<div class="container">
  <section class="value-section" aria-labelledby="success-title">
    <h2 id="success-title" class="section-title">Why CS Test Series Matters for Your Success</h2>
    <p itemprop="description">The Company Secretary qualification represents one of the most prestigious professional certifications in India's corporate landscape. Administered by the Institute of Company Secretaries of India (ICSI), the CS program requires candidates to demonstrate exceptional knowledge across corporate law, governance, compliance, and management. Preparing for CS examinations through traditional study methods alone often proves insufficient, which is why comprehensive CS test series have become an integral part of successful exam preparation strategies.</p>
    
    <p>CS test series provide a structured approach to evaluating your preparedness before facing the actual examinations. These practice programs simulate real exam conditions, allowing students to test their knowledge, identify weak areas, and refine their answer-writing techniques under timed conditions. Regular participation in test series transforms theoretical knowledge into practical exam skills, bridging the gap between understanding concepts and successfully demonstrating that understanding in an examination setting.</p>
  </section>
</div>

<!-- What CS Test Series Include -->
<div class="container">
  <section class="value-section" aria-labelledby="components-title">
    <h2 id="components-title" class="section-title">Comprehensive Components of CS Test Series</h2>
    <p>A well-structured CS test series encompasses multiple elements designed to thoroughly prepare students for examination success. These programs typically include practice papers modeled after ICSI examination patterns, featuring questions that mirror the complexity and variety found in actual exams.</p>
    
    <div class="value-grid" role="list">
      <div class="value-item" role="listitem">
        <div class="value-icon" aria-hidden="true">📋</div>
        <div class="value-content">
          <h3>Practice Papers</h3>
          <p>Subject-specific question papers designed according to ICSI examination standards.</p>
        </div>
      </div>
      
      <div class="value-item" role="listitem">
        <div class="value-icon" aria-hidden="true">⏰</div>
        <div class="value-content">
          <h3>Mock Examinations</h3>
          <p>Full-length simulated exams conducted under timed conditions.</p>
        </div>
      </div>
      
      <div class="value-item" role="listitem">
        <div class="value-icon" aria-hidden="true">✓</div>
        <div class="value-content">
          <h3>Detailed Evaluations</h3>
          <p>Comprehensive assessment with detailed feedback.</p>
        </div>
      </div>
      
      <div class="value-item" role="listitem">
        <div class="value-icon" aria-hidden="true">📊</div>
        <div class="value-content">
          <h3>Performance Analysis</h3>
          <p>Systematic tracking of progress across multiple tests.</p>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Three Levels Section -->
<div class="container">
  <section class="value-section" aria-labelledby="levels-title">
    <h2 id="levels-title" class="section-title">CS Test Series for All Three Levels</h2>
    <p>The Company Secretary course comprises three distinct levels, each requiring specialized preparation approaches.</p>
    
    <p><strong>CSEET (CS Executive Entrance Test):</strong> The entry-level examination tests foundational knowledge in business communication, legal aptitude, economic understanding, and current affairs.</p>
    
    <p><strong>CS Executive:</strong> The intermediate level delves deeper into corporate law, securities regulations, tax laws, and accounting standards.</p>
    
    <p><strong>CS Professional:</strong> The final level covers advanced topics in corporate restructuring, governance, strategic management, and specialized laws.</p>
  </section>
</div>

<!-- Benefits of Answer Writing Practice -->
<div class="container">
  <section class="value-section" aria-labelledby="answer-writing-title">
    <h2 id="answer-writing-title" class="section-title">Mastering Answer Writing and Time Management</h2>
    <p>The ability to articulate knowledge effectively within strict time constraints distinguishes successful CS candidates from unsuccessful ones. Regular practice through test series develops essential answer-writing skills that directly impact examination performance.</p>
    
    <p>Time management represents another critical skill honed through consistent test series participation. Many students possess adequate subject knowledge but struggle to complete papers within allocated timeframes.</p>
    
    <div class="value-grid" role="list">
      <div class="value-item" role="listitem">
        <div class="value-icon" aria-hidden="true">📝</div>
        <div class="value-content">
          <h3>Structured Presentation</h3>
          <p>Learn to organize answers with proper headings and logical flow.</p>
        </div>
      </div>
      
      <div class="value-item" role="listitem">
        <div class="value-icon" aria-hidden="true">⚡</div>
        <div class="value-content">
          <h3>Speed Development</h3>
          <p>Build writing speed while maintaining quality.</p>
        </div>
      </div>
      
      <div class="value-item" role="listitem">
        <div class="value-icon" aria-hidden="true">🎯</div>
        <div class="value-content">
          <h3>Keyword Integration</h3>
          <p>Master technical terms and legal keywords.</p>
        </div>
      </div>
      
      <div class="value-item" role="listitem">
        <div class="value-icon" aria-hidden="true">💡</div>
        <div class="value-content">
          <h3>Confidence Building</h3>
          <p>Reduce examination anxiety through familiarity.</p>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Expert Evaluation Section -->
<div class="container">
  <section class="value-section" aria-labelledby="evaluation-title">
    <h2 id="evaluation-title" class="section-title">Expert Evaluation and Constructive Feedback</h2>
    <p>The value of test series extends beyond mere practice to include professional evaluation by experienced CS practitioners and educators. Expert evaluators assess submitted answers against ICSI marking standards, providing detailed feedback that highlights both strengths and areas requiring attention.</p>
    
    <p>Constructive feedback addresses multiple dimensions of answer quality including content accuracy, legal reasoning, presentation style, time allocation, and adherence to marking schemes.</p>
  </section>
</div>

<!-- Benefits of Regular Practice -->
<div class="container">
  <section class="value-section" aria-labelledby="practice-title">
    <h2 id="practice-title" class="section-title">The Transformative Benefits of Regular Practice</h2>
    <p>Consistent engagement with test series produces measurable improvements across multiple dimensions of examination preparation. Students who commit to regular practice demonstrate enhanced subject retention, as the active recall required during testing reinforces memory pathways more effectively than passive review.</p>
    
    <p>Furthermore, test series participation exposes students to diverse question types and variations, reducing the likelihood of encountering unexpected question formats during actual examinations.</p>
    
    <p>Investing in quality CS test series represents a strategic decision that maximizes the return on your study efforts.</p>
  </section>
</div>

<!-- Final CTA -->
<div class="container">
  <section class="cta-section" aria-labelledby="cta-title">
    <h2 id="cta-title" class="cta-title">Start Your CS Test Series Journey Today</h2>
    <p class="cta-subtitle">Choose your level and begin comprehensive preparation with expertly designed test series that align with ICSI examination standards.</p>
    <a href="#courses" class="cta-button" role="button">View Test Series Plans</a>
  </section>
</div>

<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
<script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.4"></script>
<?= $this->endSection() ?>
