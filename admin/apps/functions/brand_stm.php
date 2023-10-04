<?php
class brnd_d {

public function form_data() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, title, img1, img2 FROM sd_brands
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($b_id, $b_title, $b_img1, $b_img2);
			$stmt->fetch();
			$stmt->close();
			return 
			'
			<input type="hidden" name="b_id" placeholder="Brand ID" value="'.$b_id.'" class="form-control" required="required">
			<input type="hidden" name="pro_img1" value="'.$b_img1.'" class="form-control" required="required">
			<input type="hidden" name="pro_img2" value="'.$b_img2.'" class="form-control" required="required">
			<div class="form-group">
				<div id="upload_area" class="corners align_center"></div>
                        <img src="../images/products/'.$b_img2.'" width="60" alt="img" />
			</div>
			
			<div class="form-group">
			   <label>Title <span class="red_star">*</span></label>
			    <input type="text" name="title" placeholder="Title" value="'.$b_title.'" class="form-control" required="required">
			</div>
			';
			}
}

}
$data_output = new brnd_d();
?>
