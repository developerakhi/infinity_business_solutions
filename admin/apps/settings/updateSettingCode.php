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
	
		// Sanitize and validate the data passed in
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
		$copyright = filter_input(INPUT_POST, 'copyright', FILTER_SANITIZE_STRING);
		$facebook = filter_input(INPUT_POST, 'facebook', FILTER_SANITIZE_STRING);
		$google = filter_input(INPUT_POST, 'google', FILTER_SANITIZE_STRING);
		$twitter = filter_input(INPUT_POST, 'twitter', FILTER_SANITIZE_STRING);
		$instgram = filter_input(INPUT_POST, 'instgram', FILTER_SANITIZE_STRING);
		$linkedin = filter_input(INPUT_POST, 'linkedin', FILTER_SANITIZE_STRING);
		$update_date = filter_input(INPUT_POST, 'update_date', FILTER_SANITIZE_STRING);


		global $mysqli;
		if ($insert_stmt = $mysqli->prepare("UPDATE website_setting SET name=?, mobile=?, email=?, address=?, logo=?, copyright=?, facebook=?, google=?, twitter=?, instgram=?, linkedin=?, update_at=? WHERE id = ? LIMIT 1")){
		$insert_stmt->bind_param('sssssssssssss', $name, $mobile, $email, $address, $new_img, $copyright, $facebook, $google, $twitter, $instgram, $linkedin, $update_date, $id);
        $insert_stmt->execute();
		}
		
		header('Location: ../../website_setting/success');
 	}
	
	
?>