<?php

class Pres extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_pres');
	}

function index(){
$data['gaji']=$this->Model_pres->view_gaji()->result();
$data['content']='view_gajipres';
$this->load->view('dashboard',$data);


}

	function input_gaji(){

		if (isset($_POST['simpan'])) {
			$count=$this->input->post('barang');
			$tgl=$this->input->post('tanggal');
			$karyawan=$this->input->post('karyawan');
			$barang=$this->input->post('barang');
			$jml_jadi=$this->input->post('jml_jadi');
			$berat=$this->input->post('berat');
			$biaya=$this->input->post('biaya');
			$upah=$this->input->post('upah');
			$kerja=$this->input->post('hari_kerja');
			$count=count($count);
			for ($i=0; $i <$count ; $i++) { 
				$this->db->query("INSERT INTO `gaji_pres`( `id_karyawan`, `tanggal`, `id_barang`, `jumlah_jadi`, `berat`, `biaya_cetak`, `upah`, `hari_kerja`) VALUES ('$karyawan[$i]','$tgl','$barang[$i]','$jml_jadi[$i]','$berat[$i]','$biaya[$i]','$upah[$i]','$kerja')");
			}
			redirect('Pres/index');
		}else{


			$data['barang']=$this->Model_pres->barang()->result();
			$data['karyawan']=$this->Model_pres->karyawan()->result();
			$data['content']='input_pres';
			$this->load->view('dashboard',$data);
		}
	}
	function edit_pres(){


		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id');
			$data=[
					'id_barang'=>$this->input->post('barang'),
					'jumlah_jadi'=>$this->input->post('jml_jadi'),
					'berat'=>$this->input->post('berat'),
					'biaya_cetak'=>$this->input->post('biaya'),
					'upah'=>$this->input->post('upah')

			];
			$this->Model_pres->update_pres($id,$data);
			redirect('Pres/index');
		}else{
				$id=$this->uri->segment(3);
			$data['edit']=$this->Model_pres->edit_pres($id)->row_array();
				$data['barang']=$this->Model_pres->barang()->result();
				$data['content']='edit_pres';
			$this->load->view('dashboard',$data);

		}
	}
	function hapus(){

		$id=$this->uri->segment(3);
		$this->db->where('id_pres',$id);
		 $this->db->delete('gaji_pres');
		 redirect('Pres/index');
	}
	function cetak_pdf(){

$data['gaji']=$this->Model_pres->view_gaji()->result();
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf_pres',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
	}
	function cek_biaya(){

		$barang=$this->input->post('barang');
		$data=$this->db->get_where('tb_barang',['id_barang'=>$barang])->result();
		foreach ($data as  $tampil) {
			$biaya['barang']=$tampil->nama_barang;
			$biaya['biaya']=$tampil->biaya_cetak;
		}
		echo json_encode($biaya);

	}
	function cek_nama(){

		$id=$this->input->post('kar');
		$cek=$this->db->get_where('tb_karyawan',['id_karyawan'=>$id]);
		foreach ($cek->result() as $tampil) {
			echo $tampil->nama_karyawan;
		}
	}
}






?>