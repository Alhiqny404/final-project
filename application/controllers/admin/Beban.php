<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Dashboard
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Beban extends CI_Controller {


  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'admin/beban';


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
    model('User_model', 'user');
    model('Seksi_model', 'seksi');
    model('Beban_kerja_model', 'beban');
  }

  /**
  * Method Index
  * Halaman Dashboard
  * Data parsing : judul halaman, semua data user
  *
  * @return view
  */
  public function index() {
    $data['user'] = $this->user->getWhere(['role' => 'user']);
    $data['title'] = 'Beban Kerja Pegawai';
    $data['seksi'] = $this->seksi->getAll();
    view('admin/beban-kerja',
      $data);
  }

  public function create() {
    $data['title'] = 'Tambah Beban Kerja Pegawai';
    $data['user'] = $this->user->getWhere(['role' => 'user']);
    $data['seksi'] = $this->seksi->getAll();
    view('admin/create-beban-kerja',
      $data);
  }



  /**
  * Method add
  * Action saat melakukan penambahan data jabatan
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function insert() {
    //var_dump($_POST); die;
    if ($this->beban->add() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
      redirect($this->prefix);
    }
  }


public function export() {
    $data['user'] = $this->user->getWhere(['role' => 'user']);
    $data['title'] = 'Beban Kerja Pegawai';
    $data['seksi'] = $this->seksi->getAll();
    view('admin/export-beban-kerja',
      $data);
    
}


}