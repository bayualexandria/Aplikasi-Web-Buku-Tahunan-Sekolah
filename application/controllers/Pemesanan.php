<?php

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->model('Pemesanan_model');
        is_logged();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Pemesanan';
        $data['description'] = 'Halaman Pemesanan Buku Tahunan Sekolah';
        $data['producks'] = $this->Pemesanan_model->producks();

        $this->load->view('frontend/auth/template/header', $data);
        $this->load->view('frontend/pemesanan/index', $data);
        $this->load->view('frontend/auth/template/footer');
    }

    public function order($id)
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Order';
        $data['description'] = 'Halaman Order Buku Tahunan Sekolah';
        $data['produck'] = $this->Pemesanan_model->bahan($id);

        $this->form_validation->set_rules('jumlah_katalog', 'Jumlah Katalog', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/auth/template/header', $data);
            $this->load->view('frontend/pemesanan/order', $data);
            $this->load->view('frontend/auth/template/footer');
        } else {
            $this->insertPemesanan();
        }
    }

    public function insertPemesanan()
    {
        $this->Pemesanan_model->insertPemesanan();
        $this->session->set_flashdata('success', 'Terima kasih! Orderan anda telah diterima.');
        redirect('Pemesanan');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Detail Pemesanan';
        $data['detail'] = $this->Pemesanan_model->detailPemesanan($id);
        $this->load->view('frontend/auth/template/header', $data);
        $this->load->view('frontend/pemesanan/detail', $data);
        $this->load->view('frontend/auth/template/footer');
    }
}
