<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sidang_model');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['Sidang'] = $this->Sidang_model->dashboard();
		
		$this->load->view('Templates/head', $data);
		$this->load->view('Templates/topbar', $data);
		$this->load->view('Templates/sidebar', $data);
		$this->load->view('BeckEnd/dashboard', $data);
		$this->load->view('Templates/footer', $data);
	}

	public function updatebacanotif($id, $idh)
    {
    	if ($this->session->userdata('role') == 'pengacara') {
			redirect('login/blocked');
		}else{
			$this->db->set('terbaca', '1');
	        $this->db->where('admin_notif_id', $id);
	        $this->db->update('admin_notif');
	        redirect('administrator/hubungi_kami/kirim_email/'. $idh);	
		}
    	
    }

    public function pupdatebacanotif($id, $idh)
    {
    	if ($this->session->userdata('role') !== 'pengacara') {
			redirect('login/blocked');
		}else{
	    	$this->db->set('terbaca', '1');
	        $this->db->where('pengacara_notif_id', $id);
	        $this->db->update('pengacara_notif');
	        redirect('administrator/hubungi_kami/kirim_email/'. $idh);
		}
    }
}
