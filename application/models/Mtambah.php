<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtambah extends CI_Model
{

	public function tambah($nama_tabel, $data)
	{
		$tambah = $this->db->insert($nama_tabel, $data);
		return $tambah;
	}
}
