<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct() {
    parent::__Construct();
    isLogin();
    isAdmin();
  }

  public function dashboard() {
    $data['title'] = 'Dashboard';
    $data['staff'] = $this->db->get_where('user', ['role' => 'staff'])->num_rows();
    view('admin/dashboard', $data);
  }
}