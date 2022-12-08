<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.
*/

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Asistensi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    login_access();
    hak_akses();
    $this->load->model('Asistensi_model');
    $this->load->library('form_validation');
    $this->load->library('datatables');
  }

  public function index()
  {
    $x['judul'] = 'Data : Asistensi';
    $x['data_asistensi'] = $this->db->get('asistensi')->result();
    $this->template->load('template', 'asistensi/asistensi_list', $x);
  }

  public function json()
  {
    header('Content-Type: application/json');
    echo $this->Asistensi_model->json();
  }

  public function json_checkbox()
  {
    header('Content-Type: application/json');
    echo $this->Asistensi_model->json_checkbox();
  }

  public function detail($id)
  {
    $row = $this->Asistensi_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id_asistensi' => $row->id_asistensi,
        'nama_asistensi' => $row->nama_asistensi,
        'bidang' => $row->bidang,
        'prodi' => $row->prodi,
        'email' => $row->email,

        'judul' => 'Detail :  Asistensi',
      );
      $this->template->load('template', 'asistensi/asistensi_read', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('asistensi'));
    }
  }

  public function tambah()
  {
    $data = array(
      'judul' => 'Tambah Asistensi',
      'button' => 'Create',
      'action' => site_url('asistensi/tambah_data'),
      'id_asistensi' => set_value('id_asistensi'),
      'nama_asistensi' => set_value('nama_asistensi'),
      'bidang' => set_value('bidang'),
      'prodi' => set_value('prodi'),
      'email' => set_value('email'),
    );
    $this->template->load('template', 'asistensi/asistensi_form', $data);
  }

  public function tambah_data()
  {
    $data = array(
      'id_asistensi' => $this->input->post('id_asistensi', TRUE),
      // 'id_create' => $this->session->id_user,
      'nama_asistensi' => $this->input->post('nama_asistensi', TRUE),
      'bidang' => $this->input->post('bidang', TRUE),
      'prodi' => $this->input->post('prodi', TRUE),
      'email' => $this->input->post('email', TRUE),

    );

    $this->Asistensi_model->insert($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
    redirect(site_url('asistensi'));
  }

  public function edit($id)
  {
    $row = $this->Asistensi_model->get_by_id($id);

    if ($row) {
      $data = array(
        'judul' => 'Data Asistensi',
        'button' => 'Update',
        'action' => site_url('asistensi/edit_data'),
        'id_asistensi' => set_value('id_asistensi', $row->id_asistensi),
        'nama_asistensi' => set_value('nama_asistensi', $row->nama_asistensi),
        'bidang' => set_value('bidang', $row->bidang),
        'prodi' => set_value('prodi', $row->prodi),
        'email' => set_value('email', $row->email),
      );
      $this->template->load('template', 'asistensi/asistensi_form', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('asistensi'));
    }
  }

  public function edit_data()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->edit($this->input->post('id_asistensi', TRUE));
    } else {
      $data = array(
        // 'id_asistensi' => $this->input->post('id_asistensi',TRUE),
        'nama_asistensi' => $this->input->post('nama_asistensi', TRUE),
        'bidang' => $this->input->post('bidang', TRUE),
        'prodi' => $this->input->post('prodi', TRUE),
        'email' => $this->input->post('email', TRUE),

      );

      $this->Asistensi_model->update($this->input->post('id_asistensi', TRUE), $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data  Anggota Berhasil.</div>');
      redirect(site_url('asistensi'));
    }
  }

  public function hapus($id)
  {
    $row = $this->Asistensi_model->get_by_id($id);

    if ($row) {
      $this->Asistensi_model->delete($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
      redirect(site_url('asistensi'));
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
      redirect(site_url('asistensi'));
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama_asistensi', 'nama_asistensi', 'trim|required');
    $this->form_validation->set_rules('bidang', 'bidang', 'trim|required');
    $this->form_validation->set_rules('prodi', 'prodi', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');

    $this->form_validation->set_rules('id_asistensi', 'id_asistensi', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}
