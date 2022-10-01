<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota_model extends CI_Model
{

    public $table = 'anggota';
    public $id = 'id_anggota';
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_anggota,nama,jabatan,nohp,email');
        $this->datatables->from('anggota');
        //      $this->datatables->
        //add this line for join
        // $this->datatables->join('divisi b', 'b.id_divisi=a.id_divisi','left');
        $this->datatables->add_column('foto_user', '<img src="' . base_url('assets/img/foto/$1') . '" style="with:100px;height:100px">', 'foto');
        $this->datatables->add_column('action', anchor(site_url('anggota/edit/$1'), '<i class="fa fa-edit"></i> Ubah', 'class="btn btn-success btn-xs edit"') . "<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Hapus</a>", 'id_anggota');
        return $this->datatables->generate();
    }

    // lihat aktivitas berdasarkan id anggota
    public function aktiv_anggota($id)
    {
        $this->db->select("*,anggota.nama, MONTH(notulen_detail.date_created) as bulan, COUNT(peserta.id_anggota) as jumlah");
        $this->db->from('peserta');
        $this->db->join('anggota', 'anggota.id_anggota=peserta.id_anggota');
        $this->db->join('notulen_detail', 'notulen_detail.id_not_detail=peserta.id_not_detail');
        $this->db->where('peserta.id_anggota', $id);
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
    }
    // SELECT anggota.nama, MONTH(notulen_detail.date_created), COUNT(peserta.id_anggota)
    // FROM peserta
    // INNER JOIN anggota ON anggota.id_anggota=peserta.id_anggota
    // INNER JOIN notulen_detail ON notulen_detail.id_not_detail=peserta.id_not_detail
    // WHERE peserta.id_anggota=10
    // GROUP BY MONTH(notulen_detail.date_created);

    function json_checkbox()
    {
        $this->datatables->select('a.id_anggota,a.nama,a.jabatan,a.nohp,a.email');
        $this->datatables->from('anggota a');
        //      $this->datatables->
        //add this line for join
        // $this->datatables->join('divisi b', 'b.id_divisi=a.id_divisi','left');
        $this->datatables->add_column('foto_user', '<img src="' . base_url('assets/img/foto/$1') . '" style="with:100px;height:100px">', 'foto');
        $this->datatables->add_column('action', "<input type='checkbox' id='id_anggota' name='id_anggota[]' value='$1' />", 'id_anggota');
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
        $this->db->like('id_anggota', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('jabatan', $q);
        $this->db->or_like('nohp', $q);
        $this->db->or_like('email', $q);
        // $this->db->or_like('foto', $q);
        // $this->db->or_like('level', $q);
        // $this->db->or_like('active', $q);
        // $this->db->or_like('date_create', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_anggota', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('jabatan', $q);
        $this->db->or_like('nohp', $q);
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
