<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dropdown_model extends CI_Model {
  
//  public function view_kategori(){
//    return $this->db->get('data_kategori')->result(); // Tampilkan semua data yang ada di tabel data_kategori
//  }
//    function get(){
//		$query = $this->db->query('SELECT * FROM data_kategori');
//        return $query->result();
//	}
    
    function get_option() {
 $this->db->select('*');
 $this->db->from('data_kategori');
 $query = $this->db->get();
 return $query->result();
}
    
}