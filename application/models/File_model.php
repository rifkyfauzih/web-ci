<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model{

	public function insert($data)
	{
		return $this->db->insert('tb_surat_permohonan', $data);
	}

	public function upload_data($data)
	{
		$this->db->insert('tb_berkas', $data);
	}
}