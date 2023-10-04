<?php
require_once("../functions/functions.php");
testing_loggin();

if (isset($_POST['email'], $_POST['p'])) {
	
		// Sanitize and validate the data passed in
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
   		 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  		  $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
		  
	   // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);

		// Prepare the statement:
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("UPDATE members SET  email=?, password=?, salt=? WHERE id = ? LIMIT 1")){
		// Bind the variables:
		$insert_stmt->bind_param('sssi', $email, $password, $random_salt, $id);
		// Execute the query:
    
             if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
           }
       }
	  header('Location: ../../login.php');
 		}
	
	
?>