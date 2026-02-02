$(document).ready(function() {
    loadPendingPaymentTable();
    function loadPendingPaymentTable(){
        $("#pending_payment_table").DataTable({
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
                [6,"asc"],
            ],
            "scrollX": true,
            "autoWidth": false,
            "destroy":true,
            "processing":true,
            "serverSide":true,
            "serverMethod":'POST',
            "ajax":{
                "url":baseUrl+'admin/fetch-pending-payment',
            },
            drawCallback:function(settings, json){
                $(".authoriseBtn").on('click',function(){
                    var actionType = $.trim($(this).data('action-type'));
                    var manual_payment_id = $.trim($(this).data('manual-id'));
                    confirmManualPayment(manual_payment_id,actionType);
                })
            }
        });
    }
    function confirmManualPayment(manual_payment_id,actionType){
        var action_type = 0;
        if(actionType=='approve'){
            action_type = 1; 
        } else if(actionType=='reject'){
            action_type = 2; 
        }
        $.ajax({
            url:baseUrl + 'admin/verify-manual-payment',
            type:'POST',
            data:{
                manual_payment_id: manual_payment_id,
                actionType: action_type,
            },
            dataType:'json',
            success:function(response){
                bootbox.alert({
                    message:response.message,
                    callback: function(){ 
                        loadPendingPaymentTable();
                    }
                });
            }
        })
    }
});