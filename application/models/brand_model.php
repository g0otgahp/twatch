<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class brand_model extends CI_Model {

  public function Get_Brand_By_Id($id)
  {
    $data = $this->db
    ->where('brand_id',$id)
    ->get('brand')->result_array();
    return $data;
  }

  public function brand_save($input)
  {
    $this->db->insert('brand',$input);
  }

  public function brand_update($input)
  {
    $this->db->where('brand_id',$input['brand_id'])->update('brand',$input);
  }

}
