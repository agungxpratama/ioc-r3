<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home class
 */
class Home extends CI_Controller
{

    // function __construct()
    // {
    //     // code...
    // }

    public function index()
    {
        $this->load->view('home');
    }
}
