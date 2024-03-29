<?php

class LupaPassword extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function lupapass($id)
    {
        $url = $this->db->query("select IdPengacara from pengacara where IdPengacaraHash='" . $id . "'")->row_array();
        $urladmin = $this->db->query("select id from admin where tokenHash='" . $id . "'")->row_array();
        if ($url) {
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Pengulangan password tidak sama!',
            'min_length' => 'Minimal password terdiri dari 6 karakter!',
            'required' => 'Password tidak boleh kosong'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            if ($this->form_validation->run() == false) {
                $id2['hash'] = $id;
                $id2['id'] = $url['IdPengacara'];
                $id2['is'] = '0';
                $this->load->view('login/ubahpassword', $id2);
            }else{
                $this->db->set('Password', password_hash($_POST['password1'], PASSWORD_DEFAULT));
                $this->db->where('IdPengacara', $_POST['id']);
                $this->db->update('pengacara');
                $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
                    Silahkan login menggunakan password baru!</div>');
                redirect('login');
            }
        }elseif ($urladmin) {
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Pengulangan password tidak sama!',
            'min_length' => 'Minimal password terdiri dari 6 karakter!',
            'required' => 'Password tidak boleh kosong'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

            if ($this->form_validation->run() == false) {
                $id2['hash'] = $id;
                $id2['id'] = $urladmin['id'];
                $id2['is'] = '1';
                $this->load->view('login/ubahpassword', $id2);
            }else{
                 $this->db->set('Password', password_hash($_POST['password1'], PASSWORD_DEFAULT));
                $this->db->where('id', $_POST['id']);
                $this->db->update('admin');
                $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
                    Silahkan login menggunakan password baru!</div>');
                redirect('login');
            }   
        }
        
    }

    public function ubah()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Pengulangan password tidak sama!',
            'min_length' => 'Minimal password terdiri dari 6 karakter!',
            'required' => 'Password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->lupapass($_POST['id']);
        } else {
            $this->db->set('Password', password_hash($_POST['password1'], PASSWORD_DEFAULT));
            $this->db->where('IdPengacara', $_POST['id']);
            $this->db->update('pengacara');
            $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
                Silahkan login menggunakan password baru!</div>');
            redirect('login');
        }
    }

    public function kirim_link()
    {
        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengacara.Email]', [
        //     'required' => 'Alamat email tidak boleh kosong',
        //     'valid_email' => 'Format email tidak sesuai'
        // ]);

        $to_email = $this->input->post('email');
        $sql = $this->db->query("select * from pengacara where Email='" . $to_email . "'")->row_array();
        $sqladmin = $this->db->query("select * from admin where Email='" . $to_email . "'")->row_array();
        $namap = $sql['NamaPengacara'];
        $namaadmin = $sqladmin['Nama'];
        if (!$sql and !$sqladmin) {
            $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
            Email tidak ditemukan, silahkan cek kembali!</div>');
            redirect('login');
        }else{
            function generateRandomString($length = 100)
            {
                return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
            }

            $token = generateRandomString();

            if ($sql) {
                $namaemail = $namap;
                $this->db->set('IdPengacaraHash', $token);
                $this->db->where('Email', $to_email);
                $this->db->update('pengacara');
            }elseif ($sqladmin) {
                $namaemail = $namaadmin;
                $this->db->set('tokenHash', $token);
                $this->db->where('Email', $to_email);
                $this->db->update('admin');
            }
            $subject = "Layanan Lupa Password Patra Darma";
            $message = "
            Hi ". $namaemail ."!<br>
            Klik tombol dibawah ini untuk mengubah Password anda<br>"
                . "<a href='" . base_url('lupapassword/lupapass/') . $token  . "'><button type='button' class='btn btn-primary btn-lg btn-block'>Ubah Password</button>" . "</a>";



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

            if ($this->email->send()) {
                $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
                Silahkan buka email anda untuk mengubah password!</div>');
                redirect('login');
            } else {
                echo $this->email->print_debugger();
                die;
            }
        }
    }
}
