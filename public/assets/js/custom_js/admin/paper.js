$(document).ready(function() {
    if (pageType == 'add_paper') {
        $("#level_id").on('change', function() {
            var level_id = $.trim($(this).val());
            fetchTypeList(level_id);
        });

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
            });
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
            })
        }

        $("#addPaperBtn").on('click', function() {
            addPaper();
        });

        function addPaper() {
            var level_id = $("#level_id").val();
            var type_id = $("#type_id").val();
            var subject_id = $("#subject_id").val();
            var paper_name = $.trim($("#paper_name").val());
            var question_paper = $("#question_paper_upload").prop('files')[0];
            var answer_paper = $("#answer_paper_upload").prop('files')[0];
            var paper_id = $("#paper_id").val();
            var schedule_date = $("#schedule_date").val();
            var type = $("#type_status").val();
            var error = new Array;
            if (level_id == '') {
                error.push('Please select level');
            }
            if (type_id == '') {
                error.push('Please select type');
            }
            if (subject_id == '') {
                error.push('Please select subject');
            }
            if (paper_name == '') {
                error.push('Please enter paper name');
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
            formdata.append('paper_name', paper_name);
            formdata.append('paper_id', paper_id);
            formdata.append('schedule_date', schedule_date);
            formdata.append('type', type);
            if (question_paper != undefined) {
                formdata.append('question_paper_upload', question_paper);
            }
            if (answer_paper != undefined) {
                formdata.append('answer_paper_upload', answer_paper);
            }
            $.ajax({
                url: baseUrl + 'admin/add-paper',
                type: 'POST',
                data: formdata,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    bootbox.alert({
                        message: response.message,
                        closeButton: false,
                        callback: function() {
                            if (response.success) {
                                window.location.reload();
                            }
                        }
                    });
                }


            })
        }
    }

    if (pageType == 'paper_list') {
        loadPaperListTable();
        $("#subject_id").on('change', function () {
            var subject_id = $(this).val();
            loadPaperListTable(subject_id);
        });
        $("#type_status").on('change', function () {
            loadPaperListTable();
        });
    }

    function loadPaperListTable(subject_id = '') {
        var type_status = $("#type_status").val();
        type_status = type_status != '' ? type_status : 'paid';
        $("#paperListTable").DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "search_records",
            },
            "iDisplayLength": 10,
            "order": [
                [8, "desc"],
            ],
            'responsive': true,
            'scrollX': true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "columnDefs": [{
                targets: [0, 5, 6, 7, 10],
                orderable: false,
                className: 'text-center'
            }, {
                targets: [8],
                visible: false
            }],
            "ajax": {
                "url": baseUrl + 'admin/fetch-paper',
                "data": {
                    subject_id: subject_id,
                    type_status: type_status,
                }
            },
            drawCallback: function(settings, json) {
                $(".viewPreview").on('click', function() {
                    var previewLink = $(this).data('paper-link');
                    var url = baseUrl + previewLink;
                    window.open(url, '_blank');
                });

                $(".editButton").on('click', function() {
                    var paper_id = $(this).data('paper-id');
                    var url = baseUrl + 'admin/add-paper/' + paper_id;
                    window.open(url, '_self');
                });
                $(".flexSwitchCheckChecked").on('change', function() {
                    var is_checked = $(this).is(":checked");
                    var active = is_checked ? 1 : 0;
                    var paper_id = $(this).data('paper-id');
                    $.ajax({
                        url: baseUrl + 'admin/update-paper-status',
                        type: 'POST',
                        data: {
                            active: active,
                            paper_id: paper_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            bootbox.alert({
                                message: response.message,
                                closeButton: false,
                                callback: function() {
                                    loadPaperListTable();
                                }
                            })
                        }
                    })
                });
                $(".deleteButton").on('click', function() {
                    var paper_id = $(this).data('paper-id');
                    deletePaper(paper_id);
                })
            }
        });
    }
    if (pageType == 'add_paper') {
        var level_id = $("#level_id").val();
        if (level_id != '') {
            fetchTypeList(level_id);
        }
        var type_id = $("#type_edit_id").val();
        if (type_id != '') {
            fetchSubjectList(type_id);
        }
    }

    function deletePaper(paper_id) {
        bootbox.dialog({
            message: 'Are you sure you want to delete paper ?',
            closeButton: false,
            buttons: {
                no: {
                    label: 'No',
                    className: 'btn-secondary',
                },
                yes: {
                    label: 'Yes',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            url: baseUrl + 'admin/delete-paper',
                            type: 'POST',
                            data: {
                                paper_id: paper_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                loadPaperListTable();
                            }
                        })
                    }
                }
            }
        })
    }
});