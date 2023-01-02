<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Akses extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('id_user') != '' or $this->session->userdata('Login') == TRUE) {
      redirect(base_url('welcome?login=true'));
      exit();
    };
  }
  public function index()
  {
    $x['judul'] = 'Sistem Kegiatan/Program Kerja';
    $this->load->view('Login', $x);
  }

  function login()
  {
    if ($this->input->post('username') == '' or $this->input->post('username') == '') {
      redirect(base_url('?login=false'));
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $cek = $this->db->limit(1)->get_where('login', array('username' => $username, 'password' => md5($password)));

      if ($cek->num_rows() > 0) {
        $session = [
          'username' => $cek->row()->username,
          'password' => $cek->row()->password,
          'nama' => $cek->row()->nama,
          'id_user' => $cek->row()->id_user,
          'level' => $cek->row()->level,
          'login' => TRUE,
        ];
        $this->session->set_userdata($session);
        echo "y";
      } else {
        echo "n";
      }
    }
  }
}
