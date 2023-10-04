<?php
ob_start();
include_once '../functions/functions.php';
testing_loggin();

 	if (isset($_POST['title'])) {
		
	// Getting uploa Passport file
		$file = $_FILES["photo"];
		$filename   = uniqid() .''. time(); 
		$extension  = pathinfo( $file["name"], PATHINFO_EXTENSION ); 
		$basename   = $filename . ".". $extension; 
		// Uploading in "uplaods" folder
		move_uploaded_file($file["tmp_name"], "../../../public/upload/" . $basename);
		if ($extension == NULL){ $photo = NULL; } else { $photo = $basename;}
	
		$title = filter_input(INPUT_POST, 'title');
		$process_color = null;
		$description = filter_input(INPUT_POST, 'description');
		$short_title = filter_input(INPUT_POST, 'short_title');
    
	  	
	  	global $mysqli;
        if ($insert_stmt = $mysqli->prepare("INSERT INTO our_process (title, process_color, description, short_title, photo) VALUES (?,?,?,?,?)")) {
            $insert_stmt->bind_param('sssss', $title, $process_color, $description, $short_title, $photo);
            $insert_stmt->execute();
		}
	   
	  header('Location: ../../all_process');
	  
	    
 	}
?>