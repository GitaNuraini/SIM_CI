<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller_model extends CI_Model
{
    private $_table = "reseller"; //nama tabel

    // nama kolom di tabel,harus sama huruf besar dan huruf kecilnya!
    public $id_reseller;
    public $nama_reseller;
    public $alamat;
    public $kota;
    public $provinsi;
    public $kode_pos;
    public $telp;

    public function rules()
    {
        return [
            ['field' => 'nama_reseller',
            'label' => 'Nama_reseller',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'kota',
            'label' => 'Kota',
            'rules' => 'required'],
            
            ['field' => 'provinsi',
            'label' => 'Provinsi',
            'rules' => 'required'],
            
            ['field' => 'kode_pos',
            'label' => 'Kode_pos',
            'rules' => 'required'],
            
            ['field' => 'telp',
            'label' => 'Telp',
            'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_reseller" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_reseller = uniqid();
        $this->nama_reseller = $post["nama_reseller"];
        $this->alamat = $post["alamat"];
        $this->kota = $post["kota"];
        $this->provinsi = $post["provinsi"];
        $this->kode_pos = $post["kode_pos"];
        $this->telp = $post["telp"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('id_reseller' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_reseller" => $id));
    }
}