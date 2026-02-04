$(document).ready(function() {
    
    // Remove cart item
    $(document).on('click', '.remove-cart-item', function() {
        var cartItemId = $(this).data('cart-item-id');
        var cartItem = $(this).closest('.cart-item');
        
        bootbox.confirm({
            title: 'Remove Item',
            message: 'Are you sure you want to remove this item from your cart?',
            buttons: {
                confirm: {
                    label: 'Yes, Remove',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-secondary'
                }
            },
            callback: function(result) {
                if (result) {
                    removeCartItem(cartItemId, cartItem);
                }
            }
        });
    });

    function removeCartItem(cartItemId, cartItemElement) {
        $.ajax({
            url: baseUrl + 'remove-cart-items',
            type: 'POST',
            data: {
                cart_items_id: cartItemId
            },
            dataType: 'json',
            beforeSend: function() {
                cartItemElement.css('opacity', '0.5');
            },
            success: function(response) {
                if (response.success) {
                    cartItemElement.slideUp(300, function() {
                        $(this).remove();
                        updateCartTotals();
                        
                        // Check if cart is empty
                        if ($('.cart-item').length === 0) {
                            location.reload(); // Reload to show empty cart state
                        }
                    });
                    
                    // Update cart count in navbar
                    var currentCount = parseInt($('.cartCount').text()) || 0;
                    if (currentCount > 0) {
                        $('.cartCount').text(currentCount - 1);
                    }
                } else {
                    cartItemElement.css('opacity', '1');
                    bootbox.alert({
                        message: response.message || 'Failed to remove item',
                        closeButton: false
                    });
                }
            },
            error: function() {
                cartItemElement.css('opacity', '1');
                bootbox.alert({
                    message: 'An error occurred. Please try again.',
                    closeButton: false
                });
            }
        });
    }

    // Apply promo code
    $('#applyPromoBtn').on('click', function() {
        var codeName = $('#promoCodeInput').val().trim();
        var totalPrice = parseFloat($('#cartTotalPrice').val()) || 0;
        
        if (!codeName) {
            showPromoError('Please enter a promo code');
            return;
        }
        
        applyPromoCode(codeName, totalPrice);
    });

    function applyPromoCode(codeName, totalPrice) {
        $.ajax({
            url: baseUrl + 'apply-promocode',
            type: 'POST',
            data: {
                code_name: codeName,
                totalPriceDeciaml: totalPrice
            },
            dataType: 'json',
            beforeSend: function() {
                $('#applyPromoBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                $('#applyPromoBtn').prop('disabled', false).text('Apply');
                
                if (response.success) {
                    location.reload(); // Reload to show updated totals and promo
                } else {
                    showPromoError(response.message || 'Invalid promo code');
                }
            },
            error: function() {
                $('#applyPromoBtn').prop('disabled', false).text('Apply');
                showPromoError('An error occurred. Please try again.');
            }
        });
    }

    function showPromoError(message) {
        $('#promoError').text(message).show();
        $('#promoCodeInput').css('border-color', '#ef4444');
        
        setTimeout(function() {
            $('#promoError').text('').hide();
            $('#promoCodeInput').css('border-color', '#e2e8f0');
        }, 4000);
    }

    // Remove promo code
    $(document).on('click', '#removePromoBtn', function() {
        bootbox.confirm({
            title: 'Remove Promo Code',
            message: 'Are you sure you want to remove the promo code?',
            buttons: {
                confirm: {
                    label: 'Yes, Remove',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-secondary'
                }
            },
            callback: function(result) {
                if (result) {
                    removePromoCode();
                }
            }
        });
    });

    function removePromoCode() {
        $.ajax({
            url: baseUrl + 'promo/remove-promocode',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    bootbox.alert({
                        message: response.message,
                        closeButton: false,
                        callback: function() {
                            location.reload();
                        }
                    });
                } else {
                    bootbox.alert({
                        message: response.message || 'Failed to remove promo code',
                        closeButton: false
                    });
                }
            },
            error: function() {
                bootbox.alert({
                    message: 'An error occurred. Please try again.',
                    closeButton: false
                });
            }
        });
    }

    // Checkout button
    $('#checkoutBtn').on('click', function() {
        var finalPrice = parseFloat($('#cartFinalPrice').val()) || 0;
        
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
        
        if (finalPrice === 0) {
            // Free checkout
            processFreeCheckout();
        } else {
            // Paid checkout
            processPaidCheckout();
        }
    });

    function processFreeCheckout() {
        $.ajax({
            url: baseUrl + 'payment/free-payable-product',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = response.url;
                } else {
                    $('#checkoutBtn').prop('disabled', false).html('<i class="fas fa-lock"></i> Proceed to Checkout');
                    bootbox.alert({
                        message: response.message || 'Checkout failed',
                        closeButton: false
                    });
                }
            },
            error: function() {
                $('#checkoutBtn').prop('disabled', false).html('<i class="fas fa-lock"></i> Proceed to Checkout');
                bootbox.alert({
                    message: 'An error occurred during checkout. Please try again.',
                    closeButton: false
                });
            }
        });
    }

    function processPaidCheckout() {
        $.ajax({
            url: baseUrl + 'checkout-phone-pe-cart-items',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    if (paymentGateway === 'CASHFREE') {
                        if (!response.payment_session_id) {
                            $('#checkoutBtn').prop('disabled', false).html('<i class="fas fa-lock"></i> Proceed to Checkout');
                            bootbox.alert({
                                message: 'Payment session ID is missing. Please try again.',
                                closeButton: false
                            });
                            return;
                        }
                        // Wait for Cashfree SDK to be ready
                        if (typeof Cashfree === 'undefined') {
                            $('#checkoutBtn').prop('disabled', false).html('<i class="fas fa-lock"></i> Proceed to Checkout');
                            bootbox.alert({
                                message: 'Payment system is loading. Please try again in a moment.',
                                closeButton: false
                            });
                            return;
                        }
                        const cashfree = Cashfree({
                            mode: cashfreeMode || "sandbox"
                        });
                        let checkoutOptions = {
                            paymentSessionId: response.payment_session_id,
                            redirectTarget: "_self"
                        };
                        cashfree.checkout(checkoutOptions);
                    } else if (paymentGateway === 'PHONEPE') {
                        window.location.href = response.url;
                    }
                } else {
                    $('#checkoutBtn').prop('disabled', false).html('<i class="fas fa-lock"></i> Proceed to Checkout');
                    bootbox.alert({
                        message: response.message || 'Checkout failed',
                        closeButton: false
                    });
                }
            },
            error: function() {
                $('#checkoutBtn').prop('disabled', false).html('<i class="fas fa-lock"></i> Proceed to Checkout');
                bootbox.alert({
                    message: 'An error occurred during checkout. Please try again.',
                    closeButton: false
                });
            }
        });
    }

    // Allow Enter key to apply promo code
    $('#promoCodeInput').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            $('#applyPromoBtn').click();
        }
    });

    // Update cart totals dynamically (for future use with quantity updates)
    function updateCartTotals() {
        var total = 0;
        $('.cart-item').each(function() {
            var priceText = $(this).find('.item-price').text().replace('₹', '').replace(',', '');
            total += parseFloat(priceText) || 0;
        });
        
        $('#subtotalPrice').text('₹' + total.toFixed(2));
        $('#cartTotalPrice').val(total);
        
        // Recalculate discount if applicable
        var discount = 0;
        if ($('#promoSuccess').length) {
            // Promo code is applied, need to recalculate
            location.reload(); // Simplest approach for now
        } else {
            $('#totalPrice').text('₹' + total.toFixed(2));
            $('#cartFinalPrice').val(total);
        }
    }
});