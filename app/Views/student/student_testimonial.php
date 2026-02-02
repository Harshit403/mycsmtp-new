<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    CS Test Series Reviews
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="container mt-3 mb-5 section testimonial-section">
    <div class="text-center">
        
    </div>

<style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f8f8f8;
      color: #333;
      line-height: 1.6;
    }

    .hero-section {
      background: linear-gradient(135deg, #1AB79C 0%, #0d8b74 100%);
      color: white;
      padding: 3rem 1rem;
      text-align: center;
      margin-bottom: 2rem;
      border-radius: 0 0 20px 20px;
    }

    .hero-section h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      font-weight: 700;
    }

    .hero-section p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: 0 auto;
    }

    #image-slider {
      width: 100%;
      max-width: 100%;
      margin: 2rem auto;
      height: 400px;
      overflow: hidden;
      position: relative;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    #image-slider img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
      position: absolute;
    }

    @keyframes fade {
      0%, 100% { opacity: 0; }
      20%, 80% { opacity: 1; }
    }

    .benefits-container {
      padding: 3rem 1rem;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      margin: 2rem auto;
      max-width: 1200px;
    }

    .section-title {
      text-align: center;
      margin-bottom: 2rem;
      color: #1AB79C;
      font-weight: 700;
      font-size: 2rem;
      position: relative;
    }

    .section-title:after {
      content: '';
      display: block;
      width: 80px;
      height: 4px;
      background: #1AB79C;
      margin: 10px auto;
      border-radius: 2px;
    }

    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .benefit-card {
      background: #fff;
      border-radius: 10px;
      padding: 1.5rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-top: 4px solid #1AB79C;
    }

    .benefit-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .benefit-card h3 {
      color: #1AB79C;
      margin-bottom: 1rem;
      font-size: 1.3rem;
    }

    .testimonial-content {
      max-width: 1200px;
      margin: 3rem auto;
      padding: 1rem;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .testimonial-content p {
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .whatsapp-testimonials {
      margin: 3rem auto;
      max-width: 1200px;
      padding: 0 1rem;
    }

    .screenshot-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .screenshot-frame {
      border: 10px solid #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
      background: #25D366;
      padding: 10px;
    }

    .screenshot-frame:hover {
      transform: scale(1.03);
    }

    .screenshot-frame img {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 8px;
    }

    .cta-section {
      background: linear-gradient(135deg, #1AB79C 0%, #0d8b74 100%);
      color: white;
      padding: 3rem 1rem;
      text-align: center;
      border-radius: 15px;
      margin: 3rem auto;
      max-width: 1200px;
    }

    .cta-section h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .cta-section p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: 0 auto 2rem;
    }

    .btn-cta {
      display: inline-block;
      background: white;
      color: #1AB79C;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .btn-cta:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      color: #0d8b74;
    }

    /* Mobile Responsive Styles */
    @media only screen and (max-width: 768px) {
      .hero-section {
        padding: 2rem 1rem;
        border-radius: 0;
      }
      
      .hero-section h1 {
        font-size: 1.8rem;
        line-height: 1.3;
      }
      
      .hero-section p {
        font-size: 1rem;
      }
      
      #image-slider {
        height: 250px;
        margin: 1rem auto;
        border-radius: 0;
      }
      
      .section-title {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
      }
      
      .section-title:after {
        width: 60px;
        height: 3px;
      }
      
      .benefits-container,
      .testimonial-content,
      .cta-section {
        padding: 1.5rem 1rem;
        margin: 1.5rem auto;
        border-radius: 10px;
      }
      
      .benefits-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      
      .benefit-card {
        padding: 1rem;
      }
      
      .benefit-card h3 {
        font-size: 1.1rem;
      }
      
      .testimonial-content p {
        font-size: 1rem;
        text-align: left;
      }
      
      .screenshot-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      
      .screenshot-frame {
        border-width: 8px;
        padding: 8px;
      }
      
      .cta-section h2 {
        font-size: 1.5rem;
      }
      
      .cta-section p {
        font-size: 1rem;
      }
      
      .btn-cta {
        padding: 10px 20px;
        font-size: 1rem;
      }
    }

    /* Small Mobile Devices */
    @media only screen and (max-width: 480px) {
      .hero-section h1 {
        font-size: 1.5rem;
      }
      
      #image-slider {
        height: 200px;
      }
      
      .section-title {
        font-size: 1.3rem;
      }
      
      .benefit-card h3 {
        font-size: 1rem;
      }
    }

</style>
    <style>
        .video-container {
            display: flex;
            justify-content: center; /* Center horizontally */
            
        }
        iframe {
            width: 560px; /* Set the width of the iframe */
            height: 315px; /* Set the height of the iframe */
        }
    </style>
<div class="hero-section">
    <h1>CS Test Series Success Stories-review</h1>
    <p>Hear from our students who aced their CS exams with our comprehensive test series</p>
</div>
<!-- <div class="video-container">
    <iframe src="https://www.youtube.com/embed/n0if03jat_4?xxsi=o3Sqh28_frnOGu7" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
    </iframe>
</div> -->
    <div class="whatsapp-testimonials">
    <h2 class="section-title">Student Success Stories</h2>
    
    <div class="screenshot-grid">
        <div class="screenshot-frame">
            <img src="<?=base_url()?>images/IMG-20250620-WA0001.jpg" alt="CS Test Series WhatsApp Testimonial 1">
        </div>
        
        <div class="screenshot-frame">
            <img src="<?=base_url()?>images/IMG-20250620-WA0002.jpg" alt="CS Test Series WhatsApp Testimonial 2">
        </div>
        
        <div class="screenshot-frame">
            <img src="<?=base_url()?>images/IMG-20250620-WA0003.jpg" alt="CS Test Series WhatsApp Testimonial 3">
        </div>
        
        <div class="screenshot-frame">
            <img src="<?=base_url()?>images/IMG-20250620-WA0004.jpg" alt="CS Test Series WhatsApp Testimonial 4">
        </div>
        
        <div class="screenshot-frame">
            <img src="<?=base_url()?>images/IMG-20250620-WA0005.jpg" alt="CS Test Series WhatsApp Testimonial 5">
        </div>
        
        <div class="screenshot-frame">
            <img src="<?=base_url()?>images/IMG-20250620-WA0006.jpg" alt="CS Test Series WhatsApp Testimonial 6">
        </div>
    </div>
</div>

<div class="benefits-container">
    <h2 class="section-title">Benefits of Our CS Test Series</h2>
    
    <div class="benefits-grid">
        <div class="benefit-card">
            <h3>Exam-like Practice</h3>
            <p>Our test series simulates the actual CS exam environment, helping you get comfortable with the format, timing, and pressure of the real test.</p>
        </div>
        
        <div class="benefit-card">
            <h3>Detailed Performance Analysis</h3>
            <p>Get comprehensive feedback on your strengths and weaknesses with our detailed performance reports and analytics.</p>
        </div>
        
        <div class="benefit-card">
            <h3>Expert-curated Questions</h3>
            <p>Access high-quality questions prepared by CS experts and previous exam toppers, covering all important topics and recent exam patterns.</p>
        </div>
        
        <div class="benefit-card">
            <h3>Time Management Skills</h3>
            <p>Learn to effectively manage your exam time through regular practice with our timed tests and section-wise challenges.</p>
        </div>
        
        <div class="benefit-card">
            <h3>Doubt Resolution</h3>
            <p>Get your questions answered by our team of experts to clear all your conceptual doubts and misunderstandings.</p>
        </div>
        
        <div class="benefit-card">
            <h3>Progress Tracking</h3>
            <p>Monitor your improvement over time with our progress tracking tools and personalized recommendations for study focus areas.</p>
        </div>
    </div>
</div>

<div class="testimonial-content">
    <h2 class="section-title">What Our Students Say</h2>
    
    <p>The CS Test Series has been instrumental in helping hundreds of students clear their CS Executive and Professional exams. Our comprehensive approach combines rigorous testing with detailed feedback, creating a proven path to success. Don't just take our word for it - hear from students who've experienced the transformation firsthand.</p>
    
    <p>The CS exams consist of three levels: <strong>the CSEET, CS Executive, and CS Professional</strong>. Each level has different subjects and eligibility criteria. The CS exams are held twice a year, in June and December. Our Test Series is designed to help you master each level with confidence, providing mock tests, study materials, doubt-clearing sessions, and expert feedback.</p>
</div>



<div class="cta-section">
    <h2>Ready to Ace Your CS Exams?</h2>
    <p>Join hundreds of successful students who transformed their preparation with our CS Test Series. Get exam-ready with our comprehensive practice tests and expert guidance.</p>
    <a href="#" class="btn-cta">Enroll in Test Series Now</a>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
      let currentImageIndex = 0;
      const images = document.querySelectorAll("#image-slider img");

      function showNextImage() {
        images[currentImageIndex].style.display = "none";
        currentImageIndex = (currentImageIndex + 1) % images.length;
        images[currentImageIndex].style.display = "block";
      }

      // Initial setup
      images[currentImageIndex].style.display = "block";

      // Set interval for auto slide (every 5 seconds in this example)
      setInterval(showNextImage, 2000);
    });
</script>

</section>
<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
<script type="text/javascript">
    var pageType="student_testimonial"
</script>
<?= $this->endSection() ?>
