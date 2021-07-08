<?php

/**
 * 
 */
class Gaji_khusus extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_khusus');
	}
	function index(){

		$data['content']='view_gaji_khusus';
		$this->load->view('dashboard',$data);
	}
	function get_data_gaji(){
		//$gaji=$this->Model_slip->gaji();
		
		$list=$this->Model_khusus->get_datatables();
		$data=array();
		$no=$_POST['start'];
		$h=0;
		foreach ($list as $field) {
			
   
			$no++;
			$row=array();
			$row[]=$no;
			$row[]=$field->tanggal;
			$row[]=$field->nama_karyawan;
			$row[]=$field->alamat;
			$row[]=$field->besar_gaji;
			
			
			
			
		
			

			
				$row[]='<a href="'.base_url('Gaji_khusus/edit_gaji/'.$field->id_khusus.'').'" class="btn btn-info">Edit</a> <a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="'.$field->id_khusus.'" >Hapus</a> ';

			$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->Model_khusus->count_all(),
			'recordsFiltered'=>$this->Model_khusus->count_filtered(),
			'data'=>$data,
			
                
            

			);
		
		echo json_encode($output);

	}
	function input_gaji(){

		if (isset($_POST['simpan'])) {
			$karyawan=$this->input->post('id');
			$gaji=$this->input->post('gaji');
			$tanggal=$this->input->post('tanggal');
			foreach ($karyawan as $key => $value) {
				$data[$key]=array(
					'id_karyawan'=>$karyawan[$key],
					'besar_gaji'=>$gaji[$key],
					'tanggal'=>$tanggal

				);
			}
			$this->db->insert_batch('tb_gaji_khusus',$data);

		}else{

			$data['karyawan']=$this->Model_khusus->karyawan()->result();
			$data['content']='gaji_khusus';
			$this->load->view('dashboard',$data);
		}
	}
	function edit_gaji(){

		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id');
			$data=array(
				'besar_gaji'=>$this->input->post('gaji')


			);
			$this->Model_khusus->update_gaji($id,$data);
			redirect('Gaji_khusus/index');
		}else{

			$id=$this->uri->segment(3);
			$data['edit']=$this->Model_khusus->edit_gaji($id)->row_array();
				$data['content']='edit_khusus';
			$this->load->view('dashboard',$data);

		}
	}
	function hapus(){

		$id=$this->uri->segment(3);
		$this->db->where('id_khusus',$id);
		$this->db->delete('tb_gaji_khusus');

	}
	function cetak_pdf(){

			$data['pdf']=$this->Model_khusus->cetak_pdf()->result();
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf_khusus',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
	}
}










?>