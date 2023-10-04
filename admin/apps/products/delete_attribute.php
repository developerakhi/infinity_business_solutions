<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

 if (isset($_GET['attri'])) {

	$attri = filter_input(INPUT_GET, 'attri');

	// Delete From database 
	global $mysqli;
	if ($DeleteStm = $mysqli->prepare("DELETE FROM product_attribute WHERE id=?"))
	$DeleteStm->bind_param('s', $attri);
	$DeleteStm->execute();
	
	
	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
	}
?>







