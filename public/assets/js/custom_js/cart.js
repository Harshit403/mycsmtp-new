$(document).ready(function() {
    cartHTML();

    function cartHTML(cartData = []) {
        if (cartData.length > 0) {
            var html = '<table class="table table-light table-striped table-hover">';
            var totalPrice = 0;
            var discountPercent = 0;
            var discount_type = '';
            $.each(cartData, function(i, v) {
                totalPrice = Number(totalPrice.toFixed(2)) + Number(v.offer_price);
                html += '<tr>' +
                    '<td>' +
                    '<div class="font-weight-bold"> ' + v.subject_name + '</div>' +
                    '<div>' + v.level_name + ' </div>' +
                    '<div> Test Series Type :' + v.type_name + '</div>' +
                    '</td>' +
                    '<td style="vertical-align:middle; font-weight:bold">&#x20B9; ' + v.offer_price + '</td>' +
                    '<td style="vertical-align:middle; font-weight:bold">' +
                    '<a href="javascript:void(0)" class="removeCartItems btn" data-cart-item-id="' + v.cart_items_id + '"><i class="bi bi-x-circle-fill text-danger" style="font-size:16px;"></i></a>' +
                    '</td>' +
                    '</tr>';
                discountPercent = v.discount;
                discount_type = v.discount_type;
            });
            var totalPriceDeciaml = (totalPrice.toFixed(2));
            if (discount_type == 'percent') {
                var discountAmount = (((totalPrice * discountPercent) / 100).toFixed(2));
                var sign = ' % ';
            } else {
                var discountAmount = (discountPercent);
                var sign = ' &#8377 ';
            }
            var payableAmount = ((totalPrice - discountAmount).toFixed(2));
            html += '</table>';
            html += '<div class="input-group mb-1 w-50 ml-auto promocodeContainer">' +
                '<input type="text" class="form-control" placeholder="Enter Promocode" aria-label="Enter Promocode" aria-describedby="applyPromocodeBtn" id="code_name">' +
                '<a herf="javascript:void(0)" class="btn btn-success applyPromocodeBtn">Apply</a>' +
                '</div>';
            html += '<div class="text-danger promocodeError text-right mb-2"></div>';
            html += '<div class="text-right">' +
                '<div class="row">' +
                '<div class="col-md-9 font-weight-bold">Subtotal</div>' +
                '<div class="col-md-3">&#x20B9; ' + totalPriceDeciaml + '</div>' +
                '</div>';
            if (discountPercent != '0') {
                html += '<div class="row">' +
                    '<div class="col-md-9 font-weight-bold">Discount<span class="text-success"> (' + discountPercent + sign + 'discount) </span></div>' +
                    '<div class="col-md-3 d-flex align-items-center justify-content-end">&#x20B9;' + discountAmount + '<i class="fas fa-times-circle text-danger removePromoCode" style="margin-left:0.25rem;cursor:pointer;"></i></div>' +
                    '</div>';
            }
            html += '<div class="row">' +
                '<div class="col-md-9 font-weight-bold">Payable Amount</div>' +
                '<div class="col-md-3">&#x20B9; ' + payableAmount + '</div>' +
                '</div>' +
                '</div>';
            html += '<input type="hidden" id="totalPriceDeciaml" name="totalPriceDeciaml" value="' + totalPriceDeciaml + '">';
            html += '<input type="hidden" id="payableAmount" value="' + payableAmount + '">';
        } else {
            html = '<div class="d-flex align items-center justify-content-center h2">No items in Cart</div>';
        }
        $(".cartPopUpContainer").html(html);
    }

    $(".showCartBtn").on('click', function() {
        showCartItems();
    });



    function showCartItems(displayButton = 'disabled') {
        fetchCartItems();
        var html = $('.cartPopUpContainer').clone();

        var dialog = bootbox.dialog({
            title: 'Checkout',
            message: html,
            buttons: {
                yes: {
                    label: '<i class="fas fa-money-bill-wave-alt"></i> Checkout',
                    className: 'btn-success checkoutBtn',
                    callback: function() {
                        var totalPayablePrice = $(this).find('#payableAmount').val();
                        if (totalPayablePrice == '0.00') {
                            $.ajax({
                                url: baseUrl + '/payment/free-payable-product',
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success) {
                                        var url = response.url;
                                        window.open(url, '_self');
                                    } else {
                                        bootbox.alert(response.message);
                                    }
                                }
                            });
                        } else {
                            // var url = baseUrl + 'cart-payment';
                            // window.open(url, '_self');
                            $.ajax({
                                url: baseUrl + 'checkout-phone-pe-cart-items',
                                type: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success) {
                                        if (paymentGateway == 'CASHFREE') {
                                            const cashfree = Cashfree({
                                                // mode: "sandbox" //or production
                                                mode: "production" //or production
                                            });
                                            let checkoutOptions = {
                                                paymentSessionId: response.payment_session_id,
                                                redirectTarget: "_self" //optional (_self or _blank)
                                            }

                                            cashfree.checkout(checkoutOptions);
                                        } else if (paymentGateway == 'PHONEPE') {} {
                                            window.open(response.url, '_self');
                                        }
                                    } else {
                                        bootbox.alert({
                                            message: response.message,
                                            closeButton: false,
                                        });
                                    }
                                }
                            });
                        }
                    }
                },
            },
        });
        dialog.init(function() {
            $(dialog).find('.checkoutBtn').hide();
            $(dialog).find('.cartPopUpContainer').on('click', '.removeCartItems', function() {
                var cart_items_id = $(this).data('cart-item-id');
                removeCartItems(cart_items_id);
            });
            setInterval(function() {
                var htmlVal = $('.cartPopUpContainer').html();
                displayButton = (htmlVal == '<div class="d-flex align items-center justify-content-center h2">No items in Cart</div>') ? false : true;
                if (!displayButton) {
                    $(dialog).find('.checkoutBtn').hide();
                } else {
                    $(dialog).find('.checkoutBtn').show();
                }
            }, 800);
            $(dialog).find('.cartPopUpContainer').on('click', '.applyPromocodeBtn', function() {
                var code_name = $(dialog).find('#code_name').val();
                var totalPriceDeciaml = $(dialog).find("#totalPriceDeciaml").val();
                $.ajax({
                    url: baseUrl + 'apply-promocode',
                    type: 'POST',
                    data: {
                        code_name: $.trim(code_name),
                        totalPriceDeciaml: totalPriceDeciaml,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == false) {
                            $(dialog).find('.promocodeContainer').css('border', '1px solid red');
                            $(dialog).find('.promocodeError').html(response.message);
                            setTimeout(function() {
                                $(dialog).find('.promocodeContainer').css('border', 'transparent');
                                $(dialog).find('.promocodeError').html('');
                            }, 4000);
                        } else {
                            fetchCartItems();
                        }
                    }
                })
            });
            $(dialog).find(".cartPopUpContainer").on('click', '.removePromoCode', function() {
                bootbox.dialog({
                    message: 'Are you sure you want to remove the promocode ?',
                    closeButton: false,
                    size: 'small',
                    buttons: {
                        cancel: {
                            label: ' Cancel',
                            className: 'btn-sm btn-secondary',
                        },
                        yes: {
                            label: 'Yes',
                            className: 'btn-sm btn-success',
                            callback: function() {
                                $.ajax({
                                    url: baseUrl + 'promo/remove-promocode',
                                    type: 'POST',
                                    dataType: 'json',
                                    success: function(response) {
                                        bootbox.alert({
                                            message: response.message,
                                            closeButton: false,
                                            callback: function() {
                                                fetchCartItems();
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    }
                })

            });
        });
    }

    function fetchCartItems() {
        $.ajax({
            url: baseUrl + 'fetch-active-cartitems',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    cartHTML(response.cartData);
                    $(".cartCount").html(response.cartData.length);
                }
            }
        })
    }

    function removeCartItems(cart_items_id = '') {
        $.ajax({
            url: baseUrl + 'remove-cart-items',
            type: 'POST',
            data: {
                cart_items_id: cart_items_id,
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    fetchCartItems();
                }
            }
        });
    }

    function checkoutProducts() {
        $.ajax({
            url: baseUrl + 'checkout-cart-items',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var url = response.url;
                    window.open(url, '_self');
                }
            }
        });
    }

    $(".payInstamojoBtn").on('click', function() {
        checkoutProducts();
    });

    $(".payManualScanBtn").on('click', function() {
        $.ajax({
            url: baseUrl + 'fetch-active-cartitems',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    loadPaymentPopUP(response.cartData);
                }
            }
        })
    });

    function loadPaymentPopUP(cartData) {
        var order_id = '#ORDER' + $.trim($("#order_date").val());
        var admin_upi_id = $("#admin_upi_id").val();
        var admin_upi_ac_name = $("#admin_upi_ac_name").val();
        var totalPayablePrice = 0;
        $.each(cartData, function(i, v) {
            var offer_price = Number(v.offer_price);
            var discounted_price = 0;
            if (v.discount_type == 'percent') {
                discounted_price = offer_price - (offer_price * v.discount / 100);
            } else {
                discounted_price = offer_price - (v.discount);
            }
            totalPayablePrice = Number(totalPayablePrice) + Number(discounted_price);
        });
        var html = '<div class="row">' +
            '<div class="col-md-12 text-center">' +
            '<h4>Order Id : ' + order_id + '</h4>' +
            '<h4>Payable Amount : &#8377;' + totalPayablePrice + '</h4>' +
            '</div>' +
            '<div class="col-md-12 d-flex justify-content-center">' +
            '<img src=' + baseUrl + 'images/upi_payment_qr.png height="200px" width="200px">' +
            '</div>' +
            '<div class="col-md-12 text-center text-dark font-weight-bold">Scan This QR code </br>or</div>' +
            '<div class="col-md-12 text-center" style="font-size:17px !important">' +
            '<a href="upi://pay?pa=' + admin_upi_id + '&pn=' + admin_upi_ac_name + '&am=' + totalPayablePrice + '&cu=INR" style="color:#000 !important;font-weight:bold !important" class="btn btn-sm btn-primary"><font class="text-white">Pay Using UPI App</font></a>' +
            // ' <a href="javascript:void(0)" id="copy_upi" title="Click to Copy" style="color:#000 !important;font-weight:bold !important;"><i class="fas fa-copy fa-fw"></i></a>'+
            '</div>' +
            '<div class="col-md-12">' +
            '<label>UPI Id</label>' +
            '<input type="text" class="form-control form-control-sm" id="upi_id" placeholder="example@upihandle">' +
            '</div>' +
            '<div class="col-md-12">' +
            '<label>Transaction Id</label>' +
            '<input type="text" class="form-control form-control-sm" id="txn_id" placeholder="Please enter transaction Id">' +
            '</div>' +
            '<div class="col-md-12">' +
            '<label>Payable Amount</label>' +
            '<input type="number" class="form-control form-control-sm " id="payable_amount" value="' + totalPayablePrice + '" disabled>' +
            '</div>' +
            '</div>';
        let dialog = bootbox.dialog({
            title: 'Manual Payment Request',
            message: html,
            buttons: {
                submit: {
                    label: "Submit",
                    className: 'btn-success',
                    callback: function() {
                        var upi_id = $.trim($(this).find('#upi_id').val());
                        var txn_id = $.trim($(this).find('#txn_id').val());
                        var payable_amount = $.trim($(this).find('#payable_amount').val());
                        var formdata = new FormData();
                        var errors = new Array;
                        if (upi_id == '') {
                            errors.push('Please enter the upi id');
                        } else {
                            var pattern = /^[\w.-]+@[\w.-]+$/;
                            if (!pattern.test(upi_id)) {
                                errors.push('Please enter the valid upi id');
                            }
                        }
                        if (txn_id == '') {
                            errors.push('Please enter the txn id');
                        }
                        if (payable_amount == '') {
                            errors.push('Please enter the amount');
                        }
                        if (errors.length > 0) {
                            bootbox.alert({
                                message: errors.join('</br>'),
                            });
                            return false;
                        }
                        formdata.append('order_id', order_id);
                        formdata.append('upi_id', upi_id);
                        formdata.append('txn_id', txn_id);
                        formdata.append('payable_amount', payable_amount);
                        $.ajax({
                            url: baseUrl + 'cart-payment/manual',
                            type: 'POST',
                            data: formdata,
                            processData: false,
                            contentType: false,
                            dataType: 'json',
                            success: function(response) {
                                bootbox.alert({
                                    message: response.message,
                                    callback: function() {
                                        if (response.success) {
                                            window.location.href = baseUrl + 'dashboard';
                                        }
                                    }
                                });
                            }
                        })
                    }
                },
            },
        });
        dialog.init(function() {
            $(dialog).find("#copy_upi").on('click', function() {
                copyToClipboard($("#admin_upi_id"));
            });
        });
    }

    function copyToClipboard(element) {
        navigator.clipboard.writeText(element.val());
        alert("Copied the upi Id: " + element.val());
    }

    $(".payPhonePeBtn").on('click', function() {
        $.ajax({
            url: baseUrl + 'checkout-phone-pe-cart-items',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.open(response.url, '_self');
                }
            }
        })
    });

});
