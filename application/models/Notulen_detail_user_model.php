<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notulen_detail_user_model extends CI_Model
{

    public $table = 'notulen_detail';
    public $id = 'id_not_detail';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function list_data(){
      $this->db->select('*');
      $this->db->from('notulen');
      return $this->db->get();
    }

    function TampilPeserta($id)
    {
        $this->db->order_by('peserta.id_not_detail', 'DESC');
        return $this->db->from('peserta')
        ->join('notulen_detail', 'peserta.id_not_detail=notulen_detail.id_not_detail')
        ->join('anggota', 'peserta.id_anggota=anggota.id_anggota')
        ->join('asistensi', 'peserta.id_asistensi=asistensi.id_asistensi','left')
        ->join('import', 'peserta.id_tamu=import.id','left')
        ->join('lainya', 'peserta.id_lainya=lainya.id_lainya','left')
          ->where('peserta.id_not_detail',$id)
          ->get()
          ->result();
    }

    // datatables
    function json() {
        $id = $this->input->post('id_notulen');
        $filter_by = $this->input->post('filter_by');

        if ($id == '') {
            return '{"draw":0,"recordsTotal":1,"recordsFiltered":1,"data":[]}';
        }else{
        $this->datatables->select('
            a.id_not_detail,
            a.id_notulen,
            a.issue,
            a.tanggal_mulai,
            a.tanggal_selesai,
            a.waktu_mulai,
            a.waktu_selesai,
            a.id_anggota,
            a.id_asistensi,
            a.tamu,
            a.lainya,
            a.tempat,
            a.jenis_kegiatan,
            a.catatan,
            a.jumlah,
            a.status,


            b.id_notulen,
            b.agenda,
            b.id_create,
            b.start_time,
            b.end_time,
            b.place,
            b.participan,
            b.date_create,

            c.id_user,
            c.nama,
            c.email,
            c.level,
            c.active,
            c.date_create,
            c.log,


            ');
        $this->datatables->from('notulen_detail a');
        $this->datatables->join('notulen b', 'a.id_notulen = b.id_notulen','left');
        $this->datatables->join('login c', 'c.id_user = b.id_create','left');
        // $this->datatables->join('anggota d', 'd.id = b.id_notulen','left');
        // $this->datatables->join('asistensi e', 'e.id_asistensi = e.id_asistensi','left');
        if ($filter_by != '') {
         $this->datatables->where('a.status',$filter_by);
        }
        $this->datatables->where('a.id_notulen',$id);
        if($this->session->level =='admin'):
        else:
           $this->datatables->add_column('action', anchor(site_url('notulen_detail_user/tampilDetail/$1'),'<i class="fa fa-book"></i>Read','class="btn btn-info btn-xs edit"'),'id_not_detail');
        endif;
       return $this->datatables->generate();
      }
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
        $this->db->like('id_not_detail', $q);
      	$this->db->or_like('id_notulen', $q);
      	$this->db->or_like('issue', $q);
        $this->db->or_like('tanggal_mulai', $q);
        $this->db->or_like('tanggal_selesai', $q);
        $this->db->or_like('waktu_mulai', $q);
      	$this->db->or_like('waktu_selesai', $q);
        $this->db->or_like('id_anggota', $q);
        $this->db->or_like('id_asistensi', $q);
        $this->db->or_like('tamu', $q);
        $this->db->or_like('lainya', $q);
        $this->db->or_like('tempat', $q);
        $this->db->or_like('jenis_kegiatan', $q);
        $this->db->or_like('catatan', $q);
      	$this->db->or_like('jumlah', $q);
      	$this->db->or_like('status', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_not_detail', $q);
      	$this->db->or_like('id_notulen', $q);
      	$this->db->or_like('issue', $q);
        $this->db->or_like('tanggal_mulai', $q);
        $this->db->or_like('tanggal_selesai', $q);
        $this->db->or_like('waktu_mulai', $q);
      	$this->db->or_like('waktu_selesai', $q);
        $this->db->or_like('id_anggota', $q);
        $this->db->or_like('id_asistensi', $q);
        $this->db->or_like('tamu', $q);
        $this->db->or_like('lainya', $q);
        $this->db->or_like('tempat', $q);
        $this->db->or_like('jenis_kegiatan', $q);
        $this->db->or_like('catatan', $q);
      	$this->db->or_like('jumlah', $q);
      	$this->db->or_like('status', $q);
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


    function json_notulen(){
        $this->datatables->select('
          a.id_notulen,
          a.agenda,
          a.id_create,
          a.start_time,
          a.end_time,
          a.place,
          a.participan,
          a.date_create,

          b.id_user,
          b.nama,
          b.email,
          b.level,
          b.active,
          b.date_create,
          b.log

            ');
        $this->datatables->from('notulen a');
        $this->datatables->join('login b', 'a.id_create = b.id_user','left');
        $this->datatables->add_column('nama_user','$1','nama');
        $this->datatables->add_column('action',"<button class='btn btn-success btn-xs add' onclick='javasciprt: return pilih_agenda($1)'><i class='fa fa-add'></i> + Pilih agenda</button>",'id_notulen');
        return $this->datatables->generate();
    }

    //json peserta
    // function json_peserta(){
    //     $this->datatables->select('
    //       a.id_notulen,
    //       a.agenda,
    //       a.id_create,
    //       a.start_time,
    //       a.end_time,
    //       a.place,
    //       a.participan,
    //       a.date_create,
    //
    //       b.id,
    //       b.nama,
    //       b.jabatan,
    //       b.nohp,
    //       b.email,
    //
    //         ');
    //     $this->datatables->from('notulen a');
    //     $this->datatables->join('anggota b', 'b.id = a.id_notulen','left');
    //     $this->datatables->add_column('nama_user','$1','nama');
    //     $this->datatables->add_column('action',"<input type='checkbox' name='agree' value='1' />",'id_notulen');
    //     return $this->datatables->generate();
    // }
    //
    // //json asistensi
    // function json_asistensi(){
    //     $this->datatables->select('
    //       a.id_notulen,
    //       a.agenda,
    //       a.id_create,
    //       a.start_time,
    //       a.end_time,
    //       a.place,
    //       a.participan,
    //       a.date_create,
    //
    //       b.id_asistensi,
    //       b.nama,
    //       b.bidang,
    //       b.nohp,
    //       b.email,
    //
    //         ');
    //     $this->datatables->from('notulen a');
    //     $this->datatables->join('asistensi b', 'b.id_asistensi = a.id_notulen','left');
    //     $this->datatables->add_column('nama_user','$1','nama');
    //     $this->datatables->add_column('action',"<input type='checkbox' name='agree' value='1' />",'id_notulen');
    //     return $this->datatables->generate();
    // }

    function get_detail($id){
        $this->db->select('
                        a.id_not_detail,
                        a.id_notulen,
                        a.issue,
                        a.PIC,
                        a.due_dete,
                        a.status,
                        a.remarks,
            ');
        $this->db->from('notulen_detail a');
        $this->db->where('a.id_notulen',$id);
        return $this->db->get();
    }
}
