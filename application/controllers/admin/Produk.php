<?php

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();
        $data['title'] = 'Data Produk Buku Tahunan Sekolah';

        $this->load->view('template/Admin/header', $data);
        $this->load->view('template/Admin/navbar', $data);
        $this->load->view('template/Admin/sidebar');
        $this->load->view('backend/produk/index', $data);
        $this->load->view('template/Admin/footer');
    }
}
