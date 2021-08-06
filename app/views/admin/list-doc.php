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

                <h4 class="mt-0 header-title">Pengajuan Dokumen</h4>
                <div class="table-responsive">
                  <table class="table table-bordered mb-0 table-centered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>File Dokumen</th>
                        <th>Jenis File</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach ($documents as $doc): ?>
                      <?php
                      $extension = pathinfo($doc->document_file, PATHINFO_EXTENSION);
                      ?>
                      <tr>
                        <td><?=$i++ ?></td>
                        <td><?=$doc->document_name ?></td>
                        <td><a href="<?=site_url("uploads/$doc->document_file") ?>">Download File</a></td>
                        <td><?=$extension ?></td>
                        <?php if ($doc->document_status == 'pending'): ?>
                        <td><span class="badge badge-warning"><?=$doc->document_status ?></span></td>
                        <?php elseif ($doc->document_status == 'setuju'): ?>
                        <td><span class="badge badge-success"><?=$doc->document_status ?></span></td>
                        <?php endif; ?>
                        <td><?=$doc->created_at ?></td>
                        <td>
                          <div class="dropdown d-inline-block float-right">
                            <a class="nav-link dropdown-toggle arrow-none" id="dLabel8" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel8">
                              <a class="dropdown-item" href="<?=site_url("admin/upload_doc/{$doc->document_id}") ?>">Setujui</a>
                              <a class="dropdown-item" href="#">Tolak</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <!--end /table-->
                </div>
                <!--end /tableresponsive-->
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