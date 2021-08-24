<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

  public function __construct() {
    parent::__Construct();
    isLogin();
    harus('pegawai');
    model('Document_model', 'document');
  }

  public function dashboard() {
    $data['title'] = 'Dashboard';
    view('pegawai/dashboard', $data);
  }

  public function list_doc() {
    $data['title'] = 'List Pengajuan Dokumen';
    $data['documents'] = $this->document->getAll();
    view('staff/list-doc', $data);
  }

  public function upload_doc() {
    $where = [
      'user_id' => sud('user_id'),
      'created_at >=' => date("Y-m-01 00:00:00"),
      'created_at <=' => date('Y-m-t 23:59:59')
    ];
    $data['doc'] = $this->db->get_where('document', $where)->num_rows();

    $data['title'] = 'Upload Dokumen';
    view('pegawai/upload-doc', $data);

    if (isset($_POST['submit'])) {


      //DEKLARASI VARIABLES
      $name = htmlspecialchars(strtolower($this->input->post('doc_name')), true);
      $doc_name = str_replace(' ', '_', trim($name));
      $image = $_FILES['doc_file']['name'];
      $extension = pathinfo($_FILES['doc_file']['name'], PATHINFO_EXTENSION);

      // KETIKA GAMBR ADA YANG AKAN DIUPLOAD
      if (!empty($image)) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
        $config['max_size'] = '10048';
        $config['file_name'] = "{$doc_name}_".time().".{$extension}";
        $this->load->library('upload', $config);
        // KETIKA GAMBAR BERHASIL DIUPLOAD
        if ($this->upload->do_upload('doc_file')) {
          $data_doc = [
            'user_id' => sud('user_id'),
            'document_file' => $config['file_name'],
            'document_name' => $name
          ];
          $this->db->insert('document', $data_doc);

          $this->session->set_flashdata('success', 'Laporan berhasil terkirim');
          return ke('pegawai/upload_doc');
        } else {
          // KETIKA GAMBAR TIDAK LOLOS VALIDASI
          echo   $image_error = $this->upload->display_errors();

          die;
        }
      } else {
        //KETIKA GAMBAR TIDAK ADA YANG DIUPLOAD
        echo 'belum ke upload';
      }

    }

  }
}