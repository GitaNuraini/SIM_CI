<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("reseller_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["reseller"] = $this->reseller_model->getAll();
        $this->load->view("admin/reseller/list", $data);
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

        $this->load->view("admin/reseller/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/reseller_controller');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["reseller"] = $product->getById($id);
        if (!$data["reseller"]) show_404();
        
        $this->load->view("admin/reseller/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('admin/reseller_controller'));
        }
    }
}