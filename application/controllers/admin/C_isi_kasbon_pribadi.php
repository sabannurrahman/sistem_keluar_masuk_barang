<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_isi_kasbon_operasional extends CI_Controller
{

    public function isi($id)
    {
        $data['kasbon_operasional'] = $this->db->query("SELECT * FROM tb_kasbon_operasional_detail kp WHERE $id=kp.id_kp")->result();
        $data['id_kp'] = $id;
        $data['title'] = 'Halaman Kasbon operasional - ADMIN';
        $where = $this->db->get_where('tb_kasbon_operasional', ['id_kp' => $id])->row_array();
        $data['tanggal'] = $where['tanggal'];
        $data['menu'] = '5';
        $data['menu_atas'] = '11';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_kasbon_operasional/V_isi_kasbon_operasional', $data);
        $this->load->view('admin/layout/footer');
    }
    public function Tambah_kasbon()
    {
        $this->form_validation->set_rules('ket', 'keterangan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi keterangan',
        ]);

        $this->form_validation->set_rules('jumlah', 'jumlah2', 'required|trim', [
            'required' => 'Anda Belum Mengisi jumlah'
        ]);
        $id_kp  = $this->input->post('id_kp');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->index();
        } else {


            $keterangan  = $this->input->post('ket');
            $jumlah  = $this->input->post('jumlah');
            $data = array(
                'keterangan'                =>    $keterangan,
                'jumlah'                =>    $jumlah,
                'id_kp'                =>    $id_kp,

            );

            $tambah2 = $this->Mtambah->tambah('tb_kasbon_operasional_detail', $data);
            if ($tambah2 > 0) {
                $this->session->set_flashdata('berhasil', 'true');
                $this->isi($id_kp);
                // redirect(base_url('admin/C_isi_kasbon_operasional/isi/' . $id_kp));
            }
        }
    }

    public function hapus($id)
    {
        $where = array('id_kp_detail' => $id);
        $where = $this->db->get_where('tb_kasbon_operasional_detail', ['id_kp_detail' => $id])->row_array();
        $id2 = $where['id_kp'];

        $this->Mhapus->hapus_data($where, 'tb_kasbon_operasional_detail');


        $this->session->set_flashdata('berhasil', 'true');
        redirect(base_url('admin/C_isi_kasbon_operasional/isi/' . $id2));
    }

    public function edit_isi($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_kasbon_operasional_detail kt WHERE $id=kt.id_kp_detail")->result();
        var_dump($data['detail']);

        $data['title'] = 'Halaman Edit Isi Kasbon operasional - ADMIN';
        $data['menu'] = '5';
        $data['menu_atas'] = '11';

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/data_kasbon_operasional/V_edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('keterangan', 'keterangan2', 'required|trim', [
            'required' => 'Anda Belum Mengisi keterangan',
        ]);
        $this->form_validation->set_rules('harga', 'harga2', 'required|trim', [
            'required' => 'Anda Belum Mengisi jumlah',
        ]);

        $id  = $this->input->post('id_kp_detail');
        $where = $this->db->get_where('tb_kasbon_operasional_detail', ['id_kp_detail' => $id])->row_array();
        $id_kp = $where['id_kp'];

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error');
            $this->edit_isi($id);
        } else {

            $keterangan2  = $this->input->post('keterangan');
            $harga2  = $this->input->post('harga');


            $data = array(
                'keterangan'                =>    $keterangan2,
                'jumlah'                =>    $harga2,

            );
            $where = array(
                'id_kp_detail'                 =>     $id
            );

            $this->Medit->update($where, $data, 'tb_kasbon_operasional_detail');

            $this->session->set_flashdata('berhasil', 'true');
            redirect(base_url('admin/C_isi_kasbon_operasional/isi/' . $id_kp));
        }
    }

    public function excel()
    {
        $data['kasbon_operasional'] = $this->db->query("SELECT * FROM tb_kasbon_operasional_detail")->result();

        require(APPPATH . 'PHPExcel/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("Hizbullah");
        $object->getProperties()->setLastModifiedBy("Hizbullah");
        $object->getProperties()->setTitle("Kasbon operasional");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'Keterangan');
        $object->getActiveSheet()->setCellValue('C1', 'Jumlah');

        $baris = 2;
        $no = 1;

        foreach ($kasbon_operasional as $kp) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $kp->keterangan);
            $object->getActiveSheet()->setCellValue('C' . $baris, $kp->jumlah);

            $baris++;
        }

        $filename = "Data Kasbon operasional" . '.xlsx';
        $object->getActiveSheet()->setTitle("Data Kasbon operasional");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attechment;filename="' . $filename . '"');
        header('Cache-Control : max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }


    public function print($id)
    {
        $data['print'] = $this->db->query("SELECT * FROM tb_kasbon_operasional_detail kpd, tb_kasbon_operasional kp WHERE $id=kpd.id_kp && $id=kp.id_kp")->result();
        $where = $this->db->get_where('tb_kasbon_operasional', ['id_kp' => $id])->row_array();

        $data['tanggal'] = $where['tanggal'];
        $this->load->view('admin/data_kasbon_operasional/V_print_kasbon_operasional', $data);
    }
}
