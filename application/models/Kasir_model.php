<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model
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
        $this->id_kasir = uniqid();
        $this->nama_kasir = $post["nama_barang"];
        $this->alamat = $post["alamat"];
        $this->telp = $post["telp"];
        $this->posisi = $post["posisi"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kasir = $post["id_kasir"];
        $this->nama_kasir = $post["nama_kasir"];
        $this->alamat = $post["alamat"];
        $this->telp = $post["telp"];
        $this->posisi =$post["posisi"];
        $this->username =$post["username"];
        $this->password =$post["password"];
        $this->db->update($this->_table, $this, array('id_kasir' => $post['id_kasir']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kasir" => $id));
    }
}