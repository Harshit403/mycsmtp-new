$(document).ready(function() {
    loadBlogTable();

    function loadBlogTable() {
        $("#blog_table").DataTable({
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
                "url": baseUrl + 'admin/fetch-blog-list',
            },
            drawCallback: function(settings, json) {
                $(".viewPreviewImg").on('click', function() {
                    var preview_image = $(this).data('blog-preview-image');
                    var message = 'No preview image available';
                    if (preview_image != '') {
                        message = '<img src="' + baseUrl + preview_image + '" style="height:200px; width:200px;">';
                    }
                    bootbox.alert({
                        message: message,
                    });
                });
                $(".flexSwitchCheckChecked").on('change', function() {
                    var is_checked = $(this).is(":checked");
                    var blog_id = $(this).data("blog-id");
                    changeStatusUpdate(is_checked, blog_id);
                });

                $(".blogDeleteBtn").on('click', function() {
                    var blog_id = $(this).data('blog-id');
                    bootbox.dialog({
                        message: 'Are you sure, you want to delete blog items ?',
                        closeButton: false,
                        buttons: {
                            cancel: {
                                label: ' Cancel',
                                className: 'btn btn-secondary',
                            },
                            yes: {
                                label: ' Yes',
                                className: 'btn btn-success',
                                callback: function() {
                                    $.ajax({
                                        url: baseUrl + 'admin/blog-list/delete',
                                        type: 'POST',
                                        data: {
                                            blog_id: blog_id
                                        },
                                        dataType: 'json',
                                        success: function (response) {
                                            loadBlogTable();
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

    $("#blog_body").summernote({
        height: 300,
        placeholder: 'type starting with : and any alphabet',
    });
    $('.dropdown-toggle').dropdown();

    $("#addBlogBtn").on('click', function() {
        var blog_id = $("#blog_id").val();
        var blog_heading = $.trim($("#blog_heading").val());
        var formdata = new FormData();
        if (blog_heading == '') {
            bootbox.alert({
                'message': 'Please enter the blog heading',
                'closeButton': false,
            });
            return false;
        } else {
            formdata.append('blog_heading', blog_heading);
        }
        var imagePath = $("#preview_image").val();
        var imageFile = '';
        if (imagePath != '') {
            imageFile = $("#preview_image").prop('files')[0];
            formdata.append('imageFile', imageFile);
        }
        var blog_body = $("#blog_body").summernote('code');
        if (blog_body == '') {
            bootbox.alert({
                'message': 'Please enter the blog text',
                'closeButton': false,
            });
            return false;
        }
        formdata.append('blog_text', blog_body);
        if (blog_id != '') {
            formdata.append('blog_id', blog_id);
        }
        $.ajax({
            url: baseUrl + 'admin/blog-list/add-details',
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
                            window.history.go('-1');
                        }
                    }
                })
            }
        });
    });

    function changeStatusUpdate(is_checked = '', blog_id = '') {
        var active_status = is_checked ? 1 : 0;
        bootbox.dialog({
            message: 'Are you sure, you want to change the status ?',
            closeButton: false,
            buttons: {
                cancel: {
                    label: ' Cancel',
                    className: 'btn btn-secondary',
                    callback: function() {
                        loadBlogTable();
                    }
                },
                yes: {
                    label: ' Yes',
                    className: 'btn btn-success',
                    callback: function() {
                        $.ajax({
                            url: baseUrl + 'admin/blog-list/changeStatus',
                            type: 'POST',
                            data: {
                                active: active_status,
                                blog_id: blog_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert({
                                    message: response.message,
                                    callback: function() {
                                        loadBlogTable();
                                    }
                                })
                            }
                        });
                    }
                }
            }
        });
    }
});