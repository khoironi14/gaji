<?php
/**
 * 
 */
class Model_user extends CI_Model
{
	
	function validasi($data){

$this->db->where($data);
return $this->db->get('tb_user');
	}
	function cek_password($lama){

		$this->db->where('password',$lama);
		return $this->db->get('tb_user');
	}
	function ganti_password($lama,$data){

$this->db->where('password',$lama);
		return $this->db->update('tb_user',$data);

	}
}







?>