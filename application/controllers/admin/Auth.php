<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin/Home');
        }
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus Di Isi',
            'valid_email' => 'Email Tidak Valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus Di Isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin | Login';
            $this->load->view('template/admin/auth/header', $data);
            $this->load->view('backend/auth/login');
            $this->load->view('template/admin/auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        //usernya ada
        if ($user) {
            //    jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    if ($user['role_id'] == 1) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin/Home');
                    } else {
                        $this->session->set_flashdata('message_error', '<div class="alert alert-danger text-center" role="alert">Anda Tidak Punya Hak Akses Ke Admin</div>');
                        redirect('admin/Auth');
                    }
                } else {
                    $this->session->set_flashdata('message_error', '<div class="alert alert-danger text-center" role="alert">Password Salah!</div>');
                    redirect('admin/Auth');
                }
            } else {
                $this->session->set_flashdata('message_error', '<div class="alert alert-danger text-center" role="alert">Email Ini Belum Diaktifasi!</div>');
                redirect('admin/Auth');
            }
        } else {
            $this->session->set_flashdata('message_error', '<div class="alert alert-danger text-center" role="alert">Email Belum Terdaftar</div>');
            redirect('admin/Auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('admin/Home');
        }

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Harus Di Isi'
        ]);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[users.email]', [
            'required' => 'Email Harus Di Isi',
            'valid_email' => 'Email Tidak Valid',
            'is_unique' => 'Email Sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repassword]', [
            'required' => 'Password Harus Di Isi',
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Tidak Boleh Pendek Min. 3 Karakter'
        ]);
        $this->form_validation->set_rules('repassword', 'Password', 'required|trim|matches[password]', [
            'required' => 'Nama Harus Di Isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin | Registration';
            $this->load->view('template/admin/auth/header', $data);
            $this->load->view('backend/auth/register');
            $this->load->view('template/admin/auth/footer');
        } else {
            $token = base64_encode(random_bytes(32));
            $this->Auth_model->addAdmin($token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Selamat! Anda Berhasil Membuat Akun. Mohon Untuk Aktifasi Akun Anda</div>');
            redirect('admin/Auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'wardanabayu508@gmail.com',
            'smtp_pass' => 'Wardana229813',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('wardanabayu508@gmail.com', 'Administrator');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun Yang Telah Didaftarkan');
            $this->email->message('Klik link ini untuk verifikasi akun mu : <a href="' . base_url() . 'admin/Auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Verifikasi Reset Password');
            $this->email->message('Klik link ini untuk reset password mu : <a href="' . base_url() . 'admin/Auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('users_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 5)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');

                    $this->db->delete('users_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">' . $email . ' Telah Di Aktifasi! Silahkan Login</div>');
                    redirect('admin/Auth');
                } else {

                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('users_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Aktifasi Akun Gagal! Token Kadaluarsa</div>');
                    redirect('admin/Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Aktifasi Akun Gagal! Token Salah</div>');
                redirect('admin/Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Aktifasi Akun Gagal! Email Salah</div>');
            redirect('admin/Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Anda Sudah Logout Dari Sistem</div>');
        redirect('admin/Auth');
    }

    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus Di Isi',
            'valid_email' => 'Email Tidak Valid'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin | Forgot Password';
            $this->load->view('template/admin/auth/header', $data);
            $this->load->view('backend/auth/forgot');
            $this->load->view('template/admin/auth/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                if ($user['role_id'] == 1) {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time()
                    ];
                    $this->db->insert('users_token', $user_token);
                    $this->_sendEmail($token, 'forgot');
                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Mohon Cek Email Untuk Me-Reset Password!</div>');
                    redirect('admin/Auth/forgotPassword');
                } else {
                    $this->session->set_flashdata('message_error', '<div class="alert alert-danger text-center" role="alert">Email Ditolak! Email Sudah Terdaftar Di Akses Lain.</div>');
                    redirect('admin/Auth/forgotPassword');
                }
            } else {
                $this->session->set_flashdata('message_error', '<div class="alert alert-danger text-center" role="alert">Email Belum Terdaftar Atau Belum Teraktifasi!</div>');
                redirect('admin/Auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('users_token', ['token' => $token])->row_array();
            if ($user_token) { 
                if (time() - $user_token['date_created'] < (60 * 5)) {
                    $this->session->set_userdata('reset_email',$email);
                    $this->changePassword();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Reset Password Berhasil! Silahkan Login.</div>');
                    redirect('admin/Auth');
                }else {
                    $this->db->delete('users_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Reset Password Gagal! Token Kadaluarsa</div>');
                    redirect('admin/Auth');
                }
            } else {
                $this->session->set_flashdata('message_error', '<div class="alert alert-danger text-center" role="alert">Reset Password Gagal! Token Salah.</div>');
                redirect('admin/Auth');
            }
        } else {
            $this->session->set_flashdata('message_error', '<div class="alert alert-danger text-center" role="alert">Reset Password Gagal! Email Salah.</div>');
            redirect('admin/Auth');
        }
    }

    public function changePassword()
    {
        if(!$this->session->userdata('reset_email')){
            redirect('admin/Auth');
        }

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repassword]', [
            'required' => 'Password Harus Di Isi',
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Tidak Boleh Pendek Min. 3 Karakter'
        ]);
        $this->form_validation->set_rules('repassword', 'Password', 'required|trim|matches[password]', [
            'required' => 'Nama Harus Di Isi',
            'matches' => 'Password Tidak Sama'
        ]);

        if($this->form_validation->run()==FALSE){
            $data['title'] = 'Admin | Change Password';
            $this->load->view('template/admin/auth/header', $data);
            $this->load->view('backend/auth/change');
            $this->load->view('template/admin/auth/footer');
        }else{
            $password=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $email=$this->session->userdata('email');

            $this->db->set('password',$password);
            $this->db->where('email',$email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Password Sudah Di Ubah! Mohon Login.</div>');
            redirect('admin/Auth');
        }
    }
}
