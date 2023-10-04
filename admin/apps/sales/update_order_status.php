<?php
include_once '../functions/functions.php'; 
testing_loggin();

 	if (isset($_POST['order_id'])) {
	
		$order_id = filter_input(INPUT_POST, 'order_id');
		$payment_status = filter_input(INPUT_POST, 'payment_status');
		$delivery_status = filter_input(INPUT_POST, 'delivery_status');
		
		if ($payment_status != NULL){	
			global $mysqli;
			if ($insert_stmt = $mysqli->prepare("UPDATE order_list SET payment_status=? WHERE id = ? LIMIT 1")){
			$insert_stmt->bind_param('ss', $payment_status, $order_id);
			$insert_stmt->execute();
			}
		}
		
		if ($delivery_status != NULL){	
			global $mysqli;
			if ($insert_stmt = $mysqli->prepare("UPDATE order_list SET delivery_status=? WHERE id = ? LIMIT 1")){
			$insert_stmt->bind_param('ss', $delivery_status, $order_id);
			$insert_stmt->execute();
			}
		}


	   
	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
 	}
	
	
?>


