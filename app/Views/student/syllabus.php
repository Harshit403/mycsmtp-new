<?= $this->extend("layout/student_layout") ?>

<?= $this->section("title") ?>
    CS Syllabus 2025 | ICSI CSEET, Executive & Professional Complete Guide
<?= $this->endSection() ?>

<?= $this->section('meta') ?>
    <!-- Primary Meta Tags -->
    <meta name="description" content="Complete ICSI syllabus for CS Course 2025. Detailed curriculum for CSEET (4 papers), CS Executive (7 papers), and CS Professional (9 papers + electives). New syllabus 2022 structure with subject-wise breakdown.">
    <meta name="keywords" content="CS syllabus 2025, ICSI syllabus, CSEET syllabus, CS Executive syllabus, CS Professional syllabus, Company Secretary course structure, ICSI new syllabus 2022, CS exam subjects, CS course modules">
    <meta name="author" content="MY CS MTP Test Series">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= base_url() ?>syllabus">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>syllabus">
    <meta property="og:title" content="CS Syllabus 2025 | Complete ICSI Course Guide CSEET to Professional">
    <meta property="og:description" content="Complete ICSI syllabus structure for Company Secretary course 2025. CSEET, Executive (7 papers) & Professional (9 papers) detailed curriculum.">
    <meta property="og:image" content="<?= base_url() ?>images/og-syllabus.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="MY CS MTP Test Series">
    <meta property="og:locale" content="en_IN">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= base_url() ?>syllabus">
    <meta property="twitter:title" content="CS Syllabus 2025 | ICSI CSEET, Executive & Professional">
    <meta property="twitter:description" content="Complete Company Secretary syllabus guide. CSEET (4 papers), Executive (7 papers), Professional (9 papers + electives). New ICSI syllabus 2022.">
    <meta property="twitter:image" content="<?= base_url() ?>images/og-syllabus.jpg">
    
    <!-- Structured Data - Educational Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "MY CS MTP Test Series",
        "description": "CS Test Series covering complete ICSI syllabus for CSEET, Executive & Professional levels",
        "url": "<?= base_url() ?>",
        "logo": "<?= base_url() ?>design_assets/images/favicon.png"
    }
    </script>
    
    <!-- Structured Data - Course -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Course",
        "name": "Company Secretary Course",
        "description": "Complete ICSI syllabus covering CSEET, Executive and Professional levels",
        "provider": {
            "@type": "EducationalOrganization",
            "name": "MY CS MTP Test Series"
        },
        "hasCourseInstance": [
            {
                "@type": "CourseInstance",
                "courseMode": "online",
                "courseWorkload": "PT4H",
                "name": "CSEET",
                "description": "CS Executive Entrance Test - 4 papers"
            },
            {
                "@type": "CourseInstance",
                "courseMode": "online",
                "courseWorkload": "PT6H",
                "name": "CS Executive",
                "description": "CS Executive Programme - 7 papers"
            },
            {
                "@type": "CourseInstance",
                "courseMode": "online",
                "courseWorkload": "PT8H",
                "name": "CS Professional",
                "description": "CS Professional Programme - 9 papers + electives"
            }
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
                "name": "Syllabus",
                "item": "<?= base_url() ?>syllabus"
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
                    <span itemprop="name">Syllabus</span>
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
                            <i class="fas fa-book-open me-2"></i>ICSI Syllabus 2025
                        </span>
                        <h1 id="hero-heading" class="display-4 fw-bold mb-3 animate-fade-in">
                            Complete CS Course <span class="text-warning">Syllabus Guide</span>
                        </h1>
                        <p class="lead mb-4 fs-5 animate-fade-in-delay">
                            Comprehensive curriculum structure for CSEET (4 papers), CS Executive (7 papers), and CS Professional (9 papers + electives). Updated as per ICSI New Syllabus 2022.
                        </p>
                        <div class="d-flex flex-wrap gap-3 animate-fade-in-delay-2">
                            <a href="#cseet" class="btn btn-light btn-lg px-4 py-3 fw-bold shadow-lg" style="color: #1ab79c;">
                                <i class="fas fa-graduation-cap me-2"></i>CSEET
                            </a>
                            <a href="#executive" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold">
                                <i class="fas fa-briefcase me-2"></i>Executive
                            </a>
                            <a href="#professional" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold">
                                <i class="fas fa-user-tie me-2"></i>Professional
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="text-center">
                            <div class="syllabus-icon bg-white rounded-4 p-4 shadow-lg d-inline-block animate-float">
                                <i class="fas fa-book-reader fa-5x" style="color: #1ab79c;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats Section -->
    <section class="py-4 bg-white border-bottom">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="stat-card p-3 rounded-4" style="background: linear-gradient(135deg, rgba(26, 183, 156, 0.1) 0%, rgba(26, 183, 156, 0.05) 100%);">
                        <h3 class="display-5 fw-bold mb-1" style="color: #1ab79c;">4</h3>
                        <p class="text-muted mb-0 fw-semibold small">CSEET Papers</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card p-3 rounded-4" style="background: linear-gradient(135deg, rgba(111, 66, 193, 0.1) 0%, rgba(111, 66, 193, 0.05) 100%);">
                        <h3 class="display-5 fw-bold mb-1" style="color: #6f42c1;">7</h3>
                        <p class="text-muted mb-0 fw-semibold small">Executive Papers</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card p-3 rounded-4" style="background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, rgba(255, 193, 7, 0.05) 100%);">
                        <h3 class="display-5 fw-bold mb-1 text-warning">9+</h3>
                        <p class="text-muted mb-0 fw-semibold small">Professional Papers</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card p-3 rounded-4" style="background: linear-gradient(135deg, rgba(220, 53, 69, 0.1) 0%, rgba(220, 53, 69, 0.05) 100%);">
                        <h3 class="display-5 fw-bold mb-1 text-danger">3</h3>
                        <p class="text-muted mb-0 fw-semibold small">Course Levels</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CSEET Syllabus Section -->
    <section id="cseet" class="py-5" style="background-color: #f8f9fa;" aria-labelledby="cseet-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-door-open me-2"></i>Entrance Level
                    </span>
                    <h2 id="cseet-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">CSEET Syllabus</h2>
                    <p class="lead text-muted">CS Executive Entrance Test - Your gateway to the Company Secretary profession</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Paper 1 -->
                <div class="col-md-6">
                    <article class="syllabus-card card border-0 shadow-lg h-100 overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-header p-4 text-white" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%);">
                            <div class="d-flex align-items-center">
                                <div class="paper-number bg-white text-dark rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; font-weight: bold;">1</div>
                                <div>
                                    <h3 class="h5 mb-0 fw-bold">Business Communication</h3>
                                    <small>100 Marks | 120 Minutes</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #1ab79c;"></i>Essentials of Good English</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #1ab79c;"></i>Communication Skills - Written & Oral</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #1ab79c;"></i>Business Correspondence</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #1ab79c;"></i>Interpersonal Skills</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #1ab79c;"></i>Listening Skills</li>
                                <li class="mb-0"><i class="fas fa-check-circle me-2" style="color: #1ab79c;"></i>Modern Forms of Communication</li>
                            </ul>
                        </div>
                    </article>
                </div>

                <!-- Paper 2 -->
                <div class="col-md-6">
                    <article class="syllabus-card card border-0 shadow-lg h-100 overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-header p-4 text-white" style="background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);">
                            <div class="d-flex align-items-center">
                                <div class="paper-number bg-white text-dark rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; font-weight: bold;">2</div>
                                <div>
                                    <h3 class="h5 mb-0 fw-bold">Legal Aptitude & Logical Reasoning</h3>
                                    <small>100 Marks | 120 Minutes</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #6f42c1;"></i>Indian Constitution</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #6f42c1;"></i>Elements of Company Law</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #6f42c1;"></i>Legal Awareness</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #6f42c1;"></i>Logical Reasoning (Verbal & Non-verbal)</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #6f42c1;"></i>Analytical Reasoning</li>
                                <li class="mb-0"><i class="fas fa-check-circle me-2" style="color: #6f42c1;"></i>Data Sufficiency & Interpretation</li>
                            </ul>
                        </div>
                    </article>
                </div>

                <!-- Paper 3 -->
                <div class="col-md-6">
                    <article class="syllabus-card card border-0 shadow-lg h-100 overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-header p-4 text-white" style="background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%);">
                            <div class="d-flex align-items-center">
                                <div class="paper-number bg-white text-dark rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; font-weight: bold;">3</div>
                                <div>
                                    <h3 class="h5 mb-0 fw-bold">Economic & Business Environment</h3>
                                    <small>100 Marks | 120 Minutes</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #fd7e14;"></i>Basics of Demand & Supply</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #fd7e14;"></i>Forms of Business Organizations</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #fd7e14;"></i>Indian Financial System</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #fd7e14;"></i>Indian Economy & Business Environment</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #fd7e14;"></i>Government Policies & Initiatives</li>
                                <li class="mb-0"><i class="fas fa-check-circle me-2" style="color: #fd7e14;"></i>Economic Reforms & Liberalization</li>
                            </ul>
                        </div>
                    </article>
                </div>

                <!-- Paper 4 -->
                <div class="col-md-6">
                    <article class="syllabus-card card border-0 shadow-lg h-100 overflow-hidden" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-header p-4 text-white" style="background: linear-gradient(135deg, #20c997 0%, #16a085 100%);">
                            <div class="d-flex align-items-center">
                                <div class="paper-number bg-white text-dark rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; font-weight: bold;">4</div>
                                <div>
                                    <h3 class="h5 mb-0 fw-bold">Current Affairs & Communication Skills</h3>
                                    <small>Viva Voce | 30 Minutes</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #20c997;"></i>National & International Current Affairs</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #20c997;"></i>Government Schemes & Policies</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #20c997;"></i>Corporate & Business News</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #20c997;"></i>Presentation Skills Assessment</li>
                                <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #20c997;"></i>Communication Ability Test</li>
                                <li class="mb-0"><i class="fas fa-check-circle me-2" style="color: #20c997;"></i>Verbal & Non-verbal Communication</li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>

            <div class="mt-5 text-center">
                <div class="alert alert-info d-inline-block" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Exam Pattern:</strong> Computer Based Test (CBT) | MCQ Format | No Negative Marking
                </div>
            </div>
        </div>
    </section>

    <!-- CS Executive Syllabus Section -->
    <section id="executive" class="py-5" aria-labelledby="executive-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(111, 66, 193, 0.1); color: #6f42c1;">
                        <i class="fas fa-briefcase me-2"></i>Second Level
                    </span>
                    <h2 id="executive-heading" class="display-4 fw-bold mb-3" style="color: #6f42c1;">CS Executive Syllabus</h2>
                    <p class="lead text-muted">Executive Programme - 7 Papers divided into 3 Modules (New Syllabus 2022)</p>
                </div>
            </div>

            <!-- Module 1 -->
            <div class="mb-5">
                <h3 class="h4 fw-bold mb-4 text-center" style="color: #1ab79c;">
                    <i class="fas fa-layer-group me-2"></i>Module I (3 Papers)
                </h3>
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 1: Jurisprudence, Interpretation & General Laws</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Sources of Law & Constitution</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Interpretation of Statutes</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Administrative & General Laws</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Arbitration & Conciliation</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Other Commercial Laws</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 2: Company Law & Practice</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Company Formation & Documents</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Share Capital & Debentures</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Members & Shareholders</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Directors & KMP</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Meetings & Compliances</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 3: Setting up of Business & Closure</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Types of Business Organizations</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Formation Procedures</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Registrations & Licenses</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Business Agreements</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Winding up & Closure</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Module 2 -->
            <div class="mb-5">
                <h3 class="h4 fw-bold mb-4 text-center" style="color: #20c997;">
                    <i class="fas fa-layer-group me-2"></i>Module II (3 Papers)
                </h3>
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #20c997 0%, #16a085 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 4: Corporate & Management Accounting</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Financial Accounting</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Corporate Accounting</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Management Accounting</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Cost Accounting</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Financial Analysis</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 5: Securities Laws & Capital Markets</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>SEBI Act & Regulations</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Securities Contracts Act</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Depositories Act</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Listing Agreements</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Insider Trading Regulations</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 6: Economic, Business & Commercial Laws</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>Competition Act</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>FEMA & FDI Regulations</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>IBC & Insolvency</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>Labour Laws</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>Other Economic Laws</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Module 3 -->
            <div>
                <h3 class="h4 fw-bold mb-4 text-center" style="color: #ffc107;">
                    <i class="fas fa-layer-group me-2"></i>Module III (1 Paper)
                </h3>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <article class="syllabus-card card border-0 shadow-lg" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 7: Financial & Strategic Management</h4>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="h6 fw-bold mb-2" style="color: #ffc107;">Financial Management</h5>
                                        <ul class="list-unstyled mb-0 small">
                                            <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Cost of Capital</li>
                                            <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Capital Structure</li>
                                            <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Investment Decisions</li>
                                            <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Dividend Policy</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="h6 fw-bold mb-2" style="color: #ffc107;">Strategic Management</h5>
                                        <ul class="list-unstyled mb-0 small">
                                            <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Business Policy</li>
                                            <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Strategic Analysis</li>
                                            <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Formulation & Implementation</li>
                                            <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Evaluation & Control</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CS Professional Syllabus Section -->
    <section id="professional" class="py-5" style="background-color: #f8f9fa;" aria-labelledby="professional-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(255, 193, 7, 0.1); color: #ffc107;">
                        <i class="fas fa-user-tie me-2"></i>Final Level
                    </span>
                    <h2 id="professional-heading" class="display-4 fw-bold mb-3" style="color: #ffc107;">CS Professional Syllabus</h2>
                    <p class="lead text-muted">Professional Programme - 9 Papers + 1 Elective (New Syllabus 2022)</p>
                </div>
            </div>

            <!-- Module 1 -->
            <div class="mb-5">
                <h3 class="h4 fw-bold mb-4 text-center" style="color: #1ab79c;">
                    <i class="fas fa-layer-group me-2"></i>Module I (3 Papers)
                </h3>
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 1: Governance, Risk Management & Ethics</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Corporate Governance Principles</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Board Structure & Processes</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Risk Management Framework</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Internal Controls</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Business Ethics</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #1ab79c;"></i>Sustainability & CSR</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 2: Advanced Tax Laws & Practice</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Direct Tax Laws</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>International Taxation</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Transfer Pricing</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>GST & Indirect Taxes</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Tax Planning & Compliance</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #6f42c1;"></i>Tax Audit & Assessments</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 3: Drafting, Pleadings & Appearances</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Company Drafting</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Legal Drafting</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Pleadings & Conveyancing</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Appearing before Authorities</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>RTI & Appeals</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #fd7e14;"></i>Tribunal Practice</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Module 2 -->
            <div class="mb-5">
                <h3 class="h4 fw-bold mb-4 text-center" style="color: #20c997;">
                    <i class="fas fa-layer-group me-2"></i>Module II (3 Papers)
                </h3>
                <div class="row g-4">
                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #20c997 0%, #16a085 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 4: Secretarial Audit & Due Diligence</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Secretarial Audit</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Internal Audit</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Due Diligence</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Compliance Management</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Stakeholders Relationship</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>IPO Compliance</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 5: Corporate Restructuring & Insolvency</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Mergers & Acquisitions</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Corporate Restructuring</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>IBC & Insolvency</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Liquidation & Winding-up</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Cross Border M&A</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #dc3545;"></i>Valuation</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 6: Resolution of Corporate Disputes</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>Alternative Dispute Resolution</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>Company Law Litigation</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>NCLT & NCLAT</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>SEBI & ROC Proceedings</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>Oppression & Mismanagement</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #0dcaf0;"></i>Class Action Suits</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Module 3 -->
            <div class="mb-5">
                <h3 class="h4 fw-bold mb-4 text-center" style="color: #ffc107;">
                    <i class="fas fa-layer-group me-2"></i>Module III (2 Papers)
                </h3>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-5">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 7: Corporate Funding & Listings</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Sources of Finance</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>IPO & Public Issues</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Listing Requirements</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Debt Financing</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Foreign Funding</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2" style="color: #ffc107;"></i>Banking & Financial Institutions</li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-5">
                        <article class="syllabus-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                            <div class="card-header p-3 text-white" style="background: linear-gradient(135deg, #6c757d 0%, #495057 100%);">
                                <h4 class="h6 mb-0 fw-bold">Paper 8: Multidisciplinary Case Studies</h4>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-1"><i class="fas fa-angle-right me-2 text-secondary"></i>Case Study Methodology</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2 text-secondary"></i>Company Law Cases</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2 text-secondary"></i>Securities Law Cases</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2 text-secondary"></i>Economic Laws Cases</li>
                                    <li class="mb-1"><i class="fas fa-angle-right me-2 text-secondary"></i>Ethical Dilemmas</li>
                                    <li class="mb-0"><i class="fas fa-angle-right me-2 text-secondary"></i>Strategic Decision Making</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Electives -->
            <div>
                <h3 class="h4 fw-bold mb-4 text-center" style="color: #6f42c1;">
                    <i class="fas fa-star me-2"></i>Elective Papers (Choose One)
                </h3>
                <div class="row g-3">
                    <div class="col-md-6 col-lg-4">
                        <div class="elective-card card border-0 shadow-sm h-100" style="border-radius: 10px; transition: all 0.3s ease;">
                            <div class="card-body p-3">
                                <h5 class="h6 fw-bold mb-2" style="color: #6f42c1;">Paper 9.1: IPR Laws & Practice</h5>
                                <p class="text-muted small mb-0">Patents, Trademarks, Copyrights, Designs & Geographical Indications</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="elective-card card border-0 shadow-sm h-100" style="border-radius: 10px; transition: all 0.3s ease;">
                            <div class="card-body p-3">
                                <h5 class="h6 fw-bold mb-2" style="color: #6f42c1;">Paper 9.2: Insurance Law & Practice</h5>
                                <p class="text-muted small mb-0">IRDAI Act, Insurance Contracts, Regulations & Compliances</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="elective-card card border-0 shadow-sm h-100" style="border-radius: 10px; transition: all 0.3s ease;">
                            <div class="card-body p-3">
                                <h5 class="h6 fw-bold mb-2" style="color: #6f42c1;">Paper 9.3: Forensic Audit</h5>
                                <p class="text-muted small mb-0">Forensic Accounting, Fraud Detection, Investigation Techniques</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="elective-card card border-0 shadow-sm h-100" style="border-radius: 10px; transition: all 0.3s ease;">
                            <div class="card-body p-3">
                                <h5 class="h6 fw-bold mb-2" style="color: #6f42c1;">Paper 9.4: International Business</h5>
                                <p class="text-muted small mb-0">International Trade, FEMA, Cross-border Transactions, WTO</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="elective-card card border-0 shadow-sm h-100" style="border-radius: 10px; transition: all 0.3s ease;">
                            <div class="card-body p-3">
                                <h5 class="h6 fw-bold mb-2" style="color: #6f42c1;">Paper 9.5: Investment Banking</h5>
                                <p class="text-muted small mb-0">M&A Advisory, IPO Management, Financial Restructuring</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="elective-card card border-0 shadow-sm h-100" style="border-radius: 10px; transition: all 0.3s ease;">
                            <div class="card-body p-3">
                                <h5 class="h6 fw-bold mb-2" style="color: #6f42c1;">Paper 9.6: Labour Laws & Practice</h5>
                                <p class="text-muted small mb-0">Industrial Relations, Wages, Social Security, New Labour Codes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mx-auto">
                        <div class="elective-card card border-0 shadow-sm h-100" style="border-radius: 10px; transition: all 0.3s ease;">
                            <div class="card-body p-3">
                                <h5 class="h6 fw-bold mb-2" style="color: #6f42c1;">Paper 9.7: Real Estate Laws & Practice</h5>
                                <p class="text-muted small mb-0">RERA, Transfer of Property, Land Laws, REITs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Path Section -->
    <section class="py-5" aria-labelledby="path-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-road me-2"></i>Your Journey
                    </span>
                    <h2 id="path-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">CS Course Structure</h2>
                    <p class="lead text-muted">Complete path from CSEET to CS Professional</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <article class="path-card card border-0 shadow-lg text-center h-100 p-4" style="border-radius: 15px; transition: all 0.3s ease; border-top: 4px solid #1ab79c;">
                        <div class="path-icon mx-auto mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <span class="text-white fw-bold fs-4">1</span>
                        </div>
                        <h3 class="h5 fw-bold mb-2" style="color: #1ab79c;">CSEET</h3>
                        <p class="text-muted small mb-3">Entrance Test</p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #1ab79c;"></i>4 Papers</li>
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #1ab79c;"></i>MCQ Format</li>
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #1ab79c;"></i>Online Exam</li>
                            <li class="mb-0"><i class="fas fa-check me-2" style="color: #1ab79c;"></i>Held 4 times/year</li>
                        </ul>
                    </article>
                </div>

                <div class="col-md-4">
                    <article class="path-card card border-0 shadow-lg text-center h-100 p-4" style="border-radius: 15px; transition: all 0.3s ease; border-top: 4px solid #6f42c1;">
                        <div class="path-icon mx-auto mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <span class="text-white fw-bold fs-4">2</span>
                        </div>
                        <h3 class="h5 fw-bold mb-2" style="color: #6f42c1;">CS Executive</h3>
                        <p class="text-muted small mb-3">Intermediate Level</p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #6f42c1;"></i>7 Papers</li>
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #6f42c1;"></i>3 Modules</li>
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #6f42c1;"></i>Descriptive + MCQ</li>
                            <li class="mb-0"><i class="fas fa-check me-2" style="color: #6f42c1;"></i>Held 2 times/year</li>
                        </ul>
                    </article>
                </div>

                <div class="col-md-4">
                    <article class="path-card card border-0 shadow-lg text-center h-100 p-4" style="border-radius: 15px; transition: all 0.3s ease; border-top: 4px solid #ffc107;">
                        <div class="path-icon mx-auto mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <span class="text-white fw-bold fs-4">3</span>
                        </div>
                        <h3 class="h5 fw-bold mb-2" style="color: #ffc107;">CS Professional</h3>
                        <p class="text-muted small mb-3">Final Level</p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #ffc107;"></i>9 + 1 Papers</li>
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #ffc107;"></i>3 Modules</li>
                            <li class="mb-1"><i class="fas fa-check me-2" style="color: #ffc107;"></i>Descriptive Format</li>
                            <li class="mb-0"><i class="fas fa-check me-2" style="color: #ffc107;"></i>Held 2 times/year</li>
                        </ul>
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
                    <h2 id="cta-heading" class="display-4 fw-bold mb-4">Start Your CS Preparation</h2>
                    <p class="lead mb-5">Access comprehensive test series covering the complete ICSI syllabus. Practice with ICSI pattern tests and get expert evaluation.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="<?= base_url() ?>plans" class="btn btn-light btn-lg px-5 py-3 fw-bold shadow-lg" style="color: #1ab79c; border-radius: 50px;">
                            <i class="fas fa-rocket me-2"></i>View Test Series
                        </a>
                        <a href="https://wa.me/+919540097210" target="_blank" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold" style="border-radius: 50px;">
                            <i class="fab fa-whatsapp me-2"></i>Get Guidance
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    /* Animations */
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
    
    .animate-float {
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
    
    /* Stat Cards */
    .stat-card {
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    /* Syllabus Cards */
    .syllabus-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .syllabus-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    }
    
    /* Elective Cards */
    .elective-card {
        transition: all 0.3s ease;
    }
    
    .elective-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    /* Path Cards */
    .path-card {
        transition: all 0.3s ease;
    }
    
    .path-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    }
    
    .path-card:hover .path-icon {
        transform: scale(1.1);
    }
    
    .path-icon {
        transition: all 0.3s ease;
    }
    
    /* Paper Number */
    .paper-number {
        font-size: 1.2rem;
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
        
        .syllabus-card {
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

<?= $this->section('jsContent') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>
