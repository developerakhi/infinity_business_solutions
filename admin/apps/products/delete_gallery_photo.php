<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

 if (isset($_GET['gallery_id'])) {

	$gallery_id = filter_input(INPUT_GET, 'gallery_id', FILTER_SANITIZE_NUMBER_INT);
	
	$gfile = $_GET['gfile'];
	$path="../../../images/products/".$gfile."";
	(unlink($path));

    // Delete From database 
	global $mysqli;
	if ($insert_stmt = $mysqli->prepare("DELETE FROM upload_files WHERE id=?"))
	$insert_stmt->bind_param('s', $gallery_id);
	$insert_stmt->execute();

	
    header('Location: ' . $_SERVER['HTTP_REFERER'].'');	
	
	}
?>



