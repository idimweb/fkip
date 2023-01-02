<?php

class Test extends CI_Controller
{

    public function index()
    {
        $x['judul'] = 'Hak akses dan login';
        $this->template->load('template', 'test', $x);
    }
}
