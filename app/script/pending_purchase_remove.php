<?php

$db = mysqli_connect('localhost','pyrogram_mtp','Ankit#0606361','pyrogram_mtp');

$sql = "SELECT payment_status,purcahse_id FROM purchase_table";
$result = $db->query($sql);
$purcahseArray = array();
while($row = $result->fetch_array()){
	$purcahse_id = $row['purcahse_id'];
	$payment_status = $row['payment_status'];
	$updateSql = "UPDATE cart_items_table SET payment_status = '$payment_status' WHERE purchase_id=$purcahse_id";
	$result1 = $db->query($updateSql);
	echo "Purchase status updated for purchase id".$purcahse_id.PHP_EOL;
}


?>