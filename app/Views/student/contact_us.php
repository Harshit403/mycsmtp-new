<?= $this->extend('layout/student_layout') ?>

<?= $this->section('title') ?>
    Contact Us | MY CS MTP Test Series - Get in Touch for CS Exam Support
<?= $this->endSection() ?>

<?= $this->section('meta') ?>
    <!-- Primary Meta Tags -->
    <meta name="description" content="Contact MY CS MTP for CS test series inquiries, support, or guidance. Reach us via WhatsApp +91-9540097210 or email support@mycsmtp.com. Our team is ready to help CS aspirants.">
    <meta name="keywords" content="contact MY CS MTP, CS test series support, MY CS MTP WhatsApp, CS exam help, contact CS coaching, MY CS MTP email, CS test series inquiry, Company Secretary support">
    <meta name="author" content="MY CS MTP Test Series">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= base_url() ?>contact-us">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>contact-us">
    <meta property="og:title" content="Contact Us | MY CS MTP Test Series Support">
    <meta property="og:description" content="Get in touch with MY CS MTP for CS test series inquiries and support. Available via WhatsApp and email.">
    <meta property="og:image" content="<?= base_url() ?>images/og-contact.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="MY CS MTP Test Series">
    <meta property="og:locale" content="en_IN">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= base_url() ?>contact-us">
    <meta property="twitter:title" content="Contact MY CS MTP | CS Test Series Support">
    <meta property="twitter:description" content="Contact us for CS exam preparation support. WhatsApp: +91-9540097210 | Email: support@mycsmtp.com">
    <meta property="twitter:image" content="<?= base_url() ?>images/og-contact.jpg">
    
    <!-- Structured Data - Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "MY CS MTP Test Series",
        "url": "<?= base_url() ?>",
        "logo": "<?= base_url() ?>design_assets/images/favicon.png",
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+91-9540097210",
                "contactType": "Customer Support",
                "availableLanguage": ["English", "Hindi"],
                "areaServed": "IN"
            },
            {
                "@type": "ContactPoint",
                "email": "support@mycsmtp.com",
                "contactType": "Customer Support",
                "availableLanguage": ["English", "Hindi"]
            }
        ],
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Dasna",
            "addressLocality": "Ghaziabad",
            "addressRegion": "Uttar Pradesh",
            "postalCode": "201302",
            "addressCountry": "IN"
        },
        "sameAs": [
            "https://facebook.com/mycsmtp",
            "https://instagram.com/mycsmtp"
        ]
    }
    </script>
    
    <!-- Structured Data - ContactPage -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "Contact MY CS MTP",
        "description": "Contact page for MY CS MTP Test Series - Get support for CS exam preparation",
        "url": "<?= base_url() ?>contact-us",
        "mainEntity": {
            "@type": "EducationalOrganization",
            "name": "MY CS MTP Test Series",
            "telephone": "+91-9540097210",
            "email": "support@mycsmtp.com"
        }
    }
    </script>
    
    <!-- Structured Data - BreadcrumbList -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?= base_url() ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Contact Us",
                "item": "<?= base_url() ?>contact-us"
            }
        ]
    }
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<main role="main">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="bg-light py-2 border-bottom">
        <div class="container">
            <ol class="breadcrumb mb-0" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="<?= base_url() ?>" itemprop="item" class="text-decoration-none" style="color: #1ab79c;">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">Contact Us</span>
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>
    </nav>

    <!-- Hero Banner -->
    <section class="position-relative overflow-hidden" aria-labelledby="hero-heading">
        <div class="hero-section py-5" style="background: linear-gradient(135deg, #1ab79c 0%, #128f7a 50%, #0d6b5a 100%); min-height: 350px;">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-8 text-white py-4">
                        <span class="badge bg-white mb-3 px-3 py-2 fs-6 fw-semibold" style="color: #1ab79c;">
                            <i class="fas fa-headset me-2"></i>24/7 Support Available
                        </span>
                        <h1 id="hero-heading" class="display-4 fw-bold mb-3 animate-fade-in">
                            Get in Touch With <span class="text-warning">MY CS MTP</span>
                        </h1>
                        <p class="lead mb-0 fs-5 animate-fade-in-delay">
                            We're here to help you succeed in your CS exams. Reach out to us for inquiries, support, or guidance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Contact Cards -->
    <section class="py-5" style="margin-top: -3rem; position: relative; z-index: 2;">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-5">
                    <article class="contact-card card border-0 shadow-lg h-100 text-center overflow-hidden" style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="contact-icon-wrapper mb-3 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #25d366 0%, #128c7e 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-whatsapp text-white fs-3"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-2" style="color: #25d366;">WhatsApp Us</h3>
                            <p class="text-muted mb-3">Chat with us instantly for quick support</p>
                            <a href="https://wa.me/+919540097210" target="_blank" rel="noopener noreferrer" class="fw-bold text-decoration-none" style="color: #25d366; font-size: 1.1rem;">
                                <i class="fab fa-whatsapp me-2"></i>+91-9540097210
                            </a>
                        </div>
                    </article>
                </div>
                
                <div class="col-md-5">
                    <article class="contact-card card border-0 shadow-lg h-100 text-center overflow-hidden" style="transition: all 0.3s ease; border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="contact-icon-wrapper mb-3 mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-envelope text-white fs-3"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-2" style="color: #6f42c1;">Email Us</h3>
                            <p class="text-muted mb-3">Send us your queries anytime</p>
                            <a href="mailto:support@mycsmtp.com" class="fw-bold text-decoration-none" style="color: #6f42c1; font-size: 1.1rem;">
                                <i class="fas fa-envelope me-2"></i>support@mycsmtp.com
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-5" aria-labelledby="contact-info-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 id="contact-info-heading" class="h3 fw-bold mb-3" style="color: #1ab79c;">
                        <i class="fas fa-info-circle me-2"></i>Contact Information
                    </h2>
                    <p class="text-muted">Reach out to us through any of the following channels</p>
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">
                <!-- Address Card -->
                <div class="col-md-6 col-lg-4">
                    <article class="info-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3 mx-auto" style="width: 60px; height: 60px; background: linear-gradient(135deg, #fd7e14 0%, #e56b0a 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-map-marker-alt text-white fs-3"></i>
                            </div>
                            <h4 class="h5 fw-bold mb-3" style="color: #fd7e14;">Office Address</h4>
                            <p class="text-muted mb-0">
                                MY CS MTP<br>
                                Dasna, Ghaziabad<br>
                                Uttar Pradesh, India<br>
                                PIN: 201302
                            </p>
                        </div>
                    </article>
                </div>
                
                <!-- Working Hours -->
                <div class="col-md-6 col-lg-4">
                    <article class="info-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3 mx-auto" style="width: 60px; height: 60px; background: linear-gradient(135deg, #20c997 0%, #16a085 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-clock text-white fs-3"></i>
                            </div>
                            <h4 class="h5 fw-bold mb-3" style="color: #20c997;">Working Hours</h4>
                            <p class="text-muted mb-1">
                                <strong>Monday - Saturday:</strong><br>9:00 AM - 7:00 PM IST
                            </p>
                            <p class="text-muted mb-0">
                                <strong>Sunday:</strong><br>10:00 AM - 4:00 PM IST
                            </p>
                        </div>
                    </article>
                </div>
                
                <!-- Quick Response -->
                <div class="col-md-6 col-lg-4">
                    <article class="info-card card border-0 shadow-lg h-100" style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3 mx-auto" style="width: 60px; height: 60px; background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-bolt text-white fs-3"></i>
                            </div>
                            <h4 class="h5 fw-bold mb-3 text-danger">Response Time</h4>
                            <p class="text-muted mb-0">
                                We typically respond within <strong>24 hours</strong>. For urgent matters, please WhatsApp us for immediate assistance.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
            
            <!-- Social Media -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h4 class="h5 fw-bold mb-4" style="color: #1ab79c;">
                        <i class="fas fa-share-alt me-2"></i>Connect With Us
                    </h4>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="https://www.facebook.com/mycsmtp" target="_blank" rel="noopener noreferrer" class="social-btn d-flex align-items-center justify-content-center text-decoration-none" style="width: 50px; height: 50px; background: #1877f2; border-radius: 50%; color: white; transition: all 0.3s ease;" aria-label="Follow us on Facebook">
                            <i class="fab fa-facebook-f fs-4"></i>
                        </a>
                        <a href="https://www.instagram.com/mycsmtp" target="_blank" rel="noopener noreferrer" class="social-btn d-flex align-items-center justify-content-center text-decoration-none" style="width: 50px; height: 50px; background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); border-radius: 50%; color: white; transition: all 0.3s ease;" aria-label="Follow us on Instagram">
                            <i class="fab fa-instagram fs-4"></i>
                        </a>
                        <a href="https://wa.me/+919540097210" target="_blank" rel="noopener noreferrer" class="social-btn d-flex align-items-center justify-content-center text-decoration-none" style="width: 50px; height: 50px; background: #25d366; border-radius: 50%; color: white; transition: all 0.3s ease;" aria-label="Chat with us on WhatsApp">
                            <i class="fab fa-whatsapp fs-4"></i>
                        </a>
                        <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" class="social-btn d-flex align-items-center justify-content-center text-decoration-none" style="width: 50px; height: 50px; background: #ff0000; border-radius: 50%; color: white; transition: all 0.3s ease;" aria-label="Subscribe to our YouTube channel">
                            <i class="fab fa-youtube fs-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5" style="background-color: #f8f9fa;" aria-labelledby="faq-heading">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge px-3 py-2 mb-3" style="background-color: rgba(26, 183, 156, 0.1); color: #1ab79c;">
                        <i class="fas fa-question-circle me-2"></i>Common Questions
                    </span>
                    <h2 id="faq-heading" class="display-4 fw-bold mb-3" style="color: #1ab79c;">Frequently Asked Questions</h2>
                    <p class="lead text-muted">Quick answers to common inquiries</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="contactFaqAccordion">
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h3 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" style="background-color: white; color: #1ab79c;">
                                    <i class="fas fa-clock me-2"></i>How quickly will you respond to my inquiry?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#contactFaqAccordion">
                                <div class="accordion-body text-muted">
                                    We aim to respond to all inquiries within <strong>24 hours</strong> during business days. For urgent matters, please WhatsApp us for immediate assistance.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" style="background-color: white; color: #1ab79c;">
                                    <i class="fas fa-question me-2"></i>What information should I include in my message?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contactFaqAccordion">
                                <div class="accordion-body text-muted">
                                    Please include your <strong>full name, contact number, CS level (CSEET/Executive/Professional)</strong>, and a clear description of your query or issue. This helps us provide you with accurate and timely assistance.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" style="background-color: white; color: #1ab79c;">
                                    <i class="fas fa-headset me-2"></i>Do you provide technical support?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#contactFaqAccordion">
                                <div class="accordion-body text-muted">
                                    Yes, we provide technical support for issues related to our platform, test access, payment problems, and account-related queries. Please mention "Technical Support" in your WhatsApp message or email for faster resolution.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

<style>
    /* Hero Section */
    .hero-section {
        position: relative;
    }
    
    .animate-fade-in {
        animation: fadeIn 1s ease-out;
    }
    
    .animate-fade-in-delay {
        animation: fadeIn 1s ease-out 0.3s both;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Contact Cards */
    .contact-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .contact-card:hover {
        transform: translateY(-10px);
    }
    
    .contact-card:hover .contact-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
    }
    
    .contact-icon-wrapper {
        transition: all 0.3s ease;
    }
    
    /* Form Styles */
    .contact-form-wrapper {
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #1ab79c;
        box-shadow: 0 0 0 0.25rem rgba(26, 183, 156, 0.25);
    }
    
    /* Info Cards */
    .info-card {
        transition: all 0.3s ease;
    }
    
    .info-card:hover {
        transform: translateX(5px);
    }
    
    /* Social Buttons */
    .social-btn {
        transition: all 0.3s ease;
    }
    
    .social-btn:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    /* Accordion */
    .accordion-button:not(.collapsed) {
        background-color: rgba(26, 183, 156, 0.1) !important;
        box-shadow: none !important;
    }
    
    .accordion-button:focus {
        box-shadow: none !important;
        border-color: rgba(26, 183, 156, 0.25) !important;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }
        
        .hero-section {
            min-height: auto;
            padding: 2rem 0;
        }
        
        .contact-card {
            margin-bottom: 1rem;
        }
    }
    
    /* Smooth Scroll */
    html {
        scroll-behavior: smooth;
    }
    
    /* Focus Styles */
    a:focus-visible,
    button:focus-visible {
        outline: 3px solid #1ab79c;
        outline-offset: 2px;
    }
</style>

<script>
    // Counter Animation for Stats
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.counter');
        
        if (counters.length > 0) {
            const animateCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-target'));
                const count = parseInt(counter.innerText);
                const increment = target / 100;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(() => animateCounter(counter), 10);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            counters.forEach(counter => observer.observe(counter));
        }
    });
</script>

<?= $this->endSection() ?>

<?= $this->section('jsContent') ?>
<!-- No additional JS required -->
<?= $this->endSection() ?>
