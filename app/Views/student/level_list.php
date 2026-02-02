<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    CS Test Series | CS Executive & Professional Exams
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
  :root {
    --primary: #1ab79c;
    --primary-dark: #148f77;
    --primary-light: rgba(26, 183, 156, 0.1);
    --dark: #2d3748;
    --light: #f8fafc;
    --gradient: linear-gradient(135deg, #1ab79c 0%, #0f766e 100%);
  }

  /* Modern Base */
  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    line-height: 1.6;
    color: var(--dark);
    background-color: #f9f9f9;
  }

  /* Hero Section */
  .hero {
    background: var(--gradient);
    color: white;
    padding: 5rem 0;
    clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
    margin-bottom: 3rem;
  }

  .hero-title {
    font-weight: 800;
    font-size: 2.8rem;
    letter-spacing: -0.05em;
    margin-bottom: 1.5rem;
  }

  .hero-subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
    max-width: 700px;
    margin: 0 auto 2rem;
  }

  /* Card Grid */
  .card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
    margin: 3rem 0;
  }

  .exam-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    border: 1px solid rgba(0, 0, 0, 0.03);
  }

  .exam-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    background: var(--primary-light);
    padding: 1.5rem;
    text-align: center;
  }

  .card-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    border-radius: 50%;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  }

  .card-icon img {
    width: 30px;
    height: 30px;
  }

  .card-body {
    padding: 1.5rem;
  }

  .card-title {
    font-weight: 700;
    font-size: 1.25rem;
    color: var(--dark);
    margin-bottom: 0.5rem;
    text-align: center;
  }

  .card-desc {
    color: #64748b;
    text-align: center;
    margin-bottom: 1.5rem;
  }

  .card-cta {
    display: block;
    text-align: center;
    background: var(--primary);
    color: white;
    padding: 0.75rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
  }

  .card-cta:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
  }

  /* Value Props */
  .value-section {
    background: white;
    border-radius: 12px;
    padding: 3rem;
    margin: 4rem 0;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  }

  .section-title {
    font-weight: 800;
    font-size: 2rem;
    color: var(--dark);
    margin-bottom: 2rem;
    position: relative;
    display: inline-block;
  }

  .section-title:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 50px;
    height: 4px;
    background: var(--primary);
    border-radius: 2px;
  }

  .value-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
  }

  .value-item {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
  }

  .value-icon {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    background: var(--primary-light);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: 1.25rem;
  }

  .value-content h3 {
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: var(--dark);
  }

  .value-content p {
    color: #64748b;
    margin: 0;
  }

  /* Testimonial */
  .testimonial {
    background: var(--gradient);
    color: white;
    padding: 3rem;
    border-radius: 12px;
    margin: 3rem 0;
    position: relative;
    overflow: hidden;
  }

  .testimonial:before {
    content: '"';
    position: absolute;
    top: -30px;
    right: 30px;
    font-size: 120px;
    font-family: serif;
    color: rgba(255, 255, 255, 0.1);
  }

  .testimonial-text {
    font-size: 1.25rem;
    line-height: 1.7;
    position: relative;
    z-index: 1;
    margin-bottom: 1.5rem;
  }

  .testimonial-author {
    font-weight: 700;
  }

  /* CTA Section */
  .cta-section {
    text-align: center;
    margin: 4rem 0;
  }

  .cta-title {
    font-weight: 800;
    font-size: 2rem;
    margin-bottom: 1rem;
    color: var(--dark);
  }

  .cta-subtitle {
    color: #64748b;
    max-width: 600px;
    margin: 0 auto 2rem;
  }

  .cta-button {
    display: inline-block;
    background: var(--primary);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 8px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s;
    box-shadow: 0 4px 15px rgba(26, 183, 156, 0.3);
  }

  .cta-button:hover {
    background: var(--primary-dark);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(26, 183, 156, 0.4);
  }

  /* Responsive */
  @media (max-width: 768px) {
    .hero-title {
      font-size: 2rem;
    }
    
    .hero-subtitle {
      font-size: 1.1rem;
    }
  }
</style>
    <style>
        .tp-mg {
            margin: 40px;
        }
        @media (min-width: 768px) {
            .tp-mg {
                margin: 70px;
            }
        }
    </style>
<div class="tp-mg"></div>
<!-- Hero Section -->
<section class="hero">
  <div class="container text-center">
    <h1 class="hero-title">Write Your CS Exams with Confidence</h1>
    <p class="hero-subtitle">Join India's most trusted CS test series for CS Executive & Professional exams. Increase the chance of passing CS Exams by 82%..</p>
    <a href="#courses" class="cta-button">Explore Test Series</a>
  </div>
</section>

<!-- Exam Cards -->
<div class="container" id="courses">
  <h2 class="section-title">Choose Your Test Series</h2>
  <div class="card-grid">
    <?php if(!empty($level_list)): ?>
      <?php foreach ($level_list as $level): ?>
        <div class="exam-card">
          <div class="card-header">
            <div class="card-icon">
              <img src="<?=base_url()?>design_assets/images/category-1.svg" alt="<?=$level->level_name?>">
            </div>
          </div>
          <div class="card-body">
            <h3 class="card-title"><?=htmlspecialchars($level->level_name)?></h3>
            <p class="card-desc">Comprehensive test series with detailed solutions and performance analysis</p>
            <a href="javascript:void(0)" class="card-cta levelBtn" data-level-id="<?=$level->level_id?>">View Plans</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No levels available at the moment.</p>
    <?php endif; ?>
  </div>
</div>

<!-- Value Proposition -->
<div class="container">
  <div class="value-section">
    <h2 class="section-title">Why Our Test Series Works</h2>
    <p>Developed by top CS professionals and rank holders, our test series gives you the competitive edge needed to excel.</p>
    
    <div class="value-grid">
      <div class="value-item">
        <div class="value-icon">📈</div>
        <div class="value-content">
          <h3>Performance Tracking</h3>
          <p>Detailed analytics to identify strengths and weaknesses with All India ranking.</p>
        </div>
      </div>
      
      <div class="value-item">
        <div class="value-icon">⏱️</div>
        <div class="value-content">
          <h3>Exam Simulation</h3>
          <p>Timed tests that replicate actual exam pressure and environment.</p>
        </div>
      </div>
      
      <div class="value-item">
        <div class="value-icon">✍️</div>
        <div class="value-content">
          <h3>Answer Evaluation</h3>
          <p>Get expert feedback on answer presentation and structure.</p>
        </div>
      </div>
      
      <div class="value-item">
        <div class="value-icon">🎯</div>
        <div class="value-content">
          <h3>Syllabus Coverage</h3>
          <p>100% syllabus coverage with chapter-wise and full-length tests.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Testimonial -->
<div class="container">
  <div class="testimonial">
    <blockquote class="testimonial-text">
      "The test series was instrumental in my CS Professional preparation. The detailed feedback helped me improve my answer writing technique, and the mock exams gave me the confidence to face the actual exam without fear."
    </blockquote>
    <div class="testimonial-author">- Rohan Mehta, CS Professional</div>
  </div>
</div>

<!-- Writing Practice Benefits -->
<div class="container">
  <div class="value-section">
    <h2 class="section-title">The Power of Writing Practice</h2>
    <p>Reading alone won't help you clear CS exams. Our test series forces you to practice writing - the single most important skill for exam success.</p>
    
    <div class="value-grid">
      <div class="value-item">
        <div class="value-icon">🚀</div>
        <div class="value-content">
          <h3>Speed Building</h3>
          <p>Practice writing under time constraints to complete papers on time.</p>
        </div>
      </div>
      
      <div class="value-item">
        <div class="value-icon">🧠</div>
        <div class="value-content">
          <h3>Concept Retention</h3>
          <p>Writing reinforces learning better than passive reading.</p>
        </div>
      </div>
      
      <div class="value-item">
        <div class="value-icon">💯</div>
        <div class="value-content">
          <h3>Marking Scheme</h3>
          <p>Learn exactly what examiners look for in answers.</p>
        </div>
      </div>
      
      <div class="value-item">
        <div class="value-icon">😌</div>
        <div class="value-content">
          <h3>Stress Reduction</h3>
          <p>Familiarity with exam patterns reduces anxiety.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Final CTA -->
<div class="container">
  <div class="cta-section">
    <h2 class="cta-title">Ready to Ace Your CS Exams?</h2>
    <p class="cta-subtitle">Join thousands of successful CS students who trusted our test series for their preparation.</p>
    <a href="#courses" class="cta-button">Get Started Now</a>
  </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
<script src="<?=base_url()?>assets/js/custom_js/view.js?v=1.0.3"></script>
<?= $this->endSection() ?>
