$(document).ready(function() {
    $("#notice_text").summernote({
        placeholder: 'Notice',
        height: 150,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
    $("#moreSubjectDetails").summernote({
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
    $('.dropdown-toggle').dropdown();
    $("#uploadButton").on('click', function() {
        var notes_title = $("#notes_title").val();
        var notes_description = $("#notes_description").val();
        var original_price = $("#original_price").val();
        var offer_price = $("#offer_price").val();
        var cover_image_file = $("#notes_cover_image").prop('files')[0];
        var notes_file = $("#upload_notes_file").prop('files')[0];
        var data = new FormData();
        data.append('notes_title', notes_title);
        data.append('notes_description', notes_description);
        data.append('cover_image_file', cover_image_file);
        data.append('notes_file', notes_file);
        data.append('original_price', original_price);
        data.append('offer_price', offer_price);
        $.ajax({
            type: 'POST',
            url: baseUrl + 'admin/upload/notes',
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(response) {
                bootbox.alert({
                    message: response.message,
                    callback: function() {
                        if (response.success) {
                            window.location.reload();
                        }
                    }
                });
            }
        })
    });

    $(".deleteNotes").on('click', function() {
        var deleteId = $(this).data('id');
        deleteThisItem(deleteId, 'note');
    });

    $(".deleteNotice").on('click', function() {
        var deleteId = $(this).data('id');
        deleteThisItem(deleteId, 'notice');
    });

    function deleteNote(deleteId = '') {
        $.ajax({
            type: 'POST',
            url: baseUrl + '/admin/delete-notes',
            dataType: 'JSON',
            data: {
                'deleteId': deleteId
            },
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
        });
    }

    function deleteNotice(deleteId) {
        $.ajax({
            type: 'POST',
            url: baseUrl + '/admin/delete/notice',
            dataType: 'JSON',
            data: {
                'deleteId': deleteId,
            },
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
    }

    function deleteThisItem(deleteId = '', msg = '') {
        bootbox.dialog({
            title: 'Delete Confirmation',
            message: 'Are you sure you want to delete the ' + msg + ' ? <span class="text-danger font-weight-bold">If you delete you can not retrive it after</span>',
            onEscape: true,
            backdrop: true,
            buttons: {
                No: {
                    label: 'No',
                    className: 'btn-secondary',
                    callback: function() {

                    }
                },
                Yes: {
                    label: 'Yes',
                    className: 'btn-primary',
                    callback: function() {
                        if (msg == 'note') {
                            deleteNote(deleteId);
                        } else if (msg == 'notice') {
                            deleteNotice(deleteId);
                        }
                    }
                }
            }
        });
    }

    $("#uploadNoticeBtn").on('click', function() {
        uploadNotice();
    })

    function uploadNotice() {
        var noticeData = $("#notice_text").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/admin/upload/notice',
            dataType: 'JSON',
            data: {
                notice_text: noticeData,
            },
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
        });
    }

    $(".addLevel").on("click", function() {
        addLevel();
    });

    function addLevel(level_id = '') {
        var level_name = $.trim($("#level_name").val());
        if (level_name == '') {
            bootbox.alert('Please enter a level name');
            return false;
        }
        $.ajax({
            url: baseUrl + 'admin/addLevel',
            type: 'POST',
            data: {
                level_name: level_name,
                level_id: level_id,
            },
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    bootbox.alert({
                        message: data.message,
                        callback: function() {
                            $("#level_name").val('');
                            $(".levelEditSection").hide();
                            $(".addLevel").show();
                            fetchLevelList();
                        }
                    });
                } else {
                    bootbox.alert(data.message);
                }
            }
        });
    }

    fetchLevelList();

    function fetchLevelList() {
        $.ajax({
            url: baseUrl + 'admin/fetch-level-list',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '<option value="" disabled selected>Select Level</option>';
                if (data.success) {
                    if (data.data != '') {
                        $.each(data.data, function(i, v) {
                            html += '<option value="' + v.level_id + '">' + v.level_name + '</option>';
                        });
                    } else {
                        bootbox.alert(data.message);
                    }
                }
                $("#levelSelect").html(html);
            }
        });
    }

    $(".levelEditPopulateBtn").on('click', function() {
        var level_id = $("#levelSelect").val();
        if (level_id != null) {
            $(".levelEditSection").show();
            $(".addLevel").hide();
            var level_name = $("#levelSelect").find('option:selected').text();
            $("#level_name").val(level_name);
        }
    });

    $(".levelDeleteBtn").on('click', function() {
        deleteLevel()
    });

    function deleteLevel() {
        var level_id = $("#levelSelect").val();
        if (level_id !== null) {
            bootbox.dialog({
                message: "Are you sure you want to delete this level?",
                buttons: {
                    no: {
                        label: 'No',
                        className: 'btn-danger',
                        callback: function() {

                        }
                    },
                    yes: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            $.ajax({
                                url: baseUrl + 'admin/delete-level',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    level_id: level_id
                                },
                                success: function(data) {
                                    bootbox.alert({
                                        message: data.message,
                                        callback: function() {
                                            if (data.success) {
                                                fetchLevelList();
                                                $(".typeSection").hide();
                                                $(".subjectSection").hide();
                                                $(".subjectPriceSection").hide();
                                                $(".paperSection").hide();
                                            }
                                        }
                                    });
                                }
                            });
                        }
                    },
                },
            })
        } else {
            bootbox.alert('Please select a level');
        }
    }

    $(".editLevel").on('click', function() {
        var level_id = $("#levelSelect").val();
        addLevel(level_id);
    });


    $(".discardLevel").on('click', function() {
        $(".levelEditSection").hide();
        $(".addLevel").show();
        $("#level_name").val('');
    });

    $("#levelSelect").on('change', function() {
        var level_id = $(this).val();
        if (level_id != '') {
            $(".typeSection").show();
            $(".subjectPriceSection").hide();
            $(".paperSection").hide();
            fetchTypeList(level_id);
        }
    });

    $(".addType").on("click", function() {
        addType();
    });

    function addType(type_id = '') {
        var type_name = $.trim($("#type_name").val());
        var level_id = $("#levelSelect").val();
        if (type_name == '') {
            bootbox.alert('Please enter a type name');
            return false;
        }
        $.ajax({
            url: baseUrl + 'admin/addType',
            type: 'POST',
            data: {
                type_name: type_name,
                type_id: type_id,
                level_id: level_id,
            },
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    bootbox.alert({
                        message: data.message,
                        callback: function() {
                            $("#type_name").val('');
                            $(".typeEditSection").hide();
                            $(".addType").show();
                            fetchTypeList(level_id);
                        }
                    });
                } else {
                    bootbox.alert(data.message);
                }
            }
        });
    }

    function fetchTypeList(level_id = '') {
        $.ajax({
            url: baseUrl + 'admin/fetch-type-list',
            type: 'POST',
            data: {
                level_id: level_id,
            },
            dataType: 'json',
            success: function(data) {
                var html = '<option value="" disabled selected>Select type</option>';
                if (data.success) {
                    if (data.data != '') {
                        $.each(data.data, function(i, v) {
                            html += '<option value="' + v.type_id + '">' + v.type_name + '</option>';
                        });
                    } else {
                        bootbox.alert(data.message);
                    }
                }
                $("#typeSelect").html(html);
            }
        });
    }

    $(".typeEditPopulateBtn").on("click", function() {
        var type_id = $("#typeSelect").val();
        if (type_id != null) {
            $(".typeEditSection").show();
            $(".addType").hide();
            var type_name = $("#typeSelect").find('option:selected').text();
            $("#type_name").val(type_name);
        }
    });

    $(".typeDeleteBtn").on('click', function() {
        deleteType();
    });

    function deleteType() {
        var type_id = $("#typeSelect").val();
        if (type_id !== null) {
            bootbox.dialog({
                message: "Are you sure you want to delete this type?",
                buttons: {
                    no: {
                        label: 'No',
                        className: 'btn-danger',
                        callback: function() {

                        }
                    },
                    yes: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            $.ajax({
                                url: baseUrl + 'admin/delete-type',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    type_id: type_id
                                },
                                success: function(data) {
                                    bootbox.alert({
                                        message: data.message,
                                        callback: function() {
                                            if (data.success) {
                                                fetchTypeList();
                                                $(".subjectSection").hide();
                                                $(".subjectPriceSection").hide();
                                                $(".paperSection").hide();
                                            }
                                        }
                                    });
                                }
                            });
                        }
                    },
                },
            })
        } else {
            bootbox.alert('Please select a type');
        }
    }

    $(".editType").on('click', function() {
        var type_id = $("#typeSelect").val();
        addType(type_id);
    });

    $(".discardType").on('click', function() {
        $(".typeEditSection").hide();
        $(".addType").show();
        $("#type_name").val('');
    });

    $(".addSubject").on("click", function() {
        addSubject();
    });

    $("#typeSelect").on('change', function() {
        var type_id = $(this).val();
        if (type_id != '') {
            $(".subjectSection").show();
            $(".subjectPriceSection").hide();
            $(".paperSection").hide();
            fetchTypeDetails(type_id);
            fetchSubjectList(type_id);
        }
    });

    function fetchTypeDetails(type_id) {
        $.ajax({
            url: baseUrl + 'admin/fetch-type-details',
            type: 'POST',
            data: {
                type_id: type_id,
            },
            dataType: 'json',
            success: function(response) {
                $("#typeSchedule").val('');
                $("#moreTypeDetails").summernote('code', '');
                if (response.data != '') {
                    $("#moreTypeDetails").summernote('code', response.data.type_more_details);
                    if (response.data.schedule_file !== '') {
                        var fileName = response.data.file_name;
                        $(".uploadScheduleName").find('p').html(fileName);
                        $(".uploadScheduleName").find('a').attr('href', baseUrl + response.data.schedule_file);
                        $(".typeScheduleFileUpload").hide();
                        $(".typeScheduleFileDisplay").show();
                    } else {
                        $(".typeScheduleFileUpload").show();
                        $(".typeScheduleFileDisplay").hide();
                    }
                }
            }
        })
    }
    $("#updatetypeDetails").on('click', function() {
        var typeMoreDetails = $.trim($("#moreTypeDetails").val());
        var type_id = $("#typeSelect").val();
        if (type_id == '' || type_id == null) {
            bootbox.alert("Please select a type");
            return false;
        }
        if (typeMoreDetails == '') {
            bootbox.alert("Please enter details to display");
            return false;
        }
        $.ajax({
            url: baseUrl + 'admin/upload-type-more-details',
            type: 'POST',
            data: {
                type_more_details: typeMoreDetails,
                type_id: type_id
            },
            dataType: 'json',
            success: function(response) {
                bootbox.alert({
                    message: response.message,
                    callback: function() {
                        if (response.success) {
                            $("#moreTypeDetails").summernote('code', typeMoreDetails);
                        }
                    }
                })
            }
        })
    });

    $(".updateScheduleBtn").on('click', function() {
        var schedule_file_path = $("#typeSchedule").val();
        var type_id = $("#typeSelect").val();
        var formdata = new FormData();
        if (type_id == '' || type_id == null) {
            bootbox.alert('Please select a type');
            return false;
        }
        formdata.append('type_id', type_id);
        var type_name = $("#typeSelect").find('option:selected').text();
        formdata.append('type_name', type_name);
        if (schedule_file_path == '') {
            bootbox.alert('Please select schedule_file to upload');
            return false;
        }
        var schedule_file = $("#typeSchedule").prop('files')[0];
        formdata.append('schedule_file', schedule_file);
        $.ajax({
            url: baseUrl + 'admin/upload-type-schedule',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                bootbox.alert(response.message, function() {
                    if (response.success) {
                        fetchTypeDetails(type_id);
                    }
                })
            }
        })
    });

    $(".btnTyepeScheduleRemove").on('click', function() {
        var type_id = $("#typeSelect").val();
        let dialog = bootbox.dialog({
            message: 'Are you sure you want to remove the schedule',
            buttons: {
                cancel: {
                    label: 'Cancel',
                    className: " btn-secondary btn-sm",
                },
                yes: {
                    label: 'Yes',
                    className: 'btn-success btn-sm',
                    callback: function() {
                        $.ajax({
                            url: baseUrl + 'admin/remove-type-schedule',
                            type: 'POST',
                            data: {
                                type_id: type_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert(response.message, function() {
                                    fetchTypeDetails(type_id);
                                })
                            }
                        })
                    }
                }
            }
        })
    })


    function addSubject(subject_id = '') {
        var subject_name = $.trim($("#subject_name").val());
        var level_id = $("#levelSelect").val();
        var type_id = $("#typeSelect").val();
        if (subject_name == '') {
            bootbox.alert('Please enter a subject name');
            return false;
        }
        $.ajax({
            url: baseUrl + 'admin/addSubject',
            type: 'POST',
            data: {
                subject_name: subject_name,
                type_id: type_id,
                level_id: level_id,
                subject_id: subject_id,
            },
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    bootbox.alert({
                        message: data.message,
                        callback: function() {
                            $("#subject_name").val('');
                            $(".subjectEditSection").hide();
                            $(".addSubject").show();
                            fetchSubjectList();
                        }
                    });
                } else {
                    bootbox.alert(data.message);
                }
            }
        });
    }

    function fetchSubjectList(type_id = '') {
        var level_id = $("#levelSelect").val();
        var type_id = $("#typeSelect").val();
        $.ajax({
            url: baseUrl + 'admin/fetch-subject-list',
            type: 'POST',
            data: {
                level_id: level_id,
                type_id: type_id,
            },
            dataType: 'json',
            success: function(data) {
                var html = '<option value="" disabled selected>Select subject</option>';
                if (data.success) {
                    if (data.data != '') {
                        $.each(data.data, function(i, v) {
                            html += '<option value="' + v.subject_id + '">' + v.subject_name + '</option>';
                        });
                    } else {
                        bootbox.alert(data.message);
                    }
                }
                $("#subjectSelect").html(html);
            }
        });
    }

    $(".subjectEditPopulateBtn").on("click", function() {
        var subject_id = $("#subjectSelect").val();
        if (subject_id != null) {
            $(".subjectEditSection").show();
            $(".addSubject").hide();
            var subject_name = $("#subjectSelect").find('option:selected').text();
            $("#subject_name").val(subject_name);
        }
    });

    $(".subjectDeleteBtn").on('click', function() {
        deleteSubject();
    });

    function deleteSubject() {
        var subject_id = $("#subjectSelect").val();
        if (subject_id !== null) {
            bootbox.dialog({
                message: "Are you sure you want to delete this subject?",
                buttons: {
                    no: {
                        label: 'No',
                        className: 'btn-danger',
                        callback: function() {

                        }
                    },
                    yes: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            $.ajax({
                                url: baseUrl + 'admin/delete-subject',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject_id: subject_id
                                },
                                success: function(data) {
                                    bootbox.alert({
                                        message: data.message,
                                        callback: function() {
                                            if (data.success) {
                                                fetchSubjectList();
                                                $(".subjectPriceSection").hide();
                                                $(".paperSection").hide();
                                            }
                                        }
                                    });
                                }
                            });
                        }
                    },
                },
            })
        } else {
            bootbox.alert('Please select a subject');
        }
    }

    $(".editSubject").on('click', function() {
        var subject_id = $("#subjectSelect").val();
        addSubject(subject_id);
    });

    $(".discardSubject").on('click', function() {
        $(".subjectEditSection").hide();
        $(".addSubject").show();
        $("#subject_name").val('');
    });

    $("#subjectSelect").on('change', function() {
        var subject_id = $(this).val();
        if (subject_id != null) {
            fetchSubjectAdditionalDetails(subject_id);
            $(".subjectPriceSection").show();
            $(".paperSection").show();
        }
    });

    function fetchSubjectAdditionalDetails(subject_id = '') {
        $.ajax({
            url: baseUrl + 'admin/fetch-subject-details',
            type: 'POST',
            data: {
                subject_id: subject_id,
            },
            dataType: 'json',
            success: function(response) {
                if (response.success && response.data.length != '') {
                    $("#subject_original_price").val(response.data.original_price);
                    $("#subject_offer_price").val(response.data.offer_price);
                    $('#moreSubjectDetails').summernote('code', response.data.more_details);
                } else {
                    $("#subject_original_price").val('');
                    $("#subject_offer_price").val('');
                    $("#moreSubjectDetails").summernote('code', '');
                }
            }
        })
    }

    function addSubjectAdditionalDetails() {
        var subOriginalPrice = $.trim($("#subject_original_price").val());
        var subOfferPrice = $.trim($("#subject_offer_price").val());
        var moreDetails = $.trim($("#moreSubjectDetails").val());
        var subject_id = $("#subjectSelect").val();
        var errors = new Array;
        if (subOriginalPrice == '') {
            errors.push('Please enter orignal price');
        } else if (subOfferPrice == '') {
            errors.push('Please enter offer price');
        }
        if (errors.length > 0) {
            bootbox.alert({
                message: errors.join('</br>'),
            });
            return false;
        }
        $.ajax({
            url: baseUrl + 'admin/add-subject-additional-details',
            type: 'POST',
            dataType: 'json',
            data: {
                subject_id: subject_id,
                offer_price: subOfferPrice,
                original_price: subOriginalPrice,
                more_details: moreDetails,
            },
            success: function(response) {
                bootbox.alert(response.message);
                fetchSubjectAdditionalDetails(subject_id);
            }
        });
    }

    $("#updateSubjectDetails").on('click', function() {
        addSubjectAdditionalDetails();
    });

    $("#addPaperBtn").on('click', function() {
        addPaperDetails();
    });

    function addPaperDetails() {
        var subject_id = $("#subjectSelect").val();
        var type_id = $("#typeSelect").val();
        var level_id = $("#levelSelect").val();
        var paper_name = $.trim($("#paper_name").val());
        var uploaded_question_paper_file_path = $("#question_paper_file").val();
        var uploaded_answer_paper_file_path = $("#answer_paper_file").val();
        var formdata = new FormData();
        var errors = new Array();
        if (level_id == '') {
            errors.push('Please select a level');
        } else if (type_id == '') {
            errors.push('Please select a type');
        } else if (subject_id == '') {
            errors.push('Please select a subject');
        }
        if (paper_name == '') {
            errors.push('Please enter a paper name');
        }
        if (uploaded_question_paper_file_path == '') {
            errors.push('Please select a file to upload');
        }
        if (uploaded_answer_paper_file_path == '') {
            errors.push('Please select a file to upload');
        }
        if (errors.length > 0) {
            bootbox.alert(errors.join('</br>'));
            return false;
        }
        var uploaded_question_paper_file = $("#question_paper_file").prop('files')[0];
        var uploaded_answer_paper_file = $("#answer_paper_file").prop('files')[0];
        formdata.append('subject_id', subject_id);
        formdata.append('type_id', type_id);
        formdata.append('level_id', level_id);
        formdata.append('paper_name', paper_name);
        formdata.append('uploaded_question_paper_file', uploaded_question_paper_file);
        formdata.append('uploaded_answer_paper_file', uploaded_answer_paper_file);
        $.ajax({
            url: baseUrl + 'admin/upload-paper-details',
            type: 'POST',
            data: formdata,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                bootbox.alert({
                    message: response.message,
                    callback: function() {
                        $("#paper_name").val('');
                        $("#question_paper_file").val('');
                        $("#answer_paper_file").val('');

                    }
                });
            }
        })
    }
    if (pageType == 'paper-list') {
        loadPaperListTable();
    }

    function loadPaperListTable() {
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
            "columnDefs": [{ targets: [5, 6, 7], orderable: false }, { targets: [8], visible: false }],
            "ajax": {
                "url": baseUrl + 'admin/fetch-paper-list-details',
            },
            drawCallback: function(settings, json) {
                $(".viewPreview").on('click', function() {
                    var previewLink = $(this).data('paper-link');
                    var url = baseUrl + previewLink;
                    window.open(url, '_blank');
                });
                $(".removeButton").on('click', function() {
                    var paper_id = $(this).data('paper-id');
                    var type = $(this).data('type');
                    bootbox.dialog({
                        message: 'Are you sure, you want to remove the file ?',
                        closeButton: false,
                        buttons: {
                            cancel: {
                                label: ' Cancel',
                                className: 'btn-secondary btn-sm',
                                callback: function() {
                                    loadPaperListTable();
                                }
                            },
                            'yes': {
                                label: ' Yes',
                                className: 'btn-success btn-sm',
                                callback: function() {
                                    $.ajax({
                                        url: baseUrl + 'admin/paper-remove',
                                        type: 'POST',
                                        data: {
                                            paper_id: paper_id,
                                            type: type,
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            bootbox.alert({
                                                message: response.message,
                                                callback: function() {
                                                    loadPaperListTable();
                                                }
                                            })
                                        }
                                    });
                                }
                            }

                        }
                    });
                });
                $(".uploadButton").on('click', function() {
                    var type = $(this).data('type');
                    var paper_id = $(this).data('paper-id');
                    uploadPaperFile(type, paper_id);
                });

                $(".flexSwitchCheckChecked").on('change', function() {
                    var status = ($(this).is(':checked') == true) ? 1 : 0;
                    var paper_id = $(this).data('paper-id');
                    updatePaperStatus(status, paper_id);
                });

                $(".editPaper").on('click', function() {
                    var paper_id = $(this).data('paper-id');
                    var paper_name = $(this).data('paper-name');
                    html = '<div class="row">' +
                        '<div class="col-md-12">' +
                        '<label>Paper name</label>' +
                        '<input class="form-control" id="paper_name" value="' + paper_name + '">'
                    '</div>' +
                    '</div>';
                    bootbox.dialog({
                        message: html,
                        closeButton: false,
                        buttons: {
                            cancel: {
                                label: ' Cancel',
                                className: 'btn-sm btn-secondary',
                                callback: function() {
                                    loadPaperListTable();
                                }
                            },
                            yes: {
                                label: ' Update',
                                className: 'btn-sm btn-success',
                                callback: function() {
                                    var paper_name = $.trim($(this).find("#paper_name").val());
                                    if (paper_name == '') {
                                        bootbox.alert('Please enter paper name');
                                        return false;
                                    }
                                    $.ajax({
                                        url: baseUrl + 'admin/paper/update-paper-details',
                                        type: 'POST',
                                        data: {
                                            paper_id: paper_id,
                                            paper_name: paper_name,
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            bootbox.alert({
                                                message: response.message,
                                                callback: function() {
                                                    loadPaperListTable();
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

    function uploadPaperFile(type, paper_id) {
        var uploadFile = '';
        if (type == 'answer_paper_upload') {
            var uploadFilePath = $(".answerUpload" + paper_id + "").val();
            if (uploadFilePath != '') {
                uploadFile = $(".answerUpload" + paper_id + "").prop('files')[0];
            }
        } else {
            var uploadFilePath = $(".questionUpload" + paper_id + "").val();
            if (uploadFilePath != '') {
                uploadFile = $(".questionUpload" + paper_id + "").prop('files')[0];
            }
        }

        if (uploadFile == '') {
            bootbox.alert('Please Upload the file to upload');
            return false;
        }
        var formdata = new FormData();
        formdata.append('uploadFile', uploadFile);
        formdata.append('type', type);
        formdata.append('paper_id', paper_id);
        $.ajax({
            url: baseUrl + 'admin/paper/upload-file',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                bootbox.alert({
                    message: response.message,
                    callback: function() {
                        loadPaperListTable();
                    }
                })
            }

        })
    }

    function updatePaperStatus(status, paper_id) {
        var statusString = status == 1 ? 'active' : 'inactive';
        bootbox.dialog({
            message: 'Are you sure you want to ' + statusString + ' paper ?',
            closeButton: false,
            buttons: {
                cancel: {
                    label: ' Cancel',
                    className: 'btn-sm btn-secondary',
                    callback: function() {
                        loadPaperListTable();
                    }
                },
                yes: {
                    label: ' Yes',
                    className: 'btn-sm btn-success',
                    callback: function() {
                        $.ajax({
                            url: baseUrl + 'admin/paper/change-status',
                            type: 'POST',
                            data: {
                                active: status,
                                paper_id: paper_id
                            },
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert({
                                    message: response.message,
                                    callback: function() {
                                        loadPaperListTable();
                                    }
                                })
                            }
                        })
                    }
                }
            }
        })
    }

    $(".notesBtn").on('click', function () {
        var url = baseUrl + 'notes/subject-list';
        window.open(url, '_self');
    });
});