<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index() {
		
		$name = $this->session->userdata('id');
		if ($name == FALSE) {	

		// Validasi
		$valid 		= $this->form_validation;
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');	
		
		if($valid->run()) {
			$this->guru_login->login($username,$password);
		}
		
		$data = array ('title' => 'Login');
		$this->load->view('guru/login',$data);
		
		}else{			
			redirect(base_url('guru/dashboard'));			
			}		
		}

	

	public function logout() {
		$this->guru_login->logout();
	}	
}