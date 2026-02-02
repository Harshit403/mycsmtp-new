$(document).ready(function() {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    loadExaminarTable();
    function loadExaminarTable(){
        $("#examinar_table").DataTable({
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
                [0,"asc"],
            ],
            "scrollX": true,
            "autoWidth": false,
            "destroy":true,
            "processing":true,
            "serverSide":true,
            "serverMethod":'POST',
            "ajax":{
                "url":baseUrl+'admin/fetch-examinar-list',
            },
            drawCallback:function(settings, json){
                $(".editExaminar").on('click',function(){
                    var examinar_id = $(this).data('examinar-id');
                    var examinar_name = $(this).data('examinar-name');
                    var examinar_email = $(this).data('examinar-email');
                    var examinar_mobile_no = $(this).data('examinar-mobile-no');
                    addExaminar(examinar_id,examinar_name,examinar_email,examinar_mobile_no);
                });
                $(".flexSwitchCheckChecked").on('change',function(){
                    var examinar_id = $(this).data('examinar-id');
                    var changedStatus  = ($(this).is(':checked')==true) ? 1 : 0;
                    updateExaminarBlockStatus(examinar_id, changedStatus);
                });
            }
        });
    }

    function updateExaminarBlockStatus(examinar_id,changedStatus){
        $.ajax({
            url:baseUrl+'admin/examinar-status-change',
            type:'POST',
            data:{
                blocked:changedStatus,
                examinar_id:examinar_id,
            },
            dataType: 'json',
            success: function(response){
                bootbox.alert({
                    message:response.message,
                    callback:function(){
                        loadExaminarTable();
                    }
                })
            }
        })
    }

    $("#addExaminar").on('click',function(){
        addExaminar();
    });

    function addExaminar(examinar_id='',examinar_name='',examinar_email='',examinar_mobile_no=''){
        var html = $(".examinarAddContainer").clone();
        let dialog = bootbox.dialog({ 
            title: 'Add Examinar',
            message: html,
            size: 'medium',
            onEscape: true,
            backdrop: true,
            buttons: {
                cancel: {
                    label: 'Cancel',
                    className: 'btn-secondary btn-sm',
                    callback: function(){
                                        
                    }
                },
                add: {
                    label: 'Add',
                    className: 'btn-success btn-sm',
                    callback: function(){
                        var examinarFormDetails = $(this).find('#examinarAddForm').serializeArray();
                        var errors = new Array;
                        var formdata = new FormData();
                        $.each(examinarFormDetails, function(i,v){
                            formdata.append(v.name,$.trim(v.value));
                        });
                        formdata.append('examinar_id',examinar_id);
                        if(formdata.get('examinar_name')==''){
                            errors.push('Please enter the examinar name');
                        }
                        if(formdata.get('examinar_email')==''){
                            errors.push('Please enter the examinar email');
                        } else if(!emailReg.test(formdata.get('examinar_email'))){
                            errors.push('Please enter a valid email');
                        }
                        if(formdata.get('examinar_mobile_no')==''){
                            errors.push('Please enter the examinar mobile no.');
                        }
                        if(examinar_id==''){
                            if(formdata.get('examinar_password')==''){
                                errors.push('Please enter the examinar password');
                            }
                        }
                        if(errors.length > 0){
                            bootbox.alert({
                                message: errors.join('</br>'),
                            });
                            return false;
                        }
                        $.ajax({
                            url:baseUrl+'admin/add-examinar',
                            type:'POST',
                            data:formdata,
                            contentType:false,
                            processData:false,
                            dataType:'json',
                            success:function(response){
                                bootbox.alert({
                                    message:response.message,
                                    callback:function(){
                                        if(response.success){
                                            loadExaminarTable();
                                        }
                                    }
                                })
                            }
                        })
                    }
                },
            }
        });
        dialog.init(function(){
            $(dialog).find(".passwordIcon").on('click',function(){
                var passwordIconObject = $(dialog).find(".passwordIcon > i");
                var type = $(dialog).find("#examinar_password").attr('type');
                if(type=='password'){
                    var changeType = 'text';
                    passwordIconObject.addClass('fa-lock-open');
                } else {
                    passwordIconObject.removeClass('fa-lock-open');
                    var changeType = 'password';
                }
                $(dialog).find("#examinar_password").attr('type',changeType);
            });
            $(dialog).find("#examinar_name").val(examinar_name);
            $(dialog).find("#examinar_email").val(examinar_email);
            $(dialog).find("#examinar_mobile_no").val(examinar_mobile_no);
        });
    }
});