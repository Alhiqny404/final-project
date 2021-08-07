<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show($page = '', $data = '') {
  $ci = get_instance();
  $ci->load->view('_layouts/header', $data);
  $ci->load->view('_layouts/topbar', $data);
  $ci->load->view('_layouts/wrapper-img', $data);
  $ci->load->view('_layouts/topbar', $data);
  $ci->load->view($page, $data);
  $ci->load->view('_layouts/footer', $data);
}