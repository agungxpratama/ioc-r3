<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class presensi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
	}
	public function jam_masuk()
	{
		$tanggal=$this->input->post('tanggal');
		$jam_masuk=$this->input->post('jam_masuk');
		$data_jam_masuk=array(
			'id_pegawai'=>$this->session->userdata('id_pegawai'),
			'tanggal_presensi'=>$tanggal,
			'jam_masuk_presensi'=>$tanggal
		);
		$this->pegawai_model->insert($data_jam_masuk,'presensi');
		redirect(base_url('index.php/admin/admin_input_presensi'));
	}	

}
