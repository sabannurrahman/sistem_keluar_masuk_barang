<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medit extends CI_Model {

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
  
	}

	
}
