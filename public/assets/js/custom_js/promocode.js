$(document).ready(function() {

    $("#addpromocodes").on('click', function(){
        addPromocode();
    });

    function addPromocode(code_id='',editArray=[]){
        var html = $(".promoCodeContainer").html();
        let dialog = bootbox.dialog({
            title: (code_id=='' ? 'Add ' : 'Edit ')+'Promocode',
            message: html,
            onEscape: true,
            backdrop: true,
            buttons: {
                no: {
                    label: 'Cancel',
                    className: 'btn-secondary',
                    callback: function(){
                                        
                    }
                },
                yes: {
                    label: (code_id=='' ? 'Add ' : 'Edit ')+'Promocode',
                    className: 'btn-success',
                    callback: function(){
                        var formValue = $(this).find("#promoCodeForm").serializeArray();
                        var errors = new Array;
                        if(formValue['code_name']==''){
                            errors.push('Please enter promo code name');
                        }
                        if(formValue['validity_date']==''){
                            errors.push('Please enter validity date');
                        }
                        if(formValue['discount_type']==''){
                            errors.push('Please select discount type');
                        }
                        if(formValue['discount_amt']==''){
                            errors.push('Please enter discount amount');
                        }
                        if(formValue['min_cart_amt']==''){
                            errors.push('Please enter min cart amount');
                        }
                        if(errors.length > 0){
                            bootbox.alert(errors.join('</br>'));
                            return false;
                        }
                        var formdata = new FormData();
                        $.each(formValue,function(i,v){
                            formdata.append(v.name,$.trim(v.value));
                        });
                        if(code_id!=''){
                            formdata.append('code_id',code_id);
                        }
                        $.ajax({
                            url:baseUrl+'admin/add-promo-codes',
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
                                            loadPromocodeTable();
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
            // if(editArray.length > 0){
                var formValue = $(this).find("#promoCodeForm").serializeArray();
                $.each(formValue,function(i,v){
                    $(dialog).find("#"+v.name+"").val(editArray[v.name]);
                }); 
            // }
        });
    }

    loadPromocodeTable();
    function loadPromocodeTable(){
        $("#promocode_table").DataTable({
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
                [0,"desc"],
            ],
            "scrollX": true,
            "autoWidth": false,
            "destroy":true,
            "processing":true,
            "serverSide":true,
            "serverMethod":'POST',
            "ajax":{
                "url":baseUrl+'admin/fetch-prmocodes',
            },
            drawCallback:function(settings, json){
                $(".editPromocode").on('click',function(){
                    var code_id = $(this).data('code-id');
                    var editArray = new Array;
                    editArray['code_name'] = $(this).data('code-name');
                    editArray['validity_date'] = $(this).data('code-validity');
                    editArray['discount_type'] = $(this).data('discount-type');
                    editArray['discount_amt'] = $(this).data('discount-amount');
                    editArray['min_cart_amt'] = $(this).data('min-cart-amount');
                    addPromocode(code_id,editArray);
                });
                $(".deletePromocode").on('click',function(){
                    var code_id = $(this).data('code-id');
                    deletePromocode(code_id);
                });
            }
        });
    }

    function deletePromocode(code_id){
        bootbox.dialog({ 
            title: 'Delete Promo Code',
            message: 'Are you sure, you want to delete the promocode ?',
            buttons: {
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
                        $.ajax({
                            url:baseUrl+'admin/delete-promo-code',
                            type:'POST',
                            data:{
                                code_id:code_id,
                            },
                            dataType:'json',
                            success:function(response){
                                bootbox.alert({
                                    message:response.message,
                                    callback:function(){
                                        if(response.success){
                                            loadPromocodeTable();
                                        }
                                    }
                                })
                            }
                        })
                    }
                },
            }
        });
    }
});