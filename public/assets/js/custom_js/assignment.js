$(document).ready(function() {
    loadAssignmentSubmittedPaper();
    function loadAssignmentSubmittedPaper(){
        var level_id = $("#level_id").val();
        var user_type = $("#user_type").val();
        $("#assignmentPaperTable").DataTable({
            "pagingType":"full_numbers",
            "lengthMenu":[
                [10,25,50,100],
                [10,25,50,100],
            ],
            "responsive":true,
            "language":{
                "search":"_INPUT_",
                "searchPlaceholder":"search_records",
            },
            "iDisplayLength":10,
            "order":[
                [10,"desc"],
            ],
            'responsive': true,
            'sScrollX': '100%',
            "destroy":true,
            "processing":true,
            "serverSide":true,
            "serverMethod":'POST',
            "ajax":{
                "url":baseUrl+'admin/fetch-assignments',
                'data':{
                    level_id:level_id
                }
            },
            'columnDefs':[
                {
                    targets:[3],
                    visible:(user_type=='admin') ? true : false,
                },
                {
                    targets:[7,9],
                    className:'text-center',
                    orderable:false,
                },
                {
                    targets:[10],
                    visible:false,
                }
            ],
            drawCallback:function(settings, json){
               $(".submitCheckFile").on('click',function(){
                    var assignment_id = $(this).data("assignment-id");
                    var recheckSubmitted_file_path = $(".assignment_file_check_file"+assignment_id+"").val();
                    var recheckSubmitted_file = $(".assignment_file_check_file"+assignment_id+"").prop('files')[0];
                    if(recheckSubmitted_file_path==''){
                        bootbox.alert("Please select a file to upload");
                        return false;
                    }
                    let dialog = bootbox.dialog({
                        message:'Are you sure, you want to upload the re-check assignment',
                        closeButton:false,
                        buttons:{
                            no: {
                                label: 'No',
                                className: 'btn-secondary',
                                callback: function(){
                                                    
                                }
                            },
                            yes: {
                                label: 'Yes',
                                className: 'btn-success',
                                callback: function(){
                                    uploadAssignmntFile(assignment_id,recheckSubmitted_file);           
                                }
                            },
                        }
                    })
               });
            }
        });
    }

    $(".downloadRecheckCSVBtn").on('click',function(){
        var onlyChecked = $("#onlyCheck").is(':checked');
        onlyChecked = onlyChecked ? 1 : 0;
        var dataTableSearch = $(".dataTables_filter").find('input').val();
        var level_id = $("#level_id").val();
        var url = baseUrl+'admin/upload-recheck/export?onlyChecked='+onlyChecked+'&level_id='+level_id+'&dataTableSearch='+dataTableSearch;
        window.open(url,'_blank');
    })

    function uploadAssignmntFile(assignment_id,recheckSubmitted_file){
        var formdata = new FormData();
        formdata.append('assignment_id',assignment_id);
        formdata.append('recheckSubmitted_file',recheckSubmitted_file);
        $.ajax({
            url:baseUrl+'admin/upload-rechek/papers',
            type:'POST',
            data:formdata,
            dataType:'json',
            processData:false,
            contentType:false,
            success:function(response){
                bootbox.alert({
                    message:response.message,
                    callback:function(){
                        if(response.success){
                            loadAssignmentSubmittedPaper();
                        }
                    }
                })
            }
            
        })
    }
    
});