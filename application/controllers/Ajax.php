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
      $html .= '<div class="accordion-item"><h2 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#'.$val->nama_seksi.'" aria-expanded="true" aria-controls="collapseOne">'.$val->nama_seksi.'</button></h2><div id="'.$val->nama_seksi.'" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample"><div class="accordion-body"><ul class="list-group list-group-flush" id="list-beban-kerja">';
      $bebanKerja = $this->beban->getWhere(['user_id' => $idUser, 'seksi_id' => $val->id]);
      if (count($bebanKerja) > 0) {
        foreach ($bebanKerja as $bk) {
          $html .= '<li class="list-group-item"><h6>'.$bk->nama_pekerjaan.'</h6>
          <small class="text-muted">'.$bk->catatan.'</small></li>';
        }
      } else {
        $html .= 'Tidak ada data pekerjaan';
      }
      $html .= '</ul></div></div></div>';
    }

    echo $html;
  }

}