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
                        Update Perusahaan
                    </div>
                    <div class="card-body">
                        <form action="" class="row justify-content-center mt-3" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $company['id']; ?>">
                            <div class="col-md-5">
                                <label for="nama_company" class="form-group">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_company" id="nama_company" value="<?= $company['nama_company']; ?>">
                                <?= form_error('nama_company', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                                <br>
                                <label for="alamat" class="form-group">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10"><?= $company['alamat']; ?></textarea>
                                <?= form_error('alamat', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                                <br>
                                <label for="no_telp_company" class="form-group">No Telephon/Handphone</label>
                                <input type="text" class="form-control" name="no_telp_company" id="no_telp_company" value="<?= $company['no_telp_company']; ?>">
                                <?= form_error('no_telp_company', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                                <br>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="row d-inline">
                                    <label for="sosmed" class="form-group">Sosial Media</label>
                                    <br>
                                    <div class="float-right">
                                        <button type="button" class="btn btn-success btn-sm">
                                            <i class="ti-plus"> Sosmed</i>
                                        </button>
                                    </div>
                                    <br>
                                </div>
                                <div class="form-group d-inline mt-5">
                                    <div class="col-sm-5 mb-3 ">Logo Perusahaan</div>
                                    <div class="col-sm-10">
                                        <div class="row">

                                            <div class="col-sm-5">
                                                <img src="<?= base_url('assets/images/profile/') . $company['logo_company']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="logo_company" name="logo_company">
                                                    <label class="custom-file-label" for="logo_company">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="float-right mt-5">
                                    <button type="submit" class="btn btn-primary btn-sm">Update Perusahaan</button>
                                </div>
                            </div>
                        </form>
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