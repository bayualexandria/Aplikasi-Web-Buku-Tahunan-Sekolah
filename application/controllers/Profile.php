<?php

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        is_logged();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Harus Di Isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Harus Di Isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim', [
            'required' => 'No Handphone Harus Di Isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Halaman Update Profile';
            $this->load->view('frontend/auth/template/header',$data);
            $this->load->view('frontend/profile/update', $data);
            $this->load->view('frontend/auth/template/footer');
  
        } else {
            $this->Pelanggan_model->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Profile Mu Telah Di Update</div>');
            redirect('Pemesanan');
        }
    }
}
