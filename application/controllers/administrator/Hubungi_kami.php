<?php

class Hubungi_kami extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pesan';
        if ($this->session->userdata('role') == 'pengacara') {
            $data['hubungi'] = $this->db->order_by('waktu', 'DESC')->join('hubungi', 'pengacara_notif.id_hubungi = hubungi.id_hubungi')->get_where('pengacara_notif', ['IdPengacara'=> $this->session->userdata('id')])->result_array();
        }else{
            $data['hubungi'] = $this->db->order_by('waktu', 'DESC')->join('hubungi', 'admin_notif.id_hubungi = hubungi.id_hubungi')->get_where('admin_notif', ['id'=> $this->session->userdata('id')])->result_array();
        }   
        $this->load->view('Templates/head', $data);
        $this->load->view('Templates/topbar', $data);
        $this->load->view('Templates/sidebar', $data);
        $this->load->view('BeckEnd/Pesan/hubungi', $data);
        $this->load->view('Templates/footer', $data);
        $this->load->view('BeckEnd/Pesan/delete', $data);
    }

    public function delete()
    {
        $data['id'] = $_POST['id'];
        $data['redirect'] = 'administrator/Hubungi_kami';
        $this->hubungi_model->delete($_POST['id']);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
        echo json_encode($data);
    }   

    public function kirim_email($id)
    {
        $where = array('id_hubungi' => $id);

        $data['hubungi'] = $this->hubungi_model->kirim_data($where, 'hubungi')->result();

        $this->load->view('Templates/head');
        $this->load->view('Templates/topbar');
        $this->load->view('Templates/sidebar');
        $this->load->view('BeckEnd/Pesan/form_kirim_email', $data);
        $this->load->view('Templates/footer');
    }

    public function kirim_email_aksi()
    {
        $upload_f = $_FILES['attachf']['name'];
        
        $to_email = $this->input->post('email');
        $cc = $this->input->post('cc');
        $bcc = $this->input->post('bcc');
        $subject = $this->input->post('subject');
        $message = $this->input->post('pesan');
        
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

        if ($upload_f) {
            $config['upload_path'] = './assets/BackEnd/file/attach/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|pdf|doc|docx|xlsx|xls|txt';
            $config['max_size']     = '5048';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('attachf')) {
                echo "string";
                $new_image = $this->upload->data('file_name');
                $attachx = base_url('assets/BackEnd/file/attach/'.$new_image);
                $this->email->attach($attachx);
            }else{
                echo "xxxxxooooo";
                echo $this->upload->display_errors();
                die();
            }
        }
        
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from("patradarmawja@gmail.com", 'patradarmawja');

        $this->email->to($to_email);
        $this->email->cc($cc);
        $this->email->bcc($bcc);
        $this->email->subject($subject);
        
        $this->email->message($message);

        if ($this->email->send()) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Pesan Terkirim!
          </div>');
            redirect('administrator/hubungi_kami');
        } else {
            echo $this->email->print_debugger();
            echo "stringxx";
            die;
        }
    }
}
