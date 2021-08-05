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

function tendang($role = '') {
  if ($role == 'admin') {
    return redirect(site_url('admin/dashboard'));
  } elseif ($role == 'staff') {
    return redirect(site_url('staff/dashboard'));
  }
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