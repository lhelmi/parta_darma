<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPenunjang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('DataPenunjang_model');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Data Penunjang';
		// $data['penunjang'] = $this->DataPenunjang_model->get_all();
		$data['hub'] = $this->DataPenunjang_model->get_hub();
		
		$this->load->view('Templates/head', $data);
		$this->load->view('Templates/topbar', $data);
		$this->load->view('Templates/sidebar', $data);
		$this->load->view('BeckEnd/DataPenunjang/index', $data);
		$this->load->view('Templates/footer', $data);
		$this->load->view('BeckEnd/DataPenunjang/modal', $data);
	}

	public function add()
	{
		$data['title'] = 'Penunjang';
		$data['hub'] = $this->DataPenunjang_model->get_hub();
		$this->_rules();
		if ($this->form_validation->run() == false) {
			$this->load->view('Templates/head', $data);
			$this->load->view('Templates/topbar', $data);
			$this->load->view('Templates/sidebar', $data);
			$this->load->view('BeckEnd/DataPenunjang/add', $data);
			$this->load->view('Templates/footer', $data);
		}else{
			$config['upload_path'] = './assets/BackEnd/file/';
			$config['allowed_types'] = 'gif|jpg|png|txt|doc|docx|pdf';
			$config['max_size']     = '2048';

			$this->load->library('upload');
			$files = $_FILES;
			$datainsert = array();
	    	$upload_image = $_FILES['File']['name'];	
			for($i=0; $i< count($_FILES['File']['name']); $i++){
				$_FILES['userfile']['name']= $files['File']['name'][$i];
                $_FILES['userfile']['type']= $files['File']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['File']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['File']['error'][$i];
                $_FILES['userfile']['size']= $files['File']['size'][$i];


                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileData = $this->upload->data();
                $datainsert[$i]['File'] = $fileData['file_name'];
                $datainsert[$i]['IdKlien'] = $this->input->post('IdKlien',TRUE);
			}
			$this->DataPenunjang_model->insert($datainsert);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
			redirect('administrator/DataPenunjang');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Penunjang';
		$data['hub'] = $this->DataPenunjang_model->get_hub_by_id($id);
		$data['gethub'] = $this->DataPenunjang_model->get_by_id($id);
		$data['idx'] = $id;
		$this->_rules();
		if ($this->form_validation->run() == false) {
			$this->load->view('Templates/head', $data);
			$this->load->view('Templates/topbar', $data);
			$this->load->view('Templates/sidebar', $data);
			$this->load->view('BeckEnd/DataPenunjang/edit', $data);
			$this->load->view('Templates/footer', $data);
			$this->load->view('BeckEnd/DataPenunjang/DPDelete', $data);
		}else{
			$config['upload_path'] = './assets/BackEnd/file/';
			$config['allowed_types'] = 'gif|jpg|png|txt|doc|docx|pdf';
			$config['max_size']     = '2048';

			$this->load->library('upload');
			$files = $_FILES;
			$datainsert = array();
	    	$upload_image = $_FILES['File']['name'];	
			for($i=0; $i< count($_FILES['File']['name']); $i++){
				$_FILES['userfile']['name']= $files['File']['name'][$i];
                $_FILES['userfile']['type']= $files['File']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['File']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['File']['error'][$i];
                $_FILES['userfile']['size']= $files['File']['size'][$i];


                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileData = $this->upload->data();
                $datainsert[$i]['File'] = $fileData['file_name'];
                $datainsert[$i]['IdKlien'] = $this->input->post('IdKlien',TRUE);
			}
			
			$this->DataPenunjang_model->insert($datainsert);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
			redirect('administrator/DataPenunjang');
		}
	}

	public function Delete() 
    {
    	$data['id'] = $_POST['id'];
		$this->DataPenunjang_model->delete($_POST['id']);
		$this->session->set_flashdata('message', 'Data Berhasil Dihapus');
		echo json_encode($data);
    }

	public function _rules() 
    {
		$this->form_validation->set_rules('IdKlien', 'IdKlien', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }
}