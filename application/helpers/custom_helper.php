<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function view($page = '', $data = '') {
  $ci = get_instance();
  if ($data == '') return $ci->load->view($page);
  if ($data != '') return $ci->load->view($page, $data);
}

function assets_dashboard() {
  return base_url('assets/dashboard/');
}

function sud($key = '') {
  $ci = get_instance();
  return $ci->session->userdata($key);
}

function ayeuna() {
  return date('Y-m-d H:i:s');
}

function tendang($role = '') {
  if ($role == 'admin') {
    return redirect(site_url('admin/dashboard'));
  } elseif ($role == 'staff') {
    return redirect(site_url('staff/dashboard'));
  }
}

function ke($url = '') {
  return redirect(site_url($url));
}

function uri($segment = null) {
  $ci = get_instance();
  return $ci->uri->segment($segment);
}



function isLogin() {
  if (!sud('user_id')) return redirect(site_url('login'));
}


function notLogin() {
  if (sud('user_id')) return tendang(sud('role'));
}


function isAdmin() {
  if (sud('role') != 'admin') return redirect(site_url('login'));
}

function isStaff() {
  if (sud('role') != 'staff') return redirect(site_url('login'));
}



function time_ago($timestamp) {
  $time_ago = strtotime($timestamp);
  $current_time = time();
  $time_difference = $current_time - $time_ago;
  $seconds = $time_difference;
  $minutes = round($seconds / 60); // value 60 is seconds
  $hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
  $days = round($seconds / 86400); //86400 = 24 * 60 * 60;
  $weeks = round($seconds / 604800); // 7*24*60*60;
  $months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
  $years = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
  if ($seconds <= 60) {
    return "Baru Saja";
  } else if ($minutes <= 60) {
    if ($minutes == 1) {
      return "1 menit yang lalu";
    } else {
      return "$minutes menit yang lalu";
    }
  } else if ($hours <= 24) {
    if ($hours == 1) {
      return "1 jam yang lalu";
    } else {
      return "$hours jam yang lalu";
    }
  } else if ($days <= 7) {
    if ($days == 1) {
      return "Kemarin";
    } else {
      return "$days Hari yang lalu";
    }
  } else if ($weeks <= 4.3) {
    //4.3 == 52/12
    if ($weeks == 1) {
      return "1 Minggu yang lalu";
    } else {
      return "$weeks Minggu yang lalu";
    }
  } else if ($months <= 12) {
    if ($months == 1) {
      return "1 Bulan yang lalu";
    } else {
      return "$months Bulan yang lalu";
    }
  } else {
    if ($years == 1) {
      return "1 Tahun yang lalu";
    } else {
      return "$years tahun yang lalu";
    }
  }
}