<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bootstrap extends CI_Controller {

	public function index()
	{
		$this->load->view('bootstrap/main_v');
	}
}

