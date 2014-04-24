$("#content-foods .close").on('click', function () {
	if (confirm('Do you sure want to remove this food?')) {
		
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

$('#form-food').validate({
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
	}
});