<?php


class Konsultasi extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('user/konsultasi');
        $this->load->view('templates_user/footer');
    }

    public function kirim_pesan()
    {
        
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $q_pengacara = $this->db->get('pengacara')->result();
            $q_admin = $this->db->get('admin')->result();

            $id = $this->hubungi_model->get_kode();
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $pesan = $this->input->post('pesan');
            $waktu = date("Y-m-d h:i:sa");

            $data = array(
                'id_hubungi' => $id,
                'nama' => $nama,
                'email' => $email,
                'pesan' => $pesan,
                'kategori' => 'Lainnya'
            );
            
            foreach ($q_admin as $key => $value) {
                $data_admin[] = [
                    'id_hubungi' => $id,
                    'waktu' => $waktu,
                    'id' => $value->id
                ];
            }

            foreach ($q_pengacara as $key => $value) {
                $data_pengacara[] = [
                    'id_hubungi' => $id,
                    'waktu' => $waktu,
                    'IdPengacara' => $value->IdPengacara
                ];
            }
            
            $this->hubungi_model->insert_data($data, 'hubungi');
            $this->hubungi_model->insert_admin_notif($data_admin);
            $this->hubungi_model->insert_pengacara_notif($data_pengacara);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Pesan Berhasil Dikirim!!
          </div>');
            redirect('user/konsultasi');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');
    }
}
