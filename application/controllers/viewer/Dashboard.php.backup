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
    isSuperadmin();
    model('User_model', 'user');
    model('Seksi_model', 'seksi');
  }

  /**
  * Method Index
  * Halaman Dashboard
  * Data parsing : judul halaman, semua data user
  *
  * @return view
  */
  public function index() {
    $data['seksi'] = $this->seksi->getAll();
    $data['user'] = $this->user->getWhere(['role' => 'user']);
    $data['user_l'] = $this->user->getWhere(['role' => 'user', 'jenis_kelamin' => 'l']);
    $data['user_p'] = $this->user->getWhere(['role' => 'user', 'jenis_kelamin' => 'p']);
    $umur = $this->_getUmur($data['user']);
    $data['userUK30'] = $umur['k30'];
    $data['userUK40'] = $umur['k40'];
    $data['userUK50'] = $umur['k50'];
    $data['userUL50'] = $umur['l50'];
    $data['title'] = 'Dashboard';
    view('dashboard', $data);
  }

  private function _getUmur($dataUser) {

    $k30 = null;
    $k40 = null;
    $k50 = null;
    $l50 = null;

    foreach ($dataUser as $val) {
      $thn_lahir = substr($val->tgl_lahir, 0, 4);
      $year_now = date('Y');
      $umur = $year_now - $thn_lahir;
      if ($umur < 30) $k30 += 1;
      if ($umur >= 30 && $umur < 40) $k40 += 1;
      if ($umur >= 40 && $umur < 50) $k50 += 1;
      if ($umur >= 50) $l50 += 1;
    }

    return [
      'k30' => $k30,
      'k40' => $k40,
      'k50' => $k50,
      'l50' => $l50
    ];



  }



}