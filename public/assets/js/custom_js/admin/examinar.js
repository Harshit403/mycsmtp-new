$(document).ready(function() {
    $("#addExaminarBtn").on('click', function() {
        addExaminar();
    });

    function addExaminar() {
        var examinar_id = $("#examinar_id").val();
        var examinar_name = $.trim($("#examinar_name").val());
        var examinar_email = $.trim($("#examinar_email").val());
        var examinar_mobile_no = $.trim($("#examinar_mobile").val());
        var examinar_password = $.trim($("#examinar_password").val());

        var error = new Array;
        if (examinar_name == '') {
            error.push('Please enter the examinar name');
        }
        if (examinar_email == '') {
            error.push('Please enter the examinar email');
        }
        if (examinar_mobile_no == '') {
            error.push('Please enter the examinar mobile no');
        } else {
            if (examinar_mobile_no.length != 10) {
                error.push('Please enter 10 digits mobile no');
            }
        }
        if (examinar_id == '' && examinar_password == '') {
            error.push('Please set the examinar password');
        }
        if (error.length > 0) {
            bootbox.alert({
                message: error.join('</br>'),
                closeButton: false,
            });
            return false;
        }
        $.ajax({
            url: baseUrl + 'admin/add-examinar',
            type: 'POST',
            data: {
                examinar_id: examinar_id,
                examinar_name: examinar_name,
                examinar_email: examinar_email,
                examinar_mobile_no: examinar_mobile_no,
                examinar_password: examinar_password,
            },
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

    if (pageType == 'examinar_list') {
        loadExaminarList();
    } else if (pageType == 'assign_subject_list') {
        loadAssignSubList();
    }

    function loadExaminarList() {
        $("#examinarListTable").DataTable({
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
                [1, "asc"],
            ],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-examinar-list',
            },
            "columnDefs": [{
                targets: [0, 4, 5],
                className: 'text-center',
                orderable: false,
            }],
            drawCallback: function(settings, json) {
                $(".editExaminar").on('click', function() {
                    var examinar_id = $(this).data('examinar-id');
                    var url = baseUrl + 'admin/add-examinar/' + examinar_id;
                    window.open(url, '_self');
                });
                $(".flexSwitchCheckChecked").on('change', function() {
                    var examinar_id = $(this).data('examinar-id');
                    var changedStatus = ($(this).is(':checked') == true) ? 1 : 0;
                    updateExaminarBlockStatus(examinar_id, changedStatus);
                });

                $(".assignExaminar").on('click', function() {
                    var examinar_id = $(this).data('examinar-id');
                    var url = baseUrl + 'admin/examinar/assign-examinar/' + examinar_id;
                    window.open(url, '_self');
                });

                $(".viewAssignSub").on('click', function() {
                    var examinar_id = $(this).data('examinar-id');
                    var url = baseUrl + 'admin/examinar/assign-subjects/' + examinar_id;
                    window.open(url, '_blank');
                });
            }
        });
    }

    function loadAssignSubList() {
        $("#assignSubListTable").DataTable({
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
                [1, "asc"],
            ],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-assign-sub-list',
            },
            "columnDefs": [{
                targets: [4],
                className: 'text-center',
                orderable: false,
            }],
            drawCallback: function(settings, json) {
                $(".deleteAssignSubBtn").on('click', function() {
                    var assign_id = $(this).data('assign-id');
                    deleteAssignSubject(assign_id);
                })
            }
        });
    }

    function deleteAssignSubject(assign_id) {
        bootbox.dialog({
            message: 'Are you sure you want to delete assigned subject ?',
            closeButton: false,
            buttons: {
                cancel: {
                    label: ' No',
                    className: 'btn-danger'
                },
                yes: {
                    label: 'Yes',
                    className: 'btn-info',
                    callback: function() {
                        $.ajax({
                            url: baseUrl + 'admin/delete-assign-subject',
                            type: 'POST',
                            data: {
                                assign_id: assign_id,
                            },
                            dataType: 'json',
                            success: function(response) {

                            }
                        })
                    }
                }
            }
        })
    }

    function updateExaminarBlockStatus(examinar_id, changedStatus) {
        $.ajax({
            url: baseUrl + 'admin/examinar-status-change',
            type: 'POST',
            data: {
                blocked: changedStatus,
                examinar_id: examinar_id,
            },
            dataType: 'json',
            success: function(response) {
                bootbox.alert({
                    message: response.message,
                    closeButton: false,
                    callback: function() {
                        loadExaminarList();
                    }
                })
            }
        })
    }

    $("#level_id").on('change', function() {
        var level_id = $(this).val();
        if (level_id != '') {
            fetchTypeList(level_id);
        }
    });

    function fetchTypeList(level_id = '') {
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
            }
        })
    }

    $("#type_id").on('change', function() {
        var type_id = $(this).val();
        fetchSubjectList(type_id);
    });

    function fetchSubjectList(type_id = '') {
        var subject_id = $("#subject_edit_id").val();
        $.ajax({
            url: baseUrl + 'admin/get-subject-list',
            type: 'POST',
            data: {
                type_id: type_id
            },
            dataType: 'json',
            success: function(response) {
                $("#subject_id").empty();
                var html = '<option value="">Select Subject</option>';
                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        html += '<option value="' + v.subject_id + '">' + v.subject_name + '</option>';
                    });
                }
                $("#subject_id").append(html);
                if (subject_id != '') {
                    $("#subject_id").val(subject_id);
                }
            }
        });
    }

    $("#assignExaminarBtn").on('click', function() {
        var level_id = $("#level_id").val();
        var type_id = $("#type_id").val();
        var subject_id = $("#subject_id").val();
        var examinar_id = $("#examinar_id").val();
        $.ajax({
            url: baseUrl + 'admin/examinar/assign-examinar',
            type: 'POST',
            data: {
                examinar_id: examinar_id,
                level_id: level_id,
                type_id: type_id,
                subject_id: subject_id,
            },
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
    });
})