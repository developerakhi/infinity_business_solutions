<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

$url_link = isset($_GET['itemID']) ? $_GET['itemID'] : 'nothing_yet';
$dlt_id = preg_replace("/[^0-9]/", $url_link);

 	if (isset($_GET['itemID'])) {
	
		// Sanitize and validate the data passed in
		$menu_id = filter_input(INPUT_GET, 'itemID', FILTER_SANITIZE_NUMBER_INT);

        // Delete From database 
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("DELETE FROM sd_item_l WHERE id=?")){
		$insert_stmt->bind_param('s', $menu_id);
		
		if (!$insert_stmt->execute()) {
					header('Location: ../error.php?err=Registration failure: Delete');
			   }
		  header('Location: ../../timdil_item/547/success');
	
		   }
		}
?>