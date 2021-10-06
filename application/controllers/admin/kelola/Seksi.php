<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Seksi
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Seksi extends CI_Controller {

  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'admin/kelola/seksi';

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
    model('Seksi_model', 'seksi');
  }

  /**
  * Method Index
  * Halaman untuk mengelola data seksi
  * Data parsing : judul halaman, semua data seksi
  *
  * @return view
  */
  public function index() {
    $data['seksi'] = $this->seksi->getAll();
    $data['title'] = 'Management Seksi';
    view('admin/data-seksi', $data);
  }

  /**
  * Method add
  * Action saat melakukan penambahan data seksi
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function add() {
    if ($this->seksi->add() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
      redirect($this->prefix);
    }
  }

  /**
  * Method edit
  * Action saat melakukan pengeditan data seksi
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function edit() {
    if ($this->seksi->edit() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Diupdate');
      redirect($this->prefix);
    }

  }



  public function sorting() {
    $data['seksi'] = $this->seksi->getAll();
    $data['title'] = 'Management User';
    view('admin/data-seksi-sorting', $data);
  }

  public function updateSort() {
    $dataUpdate = [];
    foreach ($this->input->post('ids') as $key => $val) {
      array_push($dataUpdate, ['id' => $val, 'urutan' => $key+1]);
    }
    $sort = $this->db->update_batch('seksi', $dataUpdate, 'id');
    if ($sort) {
      echo json_encode(true);
    } else {
      echo json_encode(false);
    }
  }



  /**
  * Method delete
  * Action saat melakukan penghapusan data seksi
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function delete() {
    if ($this->seksi->delete() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
      redirect($this->prefix);
    }

  }


}