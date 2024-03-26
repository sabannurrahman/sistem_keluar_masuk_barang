<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Halaman Dashboard - OPERATOR';
        $data['menu'] = '0';
        $data['menu_atas'] = '0';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/dashboard/V_dashboard');
        $this->load->view('admin/layout/footer');
    }
}
