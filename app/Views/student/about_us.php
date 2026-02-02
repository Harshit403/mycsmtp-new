<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    About Us | MY CS MTP - Premier CS Test Series Provider
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<section class="container-fluid px-0">
    <!-- Hero Banner -->
    <div class="position-relative overflow-hidden" style="height: 400px; background: linear-gradient(rgba(26, 183, 156, 0.8), rgba(26, 183, 156, 0.6)), url('<?= base_url() ?>images/cs-about-banner.jpg') center/cover;">
        <div class="container h-100 d-flex align-items-center">
            <div class="text-center text-white w-100">
                <h1 class="display-4 fw-bold mb-4">About MY CS MTP</h1>
                <p class="lead mb-5">Empowering CS aspirants with excellence since 2021</p>
            </div>
        </div>
    </div>

    <!-- Our Story -->
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4" style="color: #1ab79c;">Our Journey</h2>
                <p class="lead">From humble beginnings to becoming a trusted name in CS education</p>
                <p>Founded in 2021 , MY CS MTP began with a vision to create the most effective test series for Company Secretary aspirants. We've since helped over 15,000 students in their CS exams with confidence.</p>
                <p>Recognizing the gap between theoretical knowledge and exam performance, we developed our unique evaluation methodology that has become our hallmark in CS education.</p>
            </div>
            <div class="col-lg-6">
                <img src="<?= base_url() ?>images/cs-growth.jpg" alt="CS Exam Growth" class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>

    <!-- Mission & Values -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100 p-4">
                        <div class="text-center mb-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-bullseye"></i>
                            </div>
                        </div>
                        <h3 class="h4 text-center mb-3" style="color: #1ab79c;">Our Mission</h3>
                        <p class="text-center">To revolutionize CS exam preparation through innovative, exam-focused test series that bridge the gap between learning and performance.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100 p-4">
                        <div class="text-center mb-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                        <h3 class="h4 text-center mb-3" style="color: #1ab79c;">Our Vision</h3>
                        <p class="text-center">To be the most trusted CS test series provider, recognized for transforming students into top performers through strategic preparation.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100 p-4">
                        <div class="text-center mb-4">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                        <h3 class="h4 text-center mb-3" style="color: #1ab79c;">Our Values</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2 d-flex">
                                <i class="fas fa-check me-2 mt-1" style="color: #1ab79c;"></i>
                                <span>Student-first approach</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="fas fa-check me-2 mt-1" style="color: #1ab79c;"></i>
                                <span>Academic excellence</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="fas fa-check me-2 mt-1" style="color: #1ab79c;"></i>
                                <span>Continuous innovation</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Methodology -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="color: #1ab79c;">Our Proven Methodology</h2>
            <p class="lead">The 4-step process that ensures exam success</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="step-number mb-3 mx-auto">1</div>
                    <h3 class="h4 mb-3" style="color: #1ab79c;">Diagnostic Assessment</h3>
                    <p>Identify your current preparation level and knowledge gaps through our initial evaluation tests.</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="step-number mb-3 mx-auto">2</div>
                    <h3 class="h4 mb-3" style="color: #1ab79c;">Targeted Practice</h3>
                    <p>Focus on weak areas with customized test series while reinforcing strengths through timed practice.</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="step-number mb-3 mx-auto">3</div>
                    <h3 class="h4 mb-3" style="color: #1ab79c;">Expert Evaluation</h3>
                    <p>Receive detailed feedback on content accuracy, presentation, and application skills.</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="step-number mb-3 mx-auto">4</div>
                    <h3 class="h4 mb-3" style="color: #1ab79c;">Performance Optimization</h3>
                    <p>Implement improvement strategies based on analytics to maximize your final exam score.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Metrics -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #1ab79c;">Our Impact</h2>
                <p class="lead">Transforming CS exam preparation</p>
            </div>
            
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="display-3 fw-bold" style="color: #1ab79c;">15,000+</div>
                    <p class="lead">Students Empowered</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="display-3 fw-bold" style="color: #1ab79c;">78%</div>
                    <p class="lead">Improvement Rate</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="display-3 fw-bold" style="color: #1ab79c;">22%</div>
                    <p class="lead">Average Score Improvement</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-5" style="background-color: #1ab79c;">
        <div class="container text-center text-white">
            <h2 class="display-5 fw-bold mb-4">Begin Your CS Success Journey</h2>
            <p class="lead mb-5">Join thousands who've cleared exams with our proven test series</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="https://mycsmtp.com//level/cs-test-series" class="btn btn-light btn-lg rounded-pill px-4 py-2 fw-bold" style="color: #1ab79c;">View Plans</a>
                <a href="https://mycsmtp.com/sign-in" class="btn btn-outline-light btn-lg rounded-pill px-4 py-2 fw-bold">Get Guidance</a>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom Styles */
    .feature-icon {
        width: 60px;
        height: 60px;
        background-color: rgba(26, 183, 156, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1ab79c;
        font-size: 1.5rem;
    }
    
    .step-number {
        width: 50px;
        height: 50px;
        background-color: #1ab79c;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
    }
    
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    @media (max-width: 768px) {
        .display-5 {
            font-size: 2.5rem;
        }
    }
</style>

<?= $this->endSection() ?>
<?= $this->section('jsContent') ?>
<?= $this->endSection() ?>
