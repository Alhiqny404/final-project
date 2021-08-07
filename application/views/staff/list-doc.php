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
                        <th>Tanggal Upload</th>
                        <th>Tanggal Respon</th>
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