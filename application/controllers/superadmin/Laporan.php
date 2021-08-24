<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Laporan
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Laporan extends CI_Controller {

  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'superadmin/laporan';

  /**
  * Class constructor
  * Akan selalu dijalankan ketika masuk pada controller ini
  *
  * @return	void
  */
  public function __construct() {
    parent::__Construct();
    isLogin();
    model('Jabatan_model', 'jabatan');
    model('Pangkat_model', 'pangkat');
    model('Laporan_model', 'laporan');
    model('Superadmin_model', 'superadmin');
  }

  /**
  * Method Index
  * Halaman untuk mengelola data laporan
  * Data parsing : judul halaman, semua data laporan
  *
  * @return view
  */
  public function index() {
    $this->db->order_by('tgl_upload', 'desc');
    $data['laporan'] = $this->laporan->getAll();
    $data['jabatan'] = $this->jabatan->getAll();
    $data['pangkat'] = $this->pangkat->getAll();
    $data['laporan_bulan_ini'] = $this->laporan->bulanIni();
    $data['title'] = 'List Data laporan';
    view('superadmin/list-laporan', $data);
  }


  public function respon() {
    if ($this->superadmin->respon_laporan() > 0) {
      $this->session->set_flashdata('success', 'Telah direspon');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Gagal direspon');
      redirect($this->prefix);
    }
  }

  /**
  * Method edit
  * Action saat melakukan pengeditan data laporan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function edit() {
    if ($this->laporan->edit() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Diupdate');
      redirect($this->prefix);
    }

  }


  /**
  * Method delete
  * Action saat melakukan penghapusan data laporan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function delete() {
    if ($this->laporan->delete() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
      redirect($this->prefix);
    }

  }


}