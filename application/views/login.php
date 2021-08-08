<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Frogetor - Responsive Bootstrap 4 Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A premium admin dashboard template by mannatthemes" name="description" />
  <meta content="Mannatthemes" name="author" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- App css -->
  <link href="<?=assets_dashboard(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=assets_dashboard(); ?>css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?=assets_dashboard(); ?>css/metismenu.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=assets_dashboard(); ?>css/style.css" rel="stylesheet" type="text/css" />

</head>

<body class="account-body bg-light">

  <!-- Log In page -->
  <div class="container">
    <div class="row vh-100  justify-content-center align-items-center">
      <div class="col-lg-4">
        <div class="card mb-0 shadow">
          <div class="card-body">
            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
              <h4>
                <center><?=$this->session->flashdata('error') ?></center>
              </h4>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
              <h4>
                <center><?=$this->session->flashdata('success') ?></center>
              </h4>
            </div>
            <?php endif; ?>
            <div class="">
              <div class="px-3">
                <div class="media">
                  <a href="index.html" class="logo logo-admin"><img src="<?=assets_dashboard(); ?>images/logo.png" height="55" alt="logo" class="my-3"></a>
                  <div class="media-body ml-3 align-self-center">
                    <h4 class="mt-0 mb-1 text-uppercase">Login</h4>
                    <small class="text-muted mb-0">
                      Badan Pusat Statistik Kabupaten Kuningan
                    </small>
                  </div>
                </div>

                <form class="form-horizontal my-4" action="" method="post">

                  <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                      </div>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required autofocus="1">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="userpassword">Password</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                      </div>
                      <input type="password" class="form-control" id="userpassword" name="password" placeholder="Masukan password" required autofocus="2">
                    </div>
                  </div>

                  <div class="form-group row mt-4">
                    <div class="col-sm-6">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                        <label class="custom-control-label" for="customControlInline">Ingat Saya</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0 row">
                    <div class="col-12 mt-2">
                      <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="submit">Masuk <i class="fas fa-sign-in-alt ml-1"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Log In page -->


  <!-- jQuery  -->
  <script src="<?=assets_dashboard(); ?>js/jquery.min.js"></script>
  <script src="<?=assets_dashboard(); ?>js/bootstrap.bundle.min.js"></script>
  <script src="<?=assets_dashboard(); ?>js/metisMenu.min.js"></script>
  <script src="<?=assets_dashboard(); ?>js/waves.min.js"></script>
  <script src="<?=assets_dashboard(); ?>js/jquery.slimscroll.min.js"></script>

  <!-- App js -->
  <script src="<?=assets_dashboard(); ?>js/app.js"></script>

</body>
</html>