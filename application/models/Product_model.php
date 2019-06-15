<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "data_barang"; //nama tabel

    // nama kolom di tabel,harus sama huruf besar dan huruf kecilnya!
    public $id_barang;
    public $nama_barang;
    public $id_kategori;
    public $id_satuan;
    public $hrg_pokok;
    public $hrg_umum;
    public $hrg_reseller;
    public $stock;
    public $expired;

    public function rules()
    {
        return [
            ['field' => 'nama_barang',
            'label' => 'Nama_barang',
            'rules' => 'required'],

            ['field' => 'id_kategori',
            'label' => 'Id_kategori',
            'rules' => 'required'],
            
            ['field' => 'id_satuan',
            'label' => 'Id_satuan',
            'rules' => 'required'],
            
            ['field' => 'hrg_pokok',
            'label' => 'Hrg_pokok',
            'rules' => 'required'],
            
            ['field' => 'hrg_umum',
            'label' => 'Hrg_umum',
            'rules' => 'required'],
            
            ['field' => 'hrg_reseller',
            'label' => 'Hrg_reseller',
            'rules' => 'required'],
            
            ['field' => 'stock',
            'label' => 'Stock',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_barang" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_barang = uniqid();
        $this->nama_barang = $post["nama_barang"];
        $this->id_kategori = $post["id_kategori"];
        $this->id_satuan = $post["hrg_pokok"];
        $this->id_satuan = $post["hrg_umum"];
        $this->id_satuan = $post["hrg_reseller"];
        $this->id_satuan = $post["stock"];
        $this->id_satuan = $post["expired"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('id_barang' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_barang" => $id));
    }
}