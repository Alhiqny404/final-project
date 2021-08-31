<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Jenis_laporan
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Jenis_laporan extends CI_Controller {

  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'admin/kelola/jenis_laporan';

  /**
  * Class constructor
  * Akan selalu dijalankan ketika masuk pada controller ini
  *
  * @return	void
  */
  public function __construct() {
    parent::__Construct();
    isLogin();
    isAdmin();
    model('Jenis_laporan_model', 'jenis_laporan');
  }

  /**
  * Method Index
  * Halaman untuk mengelola data jenis_laporan
  * Data parsing : judul halaman, semua data jenis_laporan
  *
  * @return view
  */
  public function index() {
    $data['jenis_laporan'] = $this->jenis_laporan->getAll();
    $data['title'] = 'Management User';
    view('admin/data-jenis-laporan', $data);
  }

  /**
  * Method add
  * Action saat melakukan penambahan data jenis_laporan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function add() {
    if ($this->jenis_laporan->add() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
      redirect($this->prefix);
    }
  }

  /**
  * Method edit
  * Action saat melakukan pengeditan data jenis_laporan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function edit() {
    if ($this->jenis_laporan->edit() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Diupdate');
      redirect($this->prefix);
    }

  }


  /**
  * Method delete
  * Action saat melakukan penghapusan data jenis_laporan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function delete() {
    if ($this->jenis_laporan->delete() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
      redirect($this->prefix);
    }

  }


}