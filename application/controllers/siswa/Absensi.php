<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function index(){

		$id_siswa 	= $this->session->userdata('id');
		$absensi 	= $this->absensi_model->absen_saya($id_siswa);
		$siswa   	= $this->siswa_model->listing();
		$site		= $this->konfigurasi_model->listing();
		
		$data = array(	'title'		=> 'Daftar Absensi - '.$site['nama_web'],
						'absensi'	=> $absensi,
						'siswa'		=> $siswa,
						'isi'		=> 'siswa/absensi/daftar_absensi');
		$this->load->view('siswa/layout/wrapper',$data);
		
	}
}