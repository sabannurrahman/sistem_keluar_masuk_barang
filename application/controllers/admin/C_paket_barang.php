<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_paket_barang extends CI_Controller
{

    public function index()
    {
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang tb WHERE tb.jenis=1")->result();
        $data['satuan'] = $this->db->query("SELECT * FROM tb_satuan")->result();
        $data['title'] = 'Halaman Paket Barang - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '07';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_paket_barang/V_paket_barang', $data);
        $this->load->view('admin/layout/footer');
    }

    public function Tambah_barang()
    {
        $this->form_validation->set_rules('nama_brg', 'nama_brg2', 'required|trim|is_unique[tb_barang.nama_barang]', [
            'required' => 'Anda Belum Mengisi Nama Paket',
            'is_unique' => 'nama Paket sudah ada'
        ]);
        $this->form_validation->set_rules('harga_brg', 'harga_brg2', 'required|trim', [
            'required' => 'Anda Belum Mengisi harga sewa',

        ]);
        $this->form_validation->set_rules('satuan', 'satuan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi satuan',

        ]);


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {

            $config['upload_path'] = '././assets/barang';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('error');
                $this->index();
            } else {
                $gambar2 = $this->upload->data('file_name');
            }

            $brg  = $this->input->post('nama_brg');
            $st  = $this->input->post('satuan');
            $sewa  = $this->input->post('harga_brg');
            $jum = 0;
            $jenis = 1;



            $data = array(
                'nama_barang'                =>    $brg,
                'harga_sewa'                =>    $sewa,
                'jumlah'                    =>    $jum,
                'satuan'                         =>    $st,
                'gambar_brg'                         =>    $gambar2,
                'jenis'                         =>    $jenis,

            );

            $tambah2 = $this->Mtambah->tambah('tb_barang', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect('admin/C_paket_barang');
            }
        }
    }

    public function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->Mhapus->hapus_data($where, 'tb_barang');
        $this->session->set_flashdata('berhasil', 'true');
        redirect('admin/C_paket_barang');
    }

    public function edit_brg($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_barang tb WHERE $id=tb.id_barang")->result();
        $data['satuan'] = $this->db->query("SELECT * FROM tb_satuan")->result();
        $data['title'] = 'Halaman Edit Paket Barang - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '07';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_paket_barang/V_edit_paket_barang', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_brg', 'nama_brg2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Nama Barang',
        ]);
        $this->form_validation->set_rules('harga_brg', 'harga_brg2', 'required|trim', [
            'required' => 'Anda Belum Mengisi harga Barang',

        ]);
        $this->form_validation->set_rules('satuan', 'satuan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi satuan',
        ]);
        $id_brg  = $this->input->post('id_brg');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->edit_brg($id_brg);
        } else {

            $brg  = $this->input->post('nama_brg');
            $st  = $this->input->post('satuan');
            $sewa  = $this->input->post('harga_brg');


            $data = array(
                'nama_barang'                =>    $brg,
                'harga_sewa'                =>    $sewa,
                'satuan'                         =>    $st,
            );
            $where = array(
                'id_barang'                 =>     $id_brg
            );

            $this->Medit->update($where, $data, 'tb_barang');

            $this->session->set_flashdata('berhasil', 'true');
            redirect('admin/C_paket_barang');
        }
    }
}
