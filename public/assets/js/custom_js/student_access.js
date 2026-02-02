$(document).ready(function() {
    loadStudentAccess();

    function loadStudentAccess() {
        $("#student_access_table").DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            "responsive": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "search_records",
            },
            "iDisplayLength": 10,
            "order": [
                [0, "asc"],
            ],
            "columnDefs": [],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-student-access-list',
            },
            drawCallback: function(settings, json) {
                $(".accessButton").on('click', function() {
                    var access = $(this).data('access-type');
                    var labelClass = access == 1 ? 'btn-danger' : 'btn-success';
                    var type_id = $(this).data('type-id')
                    var html = '<div class="row">' +
                        '<div class="col-md-12">' +
                        '<label>Please enter the password</label>' +
                        '</div>' +
                        '<div class="col-md-12">' +
                        '<input type="password" class="form-control form-control-sm" id="admin_password" placeholder="Admin Password" autocomplete="off">' +
                        '</div>' +
                        '</div>';
                    bootbox.dialog({
                        title: 'Confirmation',
                        message: html,
                        buttons: {
                            cancel: {
                                label: ' Cancel',
                                className: 'btn btn-sm btn-secondary',
                                callback: function() {

                                }
                            },
                            yes: {
                                label: access == 1 ? 'Deactive' : 'Active',
                                className: 'btn btn-sm ' + labelClass,
                                callback: function() {
                                    var changeStatus = (access == 1) ? 0 : 1;
                                    var admin_password = $.trim($(this).find('#admin_password').val());
                                    if (admin_password == '') {
                                        bootbox.alert('Please enter admin password to proceed');
                                        return false;
                                    }
                                    $.ajax({
                                        url: baseUrl + 'admin/access',
                                        type: 'POST',
                                        data: {
                                            access: changeStatus,
                                            type_id: type_id,
                                            admin_password: admin_password,
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            bootbox.alert({
                                                message: response.message,
                                                callback: function() {
                                                    loadStudentAccess();
                                                }
                                            })
                                        }
                                    })
                                }
                            }
                        }
                    })
                });
            }
        });
    }
})