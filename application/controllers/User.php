<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		hak_akses();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Selamat Datang User';
		$data['user'] = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		// $this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function profil ()
	{
		$data['user'] = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		$config['upload_path']          = './profil_kampus/';

        $this->load->library('upload', $config);
		$this->load->model('Profil_model');

		
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('profil_kampus', 'Profil', 'required|trim');
		$this->form_validation->set_rules('pic', 'PIC', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon PIC', 'required|trim');

		if ( $this->form_validation->run() == false) {
			$data['title'] = 'Profil Institusi';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/profil', $data);
			$this->load->view('templates/footer');
		} else {
			$user = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
			$where = array('id_user' => $user['id_user']);
			$upload = $this->upload_surat('profil_kampus');
			$data = [
				'alamat' => $this->input->post('alamat'),
				'pic' => $this->input->post('pic'),
				'telepon' => $this->input->post('telepon'),
				'profil_kampus' => $upload
			];

			$this->Profil_model->update_data($where, $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	  		Sukses mengirim!</div>');
        	redirect('User/profil');
		}
	}

	public function upload_surat($name)
	{
		$config['upload_path']          = './profil_kampus/';
	    $config['allowed_types']        = 'pdf';

          	$this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($name))
                {
                	// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	  				// File yang dikirim tidak valid!</div>');
	  				$ret = false;
                }
            else
                {
                    $upload_data = $this->upload->data();
                    

                   

       //              $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	  				// Sukses mengirim!</div>');
	  				$ret = $upload_data['file_name'];
                    
				}
		return $ret;
	}

	public function pengelompokan()
	{
		$data['user'] = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		$this->load->model('Kelompok_model');

		$user = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		$where = array('id_user' => $user['id_user']);
		$data['pengelompokan'] = $this->Kelompok_model->tampil_data($where)->result();

		$data['title'] = 'Pengelompokan Peserta';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/pengelompokan', $data);			
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$user= $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		$this->load->model('Kelompok_model');

		$no_surat = $this->input->post('no_surat');
		$nama = $this->input->post('nama_peserta');
		$gender = $this->input->post('gender');
		$telepon = $this->input->post('telepon');
		$jurusan = $this->input->post('jurusan');
		$status = $this->input->post('status');
		$tgl_mulai = $this->input->post('tanggal_mulai');
		$tgl_akhir = $this->input->post('tanggal_akhir');

		$data = [
			'id_user' => $user['id_user'],
			'no_surat' => $no_surat,
			'nama_peserta' => $nama,
			'gender' => $gender,
			'telepon' => $telepon,
			'jurusan' => $jurusan,
			'status' => $status,
			'tanggal_mulai' => $tgl_mulai,
			'tanggal_akhir' => $tgl_akhir,
		];

		$this->Kelompok_model->input_data($data);
		redirect('user/pengelompokan');
	}

	public function hapus($id)
	{
		$data['user'] = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		$this->load->model('Kelompok_model');

		$where = array('id_kelompok' => $id);

		$this->Kelompok_model->hapus_data($where);
		redirect('user/pengelompokan');
	}

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		$this->load->model('Kelompok_model');

		$where = array('id_kelompok' => $id);

		$data['pengelompokan'] = $this->Kelompok_model->edit_data($where)->result();

		$data['title'] = 'Edit Data';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/edit', $data);	
		$this->load->view('templates/footer');

	}

	public function update()
	{
		$data['user'] = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		$this->load->model('Kelompok_model');

		$id = $this->input->post('id_kelompok');
		$nama = $this->input->post('nama_peserta');
		$gender = $this->input->post('gender');
		$telepon = $this->input->post('telepon');
		$jurusan = $this->input->post('jurusan');
		$status = $this->input->post('status');
		$tgl_mulai = $this->input->post('tanggal_mulai');
		$tgl_akhir = $this->input->post('tanggal_akhir');

		$data = [
			'nama_peserta' => $nama,
			'gender' => $gender,
			'telepon' => $telepon,
			'jurusan' => $jurusan,
			'status' => $status,
			'tanggal_mulai' => $tgl_mulai,
			'tanggal_akhir' => $tgl_akhir,
		];

		$where = array('id_kelompok' => $id);

		$this->Kelompok_model->update_data($data, $where);
		redirect('user/pengelompokan');
	}

	public function create()
	{
		$this->load->model('File_model');
		$config['upload_path']          = './upload/';
	    $config['allowed_types']        = 'pdf';
	    $config['max_size']             = 2048;

          	$this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('filename'))
                {
                	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	  				File yang dikirim tidak valid!</div>');
                    redirect('User/pengelompokan');
                }
            else
                {
                    $upload_data = $this->upload->data();
                    $user= $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();       
                    $data = array(
                    	'id_user' => $user['id_user'],
                    	'filename' => $upload_data['file_name']
                    );

                    $this->File_model->insert($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	  				Sukses mengirim!</div>');
                    redirect('User/pengelompokan');
				}

	}


	public function changePassword()
	{

		$data['title'] = 'Ubah Password';
		$data['user'] = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|min_length[6]|matches[new_password1]');

		if ( $this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = md5($this->input->post('current_password'));
			$new_password = $this->input->post('new_password1');

			if ($current_password == $data['user']['password']) {

				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	  				Current Password dan New Password tidak boleh sama</div>');
                	redirect('User/changepassword');
				} else {
					$password = md5($new_password);

					$this->db->set('password', $password);
					$this->db->where('email_institusi', $this->session->userdata('email_institusi'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">
	  				Password telah diganti!</div>');
                	redirect('User/changepassword');
				}

			} else {

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	  			Current Password Salah</div>');
                redirect('User/changepassword');
			}
		}
	}

	public function uploadMultiple()
	{
		$upl1 = $this->upload_berkas('bpjs_kesehatan');
		$upl2 = $this->upload_berkas('bpjs_ketenagakerjaan');
		$upl3 = $this->upload_berkas('skbs');
		$upl4 = $this->upload_berkas('foto');

		$user= $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();       
                $data = array(
                	'id_user' => $user['id_user'],
                	'bpjs_kesehatan' => $upl1,
                	'bpjs_ketenagakerjaan' => $upl2,
                	'skbs' => $upl3,
                	'foto' => $upl4
                );
                 $this->File_model->upload_data($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengirim!</div>');
		redirect('User/berkaspraktik');
	}

	public function upload_berkas($name)
	{
		$this->load->model('File_model');
		$config['upload_path']          = './upload/';
	    $config['allowed_types']        = 'pdf|jpg';
	    $config['max_size']             = 2048;

          	$this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($name))
                {
                	// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	  				// File yang dikirim tidak valid!</div>');
	  				$ret = false;
                }
            else
                {
                    $upload_data = $this->upload->data();
                    

                   

       //              $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	  				// Sukses mengirim!</div>');
	  				$ret = $upload_data['file_name'];
                    
				}
		return $ret;
	}

	public function berkasPraktik()
	{
		$data['user'] = $this->db->get_where('user', ['email_institusi' => $this->session->userdata('email_institusi')])->row_array();
		$data['title'] = 'Berkas Praktik';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/berkaspraktik', $data);			
		$this->load->view('templates/footer');

		
	}

}