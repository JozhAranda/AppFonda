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
	}
});
