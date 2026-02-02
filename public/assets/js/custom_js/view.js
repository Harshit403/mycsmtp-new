$(document).ready(function() {
    $(".levelBtn").on('click', function(e) {
        var levelId = $(this).data('level-id');
        loadTopicPage(levelId);
    });

    function loadTopicPage(levelId) {
        var url = baseUrl + 'level/type/' + levelId;
        window.open(url, '_self');
    }

    $(".typeBtn").on('click', function() {
        var typeId = $(this).data('type-id');
        var url = baseUrl + 'type/subject/' + typeId;
        window.open(url, '_self');
    });
    $(".addToCartBtn").on('click', function() {
        var subject_id = $(this).data('subject-id');
        addtoCart(subject_id);
    });

    function addtoCart(subject_id = '') {
        if (subject_id == '') {
            bootbox.alert('Something went wrong');
            return false;
        } else {
            $.ajax({
                url: baseUrl + 'add-to-cart',
                type: 'POST',
                data: {
                    'subject_id': subject_id,
                },
                dataType: 'json',
                success: function(response) {
                    bootbox.alert({
                        message: response.message,
                        callback: function() {
                            if (response.success) {
                                $(".cartCount").html(response.totalQty);
                            } else {
                                window.location.href = baseUrl + 'sign-in';
                            }
                        }
                    });
                }
            })
        }
    }

    $(".uploadAssignment").on('click', function() {
        var paper_id = $(this).data('paper-id');
        var assignmentFilePath = $("#assignmentFile" + paper_id + "").val();
        if (assignmentFilePath == '') {
            bootbox.alert("Please select your assginment file");
            return false;
        }
        let dialog = bootbox.dialog({
            message: 'Are you sure you want to submit assignment',
            size: 'medium',
            onEscape: true,
            backdrop: true,
            buttons: {
                no: {
                    label: 'No',
                    className: 'btn-secondary',
                    callback: function() {

                    }
                },
                yes: {
                    label: 'Yes',
                    className: 'btn-success',
                    callback: function() {
                        uploadAssignmentFile(paper_id);
                    }
                },
            }
        })
    });

    function uploadAssignmentFile(paper_id = '') {
        var formdata = new FormData();
        var errors = new Array;
        var assginmentFile = $("#assignmentFile" + paper_id + "").prop('files')[0];
        var extension = assginmentFile['name'].split(".");
        if (jQuery.inArray(extension[1], ['pdf', 'jpg', 'jpeg', 'png']) == -1) {
            errors.push('Please select a image or pdf file to upload');
            return false;
        }
        formdata.append('paper_id', paper_id);
        formdata.append('assignment_file', assginmentFile);
        $.ajax({
            url: baseUrl + 'upload/assignment-file',
            type: 'POST',
            data: formdata,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                html = '<div class="col-md-12 text-warning font-weight-bold d-flex align-items-center justify-content-center">Upload In Progress <i class="fa-solid fa-spin fa-spinner ml-2"></i></div>';
                $("#assignmentConatianer" + paper_id + "").html(html);
            },
            success: function(response) {
                if (response.success) {
                    $("#assignmentConatianer" + paper_id + "").html('');
                    uploadAssigmentStatus();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                html = '<div class="col-md-12 text-danger font-weight-bold d-flex align-items-center justify-content-center">Upload Process Failed<br>(File size limit exceed) Use max 30mb file <i class="fas fa-times ml-2"></i></div>';
                $("#assignmentConatianer" + paper_id + "").html(html);
            }
        });
    }
    if (pageType != null && pageType == 'paper-list') {
        uploadAssigmentStatus();
        setInterval(function() {
            uploadAssigmentStatus();
        }, 20000);
    }

    function uploadAssigmentStatus() {
        $.ajax({
            url: baseUrl + 'fetch-assignment-status',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.length > 0) {
                    var assignmentStatus = 'Assignment Submitted';
                    var statusColor = 'text-warning';
                    $.each(response, function(i, v) {
                        if (v.assignment_status == 2) {
                            html = '<div class="col-md-12 text-center"><a href="' + baseUrl + v.assignment_checked_file + '" class="btn btn-success" download title="Download Checked AnswerSheet"><i class="bi bi-arrow-down-circle"></i> Download</a></div>';
                            $("#answerBtnContainer" + v.paper_id + "").show();
                        } else if (v.assignment_status == 1) {
                            html = '<div class="col-md-12 ' + statusColor + ' font-weight-bold d-flex align-items-center justify-content-center">' + assignmentStatus + '</div>';
                            $("#answerBtnContainer" + v.paper_id + "").show();
                        } else {
                            html = '<div class="col-md-8">' +
                                '<input type="file" class="form-control mr-2" id="assignmentFile' + response.paper_id + '" accept="application/pdf,image/*"/>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                '<a href="javascript:void(0)" class="btn btn-info uploadAssignment" data-paper-id="' + response.paper_id + '"><i class="fas fa-upload"></i></a></a>' +
                                '</div>';
                        }
                        $("#assignmentConatianer" + v.paper_id + "").html(html);
                    });
                } else {
                    $(".answerBtnContainerClass").hide();
                }
            }
        })
    }

    $(".moreDetailsBtn").on('click', function() {
        var subject_id = $(this).data('subject-id');
        var url = baseUrl + 'subject/more-details/' + subject_id;
        window.open(url, '_self');
    });
    $(".invoiceBtn").on('click', function() {
        var purchase_id = $(this).data('purchase-id');
        var url = baseUrl + 'invoice/download-invoice?purchase_id=' + purchase_id;
        window.open(url, '_blank');
    });
});