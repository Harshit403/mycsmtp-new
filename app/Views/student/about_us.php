<?= $this->extend('layout/student_layout') ?>

<?= $this->section('title') ?>
    About Us | MY CS MTP Test Series - Leading CS Exam Preparation Platform Since 2021
<?= $this->endSection() ?>

<?= $this->section('meta') ?>
    <!-- Primary Meta Tags -->
    <meta name="description" content="Learn about MY CS MTP - India's trusted CS test series provider since 2021. We have empowered 15,000+ CS aspirants with ICSI pattern-based tests and expert evaluation. Discover our mission, vision, and proven methodology.">
    <meta name="keywords" content="about MY CS MTP, CS test series company, CS exam preparation platform, Company Secretary coaching, ICSI test series provider, CS education India, MY CS MTP history, CS exam experts">
    <meta name="author" content="MY CS MTP Test Series">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= base_url() ?>about-us">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>about-us">
    <meta property="og:title" content="About MY CS MTP | Leading CS Test Series Provider Since 2021">
    <meta property="og:description" content="Discover MY CS MTP - India's trusted CS test series platform. 15,000+ students empowered with ICSI pattern-based tests and expert evaluation.">
    <meta property="og:image" content="<?= base_url() ?>images/og-about-us.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="MY CS MTP Test Series">
    <meta property="og:locale" content="en_IN">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= base_url() ?>about-us">
    <meta property="twitter:title" content="About MY CS MTP | Trusted CS Exam Preparation Platform">
    <meta property="twitter:description" content="Learn about MY CS MTP - empowering 15,000+ CS aspirants since 2021 with ICSI pattern-based test series.">
    <meta property="twitter:image" content="<?= base_url() ?>images/og-about-us.jpg">
    
    <!-- Structured Data - Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "MY CS MTP Test Series",
        "description": "Premium CS Test Series for CSEET, CS Executive & CS Professional as per ICSI pattern",
        "url": "<?= base_url() ?>",
        "logo": "<?= base_url() ?>design_assets/images/favicon.png",
        "foundingDate": "2021",
        "sameAs": [
            "https://facebook.com/mycsmpttestseries",
            "https://twitter.com/mycsmpttestseries",
            "https://instagram.com/mycsmpttestseries",
            "https://linkedin.com/company/mycsmpttestseries"
        ],
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "Customer Support",
            "availableLanguage": ["English", "Hindi"]
        }
    }
    </script>
    
    <!-- Structured Data - About Page -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "AboutPage",
        "name": "About MY CS MTP",
        "description": "Learn about MY CS MTP Test Series - India's leading CS exam preparation platform since 2021",
        "url": "<?= base_url() ?>about-us",
        "mainEntity": {
            "@type": "EducationalOrganization",
            "name": "MY CS MTP Test Series",
            "foundingDate": "2021",
            "description": "Leading CS test series provider empowering aspirants since 2021"
        }
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
                "name": "About Us",
                "item": "<?= base_url() ?>about-us"
            }
        ]
    }
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<main role="main">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="bg-light py-2 border-bottom">
        <div class="container">
            <ol class="breadcrumb mb-0" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="<?= base_url() ?>" itemprop="item" class="text-decoration-none" style="color: #1ab79c;">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">About Us</span>
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>
    </nav>

    <!-- Hero Banner -->
    <section class="position-relative overflow-hidden" aria-labelledby="hero-heading">
        <div class="hero-section py-5" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 50%, #0d6b5a 100%); min-height: 450px;">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-7 text-white py-4">
                        <span class="badge bg-white mb-3 px-3 py-2 fs-6 fw-semibold" style="color: #1ab79c;">
                            <i class="fas fa-building me-2"></i>Since 2021
                        </span>
                        <h1 id="hero-heading" class="display-3 fw-bold mb-4 animate-fade-in">
                            About <span class="text-warning">MY CS MTP</span>
                        </h1>
                        <p class="lead mb-4 fs-5 animate-fade-in-delay">
                            Empowering <span class="counter fw-bold" data-target="15000">0</span>+ CS aspirants with excellence through innovative test series and expert evaluation since 2021.
                        </p>
                        <div class="d-flex flex-wrap gap-3 animate-fade-in-delay-2">
                            <a href="<?= base_url() ?>plans" class="btn btn-light btn-lg px-4 py-3 fw-bold shadow-lg" style="color: #1ab79c;">
                                <i class="fas fa-rocket me-2"></i>Explore Plans
                            </a>
                            <a href="#story" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold">
                                <i class="fas fa-book-open me-2"></i>Our Story
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="position-relative">
                            <div class="floating-card bg-white rounded-4 p-3 shadow-lg position-absolute" style="top: 30px; right: 0; z-index: 2; max-width: 200px;">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background-color: rgba(26, 183, 156, 0.1);">
                                        <i class="fas fa-users text-success fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold fs-4 text-dark">15K+</span>
                                        <p class="mb-0 text-muted small">Students Helped</p>
                                    </div>
                                </div>
                            </div>
                            <img src="<?= base_url() ?>images/about-hero.png" alt="MY CS MTP Team and Students" class="img-fluid rounded-4 shadow-lg" style="transform: perspective(1000px) rotateY(-5deg);" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Timeline -->
    <section id="story" class="py-5" aria-labelledby="story-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-history me-2"></i>Our Journey
                    </span>
                    <h2 id="story-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">From Vision to Reality</h2>
                    <p class="lead text-muted">The story of how MY CS MTP became a trusted name in CS education</p>
                </div>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="timeline position-relative">
                        <div class="timeline-item d-flex mb-4">
                            <div class="timeline-marker flex-shrink-0 me-4">
                                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%);">
                                    <i class="fas fa-lightbulb text-white"></i>
                                </div>
                            </div>
                            <div class="timeline-content">
                                <h4 class="h5 fw-bold mb-2" style="color: #1ab79c;">2021 - The Beginning</h4>
                                <p class="text-muted mb-0">Founded with a vision to bridge the gap between theoretical knowledge and exam performance for CS aspirants.</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item d-flex mb-4">
                            <div class="timeline-marker flex-shrink-0 me-4">
                                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);">
                                    <i class="fas fa-flask text-white"></i>
                                </div>
                            </div>
                            <div class="timeline-content">
                                <h4 class="h5 fw-bold mb-2" style="color: #6f42c1;">2022 - Methodology Development</h4>
                                <p class="text-muted mb-0">Developed our unique 4-layer evaluation system that became our hallmark in CS education.</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item d-flex mb-4">
                            <div class="timeline-marker flex-shrink-0 me-4">
                                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%);">
                                    <i class="fas fa-chart-line text-white"></i>
                                </div>
                            </div>
                            <div class="timeline-content">
                                <h4 class="h5 fw-bold mb-2" style="color: #fd7e14;">2023 - Rapid Growth</h4>
                                <p class="text-muted mb-0">Expanded our reach to serve 10,000+ students with a team of expert evaluators and educators.</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item d-flex">
                            <div class="timeline-marker flex-shrink-0 me-4">
                                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: linear-gradient(135deg, #20c997 0%, #16a085 100%);">
                                    <i class="fas fa-trophy text-white"></i>
                                </div>
                            </div>
                            <div class="timeline-content">
                                <h4 class="h5 fw-bold mb-2" style="color: #20c997;">2024-2025 - Industry Leader</h4>
                                <p class="text-muted mb-0">Recognized as one of India's leading CS test series providers with 15,000+ success stories.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?= base_url() ?>images/journey.jpg" alt="MY CS MTP Growth Journey" class="img-fluid rounded-4 shadow-lg" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Vision Values -->
    <section class="py-5" style="background-color: #f8f9fa;" aria-labelledby="mission-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-compass me-2"></i>Our Foundation
                    </span>
                    <h2 id="mission-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Mission, Vision & Values</h2>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <article class="mission-card card border-0 shadow-sm h-100 overflow-hidden" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="mission-icon mx-auto" style="width: 80px; height: 80px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                            </div>
                            <h3 class="h4 text-center mb-3 fw-bold" style="color: #1ab79c;">Our Mission</h3>
                            <p class="text-center text-muted">To revolutionize CS exam preparation through innovative, exam-focused test series that bridge the gap between learning and performance. We aim to make quality CS education accessible to every aspirant.</p>
                        </div>
                    </article>
                </div>
                
                <div class="col-lg-4">
                    <article class="mission-card card border-0 shadow-sm h-100 overflow-hidden" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="mission-icon mx-auto" style="width: 80px; height: 80px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <h3 class="h4 text-center mb-3 fw-bold" style="color: #6f42c1;">Our Vision</h3>
                            <p class="text-center text-muted">To be the most trusted CS test series provider in India, recognized for transforming students into top performers through strategic preparation and personalized guidance.</p>
                        </div>
                    </article>
                </div>
                
                <div class="col-lg-4">
                    <article class="mission-card card border-0 shadow-sm h-100 overflow-hidden" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="mission-icon mx-auto" style="width: 80px; height: 80px; background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                            <h3 class="h4 text-center mb-3 fw-bold" style="color: #fd7e14;">Our Values</h3>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fas fa-check-circle me-3" style="color: #fd7e14;"></i>
                                    <span><strong>Student-first approach</strong> - Your success is our priority</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fas fa-check-circle me-3" style="color: #fd7e14;"></i>
                                    <span><strong>Academic excellence</strong> - Committed to quality education</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fas fa-check-circle me-3" style="color: #fd7e14;"></i>
                                    <span><strong>Continuous innovation</strong> - Always improving our methods</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="fas fa-check-circle me-3" style="color: #fd7e14;"></i>
                                    <span><strong>Integrity & transparency</strong> - Honest guidance always</span>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Methodology -->
    <section class="py-5" aria-labelledby="methodology-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-cogs me-2"></i>Our Approach
                    </span>
                    <h2 id="methodology-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Our Proven Methodology</h2>
                    <p class="lead text-muted">The 4-step process that ensures exam success</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <article class="methodology-card card border-0 shadow-sm h-100 text-center overflow-hidden" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="step-number mb-4 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; font-weight: bold;">1</div>
                            <h3 class="h5 mb-3 fw-bold" style="color: #1ab79c;">Diagnostic Assessment</h3>
                            <p class="text-muted mb-0">Identify your current preparation level and knowledge gaps through our comprehensive initial evaluation tests.</p>
                        </div>
                    </article>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <article class="methodology-card card border-0 shadow-sm h-100 text-center overflow-hidden" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="step-number mb-4 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; font-weight: bold;">2</div>
                            <h3 class="h5 mb-3 fw-bold" style="color: #6f42c1;">Targeted Practice</h3>
                            <p class="text-muted mb-0">Focus on weak areas with customized test series while reinforcing strengths through timed practice sessions.</p>
                        </div>
                    </article>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <article class="methodology-card card border-0 shadow-sm h-100 text-center overflow-hidden" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="step-number mb-4 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; font-weight: bold;">3</div>
                            <h3 class="h5 mb-3 fw-bold" style="color: #fd7e14;">Expert Evaluation</h3>
                            <p class="text-muted mb-0">Receive detailed feedback on content accuracy, presentation skills, and application abilities from experts.</p>
                        </div>
                    </article>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <article class="methodology-card card border-0 shadow-sm h-100 text-center overflow-hidden" style="transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="step-number mb-4 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #20c997 0%, #16a085 100%); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; font-weight: bold;">4</div>
                            <h3 class="h5 mb-3 fw-bold" style="color: #20c997;">Performance Optimization</h3>
                            <p class="text-muted mb-0">Implement improvement strategies based on detailed analytics to maximize your final exam score.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Metrics -->
    <section class="py-5" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 50%, #0d6b5a 100%);" aria-labelledby="impact-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge bg-white mb-3 px-3 py-2 fs-6 fw-semibold" style="color: #1ab79c;">
                        <i class="fas fa-chart-bar me-2"></i>Our Impact
                    </span>
                    <h2 id="impact-heading" class="display-4 fw-bold mb-3 text-white">Numbers That Speak</h2>
                    <p class="lead text-white opacity-75">Transforming CS exam preparation across India</p>
                </div>
            </div>
            
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="impact-card p-4 rounded-4 bg-white bg-opacity-10">
                        <div class="display-3 fw-bold mb-2 text-white">
                            <span class="counter" data-target="15000">0</span>+
                        </div>
                        <p class="mb-0 text-white fw-semibold">Students Empowered</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="impact-card p-4 rounded-4 bg-white bg-opacity-10">
                        <div class="display-3 fw-bold mb-2 text-white">
                            <span class="counter" data-target="78">0</span>%
                        </div>
                        <p class="mb-0 text-white fw-semibold">Success Rate</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="impact-card p-4 rounded-4 bg-white bg-opacity-10">
                        <div class="display-3 fw-bold mb-2 text-white">
                            <span class="counter" data-target="22">0</span>%
                        </div>
                        <p class="mb-0 text-white fw-semibold">Avg Score Improvement</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="impact-card p-4 rounded-4 bg-white bg-opacity-10">
                        <div class="display-3 fw-bold mb-2 text-white">4.9</div>
                        <p class="mb-0 text-white fw-semibold">Student Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Students Trust Us -->
    <section class="py-5" aria-labelledby="trust-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-handshake me-2"></i>Trust & Credibility
                    </span>
                    <h2 id="trust-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Why Students Trust Us</h2>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="trust-reason text-center p-4 rounded-4 h-100" style="background-color: rgba(26, 183, 156, 0.05);">
                        <div class="mb-3">
                            <i class="fas fa-certificate fa-3x" style="color: #1ab79c;"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-2" style="color: #1ab79c;">ICSI Pattern Based</h4>
                        <p class="text-muted mb-0 small">All tests follow exact ICSI examination patterns and marking schemes</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="trust-reason text-center p-4 rounded-4 h-100" style="background-color: rgba(111, 66, 193, 0.05);">
                        <div class="mb-3">
                            <i class="fas fa-user-graduate fa-3x" style="color: #6f42c1;"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-2" style="color: #6f42c1;">Expert Faculty</h4>
                        <p class="text-muted mb-0 small">Learn from experienced CS professionals with 5+ years of expertise</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="trust-reason text-center p-4 rounded-4 h-100" style="background-color: rgba(255, 193, 7, 0.05);">
                        <div class="mb-3">
                            <i class="fas fa-clock fa-3x text-warning"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-2" style="color: #ffc107;">24/7 Access</h4>
                        <p class="text-muted mb-0 small">Take tests anytime, anywhere at your convenience with flexible scheduling</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="trust-reason text-center p-4 rounded-4 h-100" style="background-color: rgba(220, 53, 69, 0.05);">
                        <div class="mb-3">
                            <i class="fas fa-chart-line fa-3x text-danger"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-2 text-danger">Detailed Analytics</h4>
                        <p class="text-muted mb-0 small">Comprehensive performance reports with chapter-wise analysis</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 position-relative overflow-hidden" aria-labelledby="cta-heading">
        <div style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 50%, #0d6b5a 100%); position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -1;"></div>
        <div class="container text-center text-white position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 id="cta-heading" class="display-4 fw-bold mb-4">Begin Your CS Success Journey</h2>
                    <p class="lead mb-5">Join thousands of successful CS aspirants who trusted MY CS MTP. Start your preparation today!</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="<?= base_url() ?>plans" class="btn btn-light btn-lg px-5 py-3 fw-bold shadow-lg" style="color: #1ab79c;">
                            <i class="fas fa-rocket me-2"></i>View Plans
                        </a>
                        <a href="<?= base_url() ?>contact" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Badges -->
    <section class="py-4 bg-white border-top" aria-label="Trust indicators">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-6 col-md-3 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-shield-alt fa-2x mb-2" style="color: #1ab79c;"></i>
                        <p class="mb-0 fw-semibold small">Secure Payments</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-certificate fa-2x mb-2" style="color: #1ab79c;"></i>
                        <p class="mb-0 fw-semibold small">Quality Assured</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3 mb-md-0">
                    <div class="trust-badge">
                        <i class="fas fa-headset fa-2x mb-2" style="color: #1ab79c;"></i>
                        <p class="mb-0 fw-semibold small">24/7 Support</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="trust-badge">
                        <i class="fas fa-award fa-2x mb-2" style="color: #1ab79c;"></i>
                        <p class="mb-0 fw-semibold small">Certified Experts</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    /* Hero Section Styles */
    .hero-section {
        position: relative;
    }
    
    .animate-fade-in {
        animation: fadeIn 1s ease-out;
    }
    
    .animate-fade-in-delay {
        animation: fadeIn 1s ease-out 0.3s both;
    }
    
    .animate-fade-in-delay-2 {
        animation: fadeIn 1s ease-out 0.6s both;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Floating Cards */
    .floating-card {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    /* Mission Cards */
    .mission-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .mission-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }
    
    .mission-card:hover .mission-icon {
        transform: scale(1.1) rotate(5deg);
    }
    
    .mission-icon {
        transition: all 0.3s ease;
    }
    
    /* Methodology Cards */
    .methodology-card {
        transition: all 0.3s ease;
    }
    
    .methodology-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }
    
    .methodology-card:hover .step-number {
        transform: scale(1.1);
    }
    
    .step-number {
        transition: all 0.3s ease;
    }
    
    /* Impact Cards */
    .impact-card {
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    
    .impact-card:hover {
        transform: translateY(-5px);
        background-color: rgba(255,255,255,0.2) !important;
    }
    
    /* Trust Reasons */
    .trust-reason {
        transition: all 0.3s ease;
    }
    
    .trust-reason:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    /* Timeline Styles */
    .timeline {
        position: relative;
    }
    
    .timeline-item {
        position: relative;
    }
    
    /* Trust Badge */
    .trust-badge {
        transition: all 0.3s ease;
    }
    
    .trust-badge:hover {
        transform: translateY(-3px);
    }
    
    /* Counter Animation */
    .counter {
        font-variant-numeric: tabular-nums;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .display-3 {
            font-size: 2.5rem;
        }
        
        .display-4 {
            font-size: 2rem;
        }
        
        .hero-section {
            min-height: auto;
            padding: 3rem 0;
        }
        
        .floating-card {
            display: none;
        }
    }
    
    /* Smooth Scroll */
    html {
        scroll-behavior: smooth;
    }
    
    /* Focus Styles for Accessibility */
    a:focus-visible,
    button:focus-visible {
        outline: 3px solid #1ab79c;
        outline-offset: 2px;
    }
</style>

<script>
    // Counter Animation
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.counter');
        const speed = 200;
        
        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-target'));
            const count = parseInt(counter.innerText);
            const increment = target / speed;
            
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(() => animateCounter(counter), 10);
            } else {
                counter.innerText = target.toLocaleString();
            }
        };
        
        // Intersection Observer for counters
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    animateCounter(counter);
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => observer.observe(counter));
    });
    
    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

<?= $this->endSection() ?>

<?= $this->section('jsContent') ?>
<!-- No additional JS required -->
<?= $this->endSection() ?>
