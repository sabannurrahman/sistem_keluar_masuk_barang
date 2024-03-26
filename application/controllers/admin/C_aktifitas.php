<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_aktifitas extends CI_Controller
{

    public function index()
    {
        $data['aktifitas'] = $this->db->query("SELECT * FROM tb_aktifitas")->result();
        $data['title'] = 'Data Barang Masuk & Keluar - Admin';
        $data['jumlah'] = $this->db->query("SELECT * FROM tb_barang_masuk bm")->result();
        $data['jumlah2'] = $this->db->query("SELECT * FROM tb_barang_keluar")->result();
        $data['menu'] = '1';
        $data['menu_atas'] = '0';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_keluar_masuk/V_aktifitas', $data);
        $this->load->view('admin/layout/footer');
    }


    public function detail_KL($id)
    {

        $data['detail'] = $this->db->query("SELECT * FROM tb_aktifitas ak WHERE $id=ak.id_aktifitas")->result();
        $data['title'] = 'Barang Keluar - ADMIN';
        $data['menu'] = '1';
        $data['menu_atas'] = '0';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_keluar_masuk/V_barang_keluar', $data);
        $this->load->view('admin/layout/footer');
    }

    public function hapus($id)
    {
        $where = array('nik' => $id);
        $this->Mhapus->hapus_data($where, 'tb_user');
        $this->session->set_flashdata('berhasil_hapus', 'true');
        redirect('operator/data_masyarakat');
    }



    public function Tambah_aktifitas()
    {
        $this->form_validation->set_rules('ket', 'ket2', 'required|trim', [
            'required' => 'Keterangan wajin di isi',
        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {

            $tgl2  = $this->input->post('tgl');
            $aktifitas2  = $this->input->post('aktifitas');
            $ket2  = $this->input->post('ket');

            $data = array(
                'aktifitas'                =>    $aktifitas2,
                'tanggal'                =>    $tgl2,
                'ket'                =>    $ket2,
            );

            $tambah2 = $this->Mtambah->tambah('tb_aktifitas', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect('admin/C_aktifitas');
            }
        }
    }
}
