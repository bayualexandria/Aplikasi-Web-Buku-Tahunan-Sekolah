<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .img {
            width: 150px;
            margin-top: 1rem;
        }

        .text {
            font-size: 25px;
        }

        .text small {
            font-size: 15px;
        }

        .invoice-info {
            margin-left: 1rem;
            margin-top: 50px;
        }

        .invoice-info .invoice-col {
            margin-top: 50px;
        }

        .kol1 {
            float: right;
        }

        .table {
            font-size: 12px;
        }

        .lead {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header text">
                        <img class="img" src="assets/images/profile/azhar.png" /> CV. Azharku Media
                        <small class="float-right">Date: <?= date('d F Y'); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-md-4">
                    Pelanggan
                    <div>
                        <strong><?= $pelanggan['name']; ?>.</strong><br>
                        <?= $pelanggan['alamat']; ?><br>
                        No Handphone <?= $pelanggan['no_hp']; ?><br>
                        Email: <?= $pelanggan['email_pelanggan']; ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <?php $id = $pelanggan['id'];
                    $query = "SELECT `tbl_pemesanan`.*,`tbl_bahan`.*,`tbl_katalog`.`jenis_katalog`,`tbl_status`.`konfirmasi`,`tbl_status`.`style` FROM `tbl_pemesanan` JOIN `pelanggan` ON `tbl_pemesanan`.`id_pelanggan`=`pelanggan`.`id`  JOIN `tbl_katalog` ON `tbl_pemesanan`.`id_katalog`=`tbl_katalog`.`id` JOIN `tbl_bahan` ON `tbl_pemesanan`.`id_bahan`=`tbl_bahan`.`id` JOIN `tbl_status` ON `tbl_pemesanan`.`id_status`=`tbl_status`.`id` WHERE `tbl_pemesanan`.`id_pelanggan`=$id AND `tbl_pemesanan`.`id_status`=2 ORDER BY `tbl_pemesanan`.`date_created` DESC";
                    $laporan = $this->db->query($query)->result_array(); ?>
                    <table class="table table-striped">
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
                                <th>QTY</th>
                                <th>Date Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($laporan as $lap) : ?>
                                <tr>
                                    <td><?= $lap['jenis_katalog']; ?></td>
                                    <td><?= $lap['ukuran']; ?></td>
                                    <td><?= $lap['bahan_kertas']; ?></td>
                                    <td><?= $lap['cover']; ?></td>
                                    <td><?= $lap['finishing']; ?></td>
                                    <td><?= $lap['cetakan']; ?></td>
                                    <td><?= $lap['dokFile']; ?></td>
                                    <td>Rp <?= $lap['harga']; ?></td>
                                    <td><?= $lap['jumlah_katalog']; ?></td>
                                    <td><?= date('d F Y', $lap['date_created']); ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-6">
                    <p class="lead">Total Pemesanan</p>

                    <div class="table-responsive">
                        <table class="table">
                            <?php foreach ($laporan as $l) : ?>
                                <tr>
                                    <th><?= $l['jenis_katalog']; ?></th>
                                    <td><?= $l['ukuran']; ?></td>
                                    <td><?= $l['bahan_kertas']; ?></td>
                                    <td><?= $l['total']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th colspan="3" style="text-align: right">Total:</th>

                                <?php foreach ($laporan as $l) {
                                    $total[] = $l['total'];
                                }
                                $total = array_sum($total); ?>
                                <td><?= $total; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>