<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

  public function index() {
    $this->load->view('demo/index');
  }

  public function index3() {
    view('demo/index-3');
  }

  public function starter() {
    view('demo/page-starter');
  }

  public function uploads() {
    view('demo/forms-uploads');
  }

}