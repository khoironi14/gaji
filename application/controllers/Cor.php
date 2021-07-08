<?php

class Cor extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_cor');
	}
	function index(){
		$data['angsur']=$this->Model_cor->angsur()->result();
		$data['content']='view_cor';
		$this->load->view('dashboard',$data);

	}
	function get_data_gaji(){
		//$gaji=$this->Model_slip->gaji();
		
		$list=$this->Model_cor->get_datatables();
		$data=array();
		$no=$_POST['start'];
		$h=0;
		foreach ($list as $field) {
			$h=($field->tonase*250)/15;
   
			$no++;
			$row=array();
			$row[]=$no;
			$row[]=$field->tanggal;
			$row[]=$field->nama_karyawan;
			$row[]=$field->alamat;
			$row[]=$field->tonase;
			$row[]=$h;
			$row[]=$field->sisa_hutang;
			$row[]=$field->jumlah_angsur;
			$row[]=$h-$field->jumlah_angsur;
			
			
			
		
			

			
				$row[]='<a href="'.base_url('Cor/edit_gaji/'.$field->id_cor.'').'" class="btn btn-info">Edit</a> <a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="'.$field->id_cor.'" >Hapus</a> ';

			$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->Model_cor->count_all(),
			'recordsFiltered'=>$this->Model_cor->count_filtered(),
			'data'=>$data,
			
                
            

			);
		
		echo json_encode($output);

	}
	function input(){

		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id_karyawan');
			$karyawan=$this->input->post('id_karyawan');
			$tonase=$this->input->post('tonase');
			foreach ($id as $key => $value) {
				$data[$key]=array(
					'id_karyawan'=>$karyawan[$key],
					'tonase'=>$tonase[$key],
					'tanggal'=>$this->input->post('tanggal')

				);

			}
			$this->db->insert_batch('gaji_cor',$data);
			redirect('Cor/index');
		}else{
			$data['karyawan']=$this->Model_cor->karyawan()->result();
			$data['content']='add_cor';
			$this->load->view('dashboard',$data);

		}
	}
	function edit_gaji(){

		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id');
			$data=[
				'tonase'=>$this->input->post('tonase')

			];
			$this->Model_cor->update_gaji($id,$data);
			redirect('Cor/index');
		}else{
			$id=$this->uri->segment(3);
			$data['edit']=$this->Model_cor->edit_gaji($id)->row_array();
			$data['content']='edit_cor';
			$this->load->view('dashboard',$data);
			
		}
	}
	function hapus(){

		$id=$this->uri->sgment(3);
		$this->db->where('id_cor',$id);
		$this->db->delete('gaji_cor');
		redirect('Cor/index');
	}
	function cetak_pdf(){

		$data['pdf']=$this->Model_cor->cetak_pdf()->result();
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf_cor',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
	}
	function save_angsuran(){
$id=$this->input->post('id');
$i=$this->input->post('id');
$angsuran=$this->input->post('angsuran');
$karyawan=$this->input->post('id_karyawan');
foreach ($id as $key => $value) {
	$data[$key]=array(
		
		'id_cor'=>$i[$key],
		'angsuran'=>$angsuran[$key]


	);
}
$this->db->update_batch('gaji_cor',$data,'id_cor');

	}
}








?>