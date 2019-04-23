<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_orangtua extends CI_Controller {

	// Daftar orangtua
	public function index(){

		$site = $this->konfigurasi_model->listing();
		$orangtua = $this->orangtua_model->listing();

		$data = array ( 'title' => 'Daftar orangtua - '.$site['nama_web'],
						'orangtua' => $orangtua,
						'isi' 	=> 'orangtua/orangtua/daftar_orangtua');
		$this->load->view('orangtua/layout/wrapper',$data);
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
			<h1>Laporan Transaksi</h1>
			<br />
			<table border="1">
				<tr bgcolor="black" style="color: white;" align="center">
						<th>Nama orangtua</th>
						<th>Pendidikan</th>
			            <th>Agama</th>
						<th>No. Handphone</th>
						<th>Alamat</th>
						<th>Email</th>
				</tr>';
			
			$i = 1;
			
			$query = $this->orangtua_model->view();
			
			foreach ($query->result() as $row) :
			
			$html .= '
				<tr>
					<td align="center">'.$row->nama_depan.' '.$row->nama_belakang.'</td>
					<td align="center">'.$row->pendidikan.'</td>
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
		$this->load->view("orangtua/orangtua/laporan_excel");
	}	

	// Tambah orangtua
	public function tambah() {
		$site  = $this->konfigurasi_model->listing();
		$orangtua  = $this->orangtua_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('nama_depan','Nama Depan','required');
		$v->set_rules('nama_belakang','Nama Belakang','required');
		$v->set_rules('no_hp','Nomer Handphone','required');
		$v->set_rules('agama','Agama','required');
		$v->set_rules('username','Username','required');
		$v->set_rules('password','Password','required');
		$v->set_rules('email','Email','required');
		$v->set_rules('jabatan','Jabatan orangtua','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('foto')) {
				
		$data = array(	'title'	=> 'Tambah orangtua - '.$site['nama_web'],
						'site'	=> $site,
						'orangtua'	=> $orangtua,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'orangtua/orangtua/tambah_orangtua');
		$this->load->view('orangtua/layout/wrapper',$data);
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
				$data = array(	'nama_depan'	=> $i->post('nama_depan'),
								'username'		=> $i->post('username'),
								'nama_belakang' => $i->post('nama_belakang'),
								'alamat'		=> $i->post('alamat'),
								'pendidikan'	=> $i->post('pendidikan'),
								'no_hp'			=> $i->post('no_hp'),
								'agama'			=> $i->post('agama'),
								'email'			=> $i->post('email'),
								'jabatan'		=> $i->post('jabatan'),
								'password'		=> sha1($i->post('password')),
								'foto'			=> $upload_data['uploads']['file_name']
							);				
				$this->orangtua_model->create($data);
				$this->session->set_flashdata('sukses','orangtua Telah Ditambah');
				redirect(base_url('orangtua/list_orangtua'));
		}}
		// Default page
		$data = array(	'title'	=> 'Tambah orangtua - '.$site['nama_web'],
						'site'	=> $site,
						'orangtua' => $orangtua,
						'isi'	=> 'orangtua/orangtua/tambah_orangtua');
		$this->load->view('orangtua/layout/wrapper',$data);
	}

	// Edit orangtua
	public function edit($id_orangtua) {

        if($this->session->userdata('level') == 'tu') { 

		$site  = $this->konfigurasi_model->listing();
		$orangtua = $this->orangtua_model->detail($id_orangtua);
		
		$v = $this->form_validation;
		$v->set_rules('nama_depan','Nama Depan','required');
		$v->set_rules('nama_belakang','Nama Belakang','required');
		$v->set_rules('no_hp','Nomer Handphone','required');
		$v->set_rules('agama','Agama','required');
		$v->set_rules('email','Email','required');
		$v->set_rules('jabatan','Jabatan orangtua','required');
		
		if($v->run()) {
			
			if(!empty($_FILES['foto']['name'])) {			
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('foto')) {
				
		$data = array(	'title'	=> 'Edit orangtua - '.$site['nama_web'],
						'site'	=> $site,
						'orangtua'	=> $orangtua,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'orangtua/orangtua/edit_orangtua');
		$this->load->view('orangtua/layout/wrapper',$data);
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
				$data = array(	'id_guru'		=> $guru['id_guru'],
								'nama_depan'	=> $i->post('nama_depan'),
								'nama_belakang' => $i->post('nama_belakang'),
								'alamat'		=> $i->post('alamat'),
								'pendidikan'	=> $i->post('pendidikan'),
								'no_hp'			=> $i->post('no_hp'),
								'agama'			=> $i->post('agama'),
								'email'			=> $i->post('email'),
								'jabatan'		=> $i->post('jabatan'),
								'password'		=> sha1($i->post('password')),
								'foto'			=> $upload_data['uploads']['file_name']
							);				
				$this->orangtua_model->edit($data);
				$this->session->set_flashdata('sukses','orangtua Telah Diupdate');
				redirect(base_url('orangtua/list_orangtua'));
		}}else{
				// Edit tanpa merubah gambar
				$i = $this->input;
				$data = array(	'id_orangtua'		=> $orangtua['id_orangtua'],
								'nama_depan'	=> $i->post('nama_depan'),
								'nama_belakang' => $i->post('nama_belakang'),
								'alamat'		=> $i->post('alamat'),
								'pendidikan'	=> $i->post('pendidikan'),
								'no_hp'			=> $i->post('no_hp'),
								'agama'			=> $i->post('agama'),
								'email'			=> $i->post('email'),
								'jabatan'		=> $i->post('jabatan'),
								'password'		=> sha1($i->post('password')),
							);				
				$this->orangtua_model->edit($data);
				$this->session->set_flashdata('sukses','orangtua Telah Diupdate');
				redirect(base_url('orangtua/list_orangtua'));

		}}

		// Default page
		$data = array(	'title'	=> 'Edit orangtua - '.$site['nama_web'],
						'site'	=> $site,
						'orangtua'	=> $orangtua,
						'isi'	=> 'orangtua/orangtua/edit_orangtua');
		$this->load->view('orangtua/layout/wrapper',$data);

		}else{
		
		$this->session->set_flashdata('sukses','Mohon maaf harap hubungi orangtua tata usaha untuk melanjutkan pengeditan');
		redirect(base_url('orangtua/list_orangtua'));		
		}		
	}


	// Delete orangtua
	public function delete($id_orangtua) {
        
        if($this->session->userdata('level') == 'tu') { 
		
		$data = array('id_orangtua' => $id_orangtua);
		$this->orangtua_model->delete($data);		
		$this->session->set_flashdata('sukses','orangtua berhasil dihapus');
		redirect(base_url('orangtua/list_orangtua'));
		
		}else{
		
		$this->session->set_flashdata('sukses','Mohon maaf harap hubungi orangtua tata usaha untuk melanjutkan penghapusan');
		redirect(base_url('orangtua/list_orangtua'));		
		}
	}	
}