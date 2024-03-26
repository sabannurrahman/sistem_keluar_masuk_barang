<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_data_buyer extends CI_Controller
{

    public function index()
    {
        $data['buyer'] = $this->db->query("SELECT * FROM tb_buyer")->result();
        $data['title'] = 'Halaman Data Buyer - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '05';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_buyer/V_data_buyer', $data);
        $this->load->view('admin/layout/footer');
    }
    public function Tambah_buyer()
    {
        $this->form_validation->set_rules('namaBY', 'nama2', 'required|trim|is_unique[tb_perusahaan.nama_perusahaan]', [
            'required' => 'Anda Belum Mengisi Nama buyer',
            'is_unique' => 'buyer sudah ada'
        ]);

        $this->form_validation->set_rules('emailBY', 'email2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Email buyer',

        ]);

        $this->form_validation->set_rules('nohpBY', 'nohp2', 'required|trim', [
            'required' => 'Anda Belum Mengisi nohp buyer',

        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {

            $namaBY2  = $this->input->post('namaBY');

            $nohpBY2  = $this->input->post('nohpBY');
            $emailBY2  = $this->input->post('emailBY');
            $data = array(
                'nama_buyer'                =>    $namaBY2,
                'email_buyer'                =>    $emailBY2,
                'email_buyer'                =>    $nohpBY2,
            );

            $tambah2 = $this->Mtambah->tambah('tb_buyer', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect('admin/C_data_buyer');
            }
        }
    }

    public function hapus($id)
    {
        $where = array('id_buyer' => $id);
        $this->Mhapus->hapus_data($where, 'tb_buyer');
        $this->session->set_flashdata('berhasil', 'true');
        redirect('admin/C_data_buyer');
    }

    public function edit_buyer($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_buyer ts WHERE $id=ts.id_buyer")->result();

        $data['title'] = 'Halaman Edit buyer - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '05';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_buyer/V_edit_buyer', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_buyer', 'nama_buyer2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Nama buyer',
        ]);

        $this->form_validation->set_rules('no_hp_buyer', 'no_hp_buyer2', 'required|trim', [
            'required' => 'Anda Belum Mengisi no hp buyer',
        ]);

        $this->form_validation->set_rules('email_buyer', 'email_buyer2', 'required|trim', [
            'required' => 'Anda Belum Mengisi no hp buyer',
        ]);


        $id_buyer  = $this->input->post('id_buyer');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->edit_satuan($id_buyer);
        } else {

            $nama  = $this->input->post('nama_buyer');
            $no_hp  = $this->input->post('no_hp_buyer');
            $email  = $this->input->post('email_buyer');

            $data = array(
                'nama_buyer'                =>    $nama,
                'no_hp_buyer'                =>    $no_hp,
                'email_buyer'                =>    $email,
            );
            $where = array(
                'id_buyer'                 =>     $id_buyer
            );

            $this->Medit->update($where, $data, 'tb_buyer');

            $this->session->set_flashdata('berhasil', 'true');
            redirect('admin/C_data_buyer');
        }
    }
}
