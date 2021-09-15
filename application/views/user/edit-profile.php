<?php view('_layouts/header'); ?>
<?php  view('_layouts/topbar'); ?>
<link href="<?=assets_dashboard(); ?>plugins/dropify/css/dropify.min.css" rel="stylesheet">
<?php view('_layouts/wrapper-img'); ?>
<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">
        <div class="card p-3">
          <h3 class="text-center text-dark mb-4">Edit Biodata</h3>
          <form>
            <div class="row">
              <div class="mb-3 col-md-12">
                <input type="file" id="input-file-events" class="dropify" name="file" required="" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control">
              </div>
              <div class="mb-3 col-md-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jk">
                  <option selected hidden>Jenis Kelamin</option>
                  <option value="">Laki-laki</option>
                  <option value="">Perempuan</option>
                </select>
              </div>
              <div class="mb-3 col-md-12">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" rows="3"></textarea>
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control">
              </div>
              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">No.Telepon</label>
                <input type="number" class="form-control">
              </div>
              <div class="my-3 col-md-12 text-end">
                <a href="" class="btn btn-danger">
                  Kembali
                </a>
                <button type="submit" class="btn btn-primary px-5">
                  <i class="fas fa-save"></i>
                  Edit Data
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
<script src="<?=assets_dashboard(); ?>plugins/dropify/js/dropify.min.js">
</script>
<script>
  $(document).ready(function() {
    $('.dropify').dropify();
  });
</script>

<?php view('_layouts/end'); ?>