<?php view('_layouts/header'); ?>
<?php  view('_layouts/topbar'); ?>
<?php view('_layouts/wrapper-img'); ?>
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
                <span class="badge badge-danger">TOTAL MENINGGAL</span>
                <h3 class="font-weight-bold corona-meninggal"></h3>
                <p class="mb-0 text-muted text-truncate">
                  INFO CORONA INDONESIA
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
                <span class="badge badge-info">TOTAL POSITIF</span>
                <h3 class="font-weight-bold corona-positif"></h3>
                <p class="mb-0 text-muted text-truncate">
                  INFO CORONA INDONESIA
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
                <span class="badge badge-warning">TOTAL SEMBUH</span>
                <h3 class="font-weight-bold corona-sembuh"></h3>
                <p class="mb-0 text-muted text-truncate">
                  INFO CORONA INDONESIA
                </p>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Progres Pekerjaan Karyawan
              </div>
              <div class="card-body p-3">
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead class="thead-light">
                      <tr>
                        <th class="border-top-0">Nama</th>
                        <th class="border-top-0">WFH</th>
                        <th class="border-top-0">KCO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Ilham
                        </td>
                        <td>
                          <span class="badge bg-success">selesai</span>
                        </td>
                        <td>
                          <span class="badge bg-danger">belum selesai</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          ilham Hafidz
                        </td>
                        <td>
                          <span class="badge bg-success">selesai</span>
                        </td>
                        <td>
                          <span class="badge bg-danger">belum selesai</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!--end table-->
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card sticky-top ">
              <div class="card-header">
                Pegawai Menurut Jenis Kelamin
              </div>
              <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center mb-2 pt-3" onclick="showTable('male')">
                  <h5 class="text-primary">
                    <i class="fas fa-male me-2"></i>
                    Laki-Laki
                  </h5>
                  <div>
                    <small class="text-muted ">
                      Total :
                    </small>
                    <h6 class="my-0">7</h6>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2" onclick="showTable('female')">
                  <h5 class="text-danger">
                    <i class="fas fa-female me-2"></i>
                    Perempuan
                  </h5>
                  <div>
                    <small class="text-muted ">
                      Total :
                    </small>
                    <h6 class="my-0">7</h6>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2" onclick="showTable('male_female')">
                  <h5 class="text-success">
                    <i class="fas fa-users me-2"></i>
                    Seluruh Pegawai
                  </h5>
                  <div>
                    <small class="text-muted ">
                      Total :
                    </small>
                    <h6 class="my-0">7</h6>
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
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          12345678
                        </td>
                        <td>
                          ilham Hafidz
                        </td>
                        <td>
                          <button type="button" class="btnbtn-sm  btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-eye"></i>
                          </button>
                        </td>
                      </tr>
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
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          12345678
                        </td>
                        <td>
                          Nova
                        </td>
                        <td>
                          <button type="button" class="btnbtn-sm  btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-eye"></i>
                          </button>
                        </td>
                      </tr>
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
                      <tr>
                        <td>
                          ilham Hafidz
                        </td>
                        <td>
                          mimin mohimin
                        </td>
                      </tr>
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
                <h4 class="mt-0 header-title">Donut Chart</h4>
                <p class="text-muted mb-4 d-inline-block text-truncate w-100">
                  Pie and doughnut charts are probably
                  the most commonly used chart there are. They are divided into segments,
                  the arc of each segment shows the proportional value of each piece of
                  data.
                </p>
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
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">< 20th</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">20-30 th</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">>30 th</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                          <tr>
                            <td>
                              ilham Hafidz
                            </td>
                            <td>
                              mimin mohimin
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--end table-->
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                          <tr>
                            <td>
                              ilham Hafidz
                            </td>
                            <td>
                              mimin mohimin
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--end table-->
                    </div>
                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                          <tr>
                            <td>
                              ilham Hafidz
                            </td>
                            <td>
                              mimin mohimin
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--end table-->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card p-3 shadow-sm">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body new-user order-list">
                      <h4 class="header-title mt-0 mb-3">Selesai</h4>
                      <div class="table-responsive">
                        <table class="table table-hover mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th class="border-top-0">No</th>
                              <th class="border-top-0">Nama pegawai</th>
                              <th class="border-top-0">Tanggal</th>
                              <th class="border-top-0">Opsi</th>
                            </tr><!--end tr-->
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach ($docs as $val): ?>
                            <?php if (!empty($val->document_file && $val->created_at >= date("Y-m-01 00:00:00") && $val->created_at <= date('Y-m-t 23:59:59'))): ?>
                            <tr>
                              <td>
                                <?=$no++ ?>
                              </td>
                              <td>
                                <?=$val->fullname ?>
                              </td>
                              <td><?=time_ago($val->created_at) ?></td>
                              <td>
                                <a href="javascript:void(0)" class="btn btn-primary">Detail</a>
                              </td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <!--end table-->
                      </div>
                      <!--end /div-->
                    </div>
                    <!--end card-body-->
                  </div>
                  <!--end card-->
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body new-user order-list">
                      <h4 class="header-title mt-0 mb-3">Belum</h4>
                      <div class="table-responsive">
                        <table class="table table-hover mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th class="border-top-0">No</th>
                              <th class="border-top-0">Nama pegawai</th>
                              <th class="border-top-0">Tanggal</th>
                              <th class="border-top-0">Opsi</th>
                            </tr><!--end tr-->
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach ($docs as $val): ?>
                            <?php if (empty($val->document_file && $val->created_at >= date("Y-m-01 00:00:00") && $val->created_at <= date('Y-m-t 23:59:59'))): ?>
                            <tr>
                              <td>
                                <?=$no++ ?>
                              </td>
                              <td>
                                <?=$val->fullname ?>
                              </td>
                              <td> - </td>
                              <td>
                                <a href="javascript:void(0)" class="btn btn-primary">Detail</a>
                              </td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <!--end table-->
                      </div>
                      <!--end /div-->
                    </div>
                    <!--end card-body-->
                  </div>
                  <!--end card-->
                </div>
                <!--end col-->
              </div>
            </div>
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
                        <td>
                          123456
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Nama
                        </td>
                        <td>
                          Ilham Hafidz
                        </td>
                      </tr>
                      <tr>
                        <td>
                          No. Telp
                        </td>
                        <td>
                          0974567809753
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Alamat
                        </td>
                        <td>
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
    <?php view('_layouts/end'); ?>
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