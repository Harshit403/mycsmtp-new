$(document).ready(function() {
    $("#addAmendmentBtn").on('click', function() {
        addAmendmentDetails();
    });

    function addAmendmentDetails() {
        var level_id = $("#level_id").val();
        var type_id = $("#type_id").val();
        var subject_id = $("#subject_id").val();
        var amendment_name = $.trim($("#amendment_name").val());
        var amendment_file_val = $("#amendment_attachment").val();
        var amendment_id = $("#amendment_id").val();
        var error = new Array;
        var formdata = new FormData();
        formdata.append('level_id', level_id);
        formdata.append('type_id', type_id);
        formdata.append('subject_id', subject_id);
        formdata.append('amendment_name', amendment_name);
        formdata.append('amendment_id', amendment_id);
        if (level_id == '') {
            error.push('Please select a level');
        }
        if (type_id == '') {
            error.push('Please select a type');
        }
        if (subject_id == '') {
            error.push('Please select a subject');
        }
        if (amendment_name == '') {
            error.push('Please enter the amendment name');
        }
        if (amendment_id == '' && amendment_file_val == '') {
            error.push('Please select the amendment file');
        } else if (amendment_file_val != '') {
            var amendment_file = $("#amendment_attachment").prop('files')[0];
            formdata.append('amendment_file', amendment_file);
        }

        if (error.length > 0) {
            bootbox.alert({
                message: error.join('</br>'),
                closeButton: false,
            });
            return false;
        }

        $.ajax({
            url: baseUrl + 'admin/add-amendment',
            type: 'POST',
            data: formdata,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                bootbox.alert({
                    message: res.message,
                    closeButton: false,
                    callback: function() {
                        window.location.reload();
                    }
                })
            }
        })
    }

    if (pageType == 'amendment-list') {
        loadAmendmentTable();
    }

    function loadAmendmentTable() {
        $("#amendment_table").DataTable({
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
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-amendment',
            },
            "columnDefs": [{
                targets: [0, 5, 6, 7],
                orderable: false,
            }],
            drawCallback: function(settings, json) {
                $(".editButton").on('click', function() {
                    var amendment_id = $(this).data('amendment-id');
                    var url = baseUrl + '/admin/add-amendment/' + amendment_id;
                    window.open(url, '_blank');
                });
                $(".amendment_active").on('change', function() {
                    var amendment_status = $(this).is(":checked");
                    var amendment_id = $(this).data('amendment-id');
                    var active = amendment_status ? 1 : 0;
                    $.ajax({
                        url: baseUrl + 'admin/amendment-status',
                        type: 'POST',
                        data: {
                            active: active,
                            amendment_id: amendment_id,
                        },
                        dataType: 'json',
                        success: function(res) {
                            bootbox.alert({
                                message: res.message,
                                closeButton: false,
                                callback: function() {
                                    loadAmendmentTable();
                                }
                            })
                        }
                    })
                });

                $(".deleteButton").on('click', function() {
                    var amendment_id = $(this).data('amendment-id');
                    bootbox.dialog({
                        message: 'Are you sure you want to delete the amendment ?',
                        closeButton: false,
                        buttons: {
                            cancel: {
                                label: 'No',
                                className: 'btn btn-secondary'
                            },
                            yes: {
                                label: 'Yes',
                                className: 'btn btn-danger',
                                callback: function() {
                                    $.ajax({
                                        url: baseUrl + 'admin/delete-amendment',
                                        type: 'POST',
                                        data: {
                                            amendment_id: amendment_id,
                                        },
                                        dataType: 'json',
                                        success: function(res) {
                                            bootbox.alert({
                                                message: res.message,
                                                closeButton: false,
                                                callback: function() {
                                                    if (res.success) {
                                                        loadAmendmentTable();
                                                    }
                                                }
                                            })
                                        }
                                    })
                                }
                            }
                        }
                    })
                })
            }
        });
    }
});