<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// Load Model
		$site = $this->konfigurasi_model->listing();
		
		$data = array('site' => $site);

		$this->load->view('home', $data);
	}
}
