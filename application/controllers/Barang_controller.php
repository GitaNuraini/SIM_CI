<?php
define('BASEPATH')OR exit('No direct sript access allowed');

class Barang_controller extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model("Barang_model");
        $this->load->library('form_validation');
    }
    
    public function index(){
        $data["data_barang"] = $this->Barang_model->getAll();
        $this->load->view("barang", $data);
    }
    
    public function add(){
        $barang = $this->Barang_model;
        $validation = $this->form_validation;
        $validation->set_rules(product->rules());
        
     if ($validation->run()) {
            $barang->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("form/tambah_barang");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('barang');
       
        $barang = $this->Barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $barang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["data_barang"] = $product->getById($id);
        if (!$data["data_barang"]) show_404();
        
        $this->load->view("form/edit_barang", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('barang'));
        }
    }
}
?>