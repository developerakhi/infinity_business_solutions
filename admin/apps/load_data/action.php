<?php
ob_start();
include_once '../functions/functions.php';
testing_loggin();

if (isset($_POST['sub_cat'])) {
	
		// Sanitize and validate the data passed in
		$product = filter_input(INPUT_POST, 'sub_cat', FILTER_SANITIZE_STRING);
		$category = filter_input(INPUT_POST, 'cat', FILTER_SANITIZE_STRING);
		$cID = filter_input(INPUT_POST, 'cID', FILTER_SANITIZE_STRING);
		$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
		$ItemID = filter_input(INPUT_POST, 'ItemID', FILTER_SANITIZE_STRING);
		
        // Insert the new user into the database 
		global $mysqli;
        if ($insert_stmt = $mysqli->prepare("INSERT INTO sd_order_cart (category, product, type, cID) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $category, $product, $type, $cID);
            // Execute the prepared query.
            if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
           }
       }
	   	  header('Location: ../../add_new_invoice/'.$ItemID.'');

 	}
?>

       