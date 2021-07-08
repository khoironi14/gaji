<?php

/**
 * 	
 */
class Barang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_barang');
	}
	function index(){


		$data['barang']=$this->Model_barang->view_barang()->result();
		$data['content']='view_barang';
		$this->load->view('dashboard',$data);
	}
	function add_barang(){


		if (isset($_POST['simpan'])) {
			$data=[
					'nama_barang'=>$this->input->post('nama_barang'),
					'berat'=>$this->input->post('berat'),
					'biaya_cetak'=>$this->input->post('biaya'),


			];
			$this->Model_barang->save_barang($data);
			redirect('Barang/index');
		}else{
$data['content']='add_barang';
		$this->load->view('dashboard',$data);


		}
	}
	function edit_barang(){

if (isset($_POST['simpan'])) {
	$id=$this->input->post('id');
			$data=[
					'nama_barang'=>$this->input->post('nama_barang'),
					'berat'=>$this->input->post('berat'),
					'biaya_cetak'=>$this->input->post('biaya'),


			];
			$this->Model_barang->update_barang($id,$data);
			redirect('Barang/index');
		}else{
			$id=$this->uri->segment(3);
			$data['edit']=$this->Model_barang->edit_barang($id)->row_array();
$data['content']='edit_barang';
		$this->load->view('dashboard',$data);


		}

	}


	function hapus(){
$id=$this->uri->segment(3);
$this->db->where('id_barang',$id);
$this->db->delete('tb_barang');
redirect('Barang/index');

	}
}







?>