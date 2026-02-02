$(document).ready(function () {
    $(document).ajaxStart(function () {
        $("#overlay").fadeIn(300);
    });
    $(document).ajaxStop(function () {
        setTimeout(function () {
            $("#overlay").fadeOut(300);
        }, 500);
    });
    getCartTotals();
    function getCartTotals() {
        $.ajax({
            url:baseUrl+'fetch-cart-qty',
            type:'GET',
            dataType: 'json',
            success: function(response){
                $(".cartCount").html(response.length);
            }
        });
    }

    $(".changePassword").on('click',function(){
        examinarChangePassword();
    });
    function examinarChangePassword(){
        var html = '<div class="row">'+
                        '<div class="col-md-12">'+
                            '<label>Current Password</label>'+
                            '<div class="input-group mb-3">'+
                                '<input type="password" class="form-control form-control-sm passwordInput" id="current_pass">'+
                                '<div class="input-group-append">'+
                                    '<span class="input-group-text lockIcon"><i class="fas fa-lock"></i></span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-12">'+
                            '<label>New Password</label>'+
                            '<div class="input-group mb-3">'+
                                '<input type="password" class="form-control form-control-sm passwordInput" id="new_pass">'+
                                '<div class="input-group-append">'+
                                    '<span class="input-group-text lockIcon"><i class="fas fa-lock"></i></span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-12">'+
                            '<label>Conform Password</label>'+
                            '<div class="input-group mb-3">'+
                                '<input type="password" class="form-control form-control-sm passwordInput" id="confirm_pass">'+
                                '<div class="input-group-append">'+
                                    '<span class="input-group-text lockIcon"><i class="fas fa-lock"></i></span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        let dialog = bootbox.dialog({
            'title':'Change Password',
            'message':html,
            'buttons': {
                cancel: {
                    label: 'Cancel',
                    className: 'btn-secondary btn-sm',
                    callback: function(){
                                        
                    }
                },
                change_pass: {
                    label: 'Change Password',
                    className: 'btn-success btn-sm',
                    callback: function(){
                        var current_password = $.trim($(this).find("#current_pass").val());            
                        var new_password = $.trim($(this).find("#new_pass").val());            
                        var confirm_password = $.trim($(this).find("#confirm_pass").val());
                        var errors = new Array;
                        if(current_password==''){
                        errors.push('Please enter the current password');
                        }
                        if(new_password==''){
                        errors.push('Please enter the new password');
                        }
                        if(confirm_password==''){
                        errors.push('Please enter the confirm password');
                        }  
                        if(new_password!=confirm_password){
                        errors.push('Password does not matched');
                        } 
                        if(errors.length>0){
                            bootbox.alert({
                                message:errors.join('</br>'),
                            });
                            return false;
                        }
                        $.ajax({
                            url:baseUrl+'examinar-change-password',
                            type:'POST',
                            dataType: 'json',
                            data:{
                                current_password:current_password,
                                new_password:new_password,
                            },
                            success:function(response){
                                bootbox.alert({
                                    message:response.message,
                                    callback:function(){
                                        if(response.success){
                                            window.localtion.reload();
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
            $(dialog).find(".lockIcon").click(function(){
                $(this).find('i').toggleClass('fa-lock fa-lock-open');
                var type = $(this).closest('.input-group').find('input').attr('type');
                if(type=='text'){
                    $(this).closest('.input-group').find('input').attr('type','password');
                } else {
                    $(this).closest('.input-group').find('input').attr('type','text');
                }
            });
        });
    }

    $(".btnNewsletter").on('click', function () {
        var email_id = $.trim($("#newsletter_email").val());
        $.ajax({
            url: baseUrl + 'newsletter/add-newsletter',
            type: 'POST',
            dataType: 'json',
            data: {
                newsletter_email: email_id,
            },
            success: function (response) {
                bootbox.alert({
                    message: response.message,
                    closeButton: false,
                });
                $("#newsletter_email").val('');
            }
        })
    });

});