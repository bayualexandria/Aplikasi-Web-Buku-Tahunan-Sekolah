const success = $('.success').data('flashdata');

if (success) {
	Swal.fire({
		icon: 'success',
		title: 'Selamat' ,
		text: success
	});
}

const error = $('.error').data('flashdata');
if (error) {
	Swal.fire({
		icon: 'error',
		title: 'Peringatan',
		text: error
	});
}




