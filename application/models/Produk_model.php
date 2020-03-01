<?php

class Produk_model extends CI_Model
{
    public function getProduk()
    {
        $query = "SELECT `tbl_bahan`.*,`tbl_katalog`.`jenis_katalog` FROM `tbl_bahan` JOIN `tbl_katalog` ON `tbl_bahan`.`id_katalog`=`tbl_katalog`.`id`";
        return $this->db->query($query);
    }
    public function getProduks($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('harga', $keyword);
            $this->db->or_like('bonus', $keyword);
            $this->db->or_like('pemesanan', $keyword);
            $this->db->or_like('dokFile', $keyword);
            $this->db->or_like('cetakan', $keyword);
            $this->db->or_like('finishing', $keyword);
            $this->db->or_like('cover', $keyword);
            $this->db->or_like('halaman', $keyword);
            $this->db->or_like('ukuran', $keyword);
            $this->db->or_like('bahan_kertas', $keyword);
        }
        return $this->db->get('tbl_bahan', $limit, $start);
    }
    public function countProduk()
    {
        return $this->db->get('tbl_bahan')->num_rows();
    }
    public function getIdProduk($id)
    {
        $query = "SELECT `tbl_bahan`.*,`tbl_katalog`.`jenis_katalog` FROM `tbl_bahan` JOIN `tbl_katalog` ON `tbl_bahan`.`id_katalog`=`tbl_katalog`.`id` WHERE `tbl_bahan`.`id`=$id";
        return $this->db->query($query)->row_array();
    }

    public function insert()
    {
        $data = [
            'id_katalog' => $this->input->post('id_katalog'),
            'ukuran' => $this->input->post('ukuran'),
            'bahan_kertas' => $this->input->post('bahan_kertas'),
            'halaman' => $this->input->post('halaman'),
            'cover' => $this->input->post('cover'),
            'finishing' => $this->input->post('finishing'),
            'cetakan' => $this->input->post('cetakan'),
            'dokFile' => $this->input->post('dokFile'),
            'pemesanan' => 'Sejumlah Siswa Akhir',
            'bonus' => '15 Katalog untuk sekolah',
            'harga' => $this->input->post('harga'),
            'bg' => 'starred'
        ];

        $this->db->insert('tbl_bahan', $data);
    }

    public function update()
    {
        $data = [
            'id_katalog' => $this->input->post('id_katalog'),
            'ukuran' => $this->input->post('ukuran'),
            'bahan_kertas' => $this->input->post('bahan_kertas'),
            'halaman' => $this->input->post('halaman'),
            'cover' => $this->input->post('cover'),
            'finishing' => $this->input->post('finishing'),
            'cetakan' => $this->input->post('cetakan'),
            'dokFile' => $this->input->post('dokFile'),
            'pemesanan' => 'Sejumlah Siswa Akhir',
            'bonus' => '15 Katalog untuk sekolah',
            'harga' => $this->input->post('harga'),
            'bg' => 'starred'
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_bahan', $data);
    }

    public function delete($id)
    {
        $this->db->delete('tbl_bahan', ['id' => $id]);
    }
}
