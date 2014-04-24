$('#login').validate({
	rules: {
		username: {
			required: true
		},
		password: {
			required: true
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
/*	submitHandler: function(form) {
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
	}*/
});
$('#add-food').validate({
	rules: {
		name: {
			required: true
		},
		description: {
			required: true
		},
	},
	messages: {
		name: {
			required: "Please enter a food name"
		},
		description: {
			required: "Please provide a description"
		}
	},
/*	submitHandler: function(form) {
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
	}*/
});