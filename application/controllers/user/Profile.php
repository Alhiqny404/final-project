<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Dashboard
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Profile extends CI_Controller {

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
  public function index() {
    $data['seksi_kerja'] = BebanKerjaToMonthMe();

    $data['user'] = $this->user->getById(sud('user_id'));
    $data['laporan'] = LaporanKuToMonth();
    $data['title'] = 'Profile User';
    view('user/profile', $data);
  }


  public function edit() {
    $data['title'] = 'Edit Profile User';
    view('user/edit-profile', $data);
  }


}