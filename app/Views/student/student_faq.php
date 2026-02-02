<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    FAQ
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style type="text/css">
.faq-title h2 {
  position: relative;
  margin-bottom: 45px;
  display: inline-block;
  font-weight: 600;
  line-height: 1;
}
.faq-title h2::before {
    content: "";
    position: absolute;
    left: 50%;
    width: 60px;
    height: 2px;
    background: #E91E63;
    bottom: -25px;
    margin-left: -30px;
}
.faq-title p {
  padding: 0 190px;
  margin-bottom: 10px;
}

.faq {
  background: #FFFFFF;
  box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);
  border-radius: 4px;
}

.faq .card {
  border: none;
  background: none;
  border-bottom: 1px dashed #CEE1F8;
}

.faq .card .card-header {
  padding: 0px;
  border: none;
  background: none;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}

.faq .card .card-header:hover {
    background: rgb(122, 235, 211);
    padding-left: 10px;
}
.faq .card .card-header .faq-title {
  width: 100%;
  text-align: left;
  padding: 0px;
  padding-left: 30px;
  padding-right: 30px;
  font-weight: 400;
  font-size: 15px;
  letter-spacing: 1px;
  color: #3B566E;
  text-decoration: none !important;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  cursor: pointer;
  padding-top: 20px;
  padding-bottom: 20px;
}

.faq .card .card-header .faq-title .badge {
  display: inline-block;
  width: 33px;
  height: 20px;
  line-height: 14px;
  float: left;
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
  text-align: center;
  background: #1ec8a3;
  color: #fff;
  font-size: 12px;
  margin-right: 20px;
}

.faq .card .card-body {
  padding: 30px;
  padding-left: 35px;
  padding-bottom: 16px;
  font-weight: 400;
  font-size: 16px;
  color: #6F8BA4;
  line-height: 28px;
  letter-spacing: 1px;
  border-top: 1px solid #F3F8FF;
}

.faq .card .card-body p {
  margin-bottom: 14px;
}

@media (max-width: 991px) {
  .faq {
    margin-bottom: 30px;
  }
  .faq .card .card-header .faq-title {
    line-height: 26px;
    margin-top: 10px;
  }
}
</style>
    <section class="container mt-3 mb-5 section faq-section">
        <div class="text-center">
            <h2>FAQ</h2>
        </div>
		<div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="faq" id="accordion">
                            <div class="card">
                                <div class="card-header" id="faqHeading-1">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                            <span class="badge">1</span> Why Should I Choose MY CS MTP ?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>At MY CS MTP, we're dedicated to being your ultimate partner on the path to academic excellence. Choosing our test series means choosing a comprehensive, effective, and rewarding preparation experience With below features:<br>
										</p>
										<ul>
											<li>Expert crafted Test papers</li>
											<li>Wide topic coverage</li>
											<li>Real exam Simulation</li>
											<li>Improvement ideas</li>
											<li>Flexibility  and Convenience</li>
											<li>Expert Guidances</li>
										</ul>
										
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-2">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                            <span class="badge">2</span> How many times I can submit Answersheets for evaluation ?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>You  will get access to submit Answersheet only one time per test.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-3">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                            <span class="badge">3</span>After how much time I'll get Evaluated Answersheets uploaded by me?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>You'll get Evaluated Answersheet with 2-3  Working days, but in unusual circumstances  it may delay.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-4">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-4" data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                            <span class="badge">4</span> Is it important to follow the time limit mentioned in the question paper?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>You can write your Test series  anytime within your validity period, But you should strictly follow the scheduled date.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-5">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-5" data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                            <span class="badge">5</span> Who can enroll in the test series?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>CS Students of All levels can Enroll for Test&nbsp;series</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-6">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-6" data-aria-expanded="false" data-aria-controls="faqCollapse-6">
                                            <span class="badge">6</span> Do you provide tips or strategies for improving test performance?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-6" class="collapse" aria-labelledby="faqHeading-6" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Yes, We provide Improvement ideas and Comments on each Answers checked by us</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-7">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-7" data-aria-expanded="false" data-aria-controls="faqCollapse-7">
                                            <span class="badge">7</span> Is there a validity period for accessing the test series?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-7" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Your Purchase will expire on conclusion  of Attempt you are enrolling for or 6 Months Whichever is earlier.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-8">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-8" data-aria-expanded="false" data-aria-controls="faqCollapse-8">
                                            <span class="badge">8</span> What types of questions are included in the tests?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-8" class="collapse" aria-labelledby="faqHeading-8" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Our Question papers are designed based on Institute pattern.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-9">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-9" data-aria-expanded="false" data-aria-controls="faqCollapse-9">
                                            <span class="badge">9</span> Can I customize the order of subjects I want to take?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-9" class="collapse" aria-labelledby="faqHeading-9" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Yes, you can buy Any test series of any subjects based on your requirements.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-10">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-10" data-aria-expanded="false" data-aria-controls="faqCollapse-10">
                                            <span class="badge">10</span> Can I access the tests on any device?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-10" class="collapse" aria-labelledby="faqHeading-10" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Yes, you can Download question paper on Any device like Android, Windows, iOS.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-11">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-11" data-aria-expanded="false" data-aria-controls="faqCollapse-11">
                                            <span class="badge">11</span> What will be the format of Question papers?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-11" class="collapse" aria-labelledby="faqHeading-11" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Question papers will be provided in PDF Format.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-12">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-12" data-aria-expanded="false" data-aria-controls="faqCollapse-12">
                                            <span class="badge">12</span> Who will Set the question paper?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-12" class="collapse" aria-labelledby="faqHeading-12" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Question paper will be set by the subject experts.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-13">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-13" data-aria-expanded="false" data-aria-controls="faqCollapse-13">
                                            <span class="badge">13</span> Who will Evaluate the Answersheets?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-13" class="collapse" aria-labelledby="faqHeading-13" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Answersheets will be evaluated by out team of experts.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-14">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-14" data-aria-expanded="false" data-aria-controls="faqCollapse-14">
                                            <span class="badge">14</span> How Can I Get Support?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-14" class="collapse" aria-labelledby="faqHeading-14" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>You can reach us though Chat on our website, whatsApp at +919540097210 or  you can directly mail us at.</br>support@mycsmtp.com</p>
                                    </div>
                                </div>
                            </div>


	   <div class="card">
                                <div class="card-header" id="faqHeading-16">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-16" data-aria-expanded="false" data-aria-controls="faqCollapse-14">
                                            <span class="badge">14</span> What is the last Attempt day of submission of Answersheets for evaluation?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-16" class="collapse" aria-labelledby="faqHeading-16" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>You can submit the answer sheet up to one week before the commencement of the final examination of respective attempt</p>
                                    </div>
                                </div>
	   </div>			





   <div class="card">
                                <div class="card-header" id="faqHeading-16">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-16" data-aria-expanded="false" data-aria-controls="faqCollapse-14">
                                            <span class="badge">15</span> Which is best CS Test Series?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-16" class="collapse" aria-labelledby="faqHeading-16" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>My CS MTP Test Series is considered to be the most trusted and reliable test series for the CS exams. </p>
                                    </div>
                                </div>
                            </div>








                            <div class="card">
                                <div class="card-header" id="faqHeading-15">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-15" data-aria-expanded="false" data-aria-controls="faqCollapse-15">
                                            <span class="badge">16</span> In which language we can write mock test series?
                                        </h5>
                                    </div>
                                </div>

                                <div id="faqCollapse-15" class="collapse" aria-labelledby="faqHeading-15" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We Provide test series for both English and Hindi languages students.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
        <!-- </div> -->
    </section>
<?= $this->endSection() ?>
<?= $this->section('jsContent')?>
<script type="text/javascript">
	var pageType="student_faq";
</script>
<?= $this->endSection() ?>
