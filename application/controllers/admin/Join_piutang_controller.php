<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join_piutang_controller extends CI_Controller {

 function __construct()
 {
 parent::__construct();
 $this->load->model('join_model', '', TRUE);
 $this->load->helper(array('form', 'url'));
 }

 public function index()
 {
    // query memanggil function tigatable di model
    $data['join3'] = $this->join_model->tigatable($aktif); 
  $this->load->view('admin/piutang/piutang',$data);    
  
 } 
  
}