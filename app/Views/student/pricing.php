<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Pricing | CS Test Series Plans & Packages
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <section class="container-fluid px-0">
        <!-- Hero Banner -->
        <div class="position-relative overflow-hidden" style="height: 400px; background: linear-gradient(rgba(26, 183, 156, 0.8), rgba(26, 183, 156, 0.6)), url('<?= base_url() ?>images/cs-banner.jpg') center/cover;">
            <div class="container h-100 d-flex align-items-center">
                <div class="text-center text-white w-100">
                    <h1 class="display-4 fw-bold mb-4">CS Test Series Pricing Plans</h1>
                    <p class="lead mb-5">Affordable, high-quality evaluation packages tailored for every stage of your CS journey</p>
                    <a href="#plans" class="btn btn-light btn-lg rounded-pill px-4 py-2" style="color: #1ab79c;">View Plans</a>
                </div>
            </div>
        </div>

        <!-- Pricing Plans -->
        <div class="container py-5" id="plans">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #1ab79c;">Choose Your Perfect Plan</h2>
                <p class="lead">Flexible options for every preparation need and budget</p>
            </div>

            <div class="row g-4">
                <!-- Chapterwise Plan -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg h-100 hover-scale">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <h3 class="h2 mb-0">Chapterwise</h3>
                            <div class="mt-3">
                                <span class="badge bg-light text-primary">Most Comprehensive</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center my-4">
                                <span class="display-3 fw-bold" style="color: #1ab79c;">₹499</span>
                                <span class="text-muted">/module</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Detailed unit-wise coverage</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>8-10 chapterwise tests</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>2 full mock exams</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Priority evaluation</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 pb-4">
                            <div class="d-grid gap-2">
                                <a href="https://mycsmtp.com/cstestseries.html" class="btn btn-primary py-3 rounded-pill fw-bold">CS Executive</a>
                                <a href="https://mycsmtp.com/cstestseries.html" class="btn btn-primary py-3 rounded-pill fw-bold">CS Professional</a>
                                <a href="https://mycsmtp.com/cstestseries.html
                                    " class="btn btn-primary py-3 rounded-pill fw-bold">CSEET</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Plan -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg h-100 hover-scale">
                        <div class="card-header text-white text-center py-4" style="background-color: #1ab79c;">
                            <h3 class="h2 mb-0">Detailed</h3>
                            <div class="mt-3">
                                <span class="badge bg-light" style="color: #1ab79c;">Best Value</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center my-4">
                                <span class="display-3 fw-bold" style="color: #1ab79c;">₹299</span>
                                <span class="text-muted">/module</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>4-5 module tests</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>1 full mock exam</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Standard evaluation</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Performance analytics</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 pb-4">
                            <div class="d-grid gap-2">
                                <a href="https://mycsmtp.com/level/type/5" class="btn py-3 rounded-pill fw-bold" style="background-color: #1ab79c; color: white;">CS Executive</a>
                                <a href="https://mycsmtp.com/level/type/4" class="btn py-3 rounded-pill fw-bold" style="background-color: #1ab79c; color: white;">CS Professional</a>
                                <a href="#" class="btn py-3 rounded-pill fw-bold" style="background-color: #1ab79c; color: white;">CSEET</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full Syllabus Plan -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg h-100 hover-scale">
                        <div class="card-header bg-dark text-white text-center py-4">
                            <h3 class="h2 mb-0">Full Syllabus</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center my-4">
                                <span class="display-3 fw-bold" style="color: #1ab79c;">₹119</span>
                                <span class="text-muted">/module</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>2 full syllabus tests</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Comprehensive coverage</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Basic evaluation</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-check-circle me-2 mt-1" style="color: #1ab79c;"></i>
                                    <span>Score report</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 pb-4">
                            <div class="d-grid gap-2">
                                <a href="https://https://mycsmtp.com/cstestseries.html" class="btn btn-dark py-3 rounded-pill fw-bold">CS Executive</a>
                                <a href="https://mycsmtp.com/cstestseries.html" class="btn btn-dark py-3 rounded-pill fw-bold">CS Professional</a>
                                <a href="#" class="btn btn-dark py-3 rounded-pill fw-bold">CSEET</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Value Proposition -->
        <div class="bg-light py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold mb-4" style="color: #1ab79c;">Why Our Test Series Delivers Exceptional Value</h2>
                        <p class="lead mb-4">Our pricing reflects the quality and depth of evaluation you receive, not just the quantity of tests.</p>
                        
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-rupee-sign text-white fs-4"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="h5">Cost-Effective Preparation</h4>
                                <p> Our most affordable Test series start at Rs. 119, you get expert feedback at a fraction of coaching institute costs.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="me-4">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-chart-line text-white fs-4"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="h5">Proven Results</h4>
                                <p>Students using our test series improve their scores by an average of 22% compared to self-study alone.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="<?= base_url() ?>images/cs-value.jpg" alt="CS Test Series Value" class="img-fluid rounded-3 shadow">
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="container py-5">
            <h2 class="display-5 fw-bold mb-5 text-center" style="color: #1ab79c;">What Our Students Say</h2>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="mb-3" style="color: #FFD700;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-4">"The Chapterwise tests helped me identify weak areas I didn't even know I had. Scored exemptions in CS Executive after failing previously!"</p>
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url() ?>images/student1.jpg" alt="Student" class="rounded-circle me-3" width="50">
                                <div>
                                    <h5 class="mb-0">Rahul Sharma</h5>
                                    <small class="text-muted">CS Executive Passed</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="mb-3" style="color: #FFD700;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-4">"For the price, the quality of evaluation is unmatched. The detailed feedback helped me improve my answer presentation significantly."</p>
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url() ?>images/student2.jpg" alt="Student" class="rounded-circle me-3" width="50">
                                <div>
                                    <h5 class="mb-0">Priya Patel</h5>
                                    <small class="text-muted">CS Professional Student</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="mb-3" style="color: #FFD700;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-4">"The Full Syllabus tests were perfect for my last-minute preparation. The affordable price made it accessible when I needed it most."</p>
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url() ?>images/student3.jpg" alt="Student" class="rounded-circle me-3" width="50">
                                <div>
                                    <h5 class="mb-0">Amit Joshi</h5>
                                    <small class="text-muted">CSEET Cleared</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-dark text-white py-5">
            <div class="container text-center">
                <h2 class="display-5 fw-bold mb-4">Ready to Elevate Your CS Preparation?</h2>
                <p class="lead mb-5">Join thousands of successful CS students who trusted our evaluation system</p>
                <a href="#plans" class="btn btn-lg rounded-pill px-5 py-3 fw-bold" style="background-color: #1ab79c; color: white;">Choose Your Plan Now</a>
            </div>
        </div>
    </section>

    <style>
        /* Custom Styles */
        .hover-scale {
            transition: transform 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: translateY(-10px);
        }
        
        .card-header {
            border-radius: 0 !important;
        }
        
        .bg-primary {
            background-color: #416CCB !important;
        }
        
        .btn-primary {
            background-color: #416CCB;
            border-color: #416CCB;
        }
        
        .btn-primary:hover {
            background-color: #3a5fb7;
            border-color: #3a5fb7;
        }
        
        .bg-dark {
            background-color: #1b273d !important;
        }
        
        @media (max-width: 768px) {
            .display-5 {
                font-size: 2.5rem;
            }
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('jsContent') ?>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
<?= $this->endSection() ?>
