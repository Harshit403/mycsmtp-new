<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    CS Test Series | Best Company Secretary Exam Preparation
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container-fluid px-0">
        <!-- Hero Section -->
        <div id="image-slider" class="position-relative overflow-hidden" style="height: 500px;">
            <div class="slider-overlay"></div>
            <img src="<?=base_url()?>images/s1.png" alt="CS Executive Test Series" class="w-100 h-100 object-fit-cover">
            <img src="<?=base_url()?>images/s2.png" alt="CS Professional Test Series" class="w-100 h-100 object-fit-cover">
            <img src="<?=base_url()?>images/s3.png" alt="CS Foundation Test Series" class="w-100 h-100 object-fit-cover">
            
            <div class="container position-absolute top-50 start-50 translate-middle text-center text-white">
                <h1 class="display-4 fw-bold mb-4">CS Test Series - Your Path to Success</h1>
                <p class="lead">Comprehensive evaluation system designed by experts to help you ace your Company Secretary exams</p>
                <a href="#plans" class="btn btn-lg rounded-pill mt-3" style="background-color: #1ab79c; color: white;">Explore Plans</a>
            </div>
        </div>

        <!-- Why Choose Us Section -->
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #1ab79c;">Why Our CS Test Series Stands Out</h2>
                    <p class="lead">With high success rate among regular test-takers, our evaluation system has helped thousands of students clear CS exams with flying colors.</p>
                    
                    <div class="row mt-4 g-4">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3" style="color: #1ab79c;">
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="h5">Expert Evaluation</h4>
                                    <p>Assessed by Experienced professionals </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3" style="color: #1ab79c;">
                                    <i class="fas fa-clock fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="h5">Timely Feedback</h4>
                                    <p>Detailed evaluation within 72 working hours of submission</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3" style="color: #1ab79c;">
                                    <i class="fas fa-book fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="h5">Updated Content</h4>
                                    <p>Aligned with latest ICSI syllabus and amendments</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3" style="color: #1ab79c;">
                                    <i class="fas fa-chart-line fa-2x"></i>
                                </div>
                                <div>
                                    <h4 class="h5">Performance Analytics</h4>
                                    <p>Detailed progress reports with comparative analysis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?=base_url()?>images/cs-test-series.jpg" alt="CS Test Series Benefits" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>

        <!-- CS Test Series Detailed Content -->
        <div class="bg-light py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <article>
                            <h2 class="display-5 fw-bold mb-4 text-center" style="color: #1ab79c;">Comprehensive CS Test Series for All Levels</h2>
                            
                            <h3 class="h4 mt-5 mb-3">Understanding the Importance of Test Series in CS Preparation</h3>
                            <p>The Company Secretary (CS) examination conducted by the Institute of Company Secretaries of India (ICSI) is one of the most challenging professional courses in India. Our CS Test Series is specifically designed to bridge the gap between theoretical knowledge and examination performance. Research shows that students who regularly attempt test series improve their scores by an average of 22% compared to those who don't.</p>
                            
                            <h3 class="h4 mt-5 mb-3">Features of Our CS Test Series Program</h3>
                            <p>Our comprehensive evaluation system offers:</p>
                            <ul class="mb-4">
                                <li><strong>Strictly Time-Bound Tests:</strong> Simulating actual exam conditions with the same time constraints</li>
                                <li><strong>Chapterwise Coverage:</strong> Detailed tests for each module as per ICSI syllabus</li>
                                <li><strong>Model Answer Sheets:</strong> Providing ideal answers for comparison</li>
                                <li><strong>Mistake Analysis:</strong> Highlighting recurring errors and improvement areas</li>
                                <li><strong>Ranking System:</strong> Comparative performance with peers nationwide</li>
                            </ul>
                            
                            <div class="row g-4 my-4">
                                <div class="col-md-6">
                                    <div class="p-4 bg-white rounded-3 shadow-sm h-100">
                                        <h4 class="h5 mb-3" style="color: #1ab79c;">CS Foundation Test Series</h4>
                                        <p>Designed for students beginning their CS journey, our Foundation test series focuses on building strong fundamentals in Business Environment, Business Management, Ethics, and Communication. The test pattern includes:</p>
                                        <ul>
                                            <li>15 chapterwise tests</li>
                                            <li>1 full-Syllabus mock tests</li>
                                            <li>Special focus on MCQ solving techniques</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-4 bg-white rounded-3 shadow-sm h-100">
                                        <h4 class="h5 mb-3" style="color: #1ab79c;">CS Executive Test Series</h4>
                                        <p>For Executive Programme students, we offer specialized tests covering all modules with emphasis on:</p>
                                        <ul>
                                            <li>Case-study based questions</li>
                                            <li>Inter-module connections</li>
                                            <li>Practical application of concepts</li>
                                            <li>8 module-wise tests and 3 comprehensive mocks</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <h3 class="h4 mt-5 mb-3">CS Professional Test Series - Your Final Preparation Tool</h3>
                            <p>Our Professional level test series is crafted by former ICSI examiners to give you the exact feel of the final examination. Key features include:</p>
                            <ul>
                                <li><strong>Advanced Case Studies:</strong> Complex scenarios mirroring actual boardroom situations</li>
                                <li><strong>Drafting Practice:</strong> Special exercises for drafting skills evaluation</li>
                                <li><strong>Time Management:</strong> Strategies to complete papers within strict timelines</li>
                                <li><strong>12 specialized tests covering all modules</strong></li>
                            </ul>
                            
                            <div class="alert alert-info mt-4">
                                <h4 class="alert-heading">Proven Success Strategy</h4>
                                <p>Our data shows that students who complete at 100% of our test series have a 3.2 times higher chance of clearing CS exams in their first attempt compared to national averages.</p>
                            </div>
                            
                            <h3 class="h4 mt-5 mb-3">How Our Evaluation Process Works</h3>
                            <p>Unlike generic test series, we provide a 4-layer evaluation system:</p>
                            <ol>
                                <li><strong>Content Accuracy:</strong> Verification of legal provisions and concepts</li>
                                <li><strong>Presentation Analysis:</strong> Evaluation of answer structuring and formatting</li>
                                <li><strong>Application Scoring:</strong> Assessment of practical application knowledge</li>
                                <li><strong>Comparative Benchmarking:</strong> Ranking against toppers' answer patterns</li>
                            </ol>
                            
                            <h3 class="h4 mt-5 mb-3" id="plans">Choosing the Right Test Series Plan</h3>
                            <p>We offer flexible plans to suit different preparation needs and budgets:</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Series Plans -->
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg h-100 hover-scale transition-all">
                        <div class="card-header bg-white border-0 py-4">
                            <h3 class="h3 text-center mb-0" style="color: #1ab79c;">Chapterwise Test Series</h3>
                            <div class="text-center mt-3">
                                <span class="badge bg-success">Most Popular</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <span class="display-4 fw-bold" style="color: #1ab79c;">₹549</span>
                                <span class="text-muted">/series</span>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>8 unit-wise tests with detailed solutions</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>2 full syllabus mock tests</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Priority evaluation (48 working hrs turnaround)</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Access to toppers' answer sheets</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 py-3">
                            <a href="https://mycsmtp.com/cstestseries.html" class="btn w-100 py-3 rounded-pill fw-bold" style="background-color: #1ab79c; color: white;">Enroll Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg h-100 hover-scale transition-all">
                        <div class="card-header bg-white border-0 py-4">
                            <h3 class="h3 text-center mb-0" style="color: #1ab79c;">Detailed Test Series</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <span class="display-4 fw-bold" style="color: #1ab79c;">₹349</span>
                                <span class="text-muted">/series</span>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>4 comprehensive module tests</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>1 full syllabus mock test</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Standard evaluation (72 working hrs)</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Performance analytics dashboard</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 py-3">
                            <a href="https://mycsmtp.com/cstestseries.html" class="btn w-100 py-3 rounded-pill fw-bold" style="background-color: #1ab79c; color: white;">Enroll Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg h-100 hover-scale transition-all">
                        <div class="card-header bg-white border-0 py-4">
                            <h3 class="h3 text-center mb-0" style="color: #1ab79c;">Full Syllabus Test Series</h3>
                            <div class="text-center mt-3">
                                <span class="badge bg-warning text-dark">Best Value</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <span class="display-4 fw-bold" style="color: #1ab79c;">₹199</span>
                                <span class="text-muted">/series</span>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>5 full syllabus mock tests</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Detailed video solutions</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Personalized mentor feedback</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Doubt resolution sessions</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 py-3">
                            <a href="https://mycsmtp.com/cstestseries.html" class="btn w-100 py-3 rounded-pill fw-bold" style="background-color: #1ab79c; color: white;">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="container py-5">
            <h2 class="display-5 fw-bold mb-5 text-center" style="color: #1ab79c;">Frequently Asked Questions</h2>
            
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h3 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            How does the CS test series help in exam preparation?
                        </button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Our CS test series helps in multiple ways: it familiarizes you with the exam pattern, improves time management skills, identifies weak areas, provides benchmark against toppers, and builds exam temperament. Regular practice with our evaluated tests can improve your score by 20-25%.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h3 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Are the test questions similar to actual ICSI exams?
                        </button>
                    </h3>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, our test papers are crafted by Experts and follow the exact pattern, difficulty level, and marking scheme of actual exams. We analyze previous 5 years' papers to ensure our questions cover all important topics and recent amendments.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h3 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            How soon will I receive my evaluated answer sheets?
                        </button>
                    </h3>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            For Chapterwise and Full Syllabus plans, evaluations are completed within 48 working hours. For Detailed Test Series, the turnaround time is 72 working hours. We provide detailed remarks, corrections, and suggestions for improvement with each evaluation.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-dark text-white py-5">
            <div class="container text-center">
                <h2 class="display-5 fw-bold mb-4">Ready to Boost Your CS Exam Performance?</h2>
                <p class="lead mb-5">Join thousands of successful CS students who aced their exams with our proven test series</p>
                <a href="https://mycsmtp.com/register" class="btn btn-lg rounded-pill px-5 py-3 fw-bold" style="background-color: #1ab79c; color: white;">Start Your Test Series Today</a>
            </div>
        </div>
    </section>

    <style>
        /* Custom Styles */
        .slider-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        
        #image-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        
        #image-slider img:first-child {
            opacity: 1;
        }
        
        .hover-scale {
            transition: transform 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: translateY(-10px);
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        .accordion-button:not(.collapsed) {
            background-color: rgba(26, 183, 156, 0.1);
            color: #1ab79c;
        }
        
        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(26, 183, 156, 0.25);
        }
        
        @media (max-width: 768px) {
            #image-slider {
                height: 400px;
            }
            
            .display-4 {
                font-size: 2.5rem;
            }
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('jsContent') ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentImageIndex = 0;
            const images = document.querySelectorAll("#image-slider img");
            const totalImages = images.length;

            function showNextImage() {
                images[currentImageIndex].style.opacity = 0;
                currentImageIndex = (currentImageIndex + 1) % totalImages;
                images[currentImageIndex].style.opacity = 1;
            }

            // Set interval for auto slide (every 5 seconds)
            setInterval(showNextImage, 5000);
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
<?= $this->endSection() ?>
