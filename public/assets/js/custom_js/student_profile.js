$(document).ready(function(){
    $(".updateProfileBtn").on('click',function(){
        var student_id = $(this).data('student-id');
        updateProfileDetails(student_id);
    });
    function updateProfileDetails(student_id='') {
        var formInfo = $("#profileForm").serializeArray();
        var formdata = new FormData();
        var errors = new Array;
        $.each(formInfo,function(i,v){
            formdata.append(v.name,$.trim(v.value));
        });
        if(formdata.get('student_name')==''){
            errors.push('Please enter student name');
        }
        if(formdata.get('email')==''){
            errors.push('Please enter email');
        }
        if(formdata.get('mobile_no')==''){
            errors.push('Please enter mobile no');
        } else if(formdata.get('mobile_no').length != 10){
            errors.push('Mobile No. should be 10 digits only');
        }
        if(formdata.get('city_name')==''){
            errors.push('Please enter city name');
        }
        if(formdata.get('state_name')==''){
            errors.push('Please enter state name');
        }
        if(errors.length > 0 ){
            bootbox.alert({
                message:errors.join('</br>'),
            });
            return false;
        }
        formdata.append('student_id',student_id);
        $.ajax({
            url:baseUrl+'update-profile',
            type:'POST',
            data:formdata,
            processData:false,
            contentType:false,
            dataType:'json',
            success:function(response){
                bootbox.alert(response.message);
            }
        })
    }

    $(".changePassBtn").on('click',function(){
        var student_id = $(this).data('student-id');
        updatePassword(student_id);
    });

    function updatePassword(student_id=''){
        var formInfo = $("#changePasswordForm").serializeArray();
        var formdata = new FormData();
        var errors = new Array;
        $.each(formInfo,function(i,v){
            formdata.append(v.name,$.trim(v.value));
        });
        formdata.append('student_id',student_id);
        if(formdata.get('old_pass')==''){
            errors.push('Please enter the Currnt password');
        }
        if(formdata.get('new_pass')==''){
            errors.push('Please enter the new password');
        }
        if(errors.length > 0){
            bootbox.alert({
                message:errors.join('</br>'),
            });
            return false;
        }
        $.ajax({
            url:baseUrl+'update/password',
            type:'POST',
            data:formdata,
            processData:false,
            contentType:false,
            dataType:'json',
            success:function(response){
                bootbox.alert(response.message);
            }
        })
    }
});