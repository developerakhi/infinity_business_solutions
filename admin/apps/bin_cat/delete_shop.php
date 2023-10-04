<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();
 	if (isset($_GET['itemID'])) {
	
		// Sanitize and validate the data passed in
	$menu_id = filter_input(INPUT_GET, 'itemID', FILTER_SANITIZE_STRING);
        // Delete From database 
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("DELETE FROM sd_merchant WHERE id=?")){
		$insert_stmt->bind_param('s', $menu_id);
		
		if (!$insert_stmt->execute()) {
					header('Location: ../error.php?err=Registration failure: Delete');
			   }
		   }
		$insert_stmt->close(); 
		  
		   
		if ($delete_stm = $mysqli->prepare("DELETE FROM sd_merchant WHERE id=?")){
		$delete_stm->bind_param('s', $menu_id);
		
		if (!$delete_stm->execute()) {
					header('Location: ../error.php?err=Registration failure: Delete');
			   }
			   header('Location: ' . $_SERVER['HTTP_REFERER'].'/69854782/success');
	
			}
		
		}

?>
