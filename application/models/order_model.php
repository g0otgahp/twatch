<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order_model extends CI_Model {


  public function Get_Order($id)
  {
    $data['Order_detail'] = $this->db
    ->where('order_detail_id',$id)
    ->join('user','user.user_id = order_detail.order_detail_user')
    ->get('order_detail')
    ->result_array();

    $data['Order'] = $this->db
    ->where('order_detail_id',$data['Order_detail'][0]['order_detail_id'])
    ->join('product','product.product_id = order.order_product_id')
    ->get('order')
    ->result_array();
    return $data;
  }

  public function Get_Order_Detail($id)
  {
    $data = $this->db
    ->where('order_detail_user',$id['user_id'])
    ->get('order_detail')
    ->result_array();
    return $data;
  }

  public function Get_Order_Detail_All()
  {
    $data = $this->db
    ->order_by('order_detail_date','DESC')
    ->get('order_detail')
    ->result_array();
    return $data;
  }

  public function Order_Status($input)
  {
    // echo "<pre>";
    // print_r($input);
    // exit();
    if ($input['order_detail_status'] == 5) {
      $data = $this->Get_Order($input['order_detail_id']);
      foreach ($data['Order'] as $info) {
        $product = $this->db
        ->where('product_id',$info['product_id'])
        ->get('product')->result_array();

        $stock = $product[0]['product_stock'] - $info['order_amount'];
        $input_stock = array('product_stock' => $stock );
        $this->db->where('product_id',$info['product_id'])->update('product',$input_stock);
      }
    }

    $this->db->where('order_detail_id',$input['order_detail_id'])->update('order_detail',$input);
  }

  public function Order_detail_uploads($input)
  {
    $this->db->where('order_detail_id',$input['order_detail_id'])->update('order_detail',$input);
  }

  public function Order_detail_cancel($id)
  {
    $input = array(
      'order_detail_id' => $id,
      'order_detail_status' => 0,
    );
    $this->db->where('order_detail_id',$input['order_detail_id'])->update('order_detail',$input);
  }

    public function Get_Order_temp($id)
    {
      $data = $this->db
      ->where('order_temp_user_id',$id['user_id'])
      ->join('product','product.product_id = order_temp.order_temp_product_id')
      ->get('order_temp')
      ->result_array();
      return $data;
    }

    public function Order_temp_insert($id)
    {
      $product = $this->product_model->Get_Product_By_Id($id['product_id']);
      $input = array(
        'order_temp_product_id' => $id['product_id'],
        'order_temp_amount' => 1,
        'order_temp_price_per' => $product[0]['product_price'],
        'order_temp_user_id' => $id['user_id'],
      );

      $this->db->insert('order_temp',$input);
    }

    public function Order_temp_update($input)
    {
      $product = $this->db
      ->where('product_id',$input['order_temp_product_id'])
      ->get('product')->result_array();

        if ($product[0]['product_stock'] < $input['order_temp_amount']) {
          $url = $_SERVER['HTTP_REFERER'];
          echo "<script>
          alert('ของในสต๊อกไม่เพียงพอ');
          window.location.href='$url';
          </script>";
          exit();
        }

      $this->db->where('order_temp_id',$input['order_temp_id'])->update('order_temp',$input);
    }

    public function Order_temp_delete($id)
    {
      $this->db->where('order_temp_id',$id)->delete('order_temp');
    }

    public function Order_temp_to_order($input)
    {
      //insert order_detail ก่อน
      date_default_timezone_set('Asia/Bangkok');
      $order_detail = array(
        'order_detail_date' => date('Y-m-d H-i-s'),
        'order_detail_user' => $input['user_id'],
        'order_detail_address' => $input['order_detail_address'],
      );
      $this->db->insert('order_detail',$order_detail);
      $order_detail_id = $this->db->insert_id(); //order_detail_id

      //insert order เพราะต้องใช้ order_detail_id
      $order_temp = $this->db
      ->where('order_temp_user_id',$input['user_id'])
      ->join('product','product.product_id = order_temp.order_temp_product_id')
      ->get('order_temp')
      ->result_array();

      foreach ($order_temp as $row) {
        $order = array(
          'order_product_id' => $row['product_id'],
          'order_detail_id' => $order_detail_id,
          'order_amount' => $row['order_temp_amount'],
          'order_price_per' => $row['order_temp_price_per'],
        );
        $this->db->insert('order',$order);
        $this->db->where('order_temp_id',$row['order_temp_id'])->delete('order_temp');
      }

      return $order_detail_id;
    }

}
