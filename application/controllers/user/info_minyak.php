<?php

class Info_minyak extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('user/info_minyak');
        $this->load->view('templates_user/footer');
    }

    public function kirim_pesan()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $pesan = $this->input->post('pesan');

            $data = array(
                'nama' => $nama,
                'email' => $email,
                'pesan' => $pesan,
            );

            $this->hubungi_model->insert_data($data, 'hubungi');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Pesan Berhasil Dikirim!!
          </div>');
            redirect('user/info_minyak');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');
    }
}
