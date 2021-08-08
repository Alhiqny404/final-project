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
                <nav>
                  <div class="nav nav-tabs d-flex align-items-center justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all">Semua Dokumen</button>
                    <button class="nav-link" id="nav-success-tab" data-bs-toggle="tab" data-bs-target="#nav-success">Dukumen Diizinkan</button>
                    <button class="nav-link" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending">Dokumen Butuh Perizinan</button>
                    <button class="nav-link" id="nav-reject-tab" data-bs-toggle="tab" data-bs-target="#nav-reject">Dokumen Ditolak</button>
                    <button class="nav-link ml-auto" id="nav-list-table-tab" data-bs-toggle="tab" data-bs-target="#nav-list-table">Lihat Sebagai Table</button>
                  </div>
                </nav>
                <div class="tab-content pt-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
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
                          <?php if ($doc->document_status == 'pending'): ?>
                          <span class="badge badge-warning">
                            <i class="fas fa-info mr-2"></i>
                            Dokumen Butuh Perizinan
                          </span>
                          <?php elseif ($doc->document_status == 'setuju'): ?>
                          <span class="badge badge-success">
                            <i class="fas fa-check mr-2"></i>
                            Dukument Telah Disetujui
                          </span>
                          <?php elseif ($doc->document_status == 'tolak'): ?>
                          <span class="badge badge-danger">
                            <i class="fas fa-times mr-2"></i>
                            Dokumen Tidak Disetujui
                          </span>
                          <?php endif; ?>
                          <div class="my-3">
                            <p class="text-muted my-0">
                              Meminta Perizinan Pada : <?=date('d-m-Y', strtotime($doc->created_at)); ?>
                            </p>
                            <p class="text-muted mt-0 mb-3">
                              Direspon Pada :
                              <?php if ($doc->responsed_at == '0000-00-00 00:00:00'): ?>
                              <i>Belum Direspon</i>
                              <?php else : ?>
                              <?=date('d-m-Y', strtotime($doc->responsed_at)); ?>
                              <?php endif; ?>
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
                  <div class="tab-pane fade" id="nav-success" role="tabpanel" aria-labelledby="nav-success-tab">
                    <?php $i = 1; foreach ($success_documents as $doc): ?>
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
                          <?php if ($doc->document_status == 'pending'): ?>
                          <span class="badge badge-warning">
                            <i class="fas fa-info mr-2"></i>
                            Dokumen Butuh Perizinan
                          </span>
                          <?php elseif ($doc->document_status == 'setuju'): ?>
                          <span class="badge badge-success">
                            <i class="fas fa-check mr-2"></i>
                            Dukument Telah Disetujui
                          </span>
                          <?php elseif ($doc->document_status == 'tolak'): ?>
                          <span class="badge badge-danger">
                            <i class="fas fa-times mr-2"></i>
                            Dokumen Tidak Disetujui
                          </span>
                          <?php endif; ?>
                          <div class="my-3">
                            <p class="text-muted my-0">
                              Meminta Perizinan Pada : <?=date('d-m-Y', strtotime($doc->created_at)); ?>
                            </p>
                            <p class="text-muted mt-0 mb-3">
                              Direspon Pada :
                              <?php if ($doc->responsed_at == '0000-00-00 00:00:00'): ?>
                              <i>Belum Direspon</i>
                              <?php else : ?>
                              <?=date('d-m-Y', strtotime($doc->responsed_at)); ?>
                              <?php endif; ?>
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
                  <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                    <?php $i = 1; foreach ($pending_documents as $doc): ?>
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
                          <?php if ($doc->document_status == 'pending'): ?>
                          <span class="badge badge-warning">
                            <i class="fas fa-info mr-2"></i>
                            Dokumen Butuh Perizinan
                          </span>
                          <?php elseif ($doc->document_status == 'setuju'): ?>
                          <span class="badge badge-success">
                            <i class="fas fa-check mr-2"></i>
                            Dukument Telah Disetujui
                          </span>
                          <?php elseif ($doc->document_status == 'tolak'): ?>
                          <span class="badge badge-danger">
                            <i class="fas fa-times mr-2"></i>
                            Dokumen Tidak Disetujui
                          </span>
                          <?php endif; ?>
                          <div class="my-3">
                            <p class="text-muted my-0">
                              Meminta Perizinan Pada : <?=date('d-m-Y', strtotime($doc->created_at)); ?>
                            </p>
                            <p class="text-muted mt-0 mb-3">
                              Direspon Pada :
                              <?php if ($doc->responsed_at == '0000-00-00 00:00:00'): ?>
                              <i>Belum Direspon</i>
                              <?php else : ?>
                              <?=date('d-m-Y', strtotime($doc->responsed_at)); ?>
                              <?php endif; ?>
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
                  <div class="tab-pane fade" id="nav-reject" role="tabpanel" aria-labelledby="nav-reject-tab">
                    <?php $i = 1; foreach ($reject_documents as $doc): ?>
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
                          <?php if ($doc->document_status == 'pending'): ?>
                          <span class="badge badge-warning">
                            <i class="fas fa-info mr-2"></i>
                            Dokumen Butuh Perizinan
                          </span>
                          <?php elseif ($doc->document_status == 'setuju'): ?>
                          <span class="badge badge-success">
                            <i class="fas fa-check mr-2"></i>
                            Dukument Telah Disetujui
                          </span>
                          <?php elseif ($doc->document_status == 'tolak'): ?>
                          <span class="badge badge-danger">
                            <i class="fas fa-times mr-2"></i>
                            Dokumen Tidak Disetujui
                          </span>
                          <?php endif; ?>
                          <div class="my-3">
                            <p class="text-muted my-0">
                              Meminta Perizinan Pada : <?=date('d-m-Y', strtotime($doc->created_at)); ?>
                            </p>
                            <p class="text-muted mt-0 mb-3">
                              Direspon Pada :
                              <?php if ($doc->responsed_at == '0000-00-00 00:00:00'): ?>
                              <i>Belum Direspon</i>
                              <?php else : ?>
                              <?=date('d-m-Y', strtotime($doc->responsed_at)); ?>
                              <?php endif; ?>
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
                  <div class="tab-pane fade" id="nav-list-table" role="tabpanel" aria-labelledby="nav-list-table-tab">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered mb-0 table-centered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Dokumen</th>
                                <th>File Dokumen</th>
                                <th>Jenis File</th>
                                <th>Status</th>
                                <th>Tanggal Upload</th>
                                <th>Tanggal Respon</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; foreach ($documents as $doc): ?>
                              <?php
                              $extension = extension($doc->document_file);
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
                                <?php elseif ($doc->document_status == 'tolak'): ?>
                                <td><span class="badge badge-danger"><?=$doc->document_status ?></span></td>
                                <?php endif; ?>
                                <td><?=date('d-m-Y', strtotime($doc->created_at)); ?></td>
                                <?php if ($doc->responsed_at == '0000-00-00 00:00:00'): ?>
                                <td align="center"> - </td>
                                <?php else : ?>
                                <td><?=date('d-m-Y', strtotime($doc->responsed_at)); ?></td>
                                <?php endif; ?>
                              </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                          <!--end /table-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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


<script type="text/javascript" charset="utf-8">

  function swalSuccess(title) {
    Swal.fire(
      'Berhasil!',
      `${title}.`,
      'success'
    )
  }

</script>


<?php if ($this->session->flashdata('success')): ?>
<script>
  swalSuccess("<?=$this->session->flashdata('success') ?>");
</script>
<?php endif; ?>