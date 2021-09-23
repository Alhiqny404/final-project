<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ajax extends CI_Controller {

  public function __construct() {
    parent::__construct();
    model('Beban_kerja_model', 'beban');
    model('Seksi_model', 'seksi');
  }

  public function detailBebanKerja($idUser = null) {
    $seksi = $this->seksi->getAll();
    $html = '';
    foreach ($seksi as $val) {
      $html .= '<div class="tab-pane fade" id="'.strtolower($val->nama_seksi).'">';
      $bebanKerja = $this->beban->getWhere(['user_id' => $idUser, 'seksi_id' => $val->id]);
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

}