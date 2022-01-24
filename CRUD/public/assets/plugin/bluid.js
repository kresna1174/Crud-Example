$(function () {
	$('body').formBuild();
	$.extend(true, $.fn.dataTable.defaults, {
		drawCallback: function () {
			$(this).formBuild();
		}
	});
});

$.fn.formBuild = function () {
	$.each(this, function (i, form) {
		$('[data-form-action="create"], [data-form-action="edit"], [data-form-action="view"]', form).each(function (j, elem) {
			$(elem).click(function () {
				$('[data-form-action]').attr('disabled', true);
				var url = $(elem).data('form-url');
				var formTitle = '';
				var formSize = '';
				var formTable = 'datatable';
				if ($(elem).data('form-title')) {
					formTitle = $(elem).data('form-title');
				}
				if ($(elem).data('form-size')) {
					formSize = $(elem).data('form-size');
				}
				if ($(elem).data('form-table')) {
					formTable = $(elem).data('form-table');
				}
				$.ajax({
					url: url,
					success: function (response) {
						var formID = new Date().getTime();
						bootbox.dialog({
							title: formTitle,
							size: formSize,
							message: '<div id="form-container-'+formID+'" data-form-id="'+formID+'" data-form-table="'+formTable+'"><div data-form-container="form-ajax">'+response+'</div></div>',
							onShow: function (e) {
								$('#form-container-'+formID).formBuild();
							}
						});
					}
				}).always(function () {
					$('[data-form-action]').attr('disabled', false);
				});
			});
		});

		$('[data-form-action="delete"]', form).each(function (j, elem) {
			$(elem).click(function () {
				var url = $(elem).data('form-url');
				var formConfirm = $(elem).data('form-confirm');
				var formTable = '#datatable';
				if ($(elem).data('form-table')) {
					formTable = '#'+$(elem).data('form-table');
				}
				confirmDialog(formConfirm, function () {
					$.ajax({
						url: url,
						success: function (response) {
							toastr.success("Success", response.message);
							$(formTable).DataTable().ajax.reload();
						},
						error: function (xhr) {
							var response = $.parseJSON(xhr.responseText);
							toastr.error("Failed", response.messages.error)
						}
					}).always(function () {
						$('[data-form-action]').attr('disabled', false);
					});
				});
			});
		});

		$('[data-form-action="cancel"]', form).each(function (j, elem) {
			$(elem).click(function () {
				bootbox.hideAll();
			});
		});

		$('[data-form-container="form-ajax"] form', form).submit(function () {
			return false;
		});

		$('[data-form-action="submit"]', form).click(function () {
			var formID = $(form).data('form-id');
			var elem = '#form-container-'+formID+' form';
			var action = $(elem).attr('action');
			var formTable = '#'+$(form).data('form-table');
			$('[data-form-action]').attr('disabled', true);
			$('.alert', elem).remove();
			$.ajax({
				url: action,
				type: 'post',
				data: $(elem).serialize(),
				success: function (response) {
					bootbox.hideAll();
					toastr.success("Success", response.message);
					$(formTable).DataTable().ajax.reload();
				},
				error: function (xhr) {
					var response = $.parseJSON(xhr.responseText);
					if (typeof response.messages!='undefined') {
						$(elem).prepend('<div class="alert alert-danger">'+response.messages.error+'</div>');
					} else if (typeof response.message!='undefined') {
						$(elem).prepend('<div class="alert alert-danger">'+response.message+'</div>');
					}
				}
			}).always(function () {
				$('[data-form-action]').attr('disabled', false);
			});
		});

		$('[data-input-type="select2"]', form).each((j, elem) => {
			$('.bootbox').removeAttr('tabindex');
			$(elem).css('width', '100%');
			$(elem).select2();
		});

		$('[data-input-type="datepicker"]', form).each((j, elem) => {
			$(elem).datepicker({
				format: 'dd-mm-yyyy'
			});
		});

		$('[data-input-type="number-format"]', form).each((j, elem) => {
            console.log('hello')
			$(elem).mask("#.##0,00", {
				reverse: true
			});
		});
	});
};

$.fn.blockUI = function() {
	$(this).block({
		message: '<i class="icon-spinner4 spinner"></i>',
		overlayCSS: {
			backgroundColor: '#fff',
			opacity: 0.8,
			cursor: 'wait'
		},
		css: {
			border: 0,
			padding: 0,
			backgroundColor: 'transparent'
		}
	})
};

function confirmDialog(msg, action, cancel = null) {
	bootbox.confirm(msg, function (result) {
		if (result) {
			if ($.isFunction(action)) {
				action();
			} else {
				document.location.href = action;
			}
		} else {
			if (cancel) {
				if ($.isFunction(cancel)) {
					cancel();
				} else {
					document.location.href = cancel;
				}
			}
		}
	})
}

function arrImplode(separator, data, ignore) {
	var result = [];
	if (ignore) {
		$.each(data, function (i, v) {
			if (v!==null && v!=='') {
				result.push(v);
			}
		});
	} else {
		result = data;
	}
	return result.join(separator);
}

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}