<!-- Top Bar Start -->
<style>
  i.fas.fa-times {
    cursor: pointer;
  }
  i.fas.fa-times:hover {
    color: #333 !important;
  }
  .text-logo {
    color: #00aeef;
  }
@media only screen and (max-width: 1024px) {
    .text-logo {
      visibility: hidden !important;
    }
  }
</style>


<div class="topbar" style="height: 0 !important">
  <!-- Navbar -->
  <nav class="navbar-custom">

    <!-- LOGO -->
    <div class="topbar-left">
      <a href="index.html" class="logo text-decoration-none">
        <span>
          <img src="<?=assets_dashboard() ?>images/logo.png" alt="logo-bps" class="logo-sm">
        </span>
        <span>
          <h4 class="d-inline ml-2 text-logo font-italic text-uppercase">
            Badan Pusat Statistik
          </h4>
        </span>
      </a>
    </div>

    <ul class="list-unstyled topbar-nav float-right mb-0">
      <?php
      $notif = $this->db->get_where('notifikasi', ['role' => sud('role')])->result();
      $countNotif = count((array)$notif);
      ?>
      <li class="dropdown">
        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
          aria-haspopup="false" aria-expanded="false">
          <i class="mdi mdi-bell-outline nav-icon"></i>
          <?php if ($countNotif > 0): ?>
          <span class="badge badge-danger badge-pill noti-icon-badge"><?=$countNotif ?></span>
          <?php endif; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
          <h6 class="dropdown-item-text">
            NOTIFIKASI (<?=$countNotif ?>)
          </h6>

          <div class="slimscroll notification-list">
            <?php foreach ($notif as $val) : ?>
            <div class="position-relative">
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-danger">
                  <i class="mdi mdi-message"></i>
                </div>
                <p class="notify-details">
                  <?=$val->judul ?><small class="text-muted"><?=$val->subjudul ?> &middot; <i><?=time_ago($val->created_at) ?></i></small>
                </p>
              </a>
              <span onclick="removeNotif(<?=$val->id ?>)"><i class="fas fa-times position-absolute top-0 end-0 pe-3 pt-1 text-center text-muted"></i></span>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
      </li>

      <li class="dropdown">
        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
          aria-haspopup="false" aria-expanded="false">
          <img src="<?=base_url(profilePict(sud('user_id'))) ?>" alt="profile-user" class="rounded-circle" />
          <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="<?=site_url('user/profile') ?>"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=site_url('login/logout') ?>"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
        </div>
      </li>
    </ul>

    <ul class="list-unstyled topbar-nav mb-0">

      <li>
        <button class="button-menu-mobile nav-link waves-effect waves-light">
          <i class="mdi mdi-menu nav-icon"></i>
        </button>
      </li>


    </ul>

  </nav>
  <!-- end navbar-->
</div>
<!-- Top Bar End -->