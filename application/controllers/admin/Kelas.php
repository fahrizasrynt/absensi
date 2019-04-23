<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	// Daftar Kelas
	public function index() {
		
		$site	= $this->konfigurasi_model->listing();
		$kelas	= $this->kelas_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('kelas','Kelas','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Daftar Kelas - '.$site['nama_web'],
						'kelas'	=> $kelas,
						'isi'	=> 'admin/kelas/daftar_kelas');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$slug = url_title($this->input->post('kelas'), 'dash', TRUE);			
			$data = array(	'slug_kelas'=> $slug,			
							'kelas'		=> $i->post('kelas'),
							'urutan'	=> $i->post('urutan'),
						);
			$this->kelas_model->create($data);		
			$this->session->set_flashdata('sukses','Kelas berhasil ditambah');
			redirect(base_url('admin/kelas'));
		}
	}

	// Edit Kelas
	public function edit($id_kelas) {
		
		$kelas = $this->kelas_model->detail($id_kelas);
		$site  = $this->konfigurasi_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('kelas','Kelas','required');

		if($valid->run() === FALSE) {
		
		$data = array(	'title'	 	=> 'Edit Kelas -'.$site['nama_web'],
						'kelas'		=> $kelas,
						'site'		=> $site,
						'isi'		=> 'admin/kelas/edit_kelas');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			
			$i = $this->input;
			$slug = url_title($this->input->post('kelas'), 'dash', TRUE);			
			$data = array(	'id_kelas'	=> $kelas['id_kelas'],
							'slug_kelas'=> $slug,
							'kelas'		=> $i->post('kelas'),
							'urutan'	=> $i->post('urutan'),
						);
			$this->kelas_model->edit($data);		
			$this->session->set_flashdata('sukses','Kelas berhasil diedit');
			redirect(base_url('admin/kelas'));
		}
	}

	// Delete Kelas
	public function delete($id_kelas) {
		$data = array('id_kelas' => $id_kelas);
		$this->kelas_model->delete($data);		
		$this->session->set_flashdata('sukses','Kelas berhasil dihapus');
		redirect(base_url('admin/kelas'));
	}	
}