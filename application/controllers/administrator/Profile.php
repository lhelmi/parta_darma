<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->model('KategoriMasalah_model');
		is_logged_in();
		if ($this->session->userdata('role') == 'pengacara') {
			redirect('login/blocked');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') == 'pengacara') {
			redirect('login/blocked');
		}

		$data['title'] = 'My Profile';

		$idp = $this->session->userdata('id');
		$this->form_validation->set_rules('Nama', 'Nama', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		if ($this->input->post('Email',TRUE) <> $this->session->userdata('email')) {
			$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[admin.email]|is_unique[pengacara.email]|is_unique[klien.EmailKlien]|min_length[12]|max_length[30]',
	    		[
		    		'required' => '*Field Tidak Boleh Kosong',
		    		'is_unique' => 'Email Sudah digunakan',
		    		'valid_email' => 'Alamat Email Tidak Valid',
		    		'min_length' => 'Maaf, nama pengguna Anda harus antara 12 dan 30 karakter panjangnya',
		    		'max_length' => 'Maaf, nama pengguna Anda harus antara 12 dan 30 karakter panjangnya'
	    		]
	    	);
		}
		if ($this->input->post('password1',TRUE) !== '' ) {
			$this->form_validation->set_rules('password1', 'password1', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
			$this->form_validation->set_rules('password2', 'password2', 'trim|required|matches[password1]',
				[
					'required' => '*Field Tidak Boleh Kosong',
					'matches' => 'Password tidak sama dengan password baru'
				]
			);
		}
		if ($this->form_validation->run() == false) {
			$this->load->view('Templates/head', $data);
			$this->load->view('Templates/topbar', $data);
			$this->load->view('Templates/sidebar', $data);
			$this->load->view('BeckEnd/Profile/index', $data);
			$this->load->view('Templates/footer', $data);
		}else{
			$upload_image = $_FILES['Foto']['name'];
			if ($this->input->post('password1',TRUE) !== '' ) {
				$datainsert['Password'] = password_hash($this->input->post('password1',TRUE), PASSWORD_DEFAULT);
				$this->db->where('id', $idp);
	        	$this->db->update('admin', $datainsert);
			}
			if ($this->input->post('Nama',TRUE) <> $this->session->userdata('name') || $this->input->post('Email',TRUE) <> $this->session->userdata('email') || $upload_image) {
				if ($upload_image) {
					$config['upload_path'] = './assets/BackEnd/img/profile/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']     = '2048';

					$this->load->library('upload', $config);
					if ($this->upload->do_upload('Foto')) {
						$old_image = $this->session->userdata('foto');
						if ($old_image != 'default.jpg') {
							$hapus = 'assets/BackEnd/img/profile/'. $old_image;
							$unlink = unlink(FCPATH .  'assets/BackEnd/img/profile/'. $old_image);
							if ($hapus == $unlink) {
								unlink(FCPATH .  'assets/BackEnd/img/profile/'. $old_image);
							}
						}
					}else{
						echo $this->upload->display_errors();
					}
				}
				$new_image = $this->upload->data('file_name');
				$datainsert['Foto'] = $new_image;
				$datainsert['Nama'] = $this->input->post('Nama',TRUE);
				$datainsert['Email'] = $this->input->post('Email',TRUE);

				$this->db->where('id', $idp);
	        	$this->db->update('admin', $datainsert);
				$this->session->unset_userdata('id');
	        	$this->session->unset_userdata('email');
	        	$this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
	                    Profile berhasil diubah, silahkan login kembali</div>');
	                redirect('login');	
			}
			redirect('administrator/Profile');
		}
	}
}