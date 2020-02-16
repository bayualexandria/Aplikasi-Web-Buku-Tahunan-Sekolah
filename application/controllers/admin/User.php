<?php

class User extends CI_Controller
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
        $data['title'] = 'Data My Profile';
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Harus Di Isi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Harus Di Isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('backend/user/index', $data);
            $this->load->view('template/admin/footer');
        } else {
            $data = [
                'name' => $this->input->post('name')
            ];
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_gambar = $_FILES['images']['name'];
            if ($upload_gambar) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '5000';
                $config['upload_path'] = './assets/images/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('images')) {
                    $old_gambar = $data['user']['images'];
                    if ($old_gambar != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/profile/' . $old_gambar);
                    }

                    $new_gambar = $this->upload->data('file_name');
                    $this->db->set('images', $new_gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set($data);
            $this->db->where('email', $email);
            $this->db->update('users');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Profile Mu Telah Di Update</div>');
            redirect('admin/User');
        }
    }

    public function ubahpassword()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data My Profile';
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus Di Isi'
        ]);
        $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required|trim|min_length[3]|matches[konfpasswordbaru]', [
            'required' => 'Password Baru Harus Di Isi',
            'matches' => 'Password Baru Tidak Sama',
            'min_length' => 'Password Terlalu Pendek! Min. 3 Karakter'
        ]);
        $this->form_validation->set_rules('konfpasswordbaru', 'Konfirmasi Password Baru', 'required|trim|matches[passwordbaru]', [
            'required' => 'Konfirmasi Password Baru Harus Di Isi',
            'matches' => 'Password Baru Tidak Sama'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('template/admin/navbar', $data);
            $this->load->view('template/admin/sidebar');
            $this->load->view('backend/user/update', $data);
            $this->load->view('template/admin/footer');
        } else {
            $password = $this->input->post('password');
            $passwordbaru = $this->input->post('passwordbaru');
            if ($password == $passwordbaru) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
                redirect('admin/User/ubahpassword');
            } else {
                $password_hash = password_hash($passwordbaru, PASSWORD_BCRYPT);
                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('users');
                $this->session->set_flashdata('message', '>Password Telah Di Ganti');
                redirect('admin/Admin');
            }
        }
    }
}
