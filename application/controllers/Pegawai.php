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
    view('staff/dashboard', $data);
  }

  public function list_doc() {
    $data['title'] = 'List Pengajuan Dokumen';
    $data['documents'] = $this->document->getAll();
    $data['success_documents'] = $this->document->getWhere(['document_status' => 'setuju']);
    $data['pending_documents'] = $this->document->getWhere(['document_status' => 'pending']);
    $data['reject_documents'] = $this->document->getWhere(['document_status' => 'tolak']);
    view('staff/list-doc', $data);
  }

  public function upload_doc() {
    $data['title'] = 'Upload Dokumen';
    view('pegawai/upload-doc', $data);

    if (isset($_POST['submit'])) {


      //DEKLARASI VARIABLES
      $name = htmlspecialchars($this->input->post('doc_name'), true);
      $doc_name = str_replace(' ', '_', $name);
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
            'document_name' => $name,
            'document_status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
          ];
          $this->db->insert('document', $data_doc);

          $this->session->set_flashdata('success', 'laporan berhasil terkirim');
          return ke('pegawai/dashboard');
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