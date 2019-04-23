<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Absensi_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Absensi
        public function listing($siswa=false) {
            $this->db->select('*');
            $this->db->from('absensi');
            // Join dengan satu tabel
            $this->db->join('siswa','siswa.id_siswa = absensi.id_siswa','LEFT');  
            if($siswa){
                $this->db->where('siswa.id_kelas', $siswa);
            }                        
            $this->db->order_by('id_absensi');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Pertanggal
        public function pertanggal() {
            $this->db->select('*');
            $this->db->from('absensi');
            $this->db->group_by('tanggal');
            $this->db->order_by('tanggal','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }
        public function siswa_hadir($pertanggal) {
            $this->db->select('*');
            $this->db->from('absensi');
            $this->db->where(array( 'tanggal'    => $pertanggal,
                                    'keterangan' => 'Hadir'));
            $this->db->order_by('tanggal','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }
        public function siswa_dispensasi($pertanggal) {
            $this->db->select('*');
            $this->db->from('absensi');
            $this->db->where(array( 'tanggal'    => $pertanggal,
                                    'keterangan' => 'Dispensasi'));
            $this->db->order_by('tanggal','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function siswa_alfa($pertanggal) {
            $this->db->select('*');
            $this->db->from('absensi');
            $this->db->where(array( 'tanggal'    => $pertanggal,
                                    'keterangan' => 'Alfa'));
            $this->db->order_by('tanggal','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }        
        public function siswa_izin($pertanggal) {
            $this->db->select('*');
            $this->db->from('absensi');
            $this->db->where(array( 'tanggal'    => $pertanggal,
                                    'keterangan' => 'Izin'));
            $this->db->order_by('tanggal','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }        
        public function siswa_sakit($pertanggal) {
            $this->db->select('*');
            $this->db->from('absensi');
            $this->db->where(array( 'tanggal'    => $pertanggal,
                                    'keterangan' => 'Sakit'));
            $this->db->order_by('tanggal','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }            
                

        // Tambah Absensi
        public function create($data) {
            $this->db->insert('absensi', $data);

        }      
        
        // Edit Absensi
        public function edit($data) {
            $this->db->where('id_absensi',$data['id_absensi']);
            $this->db->update('absensi',$data);
        }

        // Edit Siswa Absensi
        public function edit_siswa($data) {
            $this->db->where('id_absensi',$data['id_absensi']);      
            $this->db->update('absensi',$data);
        }           

        // Hapus Absensi
        public function delete($data) {
            $this->db->where('tanggal',$data['tanggal']);
            $this->db->delete('absensi',$data); 
        }   

        // Hapus Absensi
        public function delete_siswa($data) {
            $this->db->where('id_siswa',$data['id_siswa']);
            $this->db->delete('absensi',$data); 
        }           

        // Detail Absensi
        public function detail($id_absensi) {
            $this->db->select('*');
            $this->db->from('absensi');
            $this->db->join('siswa','siswa.id_siswa = absensi.id_siswa','LEFT');                                                
            $this->db->where('id_absensi',$id_absensi);
            $this->db->order_by('id_absensi','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Detail Siswa Absensi
        public function detail_siswa($id_siswa) {
            $this->db->select('*');
            $this->db->from('absensi');
            $this->db->join('siswa','siswa.id_siswa = absensi.id_siswa','LEFT');                                    
            $this->db->where('absensi.id_siswa',$id_siswa);
            $this->db->order_by('absensi.id_siswa','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }           

        // Absen berdasarkan tanggal
        public function ambil_tanggal($pertanggal){
            $this->db->select('*');
            $this->db->join('siswa','siswa.id_siswa = absensi.id_siswa','LEFT');                        
            $data = array();
            $this->db->where('tanggal',$pertanggal);
            $Q = $this->db->get('absensi');
                if ($Q->num_rows() > 0){
                    foreach ($Q->result_array() as $row){
            $data[] = $row;
                    }
                }
            $Q->free_result();
            return $data;
        }

        // Absensi Saya
        public function absen_saya($id_siswa){
            $this->db->select('*');
            $this->db->join('siswa','siswa.id_siswa = absensi.id_siswa','LEFT');
            $this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','LEFT');
            $data = array();
            $this->db->where('absensi.id_siswa',$id_siswa);
            $Q = $this->db->get('absensi');
                if ($Q->num_rows() > 0){
                    foreach ($Q->result_array() as $row){
            $data[] = $row;
                    }
                }
            $Q->free_result();
            return $data;
        }  

        // Lihat Semua Tanggal
        public function lihat_semua_tanggal() {
	        $this->db->select('*');
	        $this->db->from('absensi');
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            return $query->result();
	        } else {
	            return false;
	        }
    	} 

        // Ambil diantara tanggal
	    public function ambil_diantara_tanggal($data) {
	        $condition = "tanggal  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
	        $this->db->select('*');
	        $this->db->from('absensi');
            $this->db->join('siswa','siswa.id_siswa = absensi.id_siswa','LEFT');	        
	        $this->db->where($condition);
            $this->db->order_by('tanggal','ASC');	        
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            return $query->result();
	        } else {
	            return false;
	        }
	    }               

    }