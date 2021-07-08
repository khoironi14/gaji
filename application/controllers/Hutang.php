<?php
/**
 * 
 */
class Hutang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_hutang');
	}
	function index(){


		$data['content']='view_hutang';
		$this->load->view('dashboard',$data);
	}
	function get_data_hutang(){
		$list=$this->Model_hutang->get_datatables();
		$data=array();
		$no=$_POST['start'];
		foreach ($list as $field) {
			
   
			$no++;
			$row=array();
			$row[]=$no;
			$row[]=$field->nama_karyawan;
			$row[]=$field->alamat;
			$row[]=$field->jumlah_hutang;
			
				$row[]=$field->angsuran;
			
			
			

			
				$row[]='<a href="'.base_url('Hutang/edit_hutang/'.$field->id_hutang.'').'" class="btn btn-info">Edit</a> <a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="'.$field->id_hutang.'" >Hapus</a> ';

			$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->Model_hutang->count_all(),
			'recordsFiltered'=>$this->Model_hutang->count_filtered(),
			'data'=>$data,
			
                
            

			);
		
		echo json_encode($output);

	}

	function add_hutang(){

		if (isset($_POST['simpan'])) {
			$data=array(
				'id_karyawan'=>$this->input->post('karyawan'),
				'jumlah_hutang'=>$this->input->post('hutang'),
				'angsuran'=>$this->input->post('angsuran'),
				'tanggal'=>$this->input->post('tanggal')

			);
			$this->Model_hutang->save_hutang($data);
			redirect('Hutang/index');
		}else{

			$data['karyawan']=$this->Model_hutang->data_karyawan()->result();
			$data['content']='add_hutang';
		$this->load->view('dashboard',$data);
		}
	}
function edit_hutang(){

		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id');
			$data=array(
				'id_karyawan'=>$this->input->post('karyawan'),
				'jumlah_hutang'=>$this->input->post('hutang'),
				'angsuran'=>$this->input->post('angsuran'),
				'tanggal'=>$this->input->post('tanggal')

			);
			$this->Model_hutang->update_hutang($id,$data);
			redirect('Hutang/index');
		}else{
			$id=$this->uri->segment(3);
			$data['edit']=$this->Model_hutang->edit_hutang($id)->row_array();
			$data['karyawan']=$this->Model_hutang->data_karyawan()->result();
			$data['content']='edit_hutang';
		$this->load->view('dashboard',$data);
		}
	}
	function hapus(){

		$id=$this->uri->segment(3);
		$this->db->where('id_hutang',$id);
		$this->db->delete('tb_hutang');
		redirect('Hutang/index');
	}
}





?>