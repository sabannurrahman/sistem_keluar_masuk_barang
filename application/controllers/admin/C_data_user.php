<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_data_user extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->query("SELECT * FROM tb_user")->result();
        $data['title'] = 'Data User - Admin';
        $data['menu'] = '3';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/V_data_user', $data);
        $this->load->view('admin/layout/footer');
    }

    public function Tambah_user()
    {
        $this->form_validation->set_rules('nama', 'nama2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Nama',
        ]);

        $this->form_validation->set_rules('username', 'username2', 'required|trim|is_unique[tb_user.username]|min_length[5]|max_length[15]', [
            'required' => 'Anda Belum Mengisi username',
            'is_unique' => 'Username sudah ada'
        ]);
        $this->form_validation->set_rules('password', 'password1', 'required|trim', [
            'required' => 'Anda Belum Mengisi password',
            'min_length' => 'Password Kurang dari 5 karakter',
            'matches' => 'Password yang anda masukan beda'
        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {


            $nama3  = htmlspecialchars($this->input->post('nama', true));
            $username3    = $this->input->post('username');
            $pass        = $this->input->post('password');
            $level        = $this->input->post('level');
            $studio3        = $this->input->post('studio');

            $data = array(
                'username'                  =>    $username3,
                'password'                  =>    $pass,
                'level_user'                =>    $level,
                'nama_user'                 =>    $nama3,
                'id_studio'                =>    $studio3,
            );

            $tambah2 = $this->Mtambah->tambah('tb_user', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil_tambah_user', 'true');
                redirect('admin/C_data_user');
            }
        }
    }
}
