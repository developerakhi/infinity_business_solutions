<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

 if (isset($_GET['bid'])) {

	$blog_id = filter_input(INPUT_GET, 'bid', FILTER_SANITIZE_NUMBER_INT);
	
	$photoid = $_GET['photoid'];
	$path="../../../public/upload/".$photoid."";
	(unlink($path));
	
    // Delete From database 
	global $mysqli;
	if ($insert_stmt = $mysqli->prepare("DELETE FROM services WHERE id=?"))
	$insert_stmt->bind_param('s', $blog_id);
	$insert_stmt->execute();
	
	
    header('Location: ' . $_SERVER['HTTP_REFERER'].'');
	}
?>



