<?php

class Pelanggan_model extends CI_Model
{
    public function numPelanggan()
    {
        return $this->db->get('pelanggan')->num_rows();
    }

    public function getAll()
    {
        return $this->db->get('pelanggan');
    }

    public function delete($name)
    {
        return $this->db->delete('pelanggan', ['name' => $name]);
        return $this->db->delete('tbl_pemesanan', ['nama_lengkap' => $name]);
    }

    public function update()
    {
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
    }
}
