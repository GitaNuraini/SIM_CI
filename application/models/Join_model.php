<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join_model extends CI_Model {
 
public function tigatable($aktif) {    
 $this->db->select('*');
 $this->db->from('penjualan');
 $this->db->join('tmp_penjualan','tmp_penjualan.id_penjualan=penjualan.id_penjualan');
 $this->db->join('detail_jual','detail_jual.id_penjualan=penjualan.id_penjualan');
 $this->db->join('reseller','reseller.id_reseller=penjualan.id_reseller');
 $this->db->where($aktif);
 $this->db->where('status','kredit');
 $this->db->group_by('penjualan.id_penjualan');
 $query = $this->db->get();
 return $query->result();
}

}
