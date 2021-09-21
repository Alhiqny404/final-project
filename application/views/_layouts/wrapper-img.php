<div class="page-wrapper-img">
  <div class="page-wrapper-img-inner">
    <div class="sidebar-user media">
      <img src="<?=base_url(profilePict()) ?>" alt="user" class="rounded-circle img-thumbnail mb-1">
      <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
      <div class="media-body">
        <h5 class="text-light">Sebagai <?=sud('role') ?> </h5>
        <ul class="list-unstyled list-inline mb-0 mt-2">
          <li class="list-inline-item">
            <a href="#" class=""><i class="mdi mdi-account text-light"></i></a>
          </li>
          <li class="list-inline-item">
            <a href="#" class=""><i class="mdi mdi-settings text-light"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Page-Title -->
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <div class="float-right align-item-center mt-2">
          </div>
          <h4 class="page-title mb-2"><i class="mdi mdi-google-pages mr-2"></i><?=$title ?></h4>
          <div class="">
            <ol class="breadcrumb">
              <?php
              $uri = explode('/', $this->uri->uri_string);
              ?>

              <?php foreach ($uri as $key => $val): ?>
              <li class="breadcrumb-item"><a href="javascript:void(0);"><?=$val ?></a></li>
              <?php endforeach; ?>

            </ol>
          </div>
        </div>
        <!--end page title box-->
      </div>
      <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
  </div>
  <!--end page-wrapper-img-inner-->
</div>
<!--end page-wrapper-img-->