<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
     <?=!empty($levelInfo) ? $levelInfo->level_name : 'CS Test Series Plans' ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <style type="text/css">
        /* Reset and Base Styles */
        .cs-test-series-container * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        .cs-test-series-container {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            line-height: 1.7;
            padding: 20px 15px;
            margin: 0 auto;
            max-width: 1400px;
            font-size: 1.1em;
        }
        
        /* Color Scheme */
        :root {
            --primary-color: #21ab79;
            --primary-dark: #1a8a66;
            --primary-light: #e8f5f0;
            --secondary-color: #ff4757;
            --secondary-dark: #e84142;
            --accent-color: #4ecdc4;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --gray-color: #64748b;
            --border-radius: 12px;
            --box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
            --card-border: 1px solid rgba(0, 0, 0, 0.08);
        }
        
        /* Typography */
        .cs-test-series-container h1,
        .cs-test-series-container h2,
        .cs-test-series-container h3,
        .cs-test-series-container h4 {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1.2rem;
            line-height: 1.3;
        }
        
        .cs-test-series-container h1 {
            font-size: 2.4rem;
            text-align: center;
        }
        
        .cs-test-series-container h2 {
            font-size: 2rem;
            position: relative;
            padding-bottom: 12px;
        }
        
        .cs-test-series-container h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 70px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        
        .cs-test-series-container p {
            margin-bottom: 1.2rem;
            color: var(--gray-color);
        }
        
        /* Header Section */
        .cs-header-section {
            text-align: center;
            margin-bottom: 2.5rem;
            padding: 0 15px;
        }
        
        .cs-header-section h1 {
            color: var(--dark-color);
        }
        
        .cs-header-section h1 span {
            color: var(--primary-color);
        }
        
        .cs-header-section p {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
        }
        
        /* Featured Banner */
        .cs-featured-banner {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            margin: 2rem auto;
            text-align: center;
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
            max-width: 1200px;
        }
        
        .cs-featured-banner:before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
        }
        
        .cs-featured-banner h2 {
            color: white;
            position: relative;
        }
        
        .cs-featured-banner h2:after {
            background: white;
        }
        
        /* Blinking Button */
        .cs-blink-button {
            animation: cs-blink 0.8s infinite;
            background-color: var(--secondary-color);
            border: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 700;
            border-radius: 50px;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 5px 25px rgba(255, 71, 87, 0.6);
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            margin: 1rem 0;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }
        
        .cs-blink-button:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 30px rgba(255, 71, 87, 0.8);
            animation: none;
            background-color: var(--secondary-dark);
            color: white;
        }
        
        .cs-blink-button i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        @keyframes cs-blink {
            0% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.03); }
            100% { opacity: 1; transform: scale(1); }
        }
        
        /* Type Cards Grid */
        .cs-type-container {
            margin: 2.5rem auto;
            max-width: 1200px;
        }
        
        .cs-grid-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 1.8rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .cs-category-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.8rem;
            position: relative;
            overflow: hidden;
            border-top: 5px solid var(--primary-color);
            border: var(--card-border);
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: transform 0.3s ease;
        }
        
        .cs-category-card:hover {
            transform: translateY(-5px);
        }
        
        .cs-category-card .cs-card-title {
            color: var(--dark-color);
            text-decoration: none;
            display: block;
            text-align: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .cs-card-header {
            border-bottom: 1px dashed #e2e8f0;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .cs-batch-badge {
            display: inline-block;
            background: var(--primary-light);
            color: var(--primary-dark);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.8rem;
        }
        
        .cs-level-text {
            color: var(--primary-dark);
            text-align: center;
            font-size: 1rem;
            font-weight: 700;
            background: var(--primary-light);
            padding: 0.5rem;
            border-radius: 6px;
            display: inline-block;
            margin-top: 0.5rem;
        }
        
        .cs-more-details {
            flex-grow: 1;
            margin-bottom: 1.5rem;
            text-align: left;
            font-size: 1.1rem;
        }
        
        .cs-more-details ul {
            list-style: none;
            padding-left: 0;
        }
        
        .cs-more-details li {
            font-size: 1rem;
            position: relative;
            padding-left: 1.8em;
            margin-bottom: 0.7rem;
            color: var(--gray-color);
            line-height: 1.6;
            border-bottom: 1px dotted #e2e8f0;
            padding-bottom: 0.5rem;
        }
        
        .cs-more-details li:before {
            content: '\2022';
            color: var(--primary-color);
            font-weight: 900;
            position: absolute;
            left: 0;
            font-size: 1.2rem;
        }
        
        /* Button Styles */
        .cs-card-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: auto;
        }
        
        .cs-card-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            color: white;
            padding: 0.8rem;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
            width: 100%;
        }
        
        .cs-card-button:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        
        .cs-card-button i {
            margin-right: 8px;
            font-size: 1rem;
        }
        
        .cs-schedule-button {
            background: var(--accent-color);
        }
        
        .cs-schedule-button:hover {
            background: #3ab7ad;
        }
        
        /* Test Series Plans Section */
        .cs-plans-container {
            max-width: 1200px;
            margin: 2.5rem auto;
        }
        
        .cs-plans-container h2 {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .cs-plan-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.8rem;
            margin-bottom: 1.8rem;
            box-shadow: var(--box-shadow);
            border-left: 4px solid var(--primary-color);
        }
        
        .cs-plan-card h3 {
            color: var(--primary-color);
            margin-bottom: 1.2rem;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .cs-plan-card h3 i {
            margin-right: 12px;
            font-size: 1.5rem;
        }
        
        .cs-plan-card ul {
            margin-left: 1.2rem;
            margin-bottom: 1.2rem;
        }
        
        .cs-plan-card li {
            margin-bottom: 0.7rem;
            line-height: 1.6;
        }
        
        /* Info Cards */
        .cs-seo-content {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            margin: 2rem auto;
            box-shadow: var(--box-shadow);
            max-width: 1200px;
        }
        
        .cs-highlight-box {
            background: var(--primary-light);
            border-left: 4px solid var(--primary-color);
            padding: 1.5rem;
            margin: 1.5rem 0;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
        }
        
        .cs-info-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin: 1.5rem 0;
            box-shadow: var(--box-shadow);
            border-left: 4px solid var(--primary-color);
        }
        
        .cs-info-card h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            font-size: 1.3rem;
        }
        
        .cs-info-card h3 i {
            margin-right: 12px;
            font-size: 1.4rem;
        }
        
        /* Empty State */
        .cs-empty-state {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            margin: 2rem auto;
            box-shadow: var(--box-shadow);
            max-width: 600px;
            text-align: center;
        }
        
        .cs-empty-state i {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .cs-grid-list {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .cs-test-series-container {
                padding: 15px;
                font-size: 1em;
            }
            
            .cs-header-section h1 {
                font-size: 2rem;
            }
            
            .cs-featured-banner {
                padding: 1.5rem;
            }
            
            .cs-seo-content {
                padding: 1.5rem;
            }
            
            .cs-plan-card,
            .cs-info-card {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .cs-grid-list {
                grid-template-columns: 1fr;
            }
            
            .cs-header-section h1 {
                font-size: 1.8rem;
            }
            
            .cs-blink-button {
                padding: 0.9rem 1.8rem;
                font-size: 1rem;
            }
        }
        
        /* Animation Classes */
        .cs-fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }
        
        .cs-fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Top Margin for Fixed Header */
        .tp-mg {
            margin: 70px 0;
        }
        
        @media (min-width: 768px) {
            .tp-mg {
                margin: 100px 0;
            }
        }
    </style>

    <div class="tp-mg"></div>
    <div class="cs-test-series-container">
        <!-- Header Section -->
        <div class="cs-header-section cs-fade-in">
            <h1><span><?=!empty($levelInfo) ? $levelInfo->level_name : 'CS Test Series' ?></span> Plans</h1>
            <p>Comprehensive test papers designed by experts to help you ace your CSEET, CS Executive and CS Professional exams</p>
        </div>

        <!-- Featured Banner with Blinking Button -->
        <div class="cs-featured-banner cs-fade-in">
            <h2><i class="fas fa-bolt"></i> LIMITED TIME OFFER</h2>
            <a href="https://mycsmtp.com/cs-test-series.html" class="cs-blink-button">
                <i class="fas fa-gift"></i> Grab This Exclusive Offer
            </a>
        </div>

        <!-- Type Cards Section -->
        <div class="cs-type-container">
            <?php if(!empty($fetchedTypes)): ?>
                <ul class="cs-grid-list">
                    <?php 
                    $count = 0;
                    foreach ($fetchedTypes as $type): 
                        if ((empty($type['expiry_date'])) || (!empty($type['expiry_date']) && ($type['expiry_date'] > date('Y-m-d H:i:s')))):
                            $count++;
                    ?>
                        <li class="cs-fade-in">
                            <div class="cs-category-card">
                                <div class="cs-card-header">
                                    <?php if(!empty($type['batch_info'])): ?>
                                        <div class="cs-batch-badge">
                                            <?= $type['batch_info'] ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="cs-card-title">
                                        <?= $type['type_name'] ?>
                                    </div>
                                    <div class="cs-level-text">
                                        <i class="fas fa-layer-group"></i><?=$type['level_name']?>
                                    </div>
                                </div>
                                <div class="cs-more-details">
                                    <?=$type['type_more_details']?>
                                </div>
                                <div class="cs-card-buttons">
                                    <a href="javascript:void(0)" class="cs-card-button typeBtn" data-type-id="<?=$type['type_id']?>">
                                        <i class="fas fa-book-open"></i> View Test Series
                                    </a>
                                    <?php if(!empty($type['schedule_file'])): ?>
                                    <a class="cs-card-button cs-schedule-button scheduledBtn" href="<?=base_url().$type['schedule_file']?>" target="_blank">
                                        <i class="fas fa-file-pdf"></i> Download Schedule
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </ul>
                
                <?php if($count === 0): ?>
                    <div class="cs-empty-state">
                        <i class="fas fa-info-circle"></i>
                        <h3>No CS Test Series Available</h3>
                        <p>Currently there are no test series available. Please check back later for updates.</p>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="cs-empty-state">
                    <i class="fas fa-info-circle"></i>
                    <h3>No CS Test Series Available</h3>
                    <p>Currently there are no test series available. Please check back later for updates.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- CS Test Series Plans Section -->
        <div class="cs-plans-container cs-fade-in">
            <h2><i class="fas fa-clipboard-list"></i> Our CS Test Series Plans</h2>
            
            <div class="cs-plan-card">
                <h3><i class="fas fa-cubes"></i> Chapterwise CS Test Series Plan</h3>
                <p>This CS Executive test series plan is perfect for students who want to master each unit of the syllabus systematically. The chapterwise approach ensures thorough understanding before moving to full syllabus tests.</p>
                <ul>
                    <li>One Subject is divided into 8 Parts (Units), with each unit having its dedicated test</li>
                    <li>Each subject is divided into 8 parts with 1 test for each part</li>
                    <li>Allows you to cover syllabus in more detail</li>
                    <li>Includes 2 full syllabus tests of 100 Marks to evaluate your grasp of the entire course</li>
                    <li>Ideal for CS Executive students who want Detailed preparation</li>
                </ul>
            </div>
            
            <div class="cs-plan-card">
                <h3><i class="fas fa-search-plus"></i> Detailed CS Test Series Plan</h3>
                <p>This CS Professional test series plan offers a balanced approach between unit-wise testing and full syllabus evaluation, perfect for students who want deeper understanding of larger Syllabus.</p>
                <ul>
                    <li>The subject is divided into 4 units, with each unit having its dedicated test</li>
                    <li>Enables you to delve deeply into the understanding of each larger unit</li>
                    <li>Includes 1 full syllabus test to assess your comprehension of the entire course</li>
                    <li>Perfect for CS students who want comprehensive preparation</li>
                    <li>Helps identify strong and weak areas in larger sections of the syllabus</li>
                </ul>
            </div>
            
            <div class="cs-plan-card">
                <h3><i class="fas fa-globe"></i> Full Syllabus CS Test Series Plan</h3>
                <p>This comprehensive CS test series plan is designed for students who want to focus time management and overall Improvements and overall performance evaluation.</p>
                <ul>
                    <li>Offers access to full syllabus tests</li>
                    <li>These assessments comprehensively cover the entire syllabus</li>
                    <li>Provides a thorough examination of your knowledge and preparedness</li>
                    <li>Best for final revision before CS Executive or CS Professional exams</li>
                    <li>Helps build exam temperament and time management skills</li>
                </ul>
            </div>
        </div>

        <!-- SEO Optimized Content Section -->
        <div class="cs-seo-content cs-fade-in">
            <h2><i class="fas fa-star"></i> Why Choose Our CS Test Series?</h2>
            
            <p>Preparing for the Company Secretary (CS) exams requires a strategic approach, comprehensive study material, and rigorous practice. Our <strong>CS Test Series</strong> is meticulously designed to provide you with everything you need to excel in your CS Executive and CS Professional examinations conducted by the ICSI (Institute of Company Secretaries of India).</p>
            
            <div class="cs-highlight-box">
                <h4><i class="fas fa-lightbulb"></i> Key Features of Our CS Test Series:</h4>
                <ul>
                    <li><strong>Comprehensive Coverage:</strong> Our CS test series covers the entire syllabus as prescribed by ICSI with detailed module-wise tests for both CS Executive and CS Professional levels</li>
                    <li><strong>Chapter-wise Tests:</strong> Detailed tests for each chapter to ensure thorough understanding of concepts in the CS syllabus</li>
                    <li><strong>Full-Length Mock Exams:</strong> Simulates the actual CS exam environment with same pattern and difficulty level</li>
                    <li><strong>Expert Evaluation:</strong> Detailed feedback from CS professionals and examiners with personalized suggestions</li>
                    <li><strong>Performance Analytics:</strong> Track your progress with detailed reports to improve your CS exam preparation</li>
                </ul>
            </div>
            
            <h3><i class="fas fa-chart-line"></i> How Our CS Test Series Helps You Succeed</h3>
            
            <p>Our CS test series follows a <strong>proven methodology</strong> that has helped hundreds of students clear their CS exams with high marks. Whether you're preparing for CS Executive or CS Professional exams, our test series provides the perfect practice platform.</p>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-book-open"></i> Syllabus Mastery</h3>
                <p>Each test in our CS test series is carefully structured to cover specific portions of the syllabus, ensuring you don't miss any important topics. The questions are designed by experts who understand the ICSI examination pattern, marking scheme, and frequently tested areas in CS exams.</p>
            </div>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-stopwatch"></i> Time Management</h3>
                <p>With strict time limits for each test in our CS test series, you'll learn to manage your exam time effectively—a crucial skill for scoring well in CS Executive and CS Professional exams where time pressure is often the biggest challenge.</p>
            </div>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-chart-pie"></i> Performance Tracking</h3>
                <p>Our detailed analytics dashboard helps you identify your strong and weak areas in the CS syllabus, allowing you to focus your preparation where it's needed most. Track your improvement over time with comparative reports and personalized recommendations.</p>
            </div>
            
            <div class="text-center">
                <a href="https://mycsmtp.com/register" class="cs-blink-button">
                    <i class="fas fa-shopping-cart"></i> Signup to grab an exclusive discount
                </a>
            </div>
        </div>

        <!-- 7-Step Success Guide -->
        <div class="cs-seo-content cs-fade-in">
            <h2><i class="fas fa-trophy"></i> 7-Step Success Formula for CS Exams</h2>
            
            <p>Follow this proven strategy to maximize your chances of success in CS Executive and CS Professional examinations:</p>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-check-circle"></i> 1. Comprehensive Understanding</h3>
                <p>Begin with a thorough study of the ICSI syllabus for your CS level. Our CS test series complements this by providing targeted practice for each module with detailed explanations that match the ICSI standards.</p>
            </div>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-sync-alt"></i> 2. Systematic Revision</h3>
                <p>Revision is the key to retention in CS exams. Use our chapter-wise tests from the CS test series to revise concepts regularly. Our systematic approach ensures you cover all important areas of the CS syllabus.</p>
            </div>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-search"></i> 3. Concept Evaluation</h3>
                <p>After completing each chapter, assess your understanding with our specialized question banks in the CS test series. These help you identify areas needing more focus in your CS exam preparation.</p>
            </div>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-pen-fancy"></i> 4. Writing Practice</h3>
                <p>CS exams demand excellent writing skills. Our CS test series provides ample opportunities to practice answer writing with model answers and expert evaluation to help you improve presentation and content.</p>
            </div>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-history"></i> 5. Past Paper Analysis</h3>
                <p>Practice with previous years' papers to understand question patterns in CS exams. Our test series includes curated questions from past papers with updated solutions and examiner's comments.</p>
            </div>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-calendar-check"></i> 6. Consistent Practice</h3>
                <p>Break the vast CS syllabus into manageable units with our scheduled tests. Regular practice with our CS test series maintains momentum and prevents last-minute stress before your exams.</p>
            </div>
            
            <div class="cs-info-card">
                <h3><i class="fas fa-chart-pie"></i> 7. Performance Improvement</h3>
                <p>After each test in our CS test series, analyze your mistakes and work on weak areas. The detailed feedback helps you refine your exam strategy for both CS Executive and CS Professional levels.</p>
            </div>
            
            <div class="cs-highlight-box">
                <h4><i class="fas fa-lightbulb"></i> Pro Tip from CS Toppers:</h4>
                <p>Combine our CS test series with the ICSI study material for best results. The ideal strategy is to study a topic from ICSI material, then immediately test your understanding with our chapter-wise tests. This active recall method significantly improves retention for CS exams. Many rank holders have used this approach with our CS Executive and CS Professional test series to achieve success.</p>
            </div>
            
            <div class="text-center">
                <a href="<?= base_url('cs-test-series.html') ?>" class="cs-blink-button">
                    <i class="fas fa-gem"></i> Get Access to All CS Test Series Now
                </a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('jsContent')?>
<script type="text/javascript">
    var pageType = 'type_list';
    
    // Add animation on scroll
    document.addEventListener('DOMContentLoaded', function() {
        // Observe elements for scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });
        
        // Animate all fade-in elements
        document.querySelectorAll('.cs-fade-in').forEach(el => {
            observer.observe(el);
        });
        
        // Enhanced blinking button effect
        const blinkButtons = document.querySelectorAll('.cs-blink-button');
        if (blinkButtons) {
            blinkButtons.forEach(button => {
                setInterval(() => {
                    button.style.transform = 'scale(1.03)';
                    button.style.boxShadow = '0 0 0 10px rgba(255, 71, 87, 0.3)';
                    setTimeout(() => {
                        button.style.transform = 'scale(1)';
                        button.style.boxShadow = '0 5px 25px rgba(255, 71, 87, 0.6)';
                    }, 300);
                }, 1200);
            });
        }
    });
</script>
<script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.2"></script>
<?= $this->endSection() ?>
