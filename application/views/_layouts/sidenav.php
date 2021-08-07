<!-- Left Sidenav -->
<div class="left-sidenav">

  <ul class="metismenu left-sidenav-menu" id="side-nav">

    <li class="menu-title">Main Menu</li>
    <?php if (sud('role') == 'admin'): ?>
    <li>
      <a href="<?=site_url('admin/dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="javascript: void(0);"><i class="mdi mdi-book"></i><span>Document</span></a>
      <ul class="nav-second-level" aria-expanded="false">
        <li><a href="<?=site_url('admin/list_doc') ?>">List Document</a></li>
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
    <?php endif; ?>




  </ul>
</div>
<!-- end left-sidenav-->