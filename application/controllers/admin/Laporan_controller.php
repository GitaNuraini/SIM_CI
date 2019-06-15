<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Laporan_controller extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
    
	public function index()
	{
        $this->load->view('fpdf/lap_barang');
	}
    
    public function kasir()
	{
        $this->load->view('fpdf/laporan_kasir');
	}
   
    public function satuan()
	{
        $this->load->view('fpdf/lap_satuan');
	} 
    
    public function kategori()
	{
        $this->load->view('fpdf/lap_kategori');
	}
    
    public function reseller()
	{
        $this->load->view('fpdf/laporan_reseller');
	}
    
    public function supplier()
	{
        $this->load->view('fpdf/laporan_supplier');
	} 
    
    public function penjualan()
	{
        $this->load->view('fpdf/laporan_penjualan_reseller');
	} 
    
    public function piutang()
	{
        $this->load->view('fpdf/laporan_piutang');
	}
}
