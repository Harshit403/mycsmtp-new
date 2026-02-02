<?php
$studentData = (session()->get('studentDetails')!==null) ? session()->get('studentDetails') : '';
$uri = current_url(true);
$base_url = base_url();
$segments = explode('/',str_replace($base_url,'',$uri));
?>
<style>
body {
    padding-top: 72px;
}
/* Checkout Modal Styles */
.bootbox.modal {
    z-index: 99999 !important;
    backdrop-filter: blur(5px);
}

.bootbox .modal-dialog {
    max-width: 95%;
    width: 500px;
    margin: 1.75rem auto;
}

.bootbox .modal-content {
    border: none;
    border-radius: 16px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    overflow: hidden;
}

.bootbox .modal-header {
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    color: #ffffff;
    padding: 20px 24px;
    border: none;
}

.bootbox .modal-title {
    font-size: 1.25rem;
    font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.bootbox .btn-close {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1;
    transition: all 0.2s ease;
}

.bootbox .btn-close:hover {
    background: rgba(255, 255, 255, 0.4);
}

.bootbox .modal-body {
    padding: 24px;
    max-height: 70vh;
    overflow-y: auto;
}

.bootbox .modal-footer {
    padding: 16px 24px;
    border-top: 1px solid #e2e8f0;
    background: #f8fafc;
}

.bootbox .table {
    margin-bottom: 16px;
}

.bootbox .table th,
.bootbox .table td {
    padding: 12px;
    vertical-align: middle;
}

.bootbox .table td {
    border-color: #f1f5f9;
}

.bootbox .table .font-weight-bold {
    font-weight: 600 !important;
    color: #1e293b;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.bootbox .promocodeContainer {
    display: flex;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.2s ease;
}

.bootbox .promocodeContainer:focus-within {
    border-color: #059669;
    box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
}

.bootbox .promocodeContainer input {
    border: none;
    padding: 12px 16px;
    font-size: 14px;
    outline: none;
}

.bootbox .promocodeContainer .btn {
    border: none;
    border-radius: 0;
    padding: 12px 20px;
    font-weight: 600;
    font-size: 14px;
}

.bootbox .promocodeError {
    font-size: 13px;
    min-height: 20px;
}

.bootbox .text-right {
    font-family: 'Inter', sans-serif;
}

.bootbox .modal-backdrop {
    z-index: 99998 !important;
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(4px);
}

/* Responsive Modal Styles */
@media (max-width: 768px) {
    .bootbox .modal-dialog {
        width: 95%;
        margin: 1rem auto;
    }
    
    .bootbox .modal-header {
        padding: 16px 20px;
    }
    
    .bootbox .modal-title {
        font-size: 1.1rem;
    }
    
    .bootbox .modal-body {
        padding: 16px;
    }
    
    .bootbox .table th,
    .bootbox .table td {
        padding: 10px 8px;
        font-size: 13px;
    }
    
    .bootbox .table td:first-child {
        max-width: 180px;
    }
    
    .bootbox .promocodeContainer {
        width: 100% !important;
    }
    
    .bootbox .modal-footer {
        flex-direction: column;
        gap: 12px;
        padding: 16px;
    }
    
    .bootbox .modal-footer .btn {
        width: 100%;
        padding: 12px;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .bootbox .modal-dialog {
        width: 98%;
        margin: 0.5rem auto;
    }
    
    .bootbox .modal-header {
        padding: 14px 16px;
    }
    
    .bootbox .modal-title {
        font-size: 1rem;
    }
    
    .bootbox .modal-body {
        padding: 12px;
        max-height: 65vh;
    }
    
    .bootbox .table td {
        font-size: 12px;
    }
    
    .bootbox .table td:first-child {
        max-width: 140px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .bootbox .font-weight-bold {
        font-size: 13px;
    }
    
    .bootbox .row {
        margin: 0 -4px;
    }
    
    .bootbox .col-md-9,
    .bootbox .col-md-3 {
        padding: 4px;
        font-size: 13px;
    }
}

@media (max-width: 360px) {
    .bootbox .modal-body {
        padding: 10px;
    }
    
    .bootbox .table td:first-child {
        max-width: 120px;
    }
    
    .bootbox .modal-footer {
        padding: 12px 10px;
    }
    
    .bootbox .modal-footer .btn {
        padding: 10px;
        font-size: 13px;
    }
}

/* All Bootbox Modals - Universal Fix */
.bootbox.modal.fade.show {
    z-index: 99999 !important;
}

.bootbox.modal.fade.show .modal-dialog {
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        transform: translateY(-30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Small confirmation dialogs */
.bootbox.modal.fade .modal-dialog.modal-sm {
    max-width: 400px;
}

.bootbox .modal-body {
    font-family: 'Inter', sans-serif;
}

/* Scrollbar styling for modal content */
.bootbox .modal-body::-webkit-scrollbar {
    width: 6px;
}

.bootbox .modal-body::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

.bootbox .modal-body::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

.bootbox .modal-body::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>
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

.pro-menu-toggle.active i::before {
    content: '\f00d';
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
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow-y: auto;
    overscroll-behavior: contain;
}

.pro-mobile-nav.active {
    left: 0;
    box-shadow: 10px 0 40px rgba(0, 0, 0, 0.2);
}

.pro-mobile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    border-bottom: 1px solid #e2e8f0;
    position: sticky;
    top: 0;
    background: #ffffff;
    z-index: 1;
}

.pro-mobile-close {
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

.pro-mobile-close:hover {
    background: #fee2e2;
    color: #dc2626;
}

.pro-mobile-close i {
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
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
    padding-left: 8px;
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
    font-size: 12px;
    transition: transform 0.3s ease;
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
    padding-left: 8px;
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
    transition: all 0.3s ease;
}

.pro-mobile-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(5, 150, 105, 0.35);
    padding-left: 24px;
}

.pro-overlay {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(4px);
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
        align-items: center;
        justify-content: center;
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
    
    .pro-mobile-nav {
        max-width: 280px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.pro-header');
    const menuToggle = document.querySelector('.pro-menu-toggle');
    const mobileNav = document.querySelector('.pro-mobile-nav');
    const overlay = document.querySelector('.pro-overlay');
    const mobileClose = document.querySelector('.pro-mobile-close');
    const body = document.body;
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    function openMobileNav() {
        mobileNav.classList.add('active');
        overlay.classList.add('active');
        body.style.overflow = 'hidden';
    }
    
    function closeMobileNav() {
        mobileNav.classList.remove('active');
        overlay.classList.remove('active');
        body.style.overflow = '';
    }
    
    if (menuToggle) {
        menuToggle.addEventListener('click', openMobileNav);
    }
    
    if (mobileClose) {
        mobileClose.addEventListener('click', closeMobileNav);
    }
    
    if (overlay) {
        overlay.addEventListener('click', closeMobileNav);
    }
    
    const mobileGroupToggles = document.querySelectorAll('.pro-mobile-group-toggle');
    mobileGroupToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            this.classList.toggle('active');
            this.nextElementSibling.classList.toggle('active');
        });
    });
    
    const mobileLinks = document.querySelectorAll('.pro-mobile-list a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (!this.classList.contains('pro-mobile-group-toggle')) {
                closeMobileNav();
            }
        });
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
            closeMobileNav();
        }
    });
});
</script>
