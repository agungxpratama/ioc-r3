<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home class
 */
class Home extends CI_Controller
{

    function __construct()
    {
    	parent::__construct();
    	if ($this->session->userdata('isLogin')== false) {
    		redirect(base_url('index.php'));
    	}
    //     // code...
    }

    public function index()
    {
        $this->load->view('home');
    }
}
