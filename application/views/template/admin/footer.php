</div>

<script src="<?= base_url('assets/bootstrap-4/js/jquery-3.3.1.js'); ?>"></script>
<!-- <script src="<?= base_url('assets/bootstrap-4/js/bootstrap.min.js'); ?>"></script> -->
<script src="<?= base_url('assets/admin/vendors/base/vendor.bundle.base.js'); ?>"></script>
<script src="<?= base_url('assets/admin/js/off-canvas.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/hoverable-collapse.js'); ?>"></script>
<script src="<?= base_url('assets/admin/js/template.js'); ?>"></script>
<script src="<?= base_url('assets/admin/js/todolist.js'); ?>"></script>
<script src="<?= base_url('assets/admin/js/pilih.js') ?>"></script>
<script src="<?= base_url('assets/admin/vendors/chart.js/Chart.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/js/dashboard.js'); ?>"></script>
<script>
	$(".pesan").on('click', function() {
		$(this).next('.aktif').addClass('ti-angle-right');
	});
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass('selected').html(fileName);
	});

	function jumlah() {
		const a = $("#id_bahan").val();
		const b = $("#b").val();
		d = a * b; //Harga Setelah Diskon: Harga Awal (b) - Harga Diskon (c)
		$("#c").val(d);
	}

	$('#id_ukuran').change(function() {
		var id = $(this).val();
		$.ajax({
			url: "<?= base_url(); ?>admin/Pemesanan/kategori",
			method: "POST",
			data: {
				id: id
			},
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					html += '<option value=' + data[i].id + '>' + data[i].bahan_kertas + ' (Rp. ' + data[i].harga + '/pcs)</option>';
				}
				$('#id_bahan').html(html);

			}
		});
	});
</script>
</body>

</html>