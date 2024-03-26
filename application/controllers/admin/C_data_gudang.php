<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_data_gudang extends CI_Controller
{

    public function index()
    {
        $data['gudang'] = $this->db->query("SELECT * FROM tb_barang")->result();
        $data['title'] = 'Halaman Data Gudang- ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '03';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_gudang/V_data_gudang', $data);
        $this->load->view('admin/layout/footer');
    }

    public function Tambah_gudang()
    {
        $this->form_validation->set_rules('nama_brg', 'nama_brg2', 'required|trim|is_unique[tb_gudang.nama_gudang]', [
            'required' => 'Anda Belum Mengisi Nama gudang',
            'is_unique' => 'nama gudang sudah ada'
        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {

            $brg  = $this->input->post('nama_brg');

            $data = array(
                'nama_gudang'                =>    $brg,
            );

            $tambah2 = $this->Mtambah->tambah('tb_gudang', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect('admin/C_data_gudang');
            }
        }
    }
}
