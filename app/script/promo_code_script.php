<?php

$db = mysqli_connect('localhost','pyrogram_mtp','Ankit#0606361','pyrogram_mtp');

$sql = "SELECT `cart_items_table`.*,`promo_code_table`.`validity_date` FROM `cart_items_table` LEFT JOIN `promo_code_table` ON `cart_items_table`.`promo_code_name` = `promo_code_table`.`code_name` WHERE `cart_items_table`.`deleted`=0";
 $result = $db->query($sql);
 $cartIdArray = array();
 while($row = $result->fetch_array()){
 	if ($row['validity_date'] < date('Y-m-d H:i:s')) {
 		array_push($cartIdArray, $row['cart_items_id']);
 	}
 }

 if(count($cartIdArray) > 0){
 	$cartIdArrayStr = implode(", ", $cartIdArray);
 	$updateSql = "UPDATE cart_items_table SET promo_code_name = '', discount_type = 'percent', discount = 0 WHERE cart_items_id IN ($cartIdArrayStr)";
 	$result1 = $db->query($updateSql);
 	if(!empty($result1)){
 		echo "Expired promo code removed successfully";
 	}
 }

?>