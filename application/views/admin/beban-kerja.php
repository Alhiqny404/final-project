<?php view('_layouts/header'); ?>


<style>
  .exKerja {
    width: 50px;
    height: 50px;
  }
  .kerja {
    width: 35px;
    height: 6px;
  }
  .abu {
    background: #cfcfc4;
  }
  .biru {
    background-color: #00AEEF;
  }
  .orange {
    background-color: #F7931E;
  }
  .hijau {
    background-color: #8CC63E;
  }
  .ungu {
    background-color: #9B9BEE;
  }
  .kuning {
    background-color: #F8BE2D;
  }
</style>

<?php  view('_layouts/topbar');
?>
<?php view('_layouts/wrapper-img');
?>

<?php
$prefix_page = 'admin/beban/';
?>

<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">
        <div class="card p-3">
          <div class="d-flex  mb-4 justify-content-between align-items-center">
            <h4 class="card-title">Beban Kerja Pegawai</h4>
            <a href="<?=site_url($prefix_page.'create') ?>" class="btn btn-info w-25 ms-auto">
              Tambah Beban Kerja
            </a>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th rowspan="2" class="text-white" style="background-color: #00ADEF">
                    <h6 class="mb-4">No.</h6>
                  </th>
                  <th rowspan="2" style="white-space: nowrap; background-color: #8CC63E" class="text-white">
                    <h6 class="mb-4 mx-3"> Nama Pegawai</h6>
                  </th>
                  <th colspan="12" class="text-center text-light" style="background-color: #F8931F">Beban Kerja</th>
                </tr>
                <tr style="background-color: #F8BE2D" class="text-white">
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
              <?php

              ?>
              <tbody>
                <?php $no = 1; foreach ($user as $val): ?>
                <tr>
                  <td><?=$no++ ?></td>
                  <td>
                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#bebanzz" onclick="detailBebanKerja(<?=$val->id ?>,'<?=$val->nama_lengkap?>')">
                      <?=$val->nama_lengkap ?>
                    </a>
                  </td>
                  <?php foreach (noBulan() as $key => $bln): ?>
                  <td scope="<?=$bln ?>">
                    <?php foreach (BKBI($val->id, $key+1) as $bk): ?>
                    <div class="kerja" style="background-color:<?=$bk->warna ?>"></div>
                    <?php endforeach; ?>
                  </td>
                  <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
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






 <div class="modal fade modal-fullscreen" id="bebanzz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content p-0">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Beban Kerja Nama Pegawai</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php foreach ($seksi as $val): ?>
                <li class="nav-item" role="presentation">
                  <button class="nav-link nav-link-beban-kerja" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#<?= strtolower($val->nama_seksi) ?>"><?=$val->nama_seksi ?></button>
                </li>
                <?php endforeach; ?>
              </ul>
              <div class="text-right mb-3">
                  <div class="dropleft">
                  <button class="btn btn-success dropdown-toggle w-100 text-filter-beban-kerja" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter Tahun
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item item-filter-beban-kerja" href="javascript:void(0)" data-tahun="2018">2018</a>
                    <a class="dropdown-item item-filter-beban-kerja" href="javascript:void(0)" data-tahun="2019">2019</a>
                    <a class="dropdown-item item-filter-beban-kerja" href="javascript:void(0)" data-tahun="2020">2020</a>
                    <a class="dropdown-item item-filter-beban-kerja" href="javascript:void(0)" data-tahun="2021">2021</a>
                  </div>
                </div>
              </div>
              <div class="tab-content list-beban-kerja" id="pills-tabContent">
              </div>
            </div>
          </div>
        </div>
      </div>




<?php view('_layouts/js'); ?>


<script>

  $(document).ready(function(){
    $('.item-filter-beban-kerja').on('click',function(e){
         e.preventDefault();
         let userId = $(this).data('id');
         let namaLengkap = $(this).data('nama');
         let tahun = $(this).data('tahun');
         let url = "<?=site_url('ajax/detailBebanKerja/') ?>"+userId+`?tahun=${tahun}`;
         $('.text-filter-beban-kerja').html(`Loading...`);
         $('.nav-link-beban-kerja').removeClass('active');
            $.ajax({
              url: url,
              type: "GET",
              cache: false,
              success: function(data) {
                $('.text-filter-beban-kerja').html(`Filter Tahun ${tahun}`);
                $('.list-beban-kerja').html(data)
                $('.modal-title').html(`Beban Kerja ${namaLengkap}`)
              },
              error: function(jqxhr, textStatus, errorThrown) {
                console.log(jqxhr);
                console.log(textStatus);
                console.log(errorThrown);
        
                for (key in jqxhr)
                  alert(key + ":" + jqxhr[key])
                for (key2 in textStatus)
                  alert(key + ":" + textStatus[key])
                for (key3 in errorThrown)
                  alert(key + ":" + errorThrown[key])
        
              }
            });
    })
  })

  function detailBebanKerja(userId,namaLengkap) {
    $('#bebanzz').modal('show');
    $('.modal-title').html(`Beban Kerja ${namaLengkap}`);
    $('.item-filter-beban-kerja').data('id', userId);
    $('.item-filter-beban-kerja').data('nama', namaLengkap);
    $('.nav-link-beban-kerja').removeClass('active');
    $('.list-beban-kerja').html('');
    $('.text-filter-beban-kerja').html(`Filter Tahun`);
    
  }


</script>


<?php view('_layouts/end'); ?>