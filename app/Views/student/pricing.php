<?= $this->extend("layout/student_layout") ?>
<?= $this->section("title") ?>
    CS Test Series Pricing Plans 2026 | Affordable ICSI Exam Preparation Packages
<?= $this->endSection() ?>
<?= $this->section("meta_description") ?>
    Get affordable CS Test Series for ICSI exams starting at ₹119. Chapterwise, Detailed & Full Syllabus plans with expert evaluation, All India Rankings & performance analytics.
<?= $this->endSection() ?>
<?= $this->section("meta_keywords") ?>
    CS Test Series pricing, CS Executive test series price, CS Professional mock test cost, ICSI exam preparation packages, CS test series plans
<?= $this->endSection() ?>
<?= $this->section("og_title") ?>
    CS Test Series Pricing Plans | Affordable ICSI Exam Preparation
<?= $this->endSection() ?>
<?= $this->section("og_description") ?>
    Choose from our flexible CS Test Series packages starting at ₹119. Expert evaluation, All India Rankings, and proven results.
<?= $this->endSection() ?>
<?= $this->section("content") ?>
    <!-- Hidden SEO Content for Search Crawlers -->
    <div itemprop="mainContentOfPage" style="position:absolute;left:-9999px;">
        <h1>CS Test Series</h1>
        <p>Best online CS Test Series for ICSI exams including CS Executive, CS Professional and CSEET. Expert evaluation, All India Rankings, and comprehensive mock tests starting from ₹119.</p>
        <h2>CS Executive Test Series</h2>
        <p>Complete CS Executive test series with chapterwise, detailed and full syllabus mock tests. Expert evaluation and All India Rankings.</p>
        <h2>CS Professional Test Series</h2>
        <p>Advanced CS Professional test series for final level examination preparation. Case studies, drafting practice and comprehensive evaluation.</p>
        <h2>CSEET Test Series</h2>
        <p>CS Executive Entrance Test (CSEET) mock tests for entry-level examination. MCQ practice and comprehensive syllabus coverage.</p>
    </div>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "CS Test Series Pricing",
        "description": "Affordable pricing plans for CS Test Series covering CS Executive, CS Professional, and CSEET examinations",
        "url": "https://mycsmpt.com/pricing"
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {"@type": "ListItem", "position": 1, "name": "Home", "item": "https://mycsmpt.com/"},
            {"@type": "ListItem", "position": 2, "name": "CS Test Series", "item": "https://mycsmpt.com/plans"},
            {"@type": "ListItem", "position": 3, "name": "Pricing", "item": "https://mycsmpt.com/pricing"}
        ]
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "Complete Guide to CS Test Series for ICSI Exam Success",
        "description": "Comprehensive guide about CS Test Series for ICSI exam preparation. Learn why mock tests are essential for CS exam success and how our test series helps candidates achieve their professional dreams.",
        "author": {
            "@type": "Organization",
            "name": "My CS MTP Test Series"
        },
        "publisher": {
            "@type": "Organization",
            "name": "My CS MTP Test Series",
            "logo": {
                "@type": "ImageObject",
                "url": "https://mycsmpt.com/logo.png"
            }
        },
        "datePublished": "2026-02-03",
        "dateModified": "2026-02-03",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "https://mycsmpt.com/pricing"
        }
    }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary: #0891b2;
            --primary-dark: #0e7490;
            --primary-light: #22d3ee;
            --accent: #f59e0b;
            --success: #10b981;
            --dark: #0f172a;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1);
            --shadow-md: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1);
            --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
            --shadow-xl: 0 25px 50px -12px rgba(0,0,0,0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gray-50);
            color: var(--gray-700);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--dark) 0%, var(--gray-800) 100%);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.5;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(8, 145, 178, 0.15) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            padding: 40px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(8, 145, 178, 0.2);
            border: 1px solid rgba(8, 145, 178, 0.3);
            padding: 8px 20px;
            border-radius: 50px;
            color: var(--primary-light);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero h1 span {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 18px;
            color: var(--gray-300);
            margin-bottom: 32px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            box-shadow: 0 4px 14px rgba(8, 145, 178, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(8, 145, 178, 0.5);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid var(--gray-600);
        }

        .btn-outline:hover {
            border-color: var(--primary-light);
            color: var(--primary-light);
        }

        /* Section Titles */
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-tag {
            display: inline-block;
            background: linear-gradient(135deg, rgba(8, 145, 178, 0.1) 0%, rgba(34, 211, 238, 0.1) 100%);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 40px;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 16px;
        }

        .section-subtitle {
            font-size: 18px;
            color: var(--gray-500);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Pricing Section */
        .pricing {
            padding: 100px 0;
            background: white;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
            align-items: start;
        }

        .pricing-card {
            background: white;
            border-radius: 24px;
            padding: 40px 32px;
            border: 1px solid var(--gray-200);
            position: relative;
            transition: all 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .pricing-card.featured {
            background: linear-gradient(180deg, var(--gray-900) 0%, var(--gray-800) 100%);
            border-color: var(--gray-700);
            transform: scale(1.05);
        }

        .pricing-card.featured:hover {
            transform: scale(1.05) translateY(-8px);
        }

        .best-value-badge {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            color: white;
            padding: 6px 20px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .popular-badge {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, var(--accent) 0%, #f97316 100%);
            color: white;
            padding: 6px 20px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .plan-header {
            text-align: center;
            margin-bottom: 32px;
            padding-bottom: 32px;
            border-bottom: 1px solid var(--gray-200);
        }

        .featured .plan-header {
            border-color: var(--gray-700);
        }

        .plan-name {
            font-size: 22px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 8px;
        }

        .featured .plan-name {
            color: white;
        }

        .plan-description {
            font-size: 14px;
            color: var(--gray-500);
            margin-bottom: 24px;
        }

        .featured .plan-description {
            color: var(--gray-400);
        }

        .plan-price {
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: 4px;
        }

        .currency {
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-600);
        }

        .featured .currency {
            color: var(--gray-400);
        }

        .price {
            font-size: 56px;
            font-weight: 800;
            color: var(--gray-900);
            line-height: 1;
        }

        .featured .price {
            color: white;
        }

        .period {
            font-size: 14px;
            color: var(--gray-500);
        }

        .featured .period {
            color: var(--gray-400);
        }

        .features-list {
            list-style: none;
            margin-bottom: 32px;
        }

        .features-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .featured .features-list li {
            border-color: var(--gray-700);
        }

        .features-list li:last-child {
            border-bottom: none;
        }

        .check-icon {
            width: 22px;
            height: 22px;
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .check-icon svg {
            width: 12px;
            height: 12px;
            color: white;
        }

        .feature-text {
            font-size: 15px;
            color: var(--gray-700);
        }

        .featured .feature-text {
            color: var(--gray-300);
        }

        .level-links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .level-btn {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .featured .level-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            box-shadow: 0 4px 14px rgba(8, 145, 178, 0.4);
        }

        .pricing-card:not(.featured) .level-btn {
            background: var(--gray-100);
            color: var(--gray-700);
        }

        .pricing-card:not(.featured) .level-btn:hover {
            background: var(--gray-200);
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background: var(--gray-50);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
        }

        .feature-card {
            background: white;
            padding: 32px;
            border-radius: 20px;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
        }

        .feature-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .feature-icon svg {
            width: 28px;
            height: 28px;
            color: white;
        }

        .feature-card h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 12px;
        }

        .feature-card p {
            color: var(--gray-500);
            font-size: 15px;
            line-height: 1.7;
        }

        /* Stats Section */
        .stats {
            padding: 80px 0;
            background: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .stat-card {
            text-align: center;
            padding: 24px;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* Testimonials */
        .testimonials {
            padding: 100px 0;
            background: white;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .testimonial-card {
            background: var(--gray-50);
            padding: 32px;
            border-radius: 20px;
            border: 1px solid var(--gray-100);
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .testimonial-avatar {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 20px;
        }

        .testimonial-info h4 {
            font-size: 16px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 2px;
        }

        .testimonial-info p {
            font-size: 13px;
            color: var(--gray-500);
        }

        .testimonial-rating {
            display: flex;
            gap: 4px;
            margin-bottom: 16px;
        }

        .testimonial-rating svg {
            width: 18px;
            height: 18px;
            color: var(--accent);
        }

        .testimonial-text {
            font-size: 15px;
            color: var(--gray-600);
            line-height: 1.7;
            font-style: italic;
        }

        /* FAQ Section */
        .faq {
            padding: 100px 0;
            background: var(--gray-50);
        }

        .faq-list {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            border-radius: 16px;
            margin-bottom: 16px;
            overflow: hidden;
            border: 1px solid var(--gray-200);
        }

        .faq-question {
            width: 100%;
            padding: 24px 28px;
            background: none;
            border: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            font-size: 17px;
            font-weight: 600;
            color: var(--gray-900);
            text-align: left;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            color: var(--primary);
        }

        .faq-question svg {
            width: 24px;
            height: 24px;
            color: var(--gray-400);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .faq-item.active .faq-question svg {
            transform: rotate(180deg);
            color: var(--primary);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-answer-content {
            padding: 0 28px 24px;
            color: var(--gray-600);
            line-height: 1.8;
        }

        /* CTA Section */
        .cta {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.02)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.5;
        }

        .cta-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .cta h2 {
            font-size: 42px;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 18px;
            color: var(--gray-400);
            margin-bottom: 40px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 450px;
                margin: 0 auto;
            }

            .pricing-card.featured {
                transform: none;
                order: -1;
            }

            .pricing-card.featured:hover {
                transform: translateY(-8px);
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 32px;
            }

            .hero-description {
                font-size: 16px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .section-title {
                font-size: 28px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero" aria-label="CS Test Series Pricing">
        <div class="hero-content">
            <div class="hero-badge">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Starting from ₹119 only
            </div>
            <h1>Affordable <span>CS Test Series</span> Pricing</h1>
            <p class="hero-description">Choose the perfect CS Test Series package for your ICSI exam preparation. Expert evaluation, All India Rankings, and proven results at budget-friendly prices.</p>
            <div class="hero-cta">
                <a href="#plans" class="btn btn-primary">
                    View Plans
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Students Enrolled</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">₹119</div>
                    <div class="stat-label">Starting Price</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">99%</div>
                    <div class="stat-label">Satisfaction Rate</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">4.9★</div>
                    <div class="stat-label">Student Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="plans">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">CS Test Series</span>
                <h2 class="section-title">Choose Your Perfect Plan</h2>
                <p class="section-subtitle">Flexible pricing for CS Executive, CS Professional & CSEET preparation</p>
            </div>
            <div class="pricing-grid">
                <article class="pricing-card">
                    <div class="plan-header">
                        <h3 class="plan-name">Chapterwise Test Series</h3>
                        <p class="plan-description">Detailed unit-wise coverage for thorough preparation</p>
                        <div class="plan-price">
                            <span class="currency">₹</span>
                            <span class="price">499</span>
                            <span class="period">/module</span>
                        </div>
                    </div>
                    <ul class="features-list">
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">8-10 chapterwise tests per module</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">2 full syllabus mock exams</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">Priority evaluation (48 hrs)</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">Access to toppers' answer sheets</span>
                        </li>
                    </ul>
                    <div class="level-links">
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CS Executive</a>
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CS Professional</a>
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CSEET</a>
                    </div>
                </article>

                <article class="pricing-card featured">
                    <div class="best-value-badge">Best Value</div>
                    <div class="plan-header">
                        <h3 class="plan-name">Detailed Test Series</h3>
                        <p class="plan-description">Comprehensive module coverage with detailed feedback</p>
                        <div class="plan-price">
                            <span class="currency">₹</span>
                            <span class="price">299</span>
                            <span class="period">/module</span>
                        </div>
                    </div>
                    <ul class="features-list">
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">4-5 comprehensive module tests</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">1 full syllabus mock exam</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">Standard evaluation (72 hrs)</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">Performance analytics dashboard</span>
                        </li>
                    </ul>
                    <div class="level-links">
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CS Executive</a>
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CS Professional</a>
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CSEET</a>
                    </div>
                </article>

                <article class="pricing-card">
                    <div class="popular-badge">Most Popular</div>
                    <div class="plan-header">
                        <h3 class="plan-name">Full Syllabus Test Series</h3>
                        <p class="plan-description">Complete syllabus coverage for final revision</p>
                        <div class="plan-price">
                            <span class="currency">₹</span>
                            <span class="price">119</span>
                            <span class="period">/module</span>
                        </div>
                    </div>
                    <ul class="features-list">
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">2 full syllabus mock tests</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">Comprehensive syllabus coverage</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">Basic evaluation with feedback</span>
                        </li>
                        <li>
                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                            <span class="feature-text">Detailed score report</span>
                        </li>
                    </ul>
                    <div class="level-links">
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CS Executive</a>
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CS Professional</a>
                        <a href="<?= base_url(
                            "/sign-in",
                        ) ?>" class="level-btn">CSEET</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Why Choose Us</span>
                <h2 class="section-title">What Makes Our CS Test Series Valuable</h2>
                <p class="section-subtitle">Quality evaluation that delivers results for your CS exam preparation</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3>Cost-Effective Preparation</h3>
                    <p>Our CS Test Series starts at just ₹119, offering expert evaluation and feedback at a fraction of traditional coaching institute costs.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h3>Proven Results</h3>
                    <p>Students using our CS Test Series improve their scores by an average of 22% compared to self-study alone. Join thousands of successful candidates.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <h3>Expert Evaluation</h3>
                    <p>Our experienced evaluators provide detailed feedback on your answers, helping you understand exactly where you're losing marks and how to improve.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3>Fast Turnaround</h3>
                    <p>Get your evaluated answer sheets within 48-72 hours. Our quick turnaround helps you learn from mistakes and improve continuously.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Success Stories</span>
                <h2 class="section-title">What Our Students Say</h2>
                <p class="section-subtitle">Join thousands of successful CS candidates who trusted our CS Test Series</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">RS</div>
                        <div class="testimonial-info">
                            <h4>Rahul Sharma</h4>
                            <p>CS Executive Passed</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="testimonial-text">"The Chapterwise CS Test Series helped me identify weak areas I didn't even know I had. Scored exemptions in CS Executive after failing previously!"</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">PP</div>
                        <div class="testimonial-info">
                            <h4>Priya Patel</h4>
                            <p>CS Professional Student</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="testimonial-text">"For the price, the quality of evaluation is unmatched. The detailed feedback helped me improve my answer presentation significantly."</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">AJ</div>
                        <div class="testimonial-info">
                            <h4>Amit Joshi</h4>
                            <p>CSEET Cleared</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="testimonial-text">"The Full Syllabus CS Test Series was perfect for my last-minute preparation. The affordable price made it accessible when I needed it most."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq" id="faq">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">FAQ</span>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Get answers to common questions about our CS Test Series pricing</p>
            </div>
            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question">
                        What is included in the CS Test Series?
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Our CS Test Series includes comprehensive test papers designed as per the latest ICSI syllabus. Each test comes with detailed evaluation, feedback on your answers, All India Rankings to benchmark your performance, and performance analytics to track your progress.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        How soon will I receive my evaluated answer sheets?
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            For Chapterwise plans, evaluations are completed within 48 working hours. For Detailed plans, the turnaround is 72 working hours. Full Syllabus plans receive basic evaluation within 5-7 days.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Can I access the CS Test Series on mobile?
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes, our CS Test Series platform is fully responsive and works seamlessly on all devices including smartphones, tablets, and desktops. You can attempt tests and view your results anywhere, anytime.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        What payment methods are accepted?
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            We accept all major payment methods including credit/debit cards, net banking, UPI, and wallets. For bulk purchases or institutional orders, we also offer invoice-based payments.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO Content Section -->
    <section class="seo-content" aria-labelledby="seo-heading" style="padding: 80px 0; background: white;">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">CS Exam Guide</span>
                <h2 class="section-title" id="seo-heading">Complete Guide to CS Test Series for ICSI Exam Success</h2>
            </div>
            <div style="max-width: 800px; margin: 0 auto; color: var(--gray-600); line-height: 1.9; font-size: 16px;">
                <p style="margin-bottom: 20px;">
                    Preparing for the Company Secretary (CS) examination conducted by the Institute of Company Secretaries of India (ICSI) requires a strategic approach that goes beyond mere textbook study. Our comprehensive <strong>CS Test Series</strong> has been designed to bridge the gap between theoretical knowledge and practical examination performance, helping thousands of candidates achieve their professional dreams.
                </p>

                <p style="margin-bottom: 20px;">
                    The CS examination is renowned for its rigorous standards and challenging questions that test not just memory but deep understanding of corporate laws, governance practices, and regulatory frameworks. Whether you are appearing for CS Executive, CS Professional, or CSEET, our <strong>CS Test Series</strong> provides the perfect platform to assess your preparation level and identify areas that need improvement.
                </p>

                <h3 style="font-size: 22px; font-weight: 700; color: var(--gray-900); margin: 30px 0 15px;">Why CS Test Series is Essential for Exam Success</h3>

                <p style="margin-bottom: 20px;">
                    Research and student feedback consistently show that candidates who regularly attempt <strong>CS mock tests</strong> perform significantly better in the actual examination. Our CS Test Series offers several unique advantages that set it apart from other preparation resources in the market. The detailed evaluation provided by experienced professionals helps candidates understand exactly what the examiners look for in answer sheets.
                </p>

                <p style="margin-bottom: 20px;">
                    One of the key features of our <strong>CS Test Series</strong> is the All India Ranking system, which allows candidates to benchmark their performance against thousands of other serious aspirants. This competitive element motivates students to improve consistently and helps them understand where they stand in the overall preparation landscape.
                </p>

                <h3 style="font-size: 22px; font-weight: 700; color: var(--gray-900); margin: 30px 0 15px;">Our CS Test Series Offerings</h3>

                <p style="margin-bottom: 20px;">
                    We offer three comprehensive <strong>CS Test Series plans</strong> designed to cater to different preparation needs and budgets. Our Chapterwise Test Series provides detailed unit-wise coverage with 8-10 tests per module, ideal for students who want thorough practice of each topic. The Detailed Test Series offers module-wise comprehensive tests with detailed feedback, while our Full Syllabus Test Series is perfect for last-minute revision and final assessment of overall preparation.
                </p>

                <p style="margin-bottom: 20px;">
                    All our <strong>CS Test Series</strong> packages include detailed answer evaluation, performance analytics, and access to toppers' answer sheets for reference. The feedback provided by our expert evaluators goes beyond simple marking to include specific suggestions for improvement in content, presentation, and answer structure.
                </p>

                <h3 style="font-size: 22px; font-weight: 700; color: var(--gray-900); margin: 30px 0 15px;">Proven Results and Student Success</h3>

                <p style="margin-bottom: 20px;">
                    Our data shows that students who complete 100% of our CS Test Series have a 3.2 times higher chance of clearing CS exams in their first attempt compared to national averages. The 22% average improvement in scores among regular test-takers speaks volumes about the effectiveness of our evaluation system.
                </p>

                <p style="margin-bottom: 20px;">
                    With over 50,000 students enrolled and a 92% success rate, our <strong>CS Test Series</strong> has established itself as a trusted name in CS exam preparation. Join thousands of successful candidates who have benefited from our expert-evaluated test series and take the first step towards your CS certification.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta" aria-labelledby="cta-heading">
        <div class="container">
            <div class="cta-content">
                <h2 id="cta-heading">Ready to Start Your CS Exam Preparation?</h2>
                <p>Join 50,000+ successful students who cleared ICSI exams with our CS Test Series</p>
                <a href="<?= base_url("/sign-in") ?>" class="btn btn-primary">
                    Get Started Now
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    <script>
        // FAQ Accordion
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const faqItem = button.closest('.faq-item');
                const answer = faqItem.querySelector('.faq-answer');
                const isActive = faqItem.classList.contains('active');

                document.querySelectorAll('.faq-item').forEach(item => {
                    item.classList.remove('active');
                    item.querySelector('.faq-answer').style.maxHeight = null;
                });

                if (!isActive) {
                    faqItem.classList.add('active');
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                }
            });
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
<?= $this->endSection() ?>
