<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dropdown_model extends CI_Model {
    
function get_kategori() {
 $this->db->select('*');
 $this->db->from('data_kategori');
 
 $query = $this->db->get();
 return $query->result();
}
    
 function get_satuan() {
 $this->db->select('*');
 $this->db->from('data_satuan');
 $query = $this->db->get();
 return $query->result();
}
    
}
?>