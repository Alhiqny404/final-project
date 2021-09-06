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
    isAdmin();
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

    $data['userUK30'] = null;
    $data['userUK40'] = null;
    $data['userUK50'] = null;
    $data['userUL50'] = null;

    foreach ($data['user'] as $val) {
      $thn_lahir = substr($val->tgl_lahir, 0, 4);
      $year_now = date('Y');
      $umur = $year_now - $thn_lahir;
      if ($umur < 30) $data['userUK30'] += 1;
      if ($umur >= 30 && $umur < 40) $data['userUK40'] += 1;
      if ($umur >= 40 && $umur < 50) $data['userUK50'] += 1;
      if ($umur >= 50) $data['userUL50'] += 1;
    }

    $data['title'] = 'Dashboard';
    view('admin/dashboard', $data);
  }


}