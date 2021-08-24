<?php
// Prefix halaman ini
$prefix_page = 'user/laporan/';

?>

<?php view('_layouts/header'); ?>
<link href="<?=assets_dashboard() ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?=assets_dashboard() ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?=assets_dashboard() ?>plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">
<link href="<?=assets_dashboard() ?>plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?=assets_dashboard(); ?>plugins/dropify/css/dropify.min.css" rel="stylesheet">

<?php  view('_layouts/topbar'); ?>
<?php view('_layouts/wrapper-img'); ?>
<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">
        <?php if ($laporan_bulan_ini): ?>
        <div class="alert alert-success border-0" role="alert">
          <strong>Hai <?=$this->session->userdata('nama_lengkap'); ?>:) </strong> Kamu telah mengirim laporan bulan ini - <?=$laporan_bulan_ini->tgl_upload ?>.
        </div>
        <?php else : ?>
        <div class="alert alert-danger border-0" role="alert">
          <strong>Hai <?=$this->session->userdata('nama_lengkap'); ?>:) </strong> Kamu belum mengirim laporan bulan ini.
        </div>
        <?php endif; ?>


        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-body table-responsive">
                <div class="text-right">
                  <?php if (!$laporan_bulan_ini): ?>
                  <a href="javascript:void(0)" class="btn btn-primary waves-effect text-right mb-4 tambah-data"><i class="fa fa-plus"></i></a>
                  <?php endif; ?>
                </div>
                <div class="table-responsive">
                  <table id="datatable" class="table table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Diupload</th>
                        <th>Direspon</th>
                        <th><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($laporan as $val): ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$val->judul; ?></td>
                        <td>
                          <?php if ($val->status == 'pending'): ?>
                          <span class="badge badge-warning"><?=$val->status; ?></span>
                          <?php elseif ($val->status == 'accept'): ?>
                          <span class="badge badge-success"><?=$val->status; ?></span>
                          <?php elseif ($val->status == 'reject'): ?>
                          <span class="badge badge-danger"><?=$val->status; ?></span>
                          <?php endif; ?>
                        </td>
                        <td><?=$val->tgl_upload; ?></td>
                        <td><?=$val->tgl_respon; ?></td>
                        <td>
                          <center>
                            <?php if ($val->status != 'accept'): ?>
                            <button type="button" class="btn btn-sm btn-success mr-2 edit-table"
                              data-id="<?=$val->id ?>"
                              data-judul="<?=$val->judul ?>"
                              data-file="<?=$val->file ?>"
                              ><i class="fas fa-edit"></i></button>
                            <?php endif; ?>
                            <a href="<?=base_url('uploads/laporan/'.$val->file) ?>" class="btn btn-sm btn-info"><i class="fas fa-download"></i></a>
                            <!--
                                                                                                                                                                                                                                                                                                                                                                                                        <button type="button" class="btn btn-sm btn-danger delete-table"
                                                                                                                                                                                                                                                                                                                                                                                                          data-id="<?=$val->id ?>"
                                                                                                                                                                                                                                                                                                                                                                                                          data-judul="<?=$val->judul ?>"
                                                                                                                                                                                                                                                                                                                                                                                                          data-file="<?=$val->file ?>"
                                                                                                                                                                                                                                                                                                                                                                                                          ><i class="fas fa-trash-alt"></i></button>
                                                                                                                                                                                                                                                                                                                                                                                                      -->
                          </center>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
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


<!-- Required datatable js -->
<script src="<?=assets_dashboard() ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Responsive examples -->
<script src="<?=assets_dashboard() ?>plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/select2/select2.min.js"></script>


<script src="<?=assets_dashboard() ?>plugins/custombox/custombox.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/custombox/custombox.legacy.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/parsleyjs/parsley.min.js"></script>
<script src="<?=assets_dashboard() ?>pages/jquery.validation.init.js"></script>
<script src="<?=assets_dashboard(); ?>plugins/dropify/js/dropify.min.js"></script>

<script>

  $(document).ready(function() {


    // Basic
    $('.dropify').dropify();


    $(".select2").select2({
      width: '100%'
    });

    // menggunakan liblary datatable
    $('#datatable').DataTable();

    // ketika button tambah diklik
    $('.tambah-data').on('click',
      function(e) {
        resetForm('#form');
        let url = "<?=site_url($prefix_page.'add') ?>";

        $('.custom-modal-title').html('Tambah Data Laporan');
        $('#form').attr('action', url)
        modalku('#custom-modal', 'fadein');
      });

    // ketika button edit diklik
    $('.edit-table').on('click',
      function(e) {
        let url = "<?=site_url($prefix_page.'edit') ?>";
        let id = $(this).data('id');
        let judul = $(this).data('judul');
        let file = $(this).data('file');
        $('[name=file]').removeAttr('required');

        $('.custom-modal-title').html('Edit Data Laporan');
        $('#form').attr('action', url);
        $('[name=id]').val(id);
        $('[name=judul]').val(judul);
        $('[name=file_lama]').val(file);
        //  $('[name=file]').val(file);
        modalku('#custom-modal', 'fadein');
      })

    // ketika button hapus diklik
    $('.delete-table').on('click',
      function(e) {
        let url = "<?=site_url($prefix_page.'delete') ?>";
        let id = $(this).data('id');
        let nama = $(this).data('nama_lengkap');
        let file = $(this).data('file');
        let form = $('<form/>', {
          action: url, method: 'POST'
        }).append(
          $('<input>', {
            type: 'hidden', name: "<?=$this->security->get_csrf_token_name() ?>", value: "<?=$this->security->get_csrf_hash() ?>"
          }),
          $('<input>', {
            type: 'hidden', name: 'id', value: id
          }),
          $('<input>', {
            type: 'hidden', name: 'file', value: file
          }),
        ).appendTo('body');

        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        })
      })
  });

</script>



<div id="custom-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.modal.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>
  <h4 class="custom-modal-title"></h4>
  <div class="row custom-modal-text">
    <div class="col-12">
      <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
        <?=csrf() ?>
        <input type="hidden" name="id">
        <input type="hidden" name="file_lama">
        <div class="form-group">
          <label>Judul</label>
          <input type="text" class="form-control" required placeholder="Isi Judul" name="judul" required />
        </div>
        <div class="form-group">
          <label for="file">
            File Laporan
          </label>
          <input type="file" id="input-file-events" class="dropify" name="file" required="" />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary waves-effect waves-light">
            Submit
          </button>
          <button type="reset" class="btn btn-secondary waves-effect m-l-5">
            Reset
          </button>
        </div>
        <!--end form-group-->
      </form>
    </div>
  </div>

</div>

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