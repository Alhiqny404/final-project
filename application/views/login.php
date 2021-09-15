<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?=$title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A premium admin dashboard template by mannatthemes" name="description" />
  <meta content="Pertiwi Team" name="author" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- App css -->
  <link href="<?=assets_dashboard(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=assets_dashboard(); ?>css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?=assets_dashboard(); ?>css/metismenu.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=assets_dashboard(); ?>css/style.css" rel="stylesheet" type="text/css" />
  <style>
    .bg {
      background-image: url(<?=assets_dashboard();
      ?>images/login.jpg);
      background-size: cover;
      background-position: center
    }
    .heading::after, .heading::before {
      content: '';
      width: 100px;
      height: 2px;
      background: #333;
      display: block;
      position: absolute;
      bottom: 50%;
      transform: translateY(50%)
    }
    .heading::after {
      left: 0;
    }
    .heading::before {
      right: 0;
      bottom: 50%;
    }
    .line {
      width: calc(100%/3);
      height: 10px;
    }
    .biru {
      background-color: #00AEEF;
    }
    .hijau {
      background-color: #8CC63E;
    }
    .orange {
      background-color: #F7931E;
    }
    .form-login {
      margin-bottom: 90px;
    }
@media only screen and (max-width: 500px) {
      .col-md-7.form {
        //padding: 5px;
      }
      .form-login {
        margin-bottom: 20px;
      }
      .logo {
        width: 40px;
      }
      .title {
        font-size: 15px;
      }
      .apk-name {
        font-size: 20px;
      }
      html {
        background-image: url(<?=assets_dashboard();
        ?>images/login.jpg);
        background-size: cover;
        background-position: center;
      }
      html::after {
        content: '';
        background-color: rgba(0, 0, 0, 0.4);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -100;
      }
    }
  </style>
</head>

<body class="bg-transparent">
  <div class="card border-0 shadow my-5 mx-auto overflow-hidden" style='max-width:90%'>
    <div class="row">
      <div class="col-md-7 pr-0 form">
        <div class="m-auto border-0 bg-transparent shadow-0 w-100 p-3" style="max-width: 450px">
          <div class="d-flex ">
            <img src="<?=assets_dashboard(); ?>images/logo.png" width="40px" alt="logo" class="my-3 logo">
            <div class="ml-3">
              <h6 class="mt-3 mb-1 title text-muted ms-1">
                Badan Pusat Statistik
              </h6>
              <h4 class="mt-1 apk-name">Si Mba'e Cakep</h4>
            </div>
          </div>
          <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger mt-3" role="alert">
            <strong><?=$this->session->flashdata('error'); unset($_SESSION['error']) ?></strong>.
          </div>
          <?php endif; ?>
          <!--    <h4 class="text-center mt-5 mb-5 heading position-relative">Si Mba'e Cakep</h4> -->
          <form action="" method="post" class="mt-5 pr-2 form-login">
            <?=csrf() ?>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <i class="mdi mdi-account-outline font-16"></i>
              </div>
              <input required="" type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <i class="mdi mdi-key font-16"></i>
              </div>
              <input required="" type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button class="btn btn-primary btn-block waves-effect waves-light mt-4" type="submit" name="submit">Login</button>
          </form>
        </div>
        <!-- <br>  <br>  <br>  <br>  <br>  <br> -->
        <small class='text-center d-block text-muted'> &copy; IPDS3208 & SMK PERTIWI KUNIGAN </small>
        <div class="lines d-flex justify-content-between">
          <div class="biru line">
          </div>
          <div class="hijau line">
          </div>
          <div class="orange line">
          </div>
        </div>
      </div>
      <div class="col-md-5 bg">

      </div>
    </div>
  </div>

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