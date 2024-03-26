<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kasbon_operasional extends CI_Controller
{

    public function index()
    {
        $data['kasbon_operasional'] = $this->db->query("SELECT * FROM tb_kasbon_operasional")->result();
        $data['title'] = 'Halaman Kasbon operasional - ADMIN';
        $data['menu'] = '5';
        $data['menu_atas'] = '11';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_kasbon_operasional/V_kasbon_operasional', $data);
        $this->load->view('admin/layout/footer');
    }
    public function Tambah_kasbon()
    {
        $this->form_validation->set_rules('nama', 'nama2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Nama Penerima',
        ]);

        $this->form_validation->set_rules('tgl', 'tgl2', 'required|trim', [
            'required' => 'Anda Belum Mengisi tanggal'
        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {

            $penerima  = $this->input->post('nama');
            $tgl  = $this->input->post('tgl');
            $data = array(
                'penerima'                =>    $penerima,
                'tanggal'                =>    $tgl,
            );

            $tambah2 = $this->Mtambah->tambah('tb_kasbon_operasional', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect('admin/C_kasbon_operasional');
            }
        }
    }

    public function hapus($id)
    {
        $where = array('id_ko' => $id);
        $this->Mhapus->hapus_data($where, 'tb_kasbon_operasional');
        $this->Mhapus->hapus_data($where, 'tb_kasbon_operasional_detail');
        $this->session->set_flashdata('berhasil', 'true');
        redirect('admin/C_kasbon_operasional');
    }

    public function edit_satuan($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_satuan ts WHERE $id=ts.id_satuan")->result();

        $data['title'] = 'Halaman Edit Satuan - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '02';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/V_edit_satuan', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_satuan', 'nama_satuan2', 'required|trim|is_unique[tb_satuan.nama_satuan]', [
            'required' => 'Anda Belum Mengisi Nama Satuan',
            'is_unique' => 'Satuan Tidak Boleh Sama'
        ]);

        $id_satuan  = $this->input->post('id_satuan');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->edit_satuan($id_satuan);
        } else {

            $satuan  = $this->input->post('nama_satuan');

            $data = array(
                'nama_satuan'                =>    $satuan,
            );
            $where = array(
                'id_satuan'                 =>     $id_satuan
            );

            $this->Medit->update($where, $data, 'tb_satuan');

            $this->session->set_flashdata('berhasil', 'true');
            redirect('admin/C_data_satuan');
        }
    }
}
