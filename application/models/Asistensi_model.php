<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asistensi_model extends CI_Model
{

    public $table = 'asistensi';
    public $id = 'id_asistensi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_asistensi,nama_asistensi,bidang,prodi,email');
        $this->datatables->from('asistensi');
        //add this line for join
        //$this->datatables->join('table2', 'asistensi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('asistensi/edit/$1'), '<i class="fa fa-edit"></i> Ubah', 'class="btn btn-success btn-xs edit"') . "<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Hapus</a>", 'id_asistensi');
        return $this->datatables->generate();
    }

    public function aktiv_asistensi($id)
    {
        $this->db->select("*,asistensi.nama_asistensi, MONTH(notulen_detail.date_created) as bulan, COUNT(peserta.id_asistensi) as jumlah");
        $this->db->from('peserta');
        $this->db->join('asistensi', 'asistensi.id_asistensi=peserta.id_asistensi');
        $this->db->join('notulen_detail', 'notulen_detail.id_not_detail=peserta.id_not_detail');
        $this->db->where('peserta.id_asistensi', $id);
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
    }

    function json_checkbox()
    {
        $this->datatables->select('id_asistensi,nama_asistensi,bidang,prodi,email');
        $this->datatables->from('asistensi');
        //add this line for join
        //$this->datatables->join('table2', 'asistensi.field = table2.field');
        $this->datatables->add_column('action', "<input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='$1' />", 'id_asistensi');
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
    function total_rows($q = NULL)
    {
        $this->db->like('id_asistensi', $q);
        $this->db->or_like('nama_asistensi', $q);
        $this->db->or_like('bidang', $q);
        $this->db->or_like('prodi', $q);
        $this->db->or_like('email', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_asistensi', $q);
        $this->db->or_like('nama_asistensi', $q);
        $this->db->or_like('bidang', $q);
        $this->db->or_like('prodi', $q);
        $this->db->or_like('email', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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
}
