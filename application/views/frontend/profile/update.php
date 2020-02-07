<div class="container" style="margin-top: 15rem;">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center" style="color:black;font-weight:700;"><?= $title; ?></h3>
                    <form class="mt-5" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <?php if (form_error('name')) : ?>
                                <input type="text" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Masukan nama lengkap" name="name" value="<?= $user['name']; ?>">
                                <?= form_error('name', '<small class="invalid-feedback text-danger float-left">', '</small>'); ?>
                            <?php else : ?>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama lengkap" name="name" value="<?= $user['name']; ?>">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan alamat email" name="email" value="<?= $user['email_pelanggan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Handphone/WA</label>
                            <?php if (form_error('no_hp')) : ?>
                                <input type="text" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Masukan no handphone" name="no_hp" value="<?= $user['no_hp']; ?>">
                                <?= form_error('no_hp', '<small class="invalid-feedback text-danger float-left">', '</small>'); ?>
                            <?php else : ?>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan no handphone" name="no_hp" value="<?= $user['no_hp']; ?>">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="validationTextarea">Alamat</label>
                            <?php if (form_error('alamat')) : ?>
                                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Masukan alamat lengkap" name="alamat" rows="8"><?= $user['alamat']; ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger float-left">', '</small>'); ?>
                            <?php else : ?>
                                <textarea class="form-control" id="validationTextarea" placeholder="Masukan alamat lengkap" name="alamat" rows="8"><?= $user['alamat']; ?></textarea>
                            <?php endif; ?>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <img src="<?= base_url('assets/images/profile/'.$user['images']);?>" class="img-thumbnail w-50" style="border-radius:50%;" />
                            </div>
                            <div class="col-md-5 custom-file" style="margin-top:5rem;margin-left:-7rem;">
                                <input name="images" type="file" class="common-input custom-file-input" id="customFile">
                                <label class="common-input custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="mt-5 btn btn-info btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>