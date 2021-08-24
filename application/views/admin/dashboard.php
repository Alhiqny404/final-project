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
          <div class="col-6">
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
          <div class="col-6">
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
        <!--end row-->
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

<script type="text/javascript" charset="utf-8">
  $.getJSON("<?=site_url('api/corona') ?>", function(data) {
    console.log(data[0].name)
    $('.corona-meninggal').html(data[0].meninggal);
    $('.corona-sembuh').html(data[0].sembuh);
    $('.corona-positif').html(data[0].positif);
  });
</script>