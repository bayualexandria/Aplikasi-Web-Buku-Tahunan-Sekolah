<?php
class Website extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Halaman Utama';
        $data['name'] = 'CV Azharku Media';

        $this->load->view('template/website/header', $data);
        $this->load->view('frontend/index');
        $this->load->view('template/website/footer');
    }

    public function portfolio()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Daftar Desain';
        $data['description'] = 'Halaman Daftar Desain Azharku Media';

        $this->load->view('template/website/header', $data);
        $this->load->view('frontend/generic');
        $this->load->view('template/website/footer');
    }

    public function blog()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Portfolio';
        $data['description'] = 'Halaman Portfolio Azharku Media';

        $this->load->view('template/website/header', $data);
        $this->load->view('frontend/element');
        $this->load->view('template/website/footer');
    }

    public function contact()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Contact';
        $data['description'] = 'Halaman Contact Azharku Media';

        $this->load->view('template/website/header', $data);
        $this->load->view('frontend/contact', $data);
        $this->load->view('template/website/footer');
    }

    public function pesan()
    {
        $pelanggan = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $email = $this->input->post('email', true);

        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'mess' => htmlspecialchars($this->input->post('mess', true)),
            'logo' => $this->input->post('logo', true),
            'date_send' => time()
        ];

        if ($data['email'] == $pelanggan['email_pelanggan']) {
            $data['logo'] = $pelanggan['images'];
        } else {
            $data['logo'] = 'default.jpg';
        }
        $this->db->insert('message', $data);

        $this->_sendEmail();
        $this->session->set_flashdata('success', 'Pesan berhasil terkirim');
        redirect('website/contact');
    }

    private function _sendEmail()
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

        $this->email->from($this->input->post('email'));
        $this->email->to('wardanabayu455@gmail.com', 'Administrator');
        $this->email->subject('Message User');
        $this->email->message('Nama : ' . $this->input->post('name') . '<br>Email : ' . $this->input->post('email') . '<p style="text-align:justify;">Pesan : ' . $this->input->post('mess') . '</p>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
