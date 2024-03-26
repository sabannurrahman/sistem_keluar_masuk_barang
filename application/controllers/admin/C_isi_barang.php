<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_isi_barang extends CI_Controller
{

    public function isi_barang($id2)
    {

        $data['isi'] = $this->db->query("SELECT * FROM tb_isi_barang isi, tb_barang tr  WHERE  isi.id_barang=tr.id_barang && $id2=isi.id_paket")->result();
        $data['detail'] = $this->db->query("SELECT * FROM tb_barang ts WHERE $id2=ts.id_barang")->result();
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang tb WHERE tb.jenis=0")->result();
        $data['id'] = $id2;

        $data['title'] = 'Isi Barang - ADMIN';
        $data['menu'] = '9';
        $data['menu_atas'] = '07';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_paket_barang/V_isi_barang', $data);
        $this->load->view('admin/layout/footer');
    }

    public function Tambah_barang()
    {
        $this->form_validation->set_rules('nama_isi', 'nama_isi2', 'required|trim|is_unique[select.nm_select]', [
            'required' => 'Kosong',
            'is_unique' => 'Barang Belum Dipilih'
        ]);


        $id2  = $this->input->post('id_br');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('error');
            $this->isi_barang($id2);
        } else {

            $brg  = $this->input->post('nama_isi');


            $data = array(
                'id_barang'                 =>    $brg,
                'id_paket'                  => $id2

            );

            $tambah2 = $this->Mtambah->tambah('tb_isi_barang', $data);

            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                // $this->isi_barang($id2);
                redirect(base_url() . "admin/C_isi_barang/isi_barang/" . $id2);
            }
        }
    }

    public function hapus($id)
    {

        $where = $this->db->get_where('tb_isi_barang', ['id_isi' => $id])->row_array();
        $id_brg = $where['id_paket'];


        $this->Mhapus->hapus_data($where, 'tb_isi_barang');
        $this->session->set_flashdata('berhasil', 'true');
        redirect(base_url('admin/C_isi_barang/isi_barang/' . $id_brg));
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
        $this->load->view('admin/data_barang/V_edit_barang_masuk', $data);
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
