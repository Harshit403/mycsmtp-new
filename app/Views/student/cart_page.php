<?= $this->extend('layout/student_layout') ?>
<?= $this->section('title') ?>
    Cart Summary
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<style>
    /* Shadcn/UI Inspired Cart Styles */
    .cart-wrapper {
        padding: 100px 16px 24px;
        min-height: calc(100vh - 200px);
        background: #fafafa;
    }

    .cart-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    .cart-header {
        margin-bottom: 24px;
    }

    .cart-title {
        font-size: 24px;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 4px;
        letter-spacing: -0.02em;
    }

    .cart-subtitle {
        color: #64748b;
        font-size: 14px;
    }

    .cart-layout {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 24px;
        align-items: start;
    }

    /* Card Component - Shadcn Style */
    .card {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
    }

    .card-header {
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-title {
        font-size: 16px;
        font-weight: 600;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .card-title i {
        color: #64748b;
        font-size: 18px;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 2px 10px;
        background: #f1f5f9;
        color: #475569;
        font-size: 12px;
        font-weight: 500;
        border-radius: 9999px;
    }

    .card-content {
        padding: 0;
    }

    /* Cart Item */
    .cart-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.15s ease;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-item:hover {
        background-color: #f8fafc;
    }

    .item-avatar {
        width: 48px;
        height: 48px;
        background: #f1f5f9;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 20px;
        flex-shrink: 0;
    }

    .item-content {
        flex: 1;
        min-width: 0;
    }

    .item-title {
        font-size: 14px;
        font-weight: 500;
        color: #0f172a;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .item-description {
        font-size: 13px;
        color: #64748b;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .item-description span {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .item-price-col {
        text-align: right;
        min-width: 100px;
    }

    .item-price {
        font-size: 16px;
        font-weight: 600;
        color: #0f172a;
    }

    .item-original {
        font-size: 13px;
        color: #94a3b8;
        text-decoration: line-through;
    }

    .item-actions {
        display: flex;
        align-items: center;
    }

    /* Button Component - Shadcn Style */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 8px 12px;
        font-size: 13px;
        font-weight: 500;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.15s ease;
        border: none;
    }

    .btn-sm {
        padding: 6px 10px;
        font-size: 12px;
    }

    .btn-icon {
        width: 32px;
        height: 32px;
        padding: 0;
    }

    .btn-ghost {
        background: transparent;
        color: #64748b;
    }

    .btn-ghost:hover {
        background: #f1f5f9;
        color: #0f172a;
    }

    .btn-ghost.danger:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-primary {
        background: #0f172a;
        color: #ffffff;
    }

    .btn-primary:hover {
        background: #1e293b;
    }

    .btn-secondary {
        background: #f1f5f9;
        color: #0f172a;
    }

    .btn-secondary:hover {
        background: #e2e8f0;
    }

    /* Order Summary Card */
    .summary-card {
        position: sticky;
        top: 20px;
    }

    .summary-header {
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .summary-title {
        font-size: 16px;
        font-weight: 600;
        color: #0f172a;
    }

    .summary-content {
        padding: 16px 20px;
    }

    /* Input Component - Shadcn Style */
    .form-group {
        margin-bottom: 16px;
    }

    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 500;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .input-group {
        display: flex;
        gap: 8px;
    }

    .form-input {
        flex: 1;
        padding: 8px 12px;
        font-size: 13px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        outline: none;
        transition: all 0.15s ease;
        background: #ffffff;
    }

    .form-input:focus {
        border-color: #0f172a;
        box-shadow: 0 0 0 2px rgba(15, 23, 42, 0.1);
    }

    .form-input::placeholder {
        color: #94a3b8;
    }

    /* Alert Component */
    .alert {
        padding: 12px 16px;
        border-radius: 6px;
        font-size: 13px;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .alert-success {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
    }

    .alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }

    /* Price Breakdown */
    .price-list {
        margin-bottom: 16px;
    }

    .price-item {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        font-size: 14px;
        color: #64748b;
    }

    .price-item.discount {
        color: #166534;
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        padding: 10px 12px;
        margin: 4px -12px;
        border-radius: 6px;
        border: 1px solid #bbf7d0;
    }

    .price-item.total {
        border-top: 1px solid #e2e8f0;
        margin-top: 8px;
        padding-top: 16px;
        font-weight: 600;
        color: #0f172a;
        font-size: 16px;
    }

    .price-item.total .price-value {
        font-size: 18px;
    }

    .price-value {
        font-weight: 500;
        color: #0f172a;
    }

    .price-item.discount .price-value {
        color: #166534;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 64px 24px;
    }

    .empty-icon {
        width: 64px;
        height: 64px;
        background: #f1f5f9;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: #94a3b8;
        font-size: 28px;
    }

    .empty-title {
        font-size: 18px;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 8px;
    }

    .empty-description {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 24px;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Separator */
    .separator {
        display: flex;
        align-items: center;
        margin: 16px 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .separator::before,
    .separator::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e2e8f0;
    }

    .separator span {
        padding: 0 12px;
    }

    /* Promo Tag */
    .promo-tag {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 10px;
        background: #f0fdf4;
        color: #166534;
        font-size: 12px;
        font-weight: 500;
        border-radius: 4px;
        border: 1px solid #bbf7d0;
    }

    .promo-tag button {
        background: none;
        border: none;
        color: #166534;
        cursor: pointer;
        padding: 0;
        font-size: 14px;
        line-height: 1;
    }

    /* Billing Address Section */
    .billing-address-section {
        padding: 20px;
        margin: 16px;
        background: #ffffff;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .billing-address-section:hover {
        border-color: #1ab79c;
        box-shadow: 0 2px 8px rgba(26, 183, 156, 0.1);
    }

    /* Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 8px;
        width: 90%;
        max-width: 400px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .modal-title {
        font-size: 16px;
        font-weight: 600;
        color: #0f172a;
    }

    .modal-close {
        background: none;
        border: none;
        color: #64748b;
        cursor: pointer;
        font-size: 18px;
        padding: 4px;
    }

    .modal-close:hover {
        color: #0f172a;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        padding: 16px 20px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .cart-layout {
            grid-template-columns: 1fr;
        }

        .summary-card {
            position: static;
        }
    }

    @media (max-width: 600px) {
        .cart-wrapper {
            padding: 16px 12px;
        }

        .cart-title {
            font-size: 20px;
        }

        .cart-item {
            padding: 12px 16px;
            gap: 12px;
        }

        .item-avatar {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .item-title {
            font-size: 13px;
        }

        .item-description {
            font-size: 12px;
        }

        .item-price {
            font-size: 14px;
        }

        .input-group {
            flex-direction: column;
        }

        .input-group .btn {
            width: 100%;
        }
    }
</style>

<div class="cart-wrapper">
    <div class="cart-container">
        <div class="cart-header">
            <h1 class="cart-title">Cart Summary</h1>
            <p class="cart-subtitle">Review your items and proceed to checkout</p>
        </div>

        <?php 
        // Initialize variables
        $totalPrice = 0;
        $totalOriginalPrice = 0;
        $itemDiscountAmount = 0;
        $promoDiscountAmount = 0;
        $discountPercent = 0;
        $discountType = '';
        
        if (!empty($cartItems)): 
            // Calculate totals
            foreach ($cartItems as $item) {
                $totalPrice += $item['offer_price'];
                $totalOriginalPrice += $item['original_price'];
                $discountPercent = $item['discount'];
                $discountType = $item['discount_type'];
            }
            
            // Calculate item discount (original - offer)
            $itemDiscountAmount = $totalOriginalPrice - $totalPrice;
            
            // Calculate promo discount amount
            if ($discountPercent > 0) {
                if ($discountType == 'percent') {
                    $promoDiscountAmount = ($totalPrice * $discountPercent) / 100;
                } else {
                    $promoDiscountAmount = $discountPercent;
                }
            }
        ?>
            <div class="cart-layout">
                <!-- Cart Items -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-shopping-cart"></i>
                            Cart Items
                        </h3>
                        <span class="badge"><?= count($cartItems) ?> items</span>
                    </div>
                    <div class="card-content">
                        <?php foreach ($cartItems as $item): ?>
                            <div class="cart-item" data-cart-item-id="<?= $item['cart_items_id'] ?>">
                                <div class="item-avatar">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="item-content">
                                    <div class="item-title"><?= htmlspecialchars($item['subject_name']) ?></div>
                                    <div class="item-description">
                                        <span><i class="fas fa-graduation-cap" style="font-size: 12px;"></i> <?= htmlspecialchars($item['level_name']) ?></span>
                                        <span><i class="fas fa-tag" style="font-size: 12px;"></i> <?= htmlspecialchars($item['type_name']) ?></span>
                                    </div>
                                </div>
                                <div class="item-price-col">
                                    <div class="item-price">₹<?= number_format($item['offer_price'], 2) ?></div>
                                    <?php if ($item['original_price'] > $item['offer_price']): ?>
                                        <div class="item-original">₹<?= number_format($item['original_price'], 2) ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="item-actions">
                                    <button class="btn btn-ghost btn-icon danger remove-cart-item" data-cart-item-id="<?= $item['cart_items_id'] ?>" title="Remove item">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="billing-address-section">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <i class="fas fa-map-marker-alt" style="color: #64748b;"></i>
                            <span style="font-size: 14px; font-weight: 600; color: #0f172a;">Billing Address</span>
                        </div>
                        <div style="font-size: 13px; color: #475569; line-height: 1.5;">
                            <div style="font-weight: 500; color: #0f172a; margin-bottom: 2px;"><?= htmlspecialchars($studentDetails['student_name'] ?? 'User') ?></div>
                            <div><?= htmlspecialchars($studentDetails['city_name'] ?? 'Not provided') ?>, <?= htmlspecialchars($studentDetails['state_name'] ?? '') ?></div>
                            <div style="color: #64748b; margin-top: 4px;">
                                <i class="fas fa-phone" style="font-size: 11px; margin-right: 4px;"></i>
                                <?= htmlspecialchars($studentDetails['mobile_no'] ?? 'Not provided') ?>
                            </div>
                            <div style="color: #64748b;">
                                <i class="fas fa-envelope" style="font-size: 11px; margin-right: 4px;"></i>
                                <?= htmlspecialchars($studentDetails['email'] ?? 'Not provided') ?>
                            </div>
                        </div>
                        <div style="margin-top: 12px; padding-top: 12px; border-top: 1px dashed #e2e8f0;">
                            <button type="button" class="btn btn-sm" onclick="openAddressModal()" style="font-size: 12px; color: #64748b; display: inline-flex; align-items: center; gap: 4px;">
                                <i class="fas fa-pencil-alt" style="font-size: 11px;"></i>
                                Update Address
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="card summary-card">
                    <div class="summary-header">
                        <h3 class="summary-title">Order Summary</h3>
                    </div>
                    <div class="summary-content">
                        <!-- Promo Code -->
                        <div class="form-group">
                            <label class="form-label">Promo Code</label>
                            <div class="input-group">
                                <input type="text" 
                                       class="form-input" 
                                       id="promoCodeInput" 
                                       placeholder="Enter code"
                                       value="<?= !empty($cartItems[0]['promo_code_name']) ? htmlspecialchars($cartItems[0]['promo_code_name']) : '' ?>">
                                <button class="btn btn-secondary" id="applyPromoBtn">Apply</button>
                            </div>
                            <div class="alert alert-error" id="promoError" style="display: none;"></div>
                            
                            <?php if (!empty($cartItems[0]['promo_code_name'])): ?>
                                <div class="promo-tag" style="margin-top: 10px;">
                                    <i class="fas fa-check-circle"></i>
                                    Code "<?= htmlspecialchars($cartItems[0]['promo_code_name']) ?>" applied
                                
                                    <button id="removePromoBtn"><i class="fas fa-times"></i></button>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="separator">
                            <span>Price Details</span>
                        </div>

                        <!-- Price Breakdown -->
                        <div class="price-list">
                            <div class="price-item">
                                <span>Original Price</span>
                                <span class="price-value">₹<?= number_format($totalOriginalPrice, 2) ?></span>
                            </div>
                            
                            <?php 
                            $totalDiscount = $itemDiscountAmount + $promoDiscountAmount;
                            if ($totalDiscount > 0): 
                            ?>
                                <div class="price-item discount">
                                    <span>Total Discount</span>
                                    <span class="price-value">-₹<?= number_format($totalDiscount, 2) ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="price-item total">
                                <span>Total Payable</span>
                                <span class="price-value">₹<?= number_format($totalPrice - $promoDiscountAmount, 2) ?></span>
                            </div>
                        </div>

                        <!-- Checkout Button -->
                        <button class="btn btn-primary" id="checkoutBtn" style="width: 100%;">
                            <i class="fas fa-credit-card"></i>
                            Make Payment
                        </button>

                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Empty Cart -->
            <div class="card">
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h2 class="empty-title">Your cart is empty</h2>
                    <p class="empty-description">Looks like you haven't added any courses yet. Browse our courses and start learning today!</p>
                    <a href="<?= base_url('buy-courses') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Enroll Now
                        </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Billing Address Update Modal -->
<div class="modal-overlay" id="addressModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Update Billing Address</h3>
            <button class="modal-close" onclick="closeAddressModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="addressForm" method="POST" action="<?= base_url('update-profile') ?>">
            <input type="hidden" name="student_id" value="<?= htmlspecialchars($studentDetails['student_id'] ?? '') ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="student_name" value="<?= htmlspecialchars($studentDetails['student_name'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Billing Address (City)</label>
                    <input type="text" class="form-control" name="city_name" value="<?= htmlspecialchars($studentDetails['city_name'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">State</label>
                    <input type="text" class="form-control" name="state_name" value="<?= htmlspecialchars($studentDetails['state_name'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control" name="mobile_no" value="<?= htmlspecialchars($studentDetails['mobile_no'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($studentDetails['email'] ?? '') ?>" readonly style="background: #f1f5f9;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeAddressModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Address</button>
            </div>
        </form>
    </div>
</div>

<!-- Hidden Inputs for Cart Data -->
<input type="hidden" id="cartTotalPrice" value="<?= $totalPrice ?>">
<input type="hidden" id="cartOriginalPrice" value="<?= $totalOriginalPrice ?>">
<input type="hidden" id="cartItemDiscount" value="<?= $itemDiscountAmount ?>">
<input type="hidden" id="cartPromoDiscount" value="<?= $promoDiscountAmount ?>">
<input type="hidden" id="cartFinalPrice" value="<?= $totalPrice - $promoDiscountAmount ?>">

<?= $this->endSection() ?>

<?= $this->section('jsContent')?>
<script>
    function openAddressModal() {
        document.getElementById('addressModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeAddressModal() {
        document.getElementById('addressModal').classList.remove('active');
        document.body.style.overflow = '';
    }

    // Close modal when clicking outside
    document.getElementById('addressModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeAddressModal();
        }
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAddressModal();
        }
    });

    // Handle Address Form AJAX Submission
    $(document).ready(function() {
        $('#addressForm').on('submit', function(e) {
            e.preventDefault();
            
            var formData = $(this).serialize();
            var submitBtn = $(this).find('button[type="submit"]');
            var originalText = submitBtn.text();
            
            submitBtn.prop('disabled', true).text('Updating...');
            
            $.ajax({
                url: '<?= base_url('update-profile') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show success popup
                        bootbox.alert({
                            message: '<i class="fas fa-check-circle" style="color: #10b981; font-size: 48px; display: block; text-align: center; margin-bottom: 15px;"></i><div style="text-align: center; font-size: 18px; font-weight: 600;">Updated!</div><div style="text-align: center; color: #64748b; margin-top: 8px;">' + response.message + '</div>',
                            closeButton: false,
                            callback: function() {
                                closeAddressModal();
                                // Refresh the page to show updated address
                                location.reload();
                            }
                        });
                        
                        setTimeout(function() {
                            bootbox.hideAll();
                            closeAddressModal();
                            location.reload();
                        }, 2000);
                    } else {
                        bootbox.alert({
                            message: response.message || 'Update failed',
                            closeButton: false
                        });
                        submitBtn.prop('disabled', false).text(originalText);
                    }
                },
                error: function() {
                    bootbox.alert({
                        message: 'An error occurred. Please try again.',
                        closeButton: false
                    });
                    submitBtn.prop('disabled', false).text(originalText);
                }
            });
        });
    });
</script>
<script src="<?= base_url() ?>assets/js/custom_js/cart_page.js?v=1.0.0" defer></script>
<?= $this->endSection() ?>
