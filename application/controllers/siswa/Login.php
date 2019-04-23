<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index() {
		

		// Validasi
		$valid 		= $this->form_validation;
		$nis		= $this->input->post('nis');
		$password	= $this->input->post('password');
		$valid->set_rules('nis','NIS','required');
		$valid->set_rules('password','Password','required');	
		if($valid->run()) {
			$this->siswa_login->login($nis,$password);
		}
		
		$data = array ('title' => 'Login Siswa');
		$this->load->view('siswa/login',$data);
	
		}

	

	public function logout() {
		$this->siswa_login->logout();
	}	
}