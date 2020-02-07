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
        $data['user']=$this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
        $data['title']='Data Users';
        $data['pelanggan']=$this->Pelanggan_model->getAll();
        $data['message']=$this->Home_model->getMessage();
        $data['message3']=$this->Home_model->getMessage3();
        $data['message']=$this->Home_model->getMessage();
        
        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('backend/pelanggan/index',$data);
        $this->load->view('template/admin/footer');
    }

    public function delete($name)
    {
        $this->Pelanggan_model->delete($name);
        
    }
}
