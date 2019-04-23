<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class orangtua_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing orangtua
        public function listing() {
            $this->db->select('*');
            $this->db->from('orangtua');  
            $query = $this->db->get();
            return $query->result_array();
        }  

        // Tambah orangtua
        public function create($data) {
            $this->db->insert('orangtua',$data);
        }
        
        // Edit orangtua
        public function edit($data) {
            $this->db->where('id_orangtua',$data['id_orangtua']);
            $this->db->update('orangtua',$data);
        }   

        // Hapus orangtua
        public function delete($data) {
            $this->db->where('id_orangtua',$data['id_orangtua']);
            $this->db->delete('orangtua',$data);
        }   

        // Detail orangtua
        public function detail($id_orangtua) {
            $this->db->select('*');
            $this->db->from('orangtua');
            $this->db->where('id_orangtua',$id_orangtua);
            $this->db->order_by('id_orangtua','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }    

        // Jumlah orangtua
        public function jumlah_orangtua() {
            $query = $this->db->get('orangtua');
            return $query->num_rows();  
        }  

        // Laporan
        public function view()
        {
            $sql = "SELECT * FROM orangtua";
            
            return $this->db->query($sql);
        }                          

    }