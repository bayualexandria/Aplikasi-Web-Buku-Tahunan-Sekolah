
    <div class="container" style="margin-top: 15rem;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-5" style="font-weight: 500;color:black;"><?= $title; ?></h3>
                        <?= $this->session->flashdata('message'); ?>
                        <form method="POST" action="<?= base_url('Auth/change'); ?>">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <?php if (form_error('password')) : ?>
                                    <input type="password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="Masukan password" name="password">
                                    <?= form_error('password', '<small class="float-left text-danger">', '</small>'); ?>
                                <?php else : ?>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan password" name="password">
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Re Password</label>
                                <?php if (form_error('repassword')) : ?>
                                    <input type="password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="Masukan password" name="repassword">
                                    <?= form_error('repassword', '<small class="float-left text-danger">', '</small>'); ?>
                                <?php else : ?>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan password" name="repassword">
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block">Change</button>
                            </div>

                            <div class="form-group mt-3">
                                <label class="form-check-label" for="exampleCheck1"><a href="<?= base_url('auth/forgot'); ?>">Lupa kata sandi?</a></label><br>
                                <label class="form-check-label" for="exampleCheck1">Belum punya akun? <a href="<?= base_url('auth/register'); ?>">Registrasi dulu</a></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    