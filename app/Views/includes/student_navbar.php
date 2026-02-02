 <?php
        $studentData = (session()->get('studentDetails')!==null) ? session()->get('studentDetails') : '';
        $uri = current_url(true);
        $base_url = base_url();
        $segments = explode('/',str_replace($base_url,'',$uri));
    ?>
    <div style="display: none;">
        <div class="cartPopUpContainer"></div>
    </div>
    <header class="header" data-header>
    <div class="container" id="nav-content">
        <a href="<?=base_url()?>" class="logo">
            <img src="<?=base_url()?>images/logo-min.png" style="height: 50px;width: 162px;" alt="Logo">
        </a>
        <nav class="navbaritem" data-navbar>
            <div class="wrapper">
                <a href="<?=base_url()?>" class="logo">
                    <img src="<?=base_url()?>images/logo-min.png" style="height: 50px;width: 162px;" alt="Logo">
                </a>
                <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>
            </div>
            <ul class="navbar-list">
                <li class="navbar-item">
                    <a href="<?=base_url()?>" class="navbar-link" data-nav-link>Home</a>
                </li>
                <?php if (session()->get('studentDetails')==null): ?>
                   <li class="navbar-item">
                        <a href="<?=base_url()?>sign-in" class="navbar-link" data-nav-link>Sign-in/Up</a>
                    </li> 
                <?php endif ?>
                <li class="navbar-item">
                    <div class="dropdown navbar-link mainOthers">
                      <a class="btn dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.5rem !important;text-align: left !important;">
                        Level
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php foreach ($fetchLevels as $levelRow) {
                            ?>
                                <li>
                                    <a class="dropdown-item levelBtn" href="javascript:void(0)" data-level-id="<?=$levelRow['level_id']?>"><?=$levelRow['level_name']?>
                                    </a>
                                </li>
                            <?php
                        }
                        ?>
                      </ul>
                    </div>
                    <div class="reponsiveOthers">
                        <a class="navbar-link d-flex align-items-center" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Test Series <ion-icon name="caret-down-outline"></ion-icon>
                        </a>
                        <ul class="collapse" id="collapseExample">
                            <?php foreach ($fetchLevels as $levelRow) {
                            ?>
                                <li>
                                    <a class="dropdown-item levelBtn" href="javascript:void(0)" data-level-id="<?=$levelRow['level_id']?>"><?=$levelRow['level_name']?>
                                    </a>
                                </li>
                            <?php
                        }
                        ?>
                        </ul>
                    </div>
                </li>
                <li class="navbar-item">
                    <a href="<?=base_url()?>plans" class="navbar-link <?=!empty($segments[0] && $segments[0]=='plans') ? 'active' : ''?>" data-nav-link>Plans</a>
                </li>
                <li class="navbar-item">
                    <a href="<?=base_url()?>pricing" class="navbar-link <?=!empty($segments[0] && $segments[0]=='pricing') ? 'active' : ''?>" data-nav-link>Pricing</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link <?=!empty($segments[0] && $segments[0]=='faq') ? 'active' : ''?>" href="<?=base_url()?>faq">FAQ</a>
                </li>
                
                <li class="navbar-item reponsiveOthers">
                    <a href="<?=base_url()?>sample-answersheet" class="navbar-link <?=!empty($segments[0] && $segments[0]=='sample-answersheet') ? 'active' : ''?>" data-nav-link>Sample Answersheets</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a href="<?=base_url()?>syllabus" class="navbar-link <?=!empty($segments[0] && $segments[0]=='syllabus') ? 'active' : ''?>" data-nav-link>Syllabus</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a href="<?=base_url()?>testimonial" class="navbar-link <?=!empty($segments[0] && $segments[0]=='testimonial') ? 'active' : ''?>" data-nav-link>Testimonials</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a href="#blog" data-nav-toggler>Blog</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a class="navbar-link <?=(!empty($segments[0]) && ($segments[0]=='important-links') ? 'active' : '')?>" href="<?=base_url()?>important-links">Important Link</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a class="navbar-link <?=(!empty($segments[0]) && ($segments[0]=='why-us') ? 'active' : '')?>" href="<?=base_url()?>why-us">Why Us</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a class="navbar-link <?=(!empty($segments[0]) && ($segments[0]=='about-us') ? 'active' : '')?>" href="<?=base_url()?>about-us">About Us</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a class="navbar-link <?=(!empty($segments[0]) && ($segments[0]=='contact-us') ? 'active' : '')?>" href="<?=base_url()?>contact-us">Contact Us</a>
                </li>
            </ul>
        </nav>
        <div class="header-actions">
            <button class="header-action-btn showCartBtn" aria-label="cart" title="Cart">
                <ion-icon name="cart-outline" aria-hidden="true"></ion-icon>
                <span class="btn-badge cartCount"><?=!empty($cartCount) ? $cartCount : 0?></span>
            </button>
            <?php if (!empty($studentData)): ?>
                <div class="dropdown">
                  <button class="" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url()?>images/default_profile_image.jpg" class="img-circle" style="height: 30px;width: 30px">
                  </button>
                  <ul class="dropdown-menu dropdown-menu-lg-start" aria-labelledby="dropdownMenuButton2" style="width: 200px">
                    <li><a class="dropdown-item h4" href="#" style="pointer-events: none; font-weight: 600"><?=$studentData['student_name']?></a></li>
                    <li><a class="dropdown-item h5 fw-light fst-italic" href="#" style="pointer-events: none; font-weight: 600">Student</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item h5 text-success d-flex" href="<?=base_url()?>profile"><i class="fas fa-user fa-fw"></i> Profile</a></li>
                    <li><a class="dropdown-item h5 text-success d-flex" href="<?=base_url()?>order-history"><i class="fas fa-file fa-fw"></i> Order History</a></li>
                    <li><a class="dropdown-item h5 text-success d-flex" href="<?=base_url()?>dashboard"><i class="fas fa-tachometer-alt fa-fw"></i> Dashboard</a></li>
                    <li><a class="dropdown-item h5 text-success d-flex" href="<?=base_url()?>logout"><i class="fas fa-sign-out-alt fa-fw"></i> Logout</a></li>
                  </ul>
                </div>
            <?php else: ?>
                <a href="<?=base_url()?>sign-in" class="btn btn-class has-before">
                    <span class="span">Join Now</span>
                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
            <?php endif ?>
            
            <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>
        </div>
        <div class="overlay" data-nav-toggler data-overlay></div>
    </div>
</header>
