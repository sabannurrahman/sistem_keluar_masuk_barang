<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan extends CI_Controller
{


    public function index()
    {
        $data['buyer'] = $this->db->query("SELECT * FROM tb_buyer")->result();
        $data['perusahaan'] = $this->db->query("SELECT * FROM tb_perusahaan")->result();

        $data['title'] = 'Halaman Cetak laporan - ADMIN';
        $data['menu'] = '4';
        $data['menu_atas'] = '0';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/V_laporan', $data);
        $this->load->view('admin/layout/footer');
    }


    public function hapus($id)
    {
        $where = array('nik' => $id);
        $this->Mhapus->hapus_data($where, 'tb_user');
        $this->session->set_flashdata('berhasil_hapus', 'true');
        redirect('operator/data_masyarakat');
    }



    public function Tambah_laporan()
    {
        $this->form_validation->set_rules('id_buyer', 'id_buyer2', 'required|trim|is_unique[select.nm_select]', [
            'required' => 'Anda Belum Mengisi Nama Buyer',
            'is_unique' => 'belum memilih buyer'
        ]);

        $this->form_validation->set_rules('id_perusahaan', 'id_perusahaan2', 'required|trim|is_unique[select.nm_select]', [
            'required' => 'Anda Belum Mengisi Nama perusahaan',
            'is_unique' => 'belum memilih perusahaan'
        ]);

        $this->form_validation->set_rules('no_po', 'no_po2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Nomor PO',
        ]);
        $this->form_validation->set_rules('tgl', 'tgl2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Tanggal',
        ]);

        $this->form_validation->set_rules('catatan', 'catatan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi catatan',
        ]);



        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {
            $no_po2  = $this->input->post('no_po');
            $tgl2  = $this->input->post('tgl');
            $buyer2  = $this->input->post('id_buyer');
            $perusahaan2  = $this->input->post('id_perusahaan');
            $catatan2  = $this->input->post('catatan');

            $data = array(
                'tanggal_po'                =>    $tgl2,
                'no_po'                     =>    $no_po2,
                'id_buyer'                  =>    $buyer2,
                'id_perusahaan'             =>    $perusahaan2,
                'catatan'                   =>    $catatan2,
            );

            $tambah2 = $this->Mtambah->tambah('tb_rab', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect('admin/C_rab');
            }
        }
    }
}
