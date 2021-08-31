<?php

$prefix_superadmin = 'superadmin/';
$prefix_supervisor = 'supervisor/';
$prefix_admin = 'admin/';
$prefix_user = 'user/';
$prefix_kelola = 'admin/kelola/';

?>

<!-- Left Sidenav -->
<div class="left-sidenav">

  <ul class="metismenu left-sidenav-menu" id="side-nav">

    <li class="menu-title">Main Menu</li>
    <?php if (sud('role') == 'superadmin'): ?>
    <li>
      <a href="<?=site_url($prefix_superadmin.'dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="javascript: void(0);"><i class="mdi mdi-book"></i><span>Laporan</span></a>
      <ul class="nav-second-level" aria-expanded="false">
        <li><a href="<?=site_url($prefix_superadmin.'laporan') ?>">List Laporan</a></li>
      </ul>
    </li>
    <?php elseif (sud('role') == 'admin'): ?>
    <li>
      <a href="<?=site_url($prefix_admin.'dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="javascript: void(0);"><i class="mdi mdi-poll"></i><span>Kelola Data</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
      <ul class="nav-second-level" aria-expanded="false">
        <li><a href="<?=site_url($prefix_kelola.'user') ?>">User</a></li>
        <li><a href="<?=site_url($prefix_kelola.'jabatan') ?>">Jabatan</a></li>
        <li><a href="<?=site_url($prefix_kelola.'pangkat') ?>">Pangkat</a></li>
        <li><a href="<?=site_url($prefix_kelola.'jenis_laporan') ?>">Jenis Laporan</a></li>
      </ul>
    </li>
    <?php elseif (sud('role') == 'supervisor'): ?>
    <li>
      <a href="<?=site_url($prefix_supervisor.'dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="javascript: void(0);"><i class="mdi mdi-book"></i><span>Laporan</span></a>
      <ul class="nav-second-level" aria-expanded="false">
        <li><a href="<?=site_url($prefix_supervisor.'laporan') ?>">List Laporan</a></li>
      </ul>
    </li>
    <?php elseif (sud('role') == 'user'): ?>
    <li>
      <a href="<?=site_url($prefix_user.'dashboard') ?>"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <li>
        <a href="<?=site_url($prefix_user.'laporan') ?>"><i class="mdi mdi-book"></i><span>Laporan</span></a>
      </li>
      <?php endif; ?>




    </ul>
  </div>
  <!-- end left-sidenav-->