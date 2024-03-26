<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_isi_rab extends CI_Controller
{

    public function isi_rab($id)
    {
        $data['rab'] = $this->db->query("SELECT * FROM tb_rab rb WHERE $id=rb.id_rab")->result();

        $data['detail'] = $this->db->query("SELECT * FROM tb_rab rb, tb_rab_barang ir, tb_barang tbr WHERE $id=ir.id_rab && $id=rb.id_rab && ir.id_barang=tbr.id_barang")->result();
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang tbr WHERE tbr.jumlah>0")->result();
        $data['satuan'] = $this->db->query("SELECT * FROM tb_satuan")->result();
        $data['uraian'] = $this->db->query("SELECT * FROM tb_rab_detail rd WHERE $id=rd.id_rab")->result();

        $data['title'] = 'Cetak RAB - ADMIN';
        $data['menu'] = '3';
        $data['menu_atas'] = '0';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_rab/V_detail_rab', $data);
        $this->load->view('admin/layout/footer');
    }

    public function Tambah_barang()
    {

        $this->form_validation->set_rules('id_brg', 'id_rab2', 'required|trim|is_unique[select.nm_select]', [
            'required' => 'Anda Belum Mengisi Nama Buyer',
            'is_unique' => 'belum memilih barang'
        ]);

        $this->form_validation->set_rules('jml_brg', 'jml_brg2', 'required|trim', [
            'required' => 'Anda Belum Mengisi Jumlah Barang',
        ]);

        $id2  = $this->input->post('id_rab');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('error');
            $this->isi_rab($id2);
        } else {

            $id_brg  = $this->input->post('id_brg');
            $jml_brg  = $this->input->post('jml_brg');


            $data = array(
                'jumlah_rab_brg'                =>    $jml_brg,
                'id_barang'                 =>    $id_brg,
                'id_rab'             =>    $id2,
            );

            $tambah2 = $this->Mtambah->tambah('tb_rab_barang', $data);

            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect(base_url('admin/C_isi_rab/isi_rab/' . $id2));
            }
        }
    }


    public function Tambah_uraian()
    {
        $this->form_validation->set_rules('uraian', 'uraian2', 'required|trim', [
            'required' => 'Anda Belum Mengisi uraian',
        ]);

        $id2  = $this->input->post('id_rab');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('error');
            $this->isi_rab($id2);
        } else {

            $uraian2  = $this->input->post('uraian');
            $jumlah  = $this->input->post('jumlah');
            $satuan  = $this->input->post('satuan');
            $periode  = $this->input->post('periode');
            $tgl  = $this->input->post('tgl');



            $data = array(
                'uraian_rd'          =>    $uraian2,
                'tgl_kebutuhan'      =>    $tgl,
                'jumlah'             =>    $jumlah,
                'periode'            =>    $periode,
                'satuan'             =>    $satuan,
                'id_rab'             =>    $id2,
            );

            $tambah2 = $this->Mtambah->tambah('tb_rab_detail', $data);

            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                redirect(base_url('admin/C_isi_rab/isi_rab/' . $id2));
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
        $this->load->view('admin/data_rab/V_edit_barang_masuk', $data);
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

    public function print($id)
    {
        $data['barang'] = $this->db->query("SELECT * FROM tb_rab rb, tb_rab_barang ir, tb_barang tbr WHERE $id=ir.id_rab && $id=rb.id_rab && ir.id_barang=tbr.id_barang")->result();
        $data['print2'] = $this->db->query("SELECT * FROM tb_rab rb, tb_perusahaan tp, tb_buyer tby WHERE $id=rb.id_rab && tp.id_perusahaan=rb.id_perusahaan && rb.id_buyer=tby.id_buyer ")->result();
        $this->load->view('admin/V_print_rab', $data);
    }
}
