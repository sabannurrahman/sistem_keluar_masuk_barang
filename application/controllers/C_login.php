<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Login User';
        $this->load->view('login', $data);
    }

    public function cek_login()
    {
        $this->form_validation->set_rules('username', 'username2', 'required|trim', [
            'required' => 'Username Masih Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'pass2', 'required|trim', [
            'required' => 'Password Masih Kosong!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('login');
        } else {

            $user2             = $this->input->post('username');
            $pass2             = $this->input->post('password');


            $user3 = $this->db->get_where('tb_user', ['username' => $user2])->row_array();
            if ($user3) {
                if ($pass2 == $user3['password']) {
                    $data = [
                        'nama' => $user3['nama_user'],
                        'level' => $user3['level_user']
                    ];

                    $this->session->set_userdata($data);
                    if ($user3['level_user'] == '1') {
                        redirect('pengelola/C_dashboard');
                    } elseif ($user3['level_user'] == '2') {
                        redirect('admin/C_dashboard');
                    } elseif ($user3['roll_id'] == '3') {
                        redirect('pegawai/data_akun');
                    } else {
                        redirect('C_login');
                    }
                } else {
                    $this->session->set_flashdata('salah', 'true');
                    $this->load->view('login');
                }
            } else {
                $this->session->set_flashdata('salah', 'true');
                $this->load->view('login');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('C_login');
    }
}
