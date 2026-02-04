<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Preconnect to most critical domains only (limit to 2-3 for best performance) -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Dynamic Meta Tags -->
    <?php if (isset($meta_description)): ?>
        <meta name="description" content="<?= esc($meta_description) ?>">
    <?php endif; ?>
    <?php if (isset($meta_keywords)): ?>
        <meta name="keywords" content="<?= esc($meta_keywords) ?>">
    <?php endif; ?>
    <?php if (isset($og_title)): ?>
        <meta property="og:title" content="<?= esc($og_title) ?>">
    <?php endif; ?>
    <?php if (isset($og_description)): ?>
        <meta property="og:description" content="<?= esc($og_description) ?>">
    <?php endif; ?>
    <meta property="og:type" content="website">
    
    <!-- Google tag (gtag.js) - Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-XXXXXXXXXX');
    </script>
    
    <title>MY CS MTP TEST SERIES</title>
    
    <!-- Critical CSS - Bootstrap from CDN with cache benefits (152KB -> ~20KB used) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Non-critical CSS - Load asynchronously to prevent render blocking -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css?display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css?display=swap"></noscript>
    
    <!-- Font Awesome font-display swap for better performance -->
    <style>
    @font-face {
      font-family: 'Font Awesome 6 Brands';
      font-display: swap;
    }
    @font-face {
      font-family: 'Font Awesome 6 Free';
      font-display: swap;
    }
    @font-face {
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      font-display: swap;
    }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></noscript>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"></noscript>
    
    <!-- Google Fonts with font-display swap for faster text rendering -->
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "MY CS MTP TEST SERIES",
      "description": "Premium CS Test Series for CSEET, CS Executive & CS Professional as per ICSI pattern",
      "url": "https://mycsmpttestseries.com",
      "logo": "https://mycsmpttestseries.com/logo.png",
      "sameAs": [
        "https://facebook.com/mycsmpttestseries",
        "https://twitter.com/mycsmpttestseries",
        "https://instagram.com/mycsmpttestseries"
      ]
    }
    </script>

    <!-- Primary Meta Tags -->
    <meta name="description" content="We're the leading Test Series platform offering unique sets of questions aligned with the ICSI pattern, incorporating the latest amendments in Our CS Test Series to meet the real exam scenarios.">
    <meta name="keywords" content="CS test series, CS Exams, ICSI exams, ICSI updates  ICSI test series, CSEET, CS executive, Cs professional, Cseet test series, CS professional test series, CS Executive test series, Best test series for CS exams, Number 1 test series for CS exams, CA test series
ICSI Exams, Company secretary, CS exam preparation, Cs exams test series, CS mock test, ICSI mock test, Icsi MTP, MYCSMTP test series, CS online test series, Best cs test series, Company secretary test series, Test series">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>design_assets/images/favicon.png" type="image/svg+xml">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/custom_css/new_style.css?v=1.1.0">
    
    <!-- Preload critical images -->
    <link rel="preload" as="image" href="https://mycsmtp.com/images/hero-section-image.webp" fetchpriority="high">
    <link rel="preload" as="image" href="<?=base_url()?>design_assets/images/hero-bg.svg">
    <link rel="preload" as="image" href="<?=base_url()?>design_assets/images/hero-banner-1.jpg">
    <link rel="preload" as="image" href="<?=base_url()?>design_assets/images/hero-banner-2.jpg">
    <link rel="preload" as="image" href="<?=base_url()?>design_assets/images/hero-shape-1.svg">
    <link rel="preload" as="image" href="<?=base_url()?>design_assets/images/hero-shape-2.png">
