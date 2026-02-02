<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    <?=!empty($typeInfo) ? $typeInfo->type_name : 'Subjects List'?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    :root {
        --primary-color: #1ab79c;
        --primary-light: #e0f7f3;
        --primary-dark: #148f77;
        --secondary-color: #e63e58;
        --secondary-light: #fde8eb;
        --dark-color: #2c3e50;
        --light-color: #f8f9fa;
        --yellow-btn: #ffc107;
        --yellow-dark: #e0a800;
        --gradient-primary: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        --gradient-secondary: linear-gradient(135deg, var(--secondary-color), #d62f49);
    }
    
    .main-container {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
        color: #444;
        background-color: #fafafa;
        position: relative;
        padding-bottom: 100px;
    }
    
    .page-header {
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        padding-top: 20px;
    }
    
    .page-title {
        color: var(--dark-color);
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .page-title span {
        color: var(--primary-color);
    }
    
    .page-title:after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background: var(--gradient-primary);
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 4px;
    }
    
    .promo-banner {
        background: var(--gradient-secondary);
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        text-align: center;
        font-size: 1.2rem;
        font-weight: 600;
        margin: 30px 0;
        box-shadow: 0 6px 20px rgba(230, 62, 88, 0.3);
        position: relative;
        overflow: hidden;
        animation: blink 1s infinite alternate, pulse 2s infinite, borderGlow 3s infinite;
        border: 2px solid transparent;
    }
    
    @keyframes blink {
        0% { opacity: 0.8; }
        100% { opacity: 1; }
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.02); }
        100% { transform: scale(1); }
    }
    
    @keyframes borderGlow {
        0%, 100% { border-color: rgba(255,255,255,0.3); }
        50% { border-color: rgba(255,255,255,0.8); }
    }
    
    .subject-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        margin-bottom: 25px;
        border: 1px solid rgba(0,0,0,0.08);
        position: relative;
        border-top: 4px solid var(--primary-color);
        height: 220px;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
    }
    
    .subject-card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 12px;
        border: 1px solid rgba(26, 183, 156, 0.2);
        pointer-events: none;
    }
    
    .subject-card:hover {
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }
    
    .subject-card .card-body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .subject-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 10px;
        position: relative;
        padding-bottom: 8px;
        line-height: 1.3;
    }
    
    .subject-name:after {
        content: '';
        position: absolute;
        width: 40px;
        height: 3px;
        background: var(--primary-color);
        bottom: 0;
        left: 0;
        border-radius: 3px;
    }
    
    .price-section {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    
    .current-price {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-right: 10px;
    }
    
    .original-price {
        font-size: 1rem;
        color: #999;
        text-decoration: line-through;
    }
    
    .rating {
        color: #ffc107;
        margin-bottom: 12px;
        font-size: 1rem;
    }
    
    .btn-add-to-cart {
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 6px;
        padding: 10px 15px;
        font-weight: 600;
        transition: all 0.2s;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        margin-top: auto;
        box-shadow: 0 4px 10px rgba(26, 183, 156, 0.3);
    }
    
    .btn-add-to-cart:hover {
        background: var(--primary-dark);
        color: white;
        box-shadow: 0 6px 15px rgba(26, 183, 156, 0.4);
    }
    
    .btn-add-to-cart i {
        margin-right: 8px;
    }
    
    /* Enhanced Arrow-shaped Sticky Proceed Button */
    .sticky-proceed-btn {
        position: fixed;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 999;
        background: var(--yellow-btn);
        color: #000;
        border: none;
        border-radius: 50px 50px 50px 0;
        padding: 15px 25px 15px 30px;
        font-weight: 600;
        box-shadow: 0 10px 30px rgba(255, 193, 7, 0.3);
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-decoration: none;
        clip-path: polygon(0 0, 80% 0, 100% 50%, 80% 100%, 0 100%);
        width: auto;
        min-width: 200px;
        animation: float 4s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(-50%) translateX(0); }
        50% { transform: translateY(-50%) translateX(5px); }
    }
    
    .sticky-proceed-btn .btn-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        position: relative;
        z-index: 1;
    }
    
    .sticky-proceed-btn .btn-text {
        font-size: 0.8rem;
        line-height: 1.2;
        text-align: left;
    }
    
    .sticky-proceed-btn .btn-main {
        font-size: 1.1rem;
        font-weight: 700;
    }
    
    .sticky-proceed-btn .cart-count {
        position: absolute;
        top: -8px;
        left: -8px;
        background: var(--secondary-color);
        color: white;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 700;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16);
        animation: pulse 1.5s infinite, bounce 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    
    .sticky-proceed-btn .arrow-icon {
        margin-left: 15px;
        font-size: 1.3rem;
        position: relative;
        transition: all 0.4s;
        animation: arrowSlide 1.5s infinite ease-in-out;
    }
    
    @keyframes arrowSlide {
        0%, 100% { transform: translateX(0); }
        50% { transform: translateX(5px); }
    }
    
    .sticky-proceed-btn:hover {
        background: var(--yellow-dark);
        box-shadow: 0 15px 40px rgba(255, 171, 0, 0.5);
        transform: translateY(-50%) scale(1.05);
    }
    
    .sticky-proceed-btn:hover .arrow-icon {
        transform: translateX(8px);
        animation: none;
    }
    
    /* Glow effect */
    .sticky-proceed-btn::after {
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border-radius: inherit;
        background: rgba(255, 193, 7, 0.1);
        z-index: -1;
        opacity: 0;
        transition: all 0.3s;
    }
    
    .sticky-proceed-btn:hover::after {
        opacity: 1;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        animation: glow 1.5s infinite;
    }
    
    @keyframes glow {
        0% { opacity: 0.5; }
        50% { opacity: 0.8; }
        100% { opacity: 0.5; }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sticky-proceed-btn {
            padding: 12px 20px 12px 25px;
            right: 10px;
            min-width: 160px;
            clip-path: polygon(0 0, 85% 0, 100% 50%, 85% 100%, 0 100%);
        }
        
        .sticky-proceed-btn .btn-text {
            font-size: 0.7rem;
        }
        
        .sticky-proceed-btn .btn-main {
            font-size: 0.9rem;
        }
        
        .sticky-proceed-btn .arrow-icon {
            font-size: 1rem;
            margin-left: 10px;
        }
    }
    
    /* Content Section Styles */
    .content-section {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-top: 40px;
        border-top: 5px solid var(--primary-color);
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .section-title {
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 15px;
        font-size: 1.6rem;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        width: 60px;
        height: 4px;
        background: var(--gradient-primary);
        bottom: 0;
        left: 0;
        border-radius: 4px;
    }
    
    .feature-box {
        background: var(--primary-light);
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
        border-left: 5px solid var(--primary-color);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .highlight-text {
        color: var(--primary-color);
        font-weight: 700;
    }
    
    .benefit-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        padding: 15px;
        border-radius: 8px;
        transition: all 0.3s;
    }
    
    .benefit-item:hover {
        background: rgba(26, 183, 156, 0.05);
    }
    
    .benefit-icon {
        color: var(--primary-color);
        font-size: 1.2rem;
        margin-right: 12px;
        margin-top: 3px;
    }
    
    .no-subjects {
        text-align: center;
        padding: 40px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin: 30px 0;
        border: 2px dashed var(--primary-color);
    }
    
    .no-subjects i {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 15px;
        opacity: 0.7;
    }
    
    .test-structure-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s;
        height: 100%;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .test-structure-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .test-structure-card .icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: rgba(26, 183, 156, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    
    .test-structure-card .icon-wrapper i {
        font-size: 1.8rem;
        color: var(--primary-color);
    }
    
    .test-structure-card h5 {
        color: var(--dark-color);
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 1.1rem;
    }
    
    .test-structure-card p {
        color: #666;
        font-size: 0.9rem;
    }
    
    .ready-section {
        background: var(--gradient-primary);
        color: white;
        padding: 30px;
        border-radius: 16px;
        margin-top: 40px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(26, 183, 156, 0.3);
    }
</style>
    <style>
        .tp-mg {
            margin: 40px;
        }
        @media (min-width: 768px) {
            .tp-mg {
                margin: 70px;
            }
        }
    </style>
<div class="tp-mg"></div>
<div class="container main-container py-4">
    <div class="page-header">
        <h1 class="page-title">Choose <span>Your Subjects</span></h1>
        <p class="text-muted">Select from our comprehensive CS test series to boost your preparation</p>
    </div>

    <div class="promo-banner">
        <i class="fas fa-bolt me-2"></i> <strong>FLASH SALE!</strong> Use Code <strong>RESULT10</strong> for 10% Discount | Offer Ends Soon!
    </div>

    <div class="subjectContainer">
        <?php if(!empty($fetchedSubject)): ?>
            <div class="row">
                <?php foreach($fetchedSubject as $subject): ?>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="subject-card">
                            <div class="card-body">
                                <h5 class="subject-name"><?= $subject['subject_name'] ?></h5>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ms-2 text-muted">(4.7)</span>
                                </div>
                                <div class="price-section">
                                    <span class="current-price">₹<?= $subject['offer_price'] ?></span>
                                    <span class="original-price"><del>₹<?= $subject['original_price'] ?></del></span>
                                    <span class="ms-auto badge bg-danger">Save <?= round(100 - ($subject['offer_price']/$subject['original_price']*100)) ?>%</span>
                                </div>
                                <button class="btn btn-add-to-cart addToCartBtn" type="button" data-subject-id="<?= $subject['subject_id'] ?>">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-subjects">
                <i class="far fa-folder-open"></i>
                <h3>No Subjects Available</h3>
                <p class="text-muted">We'll be adding new subjects soon. Please check back later.</p>
                <button class="btn btn-primary mt-3">Notify Me When Available</button>
            </div>
        <?php endif; ?>
    </div>

    <div class="content-section">
        <h2 class="section-title">About Our CS Test Series</h2>
        
        <div class="feature-box">
            <h4><i class="fas fa-certificate me-2"></i> Premium Quality Test Series for ICSI Exams</h4>
            <p class="mb-0">We provide unseen and amended questions to give environment like real exam, Each Question have been added after analysing the subject very carefully.</p>
        </div>
        
        <h4 class="mt-4">Why Choose Our CS Test Series?</h4>
        
        <div class="benefit-item">
            <div class="benefit-icon"><i class="fas fa-check-circle"></i></div>
            <div>
                <h5 class="highlight-text">100% ICSI Pattern Alignment</h5>
                <p>Our tests are meticulously crafted to match the exact format, difficulty level, and marking scheme of actual ICSI exams. Every question reflects the style and standards you'll encounter on exam day.</p>
            </div>
        </div>
        
        <div class="benefit-item">
            <div class="benefit-icon"><i class="fas fa-check-circle"></i></div>
            <div>
                <h5 class="highlight-text">Comprehensive Subject Coverage</h5>
                <p>From Corporate Laws to Tax Regulations, our test series spans all subjects in the CS curriculum. We ensure no topic is left uncovered, giving you complete preparation.</p>
            </div>
        </div>
        
        <div class="benefit-item">
            <div class="benefit-icon"><i class="fas fa-check-circle"></i></div>
            <div>
                <h5 class="highlight-text">Detailed Performance Analytics</h5>
                <p>Our advanced analytics dashboard provides insights into your strengths and weaknesses. Track your progress, identify areas needing improvement, and optimize your study plan.</p>
            </div>
        </div>
        
        <h4 class="mt-4">Test Series Structure</h4>
        
        <div class="row mt-3">
            <div class="col-md-4 mb-4">
                <div class="test-structure-card">
                    <div class="card-body text-center p-3">
                        <div class="icon-wrapper">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h5>Chapter-wise Tests</h5>
                        <p>Build strong fundamentals with focused tests on individual topics and concepts.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="test-structure-card">
                    <div class="card-body text-center p-3">
                        <div class="icon-wrapper">
                            <i class="fas fa-puzzle-piece"></i>
                        </div>
                        <h5>Module Tests</h5>
                        <p>Test your integrated understanding with comprehensive module assessments.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="test-structure-card">
                    <div class="card-body text-center p-3">
                        <div class="icon-wrapper">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <h5>Full Mock Exams</h5>
                        <p>Experience the real exam with complete mock tests that simulate actual conditions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ready-section">
        <h4>Ready to Ace Your CS Exams?</h4>
        <p>Select your subjects above and start your journey to success today!</p>
    </div>
</div>

<!-- Enhanced Arrow-shaped Sticky Proceed Button with Animations -->
<div class="sticky-proceed-btn showCartBtn">
    <span class="cart-count showCartBtn cartCount"><?=!empty($cartCount) ? $cartCount : 0?></span>
    <div class="btn-content">
        <span class="btn-main">Proceed to Payment</span>
    </div>
    <span class="arrow-icon">→</span>
</div>

<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
<script type="text/javascript">
    var pageType = 'subject_list';
</script>
    <script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.1"></script>
<?= $this->endSection() ?>
