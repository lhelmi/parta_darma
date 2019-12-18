<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		is_logged_in();
		if ($this->session->userdata('role') !== '1') {
			redirect('login/blocked');
		}
	}

	public function index()
	{
		$data['title'] = 'Admin';
		$data['admin'] = $this->Admin_model->get_all();
		
		$this->load->view('Templates/head', $data);
		$this->load->view('Templates/topbar', $data);
		$this->load->view('Templates/sidebar', $data);
		$this->load->view('BeckEnd/Admin/index', $data);
		$this->load->view('Templates/footer', $data);
		$this->load->view('BeckEnd/Admin/modal', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('Nama', 'Nama', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );

		$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[pengacara.email]|is_unique[admin.Email]|is_unique[klien.EmailKlien]|min_length[12]|max_length[30]',
    		[
	    		'required' => '*Field Tidak Boleh Kosong',
	    		'is_unique' => 'Email Sudah digunakan',
	    		'valid_email' => 'Alamat Email Tidak Valid',
	    		'min_length' => 'Maaf, nama pengguna Anda harus antara 12 dan 30 karakter panjangnya',
	    		'max_length' => 'Maaf, nama pengguna Anda harus antara 12 dan 30 karakter panjangnya'
    		]
    	);

		$this->form_validation->set_rules('Password', 'Password', 'trim|required|matches[Konfirmasi]',
			[
				'required' => '*Field Tidak Boleh Kosong',
				'matches' => 'Password tidak sama dengan Konfirmasi Password'
			]
		);

		$this->form_validation->set_rules('Konfirmasi', 'Konfirmasi', 'trim|required|matches[Password]',
			[
				'required' => '*Field Tidak Boleh Kosong',
				'matches' => 'Password tidak sama dengan Password'
			]
		);

		if (empty($_FILES['Foto']['name'])) {
			$this->form_validation->set_rules('Foto', 'Foto', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		}
    	
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}

			foreach ($_FILES as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$data['success'] = true;
	    	$upload_image = $_FILES['Foto']['name'];	
			if ($upload_image) {
				$config['upload_path'] = './assets/BackEnd/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('Foto')) {
					$new_image = $this->upload->data('file_name');
					$datainsert['Foto'] = $new_image;
				}else{
					echo $this->upload->display_errors();
					die();
				}
			}
	    	$datainsert['Nama'] = $this->input->post('Nama',TRUE);
	    	$datainsert['Email'] = $this->input->post('Email',TRUE);
	    	$datainsert['Password'] = password_hash($this->input->post('Password',TRUE), PASSWORD_DEFAULT);
	    	
	    	
			$result = $this->Admin_model->insert($datainsert);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
        	echo json_encode($data);
		}
	}

	public function getubah()
	{
		echo json_encode($this->Admin_model->get_by_id($_POST['id']));
	}

	public function edit()
	{
		$row = $this->Admin_model->get_by_id_noarray($_POST['id']);

		$this->form_validation->set_rules('Nama', 'Nama', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );

		if ($this->input->post('Email',TRUE) <> $row->Email) {
			$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[pengacara.email]|is_unique[admin.Email]|is_unique[klien.EmailKlien]|min_length[12]|max_length[30]',
	    		[
		    		'required' => '*Field Tidak Boleh Kosong',
		    		'is_unique' => 'Email Sudah digunakan',
		    		'valid_email' => 'Alamat Email Tidak Valid',
		    		'min_length' => 'Maaf, nama pengguna Anda harus antara 12 dan 30 karakter panjangnya',
		    		'max_length' => 'Maaf, nama pengguna Anda harus antara 12 dan 30 karakter panjangnya'
	    		]
	    	);
		}
		
		if ($this->input->post('Password',TRUE) !== '' or $this->input->post('Konfirmasi',TRUE) !== '') {
			$this->form_validation->set_rules('Password', 'Password', 'trim|required|matches[Konfirmasi]',
				[
					'required' => '*Field Tidak Boleh Kosong',
					'matches' => 'Password tidak sama dengan Konfirmasi Password'
				]
			);

			$this->form_validation->set_rules('Konfirmasi', 'Konfirmasi', 'trim|required|matches[Password]',
				[
					'required' => '*Field Tidak Boleh Kosong',
					'matches' => 'Password tidak sama dengan Password'
				]
			);
		}
    	
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}

			foreach ($_FILES as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$row = $this->Admin_model->get_by_id_noarray($_POST['id']);
			$data['aneh'] = $row->Email;
			$data['success'] = true;
	    	$upload_image = $_FILES['Foto']['name'];	
			if ($upload_image) {
				$config['upload_path'] = './assets/BackEnd/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('Foto')) {
					$old_image = $row->Foto;
					if ($old_image != 'default.jpg') {
						$hapus = 'assets/BackEnd/img/profile/'. $old_image;
						$unlink = unlink(FCPATH .  'assets/BackEnd/img/profile/'. $old_image);
						// if ($hapus == $unlink) {
						// 	unlink(FCPATH .  'assets/BackEnd/img/profile/'. $old_image);
						// }
					}
					$new_image = $this->upload->data('file_name');
					$datainsert['Foto'] = $new_image;
				}else{
					echo $this->upload->display_errors();
					die();
				}
			}
			
	    	$datainsert['Nama'] = $this->input->post('Nama',TRUE);
	    	$datainsert['Email'] = $this->input->post('Email',TRUE);
	    	$datainsert['Password'] = password_hash($this->input->post('Password',TRUE), PASSWORD_DEFAULT);
	    	
	    	
			$result = $this->Admin_model->update($this->input->post('id',TRUE) ,$datainsert);
			$this->session->set_flashdata('message', 'Berhasil diubah!');
        	echo json_encode($data);
		}
	}

	public function delete()
	{
		$data['id'] = $_POST['id'];
		$this->Admin_model->delete($_POST['id']);
		$this->session->set_flashdata('message', 'Berhasil dihapus');
		echo json_encode($data);
	}

}