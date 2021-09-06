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
          <h3 class="p-3">Tambah User</h3>
          <div class="card-body">
            <form action="<?=site_url($prefix_page.'insert') ?>" method="post" class="needs-validation" novalidate>
              <?=csrf() ?>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nip" class="form-label">Masukan NIP</label>
                  <input type="text" class="form-control" placeholder="NIP..." id="nip" required="" name="nip">
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="nama" class="form-label">Masukan Nama Lengkap</label>
                  <input type="text" class="form-control" placeholder="Nama..." id="nama" name="nama_lengkap" required="">
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required="">
                    <option selected hidden value="">-- Pilih Jenis Kelamin --</option>
                    <option value="l">Laki-laki</option>
                    <option value="p">Perempuan</option>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required="">
                  </div>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Email Aktif</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" required="">
                    <div class="invalid-feedback">
                      inputan harus diisi
                    </div>
                  </div>

                </div>
                <div class="col-md-6 mb-3">
                  <label for="no_hp" class="form-label">No. Handphone Aktif</label>
                  <input type="number" class="form-control" name="no_hp" id="no_hp" required="">
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="alamat" class="form-label">Alamat Lengkap</label>
                  <textarea name="alamat" id="alamat" rows="4" class="form-control valtextar" placeholder="Alamat..." required=""></textarea>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="role" class="form-label">Role</label>
                  <select class="form-select" id="role" name="role" required="">
                    <option selected hidden value="">-- Pilih Role --</option>
                    <option value="superadmin">Superadmin</option>
                    <option value="admin">Admin</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="user">User</option>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="jabatan_id" class="form-label">Jabatan</label>
                  <select class="form-select" name="jabatan_id" id="jabatan_id" required="">
                    <option selected hidden value="">-- Pilih Jabatan --</option>
                    <?php foreach ($jabatan as $val): ?>
                    <option value="<?=$val->id ?>"><?=$val->nama_jabatan ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="pangkat_id" class="form-label">Pangkat</label>
                  <select class="form-select" id="pangkat_id" name="pangkat_id" required="">
                    <option selected hidden value="">-- Pilih Pangkat --</option>
                    <?php foreach ($pangkat as $val): ?>
                    <option value="<?=$val->id ?>"><?=$val->nama_pangkat ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
                <div class="col-md-6 mt-4">
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                    <div class="invalid-feedback">
                      inputan harus diisi
                    </div>
                  </div>

                </div>
                <div class="col-md-6 mt-4">
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <div class="invalid-feedback">
                      inputan harus diisi
                    </div>
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