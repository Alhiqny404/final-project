<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Reader\IReader;
use \PhpOffice\PhpSpreadsheet\Writer\IWriter;

/**
* Controller User
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class User extends CI_Controller {

  /**
  * Prefix url controller ini
  *
  * @var	string
  */
  private $prefix = 'admin/kelola/user';

  /**
  * Class constructor
  * Akan selalu dijalankan ketika masuk pada controller ini
  *
  * @return	void
  */
  public function __construct() {
    parent::__Construct();
    isLogin();
    isAdmin();
    model('Jabatan_model', 'jabatan');
    model('Pangkat_model', 'pangkat');
    model('User_model', 'user');
  }

  /**
  * Method Index
  * Halaman untuk mengelola data user
  * Data parsing : judul halaman, semua data user
  *
  * @return view
  */
  public function index() {

    $data['user'] = $this->user->getAll();
    $data['jabatan'] = $this->jabatan->getAll();
    $data['pangkat'] = $this->pangkat->getAll();
    $data['title'] = 'Management User';
    view('admin/data-user', $data);
  }

  public function add() {
    $data['jabatan'] = $this->jabatan->getAll();
    $data['pangkat'] = $this->pangkat->getAll();
    $data['title'] = 'Tambah User';
    view('admin/add-user', $data);
  }

  /**
  * Method add
  * Action saat melakukan penambahan data user
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function insert() {
    if ($this->user->add() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data gagal ditambahkan');
      redirect($this->prefix);
    }
  }


  public function import_excel() {
    $import = $this->user->import_excel();
    if ($import['status'] == true) {
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', $import['msg']);
      redirect($this->prefix);
    }
  }

  /**
  * Method edit
  * Action saat melakukan pengeditan data user
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function edit($id = null) {
    if ($id == null) return redirect($this->prefix);
    $data['user'] = $this->user->getById($id);
    $data['jabatan'] = $this->jabatan->getAll();
    $data['pangkat'] = $this->pangkat->getAll();
    $data['title'] = 'Edit User';
    view('admin/edit-user', $data);
  }

  public function update($id = null) {
    if ($this->user->updateInAdmin() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Diupdate');
      redirect($this->prefix);
    }
  }


  public function sorting() {
    $this->db->select('id,nama_lengkap');
    $this->db->order_by('urutan', 'asc');
    $data['user'] = $this->db->get('user')->result();
    $data['title'] = 'Urutan Management User';
    view('admin/data-user-sorting', $data);
  }

  public function updateSort() {
    $dataUpdate = [];
    foreach ($this->input->post('ids') as $key => $val) {
      array_push($dataUpdate, ['id' => $val, 'urutan' => $key+1]);
    }
    $sort = $this->db->update_batch('user', $dataUpdate, 'id');
    if ($sort) {
      echo json_encode(true);
    } else {
      echo json_encode(false);
    }
  }



  /**
  * Method delete
  * Action saat melakukan penghapusan data user
  * Data parsing : session flashdata
  *
  * @return redirect ke prefix ini
  */
  public function delete() {
    if ($this->user->delete() > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
      redirect($this->prefix);
    } else {
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
      redirect($this->prefix);
    }

  }



  /**
  * Method tempale
  * generate and create template excel
  */
  public function template() {

    $jabatan = $this->jabatan->getAll();
    $pangkat = $this->pangkat->getAll();

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(FCPATH.'uploads/template_user.xlsx');

    $worksheet = $spreadsheet->getActiveSheet();
    $i = 2;
    foreach ($jabatan as $val) {
      $worksheet->getCell("N{$i}")->setValue($val->nama_jabatan);
      $worksheet->getCell("O{$i}")->setValue($val->id);
      $i++;
    }
    $i = 2;
    foreach ($pangkat as $val) {
      $worksheet->getCell("Q{$i}")->setValue($val->nama_pangkat);
      $worksheet->getCell("R{$i}")->setValue($val->id);
      $i++;
    }

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
    $writer->save(__DIR__.'/template_user.xls');
    $path = __DIR__.'/template_user.xls';
    if (file_exists($path)) {

      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Cache-Control: no-cache, must-revalidate');
      header('Expires: 0');
      header('Content-Disposition: attachment; filename="'.basename($path).'"');
      header('Content-Length: '. filesize($path));
      header('pragma: public');

      flush();

      readfile($path);
      unlink($path);
      die();

    } else {
      echo "File tidak ada";
    }

  }


}