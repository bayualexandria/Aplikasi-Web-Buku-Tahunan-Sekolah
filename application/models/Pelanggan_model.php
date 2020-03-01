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

    public function getAlls($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('no_hp', $keyword);
            $this->db->or_like('email_pelanggan', $keyword);
        }
        return $this->db->get('pelanggan', $limit, $start);
    }

    public function getById($id)
    {
        return $this->db->get_where('pelanggan', ['id' => $id])->row_array();
    }

    public function delete($id)
    {
        return $this->db->delete('pelanggan', ['id' => $id]);
        return $this->db->delete('tbl_pemesanan', ['id_pelanggan' => $id]);
    }

    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'images' => 'default.png',
            'email_pelanggan' => $this->input->post('email_pelanggan'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role_id' => 2,
            'is_active' => 1
        ];
        $this->db->insert('pelanggan', $data);
    }

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'images' => 'default.png',
            'email_pelanggan' => $this->input->post('email_pelanggan'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role_id' => 2,
            'is_active' => 1
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pelanggan', $data);
    }
}
