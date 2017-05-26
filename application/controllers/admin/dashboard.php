<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('template/header', $data);
    $this->load->view($value['View']);
    $this->load->view('template/footer');
  }


  public function index()
  {
    $Brand = $this->homepage_model->Get_Brand();

    $value = array(
      'Result' => array(
        'brand' => $Brand,
      ),
      'View' => 'admin/home',
    );

    $this->LoadPage($value);
  }

}
