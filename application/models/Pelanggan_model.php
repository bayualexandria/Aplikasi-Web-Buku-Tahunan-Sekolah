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

  
}
