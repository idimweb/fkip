<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.
*/

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Notulen extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    login_access();
    hak_akses();
    $this->load->model('Notulen_model');
    $this->load->library('form_validation');
    $this->load->library('datatables');
  }

  public function index()
  {
    $x['judul'] = 'Data : Kegiatan/Program Kerja';
    $this->template->load('template', 'notulen/notulen_list', $x);
  }

  public function json()
  {
    header('Content-Type: application/json');
    echo $this->Notulen_model->json();
  }

  public function detail($id)
  {
    $x = array(
      'catatan' => FALSE,
      'data' => $this->Notulen_model->get_detail($id)->row_array(),
      'logo' => $this->db->get('instansi')->row_array(),
      'judul' => 'Detail :  Notulen',
    );
    $this->template->load('template', 'notulen/notulen_read', $x);
  }

  /**/

  function excel_not_detail($id, $param = '')
  {
    if ($param == 'print') {
      $param = '';
      echo "<script>window.print()</script>";
    } elseif ($param == 'word') {
      header("Content-Type:   application/vnd.ms-word; charset=utf-8");
      header("Content-Disposition: attachment; filename=detail_notulen.doc");  //File name extension was wrong
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
      'data' => $this->Notulen_model->get_detail($id)->row_array(),
      'logo' => $this->db->get('instansi')->row_array(),
      'judul' => 'Detail :  NOTULEN',
    );
    $this->load->view('notulen/notulen_excel', $x);
  }

  public function tambah()
  {
    $data = array(
      'judul' => 'Tambah Notulen',
      'button' => 'Create',
      'action' => site_url('notulen/tambah_data'),
      'id_notulen' => set_value('id_notulen'),
      'agenda' => set_value('agenda'),
      'id_create' => set_value('id_create'),
    );
    $this->template->load('template', 'notulen/notulen_form', $data);
  }

  public function tambah_data()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->tambah();
    } else {
      $data = array(
        'agenda' => $this->input->post('agenda', TRUE),
        'id_create' => $this->session->id_user,
      );


      $this->Notulen_model->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
      redirect(site_url('notulen'));
    }
  }

  public function edit($id)
  {
    $row = $this->Notulen_model->get_by_id($id);

    if ($row) {
      $data = array(
        'judul' => 'Data notulen',
        'button' => 'Update',
        'action' => site_url('notulen/edit_data'),
        'id_notulen' => set_value('id_notulen', $row->id_notulen),
        'agenda' => set_value('agenda', $row->agenda),
      );
      $this->template->load('template', 'notulen/notulen_form_edit', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
      redirect(site_url('notulen'));
    }
  }

  public function edit_data()
  {
    $this->_rules_edit();

    if ($this->form_validation->run() == FALSE) {
      $this->edit($this->input->post('id_notulen', TRUE));
    } else {
      $data = array(
        'agenda' => $this->input->post('agenda', TRUE),

      );

      $this->Notulen_model->update($this->input->post('id_notulen', TRUE), $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data  notulen Berhasil.</div>');
      redirect(site_url('notulen'));
    }
  }


  public function hapus($id)
  {
    $row = $this->Notulen_model->get_by_id($id);
    if ($row) {
      // if ($row->absensi != '') {
      //   @unlink('assets/absesnsi/' . $row->absesnsi);
      $this->Notulen_model->delete($id);
      $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
      redirect(site_url('notulen'));
      // } else {
      //   $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
      //   redirect(site_url('notulen'));
      // }
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('agenda', 'agenda', 'trim|required');
    $this->form_validation->set_rules('id_notulen', 'id_notulen', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  public function _rules_edit()
  {
    $this->form_validation->set_rules('agenda', 'agenda', 'trim|required');

    $this->form_validation->set_rules('id_notulen', 'id_notulen', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  function get_notify()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $jumlah =  $this->Notulen_model->get_notify();
      echo $jumlah->num_rows();
    }
  }
}
