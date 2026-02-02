$(document).ready(function() {
    $("#addQbankBtn").on('click', function() {
        addQbankDetails();
    });

    function addQbankDetails() {
        var level_id = $("#level_id").val();
        var type_id = $("#type_id").val();
        var subject_id = $("#subject_id").val();
        var qbank_name = $.trim($("#qbank_name").val());
        var qbank_file_val = $("#qbank_attachment").val();
        var qbank_id = $("#qbank_id").val();
        var error = new Array;
        var formdata = new FormData();
        formdata.append('level_id', level_id);
        formdata.append('type_id', type_id);
        formdata.append('subject_id', subject_id);
        formdata.append('qbank_name', qbank_name);
        formdata.append('qbank_id', qbank_id);
        if (level_id == '') {
            error.push('Please select a level');
        }
        if (type_id == '') {
            error.push('Please select a type');
        }
        if (subject_id == '') {
            error.push('Please select a subject');
        }
        if (qbank_name == '') {
            error.push('Please enter the question bank name');
        }
        if (qbank_id == '' && qbank_file_val == '') {
            error.push('Please select the question bank file');
        } else if (qbank_file_val != '') {
            var qbank_file = $("#qbank_attachment").prop('files')[0];
            formdata.append('qbank_file', qbank_file);
        }

        if (error.length > 0) {
            bootbox.alert({
                message: error.join('</br>'),
                closeButton: false,
            });
            return false;
        }

        $.ajax({
            url: baseUrl + 'admin/add-qbank',
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

    if (pageType == 'question-bank-list') {
        loadQbankTable();
    }

    function loadQbankTable() {
        $("#qbank_table").DataTable({
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
                "url": baseUrl + 'admin/fetch-qbank',
            },
            "columnDefs": [{
                targets: [0, 5, 6, 7],
                orderable: false,
            }],
            drawCallback: function(settings, json) {
                $(".editButton").on('click', function() {
                    var qbank_id = $(this).data('qbank-id');
                    var url = baseUrl + '/admin/add-qbank/' + qbank_id;
                    window.open(url, '_blank');
                });
                $(".qbank_active").on('change', function() {
                    var qbank_status = $(this).is(":checked");
                    var qbank_id = $(this).data('qbank-id');
                    var active = qbank_status ? 1 : 0;
                    $.ajax({
                        url: baseUrl + 'admin/qbank-status',
                        type: 'POST',
                        data: {
                            active: active,
                            qbank_id: qbank_id,
                        },
                        dataType: 'json',
                        success: function(res) {
                            bootbox.alert({
                                message: res.message,
                                closeButton: false,
                                callback: function() {
                                    loadQbankTable();
                                }
                            })
                        }
                    })
                });

                $(".deleteButton").on('click', function() {
                    var qbank_id = $(this).data('qbank-id');
                    bootbox.dialog({
                        message: 'Are you sure you want to delete the question bank ?',
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
                                        url: baseUrl + 'admin/delete-qbank',
                                        type: 'POST',
                                        data: {
                                            qbank_id: qbank_id,
                                        },
                                        dataType: 'json',
                                        success: function(res) {
                                            bootbox.alert({
                                                message: res.message,
                                                closeButton: false,
                                                callback: function() {
                                                    if (res.success) {
                                                        loadQbankTable();
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