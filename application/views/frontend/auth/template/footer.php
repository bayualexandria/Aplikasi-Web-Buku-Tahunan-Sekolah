<br>
<br>
<br>
<br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-12">
                <p><a href="https://rubik-technologies.com/">Azharku Media</a></p>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    window.odometerOptions = {
        format: '(,ddd)',
    };
</script>
<script src="<?= base_url() ?>assets/bootstrap-4/js/jquery-3.4.1.min.js"></script>
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
<script>
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>
</body>

</html>