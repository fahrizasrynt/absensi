<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Daftar guru
	public function guru() {
		
		$site	= $this->konfigurasi_model->listing();
		$guru	= $this->guru_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required');
		$valid->set_rules('email','Email','required');
		$valid->set_rules('password','Password','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Daftar guru - '.$site['nama_web'],
						'guru'	=> $guru,
						'isi'	=> 'guru/user/daftar_guru');
		$this->load->view('guru/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
						);
			$this->guru_model->create($data);		
			$this->session->set_flashdata('sukses','guru berhasil ditambah');
			redirect(base_url('guru/user/guru'));
		}
	}

	// Edit guru
	public function edit_guru($id_guru) {
		
		$guru = $this->guru_model->detail($id_guru);
		$site = $this->konfigurasi_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('email','Email','required');

		if($valid->run() === FALSE) {
		
		$data = array(	'title'	 	=> 'Edit guru -'.$site['nama_web'],
						'guru'		=> $guru,
						'site'		=> $site,
						'isi'		=> 'guru/user/edit_guru');
		$this->load->view('guru/layout/wrapper',$data);
		}else{

			$i = $this->input;
			
			if($i->post('password') == true) {
			
			$data = array(	'id_guru'	=> $guru['id_guru'],
							'email'		=> $i->post('email'),
						);
			}

			$data = array(	'id_guru'	=> $guru['id_guru'],
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
						);
			$this->guru_model->edit($data);		
			$this->session->set_flashdata('sukses','guru berhasil diedit');
			redirect(base_url('guru/user/guru'));
		}
	}

	// Delete guru
	public function delete_guru($id_guru) {
		$data = array('id_guru' => $id_guru);
		$this->guru_model->delete($data);		
		$this->session->set_flashdata('sukses','guru berhasil dihapus');
		redirect(base_url('guru/user/guru'));
	}	
}