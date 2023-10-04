<?php
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "/apps");
require_once(PRIVATE_PATH . "/functions/functions.php");
testing_loggin();

$slID = $_POST['slID'];
 	if (isset($_POST['slID'])) {


foreach($_POST['secID'] as $row=>$Act)
	{
    $order_id = $Act; 
    $barcode = $_POST["cat"][$row];    

	global $mysqli;
	if ($insert_stmt = $mysqli->prepare("UPDATE sd_home_edit SET menu=? WHERE id = ? LIMIT 1")){
		// Bind the variables:
		$insert_stmt->bind_param('ss', $barcode, $order_id);
		// Execute the query:
    
             if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
           }
       }
}
	  header('Location: ' . $_SERVER['HTTP_REFERER'].'');
	}
?>