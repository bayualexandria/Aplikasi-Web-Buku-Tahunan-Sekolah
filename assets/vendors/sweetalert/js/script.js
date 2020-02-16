const success = $('.success').data('flashdata');

if (success) {
	Swal.fire({
		icon: 'success',
		title: 'Selamat',
		text: success
	});
}

$('#log-out').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "ingin keluar dari halaman ini",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Logout!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
})

$('.hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "ingin hapus data ini",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
})


const error = $('.error').data('flashdata');
if (error) {
	Swal.fire({
		icon: 'error',
		title: 'Peringatan',
		text: error
	});
}

const login = $('.login').data('flashdata');
if (login) {
	Swal.fire({
		title: 'CV Azharku Media',
		text: login,
		imageUrl: 'http://localhost/ta/assets/images/profile/azhar.png',
		imageHeight: 150,
		imageAlt: 'A tall image',
		showCloseButton: true,
		showConfirmButton: false,
		width: 1000,
		height: 1000,
	});
}

$("#jumlah, #harga").keyup(function () {
	const harga = $("#harga").val();
	const jumlah = $("#jumlah").val();

	total = parseInt(harga) * parseInt(jumlah);

	// Menghilangkan fungsi NaN
	if (!isNaN(total)) {
		$("#total").val(total);
	}
});
