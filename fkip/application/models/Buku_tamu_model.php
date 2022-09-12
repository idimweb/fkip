<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku_tamu_model extends CI_Model
{

    public $table = 'buku_tamu';
    public $id = 'id_buku_tamu';
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_buku_tamu,penerima,keperluan,nama_peserta,instansi_peserta,no_hp_peserta,jabatan_peserta,tanggal');
        $this->datatables->from('buku_tamu');
        if($this->session->level =='admin'):
        $this->datatables->add_column('action', anchor(site_url('buku_tamu/detail/$1'),'<i class="fa fa-book"></i>Baca','class="btn btn-info btn-xs edit"')."  ".anchor(site_url('buku_tamu/edit/$1'),'<i class="fa fa-edit"></i> Ubah','class="btn btn-success btn-xs edit"')."<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Hapus</a>", 'id_buku_tamu');
      else:
        $this->datatables->add_column('action', anchor(site_url('buku_tamu/detail/$1'),'<i class="fa fa-book"></i>Baca','class="btn btn-info btn-xs edit"'), 'id_buku_tamu');
      endif;
        return $this->datatables->generate();
    }

    function json_checkbox() {
        $this->datatables->select('a.id_anggota,a.nama,a.jabatan,a.nohp,a.email');
        $this->datatables->from('anggota a');
  //      $this->datatables->
        //add this line for join
        // $this->datatables->join('divisi b', 'b.id_divisi=a.id_divisi','left');
        $this->datatables->add_column('foto_user','<img src="'.base_url('assets/img/foto/$1').'" style="with:100px;height:100px">','foto');
        $this->datatables->add_column('action',"<input type='checkbox' id='id_anggota' name='id_anggota[]' value='$1' />",'id_anggota');
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
        $this->db->like('id_buku_tamu', $q);
      	$this->db->or_like('penerima', $q);
      	$this->db->or_like('keperluan', $q);
      	$this->db->or_like('nama_peserta', $q);
        $this->db->or_like('instansi_peserta', $q);
        $this->db->or_like('no_hp_peserta', $q);
        $this->db->or_like('jabatan_peserta', $q);
      	$this->db->or_like('tanggal', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_buku_tamu', $q);
        $this->db->or_like('penerima', $q);
        $this->db->or_like('keperluan', $q);
        $this->db->or_like('nama_peserta', $q);
        $this->db->or_like('instansi_peserta', $q);
        $this->db->or_like('no_hp_peserta', $q);
        $this->db->or_like('jabatan_peserta', $q);
        $this->db->or_like('tanggal', $q);
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
