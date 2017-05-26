<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Controller {

  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('template/header', $data);
    $this->load->view($value['View']);
    $this->load->view('template/footer');
  }


  public function index()
  {
    $Member = $this->member_model->Get_Member();
    $Brand = $this->homepage_model->Get_Brand();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'member' => $Member,
      ),
      'View' => 'admin/member',
    );

    $this->LoadPage($value);
  }

  public function member_insert()
  {
    $Brand = $this->homepage_model->Get_Brand();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
      ),
      'View' => 'admin/member_insert',
    );

    $this->LoadPage($value);
  }

  public function member_update()
  {
    $id = $this->uri->segment(4);
    $member = $this->member_model->Get_member_By_Id($id);
    $Brand = $this->homepage_model->Get_Brand();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'member' => $member,
      ),
      'View' => 'admin/member_update',
    );

    $this->LoadPage($value);
  }

  public function member_delete()
  {
    $id = $this->uri->segment(4);
    $this->db->where('user_id',$id)->delete('user');
    redirect('admin/member');
  }

  public function member_process_save()
  {
    $input = $this->input->post();
    $this->member_model->member_save($input);
    redirect('admin/member');
  }

  public function member_process_update()
  {
    $input = $this->input->post();
    $this->member_model->member_update($input);
    redirect('admin/member');
  }


}
