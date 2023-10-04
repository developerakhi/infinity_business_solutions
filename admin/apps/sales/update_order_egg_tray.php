<?php
include_once '../functions/functions.php'; 
testing_loggin();

 	if (isset($_POST['order_id'])) {
	
		$order_id = filter_input(INPUT_POST, 'order_id');
		$tray_position = filter_input(INPUT_POST, 'tray_position');
		$total_tray = filter_input(INPUT_POST, 'total_tray');
		$tray_price = filter_input(INPUT_POST, 'tray_price');
		
		$unitePrice = $tray_price / $total_tray;
		$trayPrice = $unitePrice * $total_tray;
	
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("UPDATE order_details SET tray_position=?, total_tray=?, tray_price=? WHERE id = ? LIMIT 1")){
		$insert_stmt->bind_param('ssss', $tray_position, $total_tray, $trayPrice, $order_id);
		$insert_stmt->execute();
		}
		
		

	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
 	}
	
	
?>


