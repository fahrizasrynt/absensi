<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Daftar admin
	public function admin() {
		
		$site	= $this->konfigurasi_model->listing();
		$admin	= $this->admin_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required');
		$valid->set_rules('email','Email','required');
		$valid->set_rules('password','Password','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Daftar admin - '.$site['nama_web'],
						'admin'	=> $admin,
						'isi'	=> 'admin/user/daftar_admin');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
						);
			$this->admin_model->create($data);		
			$this->session->set_flashdata('sukses','admin berhasil ditambah');
			redirect(base_url('admin/user/admin'));
		}
	}

	// Edit admin
	public function edit_admin($id_admin) {
		
		$admin = $this->admin_model->detail($id_admin);
		$site = $this->konfigurasi_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('email','Email','required');

		if($valid->run() === FALSE) {
		
		$data = array(	'title'	 	=> 'Edit admin -'.$site['nama_web'],
						'admin'		=> $admin,
						'site'		=> $site,
						'isi'		=> 'admin/user/edit_admin');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;
			
			if($i->post('password') == true) {
			
			$data = array(	'id_admin'	=> $admin['id_admin'],
							'email'		=> $i->post('email'),
						);
			}

			$data = array(	'id_admin'	=> $admin['id_admin'],
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
						);
			$this->admin_model->edit($data);		
			$this->session->set_flashdata('sukses','admin berhasil diedit');
			redirect(base_url('admin/user/admin'));
		}
	}

	// Delete admin
	public function delete_admin($id_admin) {
		$data = array('id_admin' => $id_admin);
		$this->admin_model->delete($data);		
		$this->session->set_flashdata('sukses','admin berhasil dihapus');
		redirect(base_url('admin/user/admin'));
	}	
}