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
            $this->load->view('frontend/auth/template/header', $data);
            $this->load->view('frontend/profile/update', $data);
            $this->load->view('frontend/auth/template/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp')
            ];
            $id = $this->input->post('id');

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
            $this->db->where('id', $id);
            $this->db->update('pelanggan');
            $this->session->set_flashdata('success', 'Profile Mu Telah Di Update');
            redirect('Pemesanan');
        }
    }
}
