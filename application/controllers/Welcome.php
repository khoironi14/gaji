<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user');
	}
	
	public function index()
	{
		if (isset($_POST['login'])) {
			$data=array(
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password'))


			);
			$cek=$this->Model_user->validasi($data);
			if ($cek->num_rows() >0) {
				foreach ($cek->result() as $data) {
					$this->session->set_userdata('username',$data->username);
				}
				redirect('Welcome/home');
			}else{
	$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Username/Password  Salah</div>');
				redirect('Welcome/index');
			}

		}else{
		$this->load->view('login');
		}
	}
	function home(){
		$data['content']='home';

		$this->load->view('dashboard',$data);
	}
function ganti_password(){

	if (isset($_POST['simpan'])) {
		$lama=md5($this->input->post('password_lama'));
		$cek=$this->Model_user->cek_password($lama);
		if ($cek->num_rows() >0) {
			$data=[
				'password'=>md5($this->input->post('password_baru'))


			];
			$this->Model_user->ganti_password($lama,$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Password Berhasil diganti</div>');
			redirect('Welcome/home');
		}else{

			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
			redirect('Welcome/ganti_password');
		}
	}else{
$data['content']='ganti_password';

		$this->load->view('dashboard',$data);

		
	}
}
function logout(){
	$this->session->sess_destroy();
		redirect('Welcome/index');
}
}
