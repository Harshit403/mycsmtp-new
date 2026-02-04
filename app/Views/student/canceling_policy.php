<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Refund & Cancellation Policy
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
                            <i class="fas fa-undo-alt fa-3x"></i>
                        </div>
                        <h1 class="display-4 fw-bold mb-3">Refund & Cancellation Policy</h1>
                        <p class="lead mb-0">Please read our policy carefully before making any purchase</p>
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
                    
                    <!-- Main Policy Card -->
                    <div class="card border-0 shadow-lg mb-5" style="border-radius: 15px; border-left: 5px solid #dc3545 !important;">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0">
                                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-exclamation-circle text-white fs-3"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="h4 fw-bold mb-0 text-danger">No Refund Policy</h3>
                                    <p class="text-muted mb-0">All sales are final</p>
                                </div>
                            </div>
                            
                            <div class="alert alert-danger" role="alert" style="border-left: 4px solid #dc3545;">
                                <i class="fas fa-ban me-2"></i>
                                <strong>Important:</strong> Thank you for being a part of MY CS MTP. We do not issue refunds for any product or service once the order is confirmed and delivered/availed and the payment is made.
                            </div>
                            
                            <p class="mb-0">We recommend contacting us for assistance if you experience any issues receiving any services or products.</p>
                        </div>
                    </div>

                    <!-- Policy Details -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-4">
                            <div class="card border-0 shadow h-100" style="border-radius: 15px; border-top: 4px solid #dc3545;">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <div style="width: 60px; height: 60px; background: rgba(220, 53, 69, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                            <i class="fas fa-file-alt text-danger fs-3"></i>
                                        </div>
                                    </div>
                                    <h4 class="h5 fw-bold mb-2 text-danger">Digital Products</h4>
                                    <p class="text-muted small mb-0">All sales of digital products (test series, PDFs, study materials) are final. No refunds once download access is provided.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-0 shadow h-100" style="border-radius: 15px; border-top: 4px solid #fd7e14;">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <div style="width: 60px; height: 60px; background: rgba(253, 126, 20, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                            <i class="fas fa-chalkboard-teacher text-warning fs-3"></i>
                                        </div>
                                    </div>
                                    <h4 class="h5 fw-bold mb-2" style="color: #fd7e14;">Services</h4>
                                    <p class="text-muted small mb-0">No refunds for any services (mentorship, evaluation, guidance) purchased through our website under any circumstances.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-0 shadow h-100" style="border-radius: 15px; border-top: 4px solid #6f42c1;">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <div style="width: 60px; height: 60px; background: rgba(111, 66, 193, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                            <i class="fas fa-paint-brush fs-3" style="color: #6f42c1;"></i>
                                        </div>
                                    </div>
                                    <h4 class="h5 fw-bold mb-2" style="color: #6f42c1;">Custom Orders</h4>
                                    <p class="text-muted small mb-0">Custom and personalized orders cannot be canceled or refunded after order confirmation due to their unique nature.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Need Help Section -->
                    <div class="card border-0 shadow" style="border-radius: 15px; background: linear-gradient(135deg, rgba(26, 183, 156, 0.05) 0%, rgba(26, 183, 156, 0.1) 100%);">
                        <div class="card-body p-4 p-md-5 text-center">
                            <div class="mb-3">
                                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-headset text-white fs-3"></i>
                                </div>
                            </div>
                            <h3 class="h4 fw-bold mb-3" style="color: #1ab79c;">Need Help?</h3>
                            <p class="text-muted mb-4">If you experience any issues with our services or products, please don't hesitate to contact us. We're here to help!</p>
                            <a href="mailto:support@mycsmtp.com" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 100%); border: none;">
                                <i class="fas fa-envelope me-2"></i>Contact Support
                            </a>
                        </div>
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
