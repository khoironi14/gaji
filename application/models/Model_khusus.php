<?php
/**
 * 
 */
class Model_khusus extends CI_Model
{
		var $table='tb_gaji_khusus';
    var $column_order=array(null,'id_khusus');
    var $column_search=array('nama_karyawan','alamat');
    var $order=array('id_khusus'=>'asc');

     private function _get_datatables_query()
    {
      //  $this->db->join('tb_angsur','tb_gaji_khusus.id_karyawan=tb_angsur.id_karyawan','left');
    	//$this->db->join('tb_hutang','gaji_cor.id_karyawan=tb_hutang.id_karyawan','left');
         $this->db->join('tb_karyawan','tb_gaji_khusus.id_karyawan=tb_karyawan.id_karyawan');
       //  $this->db->select('nama_karyawan,gajtanggal,alamat,tonase,id_cor,sisa_hutang,jumlah_angsur');
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
	
	function karyawan(){

		$this->db->where('id_kategori',4);
		return $this->db->get('tb_karyawan');
	}
	function edit_gaji($id){
$this->db->where('id_khusus',$id);
return $this->db->get('tb_gaji_khusus');

	}
	function update_gaji($id,$data){
$this->db->where('id_khusus',$id);
return $this->db->update('tb_gaji_khusus',$data);

	}
	function cetak_pdf(){

	  $this->db->join('tb_karyawan','tb_gaji_khusus.id_karyawan=tb_karyawan.id_karyawan');
     
     return   $this->db->get('tb_gaji_khusus');	
	}
}







?>