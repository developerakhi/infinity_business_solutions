<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

 	if (isset($_GET['c_id'])) {

		$c_id = filter_input(INPUT_GET, 'c_id', FILTER_SANITIZE_NUMBER_INT);

      
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("DELETE FROM contact_us WHERE id=?")){
		$insert_stmt->bind_param('s', $c_id);
		$insert_stmt->execute();
	    }
 
		   header('Location: ' . $_SERVER['HTTP_REFERER'].'');
		}
?>