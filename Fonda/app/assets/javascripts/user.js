$("#content-users .close").on('click', function () {
	if (confirm('Do you sure want to remove this user?')) {
		
		$(this).closest('div').fadeOut(function () {
			$(this).remove();
		});
		var form = $(this).closest('form');
		
		$(form).ajaxSubmit({
			beforeSend: function () {
				console.log('Removing');
			},
			error: function (e) {
				console.log('Error:'+e);
			},
			success: function (res) {
				
			}, complete: function () {
				console.log('Complete');
			}
		});

	}
});

$('#add-user').validate({
	rules: {
		name: {
			required: true
		},
		last_name: {
			required: true,
			minlength: 2
		},
		username: {
			required: true,
			minlength: 7
		},
		password: {
			required: true,
			minlength: 7
		},
	},
	messages: {
		name: {
			required: "Please enter a first name"
		},
		last_name: {
			required: "Please enter a last name"
		},
		username: {
			required: "Your username must consist of at least 2 characters"
		},
		password: {
			required: "Please enter a password"
		},
	},
});