<?php

class Pemesanan_model extends  CI_Model
{
    public function getPemesanan()
    {

        return $this->db->get('pelanggan');
    }
    public function getPemesananAll($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('no_hp', $keyword);
            $this->db->or_like('alamat', $keyword);
        }
        return $this->db->get('pelanggan', $limit, $start);
    }

    public function status($id)
    {
        $query = "SELECT `tbl_pemesanan`.*, `pelanggan`.`email_pelanggan` FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id` WHERE `tbl_pemesanan`.`id`=$id";
        return $this->db->query($query)->row_array();
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
            'id_status' => 5,
            'date_created' => time()
        ];
        $data['total'] = $jumlah * $harga;

        $this->db->insert('tbl_pemesanan', $data);
    }
    public function detailPemesanan($id)
    {
        $query = "SELECT `tbl_pemesanan`.*,`tbl_katalog`.`jenis_katalog`,`tbl_bahan`.`ukuran`,`tbl_bahan`.`bahan_kertas`,`tbl_bahan`.`harga`,`tbl_bahan`.`halaman`,`tbl_bahan`.`cover`,`tbl_bahan`.`finishing`,`tbl_bahan`.`cetakan`,`tbl_bahan`.`dokFile`,`tbl_bahan`.`pemesanan`,`tbl_bahan`.`bonus`,`tbl_bahan`.`harga`,`tbl_status`.`konfirmasi`,`tbl_status`.`style` FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id` JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan`.`id` JOIN `tbl_status` ON `tbl_pemesanan`.`id_status`=`tbl_status`.`id` WHERE `tbl_pemesanan`.`id`=$id ORDER BY `tbl_pemesanan`.`date_created` ASC";
        return $this->db->query($query)->row_array();
    }

    public function detail($id)
    {
        $query = "SELECT `tbl_pemesanan`.*,`tbl_katalog`.`jenis_katalog`,`tbl_bahan`.`ukuran`,`tbl_bahan`.`bahan_kertas`,`tbl_bahan`.`harga`,`tbl_bahan`.`halaman`,`tbl_bahan`.`cover`,`tbl_bahan`.`finishing`,`tbl_bahan`.`cetakan`,`tbl_bahan`.`dokFile`,`tbl_bahan`.`pemesanan`,`tbl_bahan`.`bonus`,`tbl_bahan`.`harga`,`tbl_status`.`konfirmasi`,`tbl_status`.`style` FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id` JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan`.`id` JOIN `tbl_status` ON `tbl_pemesanan`.`id_status`=`tbl_status`.`id` WHERE `tbl_pemesanan`.`id_pelanggan`=$id ORDER BY `tbl_pemesanan`.`date_created` ASC";
        return $this->db->query($query)->result_array();
    }

    public function cancel($id)
    {
        $status = 1;
        $this->db->set('id_status', $status);
        $this->db->where('id', $id);
        $this->db->update('tbl_pemesanan');
    }

    public function update()
    {
        $jumlah = $this->input->post('jumlah_katalog');
        $harga = $this->input->post('harga');
        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_katalog' => $this->input->post('id_katalog'),
            'id_bahan' => $this->input->post('id_bahan'),
            'jumlah_katalog' => $jumlah,
            'id_status' => 5,
            'date_created' => time()
        ];
        $data['total'] = $jumlah * $harga;

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_pemesanan', $data);
    }

    public function updateStatus()
    {
        $jumlah = $this->input->post('jumlah_katalog');

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
    }

    public function delete($id)
    {
        return $this->db->delete('tbl_pemesanan', ['id' => $id]);
    }
}
