<?php 	
		// database Connection
		$env = parse_ini_file(dirname(dirname(dirname(__FILE__))).'/.env',true);
		$hostname = $env['database.default.hostname'];
		$database_name = $env['database.default.database'];
		$username = $env['database.default.username'];
		$password = $env['database.default.password'];
		$db = mysqli_connect($hostname,$username,$password,$database_name);
		
		updatePromocode($db);

		function updatePromocode($db){
			$sql  = "SELECT * FROM purchase_table WHERE `payment_status`='Pending' AND `payment_mode`='phonepe'";
			$result = $db->query($sql);
			while ($row = $result->fetch_assoc()) {
				sleep(10);
				$purchaseId = $row['purcahse_id'];
				$payment_req_id = $row['payment_request_id'];
				if (empty($payment_req_id)) {
					continue;
				} else {
					$paymentStatus = getPaymentStatus($payment_req_id);
					$updateSql = "UPDATE purchase_table SET `payment_status` = '$paymentStatus' WHERE `payment_request_id`='$payment_req_id'";
					$db->query($updateSql);
				}
			}
		}

		function getPaymentStatus($payment_req_id=''){
			$payload = "/pg/v1/status/M1QP0DRQNEFV/".$payment_req_id."f41bd9e5-39a6-459e-af58-7b9f46cfc400";
			$Checksum = hash('sha256', $payload);
			$Checksum = $Checksum.'###1';

			$curl = curl_init();
			curl_setopt_array($curl, [
			  CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/status/M1QP0DRQNEFV/".$payment_req_id."",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => [
			    "Content-Type: application/json",
			    "X-VERIFY: ".$Checksum,
			    "X-MERCHANT-ID:M1QP0DRQNEFV",
			    "accept: application/json"
			  ],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);
			if (!empty($response)) {
				$paymentInfo = json_decode($response);
				$paymentStatus = $paymentInfo->data->state;
				$paymentStatus = ($paymentStatus=='COMPLETED') ? 'Credit' : $paymentStatus;
			}
			curl_close($curl);
			return $paymentStatus;
		}

		


?>