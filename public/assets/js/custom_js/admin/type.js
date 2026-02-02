$(document).ready(function() {
    $("#moreTypeDetails").summernote({
        placeholder: 'Additional details',
        height: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    $(".summer_note").summernote({
        placeholder: 'Additional details',
        height: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    $("#addTypeBtn").on('click', function() {
        addType();
    });

    function addType() {
        var type_name = $.trim($("#type_name").val());
        var level_id = $("#level_id").val();
        var type_more_details = $.trim($("#moreTypeDetails").val());
        var batch_info = $.trim($("#batch_info").val());
        var expiry_date = $("#expiry_date").val();
        if (expiry_date != '') {
            expiry_date = expiry_date.split('T').join(' ');
        }
        var schedule_file = $("#schedule_file").prop('files')[0];
        var error = new Array;
        if (level_id == '') {
            error.push('Please select the level');
        }
        if (type_name == '') {
            error.push('Please enter the type name');
        }
        if (expiry_date == '') {
            error.push('Please enter the expiry date');
        }
        if (error.length > 0) {
            bootbox.alert({
                message: error.join('</br>'),
                closeButton: false,
            });
            return false;
        }
        var type_id = $("#type_id").val();
        var formdata = new FormData();
        formdata.append('level_id', level_id);
        formdata.append('type_id', type_id);
        formdata.append('type_name', type_name);
        formdata.append('type_more_details', type_more_details);
        formdata.append('batch_info', batch_info);
        formdata.append('expiry_date', expiry_date);
        if (schedule_file != undefined) {
            formdata.append('schedule_file', schedule_file);
        }
        $.ajax({
            url: baseUrl + 'admin/add-type',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                bootbox.alert({
                    message: response.message,
                    closeButton: false,
                    callback: function() {
                        if (response.success) {
                            window.location.reload();
                        }
                    }
                })
            }
        })
    }

    // load type table
    loadTypeTable();

    function loadTypeTable() {
        $("#type_table").DataTable({
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
                [4, "desc"],
            ],
            "columnDefs": [{
                "targets": [0, 3, 5],
                "className": "text-center",
                "orderable": false,
            }],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-type-list',
            },
            drawCallback: function(settings, json) {
                $(".editButton").on('click', function() {
                    var type_id = $(this).data('type-id');
                    var url = baseUrl + 'admin/add-type/' + type_id;
                    window.open(url, '_self');
                });
                $(".deleteButton").on('click', function() {
                    var type_id = $(this).data('type-id');
                    deleteType(type_id);
                });
            }
        });
    }

    function deleteType(type_id = '') {
        bootbox.dialog({
            message: 'Are you sure you want to delete this type ?',
            closeButton: false,
            buttons: {
                no: {
                    label: 'No',
                    className: 'btn-secondary'
                },
                yes: {
                    label: 'Yes',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            url: baseUrl + 'admin/delete-type',
                            type: 'POST',
                            data: {
                                type_id: type_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert({
                                    message: response.message,
                                    closeButton: false,
                                    callback: function() {
                                        if (response.success) {
                                            loadTypeTable();
                                        }
                                    }
                                })
                            }
                        })
                    }
                }
            }
        })
    }
})