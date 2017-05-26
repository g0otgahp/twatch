<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class brand extends CI_Controller {

  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('template/header', $data);
    $this->load->view($value['View']);
    $this->load->view('template/footer');
  }


  public function index()
  {
    $Brand = $this->homepage_model->Get_Brand();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
      ),
      'View' => 'admin/brand',
    );

    $this->LoadPage($value);
  }

  public function brand_insert()
  {
    $Brand = $this->homepage_model->Get_Brand();

    $value = array(
      'Result' => array(
        'brand' => $Brand,
      ),
      'View' => 'admin/brand_insert',
    );

    $this->LoadPage($value);
  }

  public function brand_update()
  {
    $id = $this->uri->segment(4);
    $brand = $this->brand_model->Get_Brand_By_Id($id);
    $value = array(
      'Result' => array(
        'brand' => $brand,
      ),
      'View' => 'admin/brand_update',
    );

    $this->LoadPage($value);
  }

  public function brand_delete()
  {
    $id = $this->uri->segment(4);
    $this->db->where('brand_id',$id)->delete('brand');
    redirect('admin/brand');
  }

  public function brand_process_save()
  {
    $input = $this->input->post();
    $this->brand_model->brand_save($input);
    redirect('admin/brand');
  }

  public function brand_process_update()
  {
    $input = $this->input->post();
    $this->brand_model->brand_update($input);
    redirect('admin/brand');
  }

}
