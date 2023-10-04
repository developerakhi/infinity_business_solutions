<?php
include_once '../functions/functions.php'; 
testing_loggin();

 	if (isset($_POST['id'])) {
		
		 // Getting uploaded file
		$file = $_FILES["photo"];
		$file_name = $file["name"];
		$filename   = uniqid() .''. time(); //
		$extension  = pathinfo( $file["name"], PATHINFO_EXTENSION ); 
		$basename   = $filename . ".". $extension; 
		// Uploading in "uplaods" folder
		move_uploaded_file($file["tmp_name"], "../../../public/upload/" . $basename);
		$old_img = filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_STRING);
		if ($file_name == NULL){ $new_img = $old_img; } else { $new_img = $basename;}
	
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
		$process_color = filter_input(INPUT_POST, 'process_color', FILTER_SANITIZE_STRING);
		$short_title = filter_input(INPUT_POST, 'short_title');
		$description = filter_input(INPUT_POST, 'description');
	
		global $mysqli;
		if ($updateStm = $mysqli->prepare("UPDATE our_process SET title=?,  photo=?, short_title=?, description=? WHERE id = ? LIMIT 1")){
		$updateStm->bind_param('sssss', $title, $new_img, $short_title, $description, $id);
        $updateStm->execute();
    }
	   

			 
		header('Location: ../../all_process/'.$id.'/success');
			 
 	}
	
	
?>