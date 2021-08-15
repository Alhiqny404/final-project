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
          <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-body">
                <?php $i = 1; foreach ($documents as $doc): ?>
                <?php
                $extension = extension($doc->document_file);
                ?>
                <div class="card p-2">
                  <div class="row">
                    <div class="col-sm-3 d-flex align-items-center">
                      <img src="<?=assets_dashboard() ?>images/thumbnail/<?=$extension ?>.jpg" width="100%" class="rounded">
                    </div>
                    <div class="col-sm-9 p-3 pb-5 position-relative">
                      <h4 class="my-0 text-uppercase d-inline"><?=$doc->document_name ?></h4>
                      <small class="text-muted ms-2">.<?= $extension ?></small>
                      <br>
                      <div class="my-3">
                        <p class="text-muted my-0">
                          Diupload pada : <?=date('d-m-Y', strtotime($doc->created_at)); ?>
                        </p>
                      </div>
                      <div class="position-absolute w-100 bottom-0 d-flex align-items-center justify-content-end p-3" style="bottom: 0;padding-left: 0 !important;">
                        <a href="<?=site_url("uploads/$doc->document_file") ?>" class="btn btn-info mr-4">
                          <i class="fas fa-download"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>

              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
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