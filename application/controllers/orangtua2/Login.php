<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index() {
		

		// Validasi
		$valid 		= $this->form_validation;
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');	
		if($valid->run()) {
			$this->orangtua_login->login($username,$password);
		}
		
		$data = array ('title' => 'Login orangtua');
		$this->load->view('orangtua/login',$data);
	
		}

	

	public function logout() {
		$this->orangtua_login->logout();
	}	
}