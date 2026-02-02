<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Contact Us
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    .contact-section .contact-header-renamed {
        background: linear-gradient(135deg, #1AB79C, #16a085);
        color: white;
        padding: 3rem 0;
        margin-top: -1rem !important;
        text-align: center;
    }
    .contact-section .contact-header-renamed h1 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    .contact-section .contact-header-renamed p {
        font-size: 1.25rem;
    }
    .contact-section .contact-form-renamed {
        background: white;
        padding: 2rem;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: -4rem;
        z-index: 1;
        position: relative;
    }
    .contact-section .social-links-renamed a {
        margin: 0 1rem;
        font-size: 1.5rem;
        color: #1AB79C;
        transition: color 0.3s, transform 0.3s;
    }
    .contact-section .social-links-renamed a:hover {
        color: #16a085;
        transform: scale(1.1);
    }
    .contact-section .contact-info-renamed p {
        margin: 0.5rem 0;
        font-size: 1.1rem;
    }
    .contact-section .btn-gradient-renamed {
        background: linear-gradient(135deg, #1AB79C, #16a085);
        border: none;
        color: white;
        transition: background 0.3s, transform 0.3s;
    }
    .contact-section .btn-gradient-renamed:hover {
        background: linear-gradient(135deg, #16a085, #1AB79C);
        transform: scale(1.05);
    }
    .contact-section .container-renamed {
        margin-top: 4rem;
    }
</style>
<section class="container mb-5 section contact-section">
    <header class="contact-header-renamed">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you!</p>
    </header>
    <div class="container container-renamed">
        <div class="row justify-content-center">
            <div class="col-md-6 contact-form-renamed">
                <h3>Get in Touch</h3>
                <form>
                    <div class="mb-3">
                        <label for="name-renamed" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name-renamed" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="email-renamed" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email-renamed" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="message-renamed" class="form-label">Message</label>
                        <textarea class="form-control" id="message-renamed" rows="4" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-renamed w-100">Send Message</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-5">
            <h3>Connect with Us</h3>
            <div class="social-links-renamed mt-3">
                <a href="https://www.facebook.com/mycsmtp" target="_blank" class="fab fa-facebook-f"></a>
                <a href="https://www.twitter.com" target="_blank" class="fab fa-twitter"></a>
                <a href="https://www.instagram.com/mycsmtp" target="_blank" class="fab fa-instagram"></a>
                <a href="https://wa.me/+919540097210" target="_blank" class="fab fa-WhatsApp"></a>
            </div>
        </div>

        <div class="text-center mt-5 contact-info-renamed">
            <h3>Contact Information</h3>
            <p><i class="fas fa-phone-alt"></i> Phone: +919540097210</p>
            <p><i class="fas fa-envelope"></i> Email: support@mycsmtp.com</p>
            <p><i class="fas fa-address"></i>MY CS MTP, Dasna, Ghaziabad, UttarPradesh, 201302</p>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
