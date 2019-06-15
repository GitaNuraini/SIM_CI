<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "kasir"; //nama tabel

    // nama kolom di tabel,harus sama huruf besar dan huruf kecilnya!
    public $id_kasir;
    public $nama_kasir;
    public $alamat;
    public $telp;
    public $posisi;
    public $username;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'nama_kasir',
            'label' => 'Nama_kasir',
            'rules' => 'required'],

            ['field' => 'posisi',
            'label' => 'Posisi',
            'rules' => 'required'],
            
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],
            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kasir" => $id])->row();
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