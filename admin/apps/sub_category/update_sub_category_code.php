<?php
include_once '../functions/functions.php'; 
testing_loggin();

 	if (isset($_POST['id'])) {
		
		// Thumbnail photo
		$file = $_FILES["photo"];
		$file_name = $file["name"];
		$filename   = uniqid() .''. time(); //
		$extension  = pathinfo( $file["name"], PATHINFO_EXTENSION ); 
		$basename   = $filename . ".". $extension; 
		// Uploading in "uplaods" folder
		move_uploaded_file($file["tmp_name"], "../../../images/all/" . $basename);
		$old_img = filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_STRING);
		if ($file_name == NULL){ $new_img = $old_img; } else { $new_img = $basename;}
		
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$category_id = filter_input(INPUT_POST, 'category_id');
		$name = filter_input(INPUT_POST, 'name');
		$date = filter_input(INPUT_POST, 'date');

	
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("UPDATE sub_category SET category_id=?, name=?, photo=?, date=? WHERE id = ? LIMIT 1")){
		$insert_stmt->bind_param('sssss', $category_id, $name, $new_img, $date, $id);
        $insert_stmt->execute();
		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER'].'');
 	}
	
	
?>