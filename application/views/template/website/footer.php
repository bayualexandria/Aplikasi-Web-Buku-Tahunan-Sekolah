<?php if ($user) : ?>
<?php else : ?>
    <section class="get-started">
        <div class="container">
            <h2>Ayo Pesan Sekarang! Untuk Pemesanan Buku Tahunan Sekolah</h2>
            <p>Project pembuatan buku tahunan di handle langsung sepenuhnya oleh tim kami dari proses pengambilan photo, pendataan, desain, layout cetak dan finishing</p>
            <a href="<?= base_url('auth') ?>" class="button">Order Now</a>
        </div>
    </section>
<?php endif; ?>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-12">
                <p><a href="https://rubik-technologies.com/">Rubik Technologies</a></p>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    window.odometerOptions = {
        format: '(,ddd)',
    };
</script>
<script src="<?= base_url();?>assets/bootstrap-4/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/vendor/jquery-3.1.0.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/vendor/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/vendor/tether.js"></script>
<script src="<?= base_url() ?>assets/web/js/vendor/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/web/js/vendor/slick.js"></script>
<script src="<?= base_url() ?>assets/web/js/vendor/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/vendor/odometer.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/main.js"></script>
<script src="<?= base_url() ?>assets/vendors/sweetalert/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/sweetalert/js/script.js"></script>
</body>

</html>