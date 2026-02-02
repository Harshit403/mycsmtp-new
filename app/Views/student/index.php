<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
CS Test Series for June 2026 | CS Executive | CS Professional | My CS MTP
<?= $this->endSection() ?>
<?= $this->section('seoSection') ?>
<link rel="canonical" href="https://mycsmtp.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<meta name="description" content="My CS MTP CS Test Series is the most trusted and reliable CS Test Series For CS Executive and CS Professional exams. Prepare with expert-crafted mock tests.">
<meta name="keywords" content="CS Test Series, CS Executive Test Series, icsi test series, Company Secretary, online test series, cseet, cs exams, cs online test series, my cs mtp, cs test series for june 2026, best test series for cs executive">
<meta name="robots" content="index, follow" />
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    :root {
        --primary: #059669;
        --primary-dark: #047857;
        --primary-light: #d1fae5;
        --secondary: #1e293b;
        --accent: #0ea5e9;
        --text: #334155;
        --text-light: #64748b;
        --bg: #f8fafc;
        --white: #ffffff;
        --border: #e2e8f0;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
    }

    *, *::before, *::after {
        box-sizing: border-box;
    }

    html {
        font-size: 16px;
        scroll-behavior: smooth;
        -webkit-text-size-adjust: 100%;
    }

    body {
        font-family: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: var(--text);
        line-height: 1.6;
        background: var(--bg);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 28px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        gap: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: 0.01em;
    }

    .btn-primary {
        background: var(--primary);
        color: var(--white);
        border: 2px solid var(--primary);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-outline {
        background: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
    }

    .btn-outline:hover {
        background: var(--primary);
        color: var(--white);
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title h2 {
        font-size: 2.25rem;
        color: var(--secondary);
        margin-bottom: 12px;
        font-weight: 800;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
    }

    .section-title p {
        font-size: 1.1rem;
        color: var(--text-light);
        max-width: 600px;
        margin: 0 auto;
        font-weight: 400;
    }

    .material-text h4 {
        font-size: 15px;
        margin-bottom: 4px;
        font-weight: 600;
    }

    .badge {
        display: inline-block;
        padding: 6px 14px;
        background: var(--primary-light);
        color: var(--primary-dark);
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
    }

    .hero {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 50%, #f1f5f9 100%);
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: url('https://mycsmtp.com/images/hero-section-image.webp') center/cover;
        opacity: 0.08;
        clip-path: polygon(15% 0, 100% 0, 100% 100%, 0% 100%);
    }

    .hero-content {
        max-width: 600px;
        position: relative;
        z-index: 1;
    }

    .hero h1 {
        font-size: 2.75rem;
        color: #1e293b;
        margin-bottom: 20px;
        line-height: 1.15;
        font-weight: 800;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.03em;
    }

    .hero h1 span {
        color: #059669;
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: url('https://mycsmtp.com/images/hero-section-image.webp') center/cover;
        opacity: 0.3;
        clip-path: polygon(20% 0, 100% 0, 100% 100%, 0% 100%);
    }

    .hero-content {
        max-width: 600px;
        position: relative;
        z-index: 1;
    }

    .hero h1 {
        font-size: 2.75rem;
        color: #ffffff;
        margin-bottom: 20px;
        line-height: 1.2;
        font-weight: 800;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.03em;
    }

    .hero h1 span {
        color: #059669;
    }

    .hero h1 {
        font-size: 2.75rem;
        color: var(--secondary);
        margin-bottom: 20px;
        line-height: 1.15;
        font-weight: 800;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.03em;
    }

    .hero h1 span {
        color: var(--primary);
        background: linear-gradient(135deg, var(--primary) 0%, #10b981 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero p {
        font-size: 1.15rem;
        color: #64748b;
        margin-bottom: 32px;
        line-height: 1.7;
        font-weight: 400;
    }

    .hero-buttons {
        display: flex;
        gap: 16px;
        margin-bottom: 40px;
    }

    .hero-features {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .hero-feature {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 18px;
        background: #ffffff;
        border-radius: 10px;
        border-left: 3px solid #059669;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .hero-feature-icon {
        width: 24px;
        height: 24px;
        background: #059669;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 12px;
        flex-shrink: 0;
    }

    .hero-feature span {
        color: #1e293b;
        font-size: 14px;
        font-weight: 500;
    }

    .stats {
        background: var(--white);
        padding: 40px 0;
        border-bottom: 1px solid var(--border);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 4px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
    }

    .stat-label {
        font-size: 14px;
        color: var(--text-light);
    }

    .courses {
        padding: 80px 0;
        background: var(--white);
    }

    .course-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        max-width: 700px;
        margin: 0 auto;
    }

    .course-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 20px 16px;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .course-grid {
            grid-template-columns: repeat(2, 1fr);
            max-width: 500px;
        }
    }

    @media (max-width: 480px) {
        .course-grid {
            grid-template-columns: 1fr;
            max-width: 300px;
        }
    }

    .course-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    .course-icon {
        width: 48px;
        height: 48px;
        background: var(--primary-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        color: var(--primary);
        font-size: 20px;
        transition: all 0.3s ease;
    }

    .course-card:hover .course-icon {
        background: var(--primary);
        color: var(--white);
    }

    .course-card h3 {
        font-size: 0.95rem;
        color: var(--secondary);
        margin-bottom: 6px;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .selector-header h2 {
        font-size: 1.75rem;
        color: var(--secondary);
        margin-bottom: 8px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .course-card p {
        color: var(--text-light);
        font-size: 13px;
        display: none;
    }

    .selector {
        padding: 80px 0;
        background: var(--bg);
    }

    .selector-card {
        background: var(--white);
        border-radius: 20px;
        padding: 50px;
        box-shadow: var(--shadow);
        max-width: 900px;
        margin: 0 auto;
    }

    .selector-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .selector-header h2 {
        font-size: 1.75rem;
        color: var(--secondary);
        margin-bottom: 8px;
    }

    .selector-header p {
        color: var(--text-light);
        font-weight: 400;
    }

    .selector-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
    }

    .selector-step {
        background: var(--bg);
        border-radius: 12px;
        padding: 24px;
        border: 1px solid var(--border);
    }

    .selector-step label {
        display: block;
        font-weight: 600;
        color: var(--secondary);
        margin-bottom: 12px;
        font-size: 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .selector-select {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid var(--border);
        border-radius: 10px;
        font-size: 15px;
        color: var(--text);
        background: var(--white);
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .selector-select:focus {
        outline: none;
        border-color: var(--primary);
    }

    .package-info {
        margin-top: 30px;
        padding: 24px;
        background: var(--primary-light);
        border-radius: 12px;
        display: none;
    }

    .package-info.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .package-info h3 {
        color: var(--primary-dark);
        margin-bottom: 16px;
        font-weight: 700;
        font-size: 1.25rem;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .package-features {
        margin-bottom: 20px;
    }

    .package-feature {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: var(--text);
        font-weight: 400;
    }

    .package-feature i {
        color: var(--primary);
    }

    .package-info.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .package-info h3 {
        color: var(--primary-dark);
        margin-bottom: 16px;
        font-weight: 700;
        font-size: 1.25rem;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .package-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 12px;
        margin-bottom: 20px;
    }

    .package-feature {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: var(--text);
        font-weight: 400;
    }

    .package-feature i {
        color: var(--primary);
    }

    .package-price {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-dark);
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
    }

    .sample-materials {
        padding: 80px 0;
        background: var(--secondary);
        color: var(--white);
    }

    .sample-materials .section-title h2,
    .sample-materials .section-title p {
        color: var(--white);
    }

    .material-list {
        max-width: 800px;
        margin: 0 auto;
    }

    .material-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        margin-bottom: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.2s ease;
    }

    .material-item:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateX(8px);
    }

    .material-info {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .material-icon {
        width: 44px;
        height: 44px;
        background: var(--primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 18px;
    }

    .material-text h4 {
        font-size: 15px;
        margin-bottom: 4px;
    }

    .material-text p {
        font-size: 13px;
        color: #94a3b8;
    }

    .download-btn {
        padding: 10px 20px;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: var(--white);
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .download-btn:hover {
        background: var(--primary);
        border-color: var(--primary);
    }

    .testimonials {
        padding: 80px 0;
        background: var(--bg);
    }

    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .testimonial-card {
        background: var(--white);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
    }

    @media (max-width: 1024px) {
        .testimonial-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .testimonial-grid {
            grid-template-columns: 1fr;
        }
    }

    .testimonial-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
    }

    .testimonial-avatar {
        width: 52px;
        height: 52px;
        background: var(--primary-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 20px;
        font-weight: 700;
    }

    .testimonial-meta h4 {
        font-size: 16px;
        color: var(--secondary);
        margin-bottom: 2px;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .testimonial-meta p {
        font-size: 13px;
        color: var(--text-light);
    }

    .testimonial-rating {
        color: #fbbf24;
        font-size: 14px;
        margin-bottom: 12px;
    }

    .testimonial-text {
        color: var(--text);
        font-size: 15px;
        line-height: 1.7;
        font-style: italic;
        font-weight: 400;
    }

    .faq {
        padding: 80px 0;
        background: var(--bg);
    }

    .faq-list {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        margin-bottom: 12px;
        overflow: hidden;
    }

    .faq-question {
        width: 100%;
        padding: 20px 24px;
        background: none;
        border: none;
        text-align: left;
        font-size: 15px;
        font-weight: 600;
        color: var(--secondary);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.2s ease;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .faq-question:hover {
        background: var(--bg);
    }

    .faq-question i {
        transition: transform 0.3s ease;
        color: var(--primary);
    }

    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease, padding 0.3s ease;
    }

    .faq-item.active .faq-answer {
        max-height: 300px;
    }

    .faq-answer-content {
        padding: 0 24px 20px;
        color: var(--text-light);
        font-size: 14px;
        line-height: 1.7;
        font-weight: 400;
    }

    .blog {
        padding: 80px 0;
        background: var(--white);
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .blog-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    .blog-image {
        height: 160px;
        background: #f1f5f9;
        overflow: hidden;
        position: relative;
    }

    .blog-image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent 60%, rgba(0,0,0,0.03));
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
    }

    .blog-card:hover .blog-image img {
        transform: scale(1.05);
    }

    .blog-content {
        padding: 16px;
    }

    .blog-date {
        display: inline-block;
        background: var(--primary-light);
        color: var(--primary-dark);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .blog-content h3 {
        font-size: 0.9rem;
        color: var(--secondary);
        margin-bottom: 8px;
        line-height: 1.4;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-content p {
        color: var(--text-light);
        font-size: 13px;
        margin-bottom: 12px;
        line-height: 1.5;
        font-weight: 400;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-link {
        color: var(--primary);
        font-weight: 600;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: gap 0.2s ease;
    }

    .blog-link:hover {
        gap: 10px;
    }

    @media (max-width: 1024px) {
        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .blog-grid {
            grid-template-columns: 1fr;
            max-width: 400px;
        }
    }

    .cta {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        text-align: center;
        color: var(--white);
    }

    .cta h2 {
        font-size: 2rem;
        margin-bottom: 12px;
        font-weight: 800;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: -0.02em;
    }

    .cta p {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 32px;
        font-weight: 400;
    }

    .cta .btn {
        background: var(--white);
        color: var(--primary);
        border-color: var(--white);
    }

    .cta .btn:hover {
        background: var(--secondary);
        color: var(--white);
    }

    .scroll-progress {
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: var(--primary);
        z-index: 9999;
        transition: width 0.1s ease;
    }

    @media (max-width: 992px) {
        .hero::before {
            width: 100%;
            opacity: 0.08;
            clip-path: none;
        }

        .hero {
            text-align: center;
            padding: 60px 0 80px;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-features {
            align-items: center;
        }
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
            letter-spacing: -0.02em;
        }

        .hero-buttons {
            flex-direction: column;
            align-items: center;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .stat-number {
            font-size: 2rem;
        }

        .section-title h2 {
            font-size: 1.75rem;
            letter-spacing: -0.01em;
        }

        .selector-card {
            padding: 30px 20px;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .hero-features {
            display: none;
        }
    }
</style>

<div class="scroll-progress" id="scrollProgress"></div>

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Clear Your <span>CS Exams</span> With Most Trusted CS Test Series</h1>
            <p>Get access to the most comprehensive CS test series designed by experts to match the Latest ICSI exam pattern and relevant amendments.</p>
            
            <div class="hero-buttons">
                <a href="<?=base_url()?>register" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i> Register
                </a>
                <a href="<?=base_url()?>sign-in" class="btn btn-outline">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </div>
            
            <div class="hero-features">
                <div class="hero-feature">
                    <div class="hero-feature-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <span>Unique & Amended Questions as per ICSI pattern</span>
                </div>
                <div class="hero-feature">
                    <div class="hero-feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span>Detailed Performance feedback & Tracking</span>
                </div>
                <div class="hero-feature">
                    <div class="hero-feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span>Expert Feedback & Presentation Tips</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">10K+</div>
                <div class="stat-label">Students Enrolled</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Mock Tests</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">95%</div>
                <div class="stat-label">Success Rate</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-label">Expert Faculty</div>
            </div>
        </div>
    </div>
</section>

<section class="courses" id="test-series">
    <div class="container">
        <div class="section-title">
            <h2>Choose Your CS Test Series</h2>
            <p>Select your course level and start preparing</p>
        </div>
        
        <div class="course-grid">
            <?php
            if(!empty($fetchLevels)){
                $icons = ["fas fa-graduation-cap", "fas fa-briefcase", "fas fa-user-tie"];
                $i = 0;
                foreach ($fetchLevels as $level) {
                    $icon = $icons[$i] ?? "fas fa-book";
                    $i = ($i + 1) % 3;
                    ?>
                    <div class="course-card levelBtn" data-level-id="<?=$level['level_id']?>">
                        <div class="course-icon">
                            <i class="<?=$icon?>"></i>
                        </div>
                        <h3><?=htmlspecialchars($level['level_name'])?></h3>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        
        <div style="text-align: center; margin-top: 32px;">
            <a href="<?=base_url()?>/level/cs-test-series" class="btn btn-outline">
                View All Courses <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<section class="selector">
    <div class="container">
        <div class="selector-card">
            <div class="selector-header">
                <h2>Select Test Series</h2>
                <p>Choose level and package to see details</p>
            </div>
            
            <div class="selector-steps">
                <div class="selector-step">
                    <label>1. Select Level</label>
                    <select id="course-level" class="selector-select">
                        <option value="">-- Choose Level --</option>
                        <?php if(!empty($fetchLevels)): ?>
                            <?php foreach($fetchLevels as $level): ?>
                                <option value="<?=$level['level_id']?>"><?=htmlspecialchars($level['level_name'])?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                
                <div class="selector-step">
                    <label>2. Select Package</label>
                    <select id="package" class="selector-select" disabled>
                        <option value="">-- Choose Package --</option>
                    </select>
                </div>
            </div>
            
            <div class="package-info" id="package-info">
                <h3 id="package-name">Package Name</h3>
                <div class="package-features" id="package-features"></div>
                <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                    <a href="#" id="download-schedule" class="btn btn-outline" target="_blank">
                        <i class="fas fa-download"></i> Download Schedule
                    </a>
                    <a href="#" id="package-link" class="btn btn-primary">
                        View Subjects <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sample-materials" id="sample-materials">
    <div class="container">
        <div class="section-title">
            <h2>Free Sample Answersheets</h2>
            <p>Download sample evaluated answer sheets to experience our quality</p>
        </div>
        
        <div class="material-list">
            <div class="material-item">
                <div class="material-info">
                    <div class="material-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="material-text">
                        <h4>Sample Answersheet - 1</h4>
                        <p>PDF • 1.2 MB</p>
                    </div>
                </div>
                <a href="https://mycsmtp.com/sample-copy/sample-copy-1.pdf" class="download-btn" target="_blank">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>
            
            <div class="material-item">
                <div class="material-info">
                    <div class="material-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="material-text">
                        <h4>Sample Answersheet - 2</h4>
                        <p>PDF • 1.5 MB</p>
                    </div>
                </div>
                <a href="https://mycsmtp.com/sample-copy/sample-copy-2.pdf" class="download-btn" target="_blank">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>
            
            <div class="material-item">
                <div class="material-info">
                    <div class="material-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="material-text">
                        <h4>Sample Answersheet - 3</h4>
                        <p>PDF • 1.8 MB</p>
                    </div>
                </div>
                <a href="https://mycsmtp.com/sample-copy/sample-copy-3.pdf" class="download-btn" target="_blank">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>
            
            <div class="material-item">
                <div class="material-info">
                    <div class="material-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="material-text">
                        <h4>CS Executive Sample Paper - Tax Laws</h4>
                        <p>PDF • 1.3 MB</p>
                    </div>
                </div>
                <a href="https://mycsmtp.com/sample-copy/sample-copy-4.pdf" class="download-btn" target="_blank">
                    <i class="fas fa-download"></i> Download
                </a>
            </div>
        </div>
    </div>
</section>

<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-title">
            <h2>What Our Students Say</h2>
            <p>Trusted by thousands of CS students across India</p>
        </div>
        
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">ZS</div>
                    <div class="testimonial-meta">
                        <h4>Zara Siddiqui</h4>
                        <p>CS Professional</p>
                    </div>
                </div>
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"One of the best test series for CS Aspirants at a reasonable price. They are humble and always ready to assist. Highly recommended!"</p>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">SG</div>
                    <div class="testimonial-meta">
                        <h4>Snaha Gurrani</h4>
                        <p>CS Executive</p>
                    </div>
                </div>
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Loved the test series! The facility to submit when students feel ready is amazing. It helped me learn perfectly. Thank you for the support!"</p>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">TS</div>
                    <div class="testimonial-meta">
                        <h4>Tejal Soni</h4>
                        <p>CS Executive</p>
                    </div>
                </div>
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Test papers were amazing! While writing, I felt like writing ICSI questions only. The evaluation quality was best. Thank you for your guidance!"</p>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">RK</div>
                    <div class="testimonial-meta">
                        <h4>Reshma Krishna</h4>
                        <p>CS Executive</p>
                    </div>
                </div>
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="testimonial-text">"Happy to share that I cleared Group 2! Thank you My CS MTP team for the amazing support throughout my preparation journey."</p>
            </div>
        </div>
    </div>
</section>

<section class="faq" id="faq">
    <div class="container">
        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about our test series</p>
        </div>
        
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-question">
                    Why Should I Choose MY CS MTP?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>At MY CS MTP, we're dedicated to being your ultimate partner on the path to academic excellence. Our test series features expert crafted papers, wide topic coverage, real exam simulation, improvement ideas, flexibility, and expert guidance.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    How many times can I submit answersheets for evaluation?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>You will get access to submit answersheet only one time per test.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    After how much time will I get evaluated answersheets?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>You'll get evaluated answersheet within 2-3 working days, but in unusual circumstances it may delay.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    Is there a validity period for accessing the test series?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Your purchase will expire on conclusion of attempt you are enrolling for or 6 months, whichever is earlier.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    Can I access the tests on any device?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Yes, you can access tests on any device including Android, Windows, and iOS.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    How can I get support?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>You can reach us through chat on our website, WhatsApp at +91-9540097210, or email at support@mycsmtp.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog" id="blog">
    <div class="container">
        <div class="section-title">
            <h2>Latest From Our Blog</h2>
            <p>Get insights, tips and updates about CS exams and preparation</p>
        </div>
        
        <div class="blog-grid">
            <?php
            $latestBlogs = !empty($blog_items) ? array_slice($blog_items, 0, 4) : [];
            if(!empty($latestBlogs)):
                foreach ($latestBlogs as $value):
                    $image_path = '';
                    if (!empty($value->blog_temp_image) && file_exists(FCPATH . $value->blog_temp_image)) {
                        $image_path = base_url($value->blog_temp_image);
                    } else {
                        $image_path = base_url('design_assets/images/blog-1.jpg');
                    }
                    ?>
                    <a href="<?= base_url('blog/'.$value->blog_id) ?>" class="blog-card">
                        <div class="blog-image">
                            <img src="<?= $image_path ?>" alt="<?= htmlspecialchars($value->blog_heading) ?>" onerror="this.src='<?= base_url('design_assets/images/blog-1.jpg') ?>'">
                        </div>
                        <div class="blog-content">
                            <span class="blog-date"><?= date('M j, Y', strtotime($value->created_date)) ?></span>
                            <h3><?= htmlspecialchars($value->blog_heading) ?></h3>
                            <span class="blog-link">
                                Read More <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="<?= base_url('design_assets/images/blog-1.jpg') ?>" alt="CS Exam Preparation">
                    </div>
                    <div class="blog-content">
                        <span class="blog-date">June 2023</span>
                        <h3>5 Strategies to Ace Your CS Executive Exams</h3>
                        <span class="blog-link">Read More <i class="fas fa-arrow-right"></i></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if(!empty($blog_items) && count($blog_items) > 4): ?>
        <div style="text-align: center; margin-top: 32px;">
            <a href="<?= base_url('blogs') ?>" class="btn btn-outline">
                View All Articles <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="cta">
    <div class="container">
        <h2>Ready to Clear Your CS Exams?</h2>
        <p>Join thousands of successful students who cleared their exams with My CS MTP</p>
        <a href="<?=base_url()?>register" class="btn">
            Get Started Now <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const allTypes = <?php
        $typesByLevel = [];
        if(!empty($fetchedTypes)){
            foreach($fetchedTypes as $type){
                $levelId = $type['level_id'] ?? 0;
                if(!isset($typesByLevel[$levelId])){
                    $typesByLevel[$levelId] = [];
                }
                $typesByLevel[$levelId][] = [
                    'id' => $type['type_id'] ?? 0,
                    'name' => substr($type['type_name'] ?? 'Package', 0, 50),
                    'schedule_url' => $type['type_schedule_pdf'] ?? '',
                    'features' => [
                        $type['type_more_details'] ?? 'Complete test series access',
                        'Detailed evaluation',
                        'Expert feedback',
                        'Suggested answers'
                    ]
                ];
            }
        }
        echo json_encode($typesByLevel);
    ?>;

    const courseSelect = document.getElementById('course-level');
    const packageSelect = document.getElementById('package');
    const packageInfo = document.getElementById('package-info');

    courseSelect.addEventListener('change', function() {
        if (this.value && allTypes[this.value]) {
            packageSelect.innerHTML = '<option value="">-- Choose Package --</option>';
            packageSelect.disabled = false;
            
            allTypes[this.value].forEach((pkg) => {
                const option = document.createElement('option');
                option.value = pkg.id;
                option.textContent = pkg.name;
                option.dataset.name = pkg.name;
                option.dataset.scheduleUrl = pkg.schedule_url;
                option.dataset.features = JSON.stringify(pkg.features);
                packageSelect.appendChild(option);
            });
        } else {
            packageSelect.innerHTML = '<option value="">-- Choose Package --</option>';
            packageSelect.disabled = true;
            packageInfo.classList.remove('active');
        }
    });

    packageSelect.addEventListener('change', function() {
        if (this.value && courseSelect.value) {
            const option = this.options[this.selectedIndex];
            const typeId = this.value;
            const levelId = courseSelect.value;
            
            document.getElementById('package-name').textContent = option.dataset.name || 'Package Name';
            document.getElementById('package-link').href = base_url + 'level/type/' + levelId + '/subject/' + typeId;
            
            const scheduleLink = document.getElementById('download-schedule');
            if (option.dataset.scheduleUrl && option.dataset.scheduleUrl !== 'null' && option.dataset.scheduleUrl !== '') {
                scheduleLink.href = base_url + option.dataset.scheduleUrl;
                scheduleLink.style.display = 'inline-flex';
            } else {
                scheduleLink.style.display = 'none';
            }
            
            const features = JSON.parse(option.dataset.features || '[]');
            const featuresHtml = features.map(f => 
                `<div class="package-feature"><i class="fas fa-check-circle"></i><span>${f}</span></div>`
            ).join('');
            document.getElementById('package-features').innerHTML = featuresHtml;
            
            packageInfo.classList.add('active');
        } else {
            packageInfo.classList.remove('active');
        }
    });

    document.querySelectorAll('.faq-question').forEach(btn => {
        btn.addEventListener('click', function() {
            const item = this.parentElement;
            item.classList.toggle('active');
        });
    });

    const progress = document.getElementById('scrollProgress');
    window.addEventListener('scroll', function() {
        const scrollTop = document.documentElement.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        progress.style.width = (scrollTop / scrollHeight * 100) + '%';
    });
});
</script>

<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
<script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.3"></script>
<script type="text/javascript">var pageType = 'landing_page';</script>
<?= $this->endSection() ?>
