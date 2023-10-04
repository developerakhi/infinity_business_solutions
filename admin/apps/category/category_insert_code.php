<?php
ob_start();
include_once '../functions/functions.php';
testing_loggin();
 	if (isset($_POST['name'])) {
		
		// Getting photo
		$file = $_FILES["photo"];
		$filename   = uniqid() .''. time(); //
		$extension  = pathinfo( $file["name"], PATHINFO_EXTENSION ); 
		$basename   = $filename . ".". $extension; 
		// Uploading in "photo" folder
		move_uploaded_file($file["tmp_name"], "../../../public/upload/" . $basename);
		if ($extension == NULL){ $photo = NULL; } else { $photo = $basename;}
		$name = filter_input(INPUT_POST, 'name');
		$link = filter_input(INPUT_POST, 'link');
		
      
		global $mysqli;
        if ($insert_stmt = $mysqli->prepare("INSERT INTO categories (name, link, photo) VALUES (?,?,?)")) {
            $insert_stmt->bind_param('sss', $name, $link, $photo);
            $insert_stmt->execute();
			
		header('Location: ../../categories');
       }
 	}
?>