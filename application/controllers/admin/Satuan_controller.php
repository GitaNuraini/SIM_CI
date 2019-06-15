<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("satuan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["data_satuan"] = $this->satuan_model->getAll();
        $this->load->view("admin/satuan/list", $data);
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

        $this->load->view("admin/satuan/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/satuan_controller');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("admin/satuan/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->satuan_model->delete($id)) {
            redirect(site_url('admin/satuan_controller'));
        }
    }
}