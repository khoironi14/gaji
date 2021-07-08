<?php
/**
 * 
 */
class Karyawan extends CI_Controller
{
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Model_karyawan');
	}
	function index(){
		$data['kategori']=$this->Model_karyawan->kategori()->result();
		$data['content']='view_karyawan';
		$this->load->view('dashboard',$data);
	}

	function get_data_karyawan(){
		$list=$this->Model_karyawan->get_datatables();
		$data=array();
		$no=$_POST['start'];
		foreach ($list as $field) {
			
   
			$no++;
			$row=array();
			$row[]=$no;
			$row[]=$field->nama_karyawan;
			$row[]=$field->alamat;
			$row[]=$field->tempat_lahir;
			$row[]=$field->tanggal_lahir;
			$row[]=$field->mulai_kerja;
			$row[]=$field->nama_kategori;
			

			
				$row[]='<div class="btn-group" role="group" aria-label="Basic example"><a href="'.base_url('Karyawan/edit_karyawan/'.$field->id_karyawan.'').'" class="btn btn-info">Edit</a> <a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="'.$field->id_karyawan.'" >Hapus</a></div> ';

			$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->Model_karyawan->count_all(),
			'recordsFiltered'=>$this->Model_karyawan->count_filtered(),
			'data'=>$data,
			
                
            

			);
		
		echo json_encode($output);

	}

	function add_karyawan(){
		if (isset($_POST['simpan'])) {
			$data=[
				'nama_karyawan'=>$this->input->post('nama'),
				'alamat'=>$this->input->post('alamat'),
				'tempat_lahir'=>$this->input->post('tempat'),
				'tanggal_lahir'=>$this->input->post('tanggal'),
				'mulai_kerja'=>$this->input->post('kerja'),
				'id_kategori'=>$this->input->post('kategori')

			];
			$this->Model_karyawan->add_karyawan($data);
			redirect('Karyawan/index');
		}else{

			$data['kategori']=$this->Model_karyawan->kategori()->result();

			$data['content']='add_karyawan';
		$this->load->view('dashboard',$data);
		}

	}
	function edit_karyawan(){
if (isset($_POST['simpan'])) {
	$id=$this->input->post('id');
			$data=[
				'nama_karyawan'=>$this->input->post('nama'),
				'alamat'=>$this->input->post('alamat'),
				'tempat_lahir'=>$this->input->post('tempat'),
				'tanggal_lahir'=>$this->input->post('tanggal'),
				'mulai_kerja'=>$this->input->post('kerja'),
				'id_kategori'=>$this->input->post('kategori')

			];
			$this->Model_karyawan->update_karyawan($id,$data);
			redirect('Karyawan/index');
		}else{
			$id=$this->uri->segment(3);
			$data['edit']=$this->Model_karyawan->edit_karyawan($id)->row_array();
			$data['kategori']=$this->Model_karyawan->kategori()->result();

			$data['content']='edit_karyawan';
		$this->load->view('dashboard',$data);
		}


	}
	function hapus(){

		$id=$this->uri->segment(3);
		$this->db->where('id_karyawan',$id);
		$this->db->delete('tb_karyawan');
		redirect('Karyawan/index');
	}
}




?>