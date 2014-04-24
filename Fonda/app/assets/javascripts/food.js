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