<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok_model extends CI_Model{

	public function tampil_data($where)
	{
		return $this->db->get_where('tb_pengelompokan', $where);
	}

	public function input_data($data)
	{
		$this->db->insert('tb_pengelompokan', $data);
	}

	public function hapus_data($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_pengelompokan');
	}

	public function edit_data($where)
	{
		return $this->db->get_where('tb_pengelompokan', $where);
	}

	public function update_data($data, $where)
	{
		$this->db->where($where);
		$this->db->update('tb_pengelompokan', $data);
	}
}