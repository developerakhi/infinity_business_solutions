<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

$url_link = isset($_GET['dltID']) ? $_GET['dltID'] : 'nothing_yet';
$dlt_id = preg_replace("/[^0-9]/", $url_link);

 	if (isset($_GET['dltID'])) {
	
		// Sanitize and validate the data passed in
		$menu_id = filter_input(INPUT_GET, 'dltID', FILTER_SANITIZE_NUMBER_INT);

        // Delete From database 
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("DELETE FROM sub_menu WHERE sub_menu_id=?")){
		$insert_stmt->bind_param('s', $menu_id);
		
		if (!$insert_stmt->execute()) {
					header('Location: ../error.php?err=Registration failure: INSERT');
			   }
		  header('Location: ../../view_all_sub_cat/455/delete_success');
	
		   }
		}
?>