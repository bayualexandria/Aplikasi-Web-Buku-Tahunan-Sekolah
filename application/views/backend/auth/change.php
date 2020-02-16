<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo text-center">
                            <img src="<?= base_url('assets/images/profile/azhar.png'); ?>" alt="logo">
                            <h4>Azharku Media</h4>
                        </div>
                        <h6 class="font-weight-light">Change your password for.</h6>
                        <h5><?= $this->session->userdata('reset_email'); ?></h5>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="pt-3" method="POST" action="<?= base_url('admin/Auth/changePassword'); ?>">
                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter New Password....">
                                <?= form_error('password', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" id="repassword" name="repassword" placeholder="Enter New Re Password....">
                                <?= form_error('repassword', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-sm font-weight-small auth-form-btn">CHANGE PASSWORD</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->