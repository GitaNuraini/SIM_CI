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
    public function barang()
	{
//        $this->load->view('header');
        $this->load->view('barang');
        $this->load->view('footer');
	}
    public function kasir()
	{
        $this->load->view('header');
        $this->load->view('kasir');
        $this->load->view('footer');
	}
    public function kategori()
	{
        $this->load->view('header');
        $this->load->view('kategori');
        $this->load->view('footer');
	}
    public function satuan()
	{
        $this->load->view('header');
        $this->load->view('satuan');
        $this->load->view('footer');
	}
    public function supplier()
	{
        $this->load->view('header');
        $this->load->view('supplier');
        $this->load->view('footer');
	}
    public function reseller()
	{
        $this->load->view('header');
        $this->load->view('reseller');
        $this->load->view('footer');
	}
}
