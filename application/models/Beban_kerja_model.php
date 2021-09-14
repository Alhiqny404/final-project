<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Jabatan Model
* Fungsi : Berinteraksi dengan table jabatan didatabase
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Beban_kerja_model extends CI_Model {

  /**
  * Nama Table
  *
  * @var	string
  */
  private $table = 'beban_kerja';


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
    return $this->db->get($this->table)->result();
  }

  public function getWhere($where) {
    return $this->db->get_where($this->table, $where)->result();
  }



  /**
  * Menambah data pada table yang telah ditentukan diatas
  *
  * @return	int
  */
  public function add() {
    $dataForm = $this->input->post();
    $data = [
      'nama_pekerjaan' => htmlspecialchars($dataForm['nama_pekerjaan'], true),
      'user_id' => htmlspecialchars($dataForm['user_id'], true),
      'seksi_id' => htmlspecialchars($dataForm['seksi_id'], true),
      'tgl_buat' => $dataForm['tgl_buat']

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
    $data = [
      'nama_jabatan' => htmlspecialchars($dataForm['nama_jabatan'])
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