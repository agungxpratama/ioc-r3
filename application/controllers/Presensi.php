<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class presensi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$this->load->view('admin/dashboard');
	}
	public function admin_input_presensi()
	{
		$tgl_sekarang=date('Y-m-d');
		$where_absensi=array(
			'id_pegawai'=>$this->session->userdata('id_pegawai'),
			'tanggal_presensi'=>$tgl_sekarang
		);
		//print_r($where_absensi);
		$data['presensi_today']=$this->pegawai_model->view_where('presensi',$where_absensi)->result();
		//echo "<br>";
		//print_r($data['presensi_today']);
		$this->load->view('admin/admin_input_presensi',$data);
	}
	public function admin_lihat_kehadiran()
	{
		$where_absensi=array(
			'id_pegawai'=>$this->session->userdata('id_pegawai')
		);
		$data['presensi']=$this->pegawai_model->view_where('presensi',$where_absensi)->result();
		$this->load->view('admin/admin_lihat_kehadiran',$data);
	}
	public function jam_masuk()
	{
		$tanggal=$this->input->post('tanggal');
		$jam_masuk=$this->input->post('jam_masuk');
		$data_jam_masuk=array(
			'id_pegawai'=>$this->session->userdata('id_pegawai'),
			'tanggal_presensi'=>$tanggal,
			'jam_masuk_presensi'=>$jam_masuk,
			'keterangan_presensi'=>'Menuju Ishoma'
		);
		print_r($data_jam_masuk);
		$this->pegawai_model->insert($data_jam_masuk,'presensi');
		redirect(base_url('index.php/presensi/admin_input_presensi'));
	}
	public function jam_update($skrg,$id_presensi)
	{
		$jam_masuk=substr($skrg, 0,2);
		//$jam_tengah=$jam_masuk+4;
		$jam_update=date('H');
		$cek=$jam_update-$jam_masuk;
		echo "$jam_update"."-".$jam_masuk."=";
		//$cek=5;
		echo "$cek<hr>";
		//echo "jam masuk $jam_masuk"."<br> jam jam_tengah".$jam_tengah;
		if ($cek < 5) {
			$message = "Belum waktunya update presensi!";
			$this->session->set_flashdata('ale',$message);
			//echo "<script type='text/javascript'>alert('$message');</script>";
			//echo "<div class='alert alert-primary' role='alert'>Belum waktunya update presensi!</div>";
			
		}else{
			$where_presensi=array(
				'id_presensi'=>$id_presensi,
			);
			$data_update=array(
				'jam_tengah'=>date('H:i:s'),
				'keterangan_presensi'=>'Menuju Pulang'
			);
			$this->pegawai_model->update($data_update,$where_presensi,'presensi');
			//redirect(base_url('index.php/presensi/admin_input_presensi'));
		}
		redirect(base_url('index.php/presensi/admin_input_presensi'));
	}
	public function jam_pulang($skrg,$id_presensi)
	{
		//$jam_tengah=date('H')+9;
		$jam_pulang=date('H');
		$jam_masuk=substr($skrg, 0,2);
		$cek=$jam_pulang-$jam_masuk;
		echo "$jam_pulang"."-".$jam_masuk."=";
		echo "$cek";
		//$cek=5;
		//echo "jam masuk $jam_masuk"."<br> jam jam_tengah".$jam_tengah;
		if ($cek < 9) {
			$message = "Belum waktunya pulang!";
			$this->session->set_flashdata('ale',$message);
			//echo "<script type='text/javascript'>alert('$message');</script>";
			//echo "<div class='alert alert-primary' role='alert'>Belum waktunya update presensi!</div>";
			
		}else{
			$where_presensi=array(
				'id_presensi'=>$id_presensi,
			);
			$data_update=array(
				'jam_keluar_presensi'=>date('H:i:s'),
				'keterangan_presensi'=>'Done!'
			);
			$this->pegawai_model->update($data_update,$where_presensi,'presensi');
			//redirect(base_url('index.php/presensi/admin_input_presensi'));
		}
		redirect(base_url('index.php/presensi/admin_input_presensi'));
	}

}
