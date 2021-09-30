<?php
defined('BASEPATH') OR exit('No direct script access allowed');



use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;

/**
* User Model
* Fungsi : Berinteraksi dengan table user didatabase
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class User_model extends CI_Model {

  /**
  * Nama Table
  *
  * @var	string
  */
  private $table = 'user';


  /**
  * Primary key table
  *
  * @var	string (field name)
  */
  private $primaryKey = 'id';


  private $uploadPath = 'uploads/profilepict/';


  /**
  * Mengambil semua data pada table yang telah ditentukan diatas
  *
  * @return	array object
  */
  public function getAll() {
    $this->db->select('jabatan.nama_jabatan,pangkat.nama_pangkat,user.*');
    $this->db->from($this->table);
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'left outer');
    $this->db->join('pangkat', 'pangkat.id = user.pangkat_id', 'left outer');
    $this->db->order_by('nama_lengkap', 'asc');
    return $this->db->get()->result();
  }


  public function getById($id) {
    $this->db->select('user.*,jabatan.nama_jabatan,pangkat.nama_pangkat');
    $this->db->from($this->table);
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'left');
    $this->db->join('pangkat', 'pangkat.id = user.pangkat_id', 'left');
    $this->db->where('user.id', $id);
    return $this->db->get()->row();
  }

  public function getWhere($where) {
    return $this->db->get_where($this->table, $where)->result();
  }


  public function getCountWhere($where) {
    return $this->db->get_where($this->table, $where)->num_rows();
  }




  /**
  * Menambah data pada table yang telah ditentukan diatas
  *
  * @return	int
  */
  public function add() {
    $dataForm = $this->input->post();
    $pass = password_hash($dataForm['password'], PASSWORD_BCRYPT);
    $data = [
      'nip' => htmlspecialchars($dataForm['nip'], true),
      'nama_lengkap' => htmlspecialchars($dataForm['nama_lengkap'], true),
      'jabatan_id' => htmlspecialchars($dataForm['jabatan_id'], true),
      'pangkat_id' => htmlspecialchars($dataForm['pangkat_id'], true),
      'jenis_kelamin' => htmlspecialchars($dataForm['jenis_kelamin'], true),
      'tgl_lahir' => $dataForm['tgl_lahir'],
      'email' => htmlspecialchars($dataForm['email'], true),
      'no_hp' => htmlspecialchars($dataForm['no_hp'], true),
      'alamat' => htmlspecialchars($dataForm['alamat'], true),
      'role' => htmlspecialchars($dataForm['role'], true),
      'username' => $dataForm['username'],
      'password' => $pass

    ];
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }


  public function import_excel() {
    $file_mimes = [
      'application/octet-stream',
      'application/vnd.ms-excel',
      'application/excel',
      'application/vnd.msexcel',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (isset($_FILES['fileimport']['name']) && in_array($_FILES['fileimport']['type'], $file_mimes)) {
      $arr_file = explode('.', $_FILES['fileimport']['name']);
      $extension = end($arr_file);
      $spreadsheet = IOFactory::load($_FILES['fileimport']['tmp_name']);
      $sheetData = $spreadsheet->getActiveSheet()->toArray();

      for ($i = 1; $i < count($sheetData); $i++) {
        $tgl_exp = explode('/', $sheetData[$i]['5']);
        $tgl_lahir = $tgl_exp[2].'-'.$tgl_exp[1].'-'.$tgl_exp[0];
        $data = [
          'nip' => htmlspecialchars($sheetData[$i]['0'], true),
          'nama_lengkap' => htmlspecialchars($sheetData[$i]['1'], true),
          'jabatan_id' => htmlspecialchars($sheetData[$i]['2'], true),
          'pangkat_id' => htmlspecialchars($sheetData[$i]['3'], true),
          'jenis_kelamin' => htmlspecialchars($sheetData[$i]['4'], true),
          'tgl_lahir' => $tgl_lahir,
          'email' => htmlspecialchars($sheetData[$i]['6'], true),
          'no_hp' => htmlspecialchars($sheetData[$i]['7'], true),
          'alamat' => htmlspecialchars($sheetData[$i]['8'], true),
          'role' => htmlspecialchars($sheetData[$i]['9'], true),
          'username' => $sheetData[$i]['10'],
          'password' => password_hash(12345678, PASSWORD_BCRYPT)
        ];

        $this->db->insert($this->table, $data);
      }
      return $this->db->insert_id();
    } else {
      echo 'tidak ada';
    }
  }

  public function updateInAdmin() {
    $dataForm = $this->input->post();
    $data = [
      'nip' => htmlspecialchars($dataForm['nip'], true),
      'jabatan_id' => htmlspecialchars($dataForm['jabatan_id'], true),
      'pangkat_id' => htmlspecialchars($dataForm['pangkat_id'], true),
      'role' => htmlspecialchars($dataForm['role'], true)
    ];
    $where = [
      $this->primaryKey => $dataForm['id']
    ];
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }


  public function editInUser() {
    $dataForm = $this->input->post();
    $ext = '.'.pathinfo($_FILES['foto_profile']['name'], PATHINFO_EXTENSION);
    $nama_file = trim($this->_fileName().$ext);
    $file_lama = $dataForm['foto_profile_lama'];

    $dataUpdate = [
      'nama_lengkap' => htmlspecialchars($dataForm['nama_lengkap'], true),
      'jenis_kelamin' => htmlspecialchars($dataForm['jenis_kelamin'], true),
      'alamat' => htmlspecialchars($dataForm['alamat'], true),
      'email' => htmlspecialchars($dataForm['email'], true),
      'no_hp' => htmlspecialchars($dataForm['no_hp'], true)
    ];

    if ($_FILES['foto_profile']['name']) {
      if ($this->_uploadFile($nama_file) > 0) {
        $dataUpdate['foto_profile'] = $nama_file;
        if ($file_lama != 'default.jpg');
        if (file_exists($this->uploadPath.$file_lama)) {
          unlink($this->uploadPath.$file_lama);
        }
      }
    } else {
      echo 'upload foto bermasalah';
      exit();
    }
    $where = [
      $this->primaryKey => $dataForm['id']
    ];
    $this->db->update($this->table, $dataUpdate, $where);
    $this->session->set_userdata('nama_lengkap', $dataForm['nama_lengkap']);
    return $this->db->affected_rows();

  }


  private function _uploadFile($fileName) {
    $config = [
      'upload_path' => $this->uploadPath,
      'allowed_types' => 'png|jpg|jpeg',
      'max_size' => '10048',
      'file_name' => $fileName
    ];
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('foto_profile')) {
      return TRUE;
    } else {
      return  $err = $this->upload->display_errors();
    }
  }


  private function _fileName() {
    $nama_user = str_replace(' ', '_', trim($this->session->userdata('nama_lengkap')));
    //$nama_file = 'laporan-'.$nama_user.'-'.bulan(date('m')).'-'.date('Y');
    $nama_file = 'profilepict-'.$nama_user.'-'.time();
    return strtolower($nama_file);
  }


  public function editPassword() {
    $dataForm = $this->input->post();

    if (!empty($dataForm['old_pass'])) {
      $password = $this->db->get_where('user', ['id' => $dataForm['id']])->row()->password;
      if (password_verify($dataForm['old_pass'], $password)) {
        if ($dataForm['new_pass'] == $dataForm['confirm_pass']) {
          $dataUpdate = ['password' => password_hash($dataForm['new_pass'], PASSWORD_BCRYPT)];
        } else {
          // confirm password tidak sesuai
          $data['error'] = 'konfirmasi password tidak sesuai';
          $data['perubahan'] = false;
          return $data;
          //   return false;
        }
      } else {
        // pasword lama salah
        $data['error'] = 'password lama salah';
        $data['perubahan'] = false;
        return $data;
        // return false;
      }
    }

    $where = [
      $this->primaryKey => $dataForm['id']
    ];
    $this->db->update($this->table, $dataUpdate, $where);
    $data['perubahan'] = $this->db->affected_rows();
    $nama = $this->getById($dataForm['id'])->nama_lengkap;
    $this->_sendNotif($nama);
    return $data;

  }
  
  private function _sendNotif($nama){
    $dataNotif = [
      'role' => 'admin',
      'judul' => 'ganti password',
      'subjudul' => "user {$nama} telah ganti password",
      'icon' => 'fas fa-edit'
    ];
    $this->db->insert('notifikasi',$dataNotif);
  }

  /**
  * Mengedit data pada table yang telah ditentukan diatas
  *
  * @return	int
  */
  public function edit() {
    $dataForm = $this->input->post();
    $pass = password_hash($dataForm['password'], PASSWORD_BCRYPT);
    $data = [
      'nip' => htmlspecialchars($dataForm['nip'], true),
      'nama_lengkap' => htmlspecialchars($dataForm['nama_lengkap'], true),
      'jabatan_id' => htmlspecialchars($dataForm['jabatan_id'], true),
      'pangkat_id' => htmlspecialchars($dataForm['pangkat_id'], true),
      'jenis_kelamin' => htmlspecialchars($dataForm['jenis_kelamin'], true),
      'tgl_lahir' => $dataForm['tgl_lahir'],
      'email' => htmlspecialchars($dataForm['email'], true),
      'no_hp' => htmlspecialchars($dataForm['no_hp'], true),
      'alamat' => htmlspecialchars($dataForm['alamat'], true),
      'role' => htmlspecialchars($dataForm['role'], true),
      'username' => $dataForm['username'],
      'password' => $pass
    ];
    $where = [
      $this->primaryKey => $dataForm['id']
    ];
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }



  /**
  * Menghapus data pada table yang telah ditentukan diatas
  *
  * @return	int
  */
  public function delete() {
    $dataForm = $this->input->post();
    return $this->db->delete($this->table, [$this->primaryKey => $dataForm['id']]);

  }

}