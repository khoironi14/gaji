<?php
/**
 * 
 */
class Model_slip extends CI_Model
{
	

	var $table='slip_gaji_harian';
    var $column_order=array(null,'id_slip');
    var $column_search=array('nama_karyawan','alamat');
    var $order=array('id_slip'=>'asc');

     private function _get_datatables_query()
    {
        $this->db->where('absen','Hadir');
        $this->db->join('tb_gaji','slip_gaji_harian.id_karyawan=tb_gaji.id_karyawan');
         $this->db->join('tb_karyawan','slip_gaji_harian.id_karyawan=tb_karyawan.id_karyawan');
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	function view_karyawan(){
        $this->db->where('id_kategori',1);
		return $this->db->get('tb_karyawan');
	}
	function angka(){

		return $this->db->get('angka');
	}
	function gaji(){

		return $this->db->get('tb_uangmakan')->row_array();
	}
    function edit_slip($id){

        $this->db->where('id_slip',$id);
        return $this->db->get('slip_gaji_harian');
    }
    function update_slip($id,$data){
         $this->db->where('id_slip',$id);
        return $this->db->update('slip_gaji_harian',$data);

    }
	function slip_gaji($awal,$akhir){
         $this->db->where('absen','Hadir');
        $this->db->where('slip_gaji_harian.tanggal BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
		$this->db->group_by('slip_gaji_harian.id_karyawan');
         $this->db->join('tb_gaji','slip_gaji_harian.id_karyawan=tb_gaji.id_karyawan');
        $this->db->join('tb_hutang','tb_hutang.id_karyawan=slip_gaji_harian.id_karyawan','left');
        $this->db->join('tb_angsur','slip_gaji_harian.id_karyawan=tb_angsur.id_karyawan','left');
			 $this->db->join('tb_karyawan','slip_gaji_harian.id_karyawan=tb_karyawan.id_karyawan');
			 $this->db->select('nama_karyawan,sum(jk) as jumlah_kerja,count(slip_gaji_harian.tanggal) as hari,sum(l) as jumlah_lembur,jumlah_angsur,sisa_hutang,gaji_perjam,lembur');
		return $this->db->get('slip_gaji_harian');
	}


    function laporan(){
//$this->db->join('slip_gaji_harian','tb_karyawan.id_karyawan=slip_gaji_harian.id_karyawan');
       // $this->db->where('id_kategori',1);
        return $this->db->query("select nama_karyawan,id_karyawan from tb_karyawan where id_karyawan in (select id_karyawan from slip_gaji_harian )");
    }
    function report($awal,$akhir){
//$this->db->join('tb_karyawan','slip_gaji_harian.id_karyawan=tb_karyawan.id_karyawan');
        $this->db->group_by('tanggal');
        $this->db->where('tanggal between "'.$awal.'" and "'.$akhir.'"');
        return $this->db->get('slip_gaji_harian');
    }
}








?>