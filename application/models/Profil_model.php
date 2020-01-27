<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model{

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('user', $data);
	}
}