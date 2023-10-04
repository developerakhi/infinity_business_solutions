<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

$url_link = isset($_GET['ClientID']) ? $_GET['ClientID'] : 'nothing_yet';
$C_dlt_id = preg_replace("/[^0-9]/", $url_link);

 	if (isset($_GET['ClientID'])) {
	
		// Sanitize and validate the data passed in
		$C_dlt_id = filter_input(INPUT_GET, 'ClientID', FILTER_SANITIZE_NUMBER_INT);

        // Delete From database 
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("DELETE FROM sd_client WHERE id=?")){
		$insert_stmt->bind_param('i', $C_dlt_id);
		
		if (!$insert_stmt->execute()) {
					header('Location: ../error.php?err=Registration failure: Delete');
			   }
		  header('Location: ../../view_all_customer/96584/success');
	
		   }
		}
?>