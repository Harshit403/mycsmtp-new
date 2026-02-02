$(document).ready(function() {
    if (pageType == 'newsletter_list') {
        loadNewsletterList();
    }

    function loadNewsletterList() {
        $("#newsletterListTable").DataTable({
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
            "columnDefs": [{
                targets: 3,
                orderable: false,
            }],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-newsletter-list',
            },
            drawCallback: function(settings, json) {
                $(".flexSwitchCheckChecked").on('change', function() {
                    var is_check = $(this).is(":checked");
                    var activeStatus = is_check ? 1 : 0;
                    var newsletter_id = $(this).data('newsletter-id');
                    $.ajax({
                        url: baseUrl + 'admin/newsletter/active',
                        type: 'POST',
                        data: {
                            active: activeStatus,
                            newsletter_id: newsletter_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            bootbox.alert({
                                message: response.message,
                                closeButton: false,
                                callback: function() {
                                    if (response.success) {
                                        loadNewsletterList();
                                    }
                                }
                            })
                        }
                    })
                });
            }
        });
    }

    $("#sendNewsLetter").on('click', function() {
        html = '<div class="row">' +
            '<div class="col-md-12">' +
            '<label>Subject</label>' +
            '<input class="form-control form-control-sm" id="mailSubject" placeholder="Subject"/>' +
            '</div>' +
            '<div class="col-md-12">' +
            '<label>Mail Body</label>' +
            '<text-area id="newsLetterSection" height:400px;></text-area>' +
            '</div>' +
            '<div>';
        let dialog = bootbox.dialog({
            title: "NewsLetter Body",
            message: html,
            closeButton: false,
            size: 'large',
            buttons: {
                cancel: {
                    label: ' Cancel',
                    className: 'btn btn-sm btn-secondary',
                },
                yes: {
                    label: ' Send',
                    className: 'btn btn-sm btn-success',
                    callback: function() {
                        var newsletterSubject = $(this).find("#mailSubject").val();
                        var newsletterBody = $(this).find("#newsLetterSection").summernote('code');
                        if (newsletterSubject == '') {
                            bootbox.alert('Please enter a subject');
                            return false;
                        }
                        if (newsletterBody == '') {
                            bootbox.alert('Please enter a message before send');
                            return false;
                        }
                        bootbox.dialog({
                            message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Loading...</div>',
                            closeButton: false
                        });
                        $.ajax({
                            url: baseUrl + 'admin/send-newsletter',
                            type: 'POST',
                            data: {
                                subject: newsletterSubject,
                                message: newsletterBody,
                            },
                            dataType: 'json',
                            success: function() {
                                bootbox.alert(response.message, function() {
                                    bootbox.hideAll();
                                })
                            }
                        })
                    }
                }
            }
        });
        dialog.init(function() {
            $(dialog).find('#newsLetterSection').summernote();
            $('.dropdown-toggle').dropdown();
        });
    });
})