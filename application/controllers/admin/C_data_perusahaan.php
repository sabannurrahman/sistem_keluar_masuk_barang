<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_data_perusahaan extends CI_Controller
{

    public function index()
    {
        $data['perusahaan'] = $this->db->query("SELECT * FROM tb_perusahaan")->result();
        $data['title'] = 'Halaman Data perusahaan - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '04';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_perusahaan/V_data_perusahaan', $data);
        $this->load->view('admin/layout/footer');
    }
    public function Tambah_perusahaan()
    {
        $this->form_validation->set_rules('namaPR', 'nama2', 'required|trim|is_unique[tb_perusahaan.nama_perusahaan]', [
            'required' => 'Anda Belum Mengisi Nama perusahaan',
            'is_unique' => 'perusahaan sudah ada'
        ]);

        $this->form_validation->set_rules('alamatPR', 'alamat2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Alamat perusahaan',

        ]);

        $this->form_validation->set_rules('emailPR', 'email2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Email perusahaan',

        ]);

        $this->form_validation->set_rules('nohpPR', 'nohp2', 'required|trim', [
            'required' => 'Anda Belum Mengisi nohp perusahaan',

        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {

            $namaPR2  = $this->input->post('namaPR');
            $alamatPR2  = $this->input->post('alamatPR');
            $nohpPR2  = $this->input->post('nohpPR');
            $emailPR2  = $this->input->post('emailPR');
            $data = array(
                'nama_perusahaan'                =>    $namaPR2,
                'alamat_perusahaan'                =>    $alamatPR2,
                'email_perusahaan'                =>    $emailPR2,
                'no_hp_perusahaan'                =>    $nohpPR2,
            );

            $tambah2 = $this->Mtambah->tambah('tb_perusahaan', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect('admin/C_data_perusahaan');
            }
        }
    }

    public function hapus($id)
    {
        $where = array('id_perusahaan' => $id);
        $this->Mhapus->hapus_data($where, 'tb_perusahaan');
        $this->session->set_flashdata('berhasil', 'true');
        redirect('admin/C_data_perusahaan');
    }

    public function edit_perusahaan($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_perusahaan tp WHERE $id=tp.id_perusahaan")->result();

        $data['title'] = 'Halaman Edit Perusahaan - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '04';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_perusahaan/V_edit_perusahaan', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Nama perusahaan',

        ]);

        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat_perusahaan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Alamat perusahaan',
        ]);
        $this->form_validation->set_rules('email_perusahaan', 'email_perusahaan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi email perusahaan',
        ]);
        $this->form_validation->set_rules('no_hp_perusahaan', 'no_hp_perusahaan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi no hp perusahaan',
        ]);


        $id_perusahaan  = $this->input->post('id_perusahaan');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->edit_perusahaan($id_perusahaan);
        } else {

            $nama  = $this->input->post('nama_perusahaan');
            $alamat  = $this->input->post('alamat_perusahaan');
            $email  = $this->input->post('email_perusahaan');
            $no_hp  = $this->input->post('no_hp_perusahaan');

            $data = array(
                'nama_perusahaan'                =>    $nama,
                'alamat_perusahaan'                =>    $alamat,
                'email_perusahaan'                =>    $email,
                'no_hp_perusahaan'                =>    $no_hp,
            );
            $where = array(
                'id_perusahaan'                 =>     $id_perusahaan
            );

            $this->Medit->update($where, $data, 'tb_perusahaan');

            $this->session->set_flashdata('berhasil', 'true');
            redirect('admin/C_data_perusahaan');
        }
    }
}
