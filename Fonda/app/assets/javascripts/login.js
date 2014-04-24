$('#login').validate({
	rules: {
		username: {
			required: true,
			minlength: 2
		},
		password: {
			required: true,
			minlength: 8
		},
	},
	messages: {
		username: {
			required: "Please enter a username"
		},
		password: {
			required: "Please provide a password"
		}
	},
	submitHandler: function(form) {
		$(form).ajaxSubmit({
			dataType: 'JSON',
			beforeSend: function() {
				console.log('sending');
			},
			error: function() {
				console.log('an error was found');
			},
			success: function(response) {
				if (!response.success) return alert('Your request cannot be submitted!');

				location.href = document.referrer;
			},
			complete: function() {
				console.log('complete!');
			}
		});
	}
});
