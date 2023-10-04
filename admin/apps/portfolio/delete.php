<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

 if (isset($_GET['cid'])) {

	$cid = filter_input(INPUT_GET, 'cid', FILTER_SANITIZE_NUMBER_INT);
	
	$photoid = $_GET['photoid'];
	$path="../../../public/upload/".$photoid."";
	(unlink($path));
	
    // Delete From database 
	global $mysqli;
	if ($insert_stmt = $mysqli->prepare("DELETE FROM portfolio WHERE id=?"))
	$insert_stmt->bind_param('s', $cid);
	$insert_stmt->execute();
	

	
	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
	}
?>






