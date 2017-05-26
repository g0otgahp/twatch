<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {

  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('template/header', $data);
    $this->load->view($value['View']);
    $this->load->view('template/footer');
  }


  public function index()
  {
    $Brand = $this->homepage_model->Get_Brand();
    $Product = $this->homepage_model->Get_Product_list();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'product' => $Product,
      ),
      'View' => 'admin/product',
    );

    $this->LoadPage($value);
  }

  public function product_insert()
  {
    $Brand = $this->homepage_model->Get_Brand();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
      ),
      'View' => 'admin/product_insert',
    );

    $this->LoadPage($value);
  }

  public function product_update()
  {
    $id = $this->uri->segment(4);
    $product = $this->product_model->Get_Product_By_Id($id);
    $Brand = $this->homepage_model->Get_Brand();
    $value = array(
      'Result' => array(
        'brand' => $Brand,
        'product' => $product,
      ),
      'View' => 'admin/product_update',
    );

    $this->LoadPage($value);
  }

  public function product_delete()
  {
    $id = $this->uri->segment(4);
    $this->db->where('product_id',$id)->delete('product');
    redirect('admin/product');
  }

  public function product_process_save()
  {
    $input = $this->input->post();

    $pathinfo = pathinfo($_FILES['product_pic']['name'],PATHINFO_EXTENSION);
    $new_file = date('YmdHis').".".$pathinfo;
    move_uploaded_file($_FILES['product_pic']['tmp_name'],"uploads/product/".$new_file);

    $input['product_pic'] = $new_file;
    $this->product_model->product_save($input);
    redirect('admin/product');
  }

  public function product_process_update()
  {
    $input = $this->input->post();

    if (!empty($_FILES["product_pic"]["name"])) {
    $pathinfo = pathinfo($_FILES['product_pic']['name'],PATHINFO_EXTENSION);
    $new_file = date('YmdHis').".".$pathinfo;
    move_uploaded_file($_FILES['product_pic']['tmp_name'],"uploads/product/".$new_file);
    $input['product_pic'] = $new_file;
    }

    $this->product_model->product_update($input);
    redirect('admin/product');
  }
}
