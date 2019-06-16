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
        $satuan = $this->satuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($satuan->rules());

        if ($validation->run()) {
            $satuan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/satuan/new_form");
    }

    public function edit($id_satuan = null)
    {
        if (!isset($id_satuan)) redirect('admin/satuan_controller');
       
        $satuan = $this->satuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($satuan->rules());

        if ($validation->run()) {
            $satuan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

<<<<<<< HEAD
        $data["satuan"] = $satuan->getById($id_satuan);
=======
        $data["satuan"] = $product->getById($id);
>>>>>>> dc62850f20e0d88a8101d3a5855e2591c5505977
        if (!$data["satuan"]) show_404();
        
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