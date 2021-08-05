<?php view('_layouts/header'); ?>
<link href="<?=assets_dashboard(); ?>plugins/dropify/css/dropify.min.css" rel="stylesheet">
<?php  view('_layouts/topbar'); ?>
<?php view('_layouts/wrapper-img'); ?>
<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mt-0 header-title">Upload Document</h4>
                <p class="text-muted mb-4">
                  ini adalah teks lorem buatan sendiri
                </p>
                <form action="" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                    <label for="doc_name">Document Name</label>
                    <input type="text" id="doc_name" class="form-control" name="doc_name" required="" />
                  </div>
                  <div class="form-group">
                    <label for="doc_file">Document</label>
                    <input type="file" id="input-file-now" class="dropify" name="doc_file" required="" />
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Submit Now</button>
                  </div>
                </form>
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
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
<script src="<?=assets_dashboard(); ?>plugins/dropify/js/dropify.min.js">
</script>
<script>

  $(function () {
    // Basic
    $('.dropify').dropify();

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
      return confirm("Do you really want to delete\"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
      alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element) {
      console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
      e.preventDefault();
      if (drDestroy.isDropified()) {
        drDestroy.destroy();
      } else {
        drDestroy.init();
      }
    })
  });
</script>