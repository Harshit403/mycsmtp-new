<?= $this->extend("layout/student_layout") ?>

<?= $this->section("title") ?>
    Student Testimonials & Success Stories | MY CS MTP Test Series Reviews
<?= $this->endSection() ?>

<?= $this->section("meta") ?>
    <!-- Primary Meta Tags -->
    <meta name="description" content="Read real student testimonials and success stories from MY CS MTP. See how 10,000+ CS aspirants cleared their CSEET, Executive & Professional exams with our test series. View WhatsApp reviews and feedback.">
    <meta name="keywords" content="MY CS MTP testimonials, CS test series reviews, student success stories, CS exam testimonials, MY CS MTP feedback, CS student reviews, Company Secretary testimonials, CS test series results">
    <meta name="author" content="MY CS MTP Test Series">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?= base_url() ?>testimonial">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>testimonial">
    <meta property="og:title" content="Student Testimonials | MY CS MTP Success Stories">
    <meta property="og:description" content="See real testimonials from CS students who cleared their exams with MY CS MTP test series. 10,000+ success stories and counting!">
    <meta property="og:image" content="<?= base_url() ?>images/og-testimonials.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="MY CS MTP Test Series">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= base_url() ?>testimonial">
    <meta property="twitter:title" content="MY CS MTP Student Testimonials & Reviews">
    <meta property="twitter:description" content="Real success stories from CS aspirants who cleared their exams with MY CS MTP test series. View student feedback and WhatsApp reviews.">
    <meta property="twitter:image" content="<?= base_url() ?>images/og-testimonials.jpg">

    <!-- Structured Data - Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "MY CS MTP Test Series",
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "10000",
            "bestRating": "5",
            "worstRating": "1"
        }
    }
    </script>

    <!-- Structured Data - Testimonial/Review Page -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Student Testimonials",
        "description": "Real student testimonials and success stories from MY CS MTP test series",
        "url": "<?= base_url() ?>testimonial"
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
                "name": "Testimonials",
                "item": "<?= base_url() ?>testimonial"
            }
        ]
    }
    </script>
<?= $this->endSection() ?>

<?= $this->section("content") ?>

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
                    <span itemprop="name">Testimonials</span>
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden" aria-labelledby="hero-heading">
        <div class="py-5" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 50%, #0d6b5a 100%);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 text-white text-center text-lg-start py-4">
                        <span class="badge bg-white mb-3 px-3 py-2 fs-6 fw-semibold" style="color: #1ab79c;">
                            <i class="fas fa-star me-2"></i>4.9/5 Student Rating
                        </span>
                        <h1 id="hero-heading" class="display-4 fw-bold mb-3 animate-fade-in">
                            CS Test Series <span class="text-warning">Success Stories</span>
                        </h1>
                        <p class="lead mb-4 fs-5 animate-fade-in-delay">
                            Hear from <span class="counter fw-bold" data-target="10000">0</span>+ students who transformed their CS exam preparation and achieved their dreams with MY CS MTP.
                        </p>
                        <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 animate-fade-in-delay-2">
                            <a href="#testimonials" class="btn btn-light btn-lg px-4 py-3 fw-bold shadow-lg" style="color: #1ab79c;">
                                <i class="fas fa-comments me-2"></i>Read Reviews
                            </a>
                            <a href="<?= base_url() ?>plans" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold">
                                <i class="fas fa-rocket me-2"></i>Start Your Journey
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="text-center">
                            <div class="stats-badge bg-white rounded-4 p-4 shadow-lg d-inline-block">
                                <div class="text-warning mb-2" style="font-size: 2rem;">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h3 class="display-4 fw-bold mb-0" style="color: #1ab79c;">4.9/5</h3>
                                <p class="text-muted mb-0">Based on Students Rating</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-4 bg-white border-bottom">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <h3 class="display-5 fw-bold mb-1" style="color: #1ab79c;">
                            <span class="counter" data-target="10000">0</span>+
                        </h3>
                        <p class="text-muted mb-0 fw-semibold">Happy Students</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <h3 class="display-5 fw-bold mb-1 text-warning">
                            <span class="counter" data-target="">92</span>%
                        </h3>
                        <p class="text-muted mb-0 fw-semibold">Success Rate</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <h3 class="display-5 fw-bold mb-1" style="color: #6f42c1;">
                            <span class="counter" data-target="22">0</span>%
                        </h3>
                        <p class="text-muted mb-0 fw-semibold">Avg Score Boost</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <h3 class="display-5 fw-bold mb-1 text-danger">
                            <span class="counter" data-target="10000">0</span>+
                        </h3>
                        <p class="text-muted mb-0 fw-semibold">Tests Evaluated</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Grid Section -->
    <section id="testimonials" class="py-5" style="background-color: #f8f9fa;" aria-labelledby="testimonials-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(37, 211, 102, 0.1); color: #25d366;">
                        <i class="fab fa-whatsapp me-2"></i>Real Student Feedback
                    </span>
                    <h2 id="testimonials-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Student Success Stories</h2>
                    <p class="lead text-muted">Authentic testimonials from CS aspirants who achieved their goals with MY CS MTP</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Testimonial 1 -->
                <div class="col-md-6 col-lg-4">
                    <article class="testimonial-card card border-0 shadow-lg overflow-hidden h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="testimonial-image-wrapper p-3" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);">
                            <img src="<?= base_url() ?>images/IMG-20250620-WA0001.jpg" alt="CS Student Testimonial - Cleared CS Executive Exam" class="img-fluid rounded-3" loading="lazy" style="box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        </div>
                        <div class="card-body p-4">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-muted mb-3 small">"The test series was exactly like the actual CS exam. I cleared my Executive level on the first attempt!"</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%);">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fw-bold">CS Executive Student</h5>
                                    <small class="text-muted">Cleared June 2024</small>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-md-6 col-lg-4">
                    <article class="testimonial-card card border-0 shadow-lg overflow-hidden h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="testimonial-image-wrapper p-3" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);">
                            <img src="<?= base_url() ?>images/IMG-20250620-WA0002.jpg" alt="CS Aspirant Success Story with MY CS MTP" class="img-fluid rounded-3" loading="lazy" style="box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        </div>
                        <div class="card-body p-4">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-muted mb-3 small">"Best investment for CS preparation! The detailed evaluation helped me improve my score by 25 marks."</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fw-bold">CS Professional Student</h5>
                                    <small class="text-muted">Rank Holder</small>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Testimonial 3 -->
                <div class="col-md-6 col-lg-4">
                    <article class="testimonial-card card border-0 shadow-lg overflow-hidden h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="testimonial-image-wrapper p-3" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);">
                            <img src="<?= base_url() ?>images/IMG-20250620-WA0003.jpg" alt="CS Test Series Student Review" class="img-fluid rounded-3" loading="lazy" style="box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        </div>
                        <div class="card-body p-4">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-muted mb-3 small">"The ICSI pattern questions were spot on! I felt confident during the actual exam thanks to MY CS MTP."</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%);">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fw-bold">CSEET Aspirant</h5>
                                    <small class="text-muted">First Attempt Clear</small>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Testimonial 4 -->
                <div class="col-md-6 col-lg-4">
                    <article class="testimonial-card card border-0 shadow-lg overflow-hidden h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="testimonial-image-wrapper p-3" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);">
                            <img src="<?= base_url() ?>images/IMG-20250620-WA0004.jpg" alt="CS Exam Success Testimonial" class="img-fluid rounded-3" loading="lazy" style="box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        </div>
                        <div class="card-body p-4">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-muted mb-3 small">"Chapter-wise analysis helped me identify weak areas. The feedback from experts was invaluable!"</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(135deg, #20c997 0%, #16a085 100%);">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fw-bold">CS Executive Student</h5>
                                    <small class="text-muted">Score Improved 22%</small>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Testimonial 5 -->
                <div class="col-md-6 col-lg-4">
                    <article class="testimonial-card card border-0 shadow-lg overflow-hidden h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="testimonial-image-wrapper p-3" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);">
                            <img src="<?= base_url() ?>images/IMG-20250620-WA0005.jpg" alt="MY CS MTP Student Feedback" class="img-fluid rounded-3" loading="lazy" style="box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        </div>
                        <div class="card-body p-4">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-muted mb-3 small">"24/7 access to tests allowed me to prepare at my own pace. Perfect for working professionals!"</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fw-bold">Working Professional</h5>
                                    <small class="text-muted">CS Professional Cleared</small>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Testimonial 6 -->
                <div class="col-md-6 col-lg-4">
                    <article class="testimonial-card card border-0 shadow-lg overflow-hidden h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="testimonial-image-wrapper p-3" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);">
                            <img src="<?= base_url() ?>images/IMG-20250620-WA0006.jpg" alt="CS Test Series Review" class="img-fluid rounded-3" loading="lazy" style="box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        </div>
                        <div class="card-body p-4">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-muted mb-3 small">"Affordable pricing with premium quality. MY CS MTP is the best investment for CS aspirants!"</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%);">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0 fw-bold">CS Aspirant</h5>
                                    <small class="text-muted">All Levels Cleared</small>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-5" aria-labelledby="benefits-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-gem me-2"></i>Why Students Love Us
                    </span>
                    <h2 id="benefits-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Benefits of Our CS Test Series</h2>
                    <p class="lead text-muted">Discover why thousands of students choose MY CS MTP for their exam preparation</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <article class="benefit-card card border-0 shadow-sm h-100 p-4" style="border-top: 4px solid #1ab79c; border-radius: 15px; transition: all 0.3s ease;">
                        <div class="mb-3">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-clipboard-check text-white fs-4"></i>
                            </div>
                        </div>
                        <h3 class="h5 fw-bold mb-3" style="color: #1ab79c;">Exam-like Practice</h3>
                        <p class="text-muted mb-0">Our test series simulates the actual CS exam environment, helping you get comfortable with the format, timing, and pressure of the real test.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="benefit-card card border-0 shadow-sm h-100 p-4" style="border-top: 4px solid #6f42c1; border-radius: 15px; transition: all 0.3s ease;">
                        <div class="mb-3">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-chart-line text-white fs-4"></i>
                            </div>
                        </div>
                        <h3 class="h5 fw-bold mb-3" style="color: #6f42c1;">Detailed Performance Analysis</h3>
                        <p class="text-muted mb-0">Get comprehensive feedback on your strengths and weaknesses with our detailed performance reports and chapter-wise analytics.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="benefit-card card border-0 shadow-sm h-100 p-4" style="border-top: 4px solid #fd7e14; border-radius: 15px; transition: all 0.3s ease;">
                        <div class="mb-3">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-book text-white fs-4"></i>
                            </div>
                        </div>
                        <h3 class="h5 fw-bold mb-3" style="color: #fd7e14;">Expert-curated Questions</h3>
                        <p class="text-muted mb-0">Access high-quality questions prepared by CS experts and previous exam toppers, covering all important topics and recent exam patterns.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="benefit-card card border-0 shadow-sm h-100 p-4" style="border-top: 4px solid #20c997; border-radius: 15px; transition: all 0.3s ease;">
                        <div class="mb-3">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #20c997 0%, #16a085 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-clock text-white fs-4"></i>
                            </div>
                        </div>
                        <h3 class="h5 fw-bold mb-3" style="color: #20c997;">Time Management Skills</h3>
                        <p class="text-muted mb-0">Learn to effectively manage your exam time through regular practice with our timed tests and section-wise challenges.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="benefit-card card border-0 shadow-sm h-100 p-4" style="border-top: 4px solid #dc3545; border-radius: 15px; transition: all 0.3s ease;">
                        <div class="mb-3">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-comments text-white fs-4"></i>
                            </div>
                        </div>
                        <h3 class="h5 fw-bold mb-3 text-danger">Expert Evaluation</h3>
                        <p class="text-muted mb-0">Receive detailed feedback and suggestions from experienced evaluators who understand ICSI exam patterns thoroughly.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="benefit-card card border-0 shadow-sm h-100 p-4" style="border-top: 4px solid #0dcaf0; border-radius: 15px; transition: all 0.3s ease;">
                        <div class="mb-3">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-chart-bar text-white fs-4"></i>
                            </div>
                        </div>
                        <h3 class="h5 fw-bold mb-3" style="color: #0dcaf0;">Progress Tracking</h3>
                        <p class="text-muted mb-0">Monitor your improvement over time with our progress tracking tools and personalized recommendations for study focus areas.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5 position-relative overflow-hidden" aria-labelledby="cta-heading">
        <div style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 50%, #0d6b5a 100%); position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -1;"></div>
        <div class="container text-center text-white position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 id="cta-heading" class="display-4 fw-bold mb-4">Ready to Write Your Success Story?</h2>
                    <p class="lead mb-5">Join thousands of successful CS aspirants who transformed their preparation with MY CS MTP. Start your journey to exam success today!</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="<?= base_url() ?>plans" class="btn btn-light btn-lg px-5 py-3 fw-bold shadow-lg" style="color: #1ab79c; border-radius: 50px;">
                            <i class="fas fa-rocket me-2"></i>Explore Plans
                        </a>
                        <a href="https://wa.me/+919540097210" target="_blank" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold" style="border-radius: 50px;">
                            <i class="fab fa-whatsapp me-2"></i>Chat on WhatsApp
                        </a>
                    </div>
                    <div class="mt-4 pt-3 border-top border-white border-opacity-25">
                        <p class="mb-0 opacity-75">
                            <i class="fas fa-users me-2"></i>Join 10,000+ successful students
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    /* Hero Section Animations */
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

    /* Stats Badge */
    .stats-badge {
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

    /* Counter Animation */
    .counter {
        font-variant-numeric: tabular-nums;
    }

    /* Testimonial Cards */
    .testimonial-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    }

    .testimonial-image-wrapper {
        position: relative;
        overflow: hidden;
    }

    .testimonial-image-wrapper::before {
        content: '\f232';
        font-family: 'Font Awesome 6 Brands';
        position: absolute;
        top: 10px;
        right: 10px;
        color: white;
        font-size: 1.5rem;
        z-index: 1;
        background: rgba(37, 211, 102, 0.9);
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Benefit Cards */
    .benefit-card {
        transition: all 0.3s ease;
    }

    .benefit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    /* CTA Section */
    .cta-section .btn:hover {
        transform: translateY(-3px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }

        .stats-badge {
            margin-top: 2rem;
        }

        .testimonial-card {
            margin-bottom: 1rem;
        }
    }

    /* Smooth Scroll */
    html {
        scroll-behavior: smooth;
    }

    /* Focus Styles */
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

        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-target'));
            const count = parseInt(counter.innerText);
            const increment = target / 100;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(() => animateCounter(counter), 10);
            } else {
                counter.innerText = target.toLocaleString();
            }
        };

        // Intersection Observer for counters
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    animateCounter(counter);
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

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

<?= $this->section("jsContent") ?>
<script type="text/javascript">
    var pageType="student_testimonial"
</script>
<?= $this->endSection() ?>
