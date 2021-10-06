<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Seksi Model
* Fungsi : Berinteraksi dengan table seksi didatabase
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Seksi_model extends CI_Model {

  /**
  * Nama Table
  *
  * @var	string
  */
  private $table = 'seksi';


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
    $this->db->order_by('urutan', 'asc');
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
      'nama_seksi' => htmlspecialchars($dataForm['nama_seksi'], true),
      'warna' => $dataForm['warna']
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
      'nama_seksi' => htmlspecialchars($dataForm['nama_seksi']),
      'warna' => $dataForm['warna']
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