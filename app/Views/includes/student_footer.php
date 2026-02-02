 <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootbox.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/custom_js/common.js?v=1.0.1"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="<?=base_url()?>assets/js/cdn/owl.carousel.min.js?v=1.0.0"></script>
    <script src="<?=base_url()?>assets/js/custom_js/design.js?v=1.0.3"></script>
    <script src="https://sdk.cashfree.com/js/v3/cashfree.js?v=1.0.0"></script>
    <script src="<?=base_url()?>assets/js/custom_js/cart.js?v=1.0.9"></script>
    <script type="text/javascript">
      var baseUrl = "<?=base_url()?>";
      var paymentGateway = "<?=PAYMENTGATEWAY?>";
    </script>
    <!-- <script src="https://kit.fontawesome.com/9e5ba2e3f5.js" crossorigin="anonymous"></script> -->
    <?php if (session()->get('studentDetails')===null): ?>
    <footer class="footer" style="background-image: url('./assets/images/footer-bg.png'); font-size: 22px;">
      <div class="footer-top section">
        <div class="container grid-list">
          <div class="footer-brand">
            <div class="wrapper">
            <span class="span">WhatsApp:</span>
           <a href="https://wa.me/+919540097210" class="footer-link">+919540097210</a>
           </div>

          <div class="wrapper">
           <span class="span">Email:</span>
           <a href="mailto:mycsmtp.com@gmail.com" class="footer-link">mycsmtp.com@gmail.com</a>
          </div>
            
          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Test Series</p>
            </li>
            <?php foreach ($fetchLevels as $levelRow): ?>
              <li>
                <a href="<?=base_url()?>level/type/<?=$levelRow['level_id']?>" class="footer-link"><?=$levelRow['level_name']?></a>
              </li>
            <?php endforeach ?>
          </ul>
          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Explore</p>
            </li>
            <li>
              <a href="<?=base_url()?>important-links" class="footer-link">Important Link</a>
            </li>
            <li>
              <a href="<?=base_url()?>why-us" class="footer-link">Why Us</a>
            </li>
            <li>
              <a href="<?=base_url()?>about-us" class="footer-link">About Us</a>
            </li>
            <li>
              <a href="<?=base_url()?>contact-us" class="footer-link">Contact Us</a>
            </li>
          </ul>
          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Policies</p>
            </li>
            <li>
              <a href="<?=base_url()?>terms-and-conditions" class="footer-link">Terms and conditions</a>
            </li>
            <li>
              <a href="<?=base_url()?>disclaimer" class="footer-link">Disclaimer</a>
            </li>
            <li>
              <a href="<?=base_url()?>privacy-policy" class="footer-link">Privacy Policy</a>
            </li>
            <li>
              <a href="<?=base_url()?>cancellation-policy" class="footer-link">Refund & cancellation Policy</a>
            </li>
            <li>
              <a href="<?=base_url()?>pass-plan-policy" class="footer-link">MY CS MTP Guaranteed Pass Plan Policy</a>
          </ul>
          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Test Series</p>
            </li>
            <li>
              <a href="<?=base_url()?>csexecutivetestseries.html" class="footer-link">CS Executive</a>
            </li>
            <li>
              <a href="<?=base_url()?>csprofessionaltestseries.html" class="footer-link">CS Professional</a>
            </li>
            <li>
              <a href="<?=base_url()?>cs-test-series.html" class="footer-link">CS Test Series</a>
            </li>
            <li>
              <a href="<?=base_url()?>cstestseries.html" class="footer-link">CS Test Series</a>
            </li>
          </ul>
          <div class="footer-list">

            <p class="footer-list-title">Contacts</p>

            <p class="footer-list-text">
              Enter your email address to register to our newsletter subscription
            </p>

            <div class="newsletter-form">
              <input type="email" id="newsletter_email" placeholder="Your email" required class="input-field">
              <button class="btn btn-class has-before btnNewsletter">
                  <span class="span">Subscribe</span>
                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
              </button>
            </div>

            <ul class="social-list">

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>
              <li>
                <a href="https://wa.me/+919540097210" class="social-link">
                  <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
              </li>
              <li>
                <a href="https://instagram.com/mycsmtp" class="social-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

              <li>
                <a href="https://telegram.dog/mycsmtp" class="social-link">
                  <ion-icon name="send-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-youtube"></ion-icon>
                </a>
              </li>

            </ul>

          </div>

        </div>
      </div>
      <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          Copyright <?=date('Y')?> All Rights Reserved by <a href="#" class="copyright-link">MY CS MTP.</a>
        </p>
    </footer>
    <?php endif ?>
  <a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>
  <script type="text/javascript">
    'use strict';



/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

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



/**
 * header active when scroll down to 100px
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

const activeElem = function () {
  if (window.scrollY > 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
}

addEventOnElem(window, "scroll", activeElem);
        // Mobile Menu Toggle
        const menuToggle = document.querySelector('.cs-menu-toggle');
        const mobileDrawer = document.querySelector('.cs-mobile-drawer');
        const drawerOverlay = document.querySelector('.cs-drawer-overlay');
        const drawerClose = document.querySelector('.cs-drawer-close');

        menuToggle.addEventListener('click', () => {
            mobileDrawer.classList.add('active');
            drawerOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        drawerClose.addEventListener('click', () => {
            mobileDrawer.classList.remove('active');
            drawerOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });

        drawerOverlay.addEventListener('click', () => {
            mobileDrawer.classList.remove('active');
            drawerOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });

        // Toggle FAQ items
        document.querySelectorAll('.cs-faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                item.classList.toggle('active');
                
                // Close other open items
                document.querySelectorAll('.cs-faq-item').forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        otherItem.classList.remove('active');
                    }
                });
            });
        });

        // Show offer popup after delay
        setTimeout(() => {
            document.querySelector('.cs-overlay').classList.add('active');
            document.querySelector('.cs-offer-popup').classList.add('active');
            document.body.style.overflow = 'hidden';
        }, 3000);

        // Close offer popup
        document.querySelector('.cs-offer-popup .cs-btn-outline').addEventListener('click', () => {
            document.querySelector('.cs-overlay').classList.remove('active');
            document.querySelector('.cs-offer-popup').classList.remove('active');
            document.body.style.overflow = '';
        });

        document.querySelector('.cs-popup-close').addEventListener('click', () => {
            document.querySelector('.cs-overlay').classList.remove('active');
            document.querySelector('.cs-offer-popup').classList.remove('active');
            document.body.style.overflow = '';
        });

        // Make offer buttons work
        document.querySelector('.cs-offer-popup .cs-btn-primary').addEventListener('click', () => {
            window.location.href = '#pricing';
            document.querySelector('.cs-overlay').classList.remove('active');
            document.querySelector('.cs-offer-popup').classList.remove('active');
            document.body.style.overflow = '';
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                if(this.getAttribute('href') === '#') return;
                
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Testimonial Slider
        const slider = document.querySelector('.cs-testimonial-slider');
        const slides = document.querySelectorAll('.cs-testimonial-slide');
        const dots = document.querySelectorAll('.cs-slider-dot');
        let currentSlide = 0;

        function showSlide(index) {
            slider.style.transform = `translateX(-${index * 100}%)`;
            
            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
                if(i === index) {
                    dot.querySelector('::before').style.left = '0';
                } else {
                    dot.querySelector('::before').style.left = '-100%';
                }
            });
            
            currentSlide = index;
        }

        // Dot click event
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });

        // Auto slide
        setInterval(() => {
            let nextSlide = (currentSlide + 1) % slides.length;
            showSlide(nextSlide);
        }, 5000);

        // Scroll header effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.cs-header');
            if(window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Scroll progress indicator
        window.addEventListener('scroll', () => {
            const scrollProgress = document.querySelector('.cs-scroll-progress');
            const scrollTop = document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight;
            const clientHeight = document.documentElement.clientHeight;
            const scrollPercent = (scrollTop / (scrollHeight - clientHeight)) * 100;
            scrollProgress.style.width = scrollPercent + '%';
        });

        // Animate steps on scroll
        const steps = document.querySelectorAll('.cs-step');
        const stepsContainer = document.querySelector('.cs-steps');

        function animateSteps() {
            const containerTop = stepsContainer.getBoundingClientRect().top;
            const containerBottom = stepsContainer.getBoundingClientRect().bottom;
            const windowHeight = window.innerHeight;
            
            if(containerTop < windowHeight * 0.8 && containerBottom > 0) {
                steps.forEach((step, index) => {
                    setTimeout(() => {
                        step.classList.add('animate');
                    }, index * 200);
                });
                
                // Animate timeline progress
                document.querySelector('.cs-steps::after').style.width = '100%';
                
                // Remove event listener after animation
                window.removeEventListener('scroll', animateSteps);
            }
        }

        window.addEventListener('scroll', animateSteps);

        // Initialize steps animation on page load if already in view
        animateSteps();

        // Floating particles
        function createParticles() {
            const particlesContainer = document.createElement('div');
            particlesContainer.className = 'cs-particles';
            document.querySelector('.cs-hero').appendChild(particlesContainer);
            
            for(let i = 0; i < 20; i++) {
                const particle = document.createElement('div');
                particle.className = 'cs-particle';
                
                // Random size between 5px and 15px
                const size = Math.random() * 10 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.bottom = `-${size}px`;
                
                // Random animation duration between 10s and 20s
                const duration = Math.random() * 10 + 10;
                particle.style.animationDuration = `${duration}s`;
                
                // Random delay
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                particlesContainer.appendChild(particle);
            }
        }

        createParticles();
    </script>
