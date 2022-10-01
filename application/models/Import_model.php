<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Import_model extends CI_Model {

      public $table = 'import';
      public $id = 'id';
      public $order = 'DESC';

        public function __construct()
        {
            parent::__construct();
            // $this->load->database();
        }

        // datatables
        function json() {
            $this->datatables->select('id,first_name,last_name,email,contact_no');
            $this->datatables->from('import');
            $this->datatables->add_column('action', "<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Hapus</a>", 'id');
            return $this->datatables->generate();
        }

          // get all
        function get_all()
        {
            $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        }

        // get data by id
        function get_by_id($id)
        {
            $this->db->where($this->id, $id);
            return $this->db->get($this->table)->row();
        }

        // get total rows
        function total_rows($q = NULL) {
            $this->db->like('id', $q);
            $this->db->or_like('first_name', $q);
            $this->db->or_like('last_name', $q);
            $this->db->or_like('email', $q);
          	$this->db->or_like('contact_no', $q);
          	$this->db->from($this->table);
            return $this->db->count_all_results();
        }

        // get data with limit and search
        function get_limit_data($limit, $start = 0, $q = NULL) {
            $this->db->order_by($this->id, $this->order);
            $this->db->like('id', $q);
            $this->db->or_like('first_name', $q);
            $this->db->or_like('last_name', $q);
            $this->db->or_like('email', $q);
          	$this->db->or_like('contact_no', $q);
          	$this->db->limit($limit, $start);
            return $this->db->get($this->table)->result();
        }

        // insert data
        function insertori($data)
        {
            $this->db->insert_batch('import', $data);
        }

        function insert($data)
        {
            $this->db->insert('import', $data);
        }

        // update data
        function update($id, $data)
        {
            $this->db->where($this->id, $id);
            $this->db->update($this->table, $data);
        }

        // delete data
        function delete($id)
        {
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);
        }


        public function importData($data) {

            $res = $this->db->insert_batch('import',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }

        }
    }
?>
