<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
      'role' => htmlspecialchars($dataForm['role'], true),
      'password' => $pass

    ];
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
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
      'role' => htmlspecialchars($dataForm['role'], true),
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