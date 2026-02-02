<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    CS Test Series Syllabus 2024 | Comprehensive CSEET, Executive & Professional Guide
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Course Selector Section -->
<section class="ecss-course-selector">
    <div class="ecss-container">
        <div class="ecss-header">
            <h2>Build Your Perfect Test Series</h2>
            <p>Select your course and package to view details and available subjects</p>
        </div>
        
        <div class="ecss-selection-flow">
            <!-- Step 1: Course Selection -->
            <div class="ecss-selection-group">
                <label for="course-level">1. Select Course Level</label>
                <div class="ecss-custom-select">
                    <select id="course-level" class="ecss-select">
                        <option value="">-- Choose Course Level --</option>
                        <option value="cseet">CSEET</option>
                        <option value="executive">CS Executive</option>
                        <option value="professional">CS Professional</option>
                    </select>
                    <div class="ecss-select-arrow">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
            
            <!-- Step 2: Package Selection -->
            <div class="ecss-selection-group" id="package-group" style="display: none;">
                <label for="package">2. Select Package</label>
                <div class="ecss-custom-select">
                    <select id="package" class="ecss-select" disabled>
                        <option value="">-- Choose Package --</option>
                        <!-- Options will be populated by JavaScript -->
                    </select>
                    <div class="ecss-select-arrow">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
            
            <!-- Plan Details Card -->
            <div class="ecss-plan-details" id="plan-details" style="display: none;">
                <div class="ecss-plan-header">
                    <h3 id="plan-name">Package Name</h3>
                    <div class="ecss-plan-badge" id="plan-badge">Most Popular</div>
                </div>
                <div class="ecss-plan-content">
                    <div class="ecss-plan-features" id="plan-features">
                        <!-- Features will be populated by JavaScript -->
                    </div>
                    <div class="ecss-plan-price">
                        <span id="plan-price">₹2,999</span>
                        <span id="plan-duration">/ module</span>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="ecss-action-group" id="action-group" style="display: none;">
                <button class="ecss-details-btn" id="details-btn">
                    <i class="fas fa-info-circle"></i> Full Details
                </button>
                <button class="ecss-continue-btn">
                    View Subjects <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Syllabus Content Section -->
<section class="container mt-0 mb-5 syllabus-section">
    <div class="text-center mb-5">
        <div class="gradient-text mb-3">
            <h1 class="display-4 fw-bold">CS Syllabus Structure</h1>
        </div>
        <p class="lead text-muted">Detailed curriculum for CSEET, Executive & Professional levels</p>
    </div>

    <!-- CSEET Syllabus -->
    <div id="cseet-syllabus" class="card syllabus-card mb-5 border-0">
        <div class="card-header bg-transparent border-0 position-relative">
            <div class="d-flex align-items-center">
                <div class="level-badge bg-primary text-white rounded-circle me-3">1</div>
                <h2 class="h3 mb-0">CSEET Syllabus</h2>
            </div>
            <div class="floating-shape shape-1"></div>
        </div>
        <div class="card-body pt-0">
            <p class="text-muted mb-4">The gateway to your CS journey with focus on fundamentals</p>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="topic-card h-100">
                        <h3 class="h5"><span class="text-primary">01.</span> Business Communication</h3>
                        <ul class="topic-list">
                            <li>Principles of effective communication</li>
                            <li>Business correspondence essentials</li>
                            <li>Modern communication technologies</li>
                            <li>Professional writing techniques</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="topic-card h-100">
                        <h3 class="h5"><span class="text-primary">02.</span> Legal Aptitude</h3>
                        <ul class="topic-list">
                            <li>Indian legal system overview</li>
                            <li>Company law fundamentals</li>
                            <li>Logical reasoning patterns</li>
                            <li>Quantitative analysis</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="topic-card h-100">
                        <h3 class="h5"><span class="text-primary">03.</span> Economic Environment</h3>
                        <ul class="topic-list">
                            <li>Basic economic concepts</li>
                            <li>Indian economic landscape</li>
                            <li>Business environment factors</li>
                            <li>Recent economic reforms</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="topic-card h-100">
                        <h3 class="h5"><span class="text-primary">04.</span> Current Affairs</h3>
                        <ul class="topic-list">
                            <li>National & international updates</li>
                            <li>Corporate developments</li>
                            <li>Presentation techniques</li>
                            <li>Verbal assessment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Executive Syllabus -->
    <div id="executive-syllabus" class="card syllabus-card mb-5 border-0">
        <div class="card-header bg-transparent border-0 position-relative">
            <div class="d-flex align-items-center">
                <div class="level-badge bg-primary text-white rounded-circle me-3">2</div>
                <h2 class="h3 mb-0">Executive Syllabus</h2>
            </div>
            <div class="floating-shape shape-2"></div>
        </div>
        <div class="card-body pt-0">
            <p class="text-muted mb-4">Advanced corporate laws and governance concepts</p>
            
            <div class="module-tabs">
                <ul class="nav nav-tabs" id="executiveTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="module1-tab" data-bs-toggle="tab" data-bs-target="#module1-content" type="button">Module I</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="module2-tab" data-bs-toggle="tab" data-bs-target="#module2-content" type="button">Module II</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="module3-tab" data-bs-toggle="tab" data-bs-target="#module3-content" type="button">Module III</button>
                    </li>
                </ul>
                <div class="tab-content p-4" id="executiveTabContent">
                    <div class="tab-pane fade show active" id="module1-content" role="tabpanel">
                        <h4 class="h5 mb-3 text-primary">Jurisprudence & Company Law</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="styled-list">
                                    <li>Legal interpretation methods</li>
                                    <li>General laws framework</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="styled-list">
                                    <li>Company law applications</li>
                                    <li>Business entity formation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="module2-content" role="tabpanel">
                        <h4 class="h5 mb-3 text-primary">Tax & Financial Management</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="styled-list">
                                    <li>Taxation laws overview</li>
                                    <li>Corporate taxation</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="styled-list">
                                    <li>Accounting standards</li>
                                    <li>Financial strategies</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="module3-content" role="tabpanel">
                        <h4 class="h5 mb-3 text-primary">Governance & Compliance</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="styled-list">
                                    <li>Capital market regulations</li>
                                    <li>Securities law compliance</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="styled-list">
                                    <li>Economic legislation</li>
                                    <li>Labor law applications</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Professional Syllabus -->
    <div id="professional-syllabus" class="card syllabus-card mb-5 border-0">
        <div class="card-header bg-transparent border-0 position-relative">
            <div class="d-flex align-items-center">
                <div class="level-badge bg-primary text-white rounded-circle me-3">3</div>
                <h2 class="h3 mb-0">Professional Syllabus</h2>
            </div>
            <div class="floating-shape shape-3"></div>
        </div>
        <div class="card-body pt-0">
            <p class="text-muted mb-4">Advanced expertise in corporate governance and strategy</p>
            
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="professional-paper">
                        <div class="paper-header bg-primary bg-opacity-10 p-3 rounded-top">
                            <h3 class="h5 mb-0 text-primary">Core Papers</h3>
                        </div>
                        <div class="paper-body p-3">
                            <div class="paper-item">
                                <h4 class="h6"><span class="paper-number">01</span> Governance & Ethics</h4>
                                <p>Corporate governance frameworks and ethical decision-making processes</p>
                            </div>
                            <div class="paper-item">
                                <h4 class="h6"><span class="paper-number">02</span> Advanced Taxation</h4>
                                <p>Complex tax scenarios and international taxation principles</p>
                            </div>
                            <div class="paper-item">
                                <h4 class="h6"><span class="paper-number">03</span> Legal Drafting</h4>
                                <p>Professional documentation and representation techniques</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="professional-paper">
                        <div class="paper-header bg-primary bg-opacity-10 p-3 rounded-top">
                            <h3 class="h5 mb-0 text-primary">Elective Papers</h3>
                        </div>
                        <div class="paper-body p-3">
                            <div class="paper-item">
                                <h4 class="h6"><span class="paper-number">01</span> Banking & Insurance</h4>
                                <p>Financial sector regulations and compliance requirements</p>
                            </div>
                            <div class="paper-item">
                                <h4 class="h6"><span class="paper-number">02</span> IPR Laws</h4>
                                <p>Intellectual property protections and legal frameworks</p>
                            </div>
                            <div class="paper-item">
                                <h4 class="h6"><span class="paper-number">03</span> International Business</h4>
                                <p>Cross-border transactions and global trade laws</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Final CTA -->
    <div class="cta-section text-center p-5 rounded-4 mb-5">
        <h2 class="h1 mb-3">Start Your CS Journey Today</h2>
        <p class="lead mb-4">Join India's most trusted CS test series with thousand successful candidates</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="https://mycsmtp.com/register" class="btn btn-primary btn-lg px-4 rounded-pill">Enroll Now</a>
            <a href="https://mycsmtp.com/testimonial" class="btn btn-light btn-lg px-4 rounded-pill">Testimonials</a>
        </div>
    </div>
</section>

<!-- Details Popup -->
<div class="ecss-popup" id="details-popup">
    <div class="ecss-popup-content">
        <span class="ecss-popup-close" id="popup-close">&times;</span>
        <h3 id="popup-title">Package Details</h3>
        <div class="ecss-popup-features" id="popup-features">
            <!-- Popup content will be populated by JavaScript -->
        </div>
        <div class="ecss-popup-footer">
            <button class="ecss-popup-btn" id="popup-continue">Continue to Enrollment</button>
        </div>
    </div>
</div>

<style>
    /* Enhanced Course Selection System Styles */
    .ecss-course-selector {
        padding: 80px 0 60px;
        background: linear-gradient(135deg, #f8fcfb 0%, #e8f7f4 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border-bottom: 1px solid rgba(26,183,156,0.1);
    }
    
    .ecss-container {
        width: 90%;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .ecss-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .ecss-header h2 {
        font-size: 2.2rem;
        color: #2c3e50;
        margin-bottom: 15px;
        background: linear-gradient(90deg, #1ab79c, #148f7a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .ecss-header p {
        color: #6c757d;
        font-size: 1.05rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .ecss-selection-flow {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.05);
        border: 1px solid rgba(26,183,156,0.1);
    }
    
    .ecss-selection-group {
        margin-bottom: 25px;
    }
    
    .ecss-selection-group label {
        display: block;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
        font-size: 1rem;
    }
    
    .ecss-custom-select {
        position: relative;
    }
    
    .ecss-select {
        width: 100%;
        padding: 15px 25px;
        border: 2px solid #e0f2ef;
        border-radius: 12px;
        font-size: 0.95rem;
        appearance: none;
        background: white;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .ecss-select:focus {
        outline: none;
        border-color: #1ab79c;
        box-shadow: 0 0 0 4px rgba(26,183,156,0.15);
    }
    
    .ecss-select-arrow {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        color: #1ab79c;
        pointer-events: none;
        transition: all 0.3s ease;
    }
    
    .ecss-select:focus + .ecss-select-arrow {
        transform: translateY(-50%) rotate(180deg);
    }
    
    .ecss-plan-details {
        background: #f9fcfb;
        border-radius: 15px;
        padding: 25px;
        margin: 25px 0;
        border: 1px solid rgba(26,183,156,0.1);
        box-shadow: 0 8px 25px rgba(0,0,0,0.03);
        transition: all 0.4s ease;
        opacity: 0;
        transform: translateY(10px);
    }
    
    .ecss-plan-details.show {
        opacity: 1;
        transform: translateY(0);
    }
    
    .ecss-plan-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 12px;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .ecss-plan-header h3 {
        font-size: 1.3rem;
        color: #2c3e50;
        margin: 0;
    }
    
    .ecss-plan-badge {
        background: linear-gradient(135deg, #1ab79c, #148f7a);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .ecss-plan-features {
        margin-bottom: 20px;
    }
    
    .ecss-plan-feature {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        font-size: 0.9rem;
    }
    
    .ecss-plan-feature i.fa-check {
        color: #28a745;
        margin-right: 10px;
        width: 18px;
        text-align: center;
    }
    
    .ecss-plan-feature i.fa-times {
        color: #dc3545;
        margin-right: 10px;
        width: 18px;
        text-align: center;
    }
    
    .ecss-plan-price {
        text-align: right;
    }
    
    .ecss-plan-price span:first-child {
        font-size: 1.6rem;
        font-weight: 700;
        background: linear-gradient(135deg, #1ab79c, #148f7a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .ecss-plan-price span:last-child {
        color: #6c757d;
        font-size: 0.95rem;
    }
    
    .ecss-action-group {
        display: flex;
        justify-content: space-between;
        gap: 15px;
    }
    
    .ecss-details-btn, .ecss-continue-btn {
        flex: 1;
        padding: 14px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .ecss-details-btn {
        background: white;
        border: 2px solid #1ab79c;
        color: #1ab79c;
    }
    
    .ecss-details-btn:hover {
        background: rgba(26,183,156,0.05);
    }
    
    .ecss-continue-btn {
        background: linear-gradient(135deg, #1ab79c, #148f7a);
        color: white;
        border: none;
        box-shadow: 0 8px 20px rgba(26,183,156,0.25);
    }
    
    .ecss-continue-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(26,183,156,0.35);
    }
    
    .ecss-continue-btn:hover i {
        transform: translateX(4px);
    }
    
    .ecss-continue-btn i {
        transition: transform 0.3s ease;
    }
    
    /* Syllabus Section Styles */
    .syllabus-section {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        padding-top: 40px;
    }
    
    .gradient-text {
        background: linear-gradient(90deg, #1AB79C 0%, #2D68C4 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    
    .text-primary {
        color: #1AB79C !important;
    }
    
    .bg-primary {
        background-color: #1AB79C !important;
    }
    
    .btn-primary {
        background-color: #1AB79C;
        border-color: #1AB79C;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #148f77;
        border-color: #148f77;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(26, 183, 156, 0.3);
    }
    
    .btn-outline-primary {
        color: #1AB79C;
        border-color: #1AB79C;
        transition: all 0.3s ease;
    }
    
    .btn-outline-primary:hover {
        background-color: #1AB79C;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(26, 183, 156, 0.2);
    }
    
    .syllabus-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 32px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        position: relative;
    }
    
    .level-badge {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    
    .floating-shape {
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        opacity: 0.1;
        z-index: -1;
    }
    
    .shape-1 {
        background: #1AB79C;
        top: -30px;
        right: -30px;
    }
    
    .shape-2 {
        background: #2D68C4;
        top: -30px;
        right: -30px;
    }
    
    .shape-3 {
        background: #8E44AD;
        top: -30px;
        right: -30px;
    }
    
    .topic-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
    }
    
    .topic-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        border-color: rgba(26, 183, 156, 0.3);
    }
    
    .topic-list {
        list-style: none;
        padding-left: 0;
    }
    
    .topic-list li {
        padding: 6px 0;
        position: relative;
        padding-left: 24px;
    }
    
    .topic-list li:before {
        content: "";
        position: absolute;
        left: 0;
        top: 14px;
        width: 8px;
        height: 8px;
        background: #1AB79C;
        border-radius: 50%;
    }
    
    .nav-tabs .nav-link {
        color: #495057;
        font-weight: 500;
        border: none;
        padding: 12px 20px;
    }
    
    .nav-tabs .nav-link.active {
        color: #1AB79C;
        background: transparent;
        border-bottom: 3px solid #1AB79C;
    }
    
    .styled-list {
        list-style: none;
        padding-left: 0;
    }
    
    .styled-list li {
        padding: 8px 0;
        position: relative;
        padding-left: 28px;
    }
    
    .styled-list li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #1AB79C;
        font-weight: bold;
    }
    
    .professional-paper {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .professional-paper:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }
    
    .paper-number {
        display: inline-block;
        width: 28px;
        height: 28px;
        background: #1AB79C;
        color: white;
        border-radius: 50%;
        text-align: center;
        line-height: 28px;
        font-size: 14px;
        margin-right: 12px;
    }
    
    .cta-section {
        background: linear-gradient(135deg, #1AB79C 0%, #2D68C4 100%);
        color: white;
    }
    
    .cta-section .btn-light {
        background: rgba(255, 255, 255, 0.15);
        color: white;
        border: none;
    }
    
    .cta-section .btn-light:hover {
        background: rgba(255, 255, 255, 0.25);
    }
    
    /* Popup Styles */
    .ecss-popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s;
    }
    
    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
    }
    
    .ecss-popup-content {
        background-color: white;
        padding: 30px;
        border-radius: 15px;
        width: 90%;
        max-width: 600px;
        max-height: 80vh;
        overflow-y: auto;
        box-shadow: 0 5px 30px rgba(0,0,0,0.3);
        position: relative;
    }
    
    .ecss-popup-close {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 1.8rem;
        color: #6c757d;
        cursor: pointer;
        transition: color 0.3s;
    }
    
    .ecss-popup-close:hover {
        color: #dc3545;
    }
    
    .ecss-popup-features {
        margin: 20px 0;
    }
    
    .ecss-popup-feature {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px dashed #e9ecef;
    }
    
    .ecss-popup-feature i {
        margin-right: 15px;
        font-size: 1.2rem;
        min-width: 25px;
        text-align: center;
        padding-top: 3px;
    }
    
    .ecss-popup-feature i.fa-check {
        color: #28a745;
    }
    
    .ecss-popup-feature i.fa-times {
        color: #dc3545;
    }
    
    .ecss-popup-feature-content {
        flex: 1;
    }
    
    .ecss-popup-feature-title {
        font-weight: 600;
        margin-bottom: 5px;
        color: #2c3e50;
    }
    
    .ecss-popup-feature-desc {
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    .ecss-popup-footer {
        text-align: center;
        margin-top: 20px;
    }
    
    .ecss-popup-btn {
        background: linear-gradient(135deg, #1ab79c, #148f7a);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .ecss-popup-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(26,183,156,0.4);
    }
    
    /* Responsive Styles */
    @media (max-width: 992px) {
        .ecss-selection-flow {
            padding: 30px;
        }
        
        .ecss-header h2 {
            font-size: 2rem;
        }
    }
    
    @media (max-width: 768px) {
        .ecss-course-selector {
            padding: 60px 0 40px;
        }
        
        .ecss-header h2 {
            font-size: 1.8rem;
        }
        
        .ecss-action-group {
            flex-direction: column;
        }
        
        .display-4 {
            font-size: 2.2rem;
        }
        
        .ecss-popup-content {
            padding: 20px;
        }
    }
    
    @media (max-width: 576px) {
        .ecss-selection-flow {
            padding: 25px;
        }
        
        .ecss-header h2 {
            font-size: 1.6rem;
        }
        
        .ecss-select {
            padding: 12px 20px;
        }
        
        .ecss-popup-content {
            width: 95%;
            padding: 15px;
        }
    }
</style>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Course to Package mapping with detailed specifications
        const coursePackages = {
            cseet: [
                { 
                    value: "https://mycsmtp.com/level/type/11",
                    name: "CSEET Complete Package",
                    badge: "Most Popular",
                    price: "₹1,999",
                    duration: "/ module",
                    features: [
                        {icon: "check", title: "Test Papers", description: "8 Unit Tests + 2 Full Syllabus Papers"},
                        {icon: "check", title: "Pattern", description: "Strictly as per ICSI Pattern"},
                        {icon: "check", title: "Study Material", description: "Revision Notes for Theory Subjects"},
                        {icon: "check", title: "Flexibility", description: "Schedule or Unscheduled Option"},
                        {icon: "check", title: "Late Submission", description: "Missed schedule? Submit any day (1 week before exam)"},
                        {icon: "check", title: "Evaluation", description: "In-depth Evaluation with Suggested Answers"},
                        {icon: "check", title: "Feedback", description: "Personalized Improvement Tips"},
                        {icon: "check", title: "Marks Distribution", description: "Unit Tests: 20-45 marks | Full Papers: 100 marks"},
                        {icon: "check", title: "Validity", description: "Valid till December 2025"}
                    ]
                }
            ],
            executive: [
                { 
                    value: "https://mycsmtp.com/type/subject/38",
                    name: "Chapter Wise Tests",
                    badge: "",
                    price: "₹2,499",
                    duration: "/ module",
                    features: [
                        {icon: "check", title: "Test Papers", description: "4 Unit Tests + 1 Full Syllabus Paper"},
                        {icon: "check", title: "Pattern", description: "Strictly as per ICSI Pattern"},
                        {icon: "check", title: "Study Material", description: "Revision Notes for Theory Subjects"},
                        {icon: "check", title: "Flexibility", description: "Schedule or Unscheduled Option"},
                        {icon: "check", title: "Late Submission", description: "Missed schedule? Submit any day (1 week before exam)"},
                        {icon: "check", title: "Evaluation", description: "In-depth Evaluation with Suggested Answers"},
                        {icon: "check", title: "Feedback", description: "Personalized Improvement Tips"},
                        {icon: "check", title: "Marks Distribution", description: "Unit Tests: 20-45 marks | Full Papers: 100 marks"},
                        {icon: "check", title: "Validity", description: "Valid till December 2025"}
                    ]
                },
                { 
                    value: "https://mycsmtp.com/type/subject/39",
                    name: "Detailed Test Series",
                    badge: "Recommended",
                    price: "₹3,999",
                    duration: "/ module",
                    features: [
                        {icon: "check", title: "Test Papers", description: "8 Unit Tests + 2 Full Syllabus Papers"},
                        {icon: "check", title: "Pattern", description: "Strictly as per ICSI Pattern"},
                        {icon: "check", title: "Study Material", description: "Comprehensive Revision Notes"},
                        {icon: "check", title: "Flexibility", description: "Schedule or Unscheduled Option"},
                        {icon: "check", title: "Late Submission", description: "Missed schedule? Submit any day (1 week before exam)"},
                        {icon: "check", title: "Evaluation", description: "Detailed Evaluation with Model Answers"},
                        {icon: "check", title: "Feedback", description: "Personalized Performance Analysis"},
                        {icon: "check", title: "Marks Distribution", description: "Unit Tests: 20-45 marks | Full Papers: 100 marks"},
                        {icon: "check", title: "Priority Support", description: "Priority Evaluation Turnaround"},
                        {icon: "check", title: "Validity", description: "Valid till December 2025"}
                    ]
                },
                { 
                    value: "https://mycsmtp.com/type/subject/40",
                    name: "Full Syllabus Tests",
                    badge: "",
                    price: "₹4,999",
                    duration: "/ all modules",
                    features: [
                        {icon: "check", title: "Test Papers", description: "1 Full Syllabus Test Paper (No Unit Tests)"},
                        {icon: "check", title: "Pattern", description: "Strictly as per ICSI Pattern"},
                        {icon: "times", title: "Study Material", description: "No revisionary notes included"},
                        {icon: "check", title: "Flexibility", description: "Unscheduled Option Only"},
                        {icon: "check", title: "Late Submission", description: "Submit any day (1 week before exam)"},
                        {icon: "check", title: "Evaluation", description: "In-depth Evaluation with Suggested Answers"},
                        {icon: "check", title: "Feedback", description: "Personalized Improvement Tips"},
                        {icon: "check", title: "Marks Distribution", description: "Full Papers: 100 marks format"},
                        {icon: "check", title: "Validity", description: "Valid till December 2025"}
                    ]
                }
            ],
            professional: [
                { 
                    value: "https://mycsmtp.com/type/subject/41",
                    name: "Chapter Wise Tests",
                    badge: "",
                    price: "₹2,999",
                    duration: "/ module",
                    features: [
                        {icon: "check", title: "Test Papers", description: "4 Unit Tests + 1 Full Syllabus Paper"},
                        {icon: "check", title: "Pattern", description: "Strictly as per ICSI Pattern"},
                        {icon: "check", title: "Study Material", description: "Professional Drafting Notes Included"},
                        {icon: "check", title: "Flexibility", description: "Schedule or Unscheduled Option"},
                        {icon: "check", title: "Late Submission", description: "Missed schedule? Submit any day (1 week before exam)"},
                        {icon: "check", title: "Evaluation", description: "Expert Evaluation with Model Drafts"},
                        {icon: "check", title: "Feedback", description: "Drafting-Specific Feedback"},
                        {icon: "check", title: "Marks Distribution", description: "Unit Tests: 20-45 marks | Full Papers: 100 marks"},
                        {icon: "check", title: "Validity", description: "Valid till December 2025"}
                    ]
                },
                { 
                    value: "https://mycsmtp.com/type/subject/42",
                    name: "Detailed Test Series",
                    badge: "Best Value",
                    price: "₹4,499",
                    duration: "/ module",
                    features: [
                        {icon: "check", title: "Test Papers", description: "8 Unit Tests + 2 Full Syllabus Papers"},
                        {icon: "check", title: "Pattern", description: "Strictly as per ICSI Pattern"},
                        {icon: "check", title: "Study Material", description: "Comprehensive Drafting Materials"},
                        {icon: "check", title: "Flexibility", description: "Flexible Scheduling Options"},
                        {icon: "check", title: "Late Submission", description: "Missed deadline? Submit within grace period"},
                        {icon: "check", title: "Evaluation", description: "Detailed Drafting Evaluation"},
                        {icon: "check", title: "Feedback", description: "Section-wise Improvement Plan"},
                        {icon: "check", title: "Marks Distribution", description: "Unit Tests: 20-45 marks | Full Papers: 100 marks"},
                        {icon: "check", title: "Support", description: "Priority Mentor Support"},
                        {icon: "check", title: "Validity", description: "Valid till December 2025"}
                    ]
                },
                { 
                    value: "https://mycsmtp.com/type/subject/43",
                    name: "Full Syllabus Tests",
                    badge: "",
                    price: "₹5,999",
                    duration: "/ all modules",
                    features: [
                        {icon: "check", title: "Test Papers", description: "1 Comprehensive Final Paper (100 marks)"},
                        {icon: "check", title: "Pattern", description: "ICSI Exam Pattern Simulation"},
                        {icon: "times", title: "Study Material", description: "No additional notes provided"},
                        {icon: "check", title: "Flexibility", description: "Unscheduled Attempt Option"},
                        {icon: "check", title: "Late Submission", description: "Submit anytime before final week"},
                        {icon: "check", title: "Evaluation", description: "Expert Drafting Evaluation"},
                        {icon: "check", title: "Feedback", description: "Competency Benchmarking"},
                        {icon: "check", title: "Materials", description: "Full-length Suggested Answers"},
                        {icon: "check", title: "Validity", description: "Valid till December 2025"}
                    ]
                }
            ]
        };
        
        // DOM Elements
        const courseSelect = document.getElementById('course-level');
        const packageGroup = document.getElementById('package-group');
        const packageSelect = document.getElementById('package');
        const planDetails = document.getElementById('plan-details');
        const planName = document.getElementById('plan-name');
        const planBadge = document.getElementById('plan-badge');
        const planFeatures = document.getElementById('plan-features');
        const planPrice = document.getElementById('plan-price');
        const planDuration = document.getElementById('plan-duration');
        const actionGroup = document.getElementById('action-group');
        const continueBtn = document.querySelector('.ecss-continue-btn');
        const detailsBtn = document.getElementById('details-btn');
        const detailsPopup = document.getElementById('details-popup');
        const popupClose = document.getElementById('popup-close');
        const popupTitle = document.getElementById('popup-title');
        const popupFeatures = document.getElementById('popup-features');
        const popupContinue = document.getElementById('popup-continue');
        
        // Course selection handler
        courseSelect.addEventListener('change', function() {
            if (this.value) {
                // Show package selection
                packageGroup.style.display = 'block';
                
                // Clear and disable package select
                packageSelect.innerHTML = '<option value="">-- Choose Package --</option>';
                packageSelect.disabled = false;
                
                // Populate packages
                coursePackages[this.value].forEach(pkg => {
                    const option = document.createElement('option');
                    option.value = JSON.stringify(pkg);
                    option.textContent = pkg.name;
                    packageSelect.appendChild(option);
                });
                
                // For CSEET which has only one option, auto-select it
                if (this.value === 'cseet' && coursePackages.cseet.length === 1) {
                    packageSelect.value = JSON.stringify(coursePackages.cseet[0]);
                    updatePlanDetails(coursePackages.cseet[0]);
                    actionGroup.style.display = 'flex';
                    planDetails.classList.add('show');
                } else {
                    // Hide details and buttons for other courses
                    actionGroup.style.display = 'none';
                    planDetails.classList.remove('show');
                }
            } else {
                // Reset flow if no course selected
                packageGroup.style.display = 'none';
                actionGroup.style.display = 'none';
                planDetails.classList.remove('show');
                packageSelect.disabled = true;
            }
        });
        
        // Package selection handler
        packageSelect.addEventListener('change', function() {
            if (this.value) {
                const selectedPackage = JSON.parse(this.value);
                updatePlanDetails(selectedPackage);
                actionGroup.style.display = 'flex';
                planDetails.classList.add('show');
            } else {
                actionGroup.style.display = 'none';
                planDetails.classList.remove('show');
            }
        });
        
        // Update plan details function
        function updatePlanDetails(pkg) {
            planName.textContent = pkg.name;
            planPrice.textContent = pkg.price;
            planDuration.textContent = pkg.duration;
            
            // Update badge
            if (pkg.badge) {
                planBadge.textContent = pkg.badge;
                planBadge.style.display = 'block';
            } else {
                planBadge.style.display = 'none';
            }
            
            // Update features
            planFeatures.innerHTML = '';
            pkg.features.slice(0, 4).forEach(feature => {
                const featureEl = document.createElement('div');
                featureEl.className = 'ecss-plan-feature';
                const iconClass = feature.icon === "check" ? "fa-check" : "fa-times";
                const iconColor = feature.icon === "check" ? "#28a745" : "#dc3545";
                featureEl.innerHTML = `
                    <i class="fas ${iconClass}" style="color: ${iconColor}"></i>
                    <span>${feature.title}: ${feature.description}</span>
                `;
                planFeatures.appendChild(featureEl);
            });
            
            // Add "View All Features" link if more than 4 features
            if (pkg.features.length > 4) {
                const viewAll = document.createElement('div');
                viewAll.className = 'ecss-plan-feature';
                viewAll.innerHTML = `
                    <i class="fas fa-ellipsis-h" style="color: #6c757d"></i>
                    <span>+ ${pkg.features.length - 4} more features</span>
                `;
                planFeatures.appendChild(viewAll);
            }
            
            // Update continue button
            continueBtn.onclick = function() {
                window.location.href = pkg.value;
            };
            
            // Update details button to show popup
            detailsBtn.onclick = function() {
                showDetailsPopup(pkg);
            };
        }
        
        // Show details popup
        function showDetailsPopup(pkg) {
            popupTitle.textContent = pkg.name;
            popupFeatures.innerHTML = '';
            
            pkg.features.forEach(feature => {
                const featureEl = document.createElement('div');
                featureEl.className = 'ecss-popup-feature';
                const iconClass = feature.icon === "check" ? "fa-check" : "fa-times";
                featureEl.innerHTML = `
                    <i class="fas ${iconClass}"></i>
                    <div class="ecss-popup-feature-content">
                        <div class="ecss-popup-feature-title">${feature.title}</div>
                        <div class="ecss-popup-feature-desc">${feature.description}</div>
                    </div>
                `;
                popupFeatures.appendChild(featureEl);
            });
            
            // Update continue button in popup
            popupContinue.onclick = function() {
                window.location.href = pkg.value;
            };
            
            detailsPopup.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        
        // Close popup
        popupClose.onclick = function() {
            detailsPopup.style.display = 'none';
            document.body.style.overflow = 'auto';
        };
        
        // Close popup when clicking outside
        window.onclick = function(event) {
            if (event.target == detailsPopup) {
                detailsPopup.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        };
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('jsContent') ?>
<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.js"></script>
<?= $this->endSection() ?>
