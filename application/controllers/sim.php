<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sim extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
    
	public function index()
	{
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
	}
    public function penjualan()
	{
        $this->load->view('header');
        $this->load->view('penjualan');
        $this->load->view('footer');
	}
    public function piutang()
	{
        $this->load->view('header');
        $this->load->view('piutang');
        $this->load->view('footer');
	}
}
