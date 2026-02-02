$(document).ready(function() {
    loadNotesTable();
    runDropdown();

    function loadNotesTable() {
        $("#notes_table").DataTable({
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
                "url": baseUrl + 'admin/fetch-notes',
            },
            drawCallback: function(settings, json) {
                $(".viewPreviewImg").on('click', function() {
                    var imageLink = $(this).data('note-preview-image');
                    if (imageLink == '') {
                        var message = "No preview image available";
                    } else {
                        var url = baseUrl + imageLink;
                        window.open(url, '_blank');
                    }
                });

                $(".flexSwitchCheckChecked").on('change', function() {
                    var checkStatus = $(this).is(":checked");
                    checkStatus = checkStatus ? 1 : 0;
                    var note_id = $(this).data('note-id');
                    $.ajax({
                        url: baseUrl + 'admin/notes/status-update',
                        type: 'POST',
                        data: {
                            active: checkStatus,
                            note_id: note_id,
                        },
                        dataType: 'json',
                        success: function(response) {
                            bootbox.alert({
                                message: response.message,
                                callback: function() {
                                    loadNotesTable();
                                }
                            })
                        }
                    })
                });

                $(".noteDeleteBtn").on('click', function() {
                    var note_id = $(this).data('note-id');
                    bootbox.dialog({
                        message: 'Are you sure, you want to delete the note ?',
                        buttons: {
                            cancel: {
                                label: ' Cancel',
                                className: 'btn-secondary btn-sm'
                            },
                            yes: {
                                label: ' Yes',
                                className: 'btn-sm btn-success',
                                callback: function() {
                                    $.ajax({
                                        url: baseUrl + 'admin / notes / delete',
                                        type: 'POST',
                                        data: {
                                            note_id: note_id,
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            bootbox.alert({
                                                message: response.message,
                                                callback: function() {
                                                    loadNotesTable();
                                                }
                                            })
                                        }
                                    })
                                }
                            },
                        }
                    })
                })
            }
        });
    }

    function runDropdown() {
        var level_id = $("#level_id").val();
        if (level_id != '') {
            $("#levels").val(level_id);
            loadType(level_id);
        }
        window.setTimeout(function() {
            var type_id = $("#type_id").val();
            if (type_id != '') {
                $("#type").val(type_id);
                loadsubject(type_id);
            }
        }, 600);
        window.setTimeout(function() {
            var subject_id = $("#subject_id").val();
            if (subject_id != '') {
                $("#subject").val(subject_id);
            }
        }, 1000);
    }

    $("#levels").on('change', function() {
        var level_id = $(this).val();
        loadType(level_id);
    });

    function loadType(level_id = '') {
        if (level_id != '') {
            $.ajax({
                url: baseUrl + 'admin/notes/fetch-type-list',
                type: 'POST',
                data: {
                    level_id: level_id,
                },
                dataType: 'json',
                success: function(response) {
                    var html = '<option value="">Select Type</option>';
                    if (response.data) {
                        $.each(response.data, function(i, v) {
                            html += '<option value="' + v.type_id + '">' + v.type_name + '</option>';
                        });
                    }
                    $("#type").html(html);
                }
            });
        } else {
            $("#type").html('');
        }
    }

    $("#type").on('change', function() {
        var type_id = $(this).val();
        loadsubject(type_id);
    });

    function loadsubject(type_id = '') {
        var level_id = $("#levels").val();
        if (type_id != '') {
            $.ajax({
                url: baseUrl + 'admin/notes/fetch-subject-list',
                type: 'POST',
                data: {
                    type_id: type_id,
                    level_id: level_id,
                },
                dataType: 'json',
                success: function(response) {
                    var html = '<option value="">Select Subject</option>';
                    if (response.data) {
                        $.each(response.data, function(i, v) {
                            html += '<option value="' + v.subject_id + '">' + v.subject_name + '</option>';
                        });
                    }
                    $("#subject").html(html);
                }
            });
        }
    }

    $("#addNotesBtn").on('click', function() {
        var subject_id = $("#subject").val();
        var subject_name = $("#subject option:selected").text();
        var filePath = $("#notes_attachment").val();
        var note_id = $("#note_id").val();
        var notes_name = $.trim($("#notes_name").val());
        var formdata = new FormData();
        if (subject_id == '') {
            bootbox.alert('Please select subject');
            return false;
        }
        if (notes_name == '') {
            bootbox.alert('Please enter the notes name');
            return false;
        }
        formdata.append('notes_name', notes_name);
        formdata.append('subject_id', subject_id);
        formdata.append('subject_name', subject_name);
        if (filePath == '') {
            bootbox.alert('Please add a note to upload');
            return false;
        }
        var file_attachment = $("#notes_attachment").prop('files')[0];
        formdata.append('attachment', file_attachment);
        if (notes_id == '') {
            formdata.append('note_id', note_id);
        }
        $.ajax({
            url: baseUrl + 'admin/notes/upload-sub-note',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                bootbox.alert({
                    message: response.message,
                    callback: function() {
                        if (response.success) {
                            window.location.reload();
                        }
                    }
                })
            }
        })
    })
})