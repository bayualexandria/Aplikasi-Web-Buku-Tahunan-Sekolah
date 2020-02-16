<?php

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();
        $data['produks'] = $this->Produk_model->getProduk();

        $data['title'] = 'Data Produk Buku Tahunan Sekolah';

        $this->form_validation->set_rules('id_katalog', 'Jenis Katalog', 'required');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('bahan_kertas', 'Bahan Kertas', 'required');
        $this->form_validation->set_rules('halaman', 'Halaman', 'required');
        $this->form_validation->set_rules('cover', 'Cover', 'required');
        $this->form_validation->set_rules('finishing', 'Finishing', 'required');
        $this->form_validation->set_rules('cetakan', 'Cetakan', 'required');
        $this->form_validation->set_rules('dokFile', 'Dok File', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/Admin/header', $data);
            $this->load->view('template/Admin/navbar', $data);
            $this->load->view('template/Admin/sidebar');
            $this->load->view('backend/produk/index', $data);
            $this->load->view('template/Admin/footer');
        } else {
            $data = $this->Produk_model->insert();
            $this->session->set_flashdata('success', 'Data Produk Telah Ditambahkan');
            redirect('admin/produk');
        }
    }

    public function delete($id)
    {
        $this->Produk_model->delete($id);
        $this->session->set_flashdata('success', 'Data Produk Telah Dihapus');
        redirect('admin/produk');
    }

    public function update($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();
        $data['produk'] = $this->Produk_model->getIdProduk($id);

        $data['title'] = 'Data Produk Buku Tahunan Sekolah';

        $this->form_validation->set_rules('id_katalog', 'Jenis Katalog', 'required');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('bahan_kertas', 'Bahan Kertas', 'required');
        $this->form_validation->set_rules('halaman', 'Halaman', 'required');
        $this->form_validation->set_rules('cover', 'Cover', 'required');
        $this->form_validation->set_rules('finishing', 'Finishing', 'required');
        $this->form_validation->set_rules('cetakan', 'Cetakan', 'required');
        $this->form_validation->set_rules('dokFile', 'Dok File', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/Admin/header', $data);
            $this->load->view('template/Admin/navbar', $data);
            $this->load->view('template/Admin/sidebar');
            $this->load->view('backend/produk/update', $data);
            $this->load->view('template/Admin/footer');
        } else {
            $data = $this->Produk_model->update();
            $this->session->set_flashdata('success', 'Data Produk Telah Diubah');
            redirect('admin/produk');
        }
    }
}
