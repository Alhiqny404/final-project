<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Dashboard
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Dashboard extends CI_Controller {

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
    $data['user_l'] = $this->user->getWhere(['role' => 'user', 'jenis_kelamin' => 'l']);
    $data['user_p'] = $this->user->getWhere(['role' => 'user', 'jenis_kelamin' => 'p']);

    $data['title'] = 'Dashboard';
    view('admin/dashboard', $data);
  }


}