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
		move_uploaded_file($file["tmp_name"], "../../../images/all/" . $basename);
		if ($extension == NULL){ $photo = NULL; } else { $photo = $basename;}
		
		$category_id = filter_input(INPUT_POST, 'category_id');
		$name = filter_input(INPUT_POST, 'name');
		
      
		global $mysqli;
        if ($insert_stmt = $mysqli->prepare("INSERT INTO sub_category (category_id, name, photo) VALUES (?,?,?)")) {
            $insert_stmt->bind_param('sss', $category_id, $name, $photo);
            $insert_stmt->execute();
			
		header('Location: ../../sub_categories');
       }
 	}
?>