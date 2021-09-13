<?php
// Prefix halaman ini
$prefix_page = 'admin/kelola/user/';

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
        <div class="card">
          <h3 class="p-3">Edit User</h3>
          <div class="card-body">
            <form action="<?=site_url($prefix_page.'update') ?>" method="post" class="needs-validation" novalidate>
              <?=csrf() ?>
              <input type="hidden" name="id" value="<?=$user->id ?>">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nip" class="form-label">Masukan NIP</label>
                  <input type="text" class="form-control" placeholder="NIP..." id="nip" required="" name="nip" value="<?=$user->nip ?>">
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="role" class="form-label">Role</label>
                  <select class="form-select" id="role" name="role" required="">
                    <option selected hidden value="">-- Pilih Role --</option>
                    <option value="superadmin" <?=$user->role == 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                    <option value="admin" <?=$user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="supervisor" <?=$user->role == 'supervisor' ? 'selected' : '' ?>>Supervisor</option>
                    <option value="user" <?=$user->role == 'user' ? 'selected' : '' ?>>User</option>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="jabatan_id" class="form-label">Jabatan</label>
                  <select class="form-select" name="jabatan_id" id="jabatan_id" required="">
                    <option selected hidden value="">-- Pilih Jabatan --</option>
                    <?php foreach ($jabatan as $val): ?>
                    <option value="<?=$val->id ?>" <?=$user->jabatan_id == $val->id ? 'selected' : '' ?>><?=$val->nama_jabatan ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="pangkat_id" class="form-label">Pangkat</label>
                  <select class="form-select" id="pangkat_id" name="pangkat_id" required="">
                    <option selected hidden value="">-- Pilih Pangkat --</option>
                    <?php foreach ($pangkat as $val): ?>
                    <option value="<?=$val->id ?>" <?=$user->pangkat_id == $val->id ? 'selected' : '' ?>><?=$val->nama_pangkat ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-12 mt-4">
                  <div class="d-flex justify-content-between">
                    <a href="<?=site_url($prefix_page) ?>" class="btn btn-danger">
                      <i class="fas fa-door-open me-2"></i> Kembali
                    </a>
                    <div>
                      <button type="reset" class="btn btn-warning">
                        <i class="fas fa-sync-alt"></i> Reset
                      </button>
                      <button class="btn btn-primary px-5" type="submit">
                        <i class="fas fa-save me-2"></i> Submit
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
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



<?php if ($this->session->flashdata('success')): ?>
<script>
  alertCenter('Berhasil', "<?=$this->session->flashdata('success') ?>", 'success');
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
<script>
  alertCenter('Gagal', "<?=$this->session->flashdata('error') ?>", 'error');
</script>
<?php endif; ?>

<?php view('_layouts/end'); ?>