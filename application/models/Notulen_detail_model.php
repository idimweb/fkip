<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Notulen_detail_model extends CI_Model
{

  public $table = 'notulen_detail';
  public $id = 'id_not_detail';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  function list_data()
  {
    $this->db->select('*');
    $this->db->from('notulen');
    $this->db->order_by("agenda", "ASC");
    return $this->db->get();
  }

  function list_all()
  {
    $this->db->select('*');
    $this->db->from('notulen_detail');
    return $this->db->get();
  }

  function list_data_anggota()
  {
    $this->db->select('*');
    $this->db->from('peserta');
    return $this->db->get();
  }

  function list_data_peserta()
  {
    $this->db->select('*');
    $this->db->from('peserta');
    $this->db->where('id_anggota');
    return $this->db->get();
  }

  // ini query untuk menampilkan jumlah anggota

  // SELECT MONTH(date_created) AS bulan, 
  // COUNT(id_anggota) AS anggota,
  // COUNT(id_asistensi) AS asistensi,
  // COUNT(id_staf) AS staf,
  // COUNT(id_tamu) AS tamu,
  // COUNT(id_lainya) AS lainya
  // FROM notulen_detail
  // LEFT JOIN peserta
  // ON notulen_detail.id_not_detail=peserta.id_not_detail
  // GROUP BY MONTH(date_created);



  public function tampil_bulan_tahun()
  {
    $this->db->select("MONTH(tanggal_mulai) as bulan, YEAR(tanggal_mulai) as tahun, 
    SUM(jumlah) as jumlah_peserta, COUNT(*) as jumlah_bulanan");
    // $this->db->from("notulen_detail");
    $this->db->group_by("MONTH(tanggal_mulai)");
    $this->db->order_by("tahun", "ACS");
    $this->db->order_by("bulan", "ACS");
    return $this->db->get($this->table)->result();
    // return $this->db->get();
  }

  // tampil jumlah kegiatan perbulan berdasarkan bidang
  // SELECT *, MONTH(date_created), SUM(jumlah) 
  // FROM notulen_detail LEFT JOIN notulen ON notulen.id_notulen=notulen_detail.id_notulen WHERE agenda='umum' 
  // GROUP BY MONTH(date_created);



  // ini query per 3 bulan
  // SELECT COUNT(id_peserta) AS triwulan1, YEAR(date_created) FROM notulen_detail LEFT JOIN peserta 
  // ON notulen_detail.id_not_detail=peserta.id_not_detail WHERE date_created BETWEEN '2021-10-01' AND '2021-12-31';
  public function triwulan1()
  {
    // $this->db->query('SELECT MONTH(date_created) AS bulan, COUNT(id_anggota) AS anggota, COUNT(id_asistensi) AS asistensi, COUNT(id_staf) AS staf, COUNT(id_tamu) AS tamu, COUNT(id_lainya) AS lainya FROM notulen_detail LEFT JOIN peserta ON notulen_detail.id_not_detail=peserta.id_not_detail GROUP BY MONTH(date_created)');
    $this->db->select("COUNT(id_tamu) AS triwulan1, YEAR(date_created) AS tahun");
    // $this->db->from('notulen_detail');
    $this->db->join('peserta', 'notulen_detail.id_not_detail=peserta.id_not_detail', 'left');
    $this->db->where('date_created BETWEEN "2021-01-01" AND "2021-03-31"');
    return $this->db->get($this->table)->result();
  }

  public function triwulan2()
  {
    $this->db->select("COUNT(id_tamu) AS triwulan2, YEAR(date_created) AS tahun");
    $this->db->join('peserta', 'notulen_detail.id_not_detail=peserta.id_not_detail', 'left');
    $this->db->where('date_created BETWEEN "2021-04-01" AND "2021-06-30"');
    return $this->db->get($this->table)->result();
  }

  public function triwulan3()
  {
    $this->db->select("COUNT(id_tamu) AS triwulan3, YEAR(date_created) AS tahun");
    $this->db->join('peserta', 'notulen_detail.id_not_detail=peserta.id_not_detail', 'left');
    $this->db->where('date_created BETWEEN "2021-07-01" AND "2021-09-30"');
    return $this->db->get($this->table)->result();
  }

  public function triwulan4()
  {
    $this->db->select("COUNT(id_tamu) AS triwulan4, YEAR(date_created) AS tahun");
    $this->db->join('peserta', 'notulen_detail.id_not_detail=peserta.id_not_detail', 'left');
    $this->db->where('date_created BETWEEN "2021-10-01" AND "2021-11-31"');
    return $this->db->get($this->table)->result();
  }

  public function tampil_jumlah_peserta()
  {
    $this->db->select("*,MONTH(nd.tanggal_mulai) AS bulan, YEAR(nd.tanggal_mulai) as tahun,
    COUNT(p.id_anggota) AS anggota, 
    COUNT(p.id_asistensi) AS asistensi, 
    COUNT(p.id_lainya) AS lainya");
    $this->db->from('notulen_detail nd');
    $this->db->join('peserta p', 'nd.id_not_detail=p.id_not_detail', 'left');
    $this->db->group_by("MONTH(nd.tanggal_mulai)");
    $this->db->order_by("tahun", "ACS");
    $this->db->order_by("bulan", "ACS");
    return $this->db->get()->result();
  }

  function TampilPeserta($id)
  {
    $this->db->order_by('peserta.id_not_detail', 'DESC');
    $this->db->select('*');
    return $this->db->from('peserta')
      ->join('notulen_detail', 'peserta.id_not_detail=notulen_detail.id_not_detail')
      ->join('anggota', 'peserta.id_anggota=anggota.id_anggota', 'left')
      ->join('asistensi', 'peserta.id_asistensi=asistensi.id_asistensi', 'left')
      ->join('import', 'peserta.id_tamu=import.id', 'left')
      ->join('lainya', 'peserta.id_lainya=lainya.id_lainya', 'left')
      ->join('staf', 'peserta.id_staf=staf.id_staf', 'left')
      ->where('peserta.id_not_detail', $id)
      ->get()
      ->result();
  }

  // datatables
  function json()
  {
    $id = $this->input->post('id_notulen');
    $filter_by = $this->input->post('filter_by');

    if ($id == '') {
      return '{"draw":0,"recordsTotal":1,"recordsFiltered":1,"data":[]}';
    } else {
      $this->datatables->select('
            a.id_not_detail,
            a.id_notulen,
            a.issue,
            a.tanggal_mulai,
            a.tanggal_selesai,
            a.waktu_mulai,
            a.waktu_selesai,
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
      $this->datatables->join('notulen b', 'a.id_notulen = b.id_notulen', 'left');
      $this->datatables->join('login c', 'c.id_user = b.id_create', 'left');
      // $this->datatables->join('anggota d', 'd.id = b.id_notulen','left');
      // $this->datatables->join('asistensi e', 'e.id_asistensi = e.id_asistensi','left');
      if ($filter_by != '') {
        $this->datatables->where('a.status', $filter_by);
      }
      $this->datatables->where('a.id_notulen', $id);

      $this->datatables->add_column('action', anchor(site_url('notulen_detail/tampilDetail/$1'), '<i class="fa fa-book"></i>Baca', 'class="btn btn-info btn-xs edit"') . "  " . "<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Hapus</a> <a href='#' class='btn btn-warning btn-xs delete' onclick='javasciprt: return set_close($1)'><i class='fa fa-check'></i> Selesai </a>", 'id_not_detail');

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
  function total_rows($q = NULL)
  {
    $this->db->like('id_not_detail', $q);
    $this->db->or_like('id_notulen', $q);
    $this->db->or_like('issue', $q);
    $this->db->or_like('tanggal_mulai', $q);
    $this->db->or_like('tanggal_selesai', $q);
    $this->db->or_like('waktu_mulai', $q);
    $this->db->or_like('waktu_selesai', $q);
    $this->db->or_like('tempat', $q);
    $this->db->or_like('jenis_kegiatan', $q);
    $this->db->or_like('catatan', $q);
    $this->db->or_like('jumlah', $q);
    $this->db->or_like('status', $q);
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  // get data with limit and search
  function get_limit_data($limit, $start = 0, $q = NULL)
  {
    $this->db->order_by($this->id, $this->order);
    $this->db->like('id_not_detail', $q);
    $this->db->or_like('id_notulen', $q);
    $this->db->or_like('issue', $q);
    $this->db->or_like('tanggal_mulai', $q);
    $this->db->or_like('tanggal_selesai', $q);
    $this->db->or_like('waktu_mulai', $q);
    $this->db->or_like('waktu_selesai', $q);
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

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  // delete data
  function delete($id)
  {
    //   $this->db->where('pemohon.id_pemohon=user.id_user');
    // $this->db->where('pemohon.id_pemohon=peserta.id_peserta');
    // $this->db->where('pemohon.id_pemohon',$id);
    // $this->db->delete(array('pemohon','user','peserta'));
    $tables = array('notulen_detail', 'peserta');
    $qdata = $this->db->get_where('notulen_detail', array('id_not_detail' => $this->input->post('id_not_detail')));
    $cek_id = $qdata->row_array();
    unlink('assets/uploads/file/' . $cek_id['catatan']);
    unlink('assets/uploads/file/' . $cek_id['foto']);
    $this->db->where($this->id, $id);
    $this->db->delete($tables);
    // $this->db->where('notulen_detail.id_not_detail=peserta.id_not_detail');
    // $this->db->where($this->id, $id);
    // $this->db->delete(array($this->table,'peserta'));
  }


  function json_notulen()
  {
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
    $this->datatables->join('login b', 'a.id_create = b.id_user', 'left');
    $this->datatables->add_column('nama_user', '$1', 'nama');
    $this->datatables->add_column('action', "<button class='btn btn-success btn-xs add' onclick='javasciprt: return pilih_agenda($1)'><i class='fa fa-add'></i> + Pilih agenda</button>", 'id_notulen');
    return $this->datatables->generate();
  }

  function get_detail($id)
  {
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
    $this->db->where('a.id_notulen', $id);
    return $this->db->get();
  }
}
