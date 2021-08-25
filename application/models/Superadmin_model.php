<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Laporan Model
* Fungsi : Berinteraksi dengan table laporan didatabase
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Superadmin_model extends CI_Model {

  public function respon_laporan() {
    $dataForm = $this->input->post();
    $data = [
      'status' => htmlspecialchars($dataForm['status'], true),
      'catatan' => htmlspecialchars($dataForm['catatan'], true),
      'tgl_respon' => ayeuna()
    ];
    $where = [
      'id' => $dataForm['id']
    ];
    $this->db->update('laporan', $data, $where);
    return $this->db->affected_rows();
  }

}