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
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="float-right">
                  <i class="dripicons-user-group font-24 text-secondary"></i>
                </div>
                <span class="badge badge-warning text-uppercase">TOTAL Pegawai Laki-laki</span>
                <h3 class="font-weight-bold"><?=count($user_l) ?></h3>
                <p class="mb-0 text-muted text-truncate">
                  INFO DATA PEGAWAI
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="float-right">
                  <i class="dripicons-user-group font-24 text-secondary"></i>
                </div>
                <span class="badge badge-info text-uppercase">TOTAL Pegawai Perempuan</span>
                <h3 class="font-weight-bold"><?=count($user_p) ?></h3>
                <p class="mb-0 text-muted text-truncate">
                  INFO DATA PEGAWAI
                </p>
              </div>
            </div>
          </div>
           <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="float-right">
                  <i class="dripicons-user-group font-24 text-secondary"></i>
                </div>
                <span class="badge badge-danger text-uppercase">TOTAL Pegawai</span>
                <h3 class="font-weight-bold"><?=count($user) ?></h3>
                <p class="mb-0 text-muted text-truncate">
                  INFO DATA PEGAWAI
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="accordionExample">
          <div class="accordion-item active">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kinerja" aria-expanded="false" aria-controls="collapseTwo">
                Kinerja Pegawai
              </button>
            </h2>
            <div id="kinerja" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
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
                        <th>Tanggal</th>
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
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#beban" aria-expanded="false" aria-controls="collapseTwo">
                Beban Kerja Pegawai
              </button>
            </h2>
            <div id="beban" class="accordion-collapse collapse" aria-labelledby="headingTwo">
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
                            <?php foreach (BKBI($val->id, sprintf($key+1)) as $bk): ?>
                            <div class="kerja" style="background-color:<?=$bk->warna ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=$bk->nama_seksi ?>"></div>
                            <?php endforeach; ?>
                          </td>
                          <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card mt-4">
                  <div class="card-header">
                    Kode Warna Seksi
                  </div>
                  <div class="card-body p-3">
                    <div class="row">
                     <?php foreach($seksi as $val) : ?>
                      <div class="col-sm-3">
                        <div class="d-flex justify-content-between mb-3">
                          <div style="width: 70px" class="me-2">
                            <div class="abu exKerja rounded m-auto" style="background:<?=$val->warna?>"></div>
                          </div>
                          <div style="width: 250px">
                            <h4 class="mb-0"><?=$val->nama_seksi?></h4>
                            <h6 class="text-muted my-0"><?=$val->warna?></h6>
                          </div>
                        </div>
                      </div>
                     <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Data Pegawai
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="card sticky-top p-0">
                    <div class="card-header">
                      Pegawai Menurut Jenis Kelamin
                    </div>
                    <div class="card-body p-0">
                      <div class="d-flex justify-content-between align-items-center mb-2 pt-3 px-3 tableHideToggle" onclick="showTable('male')">
                        <h5 class="text-primary" style="cursor:pointer;">
                          <i class="fas fa-male me-2"></i>
                          Laki-Laki
                        </h5>
                        <div>
                          <small class="text-muted ">
                            Total :
                          </small>
                          <h6 class="my-0"><?=count($user_l) ?></h6>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-center mb-2 px-3 tableHideToggle" onclick="showTable('female')">
                        <h5 class="text-danger" style="cursor:pointer;">
                          <i class="fas fa-female me-2"></i>
                          Perempuan
                        </h5>
                        <div>
                          <small class="text-muted ">
                            Total :
                          </small>
                          <h6 class="my-0"><?=count($user_p) ?></h6>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-center mb-2 tableHideToggle px-3" onclick="showTable('male_female')">
                        <h5 class="text-success" style="cursor: pointer;">
                          <i class="fas fa-users me-2" style="cursor:pointer;"></i>
                          Seluruh Pegawai
                        </h5>
                        <div>
                          <small class="text-muted ">
                            Total :
                          </small>
                          <h6 class="my-0"><?=count($user) ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 male tableHide hidden">
                  <div class="card">
                    <div class="card-header">
                      Data Pegawai Berjenis Kelamin Laki-laki
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th class="border-top-0">No</th>
                              <th class="border-top-0">No.Urut Pegawai</th>
                              <th class="border-top-0">Nama</th>
                              <?php if (sud('role') != 'user' && sud('role') != 'supervisor'): ?>
                              <th class="border-top-0">Lihat</th>
                              <?php endif; ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach ($user_l as $val): ?>
                            <tr>
                              <td>
                                <?=$no++ ?>
                              </td>
                              <td>
                                <?=$val->nip ?>
                              </td>
                              <td>
                                <?=$val->nama_lengkap ?>
                              </td>
                              <?php if (sud('role') != 'user' && sud('role') != 'supervisor'): ?>
                              <td>
                                <button type="button" class="btnbtn-sm  btn-primary" data-bs-toggle="modal" onclick="detailUser(<?=$val->nip ?>,'<?=$val->nama_lengkap ?>','<?=$val->no_hp ?>','<?=$val->alamat ?>','<?=profilePict($val->id) ?>')" data-bs-target="#exampleModal">
                                  <i class="fas fa-eye"></i>
                                </button>
                              </td>
                              <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <!--end table-->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 female tableHide hidden">
                  <div class="card">
                    <div class="card-header">
                      Data Pegawai Berjenis Kelamin Perempuan
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th class="border-top-0">No</th>
                              <th class="border-top-0">No.Urut Pegawai</th>
                              <th class="border-top-0">Nama</th>
                              <?php if (sud('role') != 'user' && sud('role') != 'supervisor'): ?>
                              <th class="border-top-0">Lihat</th>
                              <?php endif; ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach ($user_p as $val): ?>
                            <tr>
                              <td>
                                <?=$no++ ?>
                              </td>
                              <td>
                                <?=$val->nip ?>
                              </td>
                              <td>
                                <?=$val->nama_lengkap ?>
                              </td>
                              <?php if (sud('role') != 'user' && sud('role') != 'supervisor'): ?>
                              <td>
                                <button type="button" class="btnbtn-sm  btn-primary" onclick="detailUser(<?=$val->nip ?>,'<?=$val->nama_lengkap ?>','<?=$val->no_hp ?>','<?=$val->alamat ?>','<?=profilePict($val->id) ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  <i class="fas fa-eye"></i>
                                </button>
                              </td>
                              <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <!--end table-->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 male_female tableHide">
                  <div class="card">
                    <div class="card-header">
                      Data Jenis Kelamin Pegawai
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th>No</th>
                              <th class="border-top-0">Laki-laki</th>
                              <th class="border-top-0">Perempuan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $max = count($user_l) < count($user_p) ? count($user_p) : count($user_l);
                            for ($i = 0; $i < $max; $i++):
                            ?>
                            <tr>
                              <td><?=$i+1 ?></td>
                              <td>
                                <?= isset($user_l[$i])  ? $user_l[$i]->nama_lengkap : ' - ' ?>
                              </td>
                              <td>
                                <?= isset($user_p[$i])  ? $user_p[$i]->nama_lengkap : ' - ' ?>
                              </td>
                            </tr>
                            <?php
                            endfor;
                            ?>
                          </tbody>
                        </table>
                        <!--end table-->
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="card sticky-top">
                    <div class="card-body">
                      <h4 class="mt-0 header-title">Grafik Umur Pegawai</h4>
                      <canvas id="doughnut" height="300"></canvas>
                    </div>
                    <!--end card-body-->
                  </div>
                  <!--end card-->
                </div>
                <div class="col-md-8">
                  <div class="card p-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="muda-tab" data-bs-toggle="tab" data-bs-target="#muda" type="button"> &lt;30th </button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="menengah-tab" data-bs-toggle="tab" data-bs-target="#menengah" type="button">30-39 th</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#matang" type="button">40-49 th</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#menjelang-pensiun" type="button">&gt;=50 th</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="muda">
                        <div class="table-responsive">
                          <table class="table table-hover mb-0">
                            <thead class="thead-light">
                              <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">No.Urut Pegawai</th>
                                <th class="border-top-0">Nama</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; foreach ($user as $val): ?>
                              <?php
                              $thn_lahir = substr($val->tgl_lahir, 0, 4);
                              $year_now = date('Y');
                              $umur = $year_now - $thn_lahir;
                              ?>
                              <?php if ($umur < 30): ?>
                              <tr>
                                <td>
                                  <?=$no++ ?>
                                </td>
                                <td>
                                  <?=$val->nip ?>
                                </td>
                                <td>
                                  <?=$val->nama_lengkap ?>
                                </td>
                              </tr>
                              <?php endif; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                          <!--end table-->
                        </div>
                      </div>
                      <div class="tab-pane fade" id="menengah">
                        <div class="table-responsive">
                          <table class="table table-hover mb-0">
                            <thead class="thead-light">
                              <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">No.Urut Pegawai</th>
                                <th class="border-top-0">Nama</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; foreach ($user as $val): ?>
                              <?php
                              $thn_lahir = substr($val->tgl_lahir, 0, 4);
                              $year_now = date('Y');
                              $umur = $year_now - $thn_lahir;
                              ?>
                              <?php if ($umur >= 30 && $umur < 40): ?>
                              <tr>
                                <td>
                                  <?=$no++ ?>
                                </td>
                                <td>
                                  <?=$val->nip ?>
                                </td>
                                <td>
                                  <?=$val->nama_lengkap ?>
                                </td>
                              </tr>
                              <?php endif; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                          <!--end table-->
                        </div>
                      </div>
                      <div class="tab-pane fade" id="matang">
                        <div class="table-responsive">
                          <table class="table table-hover mb-0">
                            <thead class="thead-light">
                              <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">No.Urut Pegawai</th>
                                <th class="border-top-0">Nama</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; foreach ($user as $val): ?>
                              <?php
                              $thn_lahir = substr($val->tgl_lahir, 0, 4);
                              $year_now = date('Y');
                              $umur = $year_now - $thn_lahir;
                              ?>
                              <?php if ($umur >= 40 && $umur < 50): ?>
                              <tr>
                                <td>
                                  <?=$no++ ?>
                                </td>
                                <td>
                                  <?=$val->nip ?>
                                </td>
                                <td>
                                  <?=$val->nama_lengkap ?>
                                </td>
                              </tr>
                              <?php endif; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                          <!--end table-->
                        </div>
                      </div>
                      <div class="tab-pane fade" id="menjelang-pensiun">
                        <div class="table-responsive">
                          <table class="table table-hover mb-0">
                            <thead class="thead-light">
                              <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">No.Urut Pegawai</th>
                                <th class="border-top-0">Nama</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; foreach ($user as $val): ?>
                              <?php
                              $thn_lahir = substr($val->tgl_lahir, 0, 4);
                              $year_now = date('Y');
                              $umur = $year_now - $thn_lahir;
                              ?>
                              <?php if ($umur >= 50): ?>
                              <tr>
                                <td>
                                  <?=$no++ ?>
                                </td>
                                <td>
                                  <?=$val->nip ?>
                                </td>
                                <td>
                                  <?=$val->nama_lengkap ?>
                                </td>
                              </tr>
                              <?php endif; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                          <!--end table-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- container -->

      <script>
        let userId;
      </script>

      <!-- modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nama Pegawai</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5 class="text-center">
                <img src="" alt="" class="m-auto rounded-circle show_profilepict" style="max-height: 200px; max-width: 200px">
              </h5>
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <tr>
                    <td>
                      No.Urut Pegawai
                    </td>
                    <td class="show_nip"></td>
                  </tr>
                  <tr>
                    <td>
                      Nama
                    </td>
                    <td class="show_nama"></td>
                  </tr>
                  <tr>
                    <td>
                      No. Telp
                    </td>
                    <td class="show_no_hp"></td>
                  </tr>
                  <tr>
                    <td>
                      Alamat
                    </td>
                    <td class="show_alamat"></td>
                  </tr>
                </table>
                <!--end table-->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade modal-fullscreen" id="bebanzz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content p-0">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Beban Kerja Nama Pegawai</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php foreach ($seksi as $val): ?>
                <li class="nav-item" role="presentation">
                  <button class="nav-link nav-link-beban-kerja" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#<?= strtolower($val->nama_seksi) ?>"><?=$val->nama_seksi ?></button>
                </li>
                <?php endforeach; ?>
              </ul>
              <div class="tab-content list-beban-kerja" id="pills-tabContent">
              </div>
            </div>
          </div>
        </div>
      </div>


      <?php view('_layouts/footer'); ?>

    </div>
    <!-- end page content -->
  </div>
  <!--end page-wrapper-inner -->
</div>
<!-- end page-wrapper -->
<?php view('_layouts/js'); ?>
<script src="<?=assets_dashboard() ?>plugins/chartjs/chart.min.js"></script>



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
                $('.list-beban-kerja').html(data);
                $('.modal-title').html(`Beban Kerja ${namaLengkap}`);
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
    console.log('masuk pak eko')
    $('#bebanzz').modal('show');
    $('.modal-title').html(`Beban Kerja ${namaLengkap}`);
    $('.item-filter-beban-kerja').data('id', userId);
    $('.item-filter-beban-kerja').data('nama', namaLengkap);
    $('.nav-link-beban-kerja').removeClass('active');
    $('.list-beban-kerja').html('');
    $('.text-filter-beban-kerja').html(`Filter Tahun`);
    
  }
  
  

  function detailUser(nip, nama, no_hp, alamat, profilePict) {
    $('.show_profilepict').attr('src',
      '<?=base_url() ?>'+profilePict);
    $('.show_nip').html(nip);
    $('.show_nama').html(nama);
    $('.show_no_hp').html(no_hp);
    $('.show_alamat').html(alamat);
  }


  const male = document.querySelector('.male');
  const female = document.querySelector('.female');
  const male_female = document.querySelector('.male_female');
  const tableHideToggle = document.querySelectorAll('.tableHideToggle')
  const showTable = ($table)=> {
    tableHideToggle.forEach(tableToggle=> {
      tableToggle.classList.remove('active')
      tableToggle.addEventListener('click',
        ()=> {
          tableToggle.classList.add('active')
        })
    })
    if ($table == 'male') {
      male.classList.remove('hidden')
      female.classList.add('hidden')
      male_female.classList.add('hidden')
    } else if ($table == 'female') {
      female.classList.remove('hidden')
      male.classList.add('hidden')
      male_female.classList.add('hidden')
    } else {
      male_female.classList.remove('hidden')
      male.classList.add('hidden')
      female.classList.add('hidden')
    }
  }



  !function($) {
    "use strict";

    var ChartJs = function() {};

    ChartJs.prototype.respChart = function(selector, type, data, options) {
      // get selector by context
      var ctx = selector.get(0).getContext("2d");
      // pointing parent container to make chart js inherit its width
      var container = $(selector).parent();

      // enable resizing matter
      //   $(window).resize(generateChart);

      // this function produce the responsive Chart JS
      function generateChart() {
        // make chart width fit with its container
        var ww = selector.attr('width', $(container).width());
        switch (type) {
          case 'Doughnut':
            new Chart(ctx, {
              type: 'doughnut', data: data, options: options
            });
            break;
        }
        // Initiate new chart or Redraw

      };
      // run function - render chart at first load
      generateChart();
    },

    //init
    ChartJs.prototype.init = function() {
      //creating lineChart

      //donut chart
      var donutChart = {
        labels: [
          "< 30  th",
          "30-39 th",
          "40-49 th",
          "> 50  th",
        ],
        datasets: [{
          data: ["<?=$userUK30 ?>",
            "<?=$userUK40 ?>",
            "<?=$userUK50 ?>",
            "<?=$userUL50 ?>"
          ],
          backgroundColor: [
            "#008ed6",
            "#e4851a",
            "#65b32d",
            "#66112e",
          ],
          hoverBackgroundColor: [
            "#008ed6",
            "#e4851a",
            "#65b32d",
            "#66112e",
          ],
          hoverBorderColor: "#fff"
      }]
    };
    this.respChart($("#doughnut"), 'Doughnut', donutChart);


  },
  $.ChartJs = new ChartJs,
  $.ChartJs.Constructor = ChartJs

}(window.jQuery),

//initializing
function($) {
  "use strict";
  $.ChartJs.init()
}(window.jQuery);

</script>
<script type="text/javascript" charset="utf-8">
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')
myModal.addEventListener('shown.bs.modal', function () {
myInput.focus()
});
</script>



<?php view('_layouts/end'); ?>