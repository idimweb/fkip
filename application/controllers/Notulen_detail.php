<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.
*/

// if (!defined('BASEPATH'))
//   exit('No direct script access allowed');

defined('BASEPATH') or exit('No direct script access allowed');


class Notulen_detail extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    login_access();
    hak_akses();
    $this->load->helper(array('url', 'html', 'form'));
    $this->load->model('Notulen_detail_model');
    $this->load->model('Notulen_model');
    $this->load->model('Peserta_model');
    $this->load->model('Anggota_model');
    $this->load->model('Staf_model');
    $this->load->model('Asistensi_model');
    $this->load->model('Import_model', 'import');
    $this->load->model('Import_model');
    $this->load->model('Lainya_model');
    $this->load->library('form_validation');
    $this->load->library('datatables');
    $this->load->library('encrypt');
  }

  public function index()
  {
    $x['judul'] = 'Detil Program/Kegiatan';
    $x['data_notulen'] = $this->Notulen_detail_model->list_data();
    if ($this->session->level == 'admin') {
      $this->template->load('template', 'notulen_detail/notulen_detail_list', $x);
    } else {
      $this->template->load('template', 'notulen_detail/notulen_detail_list_user', $x);
    }
  }

  public function json()
  {
    header('Content-Type: application/json');
    echo $this->Notulen_detail_model->json();
  }

  public function lihat_semua()
  {
    // $data['peserta'] = $this->db->get('peserta')->result();
    // $data['anggota'] = $this->db->get('anggota')->result();
    $data = array(
      'judul' => 'Semua Aktivitas',
      'notulen_detail' => $this->db->get('notulen_detail')->result(),
      'anggota' => $this->db->get('anggota')->result(),
      'asistensi' => $this->db->get('asistensi')->result(),
      'bulan_tahun' => $this->Notulen_detail_model->tampil_bulan_tahun(),
      'jumlah_peserta' => $this->Notulen_detail_model->tampil_jumlah_peserta(),
      'triwulan1' => $this->Notulen_detail_model->triwulan1(),
      'triwulan2' => $this->Notulen_detail_model->triwulan2(),
      'triwulan3' => $this->Notulen_detail_model->triwulan3(),
      'triwulan4' => $this->Notulen_detail_model->triwulan4(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_all', $data);
  }

  public function detail($id)
  {
    $row = $this->Notulen_detail_model->get_by_id($id);
    if ($row) {
      $data = array(
        'judul' => 'Detail : Kegiatan',
        'id_not_detail' => $row->id_not_detail,
        'id_notulen' => $row->id_notulen,
        'issue' => $row->issue,
        'tanggal_mulai' => $row->tanggal_mulai,
        'tanggal_selesai' => $row->tanggal_selesai,
        'waktu_mulai' => $row->waktu_mulai,
        'waktu_selesai' => $row->waktu_selesai,
        'tempat' => $row->tempat,
        'jenis_kegiatan' => $row->jenis_kegiatan,
        'catatan' => $row->catatan,
        'jumlah' => $row->jumlah,
        'status' => $row->status,
      );
      $this->template->load('template', 'notulen_detail/notulen_detail_read', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('notulen_detail'));
    }
  }

  public function aktiv_anggota($id)
  {
    $row = $this->Anggota_model->get_by_id($id);
    if ($row) {
      $data = array(
        'judul' => 'Aktivitas : Peserta',
        'hasil' => $this->Anggota_model->aktiv_anggota($id),
        'nama' => $row->nama,
        'jabatan' => $row->jabatan,
        'prodi' => $row->prodi,
        'email' => $row->email,

      );
      $this->template->load('template', 'notulen_detail/aktiv_anggota', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('notulen_detail'));
    }
  }

  public function aktiv_asistensi($id)
  {
    $row = $this->Asistensi_model->get_by_id($id);
    if ($row) {
      $data = array(
        'judul' => 'Aktivitas : Peserta',
        'hasil' => $this->Asistensi_model->aktiv_asistensi($id),
        'nama_asistensi' => $row->nama_asistensi,
        'bidang' => $row->bidang,
        'prodi' => $row->prodi,
        'email' => $row->email,

      );
      $this->template->load('template', 'notulen_detail/aktiv_asistensi', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('notulen_detail'));
    }
  }

  public function tampilDetail($id)
  {
    $data = array(
      'judul' => 'Detail : Kegiatan',
      'hasil' => $this->Notulen_detail_model->TampilPeserta($id),
    );
    $this->template->load('template', 'notulen_detail/notulen_detail_read', $data);
  }


  public function detail_anggota($id)
  {
    $row = $this->Notulen_detail_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id_not_detail' => $row->id_not_detail,
        'id_peserta' => $row->id_peserta,
        'id_anggota' => $row->id_anggota,
        'id_asistesi' => $row->id_asistesi,
        'id' => $row->id,
        'id_lainya' => $row->id_lainya,
        'id_staf' => $row->id_staf,
      );
      $this->template->load('template', 'notulen_detail/notulen_detail_read', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('notulen_detail'));
    }
  }

  public function tambah()
  {
    $data = array(
      'judul' => 'Tambah Detil Kegiatan',
      'button' => 'Create',
      'action' => site_url('notulen_detail/insert'),
      'id_not_detail' => set_value('id_not_detail'),
      'id_notulen' => $this->input->post('id_notulen', TRUE),
      'issue' => $this->input->post('issue', TRUE),
      'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
      'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
      'waktu_mulai' => $this->input->post('waktu_mulai', TRUE),
      'waktu_selesai' => $this->input->post('waktu_selesai', TRUE),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'id_asistensi' => $this->input->post('id_asistensi', TRUE),
      'id_staf' => $this->input->post('id_staf', TRUE),
      'tamu' => $this->input->post('tamu', TRUE),
      'lainya' => $this->input->post('lainya', TRUE),
      'tempat' => $this->input->post('tempat', TRUE),
      'jenis_kegiatan' => $this->input->post('jenis_kegiatan', TRUE),
      'catatan' => $this->input->post('catatan', TRUE),
      'status' => 'N',
      'date_created' => date('Y-m-d'),
      'anggota' => $this->db->get('anggota')->result(),
      'asistensi' => $this->db->get('asistensi')->result(),
      'staf' => $this->db->get('staf')->result(),
    );
    $this->template->load('template', 'notulen_detail/notulen_detail_form', $data);
  }

  public function insert()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->tambah();
    } else {

      $path = 'assets/uploads/';
      require_once APPPATH . "/third_party/PHPExcel.php";
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'xlsx|xls|csv';
      $config['remove_spaces'] = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('tamu')) {
        $error = array('error' => $this->upload->display_errors());
      } else {
        $data = array('upload_data' => $this->upload->data());
      }
      if (empty($error)) {
        if (!empty($data['upload_data']['file_name'])) {
          $import_xls_file = $data['upload_data']['file_name'];
        } else {
          $import_xls_file = 0;
        }
        $inputFileName = $path . $import_xls_file;
      }

      $checkbox = $_POST['id_anggota'];
      $checkbox2 = $_POST['id_asistensi'];
      $checkbox3 = $_POST['id_staf'];
      $tambahData = $_POST['nama_lainya'];


      $a = count($checkbox);
      $b = count($checkbox2);
      $c = count($tambahData);
      $e = count($checkbox3);

      if ($import_xls_file == 0) {
        $d = 1;
      }

      if ($inputFileName != NULL) {
        $inputFileName = $path . $import_xls_file;
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        $d = count($allDataInSheet);
      }

      $d = $d - 1;
      $jlh = $a + $b + $c + $d + $e;

      $path = 'assets/uploads/file';
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'png|jpg|bmp|pdf|zip|rar';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('catatan')) {
        $error = array('error' => $this->upload->display_errors());
      } else {
        $data = array('upload_data' => $this->upload->data());
      }
      if (!$this->upload->data('file_name')) {
        $catatan = 'Tidak ada file';
      } else {
        $catatan = $this->upload->data('file_name');
      }

      $data = array(
        'id_notulen' => $this->input->post('id_notulen', TRUE),
        'issue' => $this->input->post('issue', TRUE),
        'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
        'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
        'waktu_mulai' => $this->input->post('waktu_mulai', TRUE),
        'waktu_selesai' => $this->input->post('waktu_selesai', TRUE),
        'tempat' => $this->input->post('tempat', TRUE),
        'jenis_kegiatan' => $this->input->post('jenis_kegiatan', TRUE),
        'catatan' => $catatan,
        'jumlah' => $jlh,
        'status' => 'N',
        'date_created' => date('Y-m-d'),
      );
      $this->Notulen_detail_model->insert($data);

      $id_not_detail = $this->db->insert_id();
      $checkbox = $_POST['id_anggota'];
      $checkbox2 = $_POST['id_asistensi'];
      $checkbox3 = $_POST['id_staf'];
      $tambahData = $_POST['nama_lainya'];
      $a = count($checkbox);
      $b = count($checkbox2);
      $e = count($checkbox3);
      $c = count($tambahData);
      $arrayRow = array($a, $b, $c, $d, $e);
      $max = max($arrayRow);

      for ($i = 0; $i < $max; $i++) {
        if ($i < $c) {
          $data = array(
            'nama_lainya' => $tambahData[$i],
          );
          $this->Lainya_model->insert($data);
          $id_lainya = $this->db->insert_id(); //ambil id terakhir harus di bawah insert()
        } else {
          $id_lainya = NULL;
        }

        if ($i < $d) {
          $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
          $objReader = PHPExcel_IOFactory::createReader($inputFileType);
          $objPHPExcel = $objReader->load($inputFileName);
          $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
          $flag = true;
          $x = 0;
          foreach ($allDataInSheet as $value) {
            if ($flag) {
              $flag = false;
              continue;
            }
            $inserdata[$x]['first_name']    = $value['A'];
            $inserdata[$x]['last_name']    = $value['B'];
            $inserdata[$x]['email']        = $value['C'];
            $inserdata[$x]['contact_no']   = $value['D'];
            $x++;
          }
          $data3 = array(
            'first_name'    => $inserdata[$i]['first_name'],
            'last_name'    => $inserdata[$i]['last_name'],
            'email'        => $inserdata[$i]['email'],
            'contact_no'   => $inserdata[$i]['contact_no'],
          );
          $result = $this->Import_model->insert($data3);
          $id_tamu = $this->db->insert_id();
        } else {
          $id_tamu = NULL;
        }

        $data2 = array(
          'id_not_detail' => $id_not_detail,
          'id_lainya' => $id_lainya,
          'id_tamu' => $id_tamu,
          'id_anggota' => $checkbox[$i],
          'id_asistensi' => $checkbox2[$i],
          'id_staf' => $checkbox3[$i],
        );
        $this->Peserta_model->insert($data2);
      }
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    redirect(site_url('notulen_detail'));
  }

  public function edit($id)
  {
    $row = $this->Notulen_detail_model->get_by_id($id);

    if ($row) {
      $data = array(
        'judul' => 'Data NOTULEN_DETAIL',
        'button' => 'Update',
        'action' => site_url('notulen_detail/edit_data'),
        'id_not_detail' => set_value('id_not_detail', $row->id_not_detail),
        'id_notulen' => set_value('id_notulen', $row->id_notulen),
        'issue' => set_value('issue', $row->issue),
        'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
        'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
        'waktu_mulai' => set_value('waktu_mulai', $row->waktu_mulai),
        'waktu_selesai' => set_value('waktu_selesai', $row->waktu_selesai),
        'tempat' => set_value('tempat', $row->tempat),
        'jenis_kegiatan' => set_value('jenis_kegiatan', $row->jenis_kegiatan),
        'catatan' => set_value('catatan', $row->catatan),
        'date_created' => date('Y-m-d'),
        'status' => 'N',

      );
      $this->template->load('template', 'notulen_detail/notulen_detail_form_edit', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('notulen_detail'));
    }
  }

  public function edit_data()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->edit($this->input->post('id_not_detail', TRUE));
    } else {
      $path = 'assets/uploads/file';
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'png|jpg|bmp|pdf|zip|rar';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('catatan')) {
        $error = array('error' => $this->upload->display_errors());
      } else {
        $data = array('upload_data' => $this->upload->data());
      }
      if (!$this->upload->data('file_name')) {
        $data = array(
          'id_not_detail' => set_value('id_not_detail'),
          'id_notulen' => $this->input->post('id_notulen', TRUE),
          'issue' => $this->input->post('issue', TRUE),
          'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
          'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
          'waktu_mulai' => $this->input->post('waktu_mulai', TRUE),
          'waktu_selesai' => $this->input->post('waktu_selesai', TRUE),
          'tempat' => $this->input->post('tempat', TRUE),
          'jenis_kegiatan' => $this->input->post('jenis_kegiatan', TRUE),
          // 'catatan' => $catatan,
          'date_created' => date('Y-m-d'),
          'status' => 'N',
        );

        $this->Notulen_detail_model->update($this->input->post('id_not_detail', TRUE), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
        redirect(site_url('notulen_detail'));
      } else {
        $catatan = $this->upload->data('file_name');
        $qdata = $this->db->get_where('notulen_detail', array('id_not_detail' => $this->input->post('id_not_detail')));
        $cek_id = $qdata->row_array();
        unlink('assets/uploads/file/' . $cek_id['catatan']);
      }
      $data = array(
        'id_not_detail' => set_value('id_not_detail'),
        'id_notulen' => $this->input->post('id_notulen', TRUE),
        'issue' => $this->input->post('issue', TRUE),
        'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
        'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
        'waktu_mulai' => $this->input->post('waktu_mulai', TRUE),
        'waktu_selesai' => $this->input->post('waktu_selesai', TRUE),
        'tempat' => $this->input->post('tempat', TRUE),
        'jenis_kegiatan' => $this->input->post('jenis_kegiatan', TRUE),
        'catatan' => $catatan,
        'date_created' => date('Y-m-d'),
        'status' => 'N',
      );

      $this->Notulen_detail_model->update($this->input->post('id_not_detail', TRUE), $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
      redirect(site_url('notulen_detail'));
    }
  }

  public function edit_peserta($id)
  {
    $where = array('id_not_detail' => $id);
    $data['notulen_detail'] = $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result();

    // $data['peserta'] = $this->db->get('peserta')->result();
    // $data['anggota'] = $this->db->get('anggota')->result();
    $data = array(
      'judul' => 'Data NOTULEN_DETAIL Peserta',
      'button' => 'Update',
      'action' => site_url('notulen_detail/edit_data_peserta'),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'id_asistensi' => $this->input->post('id_asistensi', TRUE),
      'id_staf' => $this->input->post('id_staf', TRUE),
      'id_tamu' => $this->input->post('id_tamu', TRUE),
      'id_lainya' => $this->input->post('id_lainya', TRUE),
      'detail'  => $this->Notulen_detail_model->TampilPeserta($id),
      'anggota' => $this->db->get('anggota')->result(),
      'asistensi' => $this->db->get('asistensi')->result(),
      'staf' => $this->db->get('staf')->result(),
      'notulen_detail' => $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_form_peserta', $data);
  }

  public function edit_data_peserta()
  {
    $path = 'assets/uploads/';
    require_once APPPATH . "/third_party/PHPExcel.php";
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'xlsx|xls|csv';
    $config['remove_spaces'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('tamu')) {
      $error = array('error' => $this->upload->display_errors());
    } else {
      $data = array('upload_data' => $this->upload->data());
    }
    if (empty($error)) {
      if (!empty($data['upload_data']['file_name'])) {
        $import_xls_file = $data['upload_data']['file_name'];
      } else {
        $import_xls_file = 0;
      }
      $inputFileName = $path . $import_xls_file;
    }
    $checkbox = $_POST['id_anggota'];
    $checkbox2 = $_POST['id_asistensi'];
    $checkbox3 = $_POST['id_staf'];
    $tambahData = $_POST['nama_lainya'];


    $a = count($checkbox);
    $b = count($checkbox2);
    $c = count($tambahData);
    $e = count($checkbox3);

    if ($import_xls_file == 0) {
      $d = 1;
    }

    if ($inputFileName != NULL) {
      $inputFileName = $path . $import_xls_file;
      $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
      $objReader = PHPExcel_IOFactory::createReader($inputFileType);
      $objPHPExcel = $objReader->load($inputFileName);
      $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
      $d = count($allDataInSheet);
    }

    $d = $d - 1;
    $jlh = $a + $b + $c + $d + $e;


    $checkbox = $_POST['id_anggota'];
    $a = count($checkbox);

    $id_not_detail = $this->input->post('id_not_detail');
    $jumlah = $this->input->post('jumlah');
    $data = array(
      'jumlah' => $jumlah + $jlh
    );
    $where = array(
      'id_not_detail' => $id_not_detail
    );
    $this->Notulen_detail_model->update_data($where, $data, 'notulen_detail');

    $checkbox = $_POST['id_anggota'];
    $checkbox2 = $_POST['id_asistensi'];
    $checkbox3 = $_POST['id_staf'];
    $tambahData = $_POST['nama_lainya'];
    $a = count($checkbox);
    $b = count($checkbox2);
    $e = count($checkbox3);
    $c = count($tambahData);
    $arrayRow = array($a, $b, $c, $d, $e);
    $max = max($arrayRow);

    for ($i = 0; $i < $max; $i++) {
      if ($i < $c) {
        $data = array(
          'nama_lainya' => $tambahData[$i],
        );
        $this->Lainya_model->insert($data);
        $id_lainya = $this->db->insert_id(); //ambil id terakhir harus di bawah insert()
      } else {
        $id_lainya = NULL;
      }

      if ($i < $d) {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        $flag = true;
        $x = 0;
        foreach ($allDataInSheet as $value) {
          if ($flag) {
            $flag = false;
            continue;
          }
          $inserdata[$x]['first_name']    = $value['A'];
          $inserdata[$x]['last_name']    = $value['B'];
          $inserdata[$x]['email']        = $value['C'];
          $inserdata[$x]['contact_no']   = $value['D'];
          $x++;
        }
        $data3 = array(
          'first_name'    => $inserdata[$i]['first_name'],
          'last_name'    => $inserdata[$i]['last_name'],
          'email'        => $inserdata[$i]['email'],
          'contact_no'   => $inserdata[$i]['contact_no'],
        );
        $result = $this->Import_model->insert($data3);
        $id_tamu = $this->db->insert_id();
      } else {
        $id_tamu = NULL;
      }

      $data2 = array(
        'id_not_detail' => $id_not_detail,
        'id_lainya' => $id_lainya,
        'id_tamu' => $id_tamu,
        'id_anggota' => $checkbox[$i],
        'id_asistensi' => $checkbox2[$i],
        'id_staf' => $checkbox3[$i],
      );
      $this->Peserta_model->insert($data2);
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    redirect('notulen_detail');
  }

  public function edit_anggota($id)
  {
    $where = array('id_not_detail' => $id);
    $data['notulen_detail'] = $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result();

    // $data['peserta'] = $this->db->get('peserta')->result();
    // $data['anggota'] = $this->db->get('anggota')->result();
    $data = array(
      'judul' => 'Data NOTULEN_DETAIL Peserta',
      'button' => 'Update',
      'action' => site_url('notulen_detail/edit_data_anggota'),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'detail'  => $this->Notulen_detail_model->TampilPeserta($id),
      'anggota' => $this->db->get('anggota')->result(),
      'notulen_detail' => $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_form_anggota', $data);
  }

  function edit_data_anggota()
  {
    $checkbox = $_POST['id_anggota'];
    $a = count($checkbox);

    $id_not_detail = $this->input->post('id_not_detail');
    $jumlah = $this->input->post('jumlah');
    $data = array(
      'jumlah' => $jumlah + $a
    );
    $where = array(
      'id_not_detail' => $id_not_detail
    );
    $this->Notulen_detail_model->update_data($where, $data, 'notulen_detail');

    for ($i = 0; $i < $a; $i++) {
      $data2 = array(
        'id_not_detail' => $id_not_detail,
        'id_anggota' => $checkbox[$i],
      );
      $this->Peserta_model->insert($data2);
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    redirect('notulen_detail');
  }


  public function hapus()
  {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id = $this->input->post('id_not_detail');
      $row = $this->Notulen_detail_model->get_by_id($id);

      if ($row) {
        $this->Notulen_detail_model->delete($id);
        $this->Notulen_detail_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
        redirect(site_url('notulen_detail'));
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
        redirect(site_url('notulen_detail'));
      }
    }
  }

  function hapus_anggota()
  {

    $id_not_detail = $this->input->post('id_not_detail');
    $jumlah = $this->input->post('jumlah');
    $id_peserta = $this->input->post('id_peserta');
    $data = array(
      'jumlah' => $jumlah - 1
    );
    $where = array(
      'id_not_detail' => $id_not_detail
    );
    $this->Notulen_detail_model->update_data($where, $data, 'notulen_detail');

    $data2 = array(
      'id_anggota' => NULL
    );
    $where = array(
      'id_peserta' => $id_peserta
    );
    $this->Peserta_model->update_data($where, $data2, 'peserta');

    $where = array('id_not_detail' => $id_not_detail);
    $data['notulen_detail'] = $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result();

    $data = array(
      'judul' => 'Data Peserta',
      'judul_anggota' => 'Konfirmasi Hapus anggota',
      'judul_asistensi' => 'Konfirmasi Hapus asistensi',
      'judul_tamu' => 'Konfirmasi Hapus tamu',
      'judul_staf' => 'Konfirmasi Hapus staf',
      'judul_lainya' => 'Konfirmasi Hapus Lainya',
      'button' => 'Update',
      'action_anggota' => site_url('notulen_detail/hapus_anggota'),
      'action_asistensi' => site_url('notulen_detail/hapus_asistensi'),
      'action_tamu' => site_url('notulen_detail/hapus_tamu'),
      'action_staf' => site_url('notulen_detail/hapus_staf'),
      'action_lainya' => site_url('notulen_detail/hapus_lainya'),
      'action' => site_url('notulen_detail/edit_data_anggota'),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'detail'  => $this->Notulen_detail_model->TampilPeserta($id_not_detail),
      'anggota' => $this->db->get('anggota')->result(),
      'notulen_detail' => $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);
  }

  function hapus_asistensi()
  {

    $id_not_detail = $this->input->post('id_not_detail');
    $jumlah = $this->input->post('jumlah');
    $id_peserta = $this->input->post('id_peserta');
    $data = array(
      'jumlah' => $jumlah - 1
    );
    $where = array(
      'id_not_detail' => $id_not_detail
    );
    $this->Notulen_detail_model->update_data($where, $data, 'notulen_detail');

    $data2 = array(
      'id_asistensi' => NULL
    );
    $where = array(
      'id_peserta' => $id_peserta
    );
    $this->Peserta_model->update_data($where, $data2, 'peserta');

    $where = array('id_not_detail' => $id_not_detail);
    $data['notulen_detail'] = $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result();

    // $data['peserta'] = $this->db->get('peserta')->result();
    // $data['anggota'] = $this->db->get('anggota')->result();
    $data = array(
      'judul' => 'Data Peserta',
      'judul_anggota' => 'Konfirmasi Hapus anggota',
      'judul_asistensi' => 'Konfirmasi Hapus asistensi',
      'judul_tamu' => 'Konfirmasi Hapus tamu',
      'judul_staf' => 'Konfirmasi Hapus staf',
      'judul_lainya' => 'Konfirmasi Hapus Lainya',
      'button' => 'Update',
      'action_anggota' => site_url('notulen_detail/hapus_anggota'),
      'action_asistensi' => site_url('notulen_detail/hapus_asistensi'),
      'action_tamu' => site_url('notulen_detail/hapus_tamu'),
      'action_staf' => site_url('notulen_detail/hapus_staf'),
      'action_lainya' => site_url('notulen_detail/hapus_lainya'),
      'action' => site_url('notulen_detail/edit_data_anggota'),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'detail'  => $this->Notulen_detail_model->TampilPeserta($id_not_detail),
      'anggota' => $this->db->get('anggota')->result(),
      'notulen_detail' => $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);

    // $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    // $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);
    // redirect('notulen_detail');
  }

  function hapus_tamu()
  {

    $id_not_detail = $this->input->post('id_not_detail');
    $jumlah = $this->input->post('jumlah');
    $id_peserta = $this->input->post('id_peserta');
    $data = array(
      'jumlah' => $jumlah - 1
    );
    $where = array(
      'id_not_detail' => $id_not_detail
    );
    $this->Notulen_detail_model->update_data($where, $data, 'notulen_detail');

    $data2 = array(
      'id_tamu' => NULL
    );
    $where = array(
      'id_peserta' => $id_peserta
    );
    $this->Peserta_model->update_data($where, $data2, 'peserta');

    $where = array('id_not_detail' => $id_not_detail);
    $data['notulen_detail'] = $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result();

    // $data['peserta'] = $this->db->get('peserta')->result();
    // $data['anggota'] = $this->db->get('anggota')->result();
    $data = array(
      'judul' => 'Data Peserta',
      'judul_anggota' => 'Konfirmasi Hapus anggota',
      'judul_asistensi' => 'Konfirmasi Hapus asistensi',
      'judul_tamu' => 'Konfirmasi Hapus tamu',
      'judul_staf' => 'Konfirmasi Hapus staf',
      'judul_lainya' => 'Konfirmasi Hapus Lainya',
      'button' => 'Update',
      'action_anggota' => site_url('notulen_detail/hapus_anggota'),
      'action_asistensi' => site_url('notulen_detail/hapus_asistensi'),
      'action_tamu' => site_url('notulen_detail/hapus_tamu'),
      'action_staf' => site_url('notulen_detail/hapus_staf'),
      'action_lainya' => site_url('notulen_detail/hapus_lainya'),
      'action' => site_url('notulen_detail/edit_data_anggota'),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'detail'  => $this->Notulen_detail_model->TampilPeserta($id_not_detail),
      'anggota' => $this->db->get('anggota')->result(),
      'notulen_detail' => $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);

    // $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    // $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);
    // redirect('notulen_detail');
  }

  function hapus_staf()
  {

    $id_not_detail = $this->input->post('id_not_detail');
    $jumlah = $this->input->post('jumlah');
    $id_peserta = $this->input->post('id_peserta');
    $data = array(
      'jumlah' => $jumlah - 1
    );
    $where = array(
      'id_not_detail' => $id_not_detail
    );
    $this->Notulen_detail_model->update_data($where, $data, 'notulen_detail');

    $data2 = array(
      'id_staf' => NULL
    );
    $where = array(
      'id_peserta' => $id_peserta
    );
    $this->Peserta_model->update_data($where, $data2, 'peserta');

    $where = array('id_not_detail' => $id_not_detail);
    $data['notulen_detail'] = $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result();

    // $data['peserta'] = $this->db->get('peserta')->result();
    // $data['anggota'] = $this->db->get('anggota')->result();
    $data = array(
      'judul' => 'Data Peserta',
      'judul_anggota' => 'Konfirmasi Hapus anggota',
      'judul_asistensi' => 'Konfirmasi Hapus asistensi',
      'judul_tamu' => 'Konfirmasi Hapus tamu',
      'judul_staf' => 'Konfirmasi Hapus staf',
      'judul_lainya' => 'Konfirmasi Hapus Lainya',
      'button' => 'Update',
      'action_anggota' => site_url('notulen_detail/hapus_anggota'),
      'action_asistensi' => site_url('notulen_detail/hapus_asistensi'),
      'action_tamu' => site_url('notulen_detail/hapus_tamu'),
      'action_staf' => site_url('notulen_detail/hapus_staf'),
      'action_lainya' => site_url('notulen_detail/hapus_lainya'),
      'action' => site_url('notulen_detail/edit_data_anggota'),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'detail'  => $this->Notulen_detail_model->TampilPeserta($id_not_detail),
      'anggota' => $this->db->get('anggota')->result(),
      'notulen_detail' => $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);

    // $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    // $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);
    // redirect('notulen_detail');
  }


  function hapus_lainya()
  {

    $id_not_detail = $this->input->post('id_not_detail');
    $jumlah = $this->input->post('jumlah');
    $id_peserta = $this->input->post('id_peserta');
    $data = array(
      'jumlah' => $jumlah - 1
    );
    $where = array(
      'id_not_detail' => $id_not_detail
    );
    $this->Notulen_detail_model->update_data($where, $data, 'notulen_detail');

    $data2 = array(
      'id_lainya' => NULL
    );
    $where = array(
      'id_peserta' => $id_peserta
    );
    $this->Peserta_model->update_data($where, $data2, 'peserta');

    $where = array('id_not_detail' => $id_not_detail);
    $data['notulen_detail'] = $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result();

    // $data['peserta'] = $this->db->get('peserta')->result();
    // $data['anggota'] = $this->db->get('anggota')->result();
    $data = array(
      'judul' => 'Data Peserta',
      'judul_anggota' => 'Konfirmasi Hapus anggota',
      'judul_asistensi' => 'Konfirmasi Hapus asistensi',
      'judul_tamu' => 'Konfirmasi Hapus tamu',
      'judul_staf' => 'Konfirmasi Hapus staf',
      'judul_lainya' => 'Konfirmasi Hapus Lainya',
      'button' => 'Update',
      'action_anggota' => site_url('notulen_detail/hapus_anggota'),
      'action_asistensi' => site_url('notulen_detail/hapus_asistensi'),
      'action_tamu' => site_url('notulen_detail/hapus_tamu'),
      'action_staf' => site_url('notulen_detail/hapus_staf'),
      'action_lainya' => site_url('notulen_detail/hapus_lainya'),
      'action' => site_url('notulen_detail/edit_data_anggota'),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'detail'  => $this->Notulen_detail_model->TampilPeserta($id_not_detail),
      'anggota' => $this->db->get('anggota')->result(),
      'notulen_detail' => $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);

    // $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    // $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);
    // redirect('notulen_detail');
  }

  public function hapus_peserta($id)
  {
    $where = array('id_not_detail' => $id);
    $data['notulen_detail'] = $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result();

    // $data['peserta'] = $this->db->get('peserta')->result();
    // $data['anggota'] = $this->db->get('anggota')->result();
    $data = array(
      'judul' => 'Data Peserta',
      'judul_anggota' => 'Konfirmasi Hapus anggota',
      'judul_asistensi' => 'Konfirmasi Hapus asistensi',
      'judul_tamu' => 'Konfirmasi Hapus tamu',
      'judul_staf' => 'Konfirmasi Hapus staf',
      'judul_lainya' => 'Konfirmasi Hapus Lainya',
      'button' => 'Update',
      'action_anggota' => site_url('notulen_detail/hapus_anggota'),
      'action_asistensi' => site_url('notulen_detail/hapus_asistensi'),
      'action_tamu' => site_url('notulen_detail/hapus_tamu'),
      'action_staf' => site_url('notulen_detail/hapus_staf'),
      'action_lainya' => site_url('notulen_detail/hapus_lainya'),
      'action' => site_url('notulen_detail/edit_data_anggota'),
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'detail'  => $this->Notulen_detail_model->TampilPeserta($id),
      'anggota' => $this->db->get('anggota')->result(),
      'notulen_detail' => $this->Notulen_detail_model->edit_data($where, 'notulen_detail')->result(),
    );

    $this->template->load('template', 'notulen_detail/notulen_detail_form_hapus', $data);
  }

  public function _rules()
  {
    $this->form_validation->set_rules('id_notulen', 'id notulen', 'trim|required');
    $this->form_validation->set_rules('issue', 'issue', 'trim|required');
    $this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'trim|required');
    $this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');
    $this->form_validation->set_rules('waktu_mulai', 'waktu mulai', 'trim|required');
    $this->form_validation->set_rules('waktu_selesai', 'waktu selesai', 'trim|required');
    // $this->form_validation->set_rules('remarks', 'remarks', 'trim|required');

    $this->form_validation->set_rules('id_not_detail', 'id_not_detail', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  public function excel()
  {
    $this->load->helper('exportexcel');
    $namaFile = "notulen_detail.xls";
    $judul = "notulen_detail";
    $tablehead = 0;
    $tablebody = 1;
    $nourut = 1;
    //penulisan header
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=" . $namaFile . "");
    header("Content-Transfer-Encoding: binary ");

    xlsBOF();

    $kolomhead = 0;
    xlsWriteLabel($tablehead, $kolomhead++, "No");
    xlsWriteLabel($tablehead, $kolomhead++, "Id Notulen");
    xlsWriteLabel($tablehead, $kolomhead++, "Issue");
    xlsWriteLabel($tablehead, $kolomhead++, "PIC");
    xlsWriteLabel($tablehead, $kolomhead++, "Due Dete");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");
    xlsWriteLabel($tablehead, $kolomhead++, "Remarks");

    foreach ($this->Notulen_detail_model->get_all() as $data) {
      $kolombody = 0;

      //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
      xlsWriteNumber($tablebody, $kolombody++, $nourut);
      xlsWriteNumber($tablebody, $kolombody++, $data->id_notulen);
      xlsWriteLabel($tablebody, $kolombody++, $data->issue);
      xlsWriteLabel($tablebody, $kolombody++, $data->PIC);
      xlsWriteLabel($tablebody, $kolombody++, $data->due_dete);
      xlsWriteLabel($tablebody, $kolombody++, $data->status);
      xlsWriteLabel($tablebody, $kolombody++, $data->remarks);

      $tablebody++;
      $nourut++;
    }

    xlsEOF();
    exit();
  }

  public function word()
  {
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=notulen_detail.doc");

    $data = array(
      'notulen_detail_data' => $this->Notulen_detail_model->get_all(),
      'start' => 0
    );

    $this->load->view('template', 'notulen_detail/notulen_detail_doc', $data);
  }

  function json_notulen()
  {
    echo $this->Notulen_detail_model->json_notulen();
  }

  function json_peserta()
  {
    echo $this->Notulen_detail_model->json_peserta();
  }

  function json_asistensi()
  {
    echo $this->Notulen_detail_model->json_asistensi();
  }


  /*get detail json notulen*/
  function get_detail_json()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $data = $this->db->get_where('notulen', array('id_notulen' => $this->input->post('id_notulen')))->row_array();
      $detail_json = array(
        'id_notulen' => $data['id_notulen'],
        'nama_agenda' => $data['agenda']
      );
      echo json_encode($detail_json);
    }
  }

  function get_list_not()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $x['data'] =  $this->Notulen_model->get_notify();
      $this->load->view('notifikasi_notulen', $x);
    }
  }

  /*end json detail data*/

  function set_close()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id_not_detail = $this->input->post('id_not_detail');
      $data = array('status' => 'Y');
      $this->db->update('notulen_detail', $data, array('id_not_detail' => $id_not_detail));
    }
  }
}
