<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($username, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('users', array(
										'username' => $username, 
										'password' => sha1($password)
										));
										
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM users WHERE username = "'.$username.'"');
			$admin 	= $row->row();
			$id 	= $admin->user_id;
			$status	= $admin->status;
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('username', $username); 
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			$this->CI->session->set_userdata('status', $status);
			// Kalau benar di redirect
		
		if ($this->CI->session->userdata('status') == 1){	
			redirect(base_url('users/dashboard'));

		}else if ($this->CI->session->userdata('status') == 0){	
			$this->CI->session->set_flashdata('sukses','Email not verifed');			
			redirect(base_url('login'));

		}}else{
			$this->CI->session->set_flashdata('sukses','Oopss.. Username/password salah');
			redirect(base_url().'login');
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('username') == '' && $this->CI->session->userdata('akses_level')=='') {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('login'));
		}	
	}
	
	// Logout
	public function logout($redirect) {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		unset($_SESSION['admin']);
		session_destroy();
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url().'login');
	}
	
}