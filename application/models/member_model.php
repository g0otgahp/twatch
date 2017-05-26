<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member_model extends CI_Model {

    public function Get_Member()
    {
      $data = $this->db->order_by('user_id','DESC')->get('user')->result_array();

      return $data;
    }

    public function Register_Member($input)
    {
      $this->db->insert('user',$input);
      $id = $this->db->insert_id();

      $data = $this->db
      ->order_by('user_id','DESC')
      ->where('user_id',$id)
      ->get('user')
      ->result_array();

      return $data;
    }

    public function Edit_Member($input)
    {
      $this->db->where('user_id',$input['user_id'])->update('user',$input);

      $data = $this->db
      ->order_by('user_id','DESC')
      ->where('user_id',$input['user_id'])
      ->get('user')
      ->result_array();

      return $data;
    }

    public function Get_Member_By_Id($id)
    {
      $data = $this->db
      ->where('user_id',$id)
      ->get('user')->result_array();
      return $data;
    }

    public function member_save($input)
    {
      $this->db->insert('user',$input);
    }

    public function member_update($input)
    {
      $this->db->where('user_id',$input['user_id'])->update('user',$input);
    }
}
