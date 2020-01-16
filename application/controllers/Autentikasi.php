<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class autentikasi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('pegawai_model');
	}
	public function form_login()
	{
		$this->load->view('autentikasi/login');
	}
	public function cek_autentikasi()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		$where_akun=array('username'=> $username,'password'=>$password);
		$data_akun=$this->pegawai_model->autentikasi($username,$password)->result_array();
		//echo $data_akun['username'];
		print_r($where_akun);
		echo "<br>";
		print_r($data_akun);
		echo "<br>";
		echo $data_akun["0"]["username"];
		if ($data_akun["0"]["username"] == $username && $data_akun["0"]["password"]==$password) {
			echo "True";
			
			//$where_pegawai=array('username'=> $username,'password'=>$password);
			//$data_akun=$this->pegawai_model->view_where('akun',$where_akun)->result_array();


			$data=array(
				'id_pegawai'=>$data_akun["0"]['id_pegawai'],
				'nama_pegawai'=>$data_akun["0"]['nama_pegawai'],
				'id_tim'=>$data_akun["0"]['id_tim'],
				'status_anggota'=>$data_akun["0"]['status_anggota']
			);
			$this->session->set_userdata($data);
			print_r($this->session->userdata());
			$this->session->set_userdata('isLogin',true);
			//$this->session->session_destroy();
			//redirect(base_url('index.php/home'));
		}else{
			$this->session->set_flashdata('alert','Username atau Password yang anda masukkan salah!');
			print "<script type='text/javascript'> alert('Hello! I am an alert box!');</script>";
			redirect(base_url('index.php/'));
		}
	}
}