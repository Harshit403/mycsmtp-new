 <?php
 $studentData =
     session()->get("studentDetails") !== null
         ? session()->get("studentDetails")
         : "";
 $uri = current_url(true);
 $base_url = base_url();
 $segments = explode("/", str_replace($base_url, "", $uri));
 ?>
    <div class="d-none">
        <div class="cartPopUpContainer"></div>
    </div>
    <header class="header shadcn-header" data-header>
    <div class="container" id="nav-content">
        <a href="<?= base_url() ?>" class="logo">
            <img src="<?= base_url() ?>images/logo-min.png" class="navbar-logo" alt="My CS MTP Test Series Logo" width="162" height="50">
        </a>
        <nav class="navbaritem" data-navbar>
            <div class="wrapper">
                <a href="<?= base_url() ?>" class="logo">
                    <img src="<?= base_url() ?>images/logo-min.png" class="navbar-logo-mobile" alt="My CS MTP Test Series Logo" width="162" height="50">
                </a>
                <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>
            </div>
            <ul class="navbar-list">
                <li class="navbar-item">
                    <a href="<?= base_url() ?>" class="navbar-link" data-nav-link>Home</a>
                </li>
                <?php if (session()->get("studentDetails") == null): ?>
                   <li class="navbar-item">
                        <a href="<?= base_url() ?>sign-in" class="navbar-link" data-nav-link>Sign-in/Up</a>
                    </li>
                <?php endif; ?>
                <li class="navbar-item">
                    <div class="dropdown navbar-link mainOthers">
                      <a class="btn dropdown-toggle w-100 level-dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Level
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php foreach ($fetchLevels as $levelRow) { ?>
                                <li>
                                    <a class="dropdown-item levelBtn" href="<?= base_url() ?>level/type/<?= $levelRow[
    "level_id"
] ?>" data-level-id="<?= $levelRow["level_id"] ?>"><?= $levelRow[
    "level_name"
] ?>
                                    </a>
                                </li>
                            <?php } ?>
                      </ul>
                    </div>
                    <div class="reponsiveOthers">
                        <a class="navbar-link d-flex align-items-center" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Test Series <ion-icon name="caret-down-outline"></ion-icon>
                        </a>
                        <ul class="collapse" id="collapseExample">
                            <?php foreach ($fetchLevels as $levelRow) { ?>
                                <li>
                                    <a class="dropdown-item levelBtn" href="<?= base_url() ?>level/type/<?= $levelRow[
    "level_id"
] ?>" data-level-id="<?= $levelRow["level_id"] ?>"><?= $levelRow[
    "level_name"
] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
                <li class="navbar-item">
                    <a href="<?= base_url() ?>plans" class="navbar-link <?= !empty(
    $segments[0] && $segments[0] == "plans"
)
    ? "active"
    : "" ?>" data-nav-link>Plans</a>
                </li>
                <li class="navbar-item">
                    <a href="<?= base_url() ?>pricing" class="navbar-link <?= !empty(
    $segments[0] && $segments[0] == "pricing"
)
    ? "active"
    : "" ?>" data-nav-link>Pricing</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link <?= !empty(
                        $segments[0] && $segments[0] == "faq"
                    )
                        ? "active"
                        : "" ?>" href="<?= base_url() ?>faq">FAQ</a>
                </li>

                <li class="navbar-item reponsiveOthers">
                    <a href="<?= base_url() ?>sample-answersheet" class="navbar-link <?= !empty(
    $segments[0] && $segments[0] == "sample-answersheet"
)
    ? "active"
    : "" ?>" data-nav-link>Sample Answersheets</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a href="<?= base_url() ?>syllabus" class="navbar-link <?= !empty(
    $segments[0] && $segments[0] == "syllabus"
)
    ? "active"
    : "" ?>" data-nav-link>Syllabus</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a href="<?= base_url() ?>testimonial" class="navbar-link <?= !empty(
    $segments[0] && $segments[0] == "testimonial"
)
    ? "active"
    : "" ?>" data-nav-link>Testimonials</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a href="<?= base_url() ?>blogs" class="navbar-link" data-nav-link>Blog</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a class="navbar-link <?= !empty($segments[0]) &&
                    $segments[0] == "important-links"
                        ? "active"
                        : "" ?>" href="<?= base_url() ?>important-links">Important Link</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a class="navbar-link <?= !empty($segments[0]) &&
                    $segments[0] == "why-us"
                        ? "active"
                        : "" ?>" href="<?= base_url() ?>why-us">Why Us</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a class="navbar-link <?= !empty($segments[0]) &&
                    $segments[0] == "about-us"
                        ? "active"
                        : "" ?>" href="<?= base_url() ?>about-us">About Us</a>
                </li>
                <li class="navbar-item reponsiveOthers">
                    <a class="navbar-link <?= !empty($segments[0]) &&
                    $segments[0] == "contact-us"
                        ? "active"
                        : "" ?>" href="<?= base_url() ?>contact-us">Contact Us</a>
                </li>
            </ul>
        </nav>
        <div class="header-actions">
            <a href="<?= base_url('cart') ?>" class="header-action-btn" aria-label="cart" title="Cart">
                <ion-icon name="cart-outline" aria-hidden="true"></ion-icon>
                <span class="btn-badge cartCount"><?= !empty($cartCount)
                    ? $cartCount
                    : 0 ?></span>
            </a>
            <?php if (!empty($studentData)): ?>
                <div class="dropdown">
                  <button class="" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" aria-label="User profile menu">
                    <img src="<?= base_url() ?>images/default_profile_image.jpg" class="img-circle profile-image" alt="User Profile" width="30" height="30">
                  </button>
                  <ul class="dropdown-menu dropdown-menu-lg-start profile-dropdown" aria-labelledby="dropdownMenuButton2">
                    <li><span class="dropdown-item dropdown-user-name fw-bold" tabindex="-1" aria-disabled="true"><?= $studentData[
                        "student_name"
                    ] ?></span></li>
                    <li><span class="dropdown-item fw-light fst-italic dropdown-user-role" tabindex="-1" aria-disabled="true">Student</span></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item h5 text-success d-flex" href="<?= base_url() ?>profile"><i class="fas fa-user fa-fw"></i> Profile</a></li>
                    <li><a class="dropdown-item h5 text-success d-flex" href="<?= base_url() ?>order-history"><i class="fas fa-file fa-fw"></i> Order History</a></li>
                    <li><a class="dropdown-item h5 text-success d-flex" href="<?= base_url() ?>dashboard"><i class="fas fa-tachometer-alt fa-fw"></i> Dashboard</a></li>
                    <li><a class="dropdown-item h5 text-success d-flex" href="<?= base_url() ?>logout"><i class="fas fa-sign-out-alt fa-fw"></i> Logout</a></li>
                  </ul>
                </div>
            <?php else: ?>
                <div class="header-auth-buttons">
                    <a href="<?= base_url() ?>sign-in" class="header-auth-btn header-auth-btn-login">
                        Login
                    </a>
                    <a href="<?= base_url() ?>register" class="header-auth-btn header-auth-btn-register">
                        Sign Up
                    </a>
                </div>
            <?php endif; ?>

            <button class="header-action-btn" aria-label="Toggle navigation menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>
        </div>
        <div class="overlay" data-nav-toggler data-overlay></div>
    </div>
</header>
