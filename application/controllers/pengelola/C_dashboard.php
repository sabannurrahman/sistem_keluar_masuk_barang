<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard - PENGELOLA';
        $data['menu'] = '0';
        $data['menu_atas'] = '0';
        $this->load->view('pengelola/layout/header', $data);
        $this->load->view('pengelola/layout/sidebar', $data);
        $this->load->view('pengelola/V_dashboard');
        $this->load->view('pengelola/layout/footer');
    }
}
