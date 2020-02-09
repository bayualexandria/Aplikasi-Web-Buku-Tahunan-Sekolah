const success = $('.success').data('flashdata');

if (success) {
	Swal.fire({
		icon: 'success',
		title: 'Selamat',
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
		width:1000,
		height:1000,
	});
}
