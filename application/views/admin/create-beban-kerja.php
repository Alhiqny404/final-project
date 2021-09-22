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
                  <label for="bulan" class="form-label">Bulan Kerja</label>
                  <select name="bulan[]" id="bulan" class="form-select" multiple>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">Nobember</option>
                    <option value="12">Desember</option>
                  </select>
                  <div class="invalid-feedback">
                    inputan harus diisi
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-4">
                  <label for="catatan" class="form-label">Catatan</label>
                  <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control"></textarea>
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