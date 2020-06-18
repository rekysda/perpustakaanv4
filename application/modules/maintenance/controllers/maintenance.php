<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Maintenance extends CI_Controller{
// constructor
  public function __construct(){
    parent::__construct();
  }

  public function index()
  {
      $data['title'] = 'Maintenance';
          $this->load->view('maintenance', $data);
      
  }
 //END
}
?>