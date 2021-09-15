<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Laporan Model
* Fungsi : Berinteraksi dengan table laporan didatabase
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Laporan_model extends CI_Model {

  /**
  * Nama Table
  *
  * @var	string
  */
  private $table = 'laporan';


  /**
  * Primary key table
  *
  * @var	string (field name)
  */
  private $primaryKey = 'id';


  private $uploadPath = './uploads/laporan/';


  /**
  * Mengambil semua data pada table yang telah ditentukan diatas
  *
  * @return	array object
  */
  public function getAll() {
    $this->db->select('user.nama_lengkap,jenis_laporan.nama_laporan,laporan.*');
    $this->db->from($this->table);
    $this->db->join('user', 'user.id = laporan.user_id', 'left outher');
    $this->db->join('jenis_laporan', 'jenis_laporan.id = laporan.jenis_laporan_id', 'left outher');
    return $this->db->get()->result();
  }


  public function getMe() {
    $this->db->select('jenis_laporan.nama_laporan,laporan.*');
    $this->db->from($this->table);
    $this->db->join('jenis_laporan', 'jenis_laporan.id = laporan.jenis_laporan_id', 'left outher');
    $this->db->where('user_id', sud('user_id'));
    return $this->db->get()->result();
  }

  public function getMeToMonth() {
    $this->db->select('jenis_laporan.nama_laporan,laporan.*');
    $this->db->from($this->table);
    $this->db->join('jenis_laporan', 'jenis_laporan.id = laporan.jenis_laporan_id', 'left outher');
    $this->db->where('MONTH(tgl_upload)', date('m'));
    $this->db->where('YEAR(tgl_upload)', date('Y'));
    $this->db->where('user_id', sud('user_id'));
    return $this->db->get()->result();
  }

  public function getWhere($where) {
    $this->db->select('user.nama_lengkap,jenis_laporan.nama_laporan,laporan.*');
    $this->db->from($this->table);
    $this->db->join('user', 'user.id = laporan.user_id', 'left outher');
    $this->db->join('jenis_laporan', 'jenis_laporan.id = laporan.jenis_laporan_id', 'left outher');
    $this->db->where($where);
    return $this->db->get()->result();
  }


  /**
  * Menambah data pada table yang telah ditentukan diatas
  *
  * @return	int
  */
  public function add() {
    if (empty($_FILES['file']['name'])) return FALSE;
    $dataForm = $this->input->post();
    $ext = '.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $nama_file = trim($this->_fileName().$ext);


    if ($this->_uploadFile($nama_file) > 0) {
      $data = [
        'user_id' => sud('user_id'),
        'jenis_laporan_id' => htmlspecialchars($dataForm['jenis_laporan_id'], true),
        'judul' => htmlspecialchars($dataForm['judul'], true),
        'file' => $nama_file,
        'status' => 1
      ];
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
    } else {
      $this->session->set_userdata(['msg_error' => $this->upload->display_errors()]);
      return FALSE;
    }

  }


  private function _uploadFile($fileName) {
    $config = [
      'upload_path' => $this->uploadPath,
      'allowed_types' => 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
      'max_size' => '10048',
      'file_name' => $fileName
    ];
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('file')) {
      return TRUE;
    }
  }


  private function _fileName() {
    $nama_user = str_replace(' ', '_', trim($this->session->userdata('nama_lengkap')));
    //$nama_file = 'laporan-'.$nama_user.'-'.bulan(date('m')).'-'.date('Y');
    $nama_file = 'laporan-'.$nama_user.'-'.time();
    return strtolower($nama_file);
  }

  /**
  * Mengedit data pada table yang telah ditentukan diatas
  *
  * @return	int
  */
  public function edit() {

    $dataForm = $this->input->post();
    $file_lama = $dataForm['file_lama'];
    $file_baru = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : null;
    $ext = '.'.pathinfo($file_baru != null ? $file_baru : $file_lama, PATHINFO_EXTENSION);
    $nama_file = trim($this->_fileName().$ext);

    if (!empty($_FILES['file']['name'])) {
      if ($this->_uploadFile($nama_file) > 0) {
        $data['file'] = $nama_file;
        $data['tgl_upload'] = ayeuna();
        unlink($this->uploadPath.$file_lama);
      } else {
        echo $image_error = $this->upload->display_errors();
        die;
      }
    }

    $LaporanLama = $this->db->select('status')->from('laporan')->where('id', $dataForm['id'])->get()->row();
    if ($LaporanLama->status == 'approve') {
      $data['status'] = 'koreksi';
    }
    $data['judul'] = htmlspecialchars($dataForm['judul']);
    $where = [
      $this->primaryKey => $dataForm['id']
    ];
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();

  }


  public function MebulanIni() {
    $this->db->select('jenis_laporan.nama_laporan,laporan.*');
    $this->db->from($this->table);
    $this->db->join('jenis_laporan', 'jenis_laporan.id = laporan.jenis_laporan_id', 'left outher');
    $where = [
      'tgl_upload >=' => date('Y-m-01 00:00:00'),
      'tgl_upload <=' => date('Y-m-t 23:59:59'),
      'user_id' => sud('user_id')
    ];
    $this->db->where($where);
    return $this->db->get()->result();
  }


  /**
  * Menghapus data pada table yang telah ditentukan diatas
  *
  * @return	int
  */
  public function delete() {
    $dataForm = $this->input->post();
    $file = $dataForm['file'];
    $delete = $this->db->delete($this->table, [$this->primaryKey => $dataForm['id']]);
    if ($delete) {
      unlink($this->uploadPath.$file);
      return TRUE;
    }

  }

}