<?php

class Model_pres extends CI_Model
{
	
	function karyawan(){

		return $this->db->get('tb_karyawan');
	}
	function view_gaji(){
		$this->db->group_by('gaji_pres.id_karyawan');
		$this->db->join('tb_karyawan','gaji_pres.id_karyawan=tb_karyawan.id_karyawan');
		
		return $this->db->get('gaji_pres');
	}
	function edit_pres($id){

		$this->db->where('id_pres',$id);
		return $this->db->get('gaji_pres');
	}
	function update_pres($id,$data){

$this->db->where('id_pres',$id);
		return $this->db->update('gaji_pres',$data);


	}
	function barang(){

		return $this->db->get('tb_barang');
	}
}





?>