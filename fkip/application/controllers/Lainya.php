<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.
*/

  if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  class Lainya extends CI_Controller
  {
    function __construct()
    {
      parent::__construct();
      login_access();
      hak_akses();
      $this->load->model('Lainya_model');
      $this->load->library('form_validation');
      $this->load->library('datatables');

    }

    public function index()
    {
     $x['judul'] = 'Data : Lainya';
     $this->template->load('template','lainya/lainya_list',$x);
   }

   public function json() {
    header('Content-Type: application/json');
    echo $this->Lainya_model->json();
  }

 public function detail($id)
 {
     $row = $this->Lainya_model->get_by_id($id);
     if ($row) {
         $data = array(

           'id_buku_tamu' => $row->id_buku_tamu,
           'penerima' => $row->penerima,
           'keperluan' => $row->keperluan,
           'nama_peserta' => $row->nama_peserta,
           'instansi_peserta' => $row->instansi_peserta,
           'no_hp_peserta' => $row->no_hp_peserta,
           'jabatan_peserta' => $row->jabatan_peserta,
           'tanggal' => $row->tanggal,
           'judul'=>'Detail :  Buku_tamu',
       );
         $this->template->load('template','buku_tamu/buku_tamu_read', $data);
     } else {
         $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
         redirect(site_url('buku_tamu'));
     }
 }

  /**/

  function excel_not_detail($id,$param=''){
   if($param == 'print'){
    $param = '';
    echo "<script>window.print()</script>";
    }elseif($param == 'word'){
    header("Content-Type:   application/vnd.ms-word; charset=utf-8");
    header("Content-Disposition: attachment; filename=detail_anggota.doc");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    $param = 'no_image';
  }else{
    echo "Not action selected";
  }
    $x = array(
      'param'=>$param,
      'catatan'=>TRUE,
      'data' => $this->Anggota_model->get_detail($id)->row_array(),
      'logo'=>$this->db->get('instansi')->row_array(),
      'judul'=>'Detail :  NOTULEN',
    );
    $this->load->view('anggota/anggota_excel', $x);
  }

  public function tambah()
  {
    $data = array(
      'judul'=>'Tambah Lainya',
      'button' => 'Create',
      'action' => site_url('lainya/tambah_data'),
      'id_lainya' => set_value('id_lainya'),
      'nama_lainya' => set_value('nama_lainya'),
    );
    $this->template->load('template','lainya/lainya_form', $data);
  }

  public function tambah_data()
  {
    $nama_lainya = $_POST['nama_lainya'];
    $row = count($nama_lainya);
    for($i=0;$i < $row;$i++){
      $data = array(
        'nama_lainya' => $nama_lainya[$i],
      );
      $this->Lainya_model->insert($data);
    }
      $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
      redirect(site_url('lainya'));
      }


      public function edit($id)
      {
          $row = $this->Lainya_model->get_by_id($id);

          if ($row) {
              $data = array(
                'judul'=>'Edit Buku Tamu',
                'button' => 'update',
                'action' => site_url('buku_tamu/edit_data'),
                'id_buku_tamu' => set_value('id_buku_tamu', $row->id_buku_tamu),
                'penerima' => set_value('penerima', $row->penerima),
                'keperluan' => set_value('keperluan', $row->keperluan),
                'nama_peserta' => set_value('nama_peserta', $row->nama_peserta),
                'instansi_peserta' => set_value('instansi_peserta', $row->instansi_peserta),
                'no_hp_peserta' => set_value('no_hp_peserta', $row->no_hp_peserta),
                'jabatan_peserta' => set_value('jabatan_peserta', $row->jabatan_peserta),
                'tanggal' => set_value('tanggal', $row->tanggal),
              );
              $this->template->load('template','buku_tamu/buku_tamu_edit', $data);
          } else {
              $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
              redirect(site_url('buku_tamu'));
          }
      }

      public function edit_data()
      {
          $this->_rules();

          if ($this->form_validation->run() == FALSE) {
              $this->edit($this->input->post('id_buku_tamu', TRUE));
          } else {
              $data = array(
                'penerima' => $this->input->post('penerima',TRUE),
                'keperluan' => $this->input->post('keperluan',TRUE),
                'nama_peserta' => $this->input->post('nama_peserta',TRUE),
                'instansi_peserta' => $this->input->post('instansi_peserta',TRUE),
                'no_hp_peserta' => $this->input->post('no_hp_peserta',TRUE),
                'jabatan_peserta' => $this->input->post('jabatan_peserta',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
              );
              $this->Buku_tamu_model->update($this->input->post('id_buku_tamu', TRUE), $data);
              $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
              redirect(site_url('buku_tamu'));
          }
      }

      public function hapus($id)
      {
          $row = $this->Lainya_model->get_by_id($id);

          if ($row) {
              $this->Lainya_model->delete($id);
              $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
              redirect(site_url('lainya'));
          } else {
              $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
              redirect(site_url('lainya'));
          }
      }
  public function _rules()
  {
   $this->form_validation->set_rules('agenda', 'agenda', 'trim|required');
   $this->form_validation->set_rules('start_time', 'start time', 'trim|required');
   $this->form_validation->set_rules('end_time', 'end time', 'trim|required');
   $this->form_validation->set_rules('place', 'place', 'trim|required');
   $this->form_validation->set_rules('participan', 'participan', 'trim|required');

   $this->form_validation->set_rules('no_dokumen', 'no dokumen', 'trim|required');
   $this->form_validation->set_rules('no_revisi', 'no revisi', 'trim|required');
   $this->form_validation->set_rules('notulis', 'notulis', 'trim|required');
   $this->form_validation->set_rules('pimpinan_rapat', 'pimpinan rapat', 'trim|required');
   $this->form_validation->set_rules('jenis_rapat', 'jenis rapat', 'trim|required');
   $this->form_validation->set_rules('no_agenda', 'no agenda', 'trim|required');

   $this->form_validation->set_rules('id_notulen', 'id_notulen', 'trim');
   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

 function get_notify(){
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah =  $this->buku_tamu_model->get_notify();
    echo $jumlah->num_rows();
  }
}

}
