<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengacara extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Pengacara_model');
		is_logged_in();
	}

	public function index()
	{
		if ($this->session->userdata('role') == 'pengacara') {
			redirect('login/blocked');
		}
		$data['title'] = 'Pengacara';
		$data['Pengacara'] = $this->Pengacara_model->get_all();
		
		$this->load->view('Templates/head', $data);
		$this->load->view('Templates/topbar', $data);
		$this->load->view('Templates/sidebar', $data);
		$this->load->view('BeckEnd/Pengacara/index', $data);
		$this->load->view('Templates/footer', $data);
		$this->load->view('BeckEnd/Pengacara/delete', $data);
	}

	public function add()
	{
		if ($this->session->userdata('role') == 'pengacara') {
			redirect('login/blocked');
		}

		$data['title'] = 'Tambah Data Pengacara';
		$data['IdPeng'] = $this->Pengacara_model->get_kode();
		$data['password'] = base64_encode(random_bytes(8));

		$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[pengacara.email]|is_unique[admin.Email]|is_unique[klien.EmailKlien]|min_length[12]|max_length[30]',
    		[
	    		'required' => '*Field Tidak Boleh Kosong',
	    		'is_unique' => 'Email Sudah digunakan',
	    		'valid_email' => 'Alamat Email Tidak Valid',
	    		'min_length' => 'Maaf, nama pengguna Anda harus antara 12 dan 30 karakter panjangnya',
	    		'max_length' => 'Maaf, nama pengguna Anda harus antara 12 dan 30 karakter panjangnya'
    		]
    	);
    	
    	$this->form_validation->set_rules('NoHp', 'NoHp', 'trim|required|is_natural|min_length[12]|max_length[12]|is_unique[pengacara.NoHp]',
    		[
    			'required' => '*Field Tidak Boleh Kosong',
    			'is_unique' => 'No Telp Sudah digunakan',
    			'is_natural' => 'Mohon untuk memasukan angka',
				'min_length' => 'Maaf, nomor telp Anda harus antara 0 dan 13 karakter panjangnya',
	    		'max_length' => 'Maaf, nomor telp Anda harus antara 0 dan 13 karakter panjangnya'
    		]
    	);
		$this->_rules();
		$this->form_validation->set_rules('NamaBk[]', 'NamaBk[]', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		if (empty($_FILES['Foto']['name'])) {
			$this->form_validation->set_rules('Foto', 'Foto', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		}
		if ($this->form_validation->run() == false) {
			$this->load->view('Templates/head', $data);
			$this->load->view('Templates/topbar', $data);
			$this->load->view('Templates/sidebar', $data);
			$this->load->view('BeckEnd/Pengacara/add', $data);
			$this->load->view('Templates/footer', $data);
		}else{
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
			
			$postx = $this->input->post();
			$Bk = array();
            foreach($postx['NamaBk'] AS $key => $val){
                $Bk[] = array(
                    "NamaBk" => $postx['NamaBk'][$key],
                    "IdPengacara" => $this->input->post('IdPengacara',TRUE)
                );
            }
            
            $datainsert['IdPengacara'] = $this->input->post('IdPengacara',TRUE);
            $datainsert['NamaPengacara'] = $this->input->post('NamaPengacara',TRUE);
			$datainsert['Jk'] = $this->input->post('Jk',TRUE);
			$datainsert['Email'] = $this->input->post('Email',TRUE);
			$datainsert['NoHp'] = $this->input->post('NoHp',TRUE);
			$datainsert['password'] = password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT);
			$datainsert['keterangan'] = $this->input->post('keterangan',TRUE);
			$datainsert['pendidikan'] = $this->input->post('pendidikan',TRUE);
			$datainsert['pengalaman'] = $this->input->post('pengalaman',TRUE);
			$this->kirim_email_aksi();
			$this->Pengacara_model->insert($datainsert);
			$this->Pengacara_model->insert_Bk($Bk);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
			redirect('administrator/Pengacara');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') !== 'pengacara') {
			redirect('login/blocked');
		}
		$data['title'] = 'Ubah Data Pengacara';
		$data['pengacara'] = $this->Pengacara_model->get_by_id($id);
		$row = $this->Pengacara_model->get_by_idnonarray($id);
		$data['Bk'] = $this->Pengacara_model->Bk_by_id($id);

		if ($data['pengacara']) {
			$this->_rules();
			$this->form_validation->set_rules('NamaBk1[]', 'NamaBk1[]', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
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
			if ($this->input->post('NoHp',TRUE) <> $row->NoHp) {
				$this->form_validation->set_rules('NoHp', 'NoHp', 'trim|required|is_natural|min_length[12]|max_length[12]|is_unique[pengacara.NoHp]',
		    		[
		    			'required' => '*Field Tidak Boleh Kosong',
		    			'is_unique' => 'No Telp Sudah digunakan',
		    			'is_natural' => 'Mohon untuk memasukan angka',
						'min_length' => 'Maaf, nomor telp Anda harus antara 0 dan 13 karakter panjangnya',
			    		'max_length' => 'Maaf, nomor telp Anda harus antara 0 dan 13 karakter panjangnya'
		    		]
		    	);
			}
			if ($this->form_validation->run() == false) {
				$this->load->view('Templates/head', $data);
				$this->load->view('Templates/topbar', $data);
				$this->load->view('Templates/sidebar', $data);
				$this->load->view('BeckEnd/Pengacara/edit', $data);
				$this->load->view('Templates/footer', $data);
				$this->load->view('BeckEnd/Pengacara/BKdelete', $data);
			}else{
				$upload_image = $_FILES['Foto']['name'];
				if ($upload_image) {
					$config['upload_path'] = './assets/BackEnd/img/profile/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']     = '2048';

					$this->load->library('upload', $config);
					if ($this->upload->do_upload('Foto')) {
						$old_image = $data['pengacara']['Foto'];
						if ($old_image != 'default.jpg') {
						$hapus = 'assets/BackEnd/img/profile/'. $old_image;
						$unlink = unlink(FCPATH .  'assets/BackEnd/img/profile/'. $old_image);
						if ($hapus == $unlink) {
							unlink(FCPATH .  'assets/BackEnd/img/profile/'. $old_image);
						}
					}
					$new_image = $this->upload->data('file_name');
					$datainsert['Foto'] = $new_image;

					}else{
						echo $this->upload->display_errors();
					}
				}

				$post = $this->input->post();
				$BkUbah = array();
	            foreach($post['NamaBk1'] AS $key => $val){
	                $BkUbah[] = array(
	                    "IdBk" => $post['IdBk'][$key],
	                    "NamaBk" => $post['NamaBk1'][$key],
	                );
	            }
	            $this->Pengacara_model->update_bk($BkUbah, 'IdBk');

				$Bk = array();
	            foreach($post['NamaBk'] AS $key => $val){
	            	$Bk[] = array(
	                    "NamaBk" => $post['NamaBk'][$key],
	                    "IdPengacara" => $post['IdPengacara']
	                );
	                if ($post['NamaBk'][$key] !== '') {
                    	$this->Pengacara_model->insert_Bk($Bk);
                	}
            	}
            	
	            $datainsert['NamaPengacara'] = $this->input->post('NamaPengacara',TRUE);
				$datainsert['Jk'] = $this->input->post('Jk',TRUE);
				$datainsert['Email'] = $this->input->post('Email',TRUE);
				$datainsert['NoHp'] = $this->input->post('NoHp',TRUE);
				$datainsert['keterangan'] = $this->input->post('keterangan',TRUE);
				$datainsert['pendidikan'] = $this->input->post('pendidikan',TRUE);
				$datainsert['pengalaman'] = $this->input->post('pengalaman',TRUE);
				
				
				$this->Pengacara_model->update($this->input->post('IdPengacara',TRUE) ,$datainsert);
				$this->session->set_flashdata('message', 'Berhasil diubah!');
				redirect('administrator/Pengacara/edit/'.$id);
			}	
		}else{
			$this->session->set_flashdata('message', 'Data Tidak Ada');
			redirect('administrator/Pengacara');
		}
		
	}

	public function delete()
	{
		if ($this->session->userdata('role') == 'pengacara') {
			redirect('login/blocked');
		}
		$data['id'] = $_POST['id'];
		$data['redirect'] = 'administrator/Pengacara';
		$this->Pengacara_model->delete($_POST['id']);
		$this->session->set_flashdata('message', 'Data Berhasil Dihapus');
		echo json_encode($data);
	}

	public function BKdelete()
	{
		if ($this->session->userdata('role') !== 'pengacara') {
			redirect('login/blocked');
		}

		$data['id'] = $_POST['id'];
		// $data['redirect'] = 'Pengacara';
		$this->Pengacara_model->BKdelete($_POST['id']);
		$this->session->set_flashdata('message', 'Data Berhasil Dihapus');
		echo json_encode($data);
	}

	public function kirim_email_aksi()
    {
    	$to_email = $this->input->post('Email');
    	$pass = $this->input->post('password',TRUE);
        $subject = "Password akun patradarma";
        $message = "Hai.. Berikut detail akun anda, email : " .$to_email. " password : " .$pass;

        $config = [
            'mailtype' => 'html',
            'charset' => 'utf8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'patradarmawja@gmail.com',
            'smtp_pass' => 'Admin111',
            'smtp_port' => 465,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ];
		$this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from("patradarmawja@gmail.com", 'patradarmawja');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);
		if (!$this->email->send()) {
			echo $this->email->print_debugger();
            die;
        }
    }

	public function _rules() 
    {
    	$this->form_validation->set_rules('NamaPengacara', 'NamaPengacara', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );

    	$this->form_validation->set_rules('Jk', 'Jk', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	
    	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	
    	$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	
    	$this->form_validation->set_rules('pengalaman', 'pengalaman', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    }
}
