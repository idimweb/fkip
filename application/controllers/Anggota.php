<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.
*/

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Anggota extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    login_access();
    hak_akses();
    $this->load->helper(array('url', 'html', 'form', 'security', 'uri'));
    $this->load->model('Anggota_model');
    $this->load->library('form_validation');
    $this->load->library('datatables');
  }

  public function index()
  {
    $x['judul'] = 'Data : Struktur Organisasi FKIP UAD';
    $x['data_anggota'] = $this->db->get('anggota')->result();
    $this->template->load('template', 'anggota/anggota_list', $x);
  }

  public function json()
  {
    header('Content-Type: application/json');
    echo $this->Anggota_model->json();
  }

  public function json_checkbox()
  {
    header('Content-Type: application/json');
    echo $this->Anggota_model->json_checkbox();
  }

  public function detail($id)
  {
    $row = $this->Anggota_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id_anggota' => $row->id_anggota,
        'nama' => $row->nama,
        'jabatan' => $row->jabatan,
        'prodi' => $row->prodi,
        'email' => $row->email,

        'judul' => 'Detail :  Anggota',
      );
      $this->template->load('template', 'anggota/anggota_read', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('anggota'));
    }
  }

  /**/

  function excel_not_detail($id, $param = '')
  {
    if ($param == 'print') {
      $param = '';
      echo "<script>window.print()</script>";
    } elseif ($param == 'word') {
      header("Content-Type:   application/vnd.ms-word; charset=utf-8");
      header("Content-Disposition: attachment; filename=detail_anggota.doc");  //File name extension was wrong
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: private", false);
      $param = 'no_image';
    } else {
      echo "Not action selected";
    }
    $x = array(
      'param' => $param,
      'catatan' => TRUE,
      'data' => $this->Anggota_model->get_detail($id)->row_array(),
      'logo' => $this->db->get('instansi')->row_array(),
      'judul' => 'Detail :  NOTULEN',
    );
    $this->load->view('anggota/anggota_excel', $x);
  }

  public function tambah()
  {
    $data = array(
      'judul' => 'Tambah Anggota',
      'button' => 'Create',
      'action' => site_url('anggota/tambah_data'),
      'id_anggota' => set_value('id_anggota'),
      'nama' => set_value('nama'),
      'jabatan' => set_value('jabatan'),
      'prodi' => set_value('prodi'),
      'email' => set_value('email'),

    );
    $this->template->load('template', 'anggota/anggota_form', $data);
  }

  public function tambah_data()
  {
    $data = array(
      'id_anggota' => $this->input->post('id_anggota', TRUE),
      'nama' => $this->input->post('nama', TRUE),
      'jabatan' => $this->input->post('jabatan', TRUE),
      'prodi' => $this->input->post('prodi', TRUE),
      'email' => $this->input->post('email', TRUE),

    );

    $this->Anggota_model->insert($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    redirect(site_url('anggota'));
  }


  public function edit($id)
  {
    $id = decrypt_url($id);
    $row = $this->Anggota_model->get_by_id($id);

    if ($row) {
      $data = array(
        'judul' => 'Data Anggota',
        'button' => 'Update',
        'action' => site_url('anggota/edit_data'),
        'id_anggota' => set_value('id_anggota', $row->id_anggota),
        'nama' => set_value('nama', $row->nama),
        'jabatan' => set_value('jabatan', $row->jabatan),
        'prodi' => set_value('prodi', $row->prodi),
        'email' => set_value('email', $row->email),
      );
      $this->template->load('template', 'anggota/anggota_form', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('anggota'));
    }
  }

  public function edit_data()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->edit($this->input->post('id_anggota', TRUE));
    } else {
      $data = array(
        // 'id_anggota' => $this->input->post('id_anggota',TRUE),
        'nama' => $this->input->post('nama', TRUE),
        'jabatan' => $this->input->post('jabatan', TRUE),
        'prodi' => $this->input->post('prodi', TRUE),
        'email' => $this->input->post('email', TRUE),

      );

      $this->Anggota_model->update($this->input->post('id_anggota', TRUE), $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data  Anggota Berhasil.</div>');
      redirect(site_url('anggota'));
    }
  }

  public function hapus($id)
  {
    $row = $this->Anggota_model->get_by_id($id);

    if ($row) {
      $this->Anggota_model->delete($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
      redirect(site_url('anggota'));
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
      redirect(site_url('anggota'));
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
    $this->form_validation->set_rules('prodi', 'prodi', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');

    $this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  function get_notify()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $jumlah =  $this->Anggota_model->get_notify();
      echo $jumlah->num_rows();
    }
  }
}
