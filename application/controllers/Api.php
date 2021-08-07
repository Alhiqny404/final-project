<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  public function __construct() {
    parent::__Construct();
  }

  public function corona() {
    $url = 'https://api.kawalcorona.com/indonesia/';

    $ch = curl_init(); //  Initiate curl
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_URL, $url); // Set the url
    $result = curl_exec($ch); // Execute
    curl_close($ch); // Closing

    echo $result;

  }

}