<?php

/**
 * 
 */
class Setting extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_setting');
	}
	function index(){
		//if (isset($_POST['simpan'])) {
			//$id=$this->input->post('id');
			//$data=array(

			//	'gaji_perjam'=>$this->input->post('gaji'),
			//	'uang_makan'=>$this->input->post('makan')
			//);
			//$this->Model_setting->tarif($id,$data);
			//redirect('Setting/index');
		//}else{

			
		$data['gaji']=$this->Model_setting->view_gaji()->result();
		$data['content']='view_gaji';
		$this->load->view('dashboard',$data);
		//}
	}

	function input_gaji(){

		if (isset($_POST['simpan'])) {
			$data=[
				'id_karyawan'=>$this->input->post('karyawan'),
				'gaji_perjam'=>$this->input->post('gaji'),
				'lembur'=>$this->input->post('lembur')

			];
			$this->Model_setting->save_gaji($data);
			redirect('Setting/index');
		}else{
$data['karyawan']=$this->Model_setting->karyawan()->result();
$data['content']='input_gaji';
		$this->load->view('dashboard',$data);

		}
	}
	function edit_gaji(){
if (isset($_POST['simpan'])) {
	$id=$this->input->post('id');
			$data=[
				'id_karyawan'=>$this->input->post('karyawan'),
				'gaji_perjam'=>$this->input->post('gaji'),
				'lembur'=>$this->input->post('lembur')

			];
			$this->Model_setting->update_gaji($id,$data);
			redirect('Setting/index');
		}else{
			$id=$this->uri->segment(3);
			$data['edit']=$this->Model_setting->edit_gaji($id)->row_array();
$data['karyawan']=$this->Model_setting->karyawan()->result();
$data['content']='edit_gaji';
		$this->load->view('dashboard',$data);

		}

	}
	function hapus_gaji(){

		$id=$this->uri->segment(3);
		$this->db->where('id_gaji',$id);
		$this->db->delete('tb_gaji');
		redirect('Setting/index');
	}
	function uang_makan(){

		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id');
			$data=[
				'besar'=>$this->input->post('uang_makan')

			];
			$this->Model_setting->edit_makan($id,$data);
			redirect('Setting/uang_makan');
		}else{
$data['makan']=$this->Model_setting->uang_makan()->row_array();
$data['content']='uang_makan';
		$this->load->view('dashboard',$data);

		}
	}
}










?>