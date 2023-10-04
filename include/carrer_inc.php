<?php
    include_once '../include/functions.php';
    ob_start();
   session_start();
   
		$file = $_FILES["image"];
		$filename   = uniqid() .''. time(); 
		$extension  = pathinfo( $file["name"], PATHINFO_EXTENSION ); 
		$basename   = $filename . ".". $extension; 
		// Uploading in "image" folder
		move_uploaded_file($file["tmp_name"], "../images/all/" . $basename);
		if ($extension == NULL){ $image = NULL; } else { $image = $basename;}	
					
					
						
if (isset($_POST['position'] , $_POST['name'])) {						
	$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$present_address = filter_input(INPUT_POST, 'present_address', FILTER_SANITIZE_STRING);
	$permanent_address = filter_input(INPUT_POST, 'permanent_address', FILTER_SANITIZE_STRING);
	$mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
	$expectation_salary = filter_input(INPUT_POST, 'expectation_salary', FILTER_SANITIZE_STRING);

	global $mysqli;
        if ($insert_stmt = $mysqli->prepare("INSERT INTO carrer (position, name, present_address, permanent_address, mobile, expectation_salary, image) 
				VALUES (?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssss', $position, $name, $present_address, $permanent_address, $mobile, $expectation_salary, $image);
            $insert_stmt->execute();
       }
       header('Location: ../carrer.php');
      
}


?>