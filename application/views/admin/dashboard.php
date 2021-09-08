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
                <span class="badge badge-danger text-uppercase">TOTAL Pegawai</span>
                <h3 class="font-weight-bold"><?=count($user) ?></h3>
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
                <span class="badge badge-warning text-uppercase">TOTAL Pegawai Laki-laki</span>
                <h3 class="font-weight-bold"><?=count($user_l) ?></h3>
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
                        <th>Nama Pegawai</th>
                        <th>Sudah</th>
                        <th>Belum</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        <?php foreach ($user as $val): ?>
                      <tr>
                        <td><?=$val->nama_lengkap?></td>
                        <td>
                          <?= CLBI($val->id,TRUE);?>
                        </td>
                        <td>
                         <?= CLBI($val->id,FALSE);?>
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
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#beban" aria-expanded="false" aria-controls="collapseTwo">
                Beban Kerja Pegawai
              </button>
            </h2>
            <div id="beban" class="accordion-collapse collapse" aria-labelledby="headingTwo">
              <div class="accordion-body">
                <div class="card p-3">
                  <button type="button" class="btn btn-primary mb-4 w-25" data-bs-toggle="modal" data-bs-target="#colorCode">
 Lihat Kode Warna
</button>
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
                </div>
                
                <div class="modal fade" id="colorCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kode Warna Seksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="d-flex justify-content-between mb-3">
                            <div style="width: 70px" class="me-2">
                              <div class="abu exKerja rounded m-auto"></div>
                            </div>
                            <div style="width: 250px">
                              <h4 class="mb-0 text-dark">Umum</h4>
                              <h6 class="text-muted my-0">Abu-abu</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">

                          <div class="d-flex justify-content-between mb-3">
                            <div style="width: 70px" class="me-2">
                              <div class="biru exKerja rounded m-auto"></div>
                            </div>
                            <div style="width: 250px">
                              <h4 class="mb-0 text-dark">Sosial</h4>
                              <h6 class="text-muted my-0">Biru</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">

                          <div class="d-flex justify-content-between mb-3">
                            <div style="width: 70px" class="me-2">
                              <div class="orange exKerja rounded m-auto"></div>
                            </div>
                            <div style="width: 250px">
                              <h4 class="mb-0 text-dark">Distribusi</h4>
                              <h6 class="text-muted my-0">Orange</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">

                          <div class="d-flex justify-content-between mb-3">
                            <div style="width: 70px" class="me-2">
                              <div class="hijau exKerja rounded m-auto"></div>
                            </div>
                            <div style="width: 250px">
                              <h4 class="mb-0 text-dark">Produksi</h4>
                              <h6 class="text-muted my-0">Hijau</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">

                          <div class="d-flex justify-content-between mb-3">
                            <div style="width: 70px" class="me-2">
                              <div class="ungu exKerja rounded m-auto"></div>
                            </div>
                            <div style="width: 250px">
                              <h4 class="mb-0 text-dark">Nerwilis</h4>
                              <h6 class="text-muted my-0">Ungu</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="d-flex justify-content-between mb-3">
                            <div style="width: 70px" class="me-2">
                              <div class="kuning exKerja rounded m-auto"></div>
                            </div>
                            <div style="width: 250px">
                              <h4 class="mb-0 text-dark">IPDS</h4>
                              <h6 class="text-muted my-0">Kuning</h6>
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
            </div>
          </div>
          <?php if (sud('role') == 'admin' || sud('supervisor')): ?>

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
                                <th class="border-top-0">NIP</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Lihat</th>
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
                                <td>
                                  <button type="button" class="btnbtn-sm  btn-primary" data-bs-toggle="modal" onclick="detailUser(<?=$val->nip ?>,'<?=$val->nama_lengkap ?>','<?=$val->no_hp ?>','<?=$val->alamat ?>')" data-bs-target="#exampleModal">
                                    <i class="fas fa-eye"></i>
                                  </button>
                                </td>
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
                                <th class="border-top-0">NIP</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Lihat</th>
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
                                <td>
                                  <button type="button" class="btnbtn-sm  btn-primary" onclick="detailUser(<?=$val->nip ?>,'<?=$val->nama_lengkap ?>','<?=$val->no_hp ?>','<?=$val->alamat ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-eye"></i>
                                  </button>
                                </td>
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
                    <div class="card">
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
                                  <th class="border-top-0">NIP</th>
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
                                  <th class="border-top-0">NIP</th>
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
                                  <th class="border-top-0">NIP</th>
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
                                  <th class="border-top-0">NIP</th>
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
          <?php endif; ?>

        </div>
        <!-- container -->

        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nama Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h5 class="text-center">Foto Profile</h5>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <tr>
                      <td>
                        NIP
                      </td>
                      <td class="show_nip">
                        123456
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Nama
                      </td>
                      <td class="show_nama">
                        Ilham Hafidz
                      </td>
                    </tr>
                    <tr>
                      <td>
                        No. Telp
                      </td>
                      <td class="show_no_hp">
                        0974567809753
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Alamat
                      </td>
                      <td class="show_alamat">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ipsa quibusdam, do odio illum at consectetur labore quaerat dolore et, necessitatibus!
                      </td>
                    </tr>
                  </table>
                  <!--end table-->
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
  <?php view('_layouts/end'); ?>



  <script>


    function detailUser(nip, nama, no_hp, alamat) {
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
        tableToggle.addEventListener('click', ()=> {
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
            "Kurang dari 30 th",
            "Antara 30-40 th",
            "Antara 40-50 th",
            "Lebih dari 50 th",
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
  $.getJSON("<?=site_url('api/corona') ?>", function(data) {
    console.log(data[0].name)
    $('.corona-meninggal').html(data[0].meninggal);
    $('.corona-sembuh').html(data[0].sembuh);
    $('.corona-positif').html(data[0].positif);
  });


  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')
  myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
  });
</script>