<?php

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->model('Pemesanan_model');
        $this->load->library('pdf');
        is_logged();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Pemesanan';
        $data['description'] = 'Halaman Pemesanan Buku Tahunan Sekolah';
        $data['producks'] = $this->Pemesanan_model->producks();


        $this->load->view('frontend/auth/template/header', $data);
        $this->load->view('frontend/pemesanan/index', $data);
        $this->load->view('frontend/auth/template/footer');
    }

    public function laporan_pdf()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = 'laporan_pemesanan.pdf';
        $this->pdf->load_view('frontend/pemesanan/laporan_pdf', $data);
    }

    public function order($id)
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Pemesanan Order';
        $data['description'] = 'Halaman Order Buku Tahunan Sekolah';
        $data['produck'] = $this->Pemesanan_model->bahan($id);

        // ================================= START ============================
        //=================== WHITE BOX TESTING ===============================
        // Step 1
        // Melakukan validasi terhadap jumlah katalog dan yang di masukan 
        $this->form_validation->set_rules('jumlah_katalog', 'Jumlah Katalog', 'required|trim');

        // Step 2
        // Jika data validasi yang di masukan benar maka akan melakukan insert data ke tabel pemesanan jika tidak maka akan menampilkan pesan kesalahan
        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/auth/template/header', $data);
            $this->load->view('frontend/pemesanan/order', $data);
            $this->load->view('frontend/auth/template/footer');
        } else {
            // Step 3
            // link ke function insertPemesanan();
            $this->insertPemesanan();
            $this->_sendEmailPembayaran($id);
        }
    }

    public function insertPemesanan()
    {
        // Step 4
        // Pengiriman notifikasi pesan ke email tujuan
        $this->_sendEmail();
        // Step 5
        // Proses insert data ke Model Pemesanan
        $this->Pemesanan_model->insertPemesanan();
        // Step 6
        // Pesan pop-up data pemesanan telah diterima reidrect ke halaman index
        $this->session->set_flashdata('success', 'Terima kasih! Orderan anda telah diterima.');
        redirect('Pemesanan/transfer');
    }

    public function transfer()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Pembayaran Pemesanan';
        $data['description'] = 'Halaman Transfer Biaya Buku Tahunan Sekolah';
        $this->load->view('frontend/auth/template/header', $data);
        $this->load->view('frontend/pemesanan/transfer', $data);
        $this->load->view('frontend/auth/template/footer');
    }

    public function pembayaran($id)
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Pembayaran Pemesanan';
        $data['description'] = 'Halaman Transfer Biaya Buku Tahunan Sekolah';
        $data['produk'] = $this->Pemesanan_model->pemesanan($id);
        $this->load->view('frontend/auth/template/header', $data);
        $this->load->view('frontend/pemesanan/transfer1', $data);
        $this->load->view('frontend/auth/template/footer');
    }

    private function _sendEmailPembayaran($id)
    {
        $pesanan = $this->Pemesanan_model->detailPemesanan($id);
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
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

        $this->email->from('fungkib@gmail.com', 'fungki budi');
        $this->email->to($data['user']['email_pelanggan']);
        $this->email->subject('Message User');
        $this->email->message('<img style="text-align:center" src="https://azharku-media.000webhostapp.com/assets/images/profile/azhar.png"/ width="50%"><br/><b style="text-align:center">Pemberitahuan Status Pemesanan Buku Tahunan Di CV. Azharku Media<b/><br/>Kepada :' . $data['user']['name'] . '<br/><br/><b>Terima Kasih Anda Telah Melakukan Pemesenan <br/>Silahkan untuk melakukan pembayaran total pemesanan anda</b><br/><br/>Pemesanan<br/><table style="font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;"><thead><tr><th style=" border: 1px solid #ddd;padding: 8px;">Jenis Katalog</th><th style=" border: 1px solid #ddd;padding: 8px;">Harga</th><th style=" border: 1px solid #ddd;padding: 8px;">Jumlah</th></tr></thead><tbody><tr><td style=" border: 1px solid #ddd;padding: 8px;">' . $pesanan['jenis_katalog'] . '</td><td style=" border: 1px solid #ddd;padding: 8px;">Rp' . $pesanan['harga'] . '.00;-</td><td style=" border: 1px solid #ddd;padding: 8px;">' . $pesanan['jumlah_katalog'] . '</td></tr><tr><td colspan="2" style=" border: 1px solid #ddd;padding: 8px;">Total</td><td style=" border: 1px solid #ddd;padding: 8px;">Rp' . $pesanan['total'] . '.00;-</td></tr></tbody></table><br/><br/>Transfer Pembayaran<br/><p>Silahkan Transfer Ke No. Rekening Di Bawah Ini Atas Nama</p><table><tr><th colspan="2" style=" border: 1px solid #ddd;padding: 8px;">cv azharku media</th><th style=" border: 1px solid #ddd;padding: 8px;">Bank Jateng : 1021-015276 </th></tr></table><p>(* Transfer dengan nominal yang tertera pada total pemesanan)</p>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    // ================================== END =======================================

    private function _sendEmail()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
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
        $this->email->to($data['user']['email_pelanggan']);
        $this->email->subject('Message User');
        $this->email->message('<img style="text-align:center" src="https://bayuwardana.000webhostapp.com/Ta-Fungki/assets/web/img/azhar.png"/ width="50%"><br/><b style="text-align:center">Pemberitahuan Status Pemesanan Buku Tahunan Di CV. Azharku Media<b/><br/>Kepada :' . $data['user']['name'] . '<br/><br/><b>Terima Kasih Anda Telah Melakukan Pemesenan <br/>Dengan Status Pemesanan Dalam Pengorderan Untuk Pembuatan Buku Tahunan</b>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Detail Pemesanan';
        $data['detail'] = $this->Pemesanan_model->detailPemesanan($id);
        $this->load->view('frontend/auth/template/header', $data);
        $this->load->view('frontend/pemesanan/detail', $data);
        $this->load->view('frontend/auth/template/footer');
    }

    public function batal($id)
    {
        $this->Pemesanan_model->cancel($id);
        $this->session->set_flashdata('success', 'Anda telah membatalkan pemesanan');
        redirect('Pemesanan');
    }

    public function bukti_upload($id)
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Upload Bukti Pembayaran';
        $data['upload'] = $this->Pemesanan_model->detailPemesanan($id);

        $this->form_validation->set_rules('images', 'Upload Bukti Pembayaran', 'required', [
            'required' => "Anda harus memasukan bukti pembayaran"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/auth/template/header', $data);
            $this->load->view('frontend/pemesanan/upload', $data);
            $this->load->view('frontend/auth/template/footer');
        } else {
            $this->upload($id);
        }
    }

    public function upload($id)
    {
        $data['upload'] = $this->Pemesanan_model->detailPemesanan($id);
        $data = [
            'date_created' => time()
        ];

        $upload_gambar = $_FILES['images']['name'];
        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']     = '0';
            $config['upload_path'] = './assets/images/bukti_pembayaran/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('images')) {
                $old_gambar = $data['upload']['images'];
                if ($old_gambar != 'default.jpg') {
                    unlink(FCPATH . 'assets/images/bukti_pembayaran/' . $old_gambar);
                }
                $new_gambar = $this->upload->data('file_name');
                $this->db->set('images', $new_gambar);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_pemesanan', $data);
        $this->session->set_flashdata('success', 'Terima kasih! Kami akan melakukan verifikasi dalam waktu kurang dari 30 menit.');
        redirect('Pemesanan');
    }

    public function update($id)
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Update Order Pemesanan';
        $data['description'] = 'Halaman Update Order Buku Tahunan Sekolah';
        $data['produck'] = $this->Pemesanan_model->detailPemesanan($id);

        $this->form_validation->set_rules('jumlah_katalog', 'Jumlah Katalog', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/auth/template/header', $data);
            $this->load->view('frontend/pemesanan/update', $data);
            $this->load->view('frontend/auth/template/footer');
        } else {
            $this->Pemesanan_model->update();
            $this->session->set_flashdata('success', 'Anda telah merubah pemesanan anda');
            redirect('Pemesanan');
        }
    }

    public function lap()
    {
        $data['user'] = $this->db->get_where('pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
        $data['title'] = 'Update Order Pemesanan';
        $data['description'] = 'Halaman Update Order Buku Tahunan Sekolah';
        $this->load->view('frontend/auth/template/header', $data);

        $this->load->view('frontend/pemesanan/lap');
        $this->load->view('frontend/auth/template/footer');
    }
}
