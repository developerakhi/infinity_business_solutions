<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

 if (isset($_GET['product_id'])) {

	$product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
	
	$photoid = $_GET['photoid'];
	$path="../../../images/products/".$photoid."";
	(unlink($path));
	
    // Delete From database 
	global $mysqli;
	if ($insert_stmt = $mysqli->prepare("DELETE FROM products WHERE id=?"))
	$insert_stmt->bind_param('s', $product_id);
	$insert_stmt->execute();
	
	// Delete From database 
	global $mysqli;
	if ($DeleteStm = $mysqli->prepare("DELETE FROM upload_files WHERE pro_id=?"))
	$DeleteStm->bind_param('s', $product_id);
	$DeleteStm->execute();
	
	// Delete From database 
	global $mysqli;
	if ($DeleteStm = $mysqli->prepare("DELETE FROM product_attribute WHERE product_id=?"))
	$DeleteStm->bind_param('s', $product_id);
	$DeleteStm->execute();
	
	
	header('Location: ' . $_SERVER['HTTP_REFERER'].'');
	}
?>







