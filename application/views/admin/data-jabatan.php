<?php
// Prefix halaman ini
$prefix_page = 'admin/kelola/jabatan/';

?>

<?php view('_layouts/header'); ?>
<link href="<?=assets_dashboard() ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?=assets_dashboard() ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?=assets_dashboard() ?>plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">

<?php  view('_layouts/topbar'); ?>
<?php view('_layouts/wrapper-img'); ?>
<div class="page-wrapper">
  <div class="page-wrapper-inner">

    <?php view('_layouts/sidenav'); ?>
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-body table-responsive">
                <div class="text-right">
                  <a href="javascript:void(0)" class="btn btn-primary waves-effect text-right mb-4 tambah-data"><i class="fa fa-plus"></i></a>
                </div>
                <div class="">
                  <table id="datatable" class="table dt-responsive table-hover nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th width="10%">No</th>
                        <th>Nama Jabatan</th>
                        <th width="20%"><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($jabatan as $val): ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$val->nama_jabatan ?></td>
                        <td>
                          <center>
                            <button type="button" class="btn btn-sm btn-success mr-2 edit-table" data-id="<?=$val->id ?>" data-nama="<?=$val->nama_jabatan ?>"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteUser(<?=$val->id?>)"><i class="fas fa-trash-alt"></i></button>
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


<script src="<?=assets_dashboard() ?>plugins/custombox/custombox.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/custombox/custombox.legacy.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/parsleyjs/parsley.min.js"></script>
<script src="<?=assets_dashboard() ?>pages/jquery.validation.init.js"></script>

<script>

  $(document).ready(function() {
    // menggunakan liblary datatable
    $('#datatable').DataTable();

    // ketika button tambah diklik
    $('.tambah-data').on('click', function(e) {
      resetForm('#form');
      let url = "<?=site_url($prefix_page.'add') ?>";

      $('.custom-modal-title').html('Tambah Data Jabatan');
      $('#form').attr('action', url)
      modalku('#custom-modal', 'fadein');
    });

    // ketika button edit diklik
    $('.edit-table').on('click', function(e) {
      let url = "<?=site_url($prefix_page.'edit') ?>";
      let id = $(this).data('id');
      let nama = $(this).data('nama');

      $('.custom-modal-title').html('Edit Data Jabatan');
      $('#form').attr('action', url)
      $('[name=id]').val(id)
      $('[name=nama_jabatan]').val(nama)
      modalku('#custom-modal', 'fadein');
    })

  });
  
  function deleteUser(id){
      let url = "<?=site_url($prefix_page.'delete') ?>";
      let form = $('<form/>', {
        action: url, method: 'POST'
      }).append(
        $('<input>', {
          type: 'hidden', name: "<?=$this->security->get_csrf_token_name() ?>", value: "<?=$this->security->get_csrf_hash() ?>"
        }),
        $('<input>', {
          type: 'hidden', name: 'id', value: id
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
  }

</script>


<div id="custom-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.modal.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>
  <h4 class="custom-modal-title"></h4>
  <div class="custom-modal-text">
    <div class="row">
      <div class="col">
        <form class="form" id="form" action="" method="post">
          <?=csrf() ?>
          <input type="hidden" name="id">
          <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" class="form-control" required placeholder="Isi nama jabatan" name="nama_jabatan" />
          </div>
          <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="Custombox.modal.close();">
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