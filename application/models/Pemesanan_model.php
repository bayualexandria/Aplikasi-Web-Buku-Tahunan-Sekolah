<?php

class Pemesanan_model extends  CI_Model
{
    public function getPemesanan()
    {
        return $this->db->get('tbl_pemesanan')->result_array();
    }

    public function getAll()
    {
        $query = "SELECT * FROM `tbl_pemesanan` JOIN `tbl_ukuran_kertas` ON `tbl_pemesanan`.`id_ukuran`=`tbl_ukuran_kertas`.`id` JOIN `tbl_bahan_kertas` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan_kertas`.`id` JOIN `tbl_status` ON `tbl_pemesanan`.`id_status`=`tbl_status`.`id`";
        return $this->db->query($query);
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
        return $this->db->get('produck')->result_array();
    }

    public function produck($id)
    {
        return $this->db->get_where('produck', ['id' => $id])->row_array();
    }
}
