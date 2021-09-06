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
          <form action="<?=site_url('admin/beban/insert') ?>" method="POST" class="needs-validation" novalidate>
            <?=csrf() ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="user_id" class="form-label">Nama Pegawai</label>
                  <select name="user_id" id="user_id" class="form-select" required>
                    <option value="" hidden selected>-- pilih pegawai --</option>
                    <?php foreach ($user as $val): ?>
                    <option value="<?=$val->id ?>"><?=$val->nama_lengkap ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="nama_pekerjaan" class="form-label">Nama Pekerjaan</label>
                  <input type="text" name="nama_pekerjaan" id="nama_pekerjaan" class="form-control" required>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="seksi_id" class="form-label">Seksi</label>
                  <select name="seksi_id" id="seksi_id" class="form-select" required>
                    <option hidden selected value="">-- pilih seksi --</option>
                    <?php foreach ($seksi as $val): ?>
                    <option value="<?=$val->id ?>"><?=$val->nama_seksi ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-4">
                  <label for="tgl_buat" class="form-label">Tanggal Pekerjaan</label>
                  <input type="date" id="tgl_buat" name="tgl_buat" class="form-control" required>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-end">
                <a href="<?=site_url('admin/beban') ?>" class="btn btn-danger">
                  Kembali
                </a>
                <button class="btn btn-primary px-4">
                  <i class="fas fa-save me-2"></i> Submit
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