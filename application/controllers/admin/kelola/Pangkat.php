<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Pangkat
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Pangkat extends CI_Controller {

  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'admin/kelola/pangkat';

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
    model('Pangkat_model', 'pangkat');
  }

  /**
  * Method Index
  * Halaman untuk mengelola data pangkat
  * Data parsing : judul halaman, semua data pangkat
  *
  * @return view
  */
  public function index() {
    $data['pangkat'] = $this->pangkat->getAll();
    $data['title'] = 'Kelola data pangkat';
    view('admin/data-pangkat', $data);
  }

  /**
  * Method add
  * Action saat melakukan penambahan data pangkat
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function add() {
    if ($this->pangkat->add() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
      redirect($this->prefix);
    }
  }

  /**
  * Method edit
  * Action saat melakukan pengeditan data pangkat
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function edit() {
    if ($this->pangkat->edit() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Diupdate');
      redirect($this->prefix);
    }

  }



  public function sorting() {
    $data['pangkat'] = $this->pangkat->getAll();
    $data['title'] = 'Management User';
    view('admin/data-pangkat-sorting', $data);
  }

  public function updateSort() {
    $dataUpdate = [];
    foreach ($this->input->post('ids') as $key => $val) {
      array_push($dataUpdate, ['id' => $val, 'urutan' => $key+1]);
    }
    $sort = $this->db->update_batch('pangkat', $dataUpdate, 'id');
    if ($sort) {
      echo json_encode(true);
    } else {
      echo json_encode(false);
    }
  }




  /**
  * Method delete
  * Action saat melakukan penghapusan data pangkat
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function delete() {
    if ($this->pangkat->delete() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
      redirect($this->prefix);
    }

  }


}