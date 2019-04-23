<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Siswa_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Siswa
        public function listing($kelas=false) {
            $this->db->select('siswa.id_siswa,
                                siswa.nis,
                                siswa.nama_depan,
                                siswa.nama_belakang,
                                siswa.wali,
                                siswa.no_hp,
                                siswa.agama,
                                siswa.id_kelas,
                                siswa.foto,
                                siswa.alamat,
                                kelas.kelas,
                                ');
            $this->db->from('siswa');
            // Join dengan satu tabel
            $this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','LEFT'); 
            if($kelas){
                $this->db->where('siswa.id_kelas', $kelas);
            }                       
            //$this->db->join('absensi','absensi.id_siswa = siswa.id_siswa','LEFT');                        
            $this->db->order_by('siswa.id_siswa');
            $query = $this->db->get();
            return $query->result_array();
        }  


        // Ambil Siswa
        public function ambil_kelas() {
            $this->db->select('siswa.id_kelas,
                                ');
            $this->db->from('siswa');
            // Join dengan satu tabel
            $this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','LEFT');                        
            $this->db->join('absensi','absensi.id_siswa = siswa.id_siswa','LEFT');                        
            $this->db->order_by('siswa.id_siswa');
            $query = $this->db->get();
            return $query->result_array();
        }  


        // Tambah Siswa
        public function create($data) {
            $this->db->insert('siswa',$data);
        }
        
        // Edit Siswa
        public function edit($data) {
            $this->db->where('id_siswa',$data['id_siswa']);
            $this->db->update('siswa',$data);
        }

        // Edit Siswa
        public function edit_siswa($update_siswa) {
            $this->db->where('id_siswa',$update_siswa['id_siswa']);
            $this->db->update('siswa',$update_siswa);
        }           

        // Hapus Siswa
        public function delete($data) {
            $this->db->where('id_siswa',$data['id_siswa']);
            $this->db->delete('siswa',$data);
        }   

        // Detail Siswa
        public function detail($id_siswa) {
            $this->db->select('*');
            $this->db->from('siswa');
            $this->db->where('id_siswa',$id_siswa);
            $this->db->order_by('id_siswa','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }    

        // Jumlah Siswa
        public function jumlah_siswa() {
            $query = $this->db->get('siswa');
            return $query->num_rows();  
        }   

        public function view()
        {
            $sql = "SELECT * FROM siswa, kelas
                    WHERE siswa.id_kelas=kelas.id_kelas";
            
            return $this->db->query($sql);
        }                      


    }