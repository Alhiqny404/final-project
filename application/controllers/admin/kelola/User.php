<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* Controller User
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class User extends CI_Controller {

  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'admin/kelola/user';

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
    model('Pangkat_model', 'pangkat');
    model('User_model', 'user');
  }

  /**
  * Method Index
  * Halaman untuk mengelola data user
  * Data parsing : judul halaman, semua data user
  *
  * @return view
  */
  public function index() {
    $data['user'] = $this->user->getAll();
    $data['jabatan'] = $this->jabatan->getAll();
    $data['pangkat'] = $this->pangkat->getAll();
    $data['title'] = 'Kelola data user';
    view('admin/data-user', $data);
  }

  public function add() {
    $data['jabatan'] = $this->jabatan->getAll();
    $data['pangkat'] = $this->pangkat->getAll();
    $data['title'] = 'Add Data User';
    view('admin/add-user', $data);
  }

  /**
  * Method add
  * Action saat melakukan penambahan data user
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function insert() {
    if ($this->user->add() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
      redirect($this->prefix);
    }
  }


  public function import_excel() {
    if ($this->user->import_excel() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
      redirect($this->prefix);
    }
  }

  /**
  * Method edit
  * Action saat melakukan pengeditan data user
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function edit() {
    if ($this->user->edit() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Diupdate');
      redirect($this->prefix);
    }

  }


  /**
  * Method delete
  * Action saat melakukan penghapusan data user
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function delete() {
    if ($this->user->delete() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
      redirect($this->prefix);
    }

  }


}