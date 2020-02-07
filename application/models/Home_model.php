<?php

class Home_model extends CI_Model
{
    public function numPelanggan()
    {
        return $this->db->get('pelanggan')->num_rows();
    }

    public function numMessage()
    {
        return $this->db->get('message')->num_rows();
    }

    public function Company()
    {
        return $this->db->get('company')->result_array();
    }

    public function status()
    {
        return $this->db->get('tbl_status')->result_array();
    }

    public function getCompanyById($id)
    {
        return $this->db->get_where('company', ['id' => $id])->row_array();
    }

    public function updateCompany()
    {
        $data = [
            'nama_company' => $this->input->post('nama_company'),
            'alamat' => $this->input->post('alamat'),
            'no_telp_company' => $this->input->post('no_telp_company'),
            'date_updated' => time()
        ];
        $upload_gambar = $_FILES['logo_company']['name'];
        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '5000';
            $config['upload_path'] = './assets/images/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo_company')) {
                $old_gambar = $data['company']['logo_company'];
                if ($old_gambar != 'default.jpg') {
                    unlink(FCPATH . 'assets/images/profile/' . $old_gambar);
                }

                $new_gambar = $this->upload->data('file_name');
                $this->db->set('logo_company', $new_gambar);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('id',  $this->input->post('id'));
        $this->db->update('company',$data);
    }
    
    public function getMessage3()
    {
        $this->db->order_by('date_Send','DESC');
        return $this->db->get('message',3)->result_array();
    }
    public function getMessage()
    {
        return $this->db->get('message')->result_array();
    }

    public function getPelanggan()
    {
        return $this->db->get_where('pelanggan',['email_pelanggan']);
    }
}
