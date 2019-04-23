<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	// Daftar Siswa
	public function index($kelas=false){

		$site = $this->konfigurasi_model->listing();
		$siswa = $this->siswa_model->listing($kelas);

		$data = array ( 'title' => 'Daftar Siswa - '.$site['nama_web'],
						'siswa' => $siswa,
						'isi' 	=> 'admin/siswa/daftar_siswa');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Laporan PDF
	public function cetak_pdf() {
			
		$this->load->library("tcpdf");
			
			$pdf = new tcpdf();
			
			$orientation = "L";
			$format = "A4";
			$keepmargins = false;
			$tocpage = false;
			
			$pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
			
			$family = "dejavusans";
			$style = "";
			$size = "12";
			
			$pdf->SetFont($family, $style, $size);
			
			$html = '
			<h1>Laporan Data Siswa</h1>
			<br />
			<table border="1">
				<tr bgcolor="black" style="color: white;" align="center">
						   <th>NIS</th>
						   <th>Nama Siswa</th>
						   <th>Kelas</th>
                           <th>Agama</th>
						   <th>No. Handphone</th>
						   <th>Alamat</th>
						   <th>Email</th>
				</tr>';
			
			$i = 1;
			
			$query = $this->siswa_model->view();
			
			foreach ($query->result() as $row) :
			
			$html .= '
				<tr>
					<td align="center">'.$row->nis.'</td>
					<td align="center">'.$row->nama_depan.' '.$row->nama_belakang.'</td>
					<td align="center">'.$row->kelas.'</td>
					<td align="center">'.$row->agama.'</td>
					<td align="center">'.$row->no_hp.'</td>
					<td align="center">'.$row->alamat.'</td>
					<td align="center">'.$row->email.'</td>
				</tr>';
			$i++;
			endforeach;
				
			$html .= '</table>';
						
			$ln = true;
			$fill = false;
			$reseth = false;
			$cell = false;
			$align = "";
			
			$pdf->writeHTML($html, $ln, $fill, $reseth, $cell, $align);
			
			$pdf->Output();
			
			$dest = "F";
			
			$pdf->Output($name, $dest);
	}
	
	// Laporan Excel
	public function cetak_excel() {
		$this->load->view("admin/siswa/laporan_excel");
	}	

	// Tambah Siswa
	public function tambah() {
		$site  = $this->konfigurasi_model->listing();
		$siswa = $this->siswa_model->listing();
		$kelas = $this->kelas_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('nis','NIS','required');
		$v->set_rules('id_kelas','Kelas','required');
		$v->set_rules('nama_depan','Nama Depan','required');
		$v->set_rules('nama_belakang','Nama Belakang','required');
		$v->set_rules('wali','Nama Wali','required');
		$v->set_rules('no_hp','Nomer Handphone','required');
		$v->set_rules('agama','Agama','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('foto')) {
				
		$data = array(	'title'	=> 'Tambah Siswa - '.$site['nama_web'],
						'site'	=> $site,
						'siswa'	=> $siswa,
						'kelas'	=> $kelas,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/siswa/tambah_siswa');
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

				// Masuk ke database
				$i = $this->input;
				$data = array(	'nis'			=> $i->post('nis'),
								'id_kelas'		=> $i->post('id_kelas'),
								'id_kelas'		=> $i->post('id_kelas'),
								'nama_depan'	=> $i->post('nama_depan'),
								'nama_belakang' => $i->post('nama_belakang'),
								'alamat'		=> $i->post('alamat'),
								'wali'			=> $i->post('wali'),
								'no_hp'			=> $i->post('no_hp'),
								'agama'			=> $i->post('agama'),
								'email'			=> $i->post('email'),
								'password'		=> sha1($i->post('password')),
								'foto'			=> $upload_data['uploads']['file_name']
							);				
				$this->siswa_model->create($data);
				$this->session->set_flashdata('sukses','Siswa Telah Diupdate');
				redirect(base_url('admin/siswa'));
		}}
		// Default page
		$data = array(	'title'	=> 'Tambah Siswa - '.$site['nama_web'],
						'site'	=> $site,
						'siswa'	=> $siswa,
						'kelas'	=> $kelas,
						'isi'	=> 'admin/siswa/tambah_siswa');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit Siswa
	public function edit($id_siswa) {
		$site  = $this->konfigurasi_model->listing();
		$siswa = $this->siswa_model->detail($id_siswa);
		$kelas = $this->kelas_model->listing();
		
		$v = $this->form_validation;
		//$v->set_rules('nis','NIS','required');
		$v->set_rules('id_kelas','Kelas','required');
		$v->set_rules('nama_depan','Nama Depan','required');
		$v->set_rules('nama_belakang','Nama Belakang','required');
		$v->set_rules('wali','Nama Wali','required');
		$v->set_rules('no_hp','Nomer Handphone','required');
		$v->set_rules('agama','Agama','required');
		
		if($v->run()) {
			
			if(!empty($_FILES['foto']['name'])) {			
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('foto')) {
				
		$data = array(	'title'	=> 'Edit Siswa - '.$site['nama_web'],
						'site'	=> $site,
						'siswa'	=> $siswa,
						'kelas'	=> $kelas,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/siswa/edit_siswa');
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

				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_siswa'		=> $siswa['id_siswa'],
								//'nis'			=> $i->post('nis'),
								'id_kelas'		=> $i->post('id_kelas'),
								'nama_depan'	=> $i->post('nama_depan'),
								'nama_belakang' => $i->post('nama_belakang'),
								'alamat'		=> $i->post('alamat'),
								'wali'			=> $i->post('wali'),
								'no_hp'			=> $i->post('no_hp'),
								'agama'			=> $i->post('agama'),
								'email'			=> $i->post('email'),
								'password'		=> sha1($i->post('password')),
								'foto'			=> $upload_data['uploads']['file_name']
							);				
				$this->siswa_model->edit($data);
				$this->session->set_flashdata('sukses','Siswa Telah Diupdate');
				redirect(base_url('admin/siswa'));
		}}else{
				// Edit tanpa merubah gambar
				$i = $this->input;
				$data = array(	'id_siswa'		=> $siswa['id_siswa'],
								//'nis'			=> $i->post('nis'),
								'id_kelas'		=> $i->post('id_kelas'),
								'nama_depan'	=> $i->post('nama_depan'),
								'nama_belakang' => $i->post('nama_belakang'),
								'alamat'		=> $i->post('alamat'),
								'wali'			=> $i->post('wali'),
								'no_hp'			=> $i->post('no_hp'),
								'agama'			=> $i->post('agama'),
								'email'			=> $i->post('email'),
								'password'		=> sha1($i->post('password')),
							);				
				$this->siswa_model->edit($data);
				$this->session->set_flashdata('sukses','Siswa Telah Diupdate');
				redirect(base_url('admin/siswa'));

		}}

		// Default page
		$data = array(	'title'	=> 'Edit Siswa - '.$site['nama_web'],
						'site'	=> $site,
						'siswa'	=> $siswa,
						'kelas'	=> $kelas,
						'isi'	=> 'admin/siswa/edit_siswa');
		$this->load->view('admin/layout/wrapper',$data);
	}


	// Delete Siswa
	public function delete($id_siswa) {
		$data = array('id_siswa' => $id_siswa);
		$this->siswa_model->delete($data);		
		$this->session->set_flashdata('sukses','Siswa berhasil dihapus');
		redirect(base_url('admin/siswa'));
	}
	// Daftar Kelas
	public function kelas() {
		
		$site	= $this->konfigurasi_model->listing();
		$kelas	= $this->kelas_model->listing();
		$siswa	= $this->siswa_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('kelas','Kelas','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Daftar Siswa',
						'kelas'	=> $kelas,
						'isi'	=> 'admin/kelas/kelas_siswa');
		$this->load->view('admin/kelas/kelas_siswa',$data);
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
}