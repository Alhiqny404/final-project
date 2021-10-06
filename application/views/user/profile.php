<?php view('_layouts/header'); ?>
<?php  view('_layouts/topbar'); ?>

<style>
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
                          <img src="<?=base_url(profilePict(sud('user_id'))) ?>" alt="foto" class="rounded-circle w-100">
                          <span class="fro-profile_main-pic-change">
                            <i class="fas fa-camera"></i>
                          </span>
                        </div>
                        <div class="fro_profile_user-detail">
                          <h5 class="fro_user-name"><?=$user->nama_lengkap ?></h5>
                          <p class="mb-0 fro_user-name-post">
                            <?=$user->nama_jabatan ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!--end col-->

                    <div class="col-md-4 mb-3 mb-lg-0">
                      <div class="header-title">
                        Seksi Pekerjaan
                      </div>
                      <div class="row">
                        <div class="col-7">
                          <div class="seling-report">
                            <ul class="mb-0">
                              <?php foreach ($seksi_kerja as $val): ?>
                              <li class="mb-2 list-inline-item text-muted font-13">
                                <i class="mdi mdi-label mr-2" style="color:<?=$val['warna'] ?>"></i><?=$val['nama_seksi'] ?>
                              </li>
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
                                No.Urut Pegawai
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
                        Edit Password
                      </a>
                    </div>
                  </div>
                  <!--end row-->
                </div>
                <!--end tab-pane-->

                <div class="tab-pane fade" id="profile-activities">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                      <h4 class="my-0 header-title">Aktifitas pekerjaan</h4>
                  <div class="dropdown">
                      <button class="btn btn-sm btn-primary dropdown-toggle px-4 text-filter-laporan" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        Filter Tahun
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item item-filter-laporan" href="javascript:void(0)" data-tahun="2021">2021</a>
                        <a class="dropdown-item item-filter-laporan" href="javascript:void(0)" data-tahun="2020">2020</a>
                        <a class="dropdown-item item-filter-laporan" href="javascript:void(0)" data-tahun="2019">2019</a>
                        <a class="dropdown-item item-filter-laporan" href="javascript:void(0)" data-tahun="2018">2018</a>
                      </div>
                    </div>
                  </div>
                 <div class="aktifitas-pekerjaan">
                     
                 </div>
                 
                 
                 
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
                             <?php if($val['status'] === 'approve') : ?>
                                <i class="fas fa-check text-success"></i>
                             <?php elseif($val['status'] === 'pending') : ?>
                                <i class="far fa-window-minimize text-danger"></i>
                             <?php elseif($val['status'] === 'reject' || $val['status'] === 'null' || $val['status'] === 'koreksi') : ?>
                                <i class="fas fa-times text-danger"></i>
                             <?php endif; ?>
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

<script>
    $(document).ready(function(){
        $('.item-filter-laporan').on('click',function(e){
            e.preventDefault();
            let tahun = $(this).data('tahun');
             let url = "<?=site_url('ajax/detailLaporanMe/') ?>"+tahun;
             $('.text-filter-laporan').html(`Loading...`);
                $.ajax({
                  url: url,
                  type: "GET",
                  cache: false,
                  success: function(data) {
                    $('.text-filter-laporan').html(`Filter Tahun ${tahun}`);
                    $( ".aktifitas-pekerjaan" ).html(data);
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
</script>


<?php if ($this->session->flashdata('success')): ?>
<script>
alertCenter('Berhasil', "<?=$this->session->flashdata('success'); unset($_SESSION['success']); ?>", 'success');
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
<script>
alertCenter('Gagal', "<?=$this->session->flashdata('error'); unset($_SESSION['error']); ?>", 'error');
</script>
<?php endif; ?>

<?php view('_layouts/end'); ?>