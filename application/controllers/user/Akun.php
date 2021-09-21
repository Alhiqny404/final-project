<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Dashboard
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Akun extends CI_Controller {
  private $prefix = 'user/profile/';

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
    model('User_model', 'user');
    model('Laporan_model', 'laporan');
  }

  /**
  * Method Index
  * Halaman Dashboard
  * Data parsing : judul halaman, semua data user
  *
  * @return view
  */

  public function edit() {
    $data['user'] = $this->user->getById(sud('user_id'));
    $data['title'] = 'Edit Akun User';
    view('user/edit-akun', $data);
  }


  public function update() {
    $edit = $this->user->editAkun();
    if ($edit['perubahan'] > 0) {
      $this->session->set_flashdata('success', 'Akun Berhasil Diupdate');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', $edit['error']);
      redirect($this->prefix);
    }
  }


}