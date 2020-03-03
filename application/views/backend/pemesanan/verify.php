<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-3">
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?= base_url('assets/images/bukti_pembayaran/' . $one['images']) ?>" width="200px" style="border-radius: 5px;border:1px solid silver;" alt="">
                            </div>
                            <div class="col-md mt-5">
                                <form action="<?= base_url('admin/Pemesanan/updateKonfirmasi') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $one['id']; ?>">
                                    <input type="hidden" name="id_status" value="4">
                                    <button type="submit" class="btn btn-primary btn-sm">Konfirmasi Pemesanan</button>
                                </form>
                            </div>
                        </div>
                        <div class="row my-3 mx-5">
                            <a href="<?= base_url('assets/images/bukti_pembayaran/' . $one['images']) ?>" target="_blank" class="btn btn-success btn-sm">Tampilkan <i class="ti ti-eye"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
</div>

</div>