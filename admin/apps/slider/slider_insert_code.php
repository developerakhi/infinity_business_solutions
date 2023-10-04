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
		
		$link = filter_input(INPUT_POST, 'link');
		$title = filter_input(INPUT_POST, 'title');
		
      
		global $mysqli;
        if ($insert_stmt = $mysqli->prepare("INSERT INTO slider (link, photo, title) VALUES (?,?,?)")) {
            $insert_stmt->bind_param('sss', $link, $photo, $title);
            $insert_stmt->execute();
			
		header('Location: ../../slider');
       }
 	
?>