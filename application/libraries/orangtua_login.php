<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class orangtua_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($username, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('orangtua', array(
										'username' => $username, 
										'password' => sha1($password)
										));
										
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM orangtua WHERE username = "'.$username.'"');
			$user 	= $row->row();
			$id 	= $user->id_orangtua;
			$username	= $user->username;
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('username', $username); 
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			// Kalau benar di redirect
				
			redirect(base_url().'orangtua/dashboard');

		}else{
			
			$this->CI->session->set_flashdata('sukses','Oopss.. NIS/password salah');
			redirect(base_url().'orangtua/login');
		}
		return false;
	}

	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('orangtua/login'));
		}	
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		//$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		session_destroy();
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url().'orangtua/login');
	}
	
}