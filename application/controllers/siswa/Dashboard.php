<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// Index Page
	public function index(){

		$site = $this->konfigurasi_model->listing();

		$data = array (	'title' => 'Dashboard - '.$site['nama_web'],
						'site' => $site,
						'isi' => 'siswa/dashboard/list');

		$this->load->view('siswa/layout/wrapper',$data);
	}
}