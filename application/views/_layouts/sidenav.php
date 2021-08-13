<!-- Left Sidenav -->
<div class="left-sidenav">

  <ul class="metismenu left-sidenav-menu" id="side-nav">

    <li class="menu-title">Main Menu</li>
    <?php if (sud('role') == 'admin'): ?>
    <li>
      <a href="<?=site_url('admin/dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="javascript: void(0);"><i class="mdi mdi-book"></i><span>Laporan</span></a>
      <ul class="nav-second-level" aria-expanded="false">
        <li><a href="<?=site_url('admin/list_doc') ?>">List Laporan</a></li>
      </ul>
    </li>
    <?php elseif (sud('role') == 'supervisor'): ?>
    <li>
      <a href="<?=site_url('supervisor/dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="javascript: void(0);"><i class="mdi mdi-book"></i><span>Laporan</span></a>
      <ul class="nav-second-level" aria-expanded="false">
        <li><a href="<?=site_url('supervisor/list_doc') ?>">List Laporan</a></li>
      </ul>
    </li>
    <?php elseif (sud('role') == 'staff'): ?>
    <li>
      <a href="<?=site_url('staff/dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="javascript: void(0);"><i class="mdi mdi-book"></i><span>Document</span></a>
      <ul class="nav-second-level" aria-expanded="false">
        <li><a href="<?=site_url('staff/upload_doc') ?>">Upload Document</a></li>
        <li><a href="<?=site_url('staff/list_doc') ?>">List Document</a></li>
      </ul>
    </li>
    <?php elseif (sud('role') == 'pegawai'): ?>
    <li>
      <a href="<?=site_url('pegawai/dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="javascript: void(0);"><i class="mdi mdi-book"></i><span>Laporan</span></a>
      <ul class="nav-second-level" aria-expanded="false">
        <li><a href="<?=site_url('pegawai/upload_doc') ?>">Upload Laporan</a></li>
        <li><a href="">List Laporan</a></li>
      </ul>
    </li>
    <?php endif; ?>




  </ul>
</div>
<!-- end left-sidenav-->