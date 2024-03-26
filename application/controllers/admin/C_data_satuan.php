<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_data_satuan extends CI_Controller
{

    public function index()
    {
        $data['satuan'] = $this->db->query("SELECT * FROM tb_satuan")->result();
        $data['title'] = 'Halaman Data Satuan - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '02';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_satuan/V_data_satuan', $data);
        $this->load->view('admin/layout/footer');
    }
    public function Tambah_satuan()
    {
        $this->form_validation->set_rules('satuan', 'satuan2', 'required|trim|is_unique[tb_satuan.nama_satuan]', [
            'required' => 'Anda Belum Mengisi Satuan',
            'is_unique' => 'Satuan sudah ada'
        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {

            $satuan  = $this->input->post('satuan');

            $data = array(
                'nama_satuan'                =>    $satuan,
            );

            $tambah2 = $this->Mtambah->tambah('tb_satuan', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect('admin/C_data_satuan');
            }
        }
    }

    public function hapus($id)
    {
        $where = array('id_satuan' => $id);
        $this->Mhapus->hapus_data($where, 'tb_satuan');
        $this->session->set_flashdata('berhasil', 'true');
        redirect('admin/C_data_satuan');
    }

    public function edit_satuan($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_satuan ts WHERE $id=ts.id_satuan")->result();

        $data['title'] = 'Halaman Edit Satuan - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '02';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_satuan/V_edit_satuan', $data);
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
