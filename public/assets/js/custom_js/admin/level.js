$(document).ready(function() {
    $("#addLevelBtn").on('click', function() {
        addLevel();
    });

    function addLevel(level_id = '') {
        var level_name = $.trim($("#level_name").val());
        var error = new Array;
        if (level_name == '') {
            error.push('Please enter a level name');
        }
        if (error.length > 0) {
            bootbox.alert({
                message: error.join('</br>'),
                closeButton: false,
            });
            return false;
        }
        var level_id = $("#level_id").val();
        $.ajax({
            url: baseUrl + 'admin/add-level',
            type: 'POST',
            data: {
                level_name: level_name,
                level_id: level_id,
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

    // load level table 
    loadLevelTable();

    function loadLevelTable() {
        $("#level_table").DataTable({
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
            }],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-level-list',
            },
            drawCallback: function(settings, json) {
                $(".editButton").on('click', function() {
                    var level_id = $(this).data('level-id');
                    var url = baseUrl + 'admin/add-level/' + level_id;
                    window.open(url, '_self');
                });
                $(".deleteButton").on('click', function() {
                    var level_id = $(this).data('level-id');
                    deleteLevel(level_id);
                })
            }
        });
    }

    function deleteLevel(level_id) {
        bootbox.dialog({
            message: 'Are you sure you want to delete the level?',
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
                            url: baseUrl + 'admin/delete-level',
                            type: 'POST',
                            data: {
                                level_id: level_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert({
                                    message: response.message,
                                    closeButton: false,
                                    callback: function() {
                                        if (response.success) {
                                            loadLevelTable();
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