  <?php
    $uri = service('uri');
    $uriArray = $uri->getSegments();
    $uri1 = $uriArray[0] ;
    $uri2 = isset($uriArray[1]) ? $uriArray[1] : '';
  ?>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <div class="mt-3 pb-3 mb-3">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="<?=base_url()?>images/default_profile_image.jpg" alt="User profile picture" height="300">
        </div>
        <div class="text-center  font-weight-bold">
          <?=session()->get('user_name')?>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php 
            if(session()->get('userData')!==null && session()->get('userData')['user_type']=='admin'){
            ?>
          <li class="nav-item">
            <a href="<?=base_url()?>admin_panel" class="nav-link <?=$uriArray[0]=='admin_panel' ? 'active' : ''?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?=(!empty($uri2) && ($uri2=='upload-notes' || $uri2=='upload-notice')) ? 'menu-open' : ''?>">
            <a href="pages/widgets.html" class="nav-link <?=(!empty($uri2) && $uri2=='upload-notes') ? 'active' : ''?>">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>admin/upload-notes" class="nav-link <?=(!empty($uri2) && $uri2=='upload-notes') ? 'active' : ''?>">
                  <i class="fas fa-sticky-note nav-icon"></i>
                  <p>Upload Notes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/paper-list" class="nav-link <?=(!empty($uri2) && $uri2=='paper-list') ? 'active' : ''?>">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
                View Papers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/promocodes" class="nav-link <?=(!empty($uri2) && $uri2=='promocodes') ? 'active' : ''?>">
              <i class="nav-icon fas fa-ad"></i>
              <p>
                Promocodes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/upload-notice" class="nav-link <?=(!empty($uri2) && $uri2=='upload-notice') ? 'active' : ''?>">
              <i class="fas fa-bullhorn nav-icon"></i>
              <p>Upload Notice</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/notice-list" class="nav-link <?=(!empty($uri2) && $uri2=='notice-list') ? 'active' : ''?>">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                View Notice
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/student-list" class="nav-link <?=(!empty($uri2) && $uri2=='student-list') ? 'active' : ''?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Students
              </p>
            </a>
          </li>
          <?php
            }
          ?>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/assignment-level-list" class="nav-link <?=(!empty($uri2) && ($uri2=='assignment-level-list'|| $uri2=='assignment-list')) ? 'active' : ''?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Assignment List
              </p>
            </a>
          </li>
          <?php 
            if(session()->get('userData')!==null && session()->get('userData')['user_type']=='admin'){
            ?>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/pending-payment-list" class="nav-link <?=(!empty($uri2) && ($uri2=='pending-payment-list')) ? 'active' : ''?>">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Pending Payement
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/examinar-list" class="nav-link <?=(!empty($uri2) && ($uri2=='examinar-list')) ? 'active' : ''?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Examinar List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/newsletter" class="nav-link <?=(!empty($uri2) && ($uri2=='newsletter')) ? 'active' : ''?>">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                NewsLetter
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/blog-list" class="nav-link <?=(!empty($uri2) && ($uri2=='blog-list')) ? 'active' : ''?>">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Blog
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/notes" class="nav-link <?=(!empty($uri2) && ($uri2=='notes')) ? 'active' : ''?>">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Notes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/student-access" class="nav-link <?=(!empty($uri2) && $uri2=='student-access') ? 'active' : ''?>">
              <i class="nav-icon fas fa-key"></i> <p>Access</p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </aside>