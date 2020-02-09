    <div class="container" style="margin-top: 15rem;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-5" style="font-weight: 500;color:black;"><?= $title; ?></h3>
                        <!-- <?= $this->session->flashdata('message'); ?> -->
                        <div class="error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
                        <form method="POST" action="<?= base_url('Auth/forgot'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <?php if (form_error('email')) : ?>
                                    <input type="email" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger float-left">', '</small>'); ?>
                                <?php else : ?>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?= set_value('email') ?>">
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block">Reset</button>
                            </div>

                            <div class="form-group mt-3">
                                <label class="form-check-label">Sudah punya akun? <a href="<?= base_url('auth'); ?>">Login disini</a></label><br />
                                <label class="form-check-label">Belum punya akun? <a href="<?= base_url('auth/register'); ?>">Registrasi disini</a></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>