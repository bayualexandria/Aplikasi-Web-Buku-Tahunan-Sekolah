<?php

class Pemesanan_model extends  CI_Model
{
    public function getPemesanan()
    {
        return $this->db->get('tbl_pemesanan')->result_array();
    }

    public function getAll()
    {
        $query = "SELECT * FROM `tbl_pemesanan` JOIN `tbl_ukuran_kertas` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan_kertas`.`id` JOIN `tbl_status` ON `tbl_pemesanan`.`id_status`=`tbl_status`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function getUkuran()
    {
        return $this->db->get('tbl_ukuran_kertas');
    }

    public function getBahan($id)
    {
        return $this->db->get_where('tbl_bahan_kertas', ['id_jenis_ukuran' => $id])->result_array();
    }


    public function producks()
    {
        $query = "SELECT `tbl_bahan`.*,`tbl_katalog`.`jenis_katalog` FROM `tbl_bahan` JOIN `tbl_katalog` ON `tbl_bahan`.`id_katalog`=`tbl_katalog`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function bahan($id)
    {
        return $this->db->get_where('tbl_bahan', ['id' => $id])->row_array();
    }
    public function katalog($id)
    {
        return $this->db->get_where('tbl_katalog', ['id' => $id])->row_array();
    }

    public function insertPemesanan()
    {
        $jumlah = $this->input->post('jumlah_katalog');
        $harga = $this->input->post('harga');
        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_katalog' => $this->input->post('id_katalog'),
            'id_bahan' => $this->input->post('id_bahan'),
            'jumlah_katalog' => $jumlah,
            'id_status' => 4,
            'date_created' => time()
        ];
        $data['total'] = $jumlah * $harga;

        $this->db->insert('tbl_pemesanan', $data);
    }
}
