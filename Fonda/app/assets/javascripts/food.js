$("#content-foods .close").on('click', function () {
	if (confirm('Do you sure want to remove this food?')) {
		
		$(this).closest('div').fadeOut(function () {
			$(this).remove();
		});
		var form = $(this).closest('form');
		
		$(form).ajaxSubmit({
			beforeSend: function () {
				console.log('Removind');
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