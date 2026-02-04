<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Disclaimer
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main role="main">
    <!-- Hero Section -->
    <section class="position-relative overflow-hidden">
        <div class="py-5" style="background: linear-gradient(135deg, #dc3545 0%, #b02a37 50%, #8b2635 100%);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center text-white py-4">
                        <div class="mb-3">
                            <i class="fas fa-exclamation-triangle fa-3x"></i>
                        </div>
                        <h1 class="display-4 fw-bold mb-3">Disclaimer</h1>
                        <p class="lead mb-0">Important information about our test series and educational resources</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    
                    <!-- Introduction Card -->
                    <div class="card border-0 shadow-lg mb-5" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0">
                                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-info-circle text-white fs-3"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="h4 fw-bold mb-0 text-danger">Important Notice</h3>
                                    <p class="text-muted mb-0">Please read this disclaimer carefully before using our services</p>
                                </div>
                            </div>
                            
                            <div class="alert alert-danger" role="alert" style="border-left: 4px solid #dc3545;">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <strong>Practice Purpose Only:</strong> This test series is designed for practice purposes only. The inclusion of any specific questions in our practice papers does not imply or guarantee that identical questions will appear in the main exams.
                            </div>
                        </div>
                    </div>

                    <!-- Main Disclaimer Points -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="card border-0 shadow h-100" style="border-radius: 15px; border-top: 4px solid #dc3545;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div style="width: 45px; height: 45px; background: rgba(220, 53, 69, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-bullseye text-danger fs-4"></i>
                                        </div>
                                        <h4 class="h5 fw-bold mb-0 ms-3 text-danger">Our Aim</h4>
                                    </div>
                                    <p class="text-muted mb-0">Our aim is to provide a comprehensive set of questions to enhance your preparation for CS examinations.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-0 shadow h-100" style="border-radius: 15px; border-top: 4px solid #fd7e14;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div style="width: 45px; height: 45px; background: rgba(253, 126, 20, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-gift text-warning fs-4"></i>
                                        </div>
                                        <h4 class="h5 fw-bold mb-0 ms-3" style="color: #fd7e14;">Question Banks</h4>
                                    </div>
                                    <p class="text-muted mb-0">Our question banks contain 3-10 questions from each chapter and will be provided after the submission of all unit test series answer sheets by students.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-0 shadow h-100" style="border-radius: 15px; border-top: 4px solid #ffc107;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div style="width: 45px; height: 45px; background: rgba(255, 193, 7, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-file-alt text-warning fs-4"></i>
                                        </div>
                                        <h4 class="h5 fw-bold mb-0 ms-3" style="color: #ffc107;">Full Syllabus Papers</h4>
                                    </div>
                                    <p class="text-muted mb-0">Full syllabus question papers will be made available on our website after the institute releases the amendments for the respective attempt.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-0 shadow h-100" style="border-radius: 15px; border-top: 4px solid #6f42c1;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div style="width: 45px; height: 45px; background: rgba(111, 66, 193, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-exclamation-triangle fs-4" style="color: #6f42c1;"></i>
                                        </div>
                                        <h4 class="h5 fw-bold mb-0 ms-3" style="color: #6f42c1;">Human Errors</h4>
                                    </div>
                                    <p class="text-muted mb-0">While we take utmost care in preparing materials, human errors may occur. Our questions, answers, notes, and evaluations may contain some errors.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Digital Resources -->
                    <div class="card border-0 shadow mb-5" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #20c997 0%, #16a085 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-laptop text-white fs-4"></i>
                                </div>
                                <h3 class="h4 fw-bold mb-0 ms-3" style="color: #20c997;">Digital Resources Only</h3>
                            </div>
                            <p class="text-muted mb-0">Please note that we provide all resources in digital form (PDF format), and not in physical mode. All study materials, question banks, and notes will be accessible through your account dashboard.</p>
                        </div>
                    </div>

                    <!-- Feedback Section -->
                    <div class="card border-0 shadow mb-5" style="border-radius: 15px; background: linear-gradient(135deg, rgba(26, 183, 156, 0.05) 0%, rgba(26, 183, 156, 0.1) 100%);">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-comments text-white fs-4"></i>
                                </div>
                                <h3 class="h4 fw-bold mb-0 ms-3" style="color: #1ab79c;">Your Feedback Matters</h3>
                            </div>
                            <p class="mb-0">Your feedback and cooperation are invaluable to us in ensuring the quality and accuracy of our educational resources. We advise students to bring any discrepancies to our attention as soon as they become aware of them. Thank you for your understanding.</p>
                        </div>
                    </div>

                    <!-- Liability Disclaimer -->
                    <div class="card border-0 shadow-lg mb-5" style="border-radius: 15px; border-left: 5px solid #dc3545 !important;">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center mb-4">
                                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-gavel text-white fs-4"></i>
                                </div>
                                <h3 class="h4 fw-bold mb-0 ms-3 text-danger">Liability Disclaimer</h3>
                            </div>
                            
                            <div class="alert alert-danger" role="alert">
                                <p class="mb-0">We disclaim any liability for any loss or damage, whether direct, indirect, incidental, special, or consequential, arising out of or in connection with the use of this website or any information, products, services, or materials provided herein. This includes but is not limited to loss of data, revenue, or profits.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pass Percentage Notice -->
                    <div class="card border-0 shadow mb-5" style="border-radius: 15px; border-left: 5px solid #ffc107 !important;">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center mb-4">
                                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-chart-line text-white fs-4"></i>
                                </div>
                                <h3 class="h4 fw-bold mb-0 ms-3" style="color: #ffc107;">Pass Percentage Disclaimer</h3>
                            </div>
                            
                            <div class="alert alert-warning" role="alert">
                                <i class="fas fa-info-circle me-2"></i>
                                The pass percentage shown in our advertisements is based on students who followed our chapterwise plan, participated consistently in our scheduled test series, and adhered to our study schedule. <strong>Results may vary depending on individual commitment and preparation.</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="text-center mt-5">
                        <h4 class="h5 fw-bold mb-3">Questions or Concerns?</h4>
                        <p class="text-muted mb-4">If you have any questions about this disclaimer, please contact us.</p>
                        <a href="mailto:support@mycsmtp.com" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); border: none;">
                            <i class="fas fa-envelope me-2"></i>Contact Support
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

<style>
    /* Smooth Scroll */
    html {
        scroll-behavior: smooth;
    }
    
    /* Card Hover Effects */
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    /* Alert Styles */
    .alert {
        border-radius: 10px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }
        
        .card-body {
            padding: 1.5rem !important;
        }
    }
    
    /* Focus Styles */
    a:focus-visible,
    button:focus-visible {
        outline: 3px solid #dc3545;
        outline-offset: 2px;
    }
</style>

<?= $this->endSection() ?>
