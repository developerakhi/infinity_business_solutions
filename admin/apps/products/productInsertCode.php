<?php
ob_start();
include_once '../functions/functions.php';
testing_loggin();
				
if (isset($_POST['category'] , $_POST['name'] , $_POST['price'])) {
	
		// Getting photo
		$file = $_FILES["photo"];
		$filename   = uniqid() .''. time(); //
		$extension  = pathinfo( $file["name"], PATHINFO_EXTENSION ); 
		$basename   = $filename . ".". $extension; 
		// Uploading in "photo" folder
		move_uploaded_file($file["tmp_name"], "../../../images/products/" . $basename);
		if ($extension == NULL){ $photo = NULL; } else { $photo = $basename;}
		
		$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
		$shop_id = filter_input(INPUT_POST, 'shop_id', FILTER_SANITIZE_STRING);
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
		$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
		$sub_cat = filter_input(INPUT_POST, 'sub_cat', FILTER_SANITIZE_STRING);
		$sub_sub = filter_input(INPUT_POST, 'sub_sub', FILTER_SANITIZE_STRING);
		$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
		$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
		$discount_per = filter_input(INPUT_POST, 'discount_per', FILTER_SANITIZE_STRING);
		$discount = filter_input(INPUT_POST, 'discount', FILTER_SANITIZE_STRING);
		$discount_price = filter_input(INPUT_POST, 'discount_price', FILTER_SANITIZE_STRING);
		$wholesale_price = filter_input(INPUT_POST, 'wholesale_price', FILTER_SANITIZE_STRING);
		$wholesale_qty = filter_input(INPUT_POST, 'wholesale_qty', FILTER_SANITIZE_STRING);
		$tray_id = filter_input(INPUT_POST, 'tray_id', FILTER_SANITIZE_STRING);
		$short_details = filter_input(INPUT_POST, 'short_details');
		$full_details = filter_input(INPUT_POST, 'full_details');
		$video = filter_input(INPUT_POST, 'video');
		$top_pro = filter_input(INPUT_POST, 'top_pro', FILTER_SANITIZE_STRING);
		$popular = filter_input(INPUT_POST, 'popular', FILTER_SANITIZE_STRING);
		$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
		
		global $mysqli; 
        if ($DataInsert = $mysqli->prepare("INSERT INTO products (user_id, shop_id, name, code, category, sub_cat, sub_sub, quantity, price, discount_per, discount, discount_price, wholesale_price, wholesale_qty, tray_id, photo, short_details, full_details, video, top_pro, popular, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")) {
            $DataInsert->bind_param('ssssssssssssssssssssss', $user_id, $shop_id, $name, $code, $category, $sub_cat, $sub_sub, $quantity, $price, $discount_per, $discount, $discount_price, $wholesale_price, $wholesale_qty, $tray_id, $photo, $short_details, $full_details, $video, $top_pro, $popular, $date);
            $DataInsert->execute();
		}
		
		$last_pro_id = $mysqli->insert_id;
		
		if (isset($_FILES['multi_photos']['tmp_name'])) {
			for ($i = 0; $i < count($_FILES['multi_photos']['tmp_name']); $i++) {
				$tmpFilePath = $_FILES['multi_photos']['tmp_name'][$i];
				if ($tmpFilePath != "") {
					$filename   = uniqid() .''. time();
					$extension  = pathinfo( $_FILES['multi_photos']["name"][$i], PATHINFO_EXTENSION ); 
					$basename   = $filename.".".$extension; 
					move_uploaded_file($_FILES['multi_photos']['tmp_name'][$i],'../../../images/products/'.$basename);
					
					$type = 1;
					global $mysqli;
					$query = "INSERT INTO upload_files (user_id, pro_id, files, type) VALUES (?,?,?,?)";
					$stmt = $mysqli->prepare($query);
					$stmt->bind_param("ssss", $user_id, $last_pro_id, $basename, $type);
					$stmt->execute();
					$stmt->close();
				}
			}
		}
		
		foreach($_POST['color'] as $row=>$Act)
		{
			$color = $Act; 
			$type = 'color';
			if ($color != null ) {
			
				global $mysqli;
				$query = "INSERT INTO product_attribute (attr_id, product_id, type) VALUES (?, ?, ?)";
				$stmt = $mysqli->prepare($query);
				$stmt->bind_param("sss", $color, $last_pro_id, $type);
				$stmt->execute();
				$stmt->close();
			
			}
		}
		
		foreach($_POST['size'] as $row=>$Act)
		{
			$size = $Act; 
			$type = 'size';
			if ($size != null ) {
			
				global $mysqli;
				$query = "INSERT INTO product_attribute (attr_id, product_id, type) VALUES (?, ?, ?)";
				$stmt = $mysqli->prepare($query);
				$stmt->bind_param("sss", $size, $last_pro_id, $type);
				$stmt->execute();
				$stmt->close();
			
			}
		}
	   
	   
	  
		
	
		header('Location: ../../add_product/521478/success');
 	}
	
?>