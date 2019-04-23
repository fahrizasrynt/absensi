<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// Index Page
	public function index(){

		$site = $this->konfigurasi_model->listing();

		$data = array (	'title' => 'Dashboard - '.$site['nama_web'],
						'site' => $site,
						'siswa'	=> $this->siswa_model->jumlah_siswa(),
						'orangtua'	=> $this->orangtua_model->jumlah_orangtua(),
						'kelas'	=> $this->kelas_model->jumlah_kelas(),
						'admin'	=> $this->admin_model->jumlah_admin(),
						'guru'	=> $this->guru_model->jumlah_guru(),
						'isi' => 'admin/dashboard/list');

		$this->load->view('admin/layout/wrapper',$data);
	}

	// Konfigurasi Umum
	public function umum(){

		$site = $this->konfigurasi_model->listing();

		// Validasi 
		$this->form_validation->set_rules('nama_web','Nama website','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Konfigurasi Umum - '.$site['nama_web'],
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/umum');
		$this->load->view('admin/layout/wrapper',$data);

		}else{
		
			$i = $this->input;
			$data = array(	'id_konfigurasi' => $i->post('id_konfigurasi'),
							'nama_web'	=> $i->post('nama_web'),
							'email'		=> $i->post('email'),
							'keywords'	=> $i->post('keywords'),
							'metatext'	=> $i->post('metatext'),
							'peta'		=> $i->post('peta')
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Konfigurasi telah diupdate');
			redirect(base_url('admin/dashboard/umum'));
		}
	}		

	// Konfigurasi Logo
	public function logo() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','id_konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('logo')) {
				
		$data = array(	'title'	=> 'Konfigurasi Logo',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dashboard/logo');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['logo']);
				unlink('./assets/upload/image/thumbs/'.$site['logo']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'logo'			=> $upload_data['uploads']['file_name']
							);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/logo'));
		}}
		// Default page
		$data = array(	'title'	=> 'Konfigurasi Logo',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/logo');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Konfigurasi Icon
	public function icon() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','id_konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'	=> 'Konfigurasi Icon',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dashboard/icon');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['icon']);
				unlink('./assets/upload/image/thumbs/'.$site['icon']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'icon'			=> $upload_data['uploads']['file_name']
							);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/icon'));
		}}
		// Default page
		$data = array(	'title'	=> 'Konfigurasi Icon',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/icon');
		$this->load->view('admin/layout/wrapper',$data);
	}			

}