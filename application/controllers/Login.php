<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index() {
    notLogin();
    $data['title'] = 'Login';
    view('login', $data);

    if (isset($_POST['submit'])) {
      $this->_login();
    }

  }

  public function logout() {
    $this->session->sess_destroy();
    $this->session->set_flashdata('success', 'berhasil logout');
    return redirect(site_url('login'));
  }

  private function _login() {
    $username = htmlspecialchars($this->input->post('username'), true);
    $password = htmlspecialchars($this->input->post('password'), true);

    $user = $this->db->get_where('user', ['username' => $username])->row();
    if ($user) {
      if (password_verify($password, $user->password)) {
        $session = [
          'user_id' => $user->id,
          'username' => $username,
          'role' => $user->role
        ];
        $this->session->set_userdata($session);
        if ($user->role == 'admin') {
          return redirect('admin/dashboard');
        } elseif ($user->role == 'staff') {
          return redirect('staff/dashboard');
        }
      } else {
        $this->session->set_flashdata('error', 'Password anda salah');
        return redirect(site_url('login'));

      }
    } else {
      $this->session->set_flashdata('error', 'username tidak ditemukan');
      return redirect(site_url('login'));
    }

  }
}