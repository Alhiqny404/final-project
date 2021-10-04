<?php
// Prefix halaman ini
$prefix_page = 'admin/kelola/user/';
?>

<?php view('_layouts/header'); ?>
<link href="<?=assets_dashboard(); ?>plugins/dropify/css/dropify.min.css" rel="stylesheet">
<link href="<?=assets_dashboard() ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?=assets_dashboard() ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?=assets_dashboard() ?>plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">
<link href="<?=assets_dashboard() ?>plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

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
                <div class="w-100 d-flex justify-content-between">
                  <div>
                    <a href="<?=site_url($prefix_page.'template') ?>" class="btn btn-danger waves-effect mb-4">
                      <i class="fas fa-download"></i>
                      Download Template
                    </a>
                    <a href="" class="btn btn-success waves-effect text-right mb-4" data-bs-toggle="modal" data-bs-target="#importModal">
                      <i class="fa fa-file-import me-2"></i>
                      Import Excel
                    </a>
                  </div>
                  <a href="<?=site_url($prefix_page.'add') ?>" class="btn btn-primary waves-effect text-right mb-4 tambah-data">
                    <i class="fa fa-user-plus me-2"></i>
                    Tambah Pegawai
                  </a>
                </div>
                <div class="table-responsive">
                  <table id="datatable" class="table table-hover table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Pangkat</th>
                        <th><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($user as $val): ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$val->nip; ?></td>
                        <td><?=$val->username; ?></td>
                        <td><?=$val->nama_lengkap; ?></td>
                        <td><?=$val->nama_jabatan; ?></td>
                        <td><?=$val->nama_pangkat; ?></td>
                        <td>
                          <center>
                            <a href="<?=site_url($prefix_page.'edit/'.$val->id) ?>" class="btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger delete-table"
                              data-id="<?=$val->id ?>"
                              data-nama="<?=$val->nama_lengkap ?>"><i class="fas fa-trash-alt"></i></button>
                            <button type="button" class="btn btn-sm  btn-primary" onclick="detailUser(
                              '<?=$val->nip ?>','<?=$val->nama_lengkap ?>','<?=$val->nama_jabatan ?>','<?=$val->nama_pangkat ?>','<?=$val->no_hp ?>','<?=$val->email ?>','<?=$val->username ?>','<?=$val->alamat ?>','<?=profilePict($val->id) ?>'
                              )">
                              <i class="fas fa-eye"></i>
                            </button>
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


      <!-- Import Modal -->
      <div class="modal fade" id="importModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Import Data User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?=site_url($prefix_page.'import_excel') ?>">
              <div class="modal-body">
                <?=csrf() ?>
                <div class="form-group">
                  <label for="doc_file">
                    Pastikan file berbentuk excel!
                  </label>
                  <input type="file" id="input-file-now" class="dropify" required="" name="fileimport" id="fileimport" />
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-file-import me-2"></i> Import
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>


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
<script src="<?=assets_dashboard(); ?>plugins/dropify/js/dropify.min.js">
</script>
<script src="<?=assets_dashboard() ?>plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/select2/select2.min.js"></script>


<script src="<?=assets_dashboard() ?>plugins/custombox/custombox.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/custombox/custombox.legacy.min.js"></script>
<script src="<?=assets_dashboard() ?>plugins/parsleyjs/parsley.min.js"></script>
<script src="<?=assets_dashboard() ?>pages/jquery.validation.init.js"></script>

<script>
  $(function () {
    // Basic
    $('.dropify').dropify();

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event,
      element) {
      return confirm("Do you really want to delete\"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event,
      element) {
      alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event,
      element) {
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

  $(document).ready(function() {

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

        $('.custom-modal-title').html('Tambah Data User');
        $('#form').attr('action', url)
        modalku('#custom-modal', 'fadein');
      });

    // ketika button edit diklik
    $('.edit-table').on('click',
      function(e) {
        let url = "<?=site_url($prefix_page.'edit') ?>";
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let nip = $(this).data('nip');
        let jabatan = $(this).data('jabatan-id');
        let pangkat = $(this).data('pangkat-id');
        let role = $(this).data('role');
        let username = $(this).data('username');
        console.log(role)
        if (role == 'superadmin') {
          role = '1';
        } else if (role == 'admin') {
          role = '2';
        } else if (role == 'supervisor') {
          role = '3';
        } else if (role == 'user') {
          role = '4';
        }

        $('.custom-modal-title').html('Edit Data User');
        $('#form').attr('action', url);
        $('[name=id]').val(id);
        $('[name=nip]').val(nip);
        $('[name=nama_lengkap]').val(nama);
        $('[name=jabatan_id]').val(jabatan);
        $('[name=pangkat_id]').val(pangkat);
        $('[name=role]').val(role);
        modalku('#custom-modal', 'fadein');
      })

    // ketika button hapus diklik
    $('.delete-table').on('click',
      function(e) {
        let url = "<?=site_url($prefix_page.'delete') ?>";
        let id = $(this).data('id');
        let nama = $(this).data('nama_lengkap');
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
      })
  });

  function detailUser(nip, nama, jabatan, pangkat, no_hp, email, username, alamat, profilepict) {
    $('.show-profilepict').attr('src', '<?=base_url() ?>'+profilepict);
    $('#modal_detail').modal('show');
    $('.show-nip').html(nip);
    $('.show-nama').html(nama);
    $('.show-jabatan').html(jabatan);
    $('.show-pangkat').html(pangkat);
    $('.show-no_hpt').html(no_hp);
    $('.show-email').html(email);
    $('.show-username').html(username);
    $('.show-alamat').html(alamat);
  }


</script>


<!-- modal -->
<div class="modal fade" id="modal_detail" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="text-center">
          <img src="" alt="" class="m-auto rounded-circle show-profilepict" style="max-height: 200px; max-width: 200px">
        </h5>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <tr>
              <td>
                NIP
              </td>
              <td class="show-nip">
                123456
              </td>
            </tr>
            <tr>
              <td>
                Nama
              </td>
              <td class="show-nama">
                Ilham Hafidz
              </td>
            </tr>
            <tr>
              <td>
                Pangkat
              </td>
              <td class="show-pangkat">
                Ilham Hafidz
              </td>
            </tr>
            <tr>
              <td>
                Jabatan
              </td>
              <td class="show-jabatan">
                Ilham Hafidz
              </td>
            </tr>
            <tr>
              <td>
                No. Telp
              </td>
              <td class="show-no_hp">
                0974567809753
              </td>
            </tr>
            <tr>
              <td>
                Email
              </td>
              <td class="show-email">
                0974567809753
              </td>
            </tr>
            <tr>
              <td>
                Username
              </td>
              <td class="show-username">
                0974567809753
              </td>
            </tr>
            <tr>
              <td>
                Alamat
              </td>
              <td class="show-alamat">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ipsa quibusdam, do odio illum at consectetur labore quaerat dolore et, necessitatibus!
              </td>
            </tr>
          </table>
          <!--end table-->
        </div>
      </div>
    </div>
  </div>
</div>

<?php if ($this->session->flashdata('success')): ?>
<script>
  alertCenter('Berhasil', "<?=$this->session->flashdata('success'); unset($_SESSION['success']); ?>", 'success');
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
<script>
  alertCenter('Gagal', "<?=$this->session->flashdata('error'); unset($_SESSION['error']); ?>", 'error');
</script>
<?php endif; ?>

<?php view('_layouts/end'); ?>