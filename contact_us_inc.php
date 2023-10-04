<?php
    include_once 'include/functions.php';
    ob_start();
   session_start();
if (isset($_POST['company_name'])) {						
	$company_name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_STRING);
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

	global $mysqli;
        if ($insert_stmt = $mysqli->prepare("INSERT INTO contact_us (company_name, name, email, message) 
				VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $company_name, $name, $email, $message);
            $insert_stmt->execute();
       }
       header('Location: ../contact_us.php');

}

?>