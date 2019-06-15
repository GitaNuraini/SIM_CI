<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kasir_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["kasir"] = $this->kasir_model->getAll();
        $this->load->view("admin/kasir/list", $data);
    }

    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/product/new_form_");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kasir_controller');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kasir"] = $product->getById($id);
        if (!$data["kasir"]) show_404();
        
        $this->load->view("admin/kasir/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('admin/kasir_controller'));
        }
    }
}