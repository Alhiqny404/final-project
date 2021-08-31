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
        $data = [
          'nip' => htmlspecialchars($sheetData[$i]['0'], true),
          'nama_lengkap' => htmlspecialchars($sheetData[$i]['1'], true),
          'jabatan_id' => htmlspecialchars($sheetData[$i]['2'], true),
          'pangkat_id' => htmlspecialchars($sheetData[$i]['3'], true),
          'jenis_kelamin' => htmlspecialchars($sheetData[$i]['4'], true),
          'email' => htmlspecialchars($sheetData[$i]['5'], true),
          'no_hp' => htmlspecialchars($sheetData[$i]['6'], true),
          'alamat' => htmlspecialchars($sheetData[$i]['7'], true),
          'role' => htmlspecialchars($sheetData[$i]['8'], true),
          'username' => $sheetData[$i]['9'],
          'password' => password_hash(12345678, PASSWORD_BCRYPT)
        ];

        $this->db->insert($this->table, $data);
      }
      return $this->db->insert_id();
    } else {
      echo 'tidak ada';
    }
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