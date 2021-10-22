<?php

$prefix_viewer = 'viewer/';
$prefix_supervisor = 'supervisor/';
$prefix_admin = 'admin/';
$prefix_user = 'user/';
$prefix_kelola = 'admin/kelola/';
?>

<!-- Left Sidenav -->
<div class="left-sidenav">

  <ul class="metismenu left-sidenav-menu" id="side-nav">

    <li class="menu-title">Main Menu</li>
    <?=sud('viewer') ?>
    <?php if (sud('role') == 'viewer'): ?>
    <li>
      <a href="<?=site_url($prefix_viewer.'dashboard') ?>" class="text-decoration-none"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="<?=site_url($prefix_viewer.'management') ?>" class="text-decoration-none"><i class="mdi mdi-monitor"></i><span>Dashboard Laporan</span></a>
    </li>
    <li>
      <a href="<?=site_url($prefix_viewer.'laporan') ?>"><i class="mdi mdi-book" class="text-decoration-none"></i><span>Laporan</span></a>
    </li>
    <li>
        <a href="<?=site_url($prefix_viewer.'laporan_sebelumnya') ?>" class="text-decoration-none"><i class="mdi mdi-book"></i><span>Laporan Sebelumnya</span></a>
    </li>
    <?php elseif (sud('role') == 'admin'): ?>
    <li>
      <a href="<?=site_url($prefix_admin.'dashboard') ?>" class="text-decoration-none"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="<?=site_url($prefix_admin.'management') ?>" class="text-decoration-none"><i class="mdi mdi-monitor"></i><span>Dashboard Laporan</span></a>
    </li>
    <li>
      <a href="<?=site_url($prefix_admin.'beban') ?>" class="text-decoration-none"><i class="mdi mdi-account-clock"></i><span>Beban Kerja Pegawai</span></a>
    </li>
    <li class="menu-title">Kelola Data</li>
    <li><a href="<?=site_url($prefix_kelola.'user') ?>" class="text-decoration-none"><i class="mdi mdi-account-group"></i><span>User</span></a></li>
    <li><a href="<?=site_url($prefix_kelola.'jabatan') ?>" class="text-decoration-none"><i class="mdi mdi-account-details"></i><span>Jabatan</span></a></li>
    <li><a href="<?=site_url($prefix_kelola.'pangkat') ?>" class="text-decoration-none"><i class="mdi mdi-account-star"></i><span>Pangkat</span></a></li>
    <li><a href="<?=site_url($prefix_kelola.'jenis_laporan') ?>" class="text-decoration-none"><i class="mdi mdi-book-variant"></i><span>Jenis Laporan</span></a></li>
    <li><a href="<?=site_url($prefix_kelola.'seksi') ?>" class="text-decoration-none"><i class="mdi mdi-camera-account"></i><span>Seksi</span></a></li>
    <?php elseif (sud('role') == 'supervisor'): ?>
    <li>
      <a href="<?=site_url($prefix_supervisor.'dashboard') ?>" class="text-decoration-none"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="<?=site_url($prefix_supervisor.'management') ?>" class="text-decoration-none"><i class="mdi mdi-monitor"></i><span>Dashboard Laporan</span></a>
    </li>
    <li class="menu-title">Kelola Laporan</li>
    <li><a href="<?=site_url($prefix_supervisor.'laporan') ?>" class="text-decoration-none"><i class="mdi mdi-book"></i><span>Laporan</span></a></li>
    <li>
        <a href="<?=site_url($prefix_supervisor.'laporan_sebelumnya') ?>" class="text-decoration-none"><i class="mdi mdi-book"></i><span>Laporan Sebelumnya</span></a>
    </li>
    <?php elseif (sud('role') == 'user'): ?>
    <li>
      <a href="<?=site_url($prefix_user.'dashboard') ?>" class="text-decoration-none"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
    </li>
    <li>
      <a href="<?=site_url($prefix_user.'management') ?>" class="text-decoration-none"><i class="mdi mdi-monitor"></i><span>Dashboard Laporan</span></a>
    </li>
    <li>
        <a href="<?=site_url($prefix_user.'laporan') ?>" class="text-decoration-none"><i class="mdi mdi-book"></i><span>Laporan</span></a>
    </li>
    <li>
        <a href="<?=site_url($prefix_user.'laporan_sebelumnya') ?>" class="text-decoration-none"><i class="mdi mdi-book"></i><span>Laporan Sebelumnya</span></a>
    </li>
      <?php endif; ?>




    </ul>
  </div>
  <!-- end left-sidenav-->