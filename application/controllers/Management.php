<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller Management
*
* @author	Pertiwi Team
* @copyright	Copyright (c) 2021
*/
class Management extends CI_Controller {

  /**
  * Class constructor
  * Akan selalu dijalankan ketika masuk pada controller ini
  *
  * @return	void
  */
  public function __construct() {
    parent::__Construct();
    isLogin();
    model('User_model', 'user');
    model('Seksi_model', 'seksi');
  }

  /**
  * Method Index
  * Halaman Dashboard
  * Data parsing : judul halaman, semua data user
  *
  * @return view
  */
  public function index() {
    $data['seksi'] = $this->seksi->getAll();
    $data['user'] = $this->user->getWhere(['role' => 'user']);
    $data['ranking'] = $this->sortRanking();
   
    $data['user_l'] = $this->user->getWhere(['role' => 'user', 'jenis_kelamin' => 'l']);
    $data['user_p'] = $this->user->getWhere(['role' => 'user', 'jenis_kelamin' => 'p']);
    $umur = $this->_getUmur($data['user']);
    $data['userUK30'] = $umur['k30'];
    $data['userUK40'] = $umur['k40'];
    $data['userUK50'] = $umur['k50'];
    $data['userUL50'] = $umur['l50'];
    $data['title'] = 'Mamagement Laporan';
    view('management', $data);
  }
  
  public function sortRanking() {
      $ranking = [];
      $users = $this->db->get_where('user',['role'=>'user'])->result();
      foreach($users as $user){
          $nilai = 0;
           $this->db->where('user_id',$user->id);
           $this->db->where('MONTH(tgl_upload)',date('m'));
           $this->db->where('YEAR(tgl_upload)',date('Y'));
           $this->db->where('status !=','reject');
           $this->db->where('status !=','koreksi');
           $this->db->order_by('tgl_upload','asc');
           $laporan = $this->db->get('laporan');
         
           foreach($laporan->result() as $val){
               if($val->status == 'approve'){
                   $nilai+=2;
               }elseif($val->status == 'pending'){
                   $nilai+=1;
               }
           }
           $totalLaporan = $laporan->num_rows() - 1;
           $tglUploadTerakhir = $totalLaporan >= 0 ?  $laporan->result_array()[$totalLaporan]['tgl_upload'] : '';
           array_push($ranking,[
             'nama_lengkap' => $user->nama_lengkap,
             'nilai' => $nilai,
             'total_laporan' => $laporan->num_rows(),
             'tgl_upload' => !empty($laporan->row()->tgl_upload) ? $laporan->row()->tgl_upload : '',
             'tgl_upload_terakhir' => !empty($tglUploadTerakhir) ? $tglUploadTerakhir : ''
           ]);
           
      }
      
     return $this->bubble_sort($ranking);
    
  }
  

  
  private function bubble_sort($data){
  $n = count($data);
  
   for ($i = 0; $i<$n; $i++) { 
      for ($j = $n-1; $j>$i; $j--){
          if ($data[$j]['tgl_upload'] < $data[$j-1]['tgl_upload']){ 
              $dummy = $data[$j];
              $data[$j] = $data[$j-1];
              $data[$j-1] = $dummy;
          }
      }   
   }
      
  for ($i = 0; $i<$n; $i++) { 
      for ($j = $n-1; $j>$i; $j--){
          if ($data[$j]['total_laporan'] > $data[$j-1]['total_laporan']){ 
              $dummy = $data[$j];
              $data[$j] = $data[$j-1];
              $data[$j-1] = $dummy;
          }
      }    
  }      
    
      
  for ($i = 0; $i<$n; $i++) { 
      for ($j = $n-1; $j>$i; $j--){
          if ($data[$j]['nilai'] > $data[$j-1]['nilai']){ 
              $dummy = $data[$j];
              $data[$j] = $data[$j-1];
              $data[$j-1] = $dummy;
          }
      }    
  }
  
  
  
  return $data;

}


  private function _getUmur($dataUser) {

    $k30 = null;
    $k40 = null;
    $k50 = null;
    $l50 = null;

    foreach ($dataUser as $val) {
      $thn_lahir = substr($val->tgl_lahir, 0, 4);
      $year_now = date('Y');
      $umur = $year_now - $thn_lahir;
      if ($umur < 30) $k30 += 1;
      if ($umur >= 30 && $umur < 40) $k40 += 1;
      if ($umur >= 40 && $umur < 50) $k50 += 1;
      if ($umur >= 50) $l50 += 1;
    }

    return [
      'k30' => $k30,
      'k40' => $k40,
      'k50' => $k50,
      'l50' => $l50
    ];

  }

  public function removeNotif($id = null) {
    if ($id == null) return $this->index();
    $this->db->delete('notifikasi', ['id' => $id]);
  }



}