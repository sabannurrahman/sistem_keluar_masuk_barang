<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_barang_masuk extends CI_Controller
{

    public function detail_BM($id)
    {

        $data['masuk'] = $this->db->query("SELECT * FROM tb_barang_masuk bm, tb_barang br WHERE $id=bm.id_aktifitas && br.id_barang=bm.id_barang")->result();
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang")->result();

        $data['detail'] = $this->db->query("SELECT * FROM tb_aktifitas ak WHERE $id=ak.id_aktifitas")->result();
        $data['title'] = 'Barang Masuk - ADMIN';
        $data['menu'] = '1';
        $data['menu_atas'] = '0';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_keluar_masuk/V_barang_masuk', $data);
        $this->load->view('admin/layout/footer');
    }

    public function Tambah_barang()
    {
        $this->form_validation->set_rules('nama_brg', 'nama_brg2', 'required|trim|is_unique[select.nm_select]', [
            'required' => 'Kosong',
            'is_unique' => 'Barang Belum Dipilih'
        ]);
        $this->form_validation->set_rules('jml_brg', 'jml_brg2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Jumlah Barang',
        ]);

        $id2  = $this->input->post('id_aktifitas');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('error');
            $this->detail_BM($id2);
        } else {

            $brg  = $this->input->post('nama_brg');
            $jml  = $this->input->post('jml_brg');
            $jum2 = $this->db->get_where('tb_barang', ['id_barang' => $brg])->row_array();
            $jum3 = $jum2['jumlah'];
            $tot = $jml + $jum3;

            $data = array(
                'jumlah_BM'                =>    $jml,
                'id_barang'                 =>    $brg,
                'id_aktifitas'             =>    $id2,
            );

            $data2 = array(
                'jumlah'                =>    $tot,
            );

            $where = array(
                'id_barang'                 =>     $brg
            );
            $tambah2 = $this->Mtambah->tambah('tb_barang_masuk', $data);

            if ($tambah2 > 0) {
                $this->Medit->update($where, $data2, 'tb_barang');
                $this->session->set_flashdata('berhasil', 'true');
                redirect(base_url('admin/C_barang_masuk/detail_BM/' . $id2));
            }
        }
    }

    public function hapus($id)
    {
        $x = $this->db->get_where('tb_barang_masuk', ['id_BM' => $id])->row_array();
        $id_ak = $x['id_aktifitas'];
        $jum_BM = $x['jumlah_BM'];
        $id_brg = $x['id_barang'];

        $where = array('id_BM' => $id);

        $jum2 = $this->db->get_where('tb_barang', ['id_barang' => $id_brg])->row_array();
        $jum3 = $jum2['jumlah'];
        $tot = $jum3 - $jum_BM;
        $data = array(
            'jumlah'                =>    $tot,
        );
        $where2 = array(
            'id_barang'                 =>     $id_brg
        );

        $this->Medit->update($where2, $data, 'tb_barang');
        $this->Mhapus->hapus_data($where, 'tb_barang_masuk');
        $this->session->set_flashdata('berhasil', 'true');
        redirect(base_url('admin/C_barang_masuk/detail_BM/' . $id_ak));
    }

    public function edit_brg($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_barang tb, tb_barang_masuk tbs WHERE $id=tbs.id_BM && tbs.id_barang=tb.id_barang")->result();
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang")->result();
        $data['title'] = 'Halaman Edit Masuk - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '01';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/V_edit_barang_masuk', $data);
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
            redirect(base_url('admin/C_barang_masuk/detail_BM/' . $id_ak));
        } else {

            $jumlah  = $this->input->post('jml');
            $id_brg2  = $this->input->post('id_brg');
            $id_BM  = $this->input->post('id_BM');


            $jum2 = $this->db->get_where('tb_barang', ['id_barang' => $id_brg2])->row_array();
            $jum3 = $jum2['jumlah'];
            $jum_BM = $this->db->get_where('tb_barang_masuk', ['id_BM' => $id_BM])->row_array();
            $jumBM = $jum_BM['jumlah_BM'];

            $tot = $jum3 - $jumBM;
            $tot2 = $tot + $jumlah;


            $data2 = array(
                'jumlah'                =>    $tot2,
            );
            $where2 = array(
                'id_barang'                 =>     $id_brg2
            );


            $data = array(
                'jumlah_BM'                =>    $jumlah,
                'id_barang'                =>    $id_brg2,
            );
            $where = array(
                'id_BM'                 =>     $id_BM
            );

            $this->Medit->update($where, $data, 'tb_barang_masuk');
            $this->Medit->update($where2, $data2, 'tb_barang');

            $this->session->set_flashdata('berhasil', 'true');
            redirect(base_url('admin/C_barang_masuk/detail_BM/' . $id_ak));
        }
    }
}
