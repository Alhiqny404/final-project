<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Laporan_sebelumnya
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Laporan_sebelumnya extends CI_Controller {

  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'supervisor/laporan_sebelumnya';

  /**
  * Class constructor
  * Akan selalu dijalankan ketika masuk pada controller ini
  *
  * @return	void
  */
  public function __construct() {
    parent::__Construct();
    isLogin();
    isSupervisor();
    model('Jabatan_model', 'jabatan');
    model('Pangkat_model', 'pangkat');
    model('Laporan_sebelumnya_model', 'laporan');
  }

  /**
  * Method Index
  * Halaman untuk mengelola data laporan_sebelumnya
  * Data parsing : judul halaman, semua data laporan_sebelumnya
  *
  * @return view
  */
  public function index() {
    $this->db->order_by('tgl_upload', 'desc');
    $this->db->where('status', 'approve');
    $data['laporan'] = $this->laporan->getAll();
    $data['jabatan'] = $this->jabatan->getAll();
    $data['pangkat'] = $this->pangkat->getAll();
    $data['title'] = 'List Data laporan Terlambat';
    view('supervisor/list-laporan_sebelumnya', $data);
  }



}