<?php
/**
 * 
 */
class Slip_gaji extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_slip');
	}
	function index(){
$data['content']='view_slip';
		$this->load->view('dashboard',$data);

	}
	function get_data_gaji(){
		$gaji=$this->Model_slip->gaji();
		$makan=$gaji['besar'];
		//$g=$gaji['gaji_perjam'];
		$list=$this->Model_slip->get_datatables();
		$data=array();
		$no=$_POST['start'];
		$h=0;
		foreach ($list as $field) {
			$h=($field->jk*$field->gaji_perjam) + ($field->l * 1.5*$field->gaji_perjam) + $makan;
   
			$no++;
			$row=array();
			$row[]=$no;
			$row[]=$field->tanggal;
			$row[]=$field->nama_karyawan;
			$row[]=$field->alamat;
			$row[]=$field->jk;
			$row[]=$field->l;
			$row[]=$h;
		
			

			
				$row[]='<a href="'.base_url('Slip_gaji/edit_slip/'.$field->id_slip.'/'.$field->nama_karyawan.'').'" class="btn btn-info">Edit</a> <a class="btn btn-danger" data-toggle="modal" data-target="#modal-konfirmasi"  data-id="'.$field->id_slip.'" >Hapus</a> ';

			$data[]=$row;
		}
		$output=array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$this->Model_slip->count_all(),
			'recordsFiltered'=>$this->Model_slip->count_filtered(),
			'data'=>$data,
			
                
            

			);
		
		echo json_encode($output);

	}

	function slip_harian(){
		$data['angka']=$this->Model_slip->angka()->result();
		$data['karyawan']=$this->Model_slip->view_karyawan()->result();
		$data['content']='slip_harian';
		$this->load->view('dashboard',$data);
	}
	function save_slip(){

		//$banyak=$_POST['jk'];
		$cek=$_POST['id'];
		$count=count($cek);
		$karyawan=$this->input->post('id');
		$tanggal=$this->input->post('tanggal');
		$lembur=$this->input->post('l');
		$absen=$this->input->post('absen');
		$jk=$this->input->post('jk');
		 foreach ($cek as $i => $nilai) {
		 	
		 
		 		
			$data[$i]=array(
				'id_karyawan'=>$karyawan[$i],
				'tanggal'=>$tanggal,
				'jk'=>$jk[$i],
				'l'=>$lembur[$i],
				'absen'=>$absen[$i]

			);
			 
		}
		$this->db->insert_batch('slip_gaji_harian',$data);
		redirect('Slip_gaji/index');
	}
	function edit_slip(){

		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id');
			$data=[
				'jk'=>$this->input->post('jk'),
				'l'=>$this->input->post('lembur')

			];
			$this->Model_slip->update_slip($id,$data);
			redirect('Slip_gaji/index');
		}else{

			$id=$this->uri->segment(3);
			$data['edit']=$this->Model_slip->edit_slip($id)->row_array();
				$data['angka']=$this->Model_slip->angka()->result();
					$data['content']='edit_slip';
		$this->load->view('dashboard',$data);

		}
	}
	function hapus(){

		$id=$this->uri->segment(3);
		 $this->db->where('id_slip',$id);
		 $this->db->delete('slip_gaji_harian');
		 redirect('Slip_gaji/index');
	}
	function cetak_slip(){
		if (isset($_POST['cari'])) {
			$awal=$this->input->post('periode_awal');
			$akhir=$this->input->post('periode_akhir');
		
			$data['gaji']=$this->Model_slip->gaji();
			$data['slip']=$this->Model_slip->slip_gaji($awal,$akhir)->result();
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('cetak_slip',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }else{

    	$data['content']='periode_slip';
    	$this->load->view('dashboard',$data);
    }
	}

	function laporan(){
		$awal=$this->input->post('tgl_awal');
		$akhir=$this->input->post('tgl_akhir');
		$data['report']=$this->Model_slip->report($awal,$akhir)->result();
		$data['laporan']=$this->Model_slip->laporan()->result();
		$data['content']='laporan_slip';
    	$this->load->view('dashboard',$data);


	}
	function cetak_laporan(){
		$awal=$this->uri->segment(3);
		$akhir=$this->uri->segment(4);
	$data['report']=$this->Model_slip->report($awal,$akhir)->result();
		$data['laporan']=$this->Model_slip->laporan()->result();
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('laporan_kerja',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
	}
	function laporan_gaji(){
		if (isset($_POST['cari'])) {
			$awal=date('Y-m-d',strtotime($this->input->post('tgl_awal')));
			$akhir=date('Y-m-d',strtotime($this->input->post('tgl_akhir')));

			$data['laporan']=$this->db->query("select sum(jk) as jumlahkerja,sum(l) as totallembur,gaji_perjam,uang_makan,lembur,nama_karyawan,count(*) as jumlah_hari from slip_gaji_harian join tb_karyawan on slip_gaji_harian.id_karyawan=tb_karyawan.id_karyawan  join tb_gaji on tb_karyawan.id_karyawan=tb_gaji.id_karyawan	where tanggal between '".$awal."' and '".$akhir."' group by slip_gaji_harian.id_karyawan")->result();
			$data['content']='laporan_gaji';

		$this->load->view('dashboard',$data);
		}else{
		$data['content']='laporan_gaji';

		$this->load->view('dashboard',$data);
		}
	}
	function pdf_laporangaji(){
$awal=$this->uri->segment(3);
			$akhir=$this->uri->segment(4);

			$data['laporan']=$this->db->query("select sum(jk) as jumlahkerja,sum(l) as totallembur,gaji_perjam,uang_makan,lembur,nama_karyawan,count(*) as jumlah_hari from slip_gaji_harian join tb_karyawan on slip_gaji_harian.id_karyawan=tb_karyawan.id_karyawan  join tb_gaji on tb_karyawan.id_karyawan=tb_gaji.id_karyawan	where tanggal between '".$awal."' and '".$akhir."' group by slip_gaji_harian.id_karyawan")->result();
			$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdflaporan_kerja',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

	}
}









?>