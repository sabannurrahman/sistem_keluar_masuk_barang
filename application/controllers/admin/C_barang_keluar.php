<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_barang_keluar extends CI_Controller
{

    public function detail_KL($id)
    {
        $data['keluar'] = $this->db->query("SELECT * FROM tb_barang_keluar bk, tb_barang br WHERE $id=bk.id_aktifitas && br.id_barang=bk.id_barang")->result();
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang")->result();
        $data['detail'] = $this->db->query("SELECT * FROM tb_aktifitas ak WHERE $id=ak.id_aktifitas")->result();
        $data['title'] = 'Barang Masuk - ADMIN';
        $data['menu'] = '1';
        $data['menu_atas'] = '0';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_keluar_masuk/V_barang_keluar', $data);
        $this->load->view('admin/layout/footer');
    }

    public function Tambah_barang()
    {



        $this->form_validation->set_rules('nama_brg', 'nama_brg2', 'required|trim|is_unique[select.nm_select]', [
            'required' => 'Kosong',
            'is_unique' => 'Barang Belum Dipilih'
        ]);
        $this->form_validation->set_rules('brg_KL', 'jml_brg2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Jumlah Barang keluar',
        ]);

        $id2  = $this->input->post('id_aktifitas');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('error');
            $this->detail_KL($id2);
        } else {

            $jml  = $this->input->post('brg_KL');
            $brg  = $this->input->post('nama_brg');
            $jum2 = $this->db->get_where('tb_barang', ['id_barang' => $brg])->row_array();
            $jum3 = $jum2['jumlah'];

            $tot = $jum3 - $jml;

            $data = array(
                'jumlah_BK'                =>    $jml,
                'id_barang'                 =>    $brg,
                'id_aktifitas'             =>    $id2,
            );

            $data2 = array(
                'jumlah'                =>    $tot,
            );

            $where = array(
                'id_barang'                 =>     $brg
            );
            $tambah2 = $this->Mtambah->tambah('tb_barang_KELUAR', $data);

            if ($tambah2 > 0) {
                $this->Medit->update($where, $data2, 'tb_barang');
                $this->session->set_flashdata('berhasil', 'true');
                redirect(base_url('admin/C_barang_keluar/detail_KL/' . $id2));
            }
        }
    }

    public function hapus($id)
    {
        $x = $this->db->get_where('tb_barang_keluar', ['id_BK' => $id])->row_array();
        $id_ak = $x['id_aktifitas'];
        $jum_BK = $x['jumlah_BK'];
        $id_brg = $x['id_barang'];

        $where = array('id_BK' => $id);

        $jum2 = $this->db->get_where('tb_barang', ['id_barang' => $id_brg])->row_array();
        $jum3 = $jum2['jumlah'];
        $tot = $jum3 + $jum_BK;
        $data = array(
            'jumlah'                =>    $tot,
        );
        $where2 = array(
            'id_barang'                 =>     $id_brg
        );

        $this->Medit->update($where2, $data, 'tb_barang');
        $this->Mhapus->hapus_data($where, 'tb_barang_keluar');
        $this->session->set_flashdata('berhasil', 'true');
        redirect(base_url('admin/C_barang_keluar/detail_KL/' . $id_ak));
    }

    public function edit_brg($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_barang tb, tb_barang_keluar tk WHERE $id=tk.id_BK && tk.id_barang=tb.id_barang")->result();
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang")->result();
        $data['title'] = 'Halaman Edit Barang Keluar - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '01';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/V_edit_barang_keluar', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {

        $this->form_validation->set_rules('jml', 'jml2', 'required|trim', [
            'required' => 'Anda Belum Mengisi jumlah Barang',
        ]);

        $id_ak  = $this->input->post('id_aktifitas');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            redirect(base_url('admin/C_barang_keluar/detail_BK/' . $id_ak));
        } else {

            $jumlah  = $this->input->post('jml');
            $id_brg2  = $this->input->post('id_brg');
            $id_BK  = $this->input->post('id_BK');


            $jum2 = $this->db->get_where('tb_barang', ['id_barang' => $id_brg2])->row_array();
            $jum3 = $jum2['jumlah'];
            $jum_BK = $this->db->get_where('tb_barang_keluar', ['id_BK' => $id_BK])->row_array();
            $jumBK = $jum_BK['jumlah_BK'];

            $tot = $jum3 - $jumBK;
            $tot2 = $tot + $jumlah;


            $data2 = array(
                'jumlah'                =>    $tot2,
            );
            $where2 = array(
                'id_barang'                 =>     $id_brg2
            );


            $data = array(
                'jumlah_BK'                =>    $jumlah,
                'id_barang'                =>    $id_brg2,
            );
            $where = array(
                'id_BK'                 =>     $id_BK
            );

            $this->Medit->update($where, $data, 'tb_barang_keluar');
            $this->Medit->update($where2, $data2, 'tb_barang');

            $this->session->set_flashdata('berhasil', 'true');
            redirect(base_url('admin/C_barang_keluar/detail_BK/' . $id_ak));
        }
    }
}
