<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {

  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('template/header', $data);
    $this->load->view($value['View']);
    $this->load->view('template/footer');
  }

  public function brand()
  {
    $id = $this->uri->segment(3);
    $product = $this->product_model->Get_Product_By_Brand($id);
    $Brand = $this->homepage_model->Get_Brand();

    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'product' => $product,
      ),
      'View' => 'homepage/product',
    );

    $this->LoadPage($value);
  }

  public function product_detail()
  {
    $id = $this->uri->segment(3);
    $product = $this->product_model->Get_Product_By_Id($id);
    $Brand = $this->homepage_model->Get_Brand();

    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'product' => $product,
      ),
      'View' => 'homepage/product_detail',
    );

    $this->LoadPage($value);
  }

  public function product_find()
  {
    $input = $this->input->post('find');
    if ($input=='') {
      redirect('home/');
      exit();
    }
    $product = $this->product_model->Get_Product_Find($input);
    $Brand = $this->homepage_model->Get_Brand();
    $find = $input;

    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'product' => $product,
        'find' => $find,
      ),
      'View' => 'homepage/product_find',
    );

    $this->LoadPage($value);
  }
}
