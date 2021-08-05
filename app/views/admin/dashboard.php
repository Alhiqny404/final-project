<?php view('_layouts/header'); ?>
<?php  view('_layouts/topbar'); ?>
<?php view('_layouts/wrapper-img'); ?>
<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="float-right">
                  <i class="dripicons-jewel font-20 text-secondary"></i>
                </div>
                <span class="badge badge-warning">Pending Doc</span>
                <h3 class="font-weight-bold">10</h3>
                <p class="mb-0 text-muted text-truncate">
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="float-right">
                  <i class="dripicons-user-group font-24 text-secondary"></i>
                </div>
                <span class="badge badge-danger">Jumlah Staff</span>
                <h3 class="font-weight-bold"><?=$staff ?></h3>
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
<?php view('_layouts/end'); ?>