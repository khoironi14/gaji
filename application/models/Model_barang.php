<?php
/**
 * 	
 */
class Model_barang extends CI_Model
{
	
	function view_barang(){


		return $this->db->get('tb_barang');
	}
	function save_barang($data){

		return $this->db->insert('tb_barang',$data);
	}
	function edit_barang($id){

			$this->db->where('id_barang',$id);
	return $this->db->get('tb_barang');	
	}
	function update_barang($id,$data){

$this->db->where('id_barang',$id);
	return $this->db->update('tb_barang',$data);	

	}
}









?>