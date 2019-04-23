<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($nis, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('siswa', array(
										'nis' => $nis, 
										'password' => sha1($password)
										));
										
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM siswa WHERE nis = "'.$nis.'"');
			$user 	= $row->row();
			$id 	= $user->id_siswa;
			$nis	= $user->nis;
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('nis', $nis); 
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			// Kalau benar di redirect
				
			redirect(base_url().'siswa/dashboard');

		}else{
			
			$this->CI->session->set_flashdata('sukses','Oopss.. NIS/password salah');
			redirect(base_url().'siswa/login');
		}
		return false;
	}

	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('nis') == '') {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('siswa/login'));
		}	
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('nis');
		//$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		session_destroy();
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url().'siswa/login');
	}
	
}