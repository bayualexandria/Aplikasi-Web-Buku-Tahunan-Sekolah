<?php

class User_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('users');
    }

    public function getById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function numAdmin()
    {
        return $this->db->get('users')->num_rows();
    }

    public function delete($id)
    {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function insert()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'images' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role_id' => 1,
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('users', $data);
    }

    public function update()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role_id' => 1,
            'is_active' => 1,
            'date_created' => time()
        ];
        // cek jika ada gambar yang akan diupload
        $upload_gambar = $_FILES['images']['name'];
        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '5000';
            $config['upload_path'] = './assets/images/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('images')) {
                $new_gambar = $this->upload->data('file_name');
                $this->db->set('images', $new_gambar);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
    }
}
