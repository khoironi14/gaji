<?php

class Model_karyawan extends CI_Model
{
	
	var $table='tb_karyawan';
    var $column_order=array(null,'id_karyawan');
    var $column_search=array('nama_karyawan','alamat','tempat_lahir');
    var $order=array('id_karyawan'=>'asc');

     private function _get_datatables_query()
    {
         $this->db->join('tb_kategori','tb_karyawan.id_kategori=tb_kategori.id_kategori');
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
         $this->_get_custom_field();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
   function _get_custom_field(){

        if (isset($_POST['kategori'])) {
            $this->db->where('tb_karyawan.id_kategori',$_POST['kategori']);
        }
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
    
    function kategori(){

        return $this->db->get('tb_kategori');
    }
    function add_karyawan($data){

        return $this->db->insert('tb_karyawan',$data);
    }
    function edit_karyawan($id){
        $this->db->where('id_karyawan',$id);
        return $this->db->get('tb_karyawan');
    }
    function update_karyawan($id,$data){
         $this->db->where('id_karyawan',$id);
        return $this->db->update('tb_karyawan',$data);

    }
}











?>