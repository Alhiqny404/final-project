<?php view('_layouts/header'); ?>
<?php  view('_layouts/topbar'); ?>

<style>

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
<?php view('_layouts/wrapper-img');
?>
<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body border-bottom">
                <div class="fro_profile">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-lg-0">
                      <div class="fro_profile-main">
                        <div class="fro_profile-main-pic">
                          <img src="<?=site_url('uploads/profilepict/default.jpg') ?>" alt="foto" class="rounded-circle w-100">
                          <span class="fro-profile_main-pic-change">
                            <i class="fas fa-camera"></i>
                          </span>
                        </div>
                        <div class="fro_profile_user-detail">
                          <h5 class="fro_user-name"><?=$user->username ?></h5>
                          <p class="mb-0 fro_user-name-post">
                            <?=$user->nama_jabatan ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!--end col-->

                    <div class="col-md-4 mb-3 mb-lg-0">
                      <div class="header-title">
                        Seksi Pekerjaan<?=sud('user_id') ?>
                      </div>
                      <div class="row">
                        <div class="col-7">
                          <div class="seling-report">
                            <ul class="mb-0">
                              <?php foreach ($seksi_kerja as $val): ?>
                              <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label mr-2"></i><?=$val['nama_seksi'] ?></li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--end col-->
                  </div>
                  <!--end row-->
                </div>
                <!--end f_profile-->
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
          <div class="col-lg-4">
            <div class="card sticky-top">
              <div class="card-body profile-nav">
                <div class="nav flex-column nav-pills" id="profile-tab" aria-orientation="vertical">
                  <a class="nav-link active" id="profile-dash-tab" data-toggle="pill" href="#profile-dash" aria-selected="true">
                    Data Pribadi
                  </a>
                  <a class="nav-link" id="profile-activities-tab" data-toggle="pill" href="#profile-activities" aria-selected="false">
                    Aktifitas Pekerjaan
                  </a>
                  <a class="nav-link d-flex justify-content-between align-items-center" id="profile-pro-stock-tab" data-toggle="pill" href="#profile-pro-stock" aria-selected="false">
                    Laporan Bulanan
                  </a>
                </div>
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->

          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="tab-content" id="profile-tabContent">
                  <div class="tab-pane fade show active" id="profile-dash">
                    <h4 class="header-title mt-0">Data Saya</h4>
                    <div class="row">
                      <div class="col-lg-12">
                        <table cellpadding='5px' class="w-100 mb-3">
                          <tr>
                            <td>
                              NIP
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?=$user->nip ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Nama
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?=$user->nama_lengkap ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Jenis Kelamin
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?=$user->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Email
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?=$user->email ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              No.Telepon
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?=$user->no_hp ?>
                            </td>
                          </tr>
                        </tr>
                      </table>
                      <b>Alamat</b>
                      <p>
                        <?=$user->alamat ?>
                      </p>
                    </div>
                    <div class="col-lg-12 text-right">
                      <a href="<?=site_url('user/profile/edit') ?>" class="btn btn-primary px-4 mt-3">
                        Edit Biodata
                      </a>
                      <a href="<?=site_url('user/akun/edit') ?>" class="btn btn-primary px-4 mt-3">
                        Edit Akun
                      </a>
                    </div>
                  </div>
                  <!--end row-->
                </div>
                <!--end tab-pane-->

                <div class="tab-pane fade" id="profile-activities">
                  <h4 class="mt-0 header-title mb-3">Aktifitas pekerjaan</h4>
                  <?php foreach ($seksi_kerja as $val): ?>
                  <div class="activity d-flex justify-content-between mt-4">
                    <div class="<?=$val['warna'] ?>" style="width: 20px; height:20px; width:10%"></div>
                    <div class="time-item " style="width: 90%">
                      <?php foreach (ActivitasBebanKerjaKu($val['id']) as $subval): ?>
                      <div class="item-info d-flex justify-content-between">
                        <div>
                          <h5 class="my-0"><?=$subval->nama_pekerjaan ?></h5>
                          <p class="text-muted font-13">
                            <?=$subval->nama_seksi ?>
                          </p>
                        </div>
                        <div class="text-muted text-right font-10">
                          <?= monthString($subval->tgl_buat) ?>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <!--end activity-->
                  <!--end activity-->
                </div>
                <!--end tab-pane-->

                <div class="tab-pane fade" id="profile-pro-stock">
                  <h4 class="mt-0 header-title mb-3">Laporan Bulanan</h4>
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr class="align-self-center">
                          <th>No</th>
                          <th>Nama Pekerjaan</th>
                          <th>Status</th>
                        </tr><!--end tr-->
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($laporan as $val): ?>
                        <tr>
                          <td><?=$no++ ?></td>
                          <td>
                            <?=$val['nama_laporan'] ?>
                          </td>
                          <td>
                            <?=$val['status'] == 'approve' ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' ?>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                      <!--end tbody-->
                    </table>
                    <!--end table-->
                  </div>
                  <!--end table-responsive-->
                </div>
                <!--end tab-pen-->
              </div>
              <!--end tab-content-->
            </div>
            <!--end card-body-->
          </div>
          <!--end card-->
        </div>
        <!--end col-->
      </div>
      <!--end row-->
    </div>
    <!-- container -->
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