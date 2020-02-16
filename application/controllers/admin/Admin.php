<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Home_model');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Admin';
        $data['admin'] = $this->User_model->getAll();
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama harus di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email sudah teregistrasi!',
            'required' => 'Email harus di isi',
            'valid_emial' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password harus di isi'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('backend/admin/index', $data);
            $this->load->view('template/admin/footer');
        } else {
            $this->User_model->insert();
            $this->session->set_flashdata('success', 'Data Admin Telah Ditambahkan');
            redirect('admin/Admin');
        }
    }

    public function delete($id)
    {
        $this->User_model->delete($id);
        $this->session->set_flashdata('success', 'Data Admin Sudah Terhapus');
        redirect('admin/Admin');
    }

    public function update($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Update Data Admin';
        $data['admin'] = $this->User_model->getById($id);
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama harus di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password harus di isi'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('backend/admin/update', $data);
            $this->load->view('template/admin/footer');
        } else {
            $this->User_model->update();
            $this->session->set_flashdata('success', 'Data Admin Telah Diupdate');
            redirect('admin/Admin');
        }
    }
}
