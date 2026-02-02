$(document).ready(function() {
    $(".typeValidityBtn").on('click', function() {
        var type_id = $(this).data('type-id');
        var html = '<div class="row">' +
            '<div class="col-md-12">' +
            '<label class="form-label">Password</label>' +
            '<input type="text" id="admin_password" class="form-control" placeholder="Enter Admin Password">' +
            '</div>' +
            '<div class="col-md-12">' +
            '<div class="error_message text-danger"></div>' +
            '</div>' +
            '</div>';
        let dialog = bootbox.dialog({
            message: html,
            closeButton: false,
            buttons: {
                cancel: {
                    label: 'Cancel',
                    className: 'btn btn-sm btn-danger',
                },
                ok: {
                    label: 'Verify & Delete',
                    className: 'btn btn-sm btn-success',
                    callback: function() {
                        var admin_password = $.trim($(this).find('#admin_password').val());
                        if (admin_password == '') {
                            $(this).find('.error_message').text('Please enter the password');
                            return false;
                        }
                        $.ajax({
                            url: baseUrl + 'admin/close-validity',
                            type: 'post',
                            data: {
                                type_id: type_id,
                                admin_password: admin_password,
                            },
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert({
                                    message: response.message,
                                    closeButton: false,
                                })
                            }
                        })
                    }
                }
            }
        })
        dialog.init(function() {
            $(dialog).find("#admin_password").on('keyup', function() {
                $(dialog).find(".error_message").html('');
            })
        })

    });
});