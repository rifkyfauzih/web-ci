<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model{

	public function login($email, $password)
	{
		$this->db->select('email_institusi,password,level');
		$this->db->from('user');
		$this->db->where('email_institusi',$email);
		$this->db->where('password',$password);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows()==1) {
			return $query->result();
		} else {
			return false;
		}
	}
}