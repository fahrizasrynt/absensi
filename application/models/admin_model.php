<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class admin_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Admin
        public function listing() {
            $this->db->select('*');
            $this->db->from('admin');  
            $query = $this->db->get();
            return $query->result_array();
        }  

        // Tambah Admin
        public function create($data) {
            $this->db->insert('admin',$data);
        }
        
        // Edit Admin
        public function edit($data) {
            $this->db->where('id_admin',$data['id_admin']);
            $this->db->update('admin',$data);
        }   

        // Hapus Admin
        public function delete($data) {
            $this->db->where('id_admin',$data['id_admin']);
            $this->db->delete('admin',$data);
        }   

        // Detail Admin
        public function detail($id_admin) {
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('id_admin',$id_admin);
            $this->db->order_by('id_admin','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }  

        // Jumlah Admin
        public function jumlah_admin() {
            $query = $this->db->get('admin');
            return $query->num_rows();  
        }              

    }