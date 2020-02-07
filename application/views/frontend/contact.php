<div class="intro-page">
    <div class="container">
    </div>
</div>

<div class="wrapper">
    <section class="keep-touch">
        <div class="container">
            <h2>Tetap terhubung</h2>
            <p>Kontak yang bisa dihubungi dan alamat lengkap, bisa langsung kirim form pesan di bawah ini.</p>
            <span class="dot-dash dark">.</span>
            <div class="row">
                <div class="col-md-5">
                    <div class="keep-touch--white">
                        <h4>Alamat </h4>
                        <p>Jalan Jaten Baru Raya, Pedurungan Tengah, Kota Semarang, <br>Jawa Tengah-Indonesia</p>
                        <h4>No Telephone</h4>
                        <p>081328128638</p>
                        <h4>Email</h4>
                        <p><a href="mail:azharkumedia@gmail.com">azharkumedia@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="keep-touch--white">
                        <form action="<?= base_url('website/pesan') ?>" method="POST">
                            <?php if ($user) : ?>
                                <input type="text" placeholder="Masukan nama" name="name" value="<?= $user['name']; ?>" readonly>
                                <input type="text" placeholder="Masukan email" name="email" value="<?= $user['email_pelanggan']; ?>" readonly>
                            <?php else : ?>
                                <input type="text" placeholder="Masukan nama" name="name">
                                <input type="text" placeholder="Masukan email" name="email">
                            <?php endif; ?>
                            <textarea id="" rows="5" placeholder="Masukan pesan" name="mess"></textarea>
                            <button type="submit" class="button small">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>