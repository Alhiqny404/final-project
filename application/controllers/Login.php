<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Login
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Login extends CI_Controller {

  /**
  * Method Index
  * Halaman login user
  *
  * @return view
  */
  public function index() {
    notLogin();
    $data['title'] = 'Login';
    view('login', $data);

    if (isset($_POST['submit'])) {
      $this->_login();
    }

  }


  /**
  * Action Logout
  *
  * @return redirect halaman login
  */
  public function logout() {
    $this->session->sess_destroy();
    $this->session->set_flashdata('success', 'berhasil logout');
    return redirect('login');
  }

  private function _login() {
    $nip = htmlspecialchars($this->input->post('nip'), true);
    $password = htmlspecialchars($this->input->post('password'), true);

    $user = $this->db->get_where('user', ['nip' => $nip])->row();
    if ($user) {
      if (password_verify($password, $user->password)) {
        $session = [
          'nama_lengkap' => $user->nama_lengkap,
          'user_id' => $user->id,
          'nip' => $nip,
          'role' => $user->role
        ];
        $this->session->set_userdata($session);
        return ke("{$user->role}/dashboard");
        exit();
      } else {
        $this->session->set_flashdata('error', 'Password anda salah');
        return redirect(site_url('login'));
        exit();
      }
    } else {
      $this->session->set_flashdata('error', 'nip tidak ditemukan');
      return redirect(site_url('login'));
      exit();
    }

  }
}