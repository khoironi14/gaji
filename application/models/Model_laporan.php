<?php
/**
 * 
 */
class Model_laporan extends CI_Model
{
	
	function gaji(){

		$this->db->where('absen','Hadir');
        $this->db->join('tb_gaji','slip_gaji_harian.id_karyawan=tb_gaji.id_karyawan');
         $this->db->join('tb_karyawan','slip_gaji_harian.id_karyawan=tb_karyawan.id_karyawan');
         return $this->db->get('slip_gaji_harian');
	}
}




?>