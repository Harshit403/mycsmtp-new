$(document).ready(function() {
    studentTable();
    function studentTable(){
        $("#studentListTable").DataTable({
            "pagingType":"full_numbers",
            "lengthMenu":[
                [10,25,50,100],
                [10,25,50,100],
            ],
            // "responsive":true,
            "language":{
                "search":"_INPUT_",
                "searchPlaceholder":"search_records",
            },
            "iDisplayLength":10,
            "order":[
                [6,"desc"],
            ],
            "scrollX": true,
            "sScrollXInner": "100%",
            "destroy":true,
            "processing":true,
            "serverSide":true,
            "serverMethod":'POST',
            "columnDefs":[{targets: [6], visible: false}],
            "ajax":{
                "url":baseUrl+'admin/student-details',
            },
            drawCallback:function(settings, json){
                $(".flexSwitchCheckChecked").on('change',function(){
                    var checked = $(this).is(":checked");
                    var student_id = $(this).data("student-id");
                    updateStudentStatus(checked, student_id);
                });
                $(".studentSubjectAccess").on('click',function(){
                    var student_id = $(this).data('student-id');
                    fetchSubjectStatus(student_id);
                });
            }
        });
    }

    function fetchSubjectStatus(student_id){
        $.ajax({
            url:baseUrl+'admin/subject-list',
            type:'POST',
            data:{
                student_id: student_id,
            },
            dataType:'json',
            success:function(response){
                var html = '';
                if(response.length > 0){
                    $.each(response,function(i,v){
                        if(v.active=='1'){
                            var check = 'checked';
                        } else {
                            var check = '';
                        }
                        html+='<div class="row border border-1 mb-2">'+
                                '<div class="col-md-8">'+
                                    '<div><b>Level : </b>'+v.level_name+'</div>'+
                                    '<div><b>Type : </b>'+v.type_name+'</div>'+
                                    '<div><b>Subject : </b>'+v.subject_name+'</div>'+
                                    '<div><b> Date of Purchase : </b>'+v.purchase_date+'</div>'+
                                    '<div><b>Payment Mode : </b>'+v.payment_mode+'</div>'+
                                    '<div><b>Amount Paid : </b>'+v.total_payment_amount+'</div>'+
                                    '<div><b>Promocode Used : </b>'+v.promo_code_name+'</div>'+
                                '</div>'+
                                '<div class="col-md-4 text-right d-flex align-items-center justify-content-end">'+
                                    '<div class="form-group">'+
                                        '<div class="custom-control custom-switch">'+
                                            '<input type="checkbox" class="custom-control-input activeToggleClass" id="activeBtn'+v.cart_items_id+'" '+check+' data-cart-items-id="'+v.cart_items_id+'">'+
                                            '<label class="custom-control-label" for="activeBtn'+v.cart_items_id+'"></label>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                    });
                    let dialog = bootbox.dialog({
                        title:'Set Visibility',
                        message:html,
                        buttons:{
                            update:{
                                label: 'Ok',
                                className: 'btn-info',
                            }
                        }
                    });
                    dialog.init(function(){
                        $(dialog).find(".activeToggleClass").on('change',function(){
                            var status = $(this).is(":checked");
                            var cart_items_id = $(this).data("cart-items-id");
                            $.ajax({
                                url:baseUrl+'admin/change-subject-visibility',
                                type:'POST',
                                data:{
                                    active:(status==true ? '1':'0'),
                                    cart_items_id: cart_items_id,
                                },
                                dataType:'json',
                                success:function(data){
                                    if(data.success){
                                        bootbox.hideAll();
                                        fetchSubjectStatus(student_id);
                                    }
                                }
                            })
                        })
                    });
                } else {
                    bootbox.alert("No subject is available");
                }
            }
        })
        
    }

    function updateStudentStatus(checked, student_id){
        var blockStatus = (checked) ? '1':'0';
        $.ajax({
            url:baseUrl+'admin/change/student-status',
            type:'POST',
            data:{
                'blocked': blockStatus,
                'student_id':student_id,
            },
            dataType: 'json',
            success:function(response){
                bootbox.alert({
                    'message': response.message,
                    callback: function(){
                        studentTable();
                    }
                })
            }
        })
    }

    $("#exportStudentDetails").on('click', function(){
        var searchData = $('.dataTables_filter input').val();
        var url = baseUrl+'/admin/student-export?Search='+searchData;
        window.open(url, '_blank');
    })
    
});