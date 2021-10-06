<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Jabatan
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Jabatan extends CI_Controller {

  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'admin/kelola/jabatan';

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
    model('Jabatan_model', 'jabatan');
  }

  /**
  * Method Index
  * Halaman untuk mengelola data jabatan
  * Data parsing : judul halaman, semua data jabatan
  *
  * @return view
  */
  public function index() {
    $data['jabatan'] = $this->jabatan->getAll();
    $data['title'] = 'Management User';
    view('admin/data-jabatan', $data);
  }

  /**
  * Method add
  * Action saat melakukan penambahan data jabatan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function add() {
    if ($this->jabatan->add() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
      redirect($this->prefix);
    }
  }

  /**
  * Method edit
  * Action saat melakukan pengeditan data jabatan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function edit() {
    if ($this->jabatan->edit() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Diupdate');
      redirect($this->prefix);
    }

  }

  public function sorting() {
    $data['jabatan'] = $this->jabatan->getAll();
    $data['title'] = 'Management User';
    view('admin/data-jabatan-sorting', $data);
  }

  public function updateSort() {
    $dataUpdate = [];
    foreach ($this->input->post('ids') as $key => $val) {
      array_push($dataUpdate, ['id' => $val, 'urutan' => $key+1]);
    }
    $sort = $this->db->update_batch('jabatan', $dataUpdate, 'id');
    if ($sort) {
      echo json_encode(true);
    } else {
      echo json_encode(false);
    }
  }

  /**
  * Method delete
  * Action saat melakukan penghapusan data jabatan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function delete() {
    if ($this->jabatan->delete() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
      redirect($this->prefix);
    }

  }


}