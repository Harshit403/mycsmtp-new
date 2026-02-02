<?= $this->extend("layout/student_layout") ?>
<?= $this->section("title") ?>
Sample Answersheet
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<section class="container mt-3 mb-5 section">
    <style>
        #image-slider {
          width: 100%;
          max-width: 100%; /* Adjust max-width as needed for responsiveness */
          margin: auto;
          height: 300px; /* Adjust height as needed */
          overflow: hidden;
          position: relative;
        }
        
        #image-slider img {
          width: 100%;
          height: auto;
          display: none;
          position: absolute;
        }
        
        @keyframes fade {
          0%, 100% {
            opacity: 0;
          }
          20%, 80% {
            opacity: 1;
          }
        }
        
        #title {
          text-align: center;
          padding: 20px;
          background-color: #1AB79C;
          color: white;
        }
        
        #benefits {
          padding: 20px;
          text-align: center;
          background-color: #fff;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          margin: 20px auto;
          max-width: 800px;
        }
        
        .levelSection .card {
          background-color: red; /* Pink background color */
          padding: 20px;
          margin: 10px 0px;
          color: #ffffff;
          width: 100%; /* Adjust width as needed */
          text-align: center;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          text-align: center;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        
        #how-to-write {
          padding: 20px;
          text-align: center;
          background-color: #fff;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          margin: 20px auto;
          max-width: 800px;
        }
        
        #auto-slide-images {
          margin: 20px auto;
          text-align: center;
        }
        
        #auto-slide-images img {
          width: 100%;
          max-width: 100%;
          height: auto;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          margin-bottom: 10px;
        }
        
        @media only screen and (max-width: 600px) {
          #image-slider {
        height: 200px; /* Adjust height for smaller screens */
          }
        
          .card {
        width: 90%; /* Adjust width for smaller screens */
          }
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        .custom-slider-container {
            width: 100%;
            overflow: hidden;
        }
        
        .custom-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        
        .custom-slide {
            min-width: 100%;
            box-sizing: border-box;
        }
        
        .custom-slide img {
            width: 100%;
            height: auto;
        }
    </style>
    <div class="row">
      <div class="col-md-12">
        <div id="image-slider">
          <img src="<?= base_url() ?>images/s1.png" alt="Image 1" style="height: 300px;">
          <img src="<?= base_url() ?>images/s2.png" alt="Image 2" style="height: 300px;">
          <img src="<?= base_url() ?>images/s3.png" alt="Image 3" style="height: 300px;">
        </div>
        <div id="title">
          <h1>MY CS MTP TEST SERIES</h1>
        </div>
      </div>
    </div>

    <!-----------------------PHP FUNCTION-------------------->
    <div class="row levelSection">
        <?php if (!empty($fetchAllLevelLists)): ?>
          <?php foreach ($fetchAllLevelLists as $value): ?>
            <div class="col-md-12">
              <div class="card">
                  <h3 class="h3 text-white">
                      <?=!empty($value['level_name']) ? $value['level_name'] : ''?>
                  </h3>
                  <a href="<?=base_url().'level/type/'.(!empty($value['level_id']) ? $value['level_id'] : '')?>" class="stretched-link"></a>
              </div>
            </div>
          <?php endforeach ?>
        <?php endif ?>
    </div>
<!----------------------PHP FUNCTION END--------------------->
    <div class="row">
        <div class="col-md-12">
            <div id="how-to-write">
                <h2>
                    <font color="black">Our Evaluations</font>
                </h2>
                <p>The sample Answersheets help you in understanding evaluation process of CS Test series papers, Highlighting areas for improvement to achieve higher marks in exams. Our CS test series papers are designed and alligned with the latest amendments and updates. Exploring the sample Answersheets of CS Executive and CS Professional will help you in gaining the assessment process, and how feedback and suggestions are provided to students.</p>
            </div>
            <h3>
                <center>Sample Answersheets</center>
            </h3>
            <div class="custom-slider-container">
                <div class="custom-slider">
                    <div class="custom-slide"><img src="<?= base_url() ?>images/copy1.jpg" alt="Image 1"></div>
                    <div class="custom-slide"><img src="<?= base_url() ?>images/copy2.jpg" alt="Image 2"></div>
                    <div class="custom-slide"><img src="<?= base_url() ?>images/copy3.jpg" alt="Image 3"></div>
                    <div class="custom-slide"><img src="<?= base_url() ?>images/copy4.jpg" alt="Image 3"></div>
                    <div class="custom-slide"><img src="<?= base_url() ?>images/copy5.jpg" alt="Image 3"></div>
                    <!-- Add more slides as needed -->
                </div>
            </div>
            <!-----------------Bottom content ----------------->
            <hr>
            <div>
                <h1>
                    <font color="black">
                        <center>Benefits of detailed Evaluation</center>
                    </font>
                </h1>
                </font>
                <hr>
                <font color="black">
                    Detailed evaluation of answer sheets with personalized improvement Tips in a CS test series is a smart way to prepare for the CSEET, CS Executive and CS Professional exams. These exams are First ,second and third levels of the Company Secretary course, which is a Prestigious career option for commerce students. By taking a CS Test series that provides detailed feedback and Tips on Test Series Answersheets, students can enjoy the following benefits:
                    <br><br>
                    <b>Targeted Feedback:</b> Students receive specific feedback on their performance in each module and Test Series paper of the CS Executive and CS Professional Test Series, allowing them to focus on areas that need improvement rather than generic advice. For example, if a student scores low in Corporate Restructuring, Insolvency, Liquidation and Winding-up, they will get tips on how can they improve their score where they are lacking.
                    <br><br><b>
                        Individualized Learning:</b> Personalized tips cater to each student's unique strengths and weaknesses, providing a tailored learning experience for more effective progress. For Example, if a CS Professional student is good at Drafting, Pleadings and Appearances, they will get tips on how can they make their strength to this subject. On the other hand, if a student struggles with Advanced Tax Laws, they will get tips on how to Improve and practice Questions and the concepts.
                    <br><br><b>
                        Clarification of Concepts: </b>Clear feedback helps students understand where they went wrong, facilitating a deeper comprehension of concepts and preventing repeated mistakes. For example, if a CS Executive student makes a mistake in applying the Companies Act Provision , they will get feedback on the correct interpretation and application of the Provisions.
                    <br><br><b>
                        Motivation:</b> Positive feedback and recognition of strengths motivate students, while constructive criticism guides them toward improvement, fostering a positive learning environment. For instance, if a student performs well in Governance, Risk Management, Compliances and Ethics, they will get praise and encouragement, while if they perform poorly in Corporate Funding and Listing in Stock Exchanges, they will get suggestions and support.
                    <br><br><b>
                        Efficient Time Management: </b>Tips on time management during the CS exam help students allocate their time wisely, ensuring they complete all sections and questions within the given timeframe. For example, if a student spends too much time on one question or section, they will get tips on how to prioritize and distribute their time among different questions and sections.
                    <br><br><b>
                        Building Confidence</b>: Regular personalized feedback instills confidence in students, making them feel more prepared and capable as they approach their main CS exams. For instance, if a CS Professional student scores high in Multidisciplinary Case Studies while writing MU CS MTP TEST SERIES, they will get confidence and assurance, while if they score low in an elective subject, they will get reassurance and guidance.
                    <br><br><b>
                        Adaptive Learning:</b> Continuous assessment and feedback allow CS Executive and CS Professional students to adapt their study strategies based on real-time performance data, optimizing their approach to the CS exam. For example, if a student notices that they are improving in one subject or module in CS Test Series, they will get tips on how to maintain and enhance their performance, while if they notice that they are declining in another subject or module in CS Test Series, they will get tips on how to revise and recover their performance.
                    <br><br>
                    By taking CS test series that provides detailed evaluation of answer sheets with personalized improvement tips, students can prepare for the CS Executive and CS Professional exams in a smart and effective way, increasing their chances of success and achieving their career goals.
                </font>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>
<?= $this->section("jsContent") ?>
<script>
    var baseUrl = "<?= base_url() ?>";
</script>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.querySelector('.custom-slider');
        let slideIndex = 0;

        function showSlide(index) {
            const totalSlides = document.querySelectorAll('.custom-slide').length;
            index = (index + totalSlides) % totalSlides;
            slider.style.transform = `translateX(-${index * 100}%)`;
            slideIndex = index;
        }

        function autoSlide() {
            showSlide(slideIndex + 1);
        }

        setInterval(autoSlide, 3000); // Change the interval as needed (in milliseconds)
    });
</script>
<?= $this->endSection() ?>