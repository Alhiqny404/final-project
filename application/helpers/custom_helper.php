<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function view($page = '', $data = '') {
  $ci = get_instance();
  if ($data == '') return $ci->load->view($page);
  if ($data != '') return $ci->load->view($page, $data);
}

function assets_dashboard() {
  return base_url('assets/dashboard/');
}

function profilePict($user_id = null) {
  $ci = get_instance();
  $pp = $ci->db->select('foto_profile')
  ->where('id', $user_id)
  ->get('user')
  ->row()->foto_profile;
  $path = 'uploads/profilepict/';
  if ($pp != 'default.jpg' && $pp != '') {
    if (file_exists($path.$pp)) {
      return $path.$pp;
    } else {
      return $path.'default.jpg';
    }
  } else {
    return $path.'default.jpg';
  }
}

function download($path) {
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
    exit();
  } else {
    return false;
  }
}

function sud($key = '') {
  $ci = get_instance();
  return $ci->session->userdata($key);
}

function ayeuna() {
  return date('Y-m-d H:i:s');
}

function extension($file) {
  return pathinfo($file, PATHINFO_EXTENSION);
}

function tendang($role = '') {
  if ($role == 'admin') {
    return redirect(site_url('admin/dashboard'));
  } elseif ($role == 'staff') {
    return redirect(site_url('staff/dashboard'));
  }
}

function ke($url = '') {
  return redirect(site_url($url));
}

function dd($data) {
  echo '<pre>';
  print_r($data);
  echo '</pre>';
  die;
}

function CLBI($user_id, $bool) {
  $ci = get_instance();
  $jl = $ci->db->get('jenis_laporan')->result();
  $res = '';
  $bg = $bool == TRUE ? 'bg-success' : 'bg-danger';
  foreach ($jl as $val) {
    $where = [
      'user_id' => $user_id,
      'jenis_laporan_id' => $val->id,
      "MONTH(tgl_upload)" => date('m'),
      "YEAR(tgl_upload)" => date('Y'),
      "status" => "approve"
    ];
    $cek = $ci->db->get_where('laporan', $where)->num_rows();
    if ($cek == $bool) $res .= '<span class="badge '.$bg.'">'.$val->nama_laporan.'</span> ';
  }
  return $res;
}



function BKBI($user_id, $bulan) {
  $ci = get_instance();
  $res = [];
  $seksi = $ci->db->get('seksi')->result();
  foreach ($seksi as $key => $val) {
    $ci->db->like('bulan', $bulan);
    $ci->db->where(['user_id' => $user_id, 'seksi_id' => $val->id,'tahun'=>date('Y')]);
    $bebanKerja = $ci->db->get('beban_kerja')->num_rows();
    if ($bebanKerja > 0) array_push($res, $seksi[$key]);
  }
  return $res;

}



function ReportLaporan($user_id, $bulan) {
  $ci = get_instance();
  $res = [];
  $jenisLaporan = $ci->db->get('jenis_laporan')->result();
  foreach ($jenisLaporan as $key => $val) {
    $ci->db->where([
      'user_id' => $user_id,
      'jenis_laporan_id' => $val->id,
      'MONTH(tgl_upload)' => $bulan,
      'YEAR(tgl_upload)' => date('Y')
    ]);
    $laporan = $ci->db->get('laporan')->num_rows();
    if ($laporan > 0) array_push($res, $jenisLaporan[$key]);
  }
  return $res;
}

function LaporanKuToMonth() {
  $ci = get_instance();
  $jl = $ci->db->get('jenis_laporan')->result();
  $res = [];
  foreach ($jl as $val) {
    $where = [
      'user_id' => sud('user_id'),
      'jenis_laporan_id' => $val->id,
      'MONTH(tgl_upload)' => date('m'),
      'YEAR(tgl_upload)' => date('Y')
    ];
    $laporan = $ci->db->get_where('laporan', $where)->row();
    if (count((array)$laporan) > 0) {
      $dataRes = [
        'nama_laporan' => $val->nama_laporan,
        'status' => $laporan->status
      ];
      array_push($res, $dataRes);
    } else {
      $dataRes = [
        'nama_laporan' => $val->nama_laporan,
        'status' => 'null'
      ];
      array_push($res, $dataRes);
    }
  }
  return $res;
}

function ActivitasBebanKerjaKu($seksi_id = '') {
  $ci = get_instance();
  $ci->db->select('beban_kerja.*,seksi.nama_seksi');
  $ci->db->from('beban_kerja');
  $ci->db->join('seksi', 'beban_kerja.seksi_id = seksi.id');
  $ci->db->where(['seksi_id' => $seksi_id, 'user_id' => sud('user_id')]);
  return $ci->db->get()->result();
}

function BebanKerjaToMonthMe() {
  $ci = get_instance();
  $seksi = $ci->db->get('seksi')->result();
  $res = array();
  foreach ($seksi as $val) {
    $where = [
      'user_id' => sud('user_id'),
      'seksi_id' => $val->id
    ];
    $beban = $ci->db->get_where('beban_kerja', $where);
    if ($beban->num_rows() > 0) {
      array_push($res, (array)$val);
    }
  }
  return $res;

}

function uri($segment = null) {
  $ci = get_instance();
  return $ci->uri->segment($segment);
}

function monthString($date = '') {
  $month = date('m', strtotime($date));
  $string = [
    'januari',
    'february',
    'maret',
    'april',
    'mei',
    'juni',
    'juli',
    'agustus',
    'september',
    'oktober',
    'november',
    'desember'
  ];
  return $string[intval($month)];
}

function noBulan($bulan = '') {
  return [
    'januari',
    'february',
    'maret',
    'april',
    'mei',
    'juni',
    'juli',
    'agustus',
    'september',
    'oktober',
    'november',
    'desember'
  ];
}

function model($model, $alias) {
  $ci = get_instance();
  return $ci->load->model($model, $alias);
}


function isLogin() {
  if (!sud('user_id')) return redirect(site_url('login'));
}


function notLogin() {
  $role = sud('role');
  if (sud('user_id')) return ke("{$role}/dashboard");
}

function harus($role = '') {
  if (sud('role') != $role) return ke('login');
}

function isAdmin() {
  if (sud('role') != 'admin') return redirect(site_url('login'));
}

function isViewer() {
  if (sud('role') != 'viewer') return redirect(site_url('login'));
}


function isSuperVisor() {
  if (sud('role') != 'supervisor') return redirect(site_url('login'));
}

function isUser() {
  if (sud('role') != 'user') return redirect(site_url('login'));
}

function csrf() {
  $ci = get_instance();
  $csrf = array(
    'name' => $ci->security->get_csrf_token_name(),
    'hash' => $ci->security->get_csrf_hash()
  );
  return '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
}

function xss($str = '') {
  $ci = get_instance();
  return $ci->security->xss_clean($str);
}

// by Bil Abror
function bulan($m) {
  switch ($m) {
    case '01':
      return 'Januari';
      break;
    case '02':
      return 'Februari';
      break;
    case '03':
      return 'Maret';
      break;
    case '04':
      return 'April';
      break;
    case '05':
      return 'Mei';
      break;
    case '06':
      return 'Juni';
      break;
    case '07':
      return 'Juli';
      break;
    case '08':
      return 'Agustus';
      break;
    case '09':
      return 'September';
      break;
    case '10':
      return 'Oktober';
      break;
    case '11':
      return 'November';
      break;
    case '12':
      return 'Desember';
      break;

    default:
      return 'Gak ada bulan segitu sayan :)';
      break;
  }
}

function time_ago($timestamp) {
  $time_ago = strtotime($timestamp);
  $current_time = time();
  $time_difference = $current_time - $time_ago;
  $seconds = $time_difference;
  $minutes = round($seconds / 60); // value 60 is seconds
  $hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
  $days = round($seconds / 86400); //86400 = 24 * 60 * 60;
  $weeks = round($seconds / 604800); // 7*24*60*60;
  $months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
  $years = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
  if ($seconds <= 60) {
    return "Baru Saja";
  } else if ($minutes <= 60) {
    if ($minutes == 1) {
      return "1 menit yang lalu";
    } else {
      return "$minutes menit yang lalu";
    }
  } else if ($hours <= 24) {
    if ($hours == 1) {
      return "1 jam yang lalu";
    } else {
      return "$hours jam yang lalu";
    }
  } else if ($days <= 7) {
    if ($days == 1) {
      return "Kemarin";
    } else {
      return "$days Hari yang lalu";
    }
  } else if ($weeks <= 4.3) {
    //4.3 == 52/12
    if ($weeks == 1) {
      return "1 Minggu yang lalu";
    } else {
      return "$weeks Minggu yang lalu";
    }
  } else if ($months <= 12) {
    if ($months == 1) {
      return "1 Bulan yang lalu";
    } else {
      return "$months Bulan yang lalu";
    }
  } else {
    if ($years == 1) {
      return "1 Tahun yang lalu";
    } else {
      return "$years tahun yang lalu";
    }
  }
}