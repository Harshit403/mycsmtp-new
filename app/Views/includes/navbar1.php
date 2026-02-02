<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <div class="dropdown">
        <a class=" mr-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?=base_url()?>images/default_profile_image.jpg" height="30" class="img-circle">
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="<?=base_url()?>admin/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          <?php 
            if(session()->get('userData')!==null && session()->get('userData')['user_type']=='examinar'){
            ?>
              <li>
                <a class="dropdown-item changePassword btn" href="javascript:void(0)"><i class="fas fa-key"></i> Change Password</a>
              </li>
            <?php
            }
          ?>
        </ul>
      </div>
    </li>
  </ul>
</nav>