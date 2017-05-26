<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage_model extends CI_Model {

    public function Get_Brand()
    {
      $data = $this->db->order_by('brand_id','DESC')->get('brand')->result_array();
      return $data;
    }

    public function Get_Product_list()
    {
      $data = $this->db
      ->order_by('product_id','DESC')
      ->join('brand','brand.brand_id = product.product_brand_id')
      ->get('product')->result_array();
      return $data;
    }
}
