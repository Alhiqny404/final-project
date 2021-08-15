<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

  public function __construct() {
    parent::__Construct();
    isLogin();
    harus('supervisor');
    model('Document_model', 'document');
  }

  public function dashboard() {
    $data['title'] = 'Dashboard';
    view('supervisor/dashboard', $data);
  }

  public function list_doc() {
    $data['title'] = 'List Laporan';
    $this->db->order_by('created_at', 'desc');
    $data['documents'] = $this->db->get('document')->result();
    view('supervisor/list-doc', $data);
  }


}