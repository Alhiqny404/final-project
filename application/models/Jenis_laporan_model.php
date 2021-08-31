<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Jenis_laporan Model
* Fungsi : Berinteraksi dengan table jenis_laporan didatabase
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Jenis_laporan_model extends CI_Model {

  /**
  * Nama Table
  *
  * @var	string
  */
  private $table = 'jenis_laporan';


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



  /**
  * Menambah data pada table yang telah ditentukan diatas
  *
  * @return	int
  */
  public function add() {
    $dataForm = $this->input->post();
    $data = [
      'nama_laporan' => htmlspecialchars($dataForm['nama_laporan'], true)
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
      'nama_laporan' => htmlspecialchars($dataForm['nama_laporan'])
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