<?= $this->extend("layout/student_layout") ?>
<?= $this->section("title") ?>
    CS Test Series Plans & Pricing 2026 | Best Company Secretary Exam Preparation
<?= $this->endSection() ?>
<?= $this->section("meta_description") ?>
    Get the best CS Test Series for ICSI exams. Choose from Chapterwise, Detailed, or Full Syllabus plans starting at ₹199. Expert evaluation, Ranking, and performance analytics.
<?= $this->endSection() ?>
<?= $this->section("meta_keywords") ?>
    CS Test Series, Company Secretary Test Series, ICSI Exam Preparation, CS Executive Test Series, CS Foundation Test Series, CS Professional Test Series, Online Mock Tests
<?= $this->endSection() ?>
<?= $this->section("og_title") ?>
    CS Test Series Plans & Pricing | Best Company Secretary Exam Preparation
<?= $this->endSection() ?>
<?= $this->section("og_description") ?>
    Join thousands of successful CS students with our expert-evaluated test series. Multiple plans starting at ₹199 with detailed feedback and  Rankings.
<?= $this->endSection() ?>
<?= $this->section("content") ?>
    <!-- SEO Hidden Content -->
    <div style="position:absolute;left:-9999px;">
        <h1>CS Test Series Plans</h1>
        <p>Best online test series for Company Secretary exams by ICSI. Comprehensive evaluation system for CS Foundation, Executive, and Professional programme students.</p>
    </div>

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "CS Test Series Plans",
        "description": "Explore our comprehensive CS test series plans for ICSI exam preparation. Chapterwise, Detailed, and Full Syllabus options available.",
        "url": "https://mycsmpt.com/plans",
        "mainEntity": {
            "@type": "ProductGroup",
            "name": "CS Test Series Plans",
            "description": "Test series packages for Company Secretary examination preparation",
            "hasProduct": [
                <?php if (!empty($plans)): ?>
                    <?php foreach ($plans as $index => $plan): ?>
                        <?php
                        $features = is_string($plan["features"])
                            ? json_decode($plan["features"], true)
                            : $plan["features"];
                        $description = is_array($features)
                            ? implode(", ", $features)
                            : $features;
                        ?>
                        {
                            "@type": "Product",
                            "name": "<?= esc($plan["plan_name"] ?? "Plan") ?>",
                            "description": "<?= esc($description) ?>",
                            "offers": {
                                "@type": "Offer",
                                "price": "<?= number_format(
                                    $plan["price"] ?? 0,
                                    2,
                                    ".",
                                    "",
                                ) ?>",
                                "priceCurrency": "INR",
                                "availability": "https://schema.org/InStock"
                            }
                        }<?= $index < count($plans) - 1 ? "," : "" ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    {
                        "@type": "Product",
                        "name": "CS Test Series",
                        "description": "Comprehensive test series for CS exam preparation",
                        "offers": {
                            "@type": "Offer",
                            "price": "199.00",
                            "priceCurrency": "INR",
                            "availability": "https://schema.org/InStock"
                        }
                    }
                <?php endif; ?>
            ]
        }
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {"@type": "ListItem", "position": 1, "name": "Home", "item": "https://mycsmpt.com/"},
            {"@type": "ListItem", "position": 2, "name": "CS Test Series", "item": "https://mycsmpt.com/plans"},
            {"@type": "ListItem", "position": 3, "name": "Pricing Plans", "item": "https://mycsmpt.com/plans#plans"}
        ]
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
            min-height: 600px;
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

        .hero-badge svg {
            width: 16px;
            height: 16px;
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
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-cta {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
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

        /* Stats Section */
        .stats {
            background: white;
            padding: 60px 0;
            margin-top: -60px;
            position: relative;
            z-index: 3;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .stat-card {
            background: white;
            padding: 28px;
            border-radius: 16px;
            text-align: center;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-100);
        }

        .stat-number {
            font-size: 36px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--gray-500);
            font-weight: 500;
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

        /* Features Section */
        .features {
            padding: 100px 0;
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

        /* Pricing Section */
        .pricing {
            padding: 100px 0;
            background: white;
        }

        .pricing-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-bottom: 60px;
        }

        .toggle-label {
            font-weight: 600;
            color: var(--gray-600);
        }

        .toggle-label.active {
            color: var(--gray-900);
        }

        .toggle-switch {
            width: 56px;
            height: 28px;
            background: var(--gray-200);
            border-radius: 14px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .toggle-switch.active {
            background: var(--primary);
        }

        .toggle-switch::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 24px;
            height: 24px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .toggle-switch.active::after {
            left: calc(100% - 26px);
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

        .plan-btn {
            width: 100%;
            padding: 16px;
            border-radius: 14px;
            font-size: 16px;
            justify-content: center;
        }

        .featured .plan-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            box-shadow: 0 4px 14px rgba(8, 145, 178, 0.4);
        }

        .featured .plan-btn:hover {
            box-shadow: 0 6px 20px rgba(8, 145, 178, 0.5);
        }

        .pricing-card:not(.featured) .plan-btn {
            background: var(--gray-100);
            color: var(--gray-700);
        }

        .pricing-card:not(.featured) .plan-btn:hover {
            background: var(--gray-200);
        }

        /* Comparison Section */
        .comparison {
            padding: 100px 0;
            background: var(--gray-50);
        }

        .comparison-table {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .table-header {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            background: var(--gray-900);
            color: white;
        }

        .table-header-cell {
            padding: 20px 24px;
            font-weight: 600;
            text-align: center;
        }

        .table-header-cell:first-child {
            text-align: left;
        }

        .table-row {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            border-bottom: 1px solid var(--gray-100);
        }

        .table-row:last-child {
            border-bottom: none;
        }

        .table-row:hover {
            background: var(--gray-50);
        }

        .table-cell {
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table-cell:first-child {
            justify-content: flex-start;
            font-weight: 500;
            color: var(--gray-700);
        }

        .table-cell .yes {
            color: var(--success);
        }

        .table-cell .no {
            color: var(--gray-400);
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

            .table-header,
            .table-row {
                grid-template-columns: 1fr;
            }

            .table-header-cell:not(:first-child),
            .table-cell:not(:first-child) {
                display: none;
            }

            .table-header-cell:first-child,
            .table-cell:first-child {
                text-align: center;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero" aria-label="CS Test Series Introduction">
        <div class="hero-content">
            <div class="hero-badge">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                #1 CS Test Series in India
            </div>
            <h1>Crack Your <span>CS Exam</span> in First Attempt</h1>
            <p class="hero-description">Join 50,000+ successful candidates who cleared ICSI exams with our expert-evaluated test series. Comprehensive coverage, detailed feedback, and proven results.</p>
            <div class="hero-cta">
                <a href="#plans" class="btn btn-primary">
                    View Plans
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>
                <a href="#" class="btn btn-outline">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Watch Demo
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
                    <div class="stat-number">99%</div>
                    <div class="stat-label">Satisfaction Rate</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">15k+</div>
                    <div class="stat-label">Tests Evaluated</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">4.9★</div>
                    <div class="stat-label">Student Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Why Choose Us</span>
                <h2 class="section-title">Everything You Need to Succeed</h2>
                <p class="section-subtitle">Our comprehensive test series is designed by experts to give you the perfect preparation for ICSI exams</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    </div>
                    <h3>Expert Evaluation</h3>
                    <p>Our tests are evaluated by experienced CS professionals and former ICSI examiners who understand exactly what gets marks.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3>Fast Turnaround</h3>
                    <p>Get your evaluated answer sheets within 48-72 hours with detailed feedback and suggestions for improvement.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h3>Performance Analytics</h3>
                    <p>Track your progress with detailed analytics, comparative analysis, and All India Rankings to know where you stand.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3>Updated Content</h3>
                    <p>Our test series is regularly updated with the latest ICSI syllabus changes, amendments, and exam patterns.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="plans">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Pricing Plans</span>
                <h2 class="section-title">Choose Your Perfect Plan</h2>
                <p class="section-subtitle">Flexible options for every budget and preparation level</p>
            </div>
            <div class="pricing-grid">
                <?php if (!empty($plans)): ?>
                    <?php foreach ($plans as $index => $plan): ?>
                        <?php
                        $features = is_string($plan["features"])
                            ? json_decode($plan["features"], true)
                            : $plan["features"];
                        $isFeatured =
                            isset($plan["is_featured"]) &&
                            $plan["is_featured"] == 1;
                        $badgeClass = "";
                        $badgeText = "";
                        if (
                            isset($plan["badge"]) &&
                            $plan["badge"] === "best-value"
                        ) {
                            $badgeClass = "best-value-badge";
                            $badgeText = "Best Value";
                        } elseif (
                            isset($plan["badge"]) &&
                            $plan["badge"] === "popular"
                        ) {
                            $badgeClass = "popular-badge";
                            $badgeText = "Most Popular";
                        }
                        ?>
                        <article class="pricing-card <?= $isFeatured
                            ? "featured"
                            : "" ?>">
                            <?php if (!empty($badgeText)): ?>
                                <div class="<?= $badgeClass ?>"><?= esc(
    $badgeText,
) ?></div>
                            <?php endif; ?>
                            <div class="plan-header">
                                <h3 class="plan-name"><?= esc(
                                    $plan["plan_name"] ?? "Plan Name",
                                ) ?></h3>
                                <p class="plan-description"><?= esc(
                                    $plan["plan_description"] ?? "",
                                ) ?></p>
                                <div class="plan-price">
                                    <span class="currency">₹</span>
                                    <span class="price"><?= number_format(
                                        $plan["price"] ?? 0,
                                    ) ?></span>
                                    <span class="period">/series</span>
                                </div>
                            </div>
                            <ul class="features-list">
                                <?php if (
                                    !empty($features) &&
                                    is_array($features)
                                ): ?>
                                    <?php foreach ($features as $feature): ?>
                                        <li>
                                            <span class="check-icon"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></span>
                                            <span class="feature-text"><?= esc(
                                                $feature,
                                            ) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <a href="<?= base_url(
                                "/sign-in",
                            ) ?>" class="btn plan-btn">Enroll Now</a>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">No plans available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Success Stories</span>
                <h2 class="section-title">What Our Students Say</h2>
                <p class="section-subtitle">Join thousands of successful CS candidates who trusted our test series</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">AK</div>
                        <div class="testimonial-info">
                            <h4>Ananya Kumar</h4>
                            <p>CS Executive - Rank 12</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="testimonial-text">"The detailed feedback from evaluators helped me understand exactly where I was losing marks. The All India Rankings kept me motivated throughout my preparation."</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">RP</div>
                        <div class="testimonial-info">
                            <h4>Rahul Patel</h4>
                            <p>CS Professional - All India Rank 5</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="testimonial-text">"The Professional level test series was exactly like the actual exam. The case studies and drafting practice gave me the confidence I needed to ace the exam."</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">SM</div>
                        <div class="testimonial-info">
                            <h4>Priya Sharma</h4>
                            <p>CS Foundation - Cleared in 1st Attempt</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="testimonial-text">"As a foundation student, I was nervous about the exam. The chapterwise tests helped me build strong fundamentals and the MCQ techniques were invaluable."</p>
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
                <p class="section-subtitle">Get answers to common questions about our CS test series</p>
            </div>
            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question">
                        How does the CS test series help in exam preparation?
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Our CS test series helps in multiple ways: it familiarizes you with the exam pattern, improves time management skills, identifies weak areas, provides benchmark against toppers, and builds exam temperament. Regular practice with our evaluated tests can improve your score by 20-25%.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Are the test questions similar to actual ICSI exams?
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes, our test papers are crafted by experts and follow the exact pattern, difficulty level, and marking scheme of actual exams. We analyze previous 5 years' papers to ensure our questions cover all important topics and recent amendments.
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
                            For Chapterwise and Full Syllabus plans, evaluations are completed within 48 working hours. For Detailed Test Series, the turnaround time is 72 working hours. We provide detailed remarks, corrections, and suggestions for improvement with each evaluation.
                        </div>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        Can I access the test series on mobile?
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes, our platform is fully responsive and works seamlessly on all devices including smartphones, tablets, and desktops. You can attempt tests and view your results anywhere, anytime.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta" aria-labelledby="cta-heading">
        <div class="container">
            <div class="cta-content">
                <h2 id="cta-heading">Ready to Boost Your CS Exam Performance?</h2>
                <p>Join thousands of successful CS students who aced their exams with our proven test series</p>
                <a href="<?= base_url("/sign-in") ?>" class="btn btn-primary">
                    Start Your Test Series Today
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

                // Close all other FAQs
                document.querySelectorAll('.faq-item').forEach(item => {
                    item.classList.remove('active');
                    item.querySelector('.faq-answer').style.maxHeight = null;
                });

                // Toggle current FAQ
                if (!isActive) {
                    faqItem.classList.add('active');
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                }
            });
        });
    </script>
<?= $this->endSection() ?>
