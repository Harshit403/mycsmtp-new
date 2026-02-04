<?= $this->extend("layout/student_layout") ?>

<?= $this->section("title") ?>
    Sample Answer Sheets | CS Test Series Evaluation Examples - MY CS MTP
<?= $this->endSection() ?>

<?= $this->section('meta') ?>
    <!-- Primary Meta Tags -->
    <meta name="description" content="View sample evaluated answer sheets from MY CS MTP. See how our expert evaluators provide detailed feedback, marks allocation, and improvement tips for CS Executive & Professional exams. ICSI pattern-based evaluation.">
    <meta name="keywords" content="sample answer sheet CS, CS test series evaluation, CS exam answer sheet format, ICSI answer sheet sample, CS Executive sample answers, CS Professional sample papers, evaluated answer sheets, CS exam marking scheme">
    <meta name="author" content="MY CS MTP Test Series">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= base_url() ?>sample-answersheet">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>sample-answersheet">
    <meta property="og:title" content="Sample Answer Sheets | CS Test Series Evaluation Examples">
    <meta property="og:description" content="See how MY CS MTP evaluates CS exam answer sheets with detailed feedback and marking. Sample evaluated papers for CSEET, Executive & Professional.">
    <meta property="og:image" content="<?= base_url() ?>images/og-sample-answersheet.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="MY CS MTP Test Series">
    <meta property="og:locale" content="en_IN">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= base_url() ?>sample-answersheet">
    <meta property="twitter:title" content="Sample CS Answer Sheets | MY CS MTP Evaluation">
    <meta property="twitter:description" content="View sample evaluated answer sheets with detailed feedback and marking scheme for CS exams.">
    <meta property="twitter:image" content="<?= base_url() ?>images/og-sample-answersheet.jpg">
    
    <!-- Structured Data - Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "MY CS MTP Test Series",
        "description": "CS Test Series with detailed evaluation and sample answer sheets",
        "url": "<?= base_url() ?>",
        "logo": "<?= base_url() ?>design_assets/images/favicon.png"
    }
    </script>
    
    <!-- Structured Data - LearningResource -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LearningResource",
        "name": "Sample CS Answer Sheets",
        "description": "Sample evaluated answer sheets showing marking scheme and feedback for CS exams",
        "educationalLevel": "Company Secretary",
        "learningResourceType": "Sample Papers",
        "provider": {
            "@type": "EducationalOrganization",
            "name": "MY CS MTP Test Series"
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
                "name": "Sample Answer Sheets",
                "item": "<?= base_url() ?>sample-answersheet"
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
                    <span itemprop="name">Sample Answer Sheets</span>
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="position-relative overflow-hidden" aria-labelledby="hero-heading">
        <div class="py-5" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 50%, #0d6b5a 100%);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 text-white py-4">
                        <span class="badge bg-white mb-3 px-3 py-2 fs-6 fw-semibold" style="color: #1ab79c;">
                            <i class="fas fa-file-alt me-2"></i>ICSI Pattern Evaluation
                        </span>
                        <h1 id="hero-heading" class="display-4 fw-bold mb-3 animate-fade-in">
                            Sample <span class="text-warning">Answer Sheets</span>
                        </h1>
                        <p class="lead mb-4 fs-5 animate-fade-in-delay">
                            See how our expert evaluators assess CS exam papers with detailed feedback, marks allocation, and personalized improvement tips aligned with ICSI marking scheme.
                        </p>
                        <div class="d-flex flex-wrap gap-3 animate-fade-in-delay-2">
                            <a href="#samples" class="btn btn-light btn-lg px-4 py-3 fw-bold shadow-lg" style="color: #1ab79c;">
                                <i class="fas fa-eye me-2"></i>View Samples
                            </a>
                            <a href="<?= base_url() ?>plans" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold">
                                <i class="fas fa-rocket me-2"></i>Get Started
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="text-center position-relative">
                            <div class="sample-preview bg-white rounded-4 p-3 shadow-lg d-inline-block" style="transform: rotate(-5deg);">
                                <div class="border-2 border-dashed border-secondary rounded-3 p-4 text-center" style="border-style: dashed;">
                                    <i class="fas fa-file-signature fa-4x mb-3" style="color: #1ab79c;"></i>
                                    <p class="mb-0 fw-bold text-dark">Evaluated Copy</p>
                                    <small class="text-muted">With Feedback</small>
                                </div>
                            </div>
                            <div class="sample-preview bg-white rounded-4 p-3 shadow-lg position-absolute" style="top: 30px; right: 0; transform: rotate(5deg); z-index: -1;">
                                <div class="border-2 border-dashed border-secondary rounded-3 p-3 text-center" style="border-style: dashed; width: 150px;">
                                    <i class="fas fa-check-circle fa-2x mb-2 text-success"></i>
                                    <p class="mb-0 small fw-bold text-dark">Marks: 78/100</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Evaluation Process Info -->
    <section class="py-5" aria-labelledby="evaluation-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-microscope me-2"></i>Our Evaluation Process
                    </span>
                    <h2 id="evaluation-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">How We Evaluate Your Answers</h2>
                    <p class="lead text-muted">Our 4-layer assessment methodology ensures comprehensive feedback for maximum improvement</p>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3">
                    <article class="process-card card border-0 shadow-sm h-100 text-center p-4" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="process-icon mb-3 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <span class="text-white fw-bold fs-3">1</span>
                        </div>
                        <h3 class="h5 fw-bold mb-2" style="color: #1ab79c;">Content Check</h3>
                        <p class="text-muted mb-0 small">Verification of legal provisions, case laws, and conceptual accuracy against ICSI standards</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="process-card card border-0 shadow-sm h-100 text-center p-4" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="process-icon mb-3 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <span class="text-white fw-bold fs-3">2</span>
                        </div>
                        <h3 class="h5 fw-bold mb-2" style="color: #6f42c1;">Presentation</h3>
                        <p class="text-muted mb-0 small">Evaluation of answer structure, formatting, and adherence to ICSI presentation guidelines</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="process-card card border-0 shadow-sm h-100 text-center p-4" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="process-icon mb-3 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <span class="text-white fw-bold fs-3">3</span>
                        </div>
                        <h3 class="h5 fw-bold mb-2" style="color: #fd7e14;">Application</h3>
                        <p class="text-muted mb-0 small">Assessment of practical application skills and problem-solving approach</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="process-card card border-0 shadow-sm h-100 text-center p-4" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="process-icon mb-3 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <span class="text-white fw-bold fs-3">4</span>
                        </div>
                        <h3 class="h5 fw-bold mb-2 text-danger">Feedback</h3>
                        <p class="text-muted mb-0 small">Detailed improvement tips and suggestions for better performance in exams</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- CS Levels Section -->
    <?php if (!empty($fetchAllLevelLists)): ?>
    <section class="py-5" style="background-color: #f8f9fa;" aria-labelledby="levels-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-graduation-cap me-2"></i>Choose Your Level
                    </span>
                    <h2 id="levels-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Select Your CS Level</h2>
                    <p class="lead text-muted">Access sample answer sheets and test series for your specific CS exam level</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <?php foreach ($fetchAllLevelLists as $value): ?>
                <div class="col-md-6 col-lg-4">
                    <article class="level-card card border-0 shadow-lg overflow-hidden h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-0">
                            <div class="level-header p-4 text-white text-center" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%);">
                                <i class="fas fa-file-alt fa-3x mb-3"></i>
                                <h3 class="h4 fw-bold mb-0">
                                    <?= !empty($value['level_name']) ? $value['level_name'] : '' ?>
                                </h3>
                            </div>
                            <div class="p-4">
                                <p class="text-muted mb-4">Access sample answer sheets, test series, and detailed evaluation for <?= !empty($value['level_name']) ? $value['level_name'] : 'this level' ?>.</p>
                                <a href="<?= base_url() . 'level/type/' . (!empty($value['level_id']) ? $value['level_id'] : '') ?>" class="btn btn-lg w-100 text-white fw-bold" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border-radius: 10px;">
                                    <i class="fas fa-arrow-right me-2"></i>View Samples
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Sample Answer Sheets Gallery -->
    <section id="samples" class="py-5" aria-labelledby="samples-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-images me-2"></i>Real Examples
                    </span>
                    <h2 id="samples-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Sample Evaluated Answer Sheets</h2>
                    <p class="lead text-muted">See actual evaluated copies with detailed marking and expert feedback</p>
                </div>
            </div>

            <!-- Sample Gallery Grid -->
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <article class="sample-card card border-0 shadow-lg overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="sample-image-wrapper position-relative" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 20px;">
                            <img src="<?= base_url() ?>images/copy1.jpg" alt="Sample Evaluated CS Answer Sheet showing detailed marking" class="img-fluid rounded-3 shadow" loading="lazy" style="border: 2px solid #dee2e6;">
                            <div class="sample-overlay position-absolute top-0 end-0 m-3">
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Evaluated
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="h6 fw-bold mb-2" style="color: #1ab79c;">Sample 1</h4>
                            <p class="text-muted small mb-3">View detailed marking scheme and expert feedback on this sample answer sheet</p>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Detailed Evaluation Included</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="sample-card card border-0 shadow-lg overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="sample-image-wrapper position-relative" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 20px;">
                            <img src="<?= base_url() ?>images/copy2.jpg" alt="Sample CS answer sheet with ICSI pattern marking" class="img-fluid rounded-3 shadow" loading="lazy" style="border: 2px solid #dee2e6;">
                            <div class="sample-overlay position-absolute top-0 end-0 m-3">
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Evaluated
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="h6 fw-bold mb-2" style="color: #6f42c1;">Sample 2</h4>
                            <p class="text-muted small mb-3">See how our experts evaluate answers with comprehensive feedback</p>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Detailed Evaluation Included</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="sample-card card border-0 shadow-lg overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="sample-image-wrapper position-relative" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 20px;">
                            <img src="<?= base_url() ?>images/copy3.jpg" alt="Evaluated CS answer sheet example" class="img-fluid rounded-3 shadow" loading="lazy" style="border: 2px solid #dee2e6;">
                            <div class="sample-overlay position-absolute top-0 end-0 m-3">
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Evaluated
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="h6 fw-bold mb-2" style="color: #fd7e14;">Sample 3</h4>
                            <p class="text-muted small mb-3">Example of detailed presentation and content analysis feedback</p>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Detailed Evaluation Included</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="sample-card card border-0 shadow-lg overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="sample-image-wrapper position-relative" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 20px;">
                            <img src="<?= base_url() ?>images/copy4.jpg" alt="CS test series answer sheet with marks allocation" class="img-fluid rounded-3 shadow" loading="lazy" style="border: 2px solid #dee2e6;">
                            <div class="sample-overlay position-absolute top-0 end-0 m-3">
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Evaluated
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="h6 fw-bold mb-2" style="color: #20c997;">Sample 4</h4>
                            <p class="text-muted small mb-3">Step-by-step marking and improvement recommendations example</p>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Detailed Evaluation Included</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="sample-card card border-0 shadow-lg overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="sample-image-wrapper position-relative" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 20px;">
                            <img src="<?= base_url() ?>images/copy5.jpg" alt="Comprehensive evaluation feedback example" class="img-fluid rounded-3 shadow" loading="lazy" style="border: 2px solid #dee2e6;">
                            <div class="sample-overlay position-absolute top-0 end-0 m-3">
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Evaluated
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="h6 fw-bold mb-2 text-danger">Sample 5</h4>
                            <p class="text-muted small mb-3">Comprehensive feedback with personalized improvement tips</p>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Detailed Evaluation Included</span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- CTA Card -->
                <div class="col-md-6 col-lg-4">
                    <article class="sample-card card border-0 shadow-lg overflow-hidden h-100" style="border-radius: 15px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%);">
                        <div class="card-body p-4 text-white text-center d-flex flex-column justify-content-center h-100">
                            <i class="fas fa-rocket fa-4x mb-4"></i>
                            <h4 class="h5 fw-bold mb-3">Get Your Answers Evaluated</h4>
                            <p class="mb-4">Join thousands of CS aspirants who improved their scores with our expert evaluation</p>
                            <a href="<?= base_url() ?>plans" class="btn btn-light btn-lg fw-bold" style="color: #1ab79c; border-radius: 10px;">
                                <i class="fas fa-arrow-right me-2"></i>Start Now
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-5" style="background-color: #f8f9fa;" aria-labelledby="benefits-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-gem me-2"></i>Why Detailed Evaluation Matters
                    </span>
                    <h2 id="benefits-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Benefits of Our Evaluation</h2>
                    <p class="lead text-muted">How detailed feedback helps you excel in CS exams</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <article class="benefit-card card border-0 shadow-sm h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-bullseye text-white fs-4"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="h6 fw-bold mb-2" style="color: #1ab79c;">Targeted Feedback</h4>
                                    <p class="text-muted mb-0 small">Receive specific feedback on your performance in each module, allowing you to focus on areas that need improvement rather than generic advice.</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="benefit-card card border-0 shadow-sm h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user-graduate text-white fs-4"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="h6 fw-bold mb-2" style="color: #6f42c1;">Individualized Learning</h4>
                                    <p class="text-muted mb-0 small">Personalized tips cater to your unique strengths and weaknesses, providing a tailored learning experience for more effective progress.</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="benefit-card card border-0 shadow-sm h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-lightbulb text-white fs-4"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="h6 fw-bold mb-2" style="color: #fd7e14;">Clarification of Concepts</h4>
                                    <p class="text-muted mb-0 small">Clear feedback helps you understand where you went wrong, facilitating deeper comprehension of concepts and preventing repeated mistakes.</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="benefit-card card border-0 shadow-sm h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #20c997 0%, #16a085 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-clock text-white fs-4"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="h6 fw-bold mb-2" style="color: #20c997;">Time Management Skills</h4>
                                    <p class="text-muted mb-0 small">Tips on time management during exams help you allocate time wisely, ensuring you complete all sections within the given timeframe.</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="benefit-card card border-0 shadow-sm h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-trophy text-white fs-4"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="h6 fw-bold mb-2 text-danger">Building Confidence</h4>
                                    <p class="text-muted mb-0 small">Regular personalized feedback instills confidence, making you feel more prepared and capable as you approach your main CS exams.</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="benefit-card card border-0 shadow-sm h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-sync-alt text-white fs-4"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="h6 fw-bold mb-2" style="color: #0dcaf0;">Adaptive Learning</h4>
                                    <p class="text-muted mb-0 small">Continuous assessment allows you to adapt your study strategies based on real-time performance data, optimizing your exam approach.</p>
                                </div>
                            </div>
                        </div>
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
                    <h2 id="cta-heading" class="display-4 fw-bold mb-4">Start Your Evaluation Journey</h2>
                    <p class="lead mb-5">Get your CS exam answer sheets evaluated by experts and receive detailed feedback to improve your scores. Join 10,000+ successful students today!</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="<?= base_url() ?>plans" class="btn btn-light btn-lg px-5 py-3 fw-bold shadow-lg" style="color: #1ab79c; border-radius: 50px;">
                            <i class="fas fa-rocket me-2"></i>View Test Series Plans
                        </a>
                        <a href="https://wa.me/+919540097210" target="_blank" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold" style="border-radius: 50px;">
                            <i class="fab fa-whatsapp me-2"></i>Chat on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    /* Hero Animations */
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
    
    /* Sample Preview Animation */
    .sample-preview {
        transition: all 0.3s ease;
        animation: float 3s ease-in-out infinite;
    }
    
    .sample-preview:nth-child(2) {
        animation-delay: 1.5s;
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(-5deg);
        }
        50% {
            transform: translateY(-10px) rotate(-5deg);
        }
    }
    
    /* Process Cards */
    .process-card {
        transition: all 0.3s ease;
    }
    
    .process-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    .process-card:hover .process-icon {
        transform: scale(1.1);
    }
    
    .process-icon {
        transition: all 0.3s ease;
    }
    
    /* Level Cards */
    .level-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .level-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    }
    
    /* Sample Cards */
    .sample-card {
        transition: all 0.3s ease;
    }
    
    .sample-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    }
    
    .sample-card:hover .sample-image-wrapper img {
        transform: scale(1.02);
    }
    
    .sample-image-wrapper img {
        transition: all 0.3s ease;
    }
    
    /* Benefit Cards */
    .benefit-card {
        transition: all 0.3s ease;
    }
    
    .benefit-card:hover {
        transform: translateX(5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
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
        
        .sample-preview {
            display: none;
        }
        
        .process-card,
        .sample-card,
        .benefit-card {
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

<?= $this->endSection() ?>

<?= $this->section("jsContent") ?>
<script>
    var baseUrl = "<?= base_url() ?>";
</script>
<script>
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
