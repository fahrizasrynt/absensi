<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kelas_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Kelas
        public function listing() {
            $this->db->select('*');
            $this->db->from('kelas');  
            $query = $this->db->get();
            return $query->result_array();
        }  

        // Tambah Kelas
        public function create($data) {
            $this->db->insert('kelas',$data);
        }
        
        // Edit Kelas
        public function edit($data) {
            $this->db->where('id_kelas',$data['id_kelas']);
            $this->db->update('kelas',$data);
        }   

        // Hapus Kelas
        public function delete($data) {
            $this->db->where('id_kelas',$data['id_kelas']);
            $this->db->delete('kelas',$data);
        }   

        // Detail Kelas
        public function detail($id_kelas) {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->where('id_kelas',$id_kelas);
            $this->db->order_by('id_kelas','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }

        // Jumlah Transaksi
        public function jumlah_kelas() {
            $query = $this->db->get('kelas');
            return $query->num_rows();  
        }                      

    }