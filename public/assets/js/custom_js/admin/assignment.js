$(document).ready(function() {
    if (pageType == 'assignment_level_list') {
        loadAssignmentLevelTable();
    } else if (pageType == 'assignment_list') {
        loadAssignmentListTable();
    }

    function loadAssignmentLevelTable() {
        $("#ass_sub_table").DataTable({
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
                [0, "desc"],
            ],
            "columnDefs": [{
                "targets": [0, 1],
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
                "url": baseUrl + 'admin/fetch-assignment-level-list',
            },
            drawCallback: function(settings, json) {
                $(".assignmentViewBtn").on('click', function() {
                    var level_id = $(this).data('level-id');
                    var url = baseUrl + 'admin/assignment-list/' + level_id;
                    window.open(url);
                });
            }
        });
    }

    function loadAssignmentListTable() {
        var level_id = $("#level_id").val();
        $("#assignment_table").DataTable({
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
                [11, "asc"],
                [10, "desc"],
            ],
            "columnDefs": [{
                "targets": [7, 9],
                "className": "text-center",
                "orderable": false,
            },{
                "targets": 11,
                "visible": false,
                }],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-assignment-list',
                data: {
                    level_id: level_id,
                }
            },
            drawCallback: function(settings, json) {
                $(".submitCheckFile").on('click', function () {
                    var assignment_id = $(this).data("assignment-id");
                    var recheckSubmitted_file_path = $(".assignment_file_check_file" + assignment_id + "").val();
                    var recheckSubmitted_file = $(".assignment_file_check_file" + assignment_id + "").prop('files')[0];
                    if (recheckSubmitted_file_path == '') {
                        bootbox.alert({ message: "Please select a file to upload", closeButton: false, });
                        return false;
                    }
                    let dialog = bootbox.dialog({
                        message: 'Are you sure, you want to upload the re-check assignment',
                        closeButton: false,
                        buttons: {
                            no: {
                                label: 'No',
                                className: 'btn-secondary',
                                callback: function () {

                                }
                            },
                            yes: {
                                label: 'Yes',
                                className: 'btn-success',
                                callback: function () {
                                    uploadAssignmntFile(assignment_id, recheckSubmitted_file);
                                }
                            },
                        }
                    })
                });
            }
        });
    }

    $(".downloadRecheckCSVBtn").on('click', function () {
        var onlyChecked = $("#onlyCheck").is(':checked');
        onlyChecked = onlyChecked ? 1 : 0;
        var dataTableSearch = $(".dataTables_filter").find('input').val();
        var level_id = $("#level_id").val();
        var url = baseUrl + 'admin/upload-recheck/export?onlyChecked=' + onlyChecked + '&level_id=' + level_id + '&dataTableSearch=' + dataTableSearch;
        window.open(url, '_blank');
    });

    function uploadAssignmntFile(assignment_id, recheckSubmitted_file) {
        var formdata = new FormData();
        formdata.append('assignment_id', assignment_id);
        formdata.append('recheckSubmitted_file', recheckSubmitted_file);
        $.ajax({
            url: baseUrl + 'admin/upload-rechek/papers',
            type: 'POST',
            data: formdata,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                bootbox.alert({
                    message: response.message,
                    closeButton: false,
                    callback: function () {
                        if (response.success) {
                            loadAssignmentListTable();
                        }
                    }
                })
            }

        })
    }

})