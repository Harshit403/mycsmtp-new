$(document).ready(function() {

    $("#level_id").on('change', function() {
        var level_id = $(this).val();
        fetchTypeList(level_id);
    })

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
                var html = '<option value="">All Types</option>';
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
        })
    }

    $("#type_id").on('change', function() {
        var type_id = $(this).val();
        fetchSubjectList(type_id);
    })

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
                var html = '<option value="">All Subjects</option>';
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
});