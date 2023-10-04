<?php
require_once("../functions/functions.php");
testing_loggin();
 	if (isset($_POST['name'])) {
	
		// Sanitize and validate the data passed in
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
		$stall_name = filter_input(INPUT_POST, 'stall_name', FILTER_SANITIZE_STRING);
		$trade = filter_input(INPUT_POST, 'trade', FILTER_SANITIZE_STRING);

		$stall_code = filter_input(INPUT_POST, 'stall_code', FILTER_SANITIZE_STRING);
		$mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
		$n_id = filter_input(INPUT_POST, 'n_id', FILTER_SANITIZE_STRING);

		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);

		$last_up = filter_input(INPUT_POST, 'up_date', FILTER_SANITIZE_STRING);
		$activity = filter_input(INPUT_POST, 'activity', FILTER_SANITIZE_STRING);

		// Prepare the statement:
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("UPDATE sd_client SET  name=?, mobile=?, email=?, address=?, activity=? WHERE id = ? LIMIT 1")){
		// Bind the variables:
		$insert_stmt->bind_param('sssssi',  $name, $mobile, $email, $address, $activity, $id);
		// Execute the query:
    
             if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
           }
       }
	   
		  header('Location: ../../update_customer/'.$id.'/success');
 		}
	
?>