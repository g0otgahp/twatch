<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history extends CI_Controller {

  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('template/header', $data);
    $this->load->view($value['View']);
    $this->load->view('template/footer');
  }

  public function order()
  {
    $id['user_id'] = $this->uri->segment(3);
    $order_detail = $this->order_model->Get_Order_Detail($id);
    $Brand = $this->homepage_model->Get_Brand();

    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'order_detail' => $order_detail,
      ),
      'View' => 'homepage/history',
    );

    $this->LoadPage($value);
  }

  public function detail()
  {
    $id = $this->uri->segment(3);
    $order = $this->order_model->Get_Order($id);
    $Brand = $this->homepage_model->Get_Brand();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'order' => $order,
      ),
      'View' => 'homepage/history_detail',
    );

    $this->LoadPage($value);
  }

  public function cancel()
  {
    $id = $this->uri->segment(3);
    $this->order_model->Order_detail_cancel($id);

    $url = $_SERVER['HTTP_REFERER'];
    echo "<script>
    alert('ยกเลิกคำสั่งซื้อแล้ว');
    window.location.href='$url';
    </script>";
  }

  public function uploads()
  {
    $pathinfo = pathinfo($_FILES['order_detail_pic']['name'],PATHINFO_EXTENSION);
    $news_file = date('YmdHis').".".$pathinfo;
    move_uploaded_file($_FILES['order_detail_pic']['tmp_name'],"uploads/order_detail/".$news_file);

    $input = array(
      'order_detail_id' => $this->input->post('order_detail_id'),
      'order_detail_pic' => $news_file,
      'order_detail_status' => 2,
    );

    $this->order_model->Order_detail_uploads($input);

    $url = $_SERVER['HTTP_REFERER'];
    echo "<script>
    alert('อัพโหลดเรียบร้อยแล้ว');
    window.location.href='$url';
    </script>";
  }
}
