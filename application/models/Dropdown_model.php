<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dropdown_model extends CI_Model {
    
function get_kategori() {
 $this->db->select('*');
 $this->db->from('data_kategori');
// $this->db->order_by('id_kategori', 'desc');
 $query = $this->db->get();
 return $query->result();
}
    
 function get_satuan() {
 $this->db->select('*');
 $this->db->from('data_satuan');
// $this->db->order_by('id_satuan', 'desc');
 $query = $this->db->get();
 return $query->result();
}
    
}
?>