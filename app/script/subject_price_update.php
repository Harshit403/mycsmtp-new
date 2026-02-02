<?php 
$db = mysqli_connect('localhost','pyrogram_mtp','Ankit#0606361','pyrogram_mtp');

purchaseTable($db);
function purchaseTable($db){
	$sql  = "SELECT * FROM purchase_table WHERE create_date >= '2024-01-20 00:00:00'";
	$result = $db->query($sql);
	while ($row = $result->fetch_assoc()) {
		$purchaseId = $row['purcahse_id'];
		// echo $purchaseId;
		$totalPaymentAmount = $row['total_payment_amount'];
		// updateSubjectPrice($db,$purchaseId);
		updatePromocode($db,$purchaseId,$totalPaymentAmount);
	}
}


// updateSubjectPrice($db);
// get cart items table amount
function updateSubjectPrice($db,$purchaseId){
	$sql  ="SELECT * FROM cart_items_table WHERE deleted=1 AND purchase_id = '$purchaseId'";
	$result = $db->query($sql);

	while($row = $result->fetch_assoc()){
		$subject_id = $row['subject_id'];
		$cart_items_id = $row['cart_items_id'];
		$getSubjectRowSQL = "SELECT original_price,offer_price FROM subject_table WHERE subject_id=$subject_id";
		$result1 = $db->query($getSubjectRowSQL);
		$getSubjectRow = $result1->fetch_assoc();
		$original_price =$getSubjectRow['original_price'];
		$offer_price = $getSubjectRow['offer_price'];
		$updateSql = "UPDATE cart_items_table SET original_price = '$original_price', offer_price = '$offer_price' WHERE cart_items_id=$cart_items_id";
		$result2 = $db->query($updateSql);
		echo "cart amount updated successfully".PHP_EOL;
	}
	echo "All the amount updated successfully".PHP_EOL;
}
// updatePromocode($db);

function updatePromocode($db,$purchaseId,$totalPaymentAmount){
	$sql1 = "SELECT offer_price,promo_code_name FROM cart_items_table WHERE purchase_id = '$purchaseId'";
	$result1 = $db->query($sql1);
	$total_subject_price = 0;
	$promo_code_name = '';
	while ($row1 = $result1->fetch_assoc()) {
		$offer_price = !empty($row1['offer_price']) ? $row1['offer_price'] : 0;
		$total_subject_price+=$offer_price;
		$promo_code_name = !empty($row1['promo_code_name']) ? $row1['promo_code_name'] : '';
	}
	if ($total_subject_price > 0) {
		if ($totalPaymentAmount!=$total_subject_price) {
			// check for percent
			$adjustableAmt = ((($total_subject_price*100)-($totalPaymentAmount*100))/$total_subject_price); 
			$promocode_check_percent_sql = "SELECT * FROM promo_code_table WHERE discount_amt = '$adjustableAmt' AND discount_type='percent' AND min_cart_amt < '$total_subject_price'";
			$promocode_check_percent_result = $db->query($promocode_check_percent_sql);
			if (!empty($promocode_check_percent_result)) {
				$promocode_check_percent = $promocode_check_percent_result->fetch_assoc();
				if (empty($promo_code_name)) {
					$code_name = $promocode_check_percent['code_name'];
					$discount_type = $promocode_check_percent['discount_type'];
					$discount_amt = $promocode_check_percent['discount_amt'];
					$updatePromoCodeSQL = "UPDATE cart_items_table SET promo_code_name = '$code_name', discount_type = '$discount_type',discount='$discount_amt' WHERE purchase_id='$purchaseId'";
					$updatePromoCode = $db->query($updatePromoCodeSQL);
					echo "PromoCode updated successfully".PHP_EOL;
				}
			} else {
				echo "Check oThers".PHP_EOL;
			}
		}
	}
}

?>