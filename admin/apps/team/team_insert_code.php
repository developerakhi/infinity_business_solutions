<?php
ob_start();
include_once '../functions/functions.php';
testing_loggin();
 	
		
		// Getting photo
		$file = $_FILES["photo"];
		$filename   = uniqid() .''. time(); //
		$extension  = pathinfo( $file["name"], PATHINFO_EXTENSION ); 
		$basename   = $filename . ".". $extension; 
		// Uploading in "photo" folder
		move_uploaded_file($file["tmp_name"], "../../../public/upload/" . $basename);
		if ($extension == NULL){ $photo = NULL; } else { $photo = $basename;}
		
		$name = filter_input(INPUT_POST, 'name');
		$designation = filter_input(INPUT_POST, 'designation');
		
      
		global $mysqli;
        if ($insert_stmt = $mysqli->prepare("INSERT INTO team (name, photo, designation) VALUES (?,?,?)")) {
            $insert_stmt->bind_param('sss', $name, $photo, $designation);
            $insert_stmt->execute();
			
		header('Location: ../../team');
       }
 	
?>