<?php
/**
 * 
 */
class Kategori extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kategori');
	}

	function view_kategori(){

		$data['kategori']=$this->Model_kategori->view_kategori()->result();
		$data['content']='view_kategori';
		$this->load->view('dashboard',$data);

	}
	function add_kategori(){

		if (isset($_POST['simpan'])) {
			$data=array(

				'nama_kategori'=>$this->input->post('nama_kategori')

			);
			$this->Model_kategori->save_kategori($data);
			redirect('Kategori/view_kategori');
		}else{
			$data['content']='add_kategori';
		$this->load->view('dashboard',$data);

		}
	}
	function edit_kategori(){

if (isset($_POST['simpan'])) {
	$id=$this->input->post('id');
			$data=array(

				'nama_kategori'=>$this->input->post('nama_kategori')

			);
			$this->Model_kategori->update_kategori($id,$data);
			redirect('Kategori/view_kategori');
		}else{
			$id=$this->uri->segment(3);
			$data['edit']=$this->Model_kategori->edit_kategori($id)->row_array();
			$data['content']='edit_kategori';
		$this->load->view('dashboard',$data);

		}

	}

	function hapus(){

		$id=$this->uri->segment(3);
			$this->db->where('id_kategori',$id);
			$this->db->delete('tb_kategori');
			redirect('Kategori/view_kategori');
	}
}






?>