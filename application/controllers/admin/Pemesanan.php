<?php

class Pemesanan extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Home_model');
        $this->load->library('pdf');
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Pemesanan Buku Tahunan Sekolah';
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = 'http://localhost/ta/admin/Pemesanan/index';
        $this->db->like('name', $data['keyword']);
        $this->db->or_like('no_hp', $data['keyword']);
        $this->db->or_like('alamat', $data['keyword']);
        $this->db->from('pelanggan');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        $data['All'] = $this->Pemesanan_model->getPemesananAll($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('Template/Admin/header', $data);
        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar');
        $this->load->view('Backend/pemesanan/index', $data);
        $this->load->view('Template/Admin/footer');
    }


    public function insert()
    {
        $data['All'] = $this->Pemesanan_model->getAll();
        $data['Bahan'] = $this->Pemesanan_model->getBahan();
        $data['Ukuran'] = $this->Pemesanan_model->getUkuran();
        $data['message'] = $this->Home_model->getMessage();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trims');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trims');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trims');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trims');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Insert Data Pemesanan';
            $this->load->view('Template/Admin/header');
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar');
            $this->load->view('Backend/pemesanan/index', $data);
            $this->load->view('Template/Admin/footer');
        } else {
            $this->Pemesanan_model->addData();
            $this->session->set_flashdata('success', 'Data Pemesanan Telah Ditambahkan');
            redirect('admin/pemesanan');
        }
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['All'] = $this->Pemesanan_model->detail($id);
        $data['detail'] = $this->db->get_where('pelanggan', ['id' => $id])->row_array();
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();

        $data['title'] = 'Detail Data Pemesanan';
        $this->load->view('Template/Admin/header', $data);
        $this->load->view('Template/Admin/navbar', $data);
        $this->load->view('Template/Admin/sidebar');
        $this->load->view('Backend/pemesanan/detail', $data);
        $this->load->view('Template/Admin/footer');
    }

    public function verify($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['one'] = $this->Pemesanan_model->pemesanan($id);
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();
        $data['title'] = 'Konfirmasi Data Pemesanan';
        $this->load->view('template/Admin/header', $data);
        $this->load->view('template/Admin/navbar', $data);
        $this->load->view('template/Admin/sidebar');
        $this->load->view('backend/pemesanan/verify', $data);
        $this->load->view('template/Admin/footer');
    }

    public function updateKonfirmasi()
    {
        $this->db->set('id_status', $this->input->post('id_status'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_pemesanan');
        $this->session->set_flashdata('success', 'Konfirmasi pembayaran telah berhasil');
        redirect('admin/pemesanan');
    }

    public function updateStatus($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['one'] = $this->Pemesanan_model->status($id);
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();

        $this->form_validation->set_rules('id_status', 'ID Status', 'required');
        $this->form_validation->set_rules('id_katalog', 'ID Katalog', 'required');
        $this->form_validation->set_rules('jumlah_katalog', 'Jumlah Katalog', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');
        $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'required');
        $this->form_validation->set_rules('nama_pelanggan', 'Nama', 'required');
        $this->form_validation->set_rules('nama_pelanggan', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Detail Data Pemesanan';
            $this->load->view('Template/Admin/header', $data);
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar');
            $this->load->view('Backend/pemesanan/statusUpdate', $data);
            $this->load->view('Template/Admin/footer');
        } else {
            // $this->Pemesanan_model->updateStatus();
            $jumlah = $this->input->post('jumlah_katalog');
            $email = $this->input->post('email_pelanggan');
            $pesan = $this->input->post('pesan');

            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_katalog' => $this->input->post('id_katalog'),
                'id_bahan' => $this->input->post('id_bahan'),
                'jumlah_katalog' => $jumlah,
                'total' => $this->input->post('total'),
                'id_status' => $this->input->post('id_status'),
                'date_created' => time()
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_pemesanan', $data);

            $status = $data['id_status'];

            $this->_sendEmail($email, $status, $data, $pesan);

            $this->session->set_flashdata('success', 'Status Pemesanan Telah Diubah');
            redirect('admin/pemesanan');
        }
    }

    private function _sendEmail($email, $status, $data, $pesan)
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

        $this->email->from('wardanabayu455@gmail.com', 'Administrator');
        $this->email->to($email);
        if ($status == 4) {
            $this->email->subject('Message User');
            $this->email->message('<img style="text-align:center" src="https://bayuwardana.000webhostapp.com/Ta-Fungki/assets/web/img/azhar.png"/ width="50%"><br/><b style="text-align:center">Pemberitahuan Status Pemesanan Buku Tahunan Di CV. Azharku Media<b/><br/>Kepada :' . $data['nama_pelanggan'] . '<br/><br/><b>Dengan Status Pemesanan Dalam Pemrosesan Untuk Pembuatan Buku Tahunan</b><br/>' . $pesan);
        } elseif ($status == 3) {
            $this->email->subject('Message User');
            $this->email->message('<img style="text-align:center" src="https://bayuwardana.000webhostapp.com/Ta-Fungki/assets/web/img/azhar.png"/ width="50%"><br/><b style="text-align:center">Pemberitahuan Status Pemesanan Buku Tahunan Di CV. Azharku Media<b/><br/>Kepada :' . $data['nama_pelanggan'] . '<br/><br/><b>Dengan Status Pemesanan Dalam Pemrosesan 50% Untuk Pembuatan Buku Tahunan</b><br/><p style="text-align:justify">' . $pesan . '</p>');
        } elseif ($status == 1) {
            $this->email->subject('Message User');
            $this->email->message('<img style="text-align:center" src="https://bayuwardana.000webhostapp.com/Ta-Fungki/assets/web/img/azhar.png"/ width="50%"><br/><b style="text-align:center">Pemberitahuan Status Pemesanan Buku Tahunan Di CV. Azharku Media<b/><br/>Kepada :' . $data['nama_pelanggan'] . '<br/><br/><b>Dengan Status Pemesanan Telah Di Batalkan Untuk Pembuatan Buku Tahunan</b><br/><p style="text-align:justify">' . $pesan . '</p>');
        } elseif ($status == 2) {
            $this->email->subject('Message User');
            $this->email->message('<img src="https://bayuwardana.000webhostapp.com/Ta-Fungki/assets/web/img/azhar.png"/ width="50%" style="text-align:center"><br/><p style="text-align:center">Pemberitahuan Status Pemesanan Buku Tahunan Di CV. Azharku Media<b/><br/>Kepada :' . $data['nama_pelanggan'] . '<br/><br/><b>Dengan Status Pemesanan Telah Selesai Untuk Pembuatan Buku Tahunan</b><br/><p style="text-align:justify">' . $pesan . '</p><br/><br/><p>Klik <a href="' . base_url() . 'pemesanan/laporan_pdf">disini</a> untuk melihat nota pemesanan anda</p>');
        } else {
            $this->email->subject('Message User');
            $this->email->message('<img style="text-align:center" src="https://bayuwardana.000webhostapp.com/Ta-Fungki/assets/web/img/azhar.png"/ width="50%"><br/><b style="text-align:center">Pemberitahuan Status Pemesanan Buku Tahunan Di CV. Azharku Media<b/><br/>Kepada :' . $data['nama_pelanggan'] . '<br/><br/><b>Dengan Status Pemesanan Dalam Pengorderan Untuk Pembuatan Buku Tahunan</b><br/><p style="text-align:justify">' . $pesan . '</p>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function delete($id)
    {
        $this->Pemesanan_model->delete($id);
        $this->session->set_flashdata('success', 'Pemesanan Telah Dihapus');
        redirect('admin/pemesanan');
    }

    public function update($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['produck'] = $this->Pemesanan_model->detailPemesanan($id);
        $data['message'] = $this->Home_model->getMessage();
        $data['message3'] = $this->Home_model->getMessage3();

        $this->form_validation->set_rules('jumlah_katalog', 'Jumlah Katalog', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Detail Data Pemesanan';
            $this->load->view('Template/Admin/header', $data);
            $this->load->view('Template/Admin/navbar', $data);
            $this->load->view('Template/Admin/sidebar');
            $this->load->view('Backend/pemesanan/update', $data);
            $this->load->view('Template/Admin/footer');
        } else {
            $data = [
                'jumlah_katalog' => $this->input->post('jumlah_katalog'),
                'total' => $this->input->post('total')
            ];
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_pemesanan');
            $this->session->set_flashdata('success', 'Pemesanan Telah Diubah');
            redirect('admin/Pemesanan');
        }
    }

    public function laporan_pdf($id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->Pelanggan_model->getById($id);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = 'laporan_pemesanan.pdf';
        $this->pdf->load_view('backend/pemesanan/laporan_pdf', $data);
    }
}
