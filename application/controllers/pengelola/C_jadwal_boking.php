<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jadwal_boking extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Jadwal Boking - Pengelola';
        $data['menu'] = '2';
        $this->load->view('pengelola/layout/header', $data);
        $this->load->view('pengelola/layout/sidebar', $data);
        $this->load->view('pengelola/V_jadwal_boking');
        $this->load->view('pengelola/layout/footer');
    }
}
