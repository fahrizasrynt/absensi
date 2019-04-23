<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// Index Page
	public function index(){

		$site = $this->konfigurasi_model->listing();

		$data = array (	'title' => 'Dashboard - '.$site['nama_web'],
						'site'  => $site,
						'siswa'	=> $this->siswa_model->jumlah_siswa(),
						'orangtua'	=> $this->orangtua_model->jumlah_orangtua(),
						'kelas'	=> $this->kelas_model->jumlah_kelas(),
						'isi' 	=> 'orangtua/dashboard/list');

		$this->load->view('orangtua/layout/wrapper',$data);
	}
}