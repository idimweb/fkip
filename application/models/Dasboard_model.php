<?php

class Dasboard_model extends CI_model
{
    function grafik_by_agenda()
    {
        $this->db->select('
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
           b.log,

           c.id_not_detail,
           c.id_notulen,
           c.issue,
           c.waktu_mulai,
           sum(c.status = "Y") as closed,
           sum(c.status = "N") as open,
           c.date_created');

        $this->db->from('notulen_detail c');
        $this->db->join('notulen a', 'a.id_notulen=c.id_notulen', 'left');
        $this->db->join('login b', 'a.id_create = b.id_user', 'left');
        $this->db->group_by('c.date_created');
        return $this->db->get();
    }

    public function grafik_total()
    {
        $this->db->select("*,MONTH(date_created) as bulan, YEAR(date_created) as tahun, 
        SUM(jumlah) as jumlah_peserta, COUNT(*) as jumlah_kegiatan");
        $this->db->from("notulen_detail");
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
    }

    public function grafik_umum()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='umum'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }

    public function grafik_aik()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='AIK, PTKIM dan Kemahasiswaan'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }

    public function grafik_litbang()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='Litbang dan Pengembangan Usaha'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }
    public function grafik_akademik()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='Akademik, Penjaminan Mutu, SDM dan Kerja Sama Luar Negeri'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }

    public function grafik_riset()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='Riset, PPM, dan Publikasi'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }

    public function grafik_khusus()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='Rapat Harian Majelis Diktilitbang PP Muhammadiyah'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }

    public function grafik_kerjasama()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='Keuangan'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }

    public function grafik_ptki()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='Rapat Pleno Majelis Diktilitbang PP Muhammadiyah'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }

    public function grafik_bukutamu()
    {
        $this->db->select("*, MONTH(date_created) as bulan, SUM(jumlah) as jumlah_peserta");
        $this->db->from('notulen_detail');
        $this->db->join("notulen", "notulen.id_notulen=notulen_detail.id_notulen");
        $this->db->where("agenda='Buku Tamu'");
        $this->db->group_by("MONTH(date_created)");
        return $this->db->get();
        // return $this->db->get($this->table)->result();
    }


    public function triwulan1()
    {
        // $this->db->query('SELECT MONTH(date_created) AS bulan, COUNT(id_anggota) AS anggota, COUNT(id_asistensi) AS asistensi, COUNT(id_staf) AS staf, COUNT(id_tamu) AS tamu, COUNT(id_lainya) AS lainya FROM notulen_detail LEFT JOIN peserta ON notulen_detail.id_not_detail=peserta.id_not_detail GROUP BY MONTH(date_created)');
        $this->db->select("COUNT(id_tamu) AS triwulan1, YEAR(date_created) AS tahun");
        // $this->db->from('notulen_detail');
        $this->db->from('notulen_detail');
        $this->db->join('peserta', 'notulen_detail.id_not_detail=peserta.id_not_detail', 'left');
        // $this->db->group_by("YEAR(date_created)");
        $this->db->where('date_created BETWEEN "2021-01-01" AND "2021-03-31"');
        return $this->db->get();
    }

    public function triwulan2()
    {
        $this->db->select("COUNT(id_tamu) AS triwulan2, YEAR(date_created) AS tahun");
        $this->db->from('notulen_detail');
        $this->db->join('peserta', 'notulen_detail.id_not_detail=peserta.id_not_detail', 'left');
        // $this->db->group_by("YEAR(date_created)");
        $this->db->where('date_created BETWEEN "2021-04-01" AND "2021-06-30"');
        return $this->db->get();
    }

    public function triwulan3()
    {
        $this->db->select("COUNT(id_tamu) AS triwulan3, YEAR(date_created) AS tahun");
        $this->db->from('notulen_detail');
        $this->db->join('peserta', 'notulen_detail.id_not_detail=peserta.id_not_detail', 'left');
        // $this->db->group_by("YEAR(date_created)");
        $this->db->where('date_created BETWEEN "2021-07-01" AND "2021-09-30"');
        return $this->db->get();
    }

    public function triwulan4()
    {
        $this->db->select("COUNT(id_tamu) AS triwulan4, YEAR(date_created) AS tahun");
        $this->db->from('notulen_detail');
        $this->db->join('peserta', 'notulen_detail.id_not_detail=peserta.id_not_detail', 'left');
        // $this->db->group_by("YEAR(date_created)");
        $this->db->where('date_created BETWEEN "2021-10-01" AND "2021-11-31"');
        return $this->db->get();
    }

    // lihat aktivitas berdasarkan id anggota
    // SELECT anggota.nama, MONTH(notulen_detail.date_created), COUNT(peserta.id_anggota)
    // FROM peserta
    // INNER JOIN anggota ON anggota.id_anggota=peserta.id_anggota
    // INNER JOIN notulen_detail ON notulen_detail.id_not_detail=peserta.id_not_detail
    // WHERE peserta.id_anggota=10
    // GROUP BY MONTH(notulen_detail.date_created);


    // tampil jumlah kegiatan perbulan berdasarkan bidang
    // SELECT *, MONTH(date_created), SUM(jumlah) 
    // FROM notulen_detail LEFT JOIN notulen ON notulen.id_notulen=notulen_detail.id_notulen WHERE agenda='umum' 
    // GROUP BY MONTH(date_created);
}
