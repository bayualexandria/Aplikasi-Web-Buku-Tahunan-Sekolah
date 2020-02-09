<?php

class Auth extends CI_Controller
{

    public function construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        if ($this->session->userdata('email_pelanggan')) {
            redirect('Website');
        }
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Halaman Login';

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus Di Isi',
            'valid_email' => 'Email Tidak Valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus Di Isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/auth/template/header', $data);
            $this->load->view('frontend/auth/index', $data);
            $this->load->view('frontend/auth/template/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('pelanggan', ['email_pelanggan' => $email])->row_array();

        //usernya ada
        if ($user) {
            //    jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    if ($user['role_id'] == 2) {
                        $data = [
                            'email_pelanggan' => $user['email_pelanggan'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('login', 'Selamat Anda Berhasil Login Di Website Kami');
                        redirect('Pemesanan');
                    } else {
                        $this->session->set_flashdata('error', 'Anda Tidak Punya Hak Akses Ke Pelanggan');
                        redirect('Auth');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Password Salah!');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Email Ini Belum Diaktifasi!');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Email Belum Terdaftar!');
            redirect('Auth');
        }
    }

    public function register()
    {
        if ($this->session->userdata('email_pelanggan')) {
            redirect('Website');
        }

        $data['title'] = 'Halaman Register';

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Harus Di Isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim|min_length[10]', [
            'required' => 'No Handphone Harus Di Isi',
            'min_length' => 'No Handphone Tidak Boleh Pendek Min. 11 Karakter'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Harus Di Isi',
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
        $this->form_validation->set_rules('repassword', 'Password', 'required|trim|min_length[3]|matches[password]', [
            'required' => 'Re Password Harus Di Isi',
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Tidak Boleh Pendek Min. 3 Karakter'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
            $this->load->view('frontend/auth/template/header', $data);
            $this->load->view('frontend/auth/register', $data);
            $this->load->view('frontend/auth/template/footer');
        } else {

            $name = $this->input->post('name', true);
            $email = $this->input->post('email', true);
            $alamat = $this->input->post('alamat');
            $no = $this->input->post('no_hp');

            $data = [
                'name' => htmlspecialchars($name),
                'email_pelanggan' => htmlspecialchars($email),
                'alamat' => htmlspecialchars($alamat),
                'no_hp' => htmlspecialchars($no),
                'images' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('pelanggan', $data);
            $this->db->insert('users_token', $user_token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('success', 'Selamat! Anda Berhasil Membuat Akun. Mohon Untuk Aktifasi Akun Anda Pada Pesan Yang Terkirim Ke Email Anda.');
            redirect('Auth');
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
            $this->email->message('Klik link ini untuk verifikasi akun mu : <a href="' . base_url() . 'Auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Verifikasi Reset Password');
            $this->email->message('Klik link ini untuk reset password mu : <a href="' . base_url() . 'Auth/reset?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function forgot()
    {
        if ($this->session->userdata('email_pelanggan')) {
            redirect('Website');
        }
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus Di Isi',
            'valid_email' => 'Email Tidak Valid'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Reset Password';
            $this->load->view('frontend/auth/template/header', $data);
            $this->load->view('frontend/auth/forgot', $data);
            $this->load->view('frontend/auth/template/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('pelanggan', ['email_pelanggan' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                if ($user['role_id'] == 2) {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time()
                    ];
                    $this->db->insert('users_token', $user_token);
                    $this->_sendEmail($token, 'forgot');
                    $this->session->set_flashdata('success', 'Mohon Cek Email Untuk Me-Reset Password!');
                    redirect('Auth/forgot');
                } else {
                    $this->session->set_flashdata('error', 'Email Ditolak! Email Sudah Terdaftar Di Akses Lain.');
                    redirect('Auth/forgot');
                }
            } else {
                $this->session->set_flashdata('error', 'Email Belum Terdaftar Atau Belum Teraktifasi!');
                redirect('Auth/forgot');
            }
        }
    }

    public function reset()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('pelanggan', ['email_pelanggan' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('users_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 5)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->change();
                } else {
                    $this->db->delete('users_token', ['email' => $email]);
                    $this->session->set_flashdata('error', 'Reset Password Gagal! Token Kadaluarsa');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Reset Password Gagal! Token Salah.');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Reset Password Gagal! Email Salah.');
            redirect('Auth');
        }
    }

    public function change()
    {
        if ($this->session->userdata('email_pelanggan')) {
            redirect('Website');
        }
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();

        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
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

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pelanggan | Change Password';
            $this->load->view('template/website/header', $data);
            $this->load->view('frontend/auth/change');
            // $this->load->view('template/admin/auth/footer');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $email = $this->session->userdata('email_pelanggan');

            $this->db->set('password', $password);
            $this->db->where('email_pelanggan', $email);
            $this->db->update('pelanggan');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Password Sudah Di Ubah! Mohon Login.</div>');
            redirect('Auth');
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('pelanggan', ['email_pelanggan' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('users_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 5)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email_pelanggan', $email);
                    $this->db->update('pelanggan');

                    $this->db->delete('users_token', ['email' => $email]);

                    $this->session->set_flashdata('success', '' . $email . ' Telah Di Aktifasi! Silahkan Login');
                    redirect('Auth');
                } else {

                    $this->db->delete('pelanggan', ['email_pelanggan' => $email,]);
                    $this->db->delete('tbl_pemesanan', ['email' => $email]);
                    $this->db->delete('users_token', ['email' => $email]);
                    $this->session->set_flashdata('error', 'Aktifasi Akun Gagal! Token Kadaluarsa, Daftar Kembali.');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Aktifasi Akun Gagal! Token Salah');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Aktifasi Akun Gagal! Email Salah.');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email_pelanggan');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('success', 'Anda Sudah Logout Dari Sistem');
        redirect('Website');
    }
}
