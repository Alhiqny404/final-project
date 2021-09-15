<?php
$prefixPage = 'user/akun/';
?>
<?php view('_layouts/header'); ?>
<?php  view('_layouts/topbar'); ?>
<?php view('_layouts/wrapper-img'); ?>
<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">
        <div class="card p-3">
          <h3 class="text-center text-dark mb-4">Edit Account</h3>
          <form action="<?=site_url($prefixPage.'update') ?>" method="post">
            <?=csrf() ?>
            <input type="hidden" name="id" value="<?=$user->id ?>">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" name="username" value="<?=$user->username ?>" required="">
              </div>
              <div class="mb-3 col-md-6">
                <label for="old_pass" class="form-label">Password Lama</label>
                <input type="password" id="old_pass" class="form-control" name="old_pass">
              </div>
              <div class="mb-3 col-md-6">
                <label for="new_pass" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="new_pass" name="new_pass">
              </div>
              <div class="mb-3 col-md-6">
                <label for="confirm_pass" class="form-label">Ulang Password Baru</label>
                <input type="password" class="form-control" id="confirm_pass" name="confirm_pass">
              </div>
              <div class="my-3 col-md-12 text-end">
                <a href="" class="btn btn-danger">
                  Kembali
                </a>
                <button type="submit" class="btn btn-primary px-4">
                  <i class="fas fa-save"></i>
                  Perbaharui Akun
                </button>
              </div>
            </div>
          </form>
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