<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Dashboard
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Dashboard extends CI_Controller {

  /**
  * Class constructor
  * Akan selalu dijalankan ketika masuk pada controller ini
  *
  * @return	void
  */
  public function __construct() {
    parent::__Construct();
    isLogin();
    isSuperadmin();
    model('Document_model', 'document');
  }

  /**
  * Method Index
  * Halaman Dashboard
  * Data parsing : judul halaman, semua data user
  *
  * @return view
  */
  public function index() {

    $this->db->select('document.*,user.id,nama_lengkap');
    $this->db->from('document');
    $this->db->join('user', 'user.id = document.user_id', 'right');
    $this->db->where('role', 'pegawai');
    $data['docs'] = $this->db->get()->result();

    $data['title'] = 'Dashboard';
    view('admin/dashboard', $data);
  }


}