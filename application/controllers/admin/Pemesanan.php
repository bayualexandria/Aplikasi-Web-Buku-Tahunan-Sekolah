<?php

class Pemesanan extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_model');
        $this->load->model('Home_model');
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['All']=$this->Pemesanan_model->getPemesanan();
        $data['title'] = 'Data Pemesanan Buku Tahunan Sekolah';
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();

        $this->load->view('Template/Admin/header', $data);
        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar');
        $this->load->view('Backend/pemesanan/index', $data);
        $this->load->view('Template/Admin/footer');
    }

    public function create()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Insert Data Pemesanan Buku Tahunan Sekolah';
        $data['add'] = 'Tambah Data Buku Tahunan Sekolah';

        $data['All'] = $this->Pemesanan_model->getAll();
        $data['Ukuran'] = $this->Pemesanan_model->getUkuran();
        $data['message'] = $this->Home_model->getMessage();



        $this->load->view('Template/Admin/header', $data);
        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar');
        $this->load->view('Backend/pemesanan/add', $data);
        $this->load->view('Template/Admin/footer');
    }

    public function insert()
    {
        $data['All'] = $this->Pemesanan_model->getAll();
        $data['Bahan'] = $this->Pemesanan_model->getBahan();
        $data['Ukuran'] = $this->Pemesanan_model->getUkuran();
        $data['message'] = $this->Home_model->getMessage();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trims');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trims');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trims');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trims');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Insert Data Pemesanan';
            $this->load->view('Template/Admin/header');
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar');
            $this->load->view('Backend/pemesanan/index', $data);
            $this->load->view('Template/Admin/footer');
        } else {
            $this->Pemesanan_model->addData();
        }
    }
}
