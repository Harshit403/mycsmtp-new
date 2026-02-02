$(document).ready(function() {
    $("#addPromocodeBtn").on('click', function() {
        addPromocode();
    });

    function addPromocode() {
        var code_id = $("#code_id").val();
        var formInfo = $("#promoCodeForm").serializeArray();
        var formdata = new FormData();
        var error = new Array;
        $.each(formInfo, function(i, v) {
            formdata.append(v.name, $.trim(v.value));
        });
        formdata.append('code_id', code_id);
        if (formdata.get('code_name') == '') {
            error.push('Please enter the promo code');
        }
        if (formdata.get('validity_date') == '') {
            error.push('Please set the validity date');
        }
        if (formdata.get('discount_amt') == '') {
            error.push('Please enter the discount amount');
        }
        if (formdata.get('min_cart_amt') == '') {
            error.push('Please enter the minimum cart amount');
        }
        if (formdata.get('discount_type') == 'amount' && (Number(formdata.get('discount_amt')) > Number(formdata.get('min_cart_amt')))) {
            error.push('Dicount amount should not be greater than the minimum cart amount');
        } else if (formdata.get('discount_type') == 'percent' && Number(formdata.get('discount_amt')) > 100) {
            error.push('Dicount percent should be maximum 100');
        }

        if (error.length > 0) {
            bootbox.alert({
                message: error.join('<br>'),
                closeButton: false,
            });
            return false;
        }
        $.ajax({
            url: baseUrl + 'admin/add-promocode',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function(response) {
                bootbox.alert({
                    message: response.message,
                    closeButton: false,
                    callback: function() {
                        if (response.success) {
                            window.location.reload();
                        }
                    }
                })
            }
        })
    }

    if (pageType == 'promocode_list') {
        loadPromocodeTable();
    }

    function loadPromocodeTable() {
        $("#promocode_table").DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100],
            ],
            "responsive": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "search_records",
            },
            "iDisplayLength": 10,
            "order": [
                [1, "desc"],
            ],
            "columnDefs": [{
                "targets": [0, 6],
                "orderable": false,
            }],
            "scrollX": true,
            "autoWidth": false,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "serverMethod": 'POST',
            "ajax": {
                "url": baseUrl + 'admin/fetch-prmocodes',
            },
            drawCallback: function(settings, json) {
                $(".editButton").on('click', function() {
                    var code_id = $(this).data('code-id');
                    var url = baseUrl + 'admin/add-promocode/' + code_id;
                    window.open(url, '_self');
                });

                $(".deleteButton").on('click', function() {
                    var code_id = $(this).data('code-id');
                    deletePromocode(code_id);
                })
            }
        });
    }

    function deletePromocode(code_id = '') {
        bootbox.dialog({
            message: 'Are you sure you want to delete promocode ?',
            closeButton: false,
            buttons: {
                no: {
                    label: 'No',
                    className: 'btn-secondary',
                },
                yes: {
                    label: 'Yes',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            url: baseUrl + 'admin/delete-promocode',
                            type: 'POST',
                            data: {
                                code_id: code_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                loadPromocodeTable();
                            }
                        })
                    }
                }
            }
        })
    }
})