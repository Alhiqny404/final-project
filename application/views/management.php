<?php view('_layouts/header'); ?>

<style>
  .exKerja {
    width: 50px;
    height: 50px;
  }
  .kerja {
    width: 40px;
    height: 8px;
  }
  

  .nav-tabs .nav-link {
    color: #6c757d !important;
  }

  .nav-tabs .nav-link.active {
    color: #008ed6 !important;
  }
</style>

<?php  view('_layouts/topbar');
?>
<?php view('_layouts/wrapper-img');
?>
<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">

        <div class="accordion" id="accordionExample">
          <div class="accordion-item active">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kinerja" aria-expanded="false" aria-controls="collapseTwo">
                Kinerja Pegawai
              </button>
            </h2>
            <div id="kinerja" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="card p-3">
                  <table class="table table-stripped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Sudah</th>
                        <th>Belum</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $no = 1; foreach ($user as $val): ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$val->nama_lengkap ?></td>
                        <td>
                          <?= CLBI($val->id, TRUE); ?>
                        </td>
                        <td>
                          <?= CLBI($val->id, FALSE); ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
           <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#prestasi" aria-expanded="false" aria-controls="collapseTwo">
                Prestasi Pegawai
              </button>
            </h2>
            <div id="prestasi" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="card p-3">
                  <table class="table table-stripped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Total Laporan</th>
                        <th>Upload Terakhir</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $no = 1; foreach ($ranking as $val): ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$val['nama_lengkap'] ?></td>
                        <td><?=$val['total_laporan']?></td>
                        <td><?= !empty($val['tgl_upload_terakhir']) ? time_ago($val['tgl_upload_terakhir']) : '' ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#managementlaporan" aria-expanded="false" aria-controls="collapseTwo">
                Management Laporan
              </button>
            </h2>
            <div id="managementlaporan" class="accordion-collapse collapse" aria-labelledby="headingTwo">
              <div class="accordion-body">
                <div class="card p-3">
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
                          <th colspan="12" class="text-center text-light" style="background-color: #F8931F">Laporan</th>
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
                      <tbody>
                        <?php $no = 1; foreach ($user as $val): ?>
                        <tr>
                          <td><?=$no++ ?></td>
                          <td>
                            <a type="button" class="" <?php if (sud('role') != 'user'): ?> onclick="detailBebanKerja(<?=$val->id ?>,'<?=$val->nama_lengkap?>')" <?php endif; ?>>
                              <?=$val->nama_lengkap ?>
                            </a>
                          </td>
                          <?php foreach (noBulan() as $key => $bln): ?>
                          <td scope="<?=$bln ?>">
                            <?php foreach (ReportLaporan($val->id,sprintf("%'02d",$key+1)) as $laporan): ?>
                            <span class="text-white bg-success p-0 text-center" style="display:block ; border-radius: 0; font-size: 9px; cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=$laporan->nama_laporan ?>"><?=$laporan->nama_laporan ?></span>
                            <?php endforeach; ?>
                          </td>
                          <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
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