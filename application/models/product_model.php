<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends CI_Model {

    public function Get_Product_By_Brand($id)
    {
      $data = $this->db
      ->order_by('product_id','DESC')
      ->where('brand_id',$id)
      ->join('brand','brand.brand_id = product.product_brand_id')
      ->get('product')->result_array();
      return $data;
    }

    public function Get_Product_By_Id($id)
    {
      $data = $this->db
      ->where('product_id',$id)
      ->join('brand','brand.brand_id = product.product_brand_id')
      ->get('product')->result_array();
      return $data;
    }

    public function Get_Product_Find($input)
    {
      $find = "%".$input."%";
      $data = $this->db
      ->where('product_name LIKE',$find)
      ->join('brand','brand.brand_id = product.product_brand_id')
      ->get('product')->result_array();
      return $data;
    }

    public function product_save($input)
    {
      $this->db->insert('product',$input);
    }

    public function product_update($input)
    {
      $this->db->where('product_id',$input['product_id'])->update('product',$input);
    }
}
