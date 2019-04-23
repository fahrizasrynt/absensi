<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {


	// Main Page
	public function index($siswa=false){

		$absensi = $this->absensi_model->listing();
		$siswa   = $this->siswa_model->listing();
		$site	 = $this->konfigurasi_model->listing();
		$pertanggal = $this->absensi_model->pertanggal();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('tanggal','Tanggal','required|is_unique[absensi.tanggal]',
			array(	'required'	=> 'Tanggal harus diisi',
					'is_unique'	=> 'Mohon maaf, tanggal <strong>'.$this->input->post('tanggal').
									'</strong> absensi sudah ada.'));
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'		=> 'Daftar Absensi - '.$site['nama_web'],
						'absensi'	=> $absensi,
						'siswa'		=> $siswa,
						'pertanggal'=> $pertanggal,
						'isi'		=> 'guru/absensi/daftar_absensi');
		$this->load->view('guru/layout/wrapper',$data);
		}else{
			$i = $this->input;	
			$x = 0;

	        $tanggal 	= $this->input->post('tanggal');
	        $kelas 	= $this->input->post('id_kelas');
	        $id_siswa 	= $this->input->post('id_siswa');
	        $keterangan 	= $this->input->post('keterangan');
	        print_r ($_POST);
	        echo count ($_POST['id_siswa']);

			for($a=0; $a<count($_POST['id_siswa']); $a++) {
				
			

				$data = array(	'id_siswa'		=>$_POST['id_siswa'][$a],
								'tanggal'		=> $tanggal,
								'keterangan'	=> $_POST['keterangan'][$a],
								'id_kelas'		=> $kelas,
								);
				$this->absensi_model->create($data);
				echo $_POST['id_siswa'][$x];
				$x++;
			}
				
			$this->session->set_flashdata('sukses','Absensi telah diupdate');
			redirect(base_url('guru/absensi'));
		}
	}

	// Edit Siswa Absensi
	public function edit($id_absensi) {
		
		$siswa = $this->absensi_model->detail($id_absensi);
		$site  = $this->konfigurasi_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_depan','Nama Depan','required');
		$valid->set_rules('keterangan','Keterangan','required');

		if($valid->run() === FALSE) {
		
		$data = array(	'title'	 	=> 'Edit Siswa -'.$site['nama_web'],
						'siswa'		=> $siswa,
						'site'		=> $site,
						'isi'		=> 'guru/absensi/edit_siswa');
		$this->load->view('guru/layout/wrapper',$data);
		}else{
			
			$i = $this->input;

			$data = array(	'id_absensi'=> $siswa['id_absensi'],
							'keterangan'=> $i->post('keterangan'),
						);
			$this->absensi_model->edit($data);		
			$this->session->set_flashdata('sukses','Siswa berhasil diedit');
			redirect(base_url('guru/absensi'));
		}
	}


	// Pertanggal
	public function pertanggal() {
		$tanggal = $this->absensi_model->pertanggal();
		foreach($tanggal as $tanggal) {
			echo date('F d Y',strtotime($tanggal['tanggal'])).'<br>';
		}
	}


    // Lihat Diantara Tanggal
    public function lihat_tanggal(){
       $result = $this->absensi_model->lihat_semua_tanggal();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        } 
    }


	// Mengurutkan Diantara Tanggal
    public function laporan() {
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $data = array(
            'date1' => $date1,
            'date2' => $date2
        );
        if ($date1 == "" || $date2 == "") {
            $data['date_range_error_message'] = "Both date fields are required";
        } else {
            $result = $this->absensi_model->ambil_diantara_tanggal($data);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        }
        $data['show_table'] = $this->lihat_tanggal();
        $data['title'] = 'Laporan pertanggal';
        $data['isi']  = 'guru/absensi/diantara_tanggal';

        $this->load->view('guru/layout/wrapper', $data);
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
			<h1>Laporan Absensi</h1>
			<br />
			<table border="1">
				<tr bgcolor="black" style="color: white;" align="center">
							<th>NIS</th>
						   <th>Nama Siswa</th>
						   <th>Kelas</th>
						   <th>Tanggal</th>
						   <th>Keterangan</th>
				</tr>';
			
			$i = 1;
			
			$result = $this->session->userdata('result');
			foreach ($result as $value) 	:			
			
			$html .= '
				<tr>
					<td align="center">'.$value->nis.'</td>
					<td align="center">'.$value->nama_depan.' '.$value->nama_belakang.'</td>
					<td align="center">'.$value->kelas.'</td>
					<td align="center">'.$value->tanggal.'</td>
					<td align="center">'.$value->keterangan.'</td>
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
		$this->load->view("guru/absensi/laporan_excel");
	}


	// Edit Absen
	public function view($pertanggal) {
		$this->load->model('kelas_model');
		$absen = $this->absensi_model->ambil_tanggal($pertanggal);
		$site  = $this->konfigurasi_model->listing();

		$data = array(	'title'	 	=> 'View Absensi - '.$site['nama_web'],
						'absen'		=> $absen,
						'site'		=> $site,
						'isi'		=> 'guru/absensi/view_absensi');
		$this->load->view('guru/layout/wrapper',$data);
	}	

	


	// Delete Siswa Absensi
	public function delete_siswa($id_siswa) {
		$data = array('id_siswa' => $id_siswa);
		$this->absensi_model->delete_siswa($data);		
		$this->session->set_flashdata('sukses','Siswa berhasil dihapus');
		redirect(base_url('guru/absensi'));
	}	


	// Delete Absensi
	public function delete($pertanggal) {
		$data = array('tanggal' => $pertanggal);
		$this->absensi_model->delete($data);		
		$this->session->set_flashdata('sukses','Absensi berhasil dihapus');
		redirect(base_url('guru/absensi'));
	}
	public function absen() {
		
		$site	= $this->konfigurasi_model->listing();
		$kelas	= $this->kelas_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('kelas','Kelas','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Absen Siswa - '.$site['nama_web'],
						'kelas'	=> $kelas,
						'isi'	=> 'guru/absensi/kelas_absensi');
		$this->load->view('guru/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$slug = url_title($this->input->post('kelas'), 'dash', TRUE);			
			$data = array(	'slug_kelas'=> $slug,			
							'kelas'		=> $i->post('kelas'),
							'urutan'	=> $i->post('urutan'),
						);
			$this->kelas_model->create($data);		
			$this->session->set_flashdata('sukses','Kelas berhasil ditambah');
			redirect(base_url('guru/kelas'));
		}
	}
	// Ngabsen siswa
	public function absensiswa($kelas=false){

		$site = $this->konfigurasi_model->listing();
		$siswa = $this->siswa_model->listing($kelas);

		$data = array ( 'title' => 'Daftar Siswa - '.$site['nama_web'],
						'siswa' => $siswa,
						'isi' 	=> 'guru/absensi/daftar_siswa_absensi',
						'kelas' => $kelas);
		$this->load->view('guru/layout/wrapper',$data);
	}

	// Pilah absen perkelas
	public function absenperkelas($kelas=false){
		
		$site	= $this->konfigurasi_model->listing();
		$kelas	= $this->kelas_model->listing();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('kelas','Kelas','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Absen Siswa - '.$site['nama_web'],
						'kelas'	=> $kelas,
						'isi'	=> 'guru/absensi/absensi_perkelas');
		$this->load->view('guru/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$slug = url_title($this->input->post('kelas'), 'dash', TRUE);			
			$data = array(	'slug_kelas'=> $slug,			
							'kelas'		=> $i->post('kelas'),
							'urutan'	=> $i->post('urutan'),
						);
			$this->kelas_model->create($data);		
			$this->session->set_flashdata('sukses','Kelas berhasil ditambah');
			redirect(base_url('guru/kelas'));
		}
	}

	// Ngabsen siswa
	public function lihatabsensiswa($kelas=false){

		$site = $this->konfigurasi_model->listing();
		$siswa = $this->siswa_model->listing($kelas);
		$pertanggal = $this->absensi_model->pertanggal();
		$pertanggal = $this->absensi_model->siswa_sakit();
		$data = array ( 'title' => 'Daftar Siswa - '.$site['nama_web'],
						'siswa' => $siswa,
						'isi' 	=> 'guru/absensi/daftar_siswa_absensi2',
						'kelas' => $kelas);
		$this->load->view('guru/layout/wrapper',$data);
	}

}