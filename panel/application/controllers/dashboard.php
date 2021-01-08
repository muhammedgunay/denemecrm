<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

	   
	   if(!get_active_user()){
		   redirect(base_url("login"));
	   }

    }


	public function index()
	{
		$this->load->view('dashboard');
	}
}
