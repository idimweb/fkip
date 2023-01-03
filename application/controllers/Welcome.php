<?php

class Welcome extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		login_access();
		$this->load->model('Dasboard_model');
		$this->load->helper(array('url', 'html', 'form', 'security', 'uri'));
	}
	function index()
	{

		$x['judul'] = 'Halaman Administrasi Situs.';
		$x['agenda_by_status'] = $this->Dasboard_model->grafik_by_agenda();
		$x['total'] = $this->Dasboard_model->grafik_total();
		$x['total_per'] = $this->Dasboard_model->grafik_total_per();
		$x['tabel_total'] = $this->Dasboard_model->tabel_total();
		$x['tabel_total_per'] = $this->Dasboard_model->tabel_total_per();
		$this->template->load('template', 'dasboard', $x);
	}

	function peserta_bidang($id)
	{
		$id = decrypt_url($id);

		$x['judul'] = 'Halaman Jumlah Peserta Tim Kerja.';
		$x['bidang'] = $this->Dasboard_model->aktiv_per_bidang($id);
		$x['prodi'] = $this->Dasboard_model->aktiv_per_prodi($id);
		$this->template->load('template', 'lihat_bidang', $x);
	}

	public function kalendar($tahun = NULL, $bulan = NULL)
	{
		$kalender = array(
			'start_day' 		=> 'monday',
			'show_next_prev'	=> TRUE,
			'next_prev_url'		=> base_url() . "/welcome/kalendar"
		);
		$this->load->library('calendar', $kalender);
		$data['kalender'] = $this->calendar->generate($tahun, $bulan);
		$this->load->view('template', 'dasboard', $data);
	}

	function logout()
	{

		$this->session->sess_destroy();
		redirect(base_url('?stat=1'));
	}


	function _404()
	{
		$x['judul'] = '404 Halaman Tidak Di Temukan.';
		$this->template->load('template', '404', $x);
	}
}
