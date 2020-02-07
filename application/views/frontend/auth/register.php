<div class="container" style="margin-top: 15rem;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-light">
                <div class="card-body">
                    <h3 class="card-title text-center mb-5" style="font-weight: 500;color:black;"><?= $title; ?></h3>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="POST" action="<?= base_url('Auth/register'); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                    <?php if (form_error('name')) : ?>
                                        <input type="text" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Masukan nama lengkap" name="name" value="<?= set_value('name') ?>">
                                        <?= form_error('name', '<small class="invalid-feedback text-danger float-left">', '</small>'); ?>
                                    <?php else : ?>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama lengkap" name="name" value="<?= set_value('name') ?>">
                                    <?php endif; ?>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Handphone/WA</label>
                                    <?php if (form_error('no_hp')) : ?>
                                        <input type="text" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Masukan no handphone" name="no_hp" value="<?= set_value('no_hp') ?>">
                                        <?= form_error('no_hp', '<small class="invalid-feedback text-danger float-left">', '</small>'); ?>
                                    <?php else : ?>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan no handphone" name="no_hp" value="<?= set_value('no_hp') ?>">
                                    <?php endif; ?>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="validationTextarea">Alamat</label>
                                    <?php if (form_error('alamat')) : ?>
                                        <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Masukan alamat lengkap" name="alamat" rows="8"><?= set_value('alamat') ?></textarea>
                                        <?= form_error('alamat', '<small class="text-danger float-left">', '</small>'); ?>
                                    <?php else : ?>
                                        <textarea class="form-control" id="validationTextarea" placeholder="Masukan alamat lengkap" name="alamat" rows="8"><?= set_value('alamat') ?></textarea>
                                    <?php endif; ?>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat Email</label>
                                    <?php if (form_error('email')) : ?>
                                        <input type="email" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Masukan alamat email" name="email" value="<?= set_value('email') ?>">
                                        <?= form_error('email', '<small class="text-danger float-left">', '</small>'); ?>
                                    <?php else : ?>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan alamat email" name="email" value="<?= set_value('email') ?>">
                                    <?php endif; ?>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <?php if (form_error('password')) : ?>
                                        <input type="password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="Masukan password minimal 6 karakter" name="password">
                                        <?= form_error('password', '<small class="float-left text-danger">', '</small>'); ?>
                                    <?php else : ?>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan password minimal 6 karakter" name="password">
                                    <?php endif; ?>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                                    <?php if (form_error('repassword')) : ?>
                                        <input type="password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="Masukan ulang password" name="repassword">
                                        <?= form_error('repassword', '<small class="float-left text-danger">', '</small>'); ?>
                                    <?php else : ?>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan ulang password" name="repassword">
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">Register</button>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-check-label" for="exampleCheck1"><a href="<?= base_url('auth/forgot'); ?>">Lupa kata sandi?</a></label><br>
                            <label class="form-check-label">Sudah punya akun? <a href="<?= base_url('auth'); ?>">Login disini</a></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>