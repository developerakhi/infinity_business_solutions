<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

 if (isset($_GET['order_id'])) {

	$order_id = filter_input(INPUT_GET, 'order_id', FILTER_SANITIZE_NUMBER_INT);
	
    // Delete From database 
	global $mysqli;
	if ($delete_data = $mysqli->prepare("DELETE FROM order_list WHERE id=?"))
	$delete_data->bind_param('s', $order_id);
	$delete_data->execute();
	
	global $mysqli;
	if ($delete_data = $mysqli->prepare("DELETE FROM order_details WHERE order_id=?"))
	$delete_data->bind_param('s', $order_id);
	$delete_data->execute();
	

	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
	}
?>







