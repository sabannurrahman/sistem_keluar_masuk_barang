<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_data_peralatan extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Data Peralatan - Pengelola';
        $data['menu'] = '1';
        $this->load->view('pengelola/layout/header', $data);
        $this->load->view('pengelola/layout/sidebar', $data);
        $this->load->view('pengelola/V_data_peralatan');
        $this->load->view('pengelola/layout/footer');
    }
}
