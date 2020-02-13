<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemesanan</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php $id = $user['id'];
            $query = "SELECT `tbl_pemesanan`.*,`tbl_bahan`.*,`tbl_katalog`.`jenis_katalog`,`tbl_status`.`konfirmasi`,`tbl_status`.`style` FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id`  JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan`.`id` JOIN `tbl_status` ON `tbl_pemesanan`.`id_status`=`tbl_status`.`id` WHERE `tbl_pemesanan`.`id_pelanggan`=$id AND `tbl_pemesanan`.`id_status`=2 ORDER BY `tbl_pemesanan`.`date_created` DESC";
            $laporan = $this->db->query($query)->result_array(); ?>

            <table>
                <thead>
                    <tr>
                        <th>Jenis Katalog</th>
                        <th>Ukuran</th>
                        <th>Jenis Kertas</th>
                        <th>Cover</th>
                        <th>Finishing</th>
                        <th>Cetakan</th>
                        <th>Dok. File</th>
                        <th>Harga</th>
                        <th>QYT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan as $lap) : ?>
                        <tr>
                            <td><?= $lap['jenis_katalog']; ?></td>
                            <td><?= $lap['ukuran'];?></td>
                            <td><?= $lap['bahan_kertas'];?></td>
                            <td><?= $lap['cover'];?></td>
                            <td><?= $lap['finishing'];?></td>
                            <td><?= $lap['cetakan'];?></td>
                            <td><?= $lap['dokFile'];?></td>
                            <td><?= $lap['harga'];?></td>
                            <td><?= $lap['jumlah_katalog'];?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>