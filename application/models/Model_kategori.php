<?php

class Model_kategori extends CI_Model
{
	
	function view_kategori(){

		return $this->db->get('tb_kategori');
	}
	function save_kategori($data){

		return $this->db->insert('tb_kategori',$data);
	}
	function edit_kategori($id){

		$this->db->where('id_kategori',$id);
		return $this->db->get('tb_kategori');

	}
	function update_kategori($id,$data){

	$this->db->where('id_kategori',$id);
		return $this->db->update('tb_kategori',$data);

	}
}









?>