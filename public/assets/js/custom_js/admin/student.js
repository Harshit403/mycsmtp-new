$(document).ready(function() {
    if (pageType == 'student_list') {
        loadStudentList();
    }

    function loadStudentList() {
        $("#studentListTable").DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "search_records",
            },
            "iDisplayLength": 10,
            "order": [
                [7, "desc"],
            ],
            'responsive': true,
            'scrollX': true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "columnDefs": [{
                targets: [6],
                orderable: false,
                className: 'text-center',
            }],
            "ajax": {
                "url": baseUrl + 'admin/fetch-student-list',
            },
            drawCallback: function(settings, json) {
                $(".flexSwitchCheckChecked").on('change', function() {
                    var student_id = $(this).data('student-id');
                    var blocked = $(this).is(':checked');
                    blocked = blocked == true ? 1 : 0;
                    $.ajax({
                        url: baseUrl + 'admin/change-block-status',
                        type: 'POST',
                        data: {
                            student_id: student_id,
                            blocked: blocked,
                        },
                        dataType: 'json',
                        success: function(response) {
                            bootbox.alert({
                                message: response.message,
                                closeButton: false,
                                callback: function() {
                                    if (response.success) {
                                        loadStudentList();
                                    }
                                }
                            })
                        }
                    })
                });

                $(".studentSubjectAccess").on('click', function() {
                    var student_id = $(this).data('student-id');
                    fetchSubjectStatus(student_id);
                });
            }
        });
    }

    function fetchSubjectStatus(student_id) {
        $.ajax({
            url: baseUrl + 'admin/subject-list',
            type: 'POST',
            data: {
                student_id: student_id,
            },
            dataType: 'json',
            success: function(response) {
                var html = '';
                var html1 = '';
                if (response.fetchSubjectListDetails.length > 0 || response.fetchPreviousSessionDetails.length > 0) {
                    var setArray = new Array;
                    $.each(response.fetchSubjectListDetails, function(i, v) {
                        if (v.active == '1') {
                            var check = 'checked';
                        } else {
                            var check = '';
                        }
                        html1 += '<div class="row border border-1 mb-2">' +
                            '<div class="col-md-8">' +
                            '<div><b>Level : </b>' + v.level_name + '</div>' +
                            '<div><b>Type : </b>' + v.type_name + '</div>' +
                            '<div><b>Subject : </b>' + v.subject_name + '</div>' +
                            '<div><b> Date of Purchase : </b>' + v.purchase_date + '</div>' +
                            '<div><b>Payment Mode : </b>' + v.payment_mode + '</div>' +
                            '<div><b>Amount Paid : </b>' + v.total_payment_amount + '</div>' +
                            '<div><b>Promocode Used : </b>' + v.promo_code_name + '</div>' +
                            '</div>' +
                            '<div class="col-md-4 text-right d-flex align-items-center justify-content-end">' +
                            '<div class="form-group">' +
                            '<div class="custom-control custom-switch">' +
                            '<input type="checkbox" class="custom-control-input activeToggleClass" id="activeBtn' + v.cart_items_id + '" ' + check + ' data-cart-items-id="' + v.cart_items_id + '">' +
                            '<label class="custom-control-label" for="activeBtn' + v.cart_items_id + '"></label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        setArray.push(v.purchase_date + '-' + v.subject_name);
                    });
                    if (response.fetchPreviousSessionDetails != '') {
                        $.each(response.fetchPreviousSessionDetails, function(j, k) {
                            var checkFormat = k.purchase_date + '-' + k.subject_name;
                            if ($.inArray(checkFormat, setArray) === -1) {
                                var total_payment_amount = k.offer_price;
                                var discountAmt = k.discount_amt != '' ? Number(k.discount_amt) : 0;
                                if (k.discount_type == 'percent') {
                                    total_payment_amount = (total_payment_amount - ((total_payment_amount * discountAmt) / 100));
                                } else {
                                    total_payment_amount = (total_payment_amount - discountAmt);
                                }
                                html += '<div class="row border border-1 mb-2">' +
                                    '<div class="col-md-8">' +
                                    '<div><b>Level : </b>' + k.level_name + '</div>' +
                                    '<div><b>Type : </b>' + k.type_name + '</div>' +
                                    '<div><b>Subject : </b>' + k.subject_name + '</div>' +
                                    '<div><b> Date of Purchase : </b>' + k.purchase_date + '</div>' +
                                    '<div><b>Payment Mode : </b>' + k.payment_mode + '</div>' +
                                    '<div><b>Amount Paid : </b>' + total_payment_amount + '</div>' +
                                    '<div><b>Promocode Used : </b>' + k.promo_code + '</div>' +
                                    '</div>' +
                                    '</div>';
                            }
                        })
                    }
                    let dialog = bootbox.dialog({
                        title: 'Set Visibility',
                        message: '<div style="max-height:400px;overflow-y: scroll;overflow-x:hidden;">' + html + html1 + '</div>',
                        closeButton: false,
                        buttons: {
                            update: {
                                label: 'Ok',
                                className: 'btn-info',
                            }
                        }
                    });
                    dialog.init(function() {
                        $(dialog).find(".activeToggleClass").on('change', function() {
                            var status = $(this).is(":checked");
                            var cart_items_id = $(this).data("cart-items-id");
                            $.ajax({
                                url: baseUrl + 'admin/change-subject-visibility',
                                type: 'POST',
                                data: {
                                    active: (status == true ? '1' : '0'),
                                    cart_items_id: cart_items_id,
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if (data.success) {
                                        bootbox.hideAll();
                                        fetchSubjectStatus(student_id);
                                    }
                                }
                            })
                        })
                    });
                } else {
                    bootbox.alert({
                        message: "No subject is available",
                        closeButton: false,
                    });
                }
            }
        })

    }

    $("#exportStudentDetails").on('click', function() {
        var searchData = $('.dataTables_filter input').val();
        var url = baseUrl + '/admin/student-export?Search=' + searchData;
        window.open(url, '_blank');
    })
})