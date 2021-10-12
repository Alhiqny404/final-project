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
  private $prefix = 'user/laporan_sebelumnya';

  /**
  * Class constructor
  * Akan selalu dijalankan ketika masuk pada controller ini
  *
  * @return	void
  */
  public function __construct() {
    parent::__Construct();
    isLogin();
    isUser();
    model('Jabatan_model', 'jabatan');
    model('Pangkat_model', 'pangkat');
    model('Laporan_sebelumnya_model', 'laporan');
    model('Jenis_laporan_model', 'jenis_laporan');
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
    $data['laporan'] = $this->laporan->getMe();
    $data['jabatan'] = $this->jabatan->getAll();
    $data['pangkat'] = $this->pangkat->getAll();
    $data['jenis_laporan'] = $this->jenis_laporan->getAll();
    $data['laporan_bulan_ini'] = $this->laporan->MebulanIni();
    $data['title'] = 'Management Laporan Sebelumnya';
    view('user/list-laporan_sebelumnya', $data);
  }

  /**
  * Method add
  * Action saat melakukan penambahan data laporan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function add() {
    if ($this->laporan->add() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
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