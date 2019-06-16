<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dropdown_controller extends CI_Controller {
  
 function __construct() {
 parent:: __construct();
 $this->load->model('Dropdown_model');
 }

 public function index(){
 $data["kategori"] = $this->Dropdown_model->get_kategori();
 $this->load->view('admin/product/new_form', $data);
 }
    
 public function satuan(){
 $data["satuan"] = $this->Dropdown_model->get_satuan();
 $this->load->view('admin/product/new_form', $data;
 }
    
}
?>