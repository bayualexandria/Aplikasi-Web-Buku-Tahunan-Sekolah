<?php

class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['company'] = $this->Home_model->Company();
        $data['message']=$this->Home_model->getMessage();
        $data['message3']=$this->Home_model->getMessage3();
        $data['title'] = 'Halaman Perusahaan';
        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/navbar', $data);
        $this->load->view('template/admin/sidebar');
        $this->load->view('backend/company', $data);
        $this->load->view('template/admin/footer');
    }

    public function update($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['company']=$this->Home_model->getCompanyById($id);
        $data['message']=$this->Home_model->getMessage();
        $data['title'] = 'Halaman Update Perusahaan';

        $this->form_validation->set_rules('nama_company','Nama Perusahaan','required|trim',[
            'required'=>'Nama Perusahaan Harus Di Isi'
        ]);
        $this->form_validation->set_rules('alamat','Alamat Perusahaan','required|trim',[
            'required'=>'Nama Perusahaan Harus Di Isi'
        ]);
        $this->form_validation->set_rules('no_telp_company','No Telephone Perusahaan','required|trim',[
            'required'=>'Nama Perusahaan Harus Di Isi'
        ]);
        
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('backend/updateCompany', $data);
            $this->load->view('template/admin/footer');
        }else {
            $this->Home_model->updateCompany();
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Perusahaan Telah Terupdate!</div>');
            redirect('admin/Company');
        }
    }
}
