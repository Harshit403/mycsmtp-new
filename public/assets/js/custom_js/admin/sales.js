$(document).ready(function() {
    $(".getSalesBtn").on('click', function() {
        var level_id = $("#level_id").val();
        var type_id = $("#type_id").val();
        var subject_id = $("#subject_id").val();
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        $.ajax({
            url: baseUrl + 'admin/get-sales',
            type: 'POST',
            data: {
                level_id: level_id,
                type_id: type_id,
                subject_id: subject_id,
                from_date: from_date,
                to_date: to_date,
            },
            dataType: 'json',
            success: function(response) {
                var html = '';
                if (response !== null) {
                    var total_sales_amt = 0;
                    $.each(response.fetchSalesInfo, function(i, v) {
                        var salesAmt = 0;
                        var discount_type = v.discount_type;
                        var discount_amt = v.discount_amt;
                        var offer_price = v.offer_price;
                        if (discount_type == 'percent') {
                            salesAmt = offer_price - (offer_price * (discount_amt / 100));
                        } else if (discount_type == 'amount') {
                            salesAmt = offer_price - discount_amt;
                        }
                        total_sales_amt = Number(salesAmt) + Number(total_sales_amt);
                        html += '<tr>' +
                            '<td>' + v.date_of_enrollment + '</td>' +
                            '<td>' + v.student_name + '</td>' +
                            '<td>' + v.link_id + '</td>' +
                            '<td>' + v.subject_name + '</td>' +
                            '<td>' + v.level_name + '</td>' +
                            '<td>' + v.type_name + '</td>' +
                            '<td>' + v.offer_price + '</td>' +
                            '<td>' + v.promo_code + '</td>' +
                            '<td>' + v.payment_mode + '</td>' +
                            '<td>' + salesAmt + '</td>' +
                            '<td>' + v.purchase_date + '</td>';
                        html += '</tr>';
                    });
                    $("#sales_body").html(html);
                    $("#total_sales_amt").html('&#8377; ' + total_sales_amt.toFixed(2));
                }
            }
        });
    });

    $("#level_id").on('change', function() {
        var level_id = $(this).val();
        var sales_info = JSON.parse($.trim($(".salesInfo").text()));
        var html = '';
        var typeArray = new Array;
        $.each(sales_info, function(i, v) {
            if (v.level_id == level_id) {
                if ($.inArray(v.type_id, typeArray) === -1) {
                    html += '<option value="' + v.type_id + '">' + v.type_name + '</option>';
                    typeArray.push(v.type_id);
                }
            }
        });
        $("#type_id").append(html);
    });
    $("#type_id").on('change', function() {
        var type_id = $(this).val();
        var sales_info = JSON.parse($.trim($(".salesInfo").text()));
        var html = '';
        var subjectArray = new Array;
        $.each(sales_info, function(i, v) {
            if (v.type_id == type_id) {
                if ($.inArray(v.subject_id, subjectArray) === -1) {
                    html += '<option value="' + v.subject_id + '">' + v.subject_name + '</option>';
                    subjectArray.push(v.subject_id);
                }
            }
        });
        $("#subject_id").append(html);
    })

});