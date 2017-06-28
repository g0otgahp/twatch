<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cart extends CI_Controller {

  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('template/header', $data);
    $this->load->view($value['View']);
    $this->load->view('template/footer');
  }

  public function order()
  {
    $id['user_id'] = $this->uri->segment(3);
    $order_temp = $this->order_model->Get_Order_temp($id);
    $Brand = $this->homepage_model->Get_Brand();

    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'order_temp' => $order_temp,
      ),
      'View' => 'homepage/cart',
    );

    $this->LoadPage($value);
  }

  public function insert()
  {
    $id['product_id'] = $this->uri->segment(3);
    $id['user_id'] = $this->uri->segment(4);

    if ($id['product_id'] > 0) {
      $this->order_model->Order_temp_insert($id);
    }
    redirect('cart/order/'.$id['user_id']);
  }

  public function edit()
  {
    $input = $this->input->post();
    if ($input['order_temp_amount'] == 0) {
      $input['order_temp_amount'] = 1;
    }

    $this->order_model->Order_temp_update($input);
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->order_model->Order_temp_delete($id);
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function accept()
  {
    $input = $this->input->post();
    $order_id = $this->order_model->Order_temp_to_order($input);
    redirect('history/detail/'.$order_id);
  }
}
