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
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form class="pt-3" method="POST" action="<?= base_url('admin/Auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                                <?= form_error('name', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
                                <?= form_error('password1', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" id="repassword" name="repassword" placeholder="Re Password">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-sm font-weight-small auth-form-btn">REGISTER</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="<?= base_url('admin/Auth'); ?>" class="text-primary">Login</a>
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