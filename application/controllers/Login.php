<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Admin Login';
        $this->form_validation->set_rules('id', 'id', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/index');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $password = $this->input->post('password');

        $pengacara = $this->db->query("select * from pengacara where IdPengacara='" . $id . "' or Email='" . $id . "'")->row_array();
        $admin = $this->db->query("select * from admin where Email='" . $id . "'")->row_array();
        if ($pengacara) {
            if (password_verify($password, $pengacara['password'])) {
                $data = [
                    'id' => $pengacara['IdPengacara'],
                    'name' => $pengacara['NamaPengacara'],
                    'foto' => $pengacara['Foto'],
                    'email' => $pengacara['Email'],
                    'role' => 'pengacara'
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                    Password salah, silahkan ulangi!</div>');
                redirect('login');
            }
        } elseif ($admin) {
            if (password_verify($password, $admin['Password'])) {
                $data = [
                    'id' => $admin['id'],
                    'name' => $admin['Nama'],
                    'foto' => $admin['Foto'],
                    'email' => $admin['Email'],
                    'role' => $admin['role'],
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                    Password salah, silahkan ulangi!</div>');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
            ID/Email tidak ditemukan, silahkan cek kembali!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
		Anda Berhasil Logout</div>');
        redirect('login');
    }

    public function blocked()
    {
        $this->load->view('Templates/blocked');
    }
}

    // public function registration()
    // {
    //     $this->load->view('login/registration');
    // }

    // public function daftar()
    // {
    //     $this->form_validation->set_rules(
    //         'id',
    //         'Id',
    //         'required|trim|min_length[6]|is_unique[pengacara.IdPengacara]',
    //         [
    //             'required' => 'ID telepon tidak boleh kosong',
    //             'min_length' => 'Minimal ID terdiri dari 6 karakter!',
    //             'is_unique' => 'ID ini sudah terdaftar'
    //         ]
    //     );
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim', ['required' => 'Nama telepon tidak boleh kosong']);
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengacara.Email]', [
    //         'required' => 'Alamat email tidak boleh kosong',
    //         'valid_email' => 'Format email tidak sesuai'
    //     ]);
    //     $this->form_validation->set_rules('phone', 'Phone', 'required|trim|is_unique[pengacara.NoHp]', ['required' => 'Nomor telepon tidak boleh kosong']);
    //     $this->form_validation->set_rules('jk', 'JK', 'required', ['required' => 'Pilih Jenis Kelamin']);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
    //         'matches' => 'Pengulangan password tidak sama!',
    //         'min_length' => 'Minimal password terdiri dari 6 karakter!',
    //         'required' => 'Password tidak boleh kosong'
    //     ]);

    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         // var_dump($_POST['name']);
    //         $data['title'] = 'Registration';
    //         //$this->load->view('templates/login_header', $data);
    //         $this->load->view('login/registration');
    //         //$this->load->view('templates/login_footer');
    //     } else {
    //         $pendidikan = '';
    //         if ($_POST['s1']) {
    //             $pendidikan = $pendidikan . $_POST['s1'] . '<br>';
    //         }
    //         if ($_POST['s2']) {
    //             $pendidikan = $pendidikan . $_POST['s2'] . '<br>';
    //         }
    //         if ($_POST['s3']) {
    //             $pendidikan = $pendidikan . $_POST['s3'] . '<br>';
    //         }

    //         $data = [
    //             'IdPengacara' => htmlspecialchars($this->input->post('id', true)),
    //             'NamaPengacara' => htmlspecialchars($this->input->post('name', true)),
    //             'Email' => htmlspecialchars($this->input->post('email', true)),
    //             'NoHp' => htmlspecialchars($this->input->post('phone', true)),
    //             'Jk' => htmlspecialchars($this->input->post('jk', true)),
    //             'Foto' => 'default.png',
    //             'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
    //             'pendidikan' => $pendidikan,
    //             'pengalaman' => htmlspecialchars($this->input->post('pengalaman', true)),
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'level' => htmlspecialchars($this->input->post('id', true))
    //         ];

    //         $this->db->insert("pengacara", $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Selamat!</strong> Akun anda berhasil didaftarkan.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //         </button>
    //         </div>');
    //         redirect('login/login');
    //     }
    // }

