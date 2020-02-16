<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0"><?= $title ?></h4>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                            <i class="ti-clipboard btn-icon-prepend"></i>Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        My Profile
                    </div>
                    <div class="row no-gutters p-3 justify-content-center">
                        <div class="col-md-3 text-center">
                            <?= $this->session->flashdata('message'); ?>
                            <img src="<?= base_url('assets/images/profile/') . $user['images']; ?>" class="card-img img-circle w-50" style="border-radius:50%;">

                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $user['name']; ?></h5>
                                <p class="card-text"><?= $user['email']; ?></p>
                                <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                            </div>
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-8">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <i class="ti-direction menu-icon"></i> Profile</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> <i class="ti-key menu-icon"></i> Ganti Password</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="container mt-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10">
                                                <?= form_open_multipart('admin/User'); ?>
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input id="name" class="form-control" type="text" name="email" value="<?= $user['email']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-10">
                                                        <input id="name" class="form-control" type="text" name="name" value="<?= $user['name']; ?>">
                                                        <?= form_error('name', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-2 ">Picture</div>
                                                    <div class="col-sm-10">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <img src="<?= base_url('assets/images/profile/') . $user['images']; ?>" class="img-thumbnail">
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="images" name="images">
                                                                    <label class="custom-file-label" for="images">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-end">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="container mt-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10">
                                                <form method="POST" action="<?= base_url('admin/User/ubahpassword'); ?>">
                                                    <div class="form-group row">
                                                        <!-- <label for="password" class="col-sm-2 col-form-label">Password</label> -->
                                                        <div class="col-sm-10">
                                                            <input id="password" class="form-control" type="hidden" name="password" value="<?= $user['password']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="passwordbaru" class="col-sm-2 col-form-label">Password Baru</label>
                                                        <div class="col-sm-10">
                                                            <input id="passwordbaru" class="form-control" type="password" name="passwordbaru">
                                                            <?= form_error('passwordbaru', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="konfpasswordbaru" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                                                        <div class="col-sm-10">
                                                            <input id="konfpasswordbaru" class="form-control" type="password" name="konfpasswordbaru">
                                                            <?= form_error('konfpasswordbaru', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-end">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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