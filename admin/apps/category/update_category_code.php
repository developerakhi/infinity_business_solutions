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
		move_uploaded_file($file["tmp_name"], "../../../public/upload/" . $basename);
		$old_img = filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_STRING);
		if ($file_name == NULL){ $new_img = $old_img; } else { $new_img = $basename;}
		
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$name = filter_input(INPUT_POST, 'name');
		$menushow = filter_input(INPUT_POST, 'menushow');
		$date = filter_input(INPUT_POST, 'date');
		$link = filter_input(INPUT_POST, 'link');

	
		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("UPDATE categories SET name=?, photo=?, menushow=?, link=?, date=? WHERE id = ? LIMIT 1")){
		$insert_stmt->bind_param('ssssss', $name, $new_img, $menushow, $link, $date, $id);
        $insert_stmt->execute();
		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER'].'');
 	}
	
	
?>