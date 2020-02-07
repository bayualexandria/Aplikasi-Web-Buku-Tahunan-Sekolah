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
        $data['message']=$this->Home_model->getMessage();
        $data['message3']=$this->Home_model->getMessage3();

        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('backend/admin/index', $data);
        $this->load->view('template/admin/footer');
    }

    public function delete($id)
    {
        $this->User_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Admin Sudah Terhapus</div>');
        redirect('admin/Admin');
    }
}
