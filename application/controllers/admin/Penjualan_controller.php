<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Penjualan_controller extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
    
	public function index()
	{
        $this->load->view('admin/penjualan/penjualan');
	}
    
}
