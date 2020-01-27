<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

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

	public function index()
	{
		$this->load->view('jadwal/dashboard');
	}

    public function lihat_jadwal(){
        $this->load->view('jadwal/daftar_jadwal');
    }

	public function input_jadwal(){
        $this->load->view('jadwal/input_jadwal');
    }

    public function simpan_jadwal()
    {
    	$id_pegawai = $this->input->post('id_pegawai');
    	$id_tim = $this->input->post('id_tim');
    	$tanggal = $this->input->post('tanggal');
    	$tipe_jadwal = $this->input->post('tipe_jadwal');

    	$data = array(
    		'id_jadwal' => '',
    		'id_pegawai' => $id_pegawai,
    		'id_tim' => $id_tim,
    		'tanggal' => $tanggal,
    		'tipe_jadwal' => $tipe_jadwal
    	);
    	
    	$this->pegawai_model->insert($data, 'jadwal');
    	redirect('index.php/tim/index');
    }

    public function daftar_jadwal()
    {
        $this->load->view('jadwal/daftar_jadwal');
    }
}
