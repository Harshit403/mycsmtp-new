<?php
$studentData = (session()->get('studentDetails')!==null) ? session()->get('studentDetails') : '';
$uri = current_url(true);
$base_url = base_url();
$segments = explode('/',str_replace($base_url,'',$uri));
?>
<header class="pro-header" data-header>
    <div class="pro-container">
        <a href="<?=base_url()?>" class="pro-logo">
            <img src="<?=base_url()?>images/logo-min.png" alt="MY CS MTP">
        </a>
        
        <nav class="pro-navbar" data-navbar>
            <ul class="pro-nav-list">
                <li class="pro-nav-item">
                    <a href="<?=base_url()?>" class="pro-nav-link <?=empty($segments[0]) ? 'active' : ''?>">Home</a>
                </li>
                
                <li class="pro-nav-item pro-dropdown">
                    <a href="javascript:void(0)" class="pro-nav-link dropdown-toggle">
                        Test Series <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="pro-dropdown-menu">
                        <?php foreach ($fetchLevels as $levelRow): ?>
                            <li>
                                <a class="pro-dropdown-item levelBtn" href="javascript:void(0)" data-level-id="<?=$levelRow['level_id']?>">
                                    <?=$levelRow['level_name']?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                
                <li class="pro-nav-item">
                    <a href="<?=base_url()?>plans" class="pro-nav-link <?=!empty($segments[0] && $segments[0]=='plans') ? 'active' : ''?>">Plans</a>
                </li>
                
                <li class="pro-nav-item">
                    <a href="<?=base_url()?>pricing" class="pro-nav-link <?=!empty($segments[0] && $segments[0]=='pricing') ? 'active' : ''?>">Pricing</a>
                </li>
                
                <li class="pro-nav-item">
                    <a href="<?=base_url()?>faq" class="pro-nav-link <?=!empty($segments[0] && $segments[0]=='faq') ? 'active' : ''?>">FAQ</a>
                </li>
                
                <li class="pro-nav-item pro-dropdown">
                    <a href="javascript:void(0)" class="pro-nav-link dropdown-toggle">
                        More <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="pro-dropdown-menu">
                        <li><a href="<?=base_url()?>sample-answersheet">Sample Answersheets</a></li>
                        <li><a href="<?=base_url()?>syllabus">Syllabus</a></li>
                        <li><a href="<?=base_url()?>testimonial">Testimonials</a></li>
                        <li><a href="<?=base_url()?>important-links">Important Links</a></li>
                        <li><a href="<?=base_url()?>why-us">Why Us</a></li>
                        <li><a href="<?=base_url()?>about-us">About Us</a></li>
                        <li><a href="<?=base_url()?>contact-us">Contact Us</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div class="pro-header-actions">
            <button class="pro-cart-btn showCartBtn" title="Cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="pro-cart-badge cartCount"><?=!empty($cartCount) ? $cartCount : 0?></span>
            </button>
            
            <?php if (!empty($studentData)): ?>
                <div class="pro-user-dropdown">
                    <button class="pro-user-btn" type="button" data-bs-toggle="dropdown">
                        <img src="<?=base_url()?>images/default_profile_image.jpg" alt="User">
                    </button>
                    <ul class="pro-user-menu dropdown-menu">
                        <li class="pro-user-info">
                            <span class="pro-user-name"><?=$studentData['student_name']?></span>
                            <span class="pro-user-role">Student</span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>profile"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>order-history"><i class="fas fa-file"></i> Order History</a></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="<?=base_url()?>sign-in" class="pro-btn-primary">
                    Join Now <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif ?>
            
            <button class="pro-menu-toggle" data-nav-toggler>
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    
    <div class="pro-mobile-nav" data-navbar>
        <div class="pro-mobile-header">
            <a href="<?=base_url()?>" class="pro-logo">
                <img src="<?=base_url()?>images/logo-min.png" alt="MY CS MTP">
            </a>
            <button class="pro-mobile-close" data-nav-toggler>
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <ul class="pro-mobile-list">
            <li><a href="<?=base_url()?>" class="<?=empty($segments[0]) ? 'active' : ''?>">Home</a></li>
            
            <li class="pro-mobile-group">
                <button class="pro-mobile-group-toggle">
                    Test Series <i class="fas fa-chevron-down"></i>
                </button>
                <ul class="pro-mobile-group-menu">
                    <?php foreach ($fetchLevels as $levelRow): ?>
                        <li><a class="levelBtn" href="javascript:void(0)" data-level-id="<?=$levelRow['level_id']?>"><?=$levelRow['level_name']?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            
            <li><a href="<?=base_url()?>plans" class="<?=!empty($segments[0] && $segments[0]=='plans') ? 'active' : ''?>">Plans</a></li>
            <li><a href="<?=base_url()?>pricing" class="<?=!empty($segments[0] && $segments[0]=='pricing') ? 'active' : ''?>">Pricing</a></li>
            <li><a href="<?=base_url()?>faq" class="<?=!empty($segments[0] && $segments[0]=='faq') ? 'active' : ''?>">FAQ</a></li>
            <li><a href="<?=base_url()?>sample-answersheet">Sample Answersheets</a></li>
            <li><a href="<?=base_url()?>syllabus">Syllabus</a></li>
            <li><a href="<?=base_url()?>testimonial">Testimonials</a></li>
            <li><a href="<?=base_url()?>important-links">Important Links</a></li>
            <li><a href="<?=base_url()?>why-us">Why Us</a></li>
            <li><a href="<?=base_url()?>about-us">About Us</a></li>
            <li><a href="<?=base_url()?>contact-us">Contact Us</a></li>
            
            <?php if (empty($studentData)): ?>
                <li><a href="<?=base_url()?>sign-in" class="pro-mobile-cta">Sign In / Register</a></li>
            <?php endif ?>
        </ul>
    </div>
    
    <div class="pro-overlay" data-nav-toggler></div>
</header>

<style>
.pro-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #ffffff;
    z-index: 9999;
    transition: all 0.3s ease;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
}

.pro-header.scrolled {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
}

.pro-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 72px;
}

.pro-logo img {
    height: 44px;
    width: auto;
}

.pro-navbar {
    display: flex;
    align-items: center;
}

.pro-nav-list {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.pro-nav-item {
    position: relative;
}

.pro-nav-link {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 12px 16px;
    color: #475569;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.pro-nav-link:hover,
.pro-nav-link.active {
    color: #059669;
    background: #f0fdf4;
}

.pro-nav-link i {
    font-size: 12px;
    transition: transform 0.2s ease;
}

.pro-dropdown:hover .pro-nav-link i {
    transform: rotate(180deg);
}

.pro-dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 200px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    padding: 8px;
    list-style: none;
    margin: 8px 0 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.pro-dropdown:hover .pro-dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.pro-dropdown-item {
    display: block;
    padding: 10px 16px;
    color: #475569;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.pro-dropdown-item:hover {
    background: #f0fdf4;
    color: #059669;
}

.pro-header-actions {
    display: flex;
    align-items: center;
    gap: 12px;
}

.pro-cart-btn {
    position: relative;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8fafc;
    border: none;
    border-radius: 10px;
    color: #475569;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.pro-cart-btn:hover {
    background: #f0fdf4;
    color: #059669;
}

.pro-cart-badge {
    position: absolute;
    top: -4px;
    right: -4px;
    min-width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #059669;
    color: #ffffff;
    font-size: 11px;
    font-weight: 600;
    border-radius: 50%;
}

.pro-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.pro-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(5, 150, 105, 0.35);
    color: #ffffff;
}

.pro-btn-primary i {
    font-size: 12px;
    transition: transform 0.2s ease;
}

.pro-btn-primary:hover i {
    transform: translateX(4px);
}

.pro-user-dropdown {
    position: relative;
}

.pro-user-btn {
    width: 44px;
    height: 44px;
    padding: 0;
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 50%;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.2s ease;
}

.pro-user-btn:hover {
    border-color: #059669;
}

.pro-user-btn img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.pro-user-menu {
    min-width: 220px;
    padding: 12px;
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
}

.pro-user-info {
    padding: 8px 12px;
}

.pro-user-name {
    display: block;
    font-size: 15px;
    font-weight: 600;
    color: #1e293b;
}

.pro-user-role {
    display: block;
    font-size: 13px;
    color: #64748b;
    font-style: italic;
}

.pro-user-menu .dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 12px;
    font-size: 14px;
    color: #475569;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.pro-user-menu .dropdown-item:hover {
    background: #f0fdf4;
    color: #059669;
}

.pro-user-menu .dropdown-item i {
    width: 18px;
    text-align: center;
}

.pro-menu-toggle {
    display: none;
    width: 44px;
    height: 44px;
    background: #f8fafc;
    border: none;
    border-radius: 10px;
    color: #475569;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.pro-menu-toggle:hover {
    background: #f0fdf4;
    color: #059669;
}

.pro-mobile-nav {
    position: fixed;
    top: 0;
    left: -100%;
    width: 100%;
    max-width: 320px;
    height: 100vh;
    background: #ffffff;
    z-index: 10000;
    transition: all 0.3s ease;
    overflow-y: auto;
}

.pro-mobile-nav.active {
    left: 0;
}

.pro-mobile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    border-bottom: 1px solid #e2e8f0;
}

.pro-mobile-close {
    width: 40px;
    height: 40px;
    background: #f8fafc;
    border: none;
    border-radius: 10px;
    color: #475569;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.pro-mobile-close:hover {
    background: #fee2e2;
    color: #dc2626;
}

.pro-mobile-list {
    list-style: none;
    margin: 0;
    padding: 16px;
}

.pro-mobile-list > li {
    border-bottom: 1px solid #f1f5f9;
}

.pro-mobile-list > li > a {
    display: block;
    padding: 14px 0;
    color: #475569;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.2s ease;
}

.pro-mobile-list > li > a:hover,
.pro-mobile-list > li > a.active {
    color: #059669;
}

.pro-mobile-group {
    border-bottom: 1px solid #f1f5f9;
}

.pro-mobile-group-toggle {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 14px 0;
    background: none;
    border: none;
    color: #475569;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.pro-mobile-group-toggle:hover {
    color: #059669;
}

.pro-mobile-group-toggle i {
    transition: transform 0.2s ease;
}

.pro-mobile-group-toggle.active i {
    transform: rotate(180deg);
}

.pro-mobile-group-menu {
    display: none;
    list-style: none;
    padding: 0 0 16px 16px;
}

.pro-mobile-group-menu.active {
    display: block;
}

.pro-mobile-group-menu li a {
    display: block;
    padding: 10px 0;
    color: #64748b;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.pro-mobile-group-menu li a:hover {
    color: #059669;
}

.pro-mobile-cta {
    display: block;
    margin-top: 16px;
    padding: 14px 24px;
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    color: #ffffff !important;
    font-size: 15px;
    font-weight: 600;
    text-align: center;
    border-radius: 10px;
}

.pro-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.pro-overlay.active {
    opacity: 1;
    visibility: visible;
}

@media (max-width: 992px) {
    .pro-navbar {
        display: none;
    }
    
    .pro-menu-toggle {
        display: flex;
    }
}

@media (max-width: 480px) {
    .pro-container {
        padding: 0 16px;
        height: 64px;
    }
    
    .pro-logo img {
        height: 36px;
    }
    
    .pro-btn-primary {
        padding: 10px 18px;
        font-size: 13px;
    }
    
    .pro-cart-btn {
        width: 40px;
        height: 40px;
        font-size: 16px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.pro-header');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    const mobileGroupToggles = document.querySelectorAll('.pro-mobile-group-toggle');
    mobileGroupToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            this.classList.toggle('active');
            this.nextElementSibling.classList.toggle('active');
        });
    });
});
</script>
