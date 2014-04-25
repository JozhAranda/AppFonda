$('#content-users .close').on('click', function(event) {
	event.preventDefault();

	var button = $(this);

	bootbox.dialog({
		message: "Do you really want to delete this user?",
		title: "Delete User",
		buttons: {
			no: {
				label: "No",
				className: "btn-default",
			},
			yes: {
				label: "Yes",
				className: "btn-success",
				callback: function() {
					button.closest('form').submit();
				}
			}
		}
	});
});

$('#').validate({
	rules: {
		name: {
			required: true,
			minlength: 2
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
			required: "Your username must consist of at least 7 characters"
		},
		password: {
			required: "Please enter a password"
		},
	}
});