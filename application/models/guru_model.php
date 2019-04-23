<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class guru_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Admin
        public function listing() {
            $this->db->select('*');
            $this->db->from('guru');  
            $query = $this->db->get();
            return $query->result_array();
        }  

        // Tambah Admin
        public function create($data) {
            $this->db->insert('guru',$data);
        }
        
        // Edit Admin
        public function edit($data) {
            $this->db->where('id_guru',$data['id_guru']);
            $this->db->update('guru',$data);
        }   

        // Hapus Admin
        public function delete($data) {
            $this->db->where('id_guru',$data['id_guru']);
            $this->db->delete('guru',$data);
        }   

        // Detail Admin
        public function detail($id_guru) {
            $this->db->select('*');
            $this->db->from('guru');
            $this->db->where('id_guru',$id_guru);
            $this->db->order_by('id_guru','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }  

        // Jumlah Admin
        public function jumlah_guru() {
            $query = $this->db->get('guru');
            return $query->num_rows();  
        }              

    }