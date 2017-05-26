<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller {

  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('template/header', $data);
    $this->load->view($value['View']);
    $this->load->view('template/footer');
  }


  public function index()
  {
    $order_detail = $this->order_model->Get_Order_Detail_All();
    $Brand = $this->homepage_model->Get_Brand();

    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'order_detail' => $order_detail,
      ),
      'View' => 'admin/order',
    );

    $this->LoadPage($value);
  }

  public function detail()
  {
    $id = $this->uri->segment(4);
    $order = $this->order_model->Get_Order($id);
    $Brand = $this->homepage_model->Get_Brand();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'order' => $order,
      ),
      'View' => 'admin/order_detail',
    );

    $this->LoadPage($value);
  }

  public function cancel()
  {
    $id = $this->uri->segment(4);
    $this->order_model->Order_detail_cancel($id);

    $url = $_SERVER['HTTP_REFERER'];
    echo "<script>
    alert('ยกเลิกคำสั่งซื้อแล้ว');
    window.location.href='$url';
    </script>";
  }

  public function status()
  {
    $input = $this->input->post();
    $this->order_model->Order_Status($input);

    $url = $_SERVER['HTTP_REFERER'];
    echo "<script>
    alert('เปลี่ยนสถานะเรียบร้อยแล้ว');
    window.location.href='$url';
    </script>";
  }
}
