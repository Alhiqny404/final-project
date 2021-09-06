<?php view('_layouts/header'); ?>


  <style>
    .exKerja {
      width: 50px;
      height: 50px;
    }
    .kerja {
      width: 25px;
      height: 6px;
    }
    .abu {
      background: #cfcfc4;
    }
    .biru {
      background-color: #93CAED;
    }
    .orange {
      background-color: #FF7E47;
    }
    .hijau {
      background-color: #ACD1AF;
    }
    .ungu {
      background-color: #9B9BEE;
    }
    .kuning {
      background-color: #EEEE9B;
    }
  </style>

<?php  view('_layouts/topbar'); ?>
<?php view('_layouts/wrapper-img'); ?>



<div class="page-wrapper">
<div class="page-wrapper-inner">

<?php view('_layouts/sidenav'); ?>
<!-- Page Content-->
<div class="page-content">
<div class="container-fluid">
<div class="card p-3">
  
  <table class="table table-striped table-hover table-responsive">
    <thead>
      <tr>
        <th rowspan="2" style="white-space: nowrap;" class="bg-info text-white">
          <h6 class="mb-4 mx-3"> Nama Pegawai</h6>
        </th>
        <th colspan="12" class="text-center bg-success text-white">Beban Kerja</th>
      </tr>
      <tr>
        <td class="text-center">Jan</td>
        <td class="text-center">Feb</td>
        <td class="text-center">Mar</td>
        <td class="text-center">Apr</td>
        <td class="text-center">Mei</td>
        <td class="text-center">Jun</td>
        <td class="text-center">Jul</td>
        <td class="text-center">Agt</td>
        <td class="text-center">Sep</td>
        <td class="text-center">Okt</td>
        <td class="text-center">Nov</td>
        <td class="text-center">Des</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ilham</td>
        <td scope="januari">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="februari">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="maret">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="april">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="mei">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="juni">
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="juli">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="agustus">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
        </td>
        <td scope="september">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="oktober">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
        </td>
        <td scope="november">
          <div class="kerja abu"></div>
          <div class="kerja orange"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="desember">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
      </tr>
      <tr>
        <td>Ilham</td>
        <td scope="januari">
          <div class="kerja abu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="februari">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="maret">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="april">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="mei">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="juni">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="juli">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="agustus">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="september">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="oktober">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="november">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
        <td scope="desember">
          <div class="kerja abu"></div>
          <div class="kerja biru"></div>
          <div class="kerja orange"></div>
          <div class="kerja hijau"></div>
          <div class="kerja ungu"></div>
          <div class="kerja kuning"></div>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="card mt-4">
    <div class="card-header">
      Kode Warna Seksi
    </div>
   <div class="card-body p-3">
     <div class="row">
     <div class="col-md-3">
        <div class="d-flex justify-content-between mb-3">
      <div style="width: 70px" class="me-2">
        <div class="abu exKerja rounded m-auto"></div>
      </div>
      <div style="width: 250px">
        <h4 class="mb-0">Umum</h4>
        <h6 class="text-muted my-0">Abu-abu</h6>
      </div>
    </div>
     </div>
     <div class="col-md-3">
       
    <div class="d-flex justify-content-between mb-3">
      <div style="width: 70px" class="me-2">
        <div class="biru exKerja rounded m-auto"></div>
      </div>
      <div style="width: 250px">
        <h4 class="mb-0">Sosial</h4>
        <h6 class="text-muted my-0">Biru</h6>
      </div>
    </div>
     </div>
     <div class="col-md-3">
       
    <div class="d-flex justify-content-between mb-3">
      <div style="width: 70px" class="me-2">
        <div class="orange exKerja rounded m-auto"></div>
      </div>
      <div style="width: 250px">
        <h4 class="mb-0">Distribusi</h4>
        <h6 class="text-muted my-0">Orange</h6>
      </div>
    </div>
     </div>
     <div class="col-md-3">
       
    <div class="d-flex justify-content-between mb-3">
      <div style="width: 70px" class="me-2">
        <div class="hijau exKerja rounded m-auto"></div>
      </div>
      <div style="width: 250px">
        <h4 class="mb-0">Produksi</h4>
        <h6 class="text-muted my-0">Hijau</h6>
      </div>
    </div>
     </div>
     <div class="col-md-3">
       
    <div class="d-flex justify-content-between mb-3">
      <div style="width: 70px" class="me-2">
        <div class="ungu exKerja rounded m-auto"></div>
      </div>
      <div style="width: 250px">
        <h4 class="mb-0">Nerwilis</h4>
        <h6 class="text-muted my-0">Ungu</h6>
      </div>
    </div>
     </div>
     <div class="col-md-3">
       
    <div class="d-flex justify-content-between mb-3">
      <div style="width: 70px" class="me-2">
        <div class="kuning exKerja rounded m-auto"></div>
      </div>
      <div style="width: 250px">
        <h4 class="mb-0">IPDS</h4>
        <h6 class="text-muted my-0">Kuning</h6>
      </div>
    </div>
     </div>
   </div>
   </div>
  </div>
</div>
</div>
<!-- container -->

<?php view('_layouts/footer'); ?>

</div>
<!-- end page content -->
</div>
<!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->
<?php view('_layouts/js'); ?>


<?php view('_layouts/end'); ?>