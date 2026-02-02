<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/cdn/bootstrap.min.css">
    <script type="text/javascript" src="<?=base_url()?>assets/js/cdn/bootstrap.bundle.min.js"></script>
    <style type="text/css">
    .tdClass {
        border: 1px solid #000 !important;
    }
    </style>
</head>

<body>
    <div style="width: 100%;">
        <div style="width: 50%;float: left;">
            <div class="font-weight-bold" style="font-size: 30px;">INVOICE</div>
            <div>
                <?=$invoice_info->order_id?>
            </div>
        <?php $invoice_json = json_decode($invoice_info->invoice_json); ?>
            <div class="font-weight-bold">
                <?=$invoice_json[0]->student_name?>
            </div>
            <div>
                <?=$invoice_json[0]->mobile_no?>
            </div>
            <div>
                <?=$invoice_json[0]->email?>
            </div>
        </div>
        <div style="width: 50%;float: right;">
            <div class="font-weight-bold text-danger">MY CA MTP</div>
            <div>A Unit of TAXSTER INDIA</div>
            <div>Ghaziabad, Uttar Pradesh, India</div>
            <div>+91 9540097210</div>
            <div>support@mycsmtp.com</div>
        </div>
    </div>
    </div>
    <table class="table table-striped mt-3">
        <tr class="tdClass">
            <th class="tdClass">Sl No</th>
            <th class="tdClass">Items</th>
            <th class="tdClass">Price</th>
        </tr>
        <?php
        $totalPrice = 0;
        $i = 0;
        $totalPayablePrice = 0;
        foreach ($invoice_json as $invoice_json_row) {
            $offerPrice = !empty($invoice_json_row->offer_price) ? $invoice_json_row->offer_price : 0;
            $i++;
            ?>
                <tr class="tdClass">
                    <td class="tdClass"><?=$i?></td>
                    <td class="tdClass"><?=$invoice_json_row->subject_name?></td>
                    <td class="tdClass">&#x20B9;<?=$invoice_json_row->offer_price?></td>
                </tr>
            <?php
            $totalPayablePrice += number_format((float)$offerPrice, 2, '.', '');
            
        }
        
        ?>
        <tr class="tdClass">
            <td class="tdClass"></td>
            <?php if ($invoice_json[0]->discount_type=='percent'){
                $discountValue = $totalPayablePrice - ($totalPayablePrice * (($invoice_json[0]->discount)/100));
                $discount_type_icon = ' %';
            } else {
                $discountValue = $totalPayablePrice - $invoice_json[0]->discount;
                $discount_type_icon = '';
            }
            if (!empty($invoice_json[0]->discount)) {
                $discount = $invoice_json[0]->discount . $discount_type_icon;
            } else {
                $discount = '0 %';
            }
            ?>
            <td class="tdClass">Discount(<?=$invoice_json[0]->promo_code_name?>)</td>
            <td class="tdClass">
                <?=$discount?>
            </td>
        </tr>
        <tr class="tdClass">
            <td class="tdClass"></td>
            <td class="tdClass">Total Payable Price</td>
            <td class="tdClass"> &#x20B9;
                <?=$discountValue?>
            </td>
        </tr>
        <tr class="tdClass">
            <td class="tdClass"></td>
            <td class="tdClass">Paid Status</td>
            <td class="tdClass">
                <?=$invoice_json[0]->payment_status?>
            </td>
        </tr>
        <tr class="tdClass">
            <td class="tdClass"></td>
            <td class="tdClass">Paid By</td>
            <td class="tdClass">Online
                <!-- <?=$invoice_json[0]->payment_mode?> -->
            </td>
        </tr>
    </table>
</body>

</html>