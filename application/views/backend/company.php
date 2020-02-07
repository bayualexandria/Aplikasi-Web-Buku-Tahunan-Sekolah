<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0"><?= $title ?></h4>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Info Perusahaan
                    </div>
                    <div class="row no-gutters p-3 justify-content-center">
                        <div class="col-md-10 text-center">
                            <?= $this->session->flashdata('message'); ?>
                            <img src="<?= base_url('assets/images/profile/') . $company[0]['logo_company']; ?>" class="card-img img-circle w-25" style="border-radius:50%;">

                            <div class="card-body text-center">
                                <h3 class="card-title"><?= $company[0]['nama_company']; ?></h3>
                                <p class="card-text"><?= $company[0]['alamat']; ?></p>
                                <p class="card-text"><?= $company[0]['no_telp_company']; ?></p>
                                <p class="card-text"><small class="text-muted">Update in <?= date('d F Y', $company[0]['date_updated']); ?></small></p>
                            </div>
                        </div>
                        <div class="col-md-1 justify-content-end">
                            <a href="<?= base_url('admin/Company/update/')?><?= $company[0]['id'];?>" class="btn btn-primary btn-icon-text btn-rounded">
                                <i class="ti-pencil-alt2 btn-icon-prepend"></i>Edit
                            </a>
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