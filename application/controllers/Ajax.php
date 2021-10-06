<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ajax extends CI_Controller {

  public function __construct() {
    parent::__construct();
    model('Beban_kerja_model', 'beban');
    model('Seksi_model', 'seksi');
  }

  public function detailBebanKerja($idUser = null) {
    $tahun = $this->input->get('tahun');
    $seksi = $this->seksi->getAll();
    $html = '';
    foreach ($seksi as $val) {
      $html .= '<div class="tab-pane fade" id="'.strtolower($val->nama_seksi).'">';
      $bebanKerja = $this->beban->getWhere(['user_id' => $idUser, 'seksi_id' => $val->id,'tahun'=>$tahun]);
      $html .= '<ul class="list-group list-group-flush">';
      if (count($bebanKerja)) {
        foreach ($bebanKerja as $bk) {
          $html .= '<li class="list-group-item"><h6>'.$bk->nama_pekerjaan.'</h6><small class="text-muted">'.$bk->catatan.'</small></li>';
        }
      } else {
        $html .= '...';
      }
      $html .= '</ul>';
      $html .= '</div>';
    }

    echo $html;
  }
  
  public function detailLaporanMe($tahun = '') {
      $seksi = $this->db->get('seksi')->result();
      $bebanKerja = [];
      foreach ($seksi as $val) {
        $where = [
          'user_id' => sud('user_id'),
          'seksi_id' => $val->id,
          'tahun' => $tahun
        ];
        $beban = $this->db->get_where('beban_kerja', $where);
        if ($beban->num_rows() > 0) {
          array_push($bebanKerja, (array)$val);
        }
      }
      
     
      $html = '';
       foreach ($bebanKerja as $val) {
                $html .=  '<div class="activity d-flex justify-content-between mt-5"><div style="width: 20px; height:20px; width:10%;background-color:'.$val["warna"].'"></div><div class="time-item " style="width: 90%">';
                        $this->db->select('beban_kerja.*,seksi.nama_seksi');
                        $this->db->from('beban_kerja');
                        $this->db->join('seksi', 'beban_kerja.seksi_id = seksi.id');
                        $this->db->where(['seksi_id' => $val['id'], 'user_id' => sud('user_id'),'tahun'=>$tahun]);
                        $activitasKerja = $this->db->get()->result();
                       foreach ($activitasKerja as $subval) {
                      $html .= '<div class="item-info d-flex justify-content-between"><div><h5 class="my-0">'.$subval->nama_pekerjaan.'</h5><p class="text-muted font-13">'.$subval->nama_seksi.'</p></div><div class="text-muted text-right font-10">'.$subval->catatan.'</div></div>';
                      }
                $html .=  '</div></div>';
        }
        echo $html;
  }

}