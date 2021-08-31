<?php
// Prefix halaman ini
$prefix_page = 'admin/kelola/user/';

?>

<?php view('_layouts/header'); ?>
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
                <div class="row">
                  <form class="form-inline" method="post" enctype="multipart/form-data" action="<?=site_url($prefix_page.'import_excel') ?>">
                    <?=csrf() ?>
                    <div class="form-group mb-2">
                      <label for="fileimport" class="sr-only">Import Excel</label>
                      <input type="file" class="form-control" name="fileimport" id="fileimport">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Import</button>
                  </form>
                </div>
                <div class="text-right">
                  <a href="javascript:void(0)" class="btn btn-primary waves-effect text-right mb-4 tambah-data"><i class="fa fa-plus"></i></a>
                </div>
                <div class="table-responsive">
                  <table id="datatable" class="table table-hover table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Pangkat</th>
                        <th>JK</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th>Username</th>
                        <th><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($user as $val): ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$val->nip; ?></td>
                        <td><?=$val->nama_lengkap; ?></td>
                        <td><?=$val->nama_jabatan; ?></td>
                        <td><?=$val->nama_pangkat; ?></td>
                        <?php if (!empty($val->jenis_kelamin)): ?>
                        <td><?=$val->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan'; ?></td>
                        <?php else : ?>
                        <td> - </td>
                        <?php endif; ?>

                        <td><?=$val->email; ?></td>
                        <td><?=$val->no_hp; ?></td>
                        <td><?=$val->alamat; ?></td>
                        <td><?=$val->role; ?></td>
                        <td><?=$val->username ?></td>
                        <td>
                          <center>
                            <button type="button" class="btn btn-sm btn-success mr-2 edit-table"
                              data-id="<?=$val->id ?>"
                              data-nip="<?=$val->nip ?>"
                              data-nama="<?=$val->nama_lengkap ?>"
                              data-jabatan-id="<?=$val->jabatan_id ?>"
                              data-pangkat-id="<?=$val->pangkat_id ?>"
                              data-role="<?=$val->role ?>"

                              ><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger delete-table"
                              data-id="<?=$val->id ?>"
                              data-nama="<?=$val->nama_lengkap ?>"><i class="fas fa-trash-alt"></i></button>
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

<script>

  $(document).ready(function() {

    $(".select2").select2({
      width: '100%'
    });

    // menggunakan liblary datatable
    $('#datatable').DataTable();

    // ketika button tambah diklik
    $('.tambah-data').on('click', function(e) {
      resetForm('#form');
      let url = "<?=site_url($prefix_page.'add') ?>";

      $('.custom-modal-title').html('Tambah Data User');
      $('#form').attr('action', url)
      modalku('#custom-modal', 'fadein');
    });

    // ketika button edit diklik
    $('.edit-table').on('click', function(e) {
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
      console.log(1)
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

</script>



<div id="custom-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.modal.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>
  <h4 class="custom-modal-title"></h4>
  <div class="row custom-modal-text">
    <div class="col-12">
      <form class="form" id="form" action="" method="post">
        <?=csrf() ?>
        <input type="hidden" name="id">
        <div class="form-group">
          <label>NIP</label>
          <input type="text" class="form-control" required placeholder="Isi NIP" name="nip" required />
        </div>
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control" required placeholder="Isi nama Lengkap" name="nama_lengkap" required />
        </div>
        <div class="form-group">
          <label>Jabatan</label>
          <select name="jabatan_id" id="jabatal_id" class="form-control required">
            <option value="" selected="">Belum Dipilih</option>
            <optgroup label="---- JABATAN ----">
              <?php foreach ($jabatan as $val): ?>
              <option value="<?=$val->id ?>"><?=$val->nama_jabatan ?></option>
              <?php endforeach; ?>
            </optgroup>
          </select>
        </div>
        <div class="form-group">
          <label>Pangkat</label>
          <select name="pangkat_id" id="pangkat_id" class="form-control" required>
            <option value="" selected="">Belum Dipilih</option>
            <optgroup label="---- PANGKAT ----">
              <?php foreach ($pangkat as $val): ?>
              <option value="<?=$val->id ?>"><?=$val->nama_pangkat ?></option>
              <?php endforeach; ?>
            </optgroup>
          </select>
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
            <option value="" selected="">Belum Dipilih</option>
            <option value="l">Laki-laki</option>
            <option value="p">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" required placeholder="Isi alamat email" name="email" required />
        </div>
        <div class="form-group">
          <label>Nomor Handphone</label>
          <input type="text" class="form-control" required placeholder="Isi nomor hp" name="no_hp" required />
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="role" id="role" class="form-control" required>
            <option value="" selected="">Belum Dipilih</option>
            <option value="1">Super Admin</option>
            <option value="2">Admin</option>
            <option value="3">Supervisor</option>
            <option value="4">User</option>
          </select>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" required class="form-control" required placeholder="Isi Username" name="username" />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" required class="form-control" required placeholder="Isi Password" name="password" value="12345678" />
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