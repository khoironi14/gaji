<?php

/**
 * 
 */
class Model_setting extends CI_Model
{
	
	function view_gaji(){
		$this->db->join('tb_karyawan','tb_gaji.id_karyawan=tb_karyawan.id_karyawan');
		return $this->db->get('tb_gaji');
	}
	function tarif($id,$data){

		$this->db->where('id_gaji',$id);
		return $this->db->update('tb_gaji',$data);

	}
	function karyawan(){
		$this->db->where('id_kategori',1);
		return $this->db->get('tb_karyawan');
	}
	function save_gaji($data){
return $this->db->insert('tb_gaji',$data);


	}
	function edit_gaji($id){

		$this->db->where('id_gaji',$id);
		return $this->db->get('tb_gaji');
	}
	function update_gaji($id,$data){
$this->db->where('id_gaji',$id);
		return $this->db->update('tb_gaji',$data);

	}
	function uang_makan(){

		return $this->db->get('tb_uangmakan');
	}
	function edit_makan($id,$data){

		$this->db->where('id_makan',$id);
		return $this->db->update('tb_uangmakan',$data);
	}
}









?>