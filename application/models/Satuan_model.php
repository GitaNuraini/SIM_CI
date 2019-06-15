<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_model extends CI_Model
{
    private $_table = "data_satuan"; //nama tabel

    // nama kolom di tabel,harus sama huruf besar dan huruf kecilnya!
    public $id_satuan;
    public $nama_satuan;
    public $keterangan;

    public function rules()
    {
        return [
            ['field' => 'nama_satuan',
            'label' => 'Nama_satuan',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_satuan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kategori = uniqid();
        $this->nama_barang = $post["nama_satuan"];
        $this->keterangan = $post["keterangan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_satuan = $post["id_satuan"];
        $this->nama_satuan = $post["nama_satuan"];
        $this->keterangan = $post["keterangan"];
        $this->db->update($this->_table, $this, array('id_satuan' => $post['id_satuan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_satuan" => $id));
    }
}