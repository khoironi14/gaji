<?php
/**
 * 
 */
class Angsur extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_angsur');
	}
	function index(){
		$data['content']='view_angsuran';
		$this->load->view('dashboard',$data);

	}
	function get_data_angsur(){
		$list=$this->Model_angsur->get_datatables();
	$data=array();
		$no=$_POST['start'];
		foreach ($list as $field) {
			
   
			$no++;
			$row=array();
			$row[]=$no;
			$row[]=$field->nama_karyawan;
			$row[]=$field->alamat;
			$row[]=$field->sisa_hutang;
		$row[]=$field->jumlah_angsur;
			$row[]=$field->tanggal;
			
			

			
				$row[]='<a href="'.base_url('Angsur/edit_angsur/'.$field->id_angsur.'').'" class="btn btn-info">Edit</a> <a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="'.$field->id_angsur.'" >Hapus</a> ';

			$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->Model_angsur->count_all(),
			'recordsFiltered'=>$this->Model_angsur->count_filtered(),
			'data'=>$data,
			
                
            

			);
		
		echo json_encode($output);

	}
	function save_angsuran(){
		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id_karyawan');

$angsuran=$this->input->post('angsuran');
$karyawan=$this->input->post('id_karyawan');
$tanggal=$this->input->post('tanggal');
foreach ($id as $key => $value) {
	$data[$key]=array(
		
		'id_karyawan'=>$karyawan[$key],
		'jumlah_angsur'=>$angsuran[$key],
		'tanggal'=>$tanggal[$key]




	);
}
$this->db->insert_batch('tb_angsur',$data);
redirect('Angsur/index');
		}else{


//$this->db->update_batch('gaji_cor',$data,'id_cor');



	$data['angsur']=$this->Model_angsur->angsur()->result();
	$data['content']='input_angsur';
	$this->load->view('dashboard',$data);
	}
}
function edit_angsur(){

	if (isset($_POST['simpan'])) {
		
	}else{

		
	}
}
function hapus(){
$id=$this->uri->segment(3);
	$this->db->where('id_angsur',$id);
	$this->db->delete('tb_angsur');
	redirect('Angsur/index');

}
}







?>