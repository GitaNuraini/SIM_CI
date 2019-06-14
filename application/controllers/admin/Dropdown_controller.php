<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dropdown_controller extends CI_Controller {
  
 function __construct()
                {
                                parent:: __construct();
                                $this->load->model('Dropdown_model','', TRUE);
                                //ini digunakan untuk dapat mengakses model m_bidang
                }

public function index(){
 $data=array('get_kategori'=> $this->Dropdown_model->get_option());  
 $this->load->view('new_form', $data);
}
}
?>