<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart(); ?>
                        <input type="hidden" name="id" id="id" value="<?= $admin['id']?>">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input id="name" class="form-control" type="text" name="email" value="<?= $admin['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input id="name" class="form-control" type="text" name="name" value="<?= $admin['name']; ?>">
                                <?= form_error('name', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 ">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/images/profile/') . $admin['images']; ?>" class="img-thumbnail">
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
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input id="password" class="form-control" type="password" name="password" value="<?= $admin['password']; ?>">
                                <?= form_error('name', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password2" class="col-sm-2 col-form-label">Re Password</label>
                            <div class="col-sm-10">
                                <input id="password2" class="form-control" type="password" name="password2" value="<?= $admin['password']; ?>">
                                <?= form_error('password2', '<small class="alert text-danger pl-0" role="alert" >', '</small>'); ?>
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
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
</div>

</div>