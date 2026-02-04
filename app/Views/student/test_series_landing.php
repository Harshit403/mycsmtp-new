<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
CS Test Series 2026 | Best CS Executive & CS Professional Test Series - My CS MTP
<?= $this->endSection() ?>
<?= $this->section('seoSection') ?>
<link rel="canonical" href="https://mycsmtp.com/test-series">
<meta name="description" content="Best CS Test Series 2026 for CS Executive & CS Professional exams. Expert evaluation, ICSI pattern questions, All India ranking, detailed analytics.">
<meta name="keywords" content="CS Test Series, CS Executive Test Series, CS Professional Test Series, ICSI test series, Company Secretary test series">
<meta name="robots" content="index, follow">
<meta name="author" content="My CS MTP">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://mycsmtp.com/test-series">
<meta property="og:title" content="CS Test Series 2026 | CS Executive & CS Professional - My CS MTP">
<meta property="og:description" content="India's #1 CS Test Series for CS Executive & CS Professional exams.">
<meta property="og:image" content="https://mycsmtp.com/images/og-image.jpg">

<!-- Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "My CS MTP Test Series",
    "url": "https://mycsmtp.com"
}
</script>

<?php if(!empty($faqs)): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php foreach($faqs as $index => $faq): ?>
        {
            "@type": "Question",
            "name": "<?= esc($faq['question'] ?? '') ?>",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?= esc($faq['answer'] ?? '') ?>"
            }
        }<?= ($index < count($faqs) - 1) ? ',' : '' ?>
        <?php endforeach; ?>
    ]
}
</script>
<?php endif; ?>

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    :root {
        --primary: #1ab79c;
        --primary-dark: #15967d;
        --primary-light: rgba(26, 183, 156, 0.1);
        --secondary: #1e293b;
        --text: #334155;
        --text-light: #64748b;
        --bg: #f8fafc;
        --white: #ffffff;
        --border: #e2e8f0;
    }
    *, *::before, *::after { box-sizing: border-box; }
    html { font-size: 16px; scroll-behavior: smooth; }
    body {
        font-family: 'Plus Jakarta Sans', 'Inter', -apple-system, sans-serif;
        color: var(--text);
        line-height: 1.6;
        background: var(--bg);
    }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
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
        border: none;
    }
    .btn-primary { background: var(--primary); color: var(--white); }
    .btn-primary:hover { background: var(--primary-dark); }
    .btn-outline { background: transparent; color: var(--primary); border: 2px solid var(--primary); }
    .btn-outline:hover { background: var(--primary); color: var(--white); }
    .section-title { text-align: center; margin-bottom: 60px; }
    .section-title h2 { font-size: 2rem; color: var(--secondary); margin-bottom: 12px; font-weight: 700; }
    .section-title p { font-size: 1rem; color: var(--text-light); max-width: 600px; margin: 0 auto; }

    /* Hero Section - Redesigned */
    .hero {
        padding: 80px 0;
        background: var(--white);
        position: relative;
        overflow: hidden;
    }
    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--primary);
    }
    .hero-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    .hero-content { position: relative; z-index: 1; }
    .hero-content h1 {
        font-size: 2.75rem;
        color: var(--secondary);
        margin-bottom: 20px;
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: -0.03em;
    }
    .hero-content h1 span { color: var(--primary); }
    .hero-content > p {
        font-size: 1.1rem;
        color: var(--text-light);
        margin-bottom: 28px;
        line-height: 1.7;
    }
    .hero-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 28px;
    }
    .hero-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        background: var(--primary-light);
        border-radius: 50px;
        font-size: 13px;
        font-weight: 500;
        color: var(--primary-dark);
    }
    .hero-badge i { font-size: 12px; }
    .hero-cta {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    /* Hero Right - Cards */
    .hero-right {
        display: flex;
        flex-direction: column;
        gap: 16px;
        position: relative;
    }
    .hero-card {
        background: var(--bg);
        border-radius: 12px;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        border: 1px solid var(--border);
        transition: all 0.2s ease;
    }
    .hero-card:hover {
        border-color: var(--primary);
        transform: translateX(4px);
    }
    .hero-card-icon {
        width: 48px;
        height: 48px;
        background: var(--white);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 20px;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(26, 183, 156, 0.15);
    }
    .hero-card-text h4 {
        font-size: 15px;
        font-weight: 700;
        color: var(--secondary);
        margin-bottom: 4px;
    }
    .hero-card-text p {
        font-size: 13px;
        color: var(--text-light);
        margin: 0;
    }
    
    /* Quick Selector in Hero */
    .hero-selector {
        background: var(--secondary);
        border-radius: 12px;
        padding: 24px;
        margin-top: 10px;
    }
    .hero-selector h3 {
        font-size: 16px;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 16px;
    }
    .hero-selector-row {
        display: grid;
        grid-template-columns: 1fr 1fr auto;
        gap: 12px;
    }
    .hero-select {
        padding: 10px 14px;
        border-radius: 6px;
        border: none;
        font-size: 14px;
        color: var(--text);
        background: var(--white);
        cursor: pointer;
    }
    .hero-select:disabled {
        background: #e2e8f0;
        cursor: not-allowed;
    }
    .hero-select-btn {
        padding: 10px 20px;
        background: var(--primary);
        color: var(--white);
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .hero-select-btn:hover { background: var(--primary-dark); }

    /* Features Section */
    .features { padding: 80px 0; background: var(--bg); }
    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .feature-card {
        background: var(--white);
        border-radius: 10px;
        padding: 26px;
        border: 1px solid var(--border);
        transition: all 0.2s ease;
    }
    .feature-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .feature-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        color: var(--primary);
        font-size: 22px;
    }
    .feature-card h3 {
        font-size: 1rem;
        color: var(--secondary);
        margin-bottom: 8px;
        font-weight: 700;
        text-align: center;
    }
    .feature-card p {
        color: var(--text-light);
        font-size: 13px;
        text-align: center;
        margin: 0;
    }

    /* How It Works */
    .how-it-works { padding: 80px 0; background: var(--white); }
    .steps-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }
    .step-card { text-align: center; position: relative; }
    .step-number {
        width: 44px;
        height: 44px;
        background: var(--primary);
        color: var(--white);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 14px;
    }
    .step-card h3 { font-size: 0.95rem; color: var(--secondary); margin-bottom: 8px; font-weight: 700; }
    .step-card p { font-size: 13px; color: var(--text-light); margin: 0; }

    /* Testimonials */
    .testimonials { padding: 80px 0; background: var(--bg); }
    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .testimonial-card {
        background: var(--white);
        border-radius: 10px;
        padding: 22px;
        border: 1px solid var(--border);
    }
    .testimonial-header { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
    .testimonial-avatar {
        width: 44px;
        height: 44px;
        background: var(--primary-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-weight: 700;
    }
    .testimonial-meta h4 { font-size: 0.9rem; color: var(--secondary); font-weight: 700; }
    .testimonial-meta p { font-size: 12px; color: var(--text-light); margin: 0; }
    .testimonial-rating { color: #fbbf24; font-size: 12px; margin-bottom: 10px; }
    .testimonial-text { font-size: 13px; color: var(--text-light); line-height: 1.6; font-style: italic; margin: 0; }

    /* Content Section */
    .cs-content { padding: 80px 0; background: var(--white); }
    .cs-content .container > div:first-child {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 60px;
        align-items: start;
    }
    .cs-content h2 {
        font-size: 1.5rem;
        color: var(--secondary);
        margin-bottom: 20px;
        font-weight: 700;
        text-align: left;
    }
    .cs-content p {
        font-size: 14px;
        color: var(--text-light);
        line-height: 1.8;
        margin-bottom: 14px;
        text-align: justify;
    }
    .cs-content-list { list-style: none; padding: 0; margin: 0; }
    .cs-content-list li {
        padding: 10px 0;
        font-size: 14px;
        color: var(--text);
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }
    .cs-content-list li i {
        color: var(--primary);
        margin-top: 3px;
    }
    .cs-content-card {
        background: var(--bg);
        border-radius: 12px;
        padding: 28px;
        border: 1px solid var(--border);
    }
    .cs-content-card h3 {
        font-size: 1.1rem;
        color: var(--secondary);
        margin-bottom: 16px;
        font-weight: 700;
    }
    .cs-subject-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .cs-subject-tag {
        padding: 8px 16px;
        background: var(--primary-light);
        border-radius: 6px;
        font-size: 13px;
        color: var(--primary-dark);
        font-weight: 500;
    }
    .cs-subject-tag.pro {
        background: rgba(14, 165, 233, 0.1);
        color: #0284c7;
    }

    /* FAQ Section */
    .faq { padding: 80px 0; background: var(--white); }
    .faq-list { max-width: 700px; margin: 0 auto; }
    .faq-item {
        background: var(--bg);
        border-radius: 8px;
        margin-bottom: 10px;
        border: 1px solid var(--border);
        overflow: hidden;
    }
    .faq-question {
        width: 100%;
        padding: 16px 20px;
        background: none;
        border: none;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
        color: var(--secondary);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .faq-question i { color: var(--primary); transition: transform 0.2s ease; }
    .faq-item.active .faq-question i { transform: rotate(180deg); }
    .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.2s ease; }
    .faq-item.active .faq-answer { max-height: 200px; }
    .faq-answer-content { padding: 0 20px 16px; color: var(--text-light); font-size: 13px; }

    /* CTA Section */
    .cta { padding: 80px 0; background: var(--secondary); }
    .cta-content { text-align: center; max-width: 550px; margin: 0 auto; }
    .cta h2 { font-size: 1.75rem; color: var(--white); margin-bottom: 12px; font-weight: 700; }
    .cta p { font-size: 1rem; color: #94a3b8; margin-bottom: 24px; }
    .cta .btn-primary { background: var(--primary); color: var(--white); }

    @media (max-width: 1024px) {
        .hero-grid { grid-template-columns: 1fr; gap: 40px; }
        .features-grid, .testimonials-grid { grid-template-columns: repeat(2, 1fr); }
        .steps-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 768px) {
        .hero { padding: 50px 0; }
        .hero-content h1 { font-size: 2rem; }
        .features-grid, .testimonials-grid, .steps-grid { grid-template-columns: 1fr; }
        .hero-selector-row { grid-template-columns: 1fr; }
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <h1><span>CS Test Series</span> for Exam Success</h1>
                <p>Comprehensive online test series for CS Executive & CS Professional exams with expert evaluation, ICSI pattern questions & All India ranking.</p>
                <div class="hero-badges">
                    <span class="hero-badge"><i class="fas fa-check"></i> ICSI Pattern</span>
                    <span class="hero-badge"><i class="fas fa-check"></i> Expert Evaluation</span>
                    <span class="hero-badge"><i class="fas fa-check"></i> Analytics</span>
                </div>
                <div class="hero-cta">
                    <a href="#selector" class="btn btn-primary"><i class="fas fa-search"></i> Browse Courses</a>
                    <a href="<?= base_url('sign-in') ?>" class="btn btn-outline"><i class="fas fa-user"></i> Student Login</a>
                </div>
            </div>
            <div class="hero-right">
                <div class="hero-card">
                    <div class="hero-card-icon"><i class="fas fa-clipboard-list"></i></div>
                    <div class="hero-card-text">
                        <h4>100+ Test Papers</h4>
                        <p>Chapter-wise & Mock Tests</p>
                    </div>
                </div>
                <div class="hero-card">
                    <div class="hero-card-icon"><i class="fas fa-clock"></i></div>
                    <div class="hero-card-text">
                        <h4>Real Exam Simulation</h4>
                        <p>Time-bound Practice Tests</p>
                    </div>
                </div>
                <div class="hero-card">
                    <div class="hero-card-icon"><i class="fas fa-chart-line"></i></div>
                    <div class="hero-card-text">
                        <h4>Performance Analytics</h4>
                        <p>Track Your Progress</p>
                    </div>
                </div>
                <div class="hero-card">
                    <div class="hero-card-icon"><i class="fas fa-trophy"></i></div>
                    <div class="hero-card-text">
                        <h4>All India Ranking</h4>
                        <p>Compare With Peers</p>
                    </div>
                </div>
                <div class="hero-selector">
                    <h3>Quick Access</h3>
                    <div class="hero-selector-row">
                        <select id="hero-level" class="hero-select">
                            <option value="">Select Level</option>
                            <?php if(!empty($fetchLevels)): ?>
                                <?php foreach($fetchLevels as $level): ?>
                                    <option value="<?=$level['level_id']?>"><?=htmlspecialchars($level['level_name'])?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <select id="hero-type" class="hero-select" disabled>
                            <option value="">Select Package</option>
                        </select>
                        <a href="#" id="hero-go" class="hero-select-btn">Go</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose Our CS Test Series?</h2>
            <p>Everything you need for successful CS exam preparation</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-graduation-cap"></i></div>
                <h3>ICSI Pattern</h3>
                <p>Questions based on latest ICSI syllabus & exam pattern</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-user-check"></i></div>
                <h3>Expert Evaluation</h3>
                <p>Answersheets evaluated by experienced faculty</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-chart-pie"></i></div>
                <h3>Detailed Analytics</h3>
                <p>Comprehensive performance reports & insights</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-ranking-star"></i></div>
                <h3>All India Ranking</h3>
                <p>Compare performance with other aspirants</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-stopwatch"></i></div>
                <h3>Exam Simulation</h3>
                <p>Mock tests with real exam environment</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-mobile-screen"></i></div>
                <h3>Mobile Access</h3>
                <p>Study anytime, anywhere on any device</p>
            </div>
        </div>
    </div>
</section>

<!-- CS Test Series Content Section -->
<section class="cs-content">
    <div class="container">
        <div class="cs-content-grid">
            <div>
                <h2>CS Test Series for Company Secretary Exam Preparation</h2>
                <p>The Company Secretary examination conducted by the Institute of Company Secretaries of India (ICSI) requires systematic preparation and thorough practice. A CS test series helps candidates evaluate their understanding of the syllabus and identify areas needing improvement.</p>
                <p>Our online test series are designed following the ICSI exam pattern and syllabus structure, providing authentic practice for both CS Executive and CS Professional levels.</p>
                <ul class="cs-content-list">
                    <li><i class="fas fa-check-circle"></i> Chapter-wise tests for comprehensive coverage</li>
                    <li><i class="fas fa-check-circle"></i> Full-length mock tests for exam simulation</li>
                    <li><i class="fas fa-check-circle"></i> Previous year question papers practice</li>
                    <li><i class="fas fa-check-circle"></i> Performance analytics and progress tracking</li>
                    <li><i class="fas fa-check-circle"></i> Expert evaluation with detailed feedback</li>
                    <li><i class="fas fa-check-circle"></i> All India ranking comparison</li>
                </ul>
            </div>
            <div class="cs-content-card">
                <h3>CS Executive Subjects</h3>
                <div class="cs-subject-tags">
                    <span class="cs-subject-tag">Company Law</span>
                    <span class="cs-subject-tag">Economic and Commercial Laws</span>
                    <span class="cs-subject-tag">Tax Laws and Practice</span>
                    <span class="cs-subject-tag">Company Secretaryship</span>
                    <span class="cs-subject-tag">Financial Management</span>
                </div>
                <h3 style="margin-top: 24px;">CS Professional Subjects</h3>
                <div class="cs-subject-tags">
                    <span class="cs-subject-tag pro">Corporate Secretarial Practice</span>
                    <span class="cs-subject-tag pro">Financial Treasury and Forex Management</span>
                    <span class="cs-subject-tag pro">Intellectual Property Rights</span>
                    <span class="cs-subject-tag pro">Advanced Company Law</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Selector Section -->
<section class="features" id="selector" style="background: var(--white);">
    <div class="container">
        <div class="section-title">
            <h2>Select Your Test Series</h2>
            <p>Choose level and package to continue</p>
        </div>
        <div style="max-width: 600px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: 1fr 1fr auto; gap: 12px;">
                <select id="page-level" class="hero-select" style="width: 100%; padding: 12px; border: 2px solid var(--border); border-radius: 8px;">
                    <option value="">Select Level</option>
                    <?php if(!empty($fetchLevels)): ?>
                        <?php foreach($fetchLevels as $level): ?>
                            <option value="<?=$level['level_id']?>"><?=htmlspecialchars($level['level_name'])?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <select id="page-type" class="hero-select" disabled style="width: 100%; padding: 12px; border: 2px solid var(--border); border-radius: 8px;">
                    <option value="">Select Package</option>
                </select>
                <a href="#" id="page-go" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works">
    <div class="container">
        <div class="section-title">
            <h2>How It Works</h2>
            <p>Start your CS preparation in 4 simple steps</p>
        </div>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <h3>Choose Package</h3>
                <p>Select the right test series for your exam</p>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <h3>Complete Payment</h3>
                <p>Secure online payment & instant access</p>
            </div>
            <div class="step-card">
                <div class="step-number">3</div>
                <h3>Attempt Tests</h3>
                <p>Take tests at your own pace</p>
            </div>
            <div class="step-card">
                <div class="step-number">4</div>
                <h3>Get Evaluated</h3>
                <p>Receive expert feedback & improve</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<?php if(!empty($testimonials)): ?>
<section class="testimonials">
    <div class="container">
        <div class="section-title">
            <h2>What Students Say</h2>
            <p>Success stories from our CS test series users</p>
        </div>
        <div class="testimonials-grid">
            <?php foreach($testimonials as $testimonial): ?>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar"><?= strtoupper(substr($testimonial['name'] ?? 'S', 0, 1)) ?></div>
                    <div class="testimonial-meta">
                        <h4><?= esc($testimonial['name'] ?? '') ?></h4>
                        <p><?= esc($testimonial['exam_info'] ?? '') ?></p>
                    </div>
                </div>
                <div class="testimonial-rating">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                    <i class="fas fa-star <?= ($i <= ($testimonial['rating'] ?? 5)) ? '' : 'far' ?>"></i>
                    <?php endfor; ?>
                </div>
                <p class="testimonial-text">"<?= esc($testimonial['message'] ?? '') ?>"</p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- FAQ Section -->
<?php if(!empty($faqs)): ?>
<section class="faq">
    <div class="container">
        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions</p>
        </div>
        <div class="faq-list">
            <?php foreach($faqs as $faq): ?>
            <div class="faq-item">
                <button class="faq-question">
                    <?= esc($faq['question'] ?? '') ?>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content"><?= esc($faq['answer'] ?? '') ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="cta">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Crack Your CS Exam?</h2>
            <p>Join thousands of successful students who cleared CS exams with our test series</p>
            <a href="#selector" class="btn btn-primary"><i class="fas fa-rocket"></i> Start Your Preparation</a>
        </div>
    </div>
</section>

<script>
// All Types Data
const allTypes = <?= json_encode(array_reduce($fetchedTypes ?? [], function($carry, $type) {
    $levelId = $type['level_id'] ?? 0;
    if (!isset($carry[$levelId])) {
        $carry[$levelId] = [];
    }
    $carry[$levelId][] = [
        'id' => $type['type_id'] ?? 0,
        'name' => substr($type['type_name'] ?? 'Package', 0, 40)
    ];
    return $carry;
}, [])) ?>;

document.addEventListener('DOMContentLoaded', function() {
    // Hero selectors
    const heroLevel = document.getElementById('hero-level');
    const heroType = document.getElementById('hero-type');
    const heroGo = document.getElementById('hero-go');
    
    // Page selectors
    const pageLevel = document.getElementById('page-level');
    const pageType = document.getElementById('page-type');
    const pageGo = document.getElementById('page-go');
    
    function populateTypeSelect(levelId, typeSelect) {
        typeSelect.innerHTML = '<option value="">Select Package</option>';
        if (levelId && allTypes[levelId] && allTypes[levelId].length > 0) {
            typeSelect.disabled = false;
            allTypes[levelId].forEach(type => {
                const option = document.createElement('option');
                option.value = type.id;
                option.textContent = type.name;
                typeSelect.appendChild(option);
            });
        } else {
            typeSelect.disabled = true;
        }
    }
    
    heroLevel.addEventListener('change', function() {
        populateTypeSelect(this.value, heroType);
    });
    
    pageLevel.addEventListener('change', function() {
        populateTypeSelect(this.value, pageType);
    });
    
    heroGo.addEventListener('click', function(e) {
        e.preventDefault();
        const typeId = heroType.value;
        if (typeId) {
            window.location.href = baseUrl + 'type/subject/' + typeId;
        }
    });
    
    pageGo.addEventListener('click', function(e) {
        e.preventDefault();
        const typeId = pageType.value;
        if (typeId) {
            window.location.href = baseUrl + 'type/subject/' + typeId;
        }
    });
    
    // FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(item => {
        item.addEventListener('click', function() {
            this.closest('.faq-item').classList.toggle('active');
        });
    });
});
</script>
<?= $this->endSection() ?>
