$(document).ready(function() {
    cartHTML();

    function cartHTML(cartData = []) {
        if (cartData.length > 0) {
            var html = '<div class="cart-modal-content">';
            html += '<table class="table table-striped table-hover mb-3">';
            html += '<thead class="table-success"><tr><th>Item</th><th>Price</th><th></th></tr></thead>';
            html += '<tbody>';
            var totalPrice = 0;
            var discountPercent = 0;
            var discount_type = '';
            $.each(cartData, function(i, v) {
                totalPrice = Number(totalPrice.toFixed(2)) + Number(v.offer_price);
                html += '<tr>' +
                    '<td>' +
                    '<div class="fw-bold">' + v.subject_name + '</div>' +
                    '<small class="text-muted">' + v.level_name + '</small><br>' +
                    '<small class="text-muted">Type: ' + v.type_name + '</small>' +
                    '</td>' +
                    '<td class="align-middle fw-bold">&#x20B9; ' + v.offer_price + '</td>' +
                    '<td class="align-middle text-center">' +
                    '<a href="javascript:void(0)" class="removeCartItems text-danger" data-cart-item-id="' + v.cart_items_id + '"><i class="bi bi-x-circle-fill" style="font-size:18px;"></i></a>' +
                    '</td>' +
                    '</tr>';
                discountPercent = v.discount;
                discount_type = v.discount_type;
            });
            html += '</tbody></table>';
            
            var totalPriceDeciaml = (totalPrice.toFixed(2));
            if (discount_type == 'percent') {
                var discountAmount = (((totalPrice * discountPercent) / 100).toFixed(2));
                var sign = ' % ';
            } else {
                var discountAmount = (discountPercent);
                var sign = ' &#8377; ';
            }
            var payableAmount = ((totalPrice - discountAmount).toFixed(2));
            
            html += '<div class="promocode-section">';
            html += '<div class="input-group mb-2">';
            html += '<input type="text" class="form-control" placeholder="Enter Promocode" id="code_name">';
            html += '<button class="btn btn-outline-success applyPromocodeBtn" type="button">Apply</button>';
            html += '</div>';
            html += '<div class="text-danger promocodeError small mb-2"></div>';
            html += '</div>';
            
            html += '<div class="cart-summary bg-light p-3 rounded">';
            html += '<div class="d-flex justify-content-between mb-1"><span>Subtotal</span><span class="fw-bold">&#x20B9; ' + totalPriceDeciaml + '</span></div>';
            if (discountPercent != '0') {
                html += '<div class="d-flex justify-content-between mb-1 text-success"><span>Discount <small>(' + discountPercent + sign + ')</small></span><span>-&#x20B9; ' + discountAmount + ' <i class="fas fa-times-circle removePromoCode" style="cursor:pointer;margin-left:5px;"></i></span></div>';
            }
            html += '<hr class="my-2">';
            html += '<div class="d-flex justify-content-between fw-bold fs-5"><span>Payable</span><span>&#x20B9; ' + payableAmount + '</span></div>';
            html += '</div>';
            html += '</div>';
            
            html += '<input type="hidden" id="totalPriceDeciaml" name="totalPriceDeciaml" value="' + totalPriceDeciaml + '">';
            html += '<input type="hidden" id="payableAmount" value="' + payableAmount + '">';
        } else {
            html = '<div class="empty-cart text-center py-5">' +
                   '<i class="fas fa-shopping-cart text-muted mb-3" style="font-size: 48px;"></i>' +
                   '<h5 class="text-muted">Your cart is empty</h5>' +
                   '<p class="text-muted small">Add some items to get started</p>' +
                   '</div>';
        }
        $(".cartPopUpContainer").html(html);
    }

    $(".showCartBtn").on('click', function() {
        showCartItems();
    });

    function showCartItems() {
        $.ajax({
            url: baseUrl + 'fetch-active-cartitems',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    cartHTML(response.cartData);
                    $(".cartCount").html(response.cartData.length);
                    
                    var hasItems = response.cartData.length > 0;
                    var buttonConfig = {};
                    
                    if (hasItems) {
                        buttonConfig = {
                            checkout: {
                                label: '<i class="fas fa-credit-card"></i> Checkout',
                                className: 'btn-success checkoutBtn',
                                callback: function() {
                                    var totalPayablePrice = $('#payableAmount').val();
                                    if (totalPayablePrice == '0.00') {
                                        $.ajax({
                                            url: baseUrl + '/payment/free-payable-product',
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(resp) {
                                                if (resp.success) {
                                                    window.open(resp.url, '_self');
                                                } else {
                                                    bootbox.alert(resp.message);
                                                }
                                            }
                                        });
                                    } else {
                                        $.ajax({
                                            url: baseUrl + 'checkout-phone-pe-cart-items',
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(resp) {
                                                if (resp.success) {
                                                    if (paymentGateway == 'CASHFREE') {
                                                        const cashfree = Cashfree({
                                                            mode: "production"
                                                        });
                                                        let checkoutOptions = {
                                                            paymentSessionId: resp.payment_session_id,
                                                            redirectTarget: "_self"
                                                        }
                                                        cashfree.checkout(checkoutOptions);
                                                    } else if (paymentGateway == 'PHONEPE') {
                                                        window.open(resp.url, '_self');
                                                    }
                                                } else {
                                                    bootbox.alert({
                                                        message: resp.message,
                                                        closeButton: false,
                                                    });
                                                }
                                            }
                                        });
                                    }
                                }
                            }
                        };
                    }
                    
                    var dialog = bootbox.dialog({
                        title: hasItems ? '<i class="fas fa-shopping-cart mr-2"></i>Your Cart (' + response.cartData.length + ' items)' : 'Your Cart',
                        message: $('.cartPopUpContainer').clone(),
                        buttons: buttonConfig,
                        onEscape: true,
                    });
                    
                    dialog.init(function() {
                        if (hasItems) {
                            $(dialog).find('.checkoutBtn').hide();
                        }
                        
                        setInterval(function() {
                            var currentHtml = $('.cartPopUpContainer').html();
                            var isEmpty = currentHtml.indexOf('empty-cart') > -1;
                            if (!isEmpty) {
                                $(dialog).find('.checkoutBtn').show();
                            } else {
                                $(dialog).find('.checkoutBtn').hide();
                            }
                        }, 500);
                        
                        $(dialog).find('.cartPopUpContainer').on('click', '.removeCartItems', function(e) {
                            e.preventDefault();
                            var cart_items_id = $(this).data('cart-item-id');
                            removeCartItems(cart_items_id);
                        });
                        
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
                                success: function(resp) {
                                    if (resp.success == false) {
                                        $(dialog).find('.promocodeContainer').css('border', '1px solid red');
                                        $(dialog).find('.promocodeError').html(resp.message);
                                        setTimeout(function() {
                                            $(dialog).find('.promocodeContainer').css('border', 'transparent');
                                            $(dialog).find('.promocodeError').html('');
                                        }, 4000);
                                    } else {
                                        fetchCartItems();
                                    }
                                }
                            });
                        });
                        
                        $(dialog).find(".cartPopUpContainer").on('click', '.removePromoCode', function() {
                            bootbox.dialog({
                                message: 'Are you sure you want to remove the promocode?',
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
                                                success: function(resp) {
                                                    bootbox.alert({
                                                        message: resp.message,
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
                            });
                        });
                    });
                } else {
                    bootbox.alert({
                        message: 'Failed to load cart items. Please try again.',
                        closeButton: false,
                    });
                }
            },
            error: function() {
                bootbox.alert({
                    message: 'Error loading cart. Please refresh the page.',
                    closeButton: false,
                });
            }
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
