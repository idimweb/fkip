<?php

class Welcome extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		login_access();
		$this->load->model('Dasboard_model');
	}
	function index()
	{

		$x['judul'] = 'Halaman Administrasi Situs.';
		$x['agenda_by_status'] = $this->Dasboard_model->grafik_by_agenda();
		$x['total'] = $this->Dasboard_model->grafik_total();
		$x['umum'] = $this->Dasboard_model->grafik_umum();
		$x['khusus'] = $this->Dasboard_model->grafik_khusus();
		$x['bukutamu'] = $this->Dasboard_model->grafik_bukutamu();
		$x['kerjasama'] = $this->Dasboard_model->grafik_kerjasama();
		$x['ptki'] = $this->Dasboard_model->grafik_ptki();
		$x['riset'] = $this->Dasboard_model->grafik_riset();
		$x['akademik'] = $this->Dasboard_model->grafik_akademik();
		$x['aik'] = $this->Dasboard_model->grafik_aik();
		$x['litbang'] = $this->Dasboard_model->grafik_litbang();
		// $x['triwulan'] = $this->Dasboard_model->triwulan();
		$x['triwulan1'] = $this->Dasboard_model->triwulan1();
		$x['triwulan2'] = $this->Dasboard_model->triwulan2();
		$x['triwulan3'] = $this->Dasboard_model->triwulan3();
		$x['triwulan4'] = $this->Dasboard_model->triwulan4();
		$this->template->load('template', 'dasboard', $x);
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
