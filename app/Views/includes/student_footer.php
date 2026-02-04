  <!-- jQuery (required for Bootstrap and plugins) -->
  <script src="<?=base_url()?>assets/js/cdn/jquery.min.js"></script>
  
  <!-- Bootstrap Bundle from CDN (better caching, smaller footprint) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
          crossorigin="anonymous" defer></script>
  
  <!-- Bootbox for dialogs - load BEFORE cart JS -->
  <script src="<?=base_url()?>assets/js/cdn/bootbox.min.js"></script>
  
  <!-- Custom JS - Minified versions -->
  <script src="<?=base_url()?>assets/js/custom_js/common.min.js?v=1.0.2" defer></script>
  
  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>
  
  <!-- Owl Carousel - only loaded if needed (defer for non-critical) -->
  <script src="<?=base_url()?>assets/js/cdn/owl.carousel.min.js?v=1.0.0" defer></script>
  
  <!-- Design JS - Minified -->
  <script src="<?=base_url()?>assets/js/custom_js/design.min.js?v=1.0.4" defer></script>
  
  <!-- Cashfree Payment SDK -->
  <script src="https://sdk.cashfree.com/js/v3/cashfree.js?v=1.0.0" defer></script>
  
  <!-- Cart JS - Minified -->
  <script src="<?=base_url()?>assets/js/custom_js/cart.js?v=1.0.13" defer></script>
  
  <!-- View JS - Minified (only loaded on specific pages) -->
  <script src="<?=base_url()?>assets/js/custom_js/view.min.js?v=1.0.1" defer></script>
    <script type="text/javascript">
      var baseUrl = "<?=base_url()?>";
      var paymentGateway = "<?=PAYMENTGATEWAY?>";
      var cashfreeMode = "<?=defined('CASHFREE_MODE') ? CASHFREE_MODE : 'sandbox'?>";
    </script>
    <?php if (session()->get('studentDetails')===null): ?>
    <footer class="shadcn-footer">
        <div class="shadcn-container">
            <div class="shadcn-footer-main">
                <div class="shadcn-footer-brand">
                    <a href="<?=base_url()?>" class="shadcn-logo">
                        <img src="<?=base_url()?>images/logo-min.png" alt="MY CS MTP">
                    </a>
                    <p class="shadcn-brand-desc">
                        India's most trusted CS Test Series platform. Prepare for your CS exams with expert-crafted mock tests.
                    </p>
                    <div class="shadcn-contact-info">
                        <div class="shadcn-contact-item">
                            <i class="fab fa-whatsapp"></i>
                            <a href="https://wa.me/+919540097210">+91 9540097210</a>
                        </div>
                        <div class="shadcn-contact-item">
                            <i class="far fa-envelope"></i>
                            <a href="mailto:mycsmtp.com@gmail.com">mycsmtp.com@gmail.com</a>
                        </div>
                    </div>
                </div>
                
                <div class="shadcn-footer-links">
                    <div class="shadcn-link-group">
                        <h4 class="shadcn-link-title">Test Series</h4>
                        <ul class="shadcn-link-list">
                            <?php foreach ($fetchLevels as $levelRow): ?>
                                <li>
                                    <a href="<?=base_url()?>level/type/<?=$levelRow['level_id']?>" class="shadcn-link">
                                        <?=$levelRow['level_name']?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    
                    <div class="shadcn-link-group">
                        <h4 class="shadcn-link-title">Quick Links</h4>
                        <ul class="shadcn-link-list">
                            <li><a href="<?=base_url()?>important-links" class="shadcn-link">Important Links</a></li>
                            <li><a href="<?=base_url()?>why-us" class="shadcn-link">Why Us</a></li>
                            <li><a href="<?=base_url()?>about-us" class="shadcn-link">About Us</a></li>
                            <li><a href="<?=base_url()?>contact-us" class="shadcn-link">Contact Us</a></li>
                            <li><a href="<?=base_url()?>testimonial" class="shadcn-link">Testimonials</a></li>
                        </ul>
                    </div>
                    
                    <div class="shadcn-link-group">
                        <h4 class="shadcn-link-title">Resources</h4>
                        <ul class="shadcn-link-list">
                            <li><a href="<?=base_url()?>sample-answersheet" class="shadcn-link">Sample Answersheets</a></li>
                            <li><a href="<?=base_url()?>syllabus" class="shadcn-link">Syllabus</a></li>
                            <li><a href="<?=base_url()?>faq" class="shadcn-link">FAQ</a></li>
                            <li><a href="<?=base_url()?>plans" class="shadcn-link">Plans & Pricing</a></li>
                        </ul>
                    </div>
                    
                    <div class="shadcn-link-group">
                        <h4 class="shadcn-link-title">Legal</h4>
                        <ul class="shadcn-link-list">
                            <li><a href="<?=base_url()?>terms-and-conditions" class="shadcn-link">Terms & Conditions</a></li>
                            <li><a href="<?=base_url()?>privacy-policy" class="shadcn-link">Privacy Policy</a></li>
                            <li><a href="<?=base_url()?>disclaimer" class="shadcn-link">Disclaimer</a></li>
                            <li><a href="<?=base_url()?>cancellation-policy" class="shadcn-link">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="shadcn-footer-bottom">
                <div class="shadcn-footer-bottom-left">
                    <p class="shadcn-copyright">
                        &copy; <?=date('Y')?> MY CS MTP. All rights reserved.
                    </p>
                </div>
                <div class="shadcn-footer-bottom-right">
                    <div class="shadcn-newsletter">
                        <span class="shadcn-newsletter-text">Subscribe to our newsletter</span>
                        <div class="shadcn-newsletter-form">
                            <input type="email" id="newsletter_email" placeholder="Enter your email" class="shadcn-newsletter-input" aria-label="Email address for newsletter subscription">
                            <button class="shadcn-newsletter-btn btnNewsletter" aria-label="Subscribe to newsletter">
                                <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="shadcn-social-links">
                        <a href="#" class="shadcn-social-link" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://wa.me/+919540097210" class="shadcn-social-link" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://instagram.com/mycsmtp" class="shadcn-social-link" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://telegram.dog/mycsmtp" class="shadcn-social-link" aria-label="Telegram">
                            <i class="fab fa-telegram-plane"></i>
                        </a>
                        <a href="#" class="shadcn-social-link" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <style>
        .shadcn-footer {
            background: #0f172a;
            border-top: 1px solid #1e293b;
            padding: 64px 0 32px;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .shadcn-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }
        
        .shadcn-footer-main {
            display: grid;
            grid-template-columns: 1.5fr 2.5fr;
            gap: 48px;
            margin-bottom: 48px;
        }
        
        .shadcn-footer-brand {
            padding-right: 24px;
        }
        
        .shadcn-logo {
            display: inline-block;
            margin-bottom: 16px;
        }
        
        .shadcn-logo img {
            height: 44px;
            width: auto;
        }
        
        .shadcn-brand-desc {
            color: #cbd5e1;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 24px;
        }
        
        .shadcn-contact-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .shadcn-contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #cbd5e1;
            font-size: 14px;
        }
        
        .shadcn-contact-item i {
            width: 20px;
            color: #10b981;
            text-align: center;
        }
        
        .shadcn-contact-item a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        
        .shadcn-contact-item a:hover {
            color: #10b981;
        }
        
        .shadcn-footer-links {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
        }
        
        .shadcn-link-group {
            min-width: 0;
        }
        
        .shadcn-link-title {
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 16px;
            letter-spacing: 0.02em;
        }
        
        .shadcn-link-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .shadcn-link {
            font-size: 14px;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-block;
        }
        
        .shadcn-link:hover {
            color: #10b981;
            transform: translateX(4px);
        }
        
        .shadcn-footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 32px;
            border-top: 1px solid #1e293b;
            flex-wrap: wrap;
            gap: 24px;
        }
        
        .shadcn-footer-bottom-left {
            flex-shrink: 0;
        }
        
        .shadcn-copyright {
            font-size: 14px;
            color: #e2e8f0;
            font-weight: 500;
        }
        
        .shadcn-footer-bottom-right {
            display: flex;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }
        
        .shadcn-newsletter {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .shadcn-newsletter-text {
            font-size: 14px;
            color: #cbd5e1;
            white-space: nowrap;
        }
        
        .shadcn-newsletter-form {
            display: flex;
            align-items: center;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.2s ease;
        }
        
        .shadcn-newsletter-form:focus-within {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
        
        .shadcn-newsletter-input {
            border: none;
            padding: 10px 14px;
            font-size: 14px;
            width: 200px;
            outline: none;
            background: transparent;
            color: #f1f5f9;
        }
        
        .shadcn-newsletter-input::placeholder {
            color: #64748b;
        }
        
        .shadcn-newsletter-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: #10b981;
            color: #ffffff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        
        .shadcn-newsletter-btn:hover {
            background: #059669;
        }
        
        .shadcn-social-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .shadcn-social-link {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 8px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        
        .shadcn-social-link:hover {
            background: #10b981;
            border-color: #10b981;
            color: #ffffff;
            transform: translateY(-2px);
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .shadcn-footer-main {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .shadcn-footer-links {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 640px) {
            .shadcn-footer {
                padding: 48px 0 24px;
            }
            
            .shadcn-footer-links {
                grid-template-columns: 1fr 1fr;
                gap: 24px;
            }
            
            .shadcn-footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .shadcn-footer-bottom-right {
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .shadcn-newsletter {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }
            
            .shadcn-newsletter-form {
                width: 100%;
            }
            
            .shadcn-newsletter-input {
                width: 100%;
            }
            
            .shadcn-social-links {
                width: 100%;
                justify-content: flex-start;
            }
        }
        
        @media (max-width: 480px) {
            .shadcn-container {
                padding: 0 16px;
            }
            
            .shadcn-footer-links {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <?php endif ?>
    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
    </a>
    <script type="text/javascript">
        'use strict';

        const addEventOnElem = function (elem, type, callback) {
            if (!elem) return;
            if (elem.length > 1) {
                for (let i = 0; i < elem.length; i++) {
                    if (elem[i]) elem[i].addEventListener(type, callback);
                }
            } else {
                elem.addEventListener(type, callback);
            }
        }

        const navbar = document.querySelector("[data-navbar]");
        const navTogglers = document.querySelectorAll("[data-nav-toggler]");
        const navLinks = document.querySelectorAll("[data-nav-link]");
        const overlay = document.querySelector("[data-overlay]");

        const toggleNavbar = function () {
            navbar.classList.toggle("active");
            overlay.classList.toggle("active");
        }

        addEventOnElem(navTogglers, "click", toggleNavbar);

        const closeNavbar = function () {
            navbar.classList.remove("active");
            overlay.classList.remove("active");
        }

        addEventOnElem(navLinks, "click", closeNavbar);

        const header = document.querySelector("[data-header]");
        const backTopBtn = document.querySelector("[data-back-top-btn]");

        const activeElem = function () {
            if (window.scrollY > 10) {
                header.classList.add("active");
                header.classList.add("scrolled");
                backTopBtn.classList.add("active");
            } else {
                header.classList.remove("active");
                header.classList.remove("scrolled");
                backTopBtn.classList.remove("active");
            }
        }

        addEventOnElem(window, "scroll", activeElem);
        
        // Initial check for scroll position
        if (window.scrollY > 10) {
            header.classList.add("scrolled");
        }
        
        // Mobile Menu Toggle
        const menuToggle = document.querySelector('.cs-menu-toggle');
        const mobileDrawer = document.querySelector('.cs-mobile-drawer');
        const drawerOverlay = document.querySelector('.cs-drawer-overlay');
        const drawerClose = document.querySelector('.cs-drawer-close');

        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                mobileDrawer.classList.add('active');
                drawerOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }

        if (drawerClose) {
            drawerClose.addEventListener('click', () => {
                mobileDrawer.classList.remove('active');
                drawerOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }

        if (drawerOverlay) {
            drawerOverlay.addEventListener('click', () => {
                mobileDrawer.classList.remove('active');
                drawerOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }

        // Toggle FAQ items
        document.querySelectorAll('.cs-faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                item.classList.toggle('active');
                
                document.querySelectorAll('.cs-faq-item').forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        otherItem.classList.remove('active');
                    }
                });
            });
        });

        // Show offer popup after delay
        setTimeout(() => {
            const overlay = document.querySelector('.cs-overlay');
            const popup = document.querySelector('.cs-offer-popup');
            if (overlay && popup) {
                overlay.classList.add('active');
                popup.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }, 3000);

        // Close offer popup
        document.querySelector('.cs-offer-popup .cs-btn-outline')?.addEventListener('click', () => {
            document.querySelector('.cs-overlay')?.classList.remove('active');
            document.querySelector('.cs-offer-popup')?.classList.remove('active');
            document.body.style.overflow = '';
        });

        document.querySelector('.cs-popup-close')?.addEventListener('click', () => {
            document.querySelector('.cs-overlay')?.classList.remove('active');
            document.querySelector('.cs-offer-popup')?.classList.remove('active');
            document.body.style.overflow = '';
        });

        // Make offer buttons work
        document.querySelector('.cs-offer-popup .cs-btn-primary')?.addEventListener('click', () => {
            window.location.href = '#pricing';
            document.querySelector('.cs-overlay')?.classList.remove('active');
            document.querySelector('.cs-offer-popup')?.classList.remove('active');
            document.body.style.overflow = '';
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#' || !href.startsWith('#')) return;
                
                e.preventDefault();
                
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Scroll header effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.cs-header');
            if(window.scrollY > 50) {
                header?.classList.add('scrolled');
            } else {
                header?.classList.remove('scrolled');
            }
        });

        // Scroll progress indicator
        window.addEventListener('scroll', () => {
            const scrollProgress = document.querySelector('.cs-scroll-progress');
            if (scrollProgress) {
                const scrollTop = document.documentElement.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight;
                const clientHeight = document.documentElement.clientHeight;
                const scrollPercent = (scrollTop / (scrollHeight - clientHeight)) * 100;
                scrollProgress.style.width = scrollPercent + '%';
            }
        });
    </script>
