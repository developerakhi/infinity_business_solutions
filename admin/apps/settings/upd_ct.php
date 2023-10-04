<?php
include_once '../functions/functions.php'; 
testing_loggin();

 	if (isset($_POST['id'])) {
	
		// Sanitize and validate the data passed in
		$menu_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$facebook = filter_input(INPUT_POST, 'fc', FILTER_SANITIZE_STRING);
		$twitter = filter_input(INPUT_POST, 'twitter', FILTER_SANITIZE_STRING);
		$google = filter_input(INPUT_POST, 'google', FILTER_SANITIZE_STRING);
		$pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);
		$instagram = filter_input(INPUT_POST, 'instagram', FILTER_SANITIZE_STRING);

		// Prepare the statement:
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("UPDATE sd_social SET fc=?, twitter=?, google=?, pin=?, instagram=? WHERE id = ? LIMIT 1")){
		// Bind the variables:
		$insert_stmt->bind_param('ssssss', $facebook, $twitter, $google, $pin, $instagram, $menu_id);
		// Execute the query:
    
             if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
           }
       }
			  header('Location: ../../social_networks/'.$menu_id.'/success');
 	}
	
	
?>