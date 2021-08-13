<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

  public function __construct() {
    parent::__Construct();
    isLogin();
    harus('supervisor');
    model('Document_model', 'document');
  }

  public function dashboard() {
    $data['title'] = 'Dashboard';
    view('supervisor/dashboard', $data);
  }

  public function list_doc() {
    $data['title'] = 'List Laporan';
    $this->db->order_by('created_at', 'desc');
    $data['documents'] = $this->db->get('document')->result();
    $data['success_documents'] = $this->document->getWhere(['document_status' => 'setuju']);
    $data['pending_documents'] = $this->document->getWhere(['document_status' => 'pending']);
    $data['reject_documents'] = $this->document->getWhere(['document_status' => 'tolak']);
    view('supervisor/list-doc', $data);
  }


  public function upload_doc($id) {
    if ($id == null) return redirect('admin/list-doc');
    $data['title'] = 'Upload Dokumen';
    $data['document'] = $this->db->get_where('document', ['document_id' => $id])->row();
    view('admin/upload-doc', $data);

    if (isset($_POST['submit'])) {
      $ext = pathinfo($data['document']->document_file, PATHINFO_EXTENSION);
      $doc_name = str_replace(".{$ext}", '', $data['document']->document_file);
      $image = $_FILES['doc_file']['name'];
      $ext_upload = pathinfo($image, PATHINFO_EXTENSION);
      // KETIKA GAMBR ADA YANG AKAN DIUPLOAD
      if (!empty($image)) {

        $f = FCPATH."/uploads/".$data['document']->document_file;
        rename($f, "{$f}.bak");

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
        $config['max_size'] = '10048';
        $config['file_name'] = trim($doc_name)."_".time().".{$ext_upload}";
        $this->load->library('upload', $config);
        // KETIKA GAMBAR BERHASIL DIUPLOAD
        if ($this->upload->do_upload('doc_file')) {

          $cek = file_exists("{$f}.bak");
          if ($cek) {
            unlink("{$f}.bak");
          }

          $set = [
            'document_file' => $config['file_name'],
            'document_status' => 'setuju',
            'responsed_at' => ayeuna()
          ];
          $this->db->update('document', $set, ['document_id' => $id]);

          $this->session->set_flashdata('success', 'dokumen telah disetujui');
          return ke('admin/list_doc');

        } else {
          $f = FCPATH."/uploads/".$data['document']->document_file;
          rename("{$f}.bak", $f);
          echo $this->upload->display_errors();

          die;
        }
      } else {
        $f = FCPATH."/uploads/".$data['document']->document_file;
        rename("{$f}.bak", $f);
        echo 'kosong';
      }

    }

  }


  public function tolak_doc($id) {
    $this->db->update('document', ['document_status' => 'tolak'], ['document_id' => $id]);
    $this->session->set_flashdata('success', 'dokumen telah ditolak');
    return ke('admin/list_doc');
  }

  public function format_doc() {
    $doc = $this->db->get_where('document', ['document_status != ' => 'pending'])->result();
    foreach ($doc as $val) {
      if (file_exists($val->document_file)) {
        unlink(FCPATH."/uploads/{$val->document_file}");
      }
    }
    $this->db->delete('document', ['document_status !=' => 'pending']);
    $this->session->set_flashdata('success', 'dokumen telah diformat');
    return ke('admin/list_doc');

  }


}