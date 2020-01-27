<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email_institusi', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false ) {
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
		
	}

	private function _login ()
	{
		$this->load->model('Level_model');
		$email = $this->input->post('email_institusi', true);
		$password = md5($this->input->post('password'));
		$user = $this->db->get_where('user', ['email_institusi' => $email])->row_array();

		if ($user) {

			if($user['is_active'] == 1) {

				if ($password == $user['password']) {


					$ceklogin = $this->Level_model->login($email, $password);

					if ($ceklogin) {
						foreach ($ceklogin as $row);
						$this->session->set_userdata('email_institusi', $row->email_institusi);
						$this->session->set_userdata('level', $row->level);
						
						if ($this->session->userdata('level') == 1) {
							redirect('admin/index');

						} elseif ($this->session->userdata('level') == 2) {
							redirect('user');
						}

					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		  				Email atau Password salah!</div>');
						redirect('auth');
					}

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	  				Password salah!</div>');
					redirect('auth');
				}
				
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  				Email belum aktif.</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  			Email belum terdaftar.</div>');
			redirect('auth');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama_institusi', 'Nama Institusi', 'required|trim');
		$this->form_validation->set_rules('email_institusi', 'Email Institusi', 'required|trim|valid_email|is_unique[user.email_institusi]');
		$this->form_validation->set_rules('telepon_institusi', 'Telepon Institusi', 'required|trim');


		if ( $this->form_validation->run() == false) {
			$this->load->view('auth/registrasi');
		} else {
			$password = $this->generate_password();
			$email = $this->input->post('email_institusi', true);
			$data = [
				'nama_institusi' => $this->input->post('nama_institusi'),
				'email_institusi' => htmlspecialchars($email),
				'telepon_institusi' => $this->input->post('telepon_institusi'),
				'status' => $this->input->post('status'),
				'password' => md5($password),
				'level' => 2,
				'is_active' => 1
			];

		

			$this->db->insert('user_tmp', $data);

			$link = site_url('auth/konf/'.md5($email));
			$message = "Here is your account details:<br><br>Email: ".$email."<br>Tempolary password: ".$password."<br>Please change your password after login.<br><br><a href='$link'>Click here<a/> to activate your account";

			$this->_sendEmail($message);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  			Akun berhasil di buat. Silahkan cek email anda</div>');
			redirect('auth');
		}		
			
	}


	private function _sendEmail($message)
	{
		

		$this->load->library('email');
		$config = [

			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'ptikunm2017@gmail.com',
			'smtp_pass' => 'Ptikunm17',
			'smtp_port' => 465, 
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'validation' => false
		];

		
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from('ptikunm2017@gmail.com', 'Administrator');
		$this->email->to($this->input->post('email_institusi'));


			$this->email->subject('DO NOT REPLY - New Account Creation');
			$this->email->message($message);

		


		if ($this->email->send()) {
			return true;

		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	function generate_password(){
        $chars = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ023456789!@#$%^&*()_=";
        $password = substr( str_shuffle( $chars ), 0, 10 );

        return $password;
    }

    function konf($id)
    {
    	$simpan = $this->db->query("INSERT INTO user (id_user, nama_institusi, email_institusi, telepon_institusi, status, password, level, is_active) SELECT id, nama_institusi, email_institusi, telepon_institusi, status, password, level, is_active FROM user_tmp WHERE md5(email_institusi) ='$id'");
    	$delete = $this->db->query("DELETE FROM user_tmp WHERE md5(email_institusi) = '$id'");

    	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  		Akun berhasil di aktivasi, Silahkan login</div>');
		redirect('auth');

    	
    	$this->_sendEmail($message);
    }


    public function logout()
    {
    	$this->session->unset_userdata('email_institusi');
    	$this->session->unset_userdata('level');

    	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  		Anda telah keluar.</div>');
		redirect('auth');
    }
}