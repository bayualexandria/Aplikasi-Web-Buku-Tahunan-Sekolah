<?php

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->model('Home_model');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Pelanggan';
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();
        $data['message'] = $this->Home_model->getMessage();
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required', [
            'required' => 'Nama Harus Di Isi'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Harus Di Isi'
        ]);

        $this->form_validation->set_rules('email_pelanggan', 'Alamat Email', 'required|trim|valid_email|is_unique[users.email]', [
            'required' => 'Email Harus Di Isi',
            'valid_email' => 'Email Tidak Valid',
            'is_unique' => 'Email Sudah Terdaftar'
        ]);

        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim');

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password Harus Di Isi',
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Tidak Boleh Pendek Min. 3 Karakter'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Password Harus Di Isi'
        ]);

        if ($this->form_validation->run() == false) {
            $config['base_url'] = 'http://localhost/ta/admin/Pelanggan/index';
            $this->db->like('name', $data['keyword']);
            $this->db->or_like('alamat', $data['keyword']);
            $this->db->or_like('no_hp', $data['keyword']);
            $this->db->or_like('email_pelanggan', $data['keyword']);
            $this->db->from('pelanggan');
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 5;

            $this->pagination->initialize($config);
            $data['start'] = $this->uri->segment(4);
            $data['pelanggan'] = $this->Pelanggan_model->getAlls($config['per_page'], $data['start'], $data['keyword']);
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('backend/pelanggan/index', $data);
            $this->load->view('template/admin/footer');
        } else {
            $this->Pelanggan_model->insert();
            $this->session->set_flashdata('success', 'Data Pelanggan Telah Ditambahkan');
            redirect('admin/pelanggan');
        }
    }

    public function delete($id)
    {
        $this->Pelanggan_model->delete($id);
        $this->session->set_flashdata('success', 'Data Pelanggan Telah Dihapus');
        redirect('admin/pelanggan');
    }

    public function update($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Users';
        $data['pelanggan'] = $this->Pelanggan_model->getById($id);
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();
        $data['message'] = $this->Home_model->getMessage();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required', [
            'required' => 'Nama Harus Di Isi'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Harus Di Isi'
        ]);

        $this->form_validation->set_rules('email_pelanggan', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus Di Isi',
            'valid_email' => 'Email Tidak Valid',
            'is_unique' => 'Email Sudah Terdaftar'
        ]);

        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim');

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password Harus Di Isi',
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Tidak Boleh Pendek Min. 3 Karakter'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Password Harus Di Isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('backend/pelanggan/update', $data);
            $this->load->view('template/admin/footer');
        } else {
            $this->Pelanggan_model->update();
            $this->session->set_flashdata('success', 'Data Pelanggan Telah Diubah');
            redirect('admin/pelanggan');
        }
    }
}
