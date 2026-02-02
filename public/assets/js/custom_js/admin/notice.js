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

    $("#addNoticeBtn").on('click', function() {
        addNotice();
    });

    function addNotice() {
        var notice_id = $("#notice_id").val();
        var notice_text = $.trim($("#notice_text").val());
        if (notice_text == '') {
            bootbox.alert({
                message: 'Please enter notice',
                closeButton: false,
            });
            return false;
        }
        $.ajax({
            url: baseUrl + 'admin/add-notice',
            type: 'POST',
            data: {
                notice_text: notice_text,
                notice_id: notice_id,
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

    loadNoticeTable();

    function loadNoticeTable() {
        $("#noticeListTable").DataTable({
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
                [2, "desc"],
            ],
            "columnDefs": [{
                "targets": [0, 3],
                "className": "text-center",
                "orderable": false,
            }, {
                "targets": 2,
                "visible": false,
            }],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-notice-list',
            },
            drawCallback: function(settings, json) {
                $(".editButton").on('click', function() {
                    var notice_id = $(this).data('notice-id');
                    var url = baseUrl + 'admin/add-notice/' + notice_id;
                    window.open(url, '_self');
                });
                $(".viewPreview").on('click', function() {
                    var notice_text = $(this).data('notice-text');
                    bootbox.alert({
                        message: notice_text,
                        closeButton: false,
                    });
                });
                $(".deleteButton").on('click', function() {
                    var notice_id = $(this).data('notice-id');
                    deleteNotice(notice_id);
                });
            }
        });
    }

    function deleteNotice(notice_id) {
        let dialog = bootbox.dialog({
            message: 'Are you sure you want to delete the notice ?',
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
                            url: baseUrl + 'admin/delete-notice',
                            type: 'POST',
                            data: {
                                notice_id: notice_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert({
                                    message: response.message,
                                    closeButton: false,
                                    callback: function() {
                                        if (response.success) {
                                            loadNoticeTable();
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