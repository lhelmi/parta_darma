<?php


class Beranda extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('user/beranda');
        $this->load->view('templates_user/footer');
    }

    public function minyak_bumi()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/minyak_bumi');
        $this->load->view('templates_user/footer');
    }
    public function gas_bumi()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/gas_bumi');
        $this->load->view('templates_user/footer');
    }
    public function kegiatan_usaha_hulu()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/kegiatan_usaha_hulu');
        $this->load->view('templates_user/footer');
    }
    public function kegiatan_usaha_hilir()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/kegiatan_usaha_hilir');
        $this->load->view('templates_user/footer');
    }
    public function eksplorasi_dan_eksploitasi()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/eksplorasi_dan_eksploitasi');
        $this->load->view('templates_user/footer');
    }
    public function penegakan_hukum()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/penegakan_hukum');
        $this->load->view('templates_user/footer');
    }
    public function tindak_pidana()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/tindak_pidana');
        $this->load->view('templates_user/footer');
    }
    public function tujuan_pemidanaan()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/tujuan_pemidanaan');
        $this->load->view('templates_user/footer');
    }
    public function subyek_tindak_pidana()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/topbar');
        $this->load->view('blog/subyek_tindak_pidana');
        $this->load->view('templates_user/footer');
    }
}
