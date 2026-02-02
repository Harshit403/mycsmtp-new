$(document).ready(function() {
    $("#addSubjectBtn").on('click', function() {
        addSubject();
    });

    $("#level_id").on('change', function() {
        var level_id = $(this).val();
        fetchTypeList(level_id);
    })

    function addSubject() {
        var subject_id = $("#subject_id").val();
        var type_id = $("#type_id").val();
        var level_id = $("#level_id").val();
        var subject_name = $.trim($("#subject_name").val());
        var original_price = $.trim($("#original_price").val());
        var offer_price = $.trim($("#offer_price").val());
        var error = new Array;
        if (level_id == '') {
            error.push('Please select level');
        }
        if (type_id == '') {
            error.push('Please select type');
        }
        if (subject_name == '') {
            error.push('Please enter the subject name');
        }
        if (original_price == '') {
            error.push('Please enter the original price');
        }
        if (offer_price == '') {
            error.push('Please enter the offer price');
        }
        if (error.length > 0) {
            bootbox.alert({
                message: error.join('</br>'),
                closeButton: false,
            });
            return false;
        }
        var formdata = new FormData();
        formdata.append('level_id', level_id);
        formdata.append('type_id', type_id);
        formdata.append('subject_id', subject_id);
        formdata.append('subject_name', subject_name);
        formdata.append('original_price', original_price);
        formdata.append('offer_price', offer_price);
        $.ajax({
            url: baseUrl + 'admin/add-subject',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
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

    var level_id = $("#level_id").val();
    if (level_id != '') {
        fetchTypeList(level_id);
    }

    function fetchTypeList(level_id = '') {
        var type_id = $("#type_edit_id").val();
        $.ajax({
            url: baseUrl + 'admin/get-type-list',
            type: 'POST',
            data: {
                level_id: level_id
            },
            dataType: 'json',
            success: function(response) {
                $("#type_id").empty();
                var html = '<option value="">Select Type</option>';
                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        html += '<option value="' + v.type_id + '">' + v.type_name + '</option>';
                    });
                }
                $("#type_id").append(html);
                if (type_id != '') {
                    $("#type_id").val(type_id);
                }
            }
        })
    }

    loadSubjectTable();

    function loadSubjectTable() {
        $("#subject_table").DataTable({
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
                [6, "desc"],
            ],
            "columnDefs": [{
                "targets": [0, 7],
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
                "url": baseUrl + 'admin/fetch-subject-list',
            },
            drawCallback: function(settings, json) {
                $(".editButton").on('click', function() {
                    var subject_id = $(this).data('subject-id');
                    var url = baseUrl + 'admin/add-subject/' + subject_id;
                    window.open(url, '_self');
                });
                $(".deleteButton").on('click', function() {
                    var subject_id = $(this).data('subject-id');
                    deleteLevel(subject_id);
                })
            }
        });
    }

    function deleteLevel(subject_id) {
        bootbox.dialog({
            message: 'Are you sure you want to delete the subject?',
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
                            url: baseUrl + 'admin/delete-subject',
                            type: 'POST',
                            data: {
                                subject_id: subject_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert({
                                    message: response.message,
                                    closeButton: false,
                                    callback: function() {
                                        if (response.success) {
                                            loadSubjectTable();
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