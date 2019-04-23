<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function index(){

		$absensi = $this->absensi_model->listing();
		$siswa   = $this->siswa_model->listing();
		$site	 = $this->konfigurasi_model->listing();

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('keterangan','Nama Siswa','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Daftar Absensi - '.$site['nama_web'],
						'absensi'	=> $absensi,
						'siswa'	=> $siswa,
						'isi'	=> 'orangtua/absensi/daftar_absensi');
		$this->load->view('orangtua/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'keterangan'=> $i->post('keterangan'),			
							'id_siswa'	=> $i->post('id_siswa'),
							'tanggal'	=> $i->post('tanggal'),
						);
			$this->absensi_model->create($data);		
			$this->session->set_flashdata('sukses','Absensi telah diupdate');
			redirect(base_url('orangtua/absensi'));
		}
	}
}