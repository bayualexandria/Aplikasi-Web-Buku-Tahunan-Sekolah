<?php
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Home_model');
        is_logged_in();
        message();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();
        $data['NumRowUser'] = $this->Home_model->numPelanggan();
        $data['NumRowMessage'] = $this->Home_model->numMessage();
        $data['plg'] = $this->Home_model->getPelanggan();
        $data['title'] = 'Halaman Home';
        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('backend/home', $data);
        $this->load->view('template/admin/footer');
    }

    public function deleteMessage($id)
    {
        $this->db->delete('message', ['id' => $id]);
        redirect('admin/Home');
    }

    public function ChartStatus()
    {
        $data = $this->Home_model->status();
        echo json_encode($data);
    }
}
