<?php
class edit_cat {

public function form_data() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, color_code, color_name FROM sd_color
			  WHERE type = 1 AND id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $color_code, $color_name);
			$stmt->fetch();
			$stmt->close();
			if ($type == 1){ $type_selected1 = 'selected="selected"'; }  
			if ($type == 2){ $type_selected2 = 'selected="selected"'; }  
			echo 
			'<div class="form-group col-md-12">
						  <label>Select Colour</label>
						  <script>
						function setTextColor(picker) {
							document.getElementsByTagName("body")[0].style.color = "#" + picker.toString()
						}
						</script>
						   <input class="jscolor" name="color_code" value="#'.$color_code.'" required style="padding:18px;">
						</div>
						
						<div class="form-group col-md-12">
							 <label>Colour Name</label>
							 <input type="hidden" name="id" placeholder="color_name" value="'.$id.'" class="form-control" required="required">
							 <input type="text" class="form-control" name="color_name" value="'.$color_name.'" autocomplete="off" required placeholder="Colour Name">
						</div>
						
					
				
			';
			}
}


public function clr_data() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT menu_id, menu_name, shipping_charge, meta_desc, meta_key, page_cn, img1, img2, type, activity FROM menu
			  WHERE menu_id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($menu_id, $menu_name, $shipping_charge, $meta_desc, $meta_key, $page_cn, $img1, $img2, $type, $activity);
			$stmt->fetch();
			$stmt->close();
			if ($type == 1){ $type_selected1 = 'selected="selected"'; }  
			if ($type == 2){ $type_selected2 = 'selected="selected"'; }  
			echo 
			'
					  
				<input type="hidden" name="pro_img1" placeholder="Item name" value="'.$img1.'" class="form-control" required="required">
				<input type="hidden" name="pro_img2" placeholder="Item name" value="'.$img2.'" class="form-control" required="required">
				<div id="upload_area" class="corners align_center"></div>
                     <img src="../images/icon/'.$img1.'" width="50" alt="img" />
                 </div>
				 
			<div class="form-group col-md-6">	  
			   <label>Category Name <span class="red_star">*</span></label>
			    <input type="text" name="category_name" placeholder="Category name" value="'.$menu_name.'" class="form-control" required="required">
			    <input type="hidden" name="menu_id" placeholder="Category name" value="'.$menu_id.'" class="form-control" required="required">
			</div>
		
				
			
				
			
				
					<div class="form-group col-md-12"> 
                       <label>Activity<span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="activity" value="1" id="featured_0"'; if ($activity == 1){echo 'checked="checked"';} echo '/>
						  Yes</label>
					   
						<label>
						  <input type="radio" name="activity" value="2" id="featured_1"'; if ($activity == 2){echo 'checked="checked"';} echo '  />
						  No</label>
                    </div>
				 
				 
			';
			}
}




public function update_banner() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, title1, title2, srt, link, img1, img2 FROM banner
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $title1, $title2, $srt, $link, $img1, $img2);
			$stmt->fetch();
			$stmt->close();
			echo 
			'
				<input type="hidden" name="id" value="'.$id.'" class="form-control">	  
				<input type="hidden" name="pro_img1"  value="'.$img1.'" class="form-control" required="required">
				<input type="hidden" name="pro_img2"  value="'.$img2.'" class="form-control" required="required">
				<div id="upload_area" class="corners align_center"></div>
                     <img src="../images/banner/'.$img1.'" width="50" alt="img" />
                 </div>
				 
			<div class="form-group col-md-6">	  
			   <label> Title One </label>
			    <input type="text" name="title1" value="'.$title1.'" class="form-control">
			</div>
			
			<div class="form-group col-md-6">	  
			   <label> Title Two  </label>
			    <input type="text" name="title2" value="'.$title2.'" class="form-control">
			</div>
			
			<div class="form-group col-md-12">	  
			   <label> Link </label>
			    <input type="text" name="link" value="'.$link.'" class="form-control">
			</div>
			
			<div class="form-group col-md-12">
				<label>Short-Description</label>
				<textarea style="height:120px;" type="text" class="form-control" name="srt" placeholder="Short-Description"> '.$srt.' </textarea>
			</div>
				  
				 
			';
			}
}




public function update_blog() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, title, link, sort_desc, img1, img2, activity FROM rk_blog
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $title, $link, $sort_desc, $img1, $img2, $activity);
			$stmt->fetch();
			$stmt->close();
			echo 
			'
					  
				<input type="hidden" name="pro_img1"  value="'.$img1.'" class="form-control" required="required">
				<input type="hidden" name="pro_img2"  value="'.$img2.'" class="form-control" required="required">
				<div id="upload_area" class="corners align_center"></div>
                     <img src="../images/blog/'.$img1.'" width="100" alt="img" />
                 </div>
				 
		
						<div class="form-group col-md-6">
						 <input type="hidden" name="id" value="'.$id.'" class="form-control">
						  <label>Blog Title</label>
						  <input type="text" class="form-control"  value="'.$title.'" required name="title" placeholder="Blog Title">
						</div>
						
						<div class="form-group col-md-6">
						  <label>Link</label>
						  <input type="text" class="form-control"  value="'.$link.'" name="link" placeholder="Link">
						</div>
						
						<div class="form-group col-md-12">
						  <label>Short-Description</label>
						  <textarea style="height:120px;" type="text" class="form-control" name="sort_desc" placeholder="Short-Description"> '.$sort_desc.' </textarea>
						</div>
						
					<div class="form-group col-md-4"> 
                       <label>Activity <span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="activity" value="1" id="featured_0"'; if ($activity == 1){echo 'checked="checked"';} echo '/>
						  Yes</label>
					   
						<label>
						  <input type="radio" name="activity" value="2" id="featured_1"'; if ($activity == 2){echo 'checked="checked"';} echo '  />
						  No</label>
                    </div>
				  
				 
			';
			}
}


public function update_testimonial() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, title, link, sort_desc, img1, img2, activity FROM rk_blog
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $title, $link, $sort_desc, $img1, $img2, $activity);
			$stmt->fetch();
			$stmt->close();
			echo 
			'
					  
				<input type="hidden" name="pro_img1"  value="'.$img1.'" class="form-control" required="required">
				<input type="hidden" name="pro_img2"  value="'.$img2.'" class="form-control" required="required">
				<div id="upload_area" class="corners align_center"></div>
                     <img src="../images/blog/'.$img1.'" width="100" alt="img" />
                 </div>
				 
		
						<div class="form-group col-md-12">
						 <input type="hidden" name="id" value="'.$id.'" class="form-control">
						  <label>Title</label>
						  <input type="text" class="form-control"  value="'.$title.'" required name="title" placeholder="Title">
						</div>
						
						
						<div class="form-group col-md-12">
						  <label>Short-Description</label>
						  <textarea style="height:120px;" type="text" class="form-control" name="sort_desc" placeholder="Short-Description"> '.$sort_desc.' </textarea>
						</div>
						
					<div class="form-group col-md-4"> 
                       <label>Activity <span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="activity" value="1" id="featured_0"'; if ($activity == 1){echo 'checked="checked"';} echo '/>
						  Yes</label>
					   
						<label>
						  <input type="radio" name="activity" value="2" id="featured_1"'; if ($activity == 2){echo 'checked="checked"';} echo '  />
						  No</label>
                    </div>
				  
				 
			';
			}
}


public function update_video() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, title, link, sort_desc, img1, img2, activity FROM rk_blog
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $title, $link, $sort_desc, $img1, $img2, $activity);
			$stmt->fetch();
			$stmt->close();
			echo 
			'
				
						<div class="form-group col-md-12">
						 <input type="hidden" name="id" value="'.$id.'" class="form-control">
						  <label>Title</label>
						  <input type="text" class="form-control"  value="'.$title.'" required name="title" placeholder="Title">
						</div>
						
						<div class="form-group col-md-12">
						  <label>Link</label>
						  <input type="text" class="form-control" value="'.$link.'" name="link" placeholder="Link">
						</div>
						
						<div class="form-group col-md-12">
						  <label>Youtube Video Embed Code (width="100%" height="240")</label>
						  <textarea style="height:120px;" type="text" class="form-control" name="sort_desc" placeholder="Youtube Video Embed Code"> '.$sort_desc.' </textarea>
						</div>
						
						
						
					<div class="form-group col-md-4"> 
                       <label>Activity <span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="activity" value="1" id="featured_0"'; if ($activity == 1){echo 'checked="checked"';} echo '/>
						  Yes</label>
					   
						<label>
						  <input type="radio" name="activity" value="2" id="featured_1"'; if ($activity == 2){echo 'checked="checked"';} echo '  />
						  No</label>
                    </div>
				  
				 
			';
			}
}



public function form_size() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, size FROM sd_color
			  WHERE type = 2 AND id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $size);
			$stmt->fetch();
			$stmt->close();
			if ($type == 1){ $type_selected1 = 'selected="selected"'; }  
			if ($type == 2){ $type_selected2 = 'selected="selected"'; }  
			echo 
			'
			
						
						<div class="form-group col-md-6">
							 <label>Size Name</label>
							 <input type="hidden" name="id" placeholder="color_name" value="'.$id.'" class="form-control" required="required">
							 <input type="text" class="form-control" name="size" value="'.$size.'" autocomplete="off" required placeholder="Size Name">
						</div>
						
					
				
			';
			}
}
		
public function sub_cat_data() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT sub_menu_id, meta_desc, meta_key, page_cn, menu_id, sub_menu, img1, img2
				FROM sub_menu
			 		 WHERE sub_menu_id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($sub_menu_id, $meta_desc, $meta_key, $page_cn, $menu_id, $sub_menu, $img1, $img2);
			$stmt->fetch();
			$stmt->close();

			 global $mysqli;
			 $stmt_m = $mysqli->prepare("SELECT menu_id, menu_name 
			 		FROM menu 
						  ORDER BY menu_id ASC");
			 $stmt_m->execute();
			 $stmt_m->bind_result($mn_id, $menu_name);
   			
			echo 
			'
				<div class="form-group col-md-4">
                     <label>Category name <span class="red_star">*</span></label>
                          <select name="cat" id="drop1" class="form-control" required>
                              <option value="">Select A Category Name</option>';
								      while ($stmt_m->fetch()) {
            							  echo "<option value='$mn_id'"; if ($menu_id == $mn_id){ echo 'selected="selected"'; } echo ">$menu_name</option>";
											  }
    								 $stmt_m->close();   
                                 echo '</select>
                  </div>
				  
				<div class="form-group col-md-8">
					<label>Sub Category name <span class="red_star">*</span></label>
					<input type="text" name="sub_menu" placeholder="Category name" value="'.$sub_menu.'" class="form-control" required="required">
					<input type="hidden" name="sub_menu_id" placeholder="Category name" value="'.$sub_menu_id.'" class="form-control" required="required">
				</div>
				
 				
				  
				  
						<div class="form-group col-md-12 hidden">
							 <label>Meta description  </label>
							 <textarea type="text" name="meta_desc" rows="5" class="form-control"> '.$meta_desc.'</textarea>
						</div>
					 
						<div class="form-group col-md-12 hidden">
							 <label>Meta keywords  </label>
							 <textarea type="text" name="meta_keywords" rows="5" class="form-control"> '.$meta_key.'</textarea>
						</div>
						
						<div class="form-group col-md-12 hidden">
                                <label>Page Footer Details</label>
								<textarea name="editor1"  class="input-style" id="ditor">'.$page_cn.'</textarea>
								 <script>
								  CKEDITOR.replace( "ditor", {
									fullPage: true,
									allowedContent: true,
									extraPlugins: "wysiwygarea"
								  });
							
								</script>        
					  </div>
 				  	
			';
			}
}


public function third_sub_cat_data() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, name, sub_menu_id, meta_desc, meta_key, page_cn,  img1, img2
			 from sd_third_sub
			 	 WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($t_id, $t_menu, $sub_menu_id, $meta_desc, $meta_key, $page_cn, $img1, $img2);
			$stmt->fetch();
			$stmt->close();
			
			global $mysqli;
			 $stmt_m = $mysqli->prepare("SELECT sub_menu_id, sub_menu, menu_id 
			 		FROM sub_menu 
						  ORDER BY sub_menu_id ASC");
			 $stmt_m->execute();
			 $stmt_m->bind_result($ss_sub_menu_id, $ss_sub_menu, $ss_menu_id);
   			
			echo 
			'
					<div class="form-group col-md-12"> 
					   <label>Category name <span class="red_star">*</span></label>
						<input type="text" name="t_menu" placeholder="Category name" value="'.$t_menu.'" class="form-control" required="required">
						<input type="hidden" name="sub_menu_id" placeholder="Category name" value="'.$t_id.'" class="form-control" required="required">
					</div>
					
					
			
			  <div class="form-group col-md-12 hidden">
							 <label>Meta description  </label>
							 <textarea type="text" name="meta_desc" rows="5" class="form-control"> '.$meta_desc.'</textarea>
						</div>
					 
						<div class="form-group col-md-12 hidden">
							 <label>Meta keywords  </label>
							 <textarea type="text" name="meta_keywords" rows="5" class="form-control"> '.$meta_key.'</textarea>
						</div>
						
						<div class="form-group col-md-12 hidden">
                                <label>Page Footer Details</label>
								<textarea name="editor1"  class="input-style" id="ditor">'.$page_cn.'</textarea>
								 <script>
								  CKEDITOR.replace( "ditor", {
									fullPage: true,
									allowedContent: true,
									extraPlugins: "wysiwygarea"
								  });
							
								</script>        
					  </div>
			
			';
			}
}	


public function form_for_hdl() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_cat = urlencode($cat_name);
		
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, title, link home FROM sd_headline
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('s', $url_string_cat);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($hd_id, $title, $link);
			$stmt->fetch();
			$stmt->close();
			echo 
			'				
			    <input type="hidden" name="hd_id" placeholder="Headline ID" value="'.$hd_id.'" class="form-control" required="required">

			   <label>Menu name <span class="red_star">*</span></label>
			    <input type="text" name="title" placeholder="Headline Title" value="'.$title.'" class="form-control" required="required">
					<br />

			   <label>Article Url</label>
			   <textarea name="link" class="form-control" id="exampleInputEmail1" placeholder="Article Link">'.$link.'</textarea>
			   
							';
			}
}	
		
	
public function add_item() 
	{
	
	global $mysqli;
    $stmt = $mysqli->prepare("SELECT menu_id, menu_name FROM menu 
        ORDER BY menu_id ASC");
    $stmt->execute();
    $stmt->bind_result($id, $menu_name);
	echo 
		'
					<div class="form-group col-md-4">
						<label>Category Name <span class="red_star">*</span></label>
							<select name="cat" id="drop1" class="form-control" required>
                              <option value="">Select A Category Name</option>';
						  while ($stmt->fetch()) {
							  echo "<option value='$id'>$menu_name</option>";
								  }
							$stmt->close();   
						echo '</select>
					</div>
					
					<div class="form-group col-md-4" id="person">
					 <label>SubCategory Name </label>
						<select class="form-control">
                            <option value="">Select A SubCategory Name </option>
						</select>
					</div>
					
					<div class="form-group col-md-4">
					 <label>Shop Name </label>
						<select name="shop_id" class="form-control">
                            <option value="">Select A Shop </option>';
							global $mysqli;
							if ($stmt_brnd = $mysqli->prepare("SELECT id, shop_name, name from sd_merchant
							WHERE type = 1 AND activity = 1
								ORDER BY shop_name ASC ")){
							$stmt_brnd->execute(); 
							$stmt_brnd->bind_result($shop_id, $shop_name, $prop_name);
							$stmt_brnd->store_result();
												}
							while ($stmt_brnd->fetch()) {
								echo'
								<option value="'.$shop_id.'">'.$shop_name.'-'.$prop_name.'</option>';
							}									
							echo'
						</select>
					</div>		
					
					<div class="form-group col-md-6">
						<label>Product Name <span class="red_star">*</span></label>
						<input type="text" required name="item_name" placeholder=" " class="form-control" required="required">
					</div>
					
					 <div class="form-group col-md-3">
						<label>Product ID </label>
						<input type="text" name="item_code"  placeholder=" " class="form-control" autocomplete="off">
					 </div>
					 
					<div class="form-group col-md-3">
						<label>Quantity</label>
						<input type="text" name="unit" class="form-control" placeholder="" autocomplete="off">
					</div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Price</label>
							<input type="text" required name="price" class="form-control" data-variavel="field1"   >
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Discounted  Per%</label>
							<input type="text" name="discount_per" class="form-control" data-variavel="field2"    >
						  </div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Discount </label>
							<input type="text" name="discount" class="form-control" data-formula="#field1# * #field2# / 100"   >
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >After Discount</label>
							<input type="text" name="discount_price" class="form-control" data-formula="#field1# - #field1# * #field2# / 100 "  >
						</div>
                    </div>
					
				
 					<div class="form-group col-md-12">
						<label>Short Description  </label>
						<textarea type="text" name="sort_desc" rows="5" class="form-control" autocomplete="off"> </textarea>
					</div>

					<div class="form-group col-md-12">
						<label>Product Details</label>
						<textarea name="editor1"  class="input-style" id="ditor"></textarea>
						 <script>
						  CKEDITOR.replace( "ditor", {
							fullPage: true,
							allowedContent: true,
							extraPlugins: "wysiwygarea"
						  });
						</script>        
					</div>
						
					<div class="form-group col-md-12">
						<label >Product Review (Youtube Embed Code = width:100%; height: 420;) </label>
						<textarea type="text" name="video" class="form-control" > </textarea>
                    </div>
					
					<div class="form-group col-md-4"> 
                       <label>Top Product <span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="top_pro" value="1" />
						  Yes</label>
					   
						<label>
						  <input type="radio" name="top_pro" value="0" checked />
						  No</label>
                    </div>
					
					<div class="form-group col-md-4"> 
                       <label>Popular Product <span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="popular" value="1" />
						  Yes</label>
					   
						<label>
						  <input type="radio" name="popular" value="0" checked />
						  No</label>
                    </div>
					
				';
}
		
public function update_product() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_item = urlencode($cat_name);
			
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, shop_id, item_name, item_code, sub_cat, sub_sub, category, sort_desc, details, video, img1, img2, discount_per, discount, discount_price, price, top_pro, popular, date, up_date, unit, activity 
			FROM sd_item_l
			WHERE id = ? LIMIT 1");
			$stmt->bind_param('i', $url_string_item);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			$stmt->store_result();
			$stmt->bind_result($id, $shop_id, $item_name, $item_code, $sub_cat, $sub_sub, $category, $sort_description, $details, $video, $img12, $img2, $discount_per, $discount, $discount_price, $sell, $top_pro, $popular, $date, $up_date, $unit, $activity);
			$stmt->fetch();
			$stmt->close();
			
			 $stmt = $mysqli->prepare("SELECT menu_id, menu_name FROM menu 
                  ORDER BY menu_id ASC");
			 $stmt->execute();
			 $stmt->store_result();
			 $stmt->bind_result($menu_id, $menu_name);
			 
			 
			$stmt_more = $mysqli->prepare("SELECT id, img1, img2, img3, img4 FROM sd_more_img
					WHERE pro_id = '".$url_string_item."'
                  ORDER BY id ASC");
			$stmt_more->execute();
			$stmt_more->store_result();
			$stmt_more->bind_result($m_id, $m_img1, $m_img2, $m_img3, $m_img4);
			$stmt_more->fetch();
			$stmt_more->close();
		
			 $stmt_sub = $mysqli->prepare("SELECT sub_menu_id, sub_menu FROM sub_menu
  						WHERE menu_id = ? 
                  ORDER BY sub_menu_id ASC");
			 $stmt_sub->bind_param('s', $category); 
			 $stmt_sub->execute();
			 $stmt_sub->store_result();
			 $stmt_sub->bind_result($s_menu_id, $s_menu_name);

			 $stmt_editbrnd = $mysqli->prepare("SELECT id, shop_name, name from sd_merchant
  						WHERE type = 1 AND activity = 1
                  ORDER BY shop_name ASC");
			 $stmt_editbrnd->execute();
			 $stmt_editbrnd->store_result();
			 $stmt_editbrnd->bind_result($sp_id, $sp_shop_name, $sp_name);
			 
			 if ($img1 == NULL){ $image = "photo.png"; } else { $image = $img1;}
			
			if ($up_date == NULL)
			 		{ 
						$last_updated = $date; 
					} 
				else 
					{ 
						$last_updated = $up_date;
					}
			 
			echo 
			' 
		<div class="form-group">
            <input type="hidden" name="pro_id" placeholder="Item name" value="'.$id.'" class="form-control" required="required">
			
						   
						<div id="page">
						  <!-- Our File Inputs -->
						   
							<div class="wrap-custom-file">
								<input type="hidden" name="img1" value="'.$img12.'" class="form-control" >	
								<input type="file" name="image1" id="image1" accept=".gif, .jpg, .png" />
								<label for="image1" style="background-image: url(../images/products/'.$img12.');background-size: cover;background-position: center;">
								  <span>Main Image</span>
								  <i class="fa fa-plus-circle"></i>
								</label>
							</div>
						  
							<div class="wrap-custom-file">
								<input type="hidden" name="img2" value="'.$m_img1.'" class="form-control" >	
								<input type="file" name="image2" id="image2" accept=".gif, .jpg, .png" />
								<label for="image2" style="background-image: url(../images/products/'.$m_img1.');background-size: cover;background-position: center;">
								  <span>Select Image Two</span>
								  <i class="fa fa-plus-circle"></i>
								</label>
							</div>
							
							<div class="wrap-custom-file">
								<input type="hidden" name="img3" value="'.$m_img2.'" class="form-control" >	
								<input type="file" name="image3" id="image3" accept=".gif, .jpg, .png" />
								<label for="image3" style="background-image: url(../images/products/'.$m_img2.');background-size: cover;background-position: center;">
								  <span>Select Image Three</span>
								  <i class="fa fa-plus-circle"></i>
								</label>
							</div>

							<div class="wrap-custom-file">
								<input type="hidden" name="img4" value="'.$m_img3.'" class="form-control" >	
								<input type="file" name="image4" id="image4" accept=".gif, .jpg, .png" />
								<label for="image4" style="background-image: url(../images/products/'.$m_img3.');background-size: cover;background-position: center;">
								  <span>Select Image Four</span>
								  <i class="fa fa-plus-circle"></i>
								</label>
							</div>
							
							<div class="wrap-custom-file">
								<input type="hidden" name="img5" value="'.$m_img4.'" class="form-control" >	
								<input type="file" name="image5" id="image5" accept=".gif, .jpg, .png" />
								<label for="image5" style="background-image: url(../images/products/'.$m_img4.');background-size: cover;background-position: center;">
								  <span>Select Image Five</span>
								  <i class="fa fa-plus-circle"></i>
								</label>
							</div>
						<!-- End Page Wrap -->
						</div>
                      </div>
						
						
						
						<div style="clear:both;"></div>
									
						<div class="form-group col-md-4">
                         <label>Category Name <span class="red_star">*</span></label>
                           <select name="category" class="form-control" required id="drop1">
                              <option value="">Select A Category Name</option>';
							while ($stmt->fetch()) 
										{
							 echo "<option value='$menu_id'"; 
							 if ($category == $menu_id)
									{
							 echo "selected='selected'";
									} 
									echo ">$menu_name</option>";
										}
								 $stmt->close();   
							 echo '</select>
                        </div>


						<div class="form-group col-md-4" id="person">
                         <label>SubCategory name  </label>
                           <select name="sub_cat" class="form-control">
                              <option value="">Select SubCategory Name</option>';
							while ($stmt_sub->fetch()) 
											{
							 echo "<option value='$s_menu_id'"; 
							 if ($sub_cat == $s_menu_id)
									{
							 echo "selected='selected'";
									} 
									echo ">$s_menu_name</option>";
										}
								 $stmt_sub->close();   
							 echo '</select>
                        </div>
						
						<div class="form-group col-md-4" ">
                         <label> Shop Name </label>
                           <select name="shop_id" class="form-control">
                              <option value="0">Select A Shop</option>';
							while ($stmt_editbrnd->fetch()) 
										{
							 echo "<option value='$sp_id'"; 
							 if ($shop_id == $sp_id)
									{
							 echo "selected='selected'";
									} 
									echo ">$sp_shop_name</option>";
										}
								 $stmt_editbrnd->close();   
							 echo '</select>
                         </div>
						
                    <div class="form-group col-md-6">
                        <label>Product Name <span class="red_star">*</span></label>
                        <input type="text" name="item_name" value="'.$item_name.'" class="form-control" required="required">
                    </div>
					
					<div class="form-group col-md-3">
					   <label>Product ID</label>
					   <input type="text" name="item_code" placeholder=" " value="'.$item_code.'" class="form-control">
					</div>
		
					<div class="form-group col-md-3">
					   <label>Unit </label>
					   <input type="text" name="unit" placeholder="pc,kg,litter" value="'.$unit.'" class="form-control">
					</div>
					   
					<div class="form-group col-md-3">
						<div class="span4">
							<label >৳ Price</label>
							<input type="text" required name="price" value="'.$sell.'" class="form-control" data-variavel="field1"   >
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Discounted  Per%</label>
							<input type="text" name="discount_per" value="'.$discount_per.'" class="form-control" data-variavel="field2"    >
						  </div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Discount </label>
							<input type="text" name="discount" value="'.$discount.'" class="form-control" data-formula="#field1# * #field2# / 100"   >
						  </div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
						<label >After Discount</label>
							<input type="text" name="discount_price" value="'.$discount_price.'"  class="form-control" data-formula="#field1# - #field1# * #field2# / 100 "  >
						  </div>
                    </div>
				
					<div class="form-group col-md-12">
                        <label>Short Description </label>
                        <textarea type="text" name="sort_desc"  rows="5" class="form-control"> '.$sort_description.' </textarea>
                    </div>
					
					<div class="form-group col-md-12">
						<label>Item Details</label>					
						<textarea name="editor1"  class="input-style" id="ditor">'.$details.'</textarea>
						 <script>
						  CKEDITOR.replace( "ditor", {
							fullPage: true,
							allowedContent: true,
							extraPlugins: "wysiwygarea"
						  });
						</script>
					</div>
							
					<div class="form-group col-md-12">
						<label >Product Review (Youtube Embed Code = width:100%; height: 420;) </label>
						<textarea type="text" name="video" class="form-control" > '.$video.' </textarea>
                    </div>
							
				
					<div class="form-group col-md-3"> 
                       <label>Top Poduct<span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="top_pro" value="1" '; if ($top_pro == 1){echo 'checked="checked"';} echo '/>
						  Yes</label>
						<label>
						  <input type="radio" name="top_pro" value="0" '; if ($top_pro == 0){echo 'checked="checked"';} echo '  />
						  No</label>
                    </div>
					
					<div class="form-group col-md-3"> 
                       <label>Popular Poduct <span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="popular" value="1" '; if ($popular == 1){echo 'checked="checked"';} echo '/>
						  Yes</label>
						<label>
						  <input type="radio" name="popular" value="0" '; if ($popular == 0){echo 'checked="checked"';} echo '  />
						  No</label>
                    </div>
					
					<div class="form-group col-md-3"> 
                       <label>Activity <span class="red_star">*</span></label>
					       <label>
						  <input type="radio" name="activity" value="1" '; if ($activity == 1){echo 'checked="checked"';} echo '/>
						  Yes</label>
						<label>
						  <input type="radio" name="activity" value="2" '; if ($activity == 2){echo 'checked="checked"';} echo '  />
						  No</label>
                    </div>
					
	'
					   ;
			}
	}	
	
	

public function add_more_img() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_item = urlencode($cat_name);
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id FROM sd_item_l
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('i', $url_string_item);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id);
			$stmt->fetch();
			$stmt->close();
			
	
			echo 
			' 
		<div class="form-group">
             <input type="hidden" name="pro_id" placeholder="Item ID" value="'.$id.'" class="form-control" required="required">
			
			<div id="upload_area" class="corners align_center"></div>
       
        </div>';
	}
}	
		

public function add_slide() 
	{

	global $mysqli;
    $stmt = $mysqli->prepare("SELECT menu_id, menu_name FROM menu 
                  ORDER BY menu_id ASC");
     $stmt->execute();
     $stmt->bind_result($id, $menu_name);
	 
	 echo 
		'
		 
		<div class="form-group col-md-6 hidden">
            <label>Title 1 </label>
            <input type="text" name="title_one" class="form-control">
        </div>
		
		<div class="form-group col-md-6 hidden">
            <label>Title 2</label>
            <input type="text" name="title_two" class="form-control">
        </div>
		
		<div class="form-group col-md-6 hidden">
            <label>Title 3</label>
            <input type="text" name="title_three" class="form-control">
        </div>
		
		<div class="form-group col-md-12">
            <label>Link</label>
            <input type="text" name="link" class="form-control">
        </div>
		';
	}	

public function update_slide() 
	{
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_item = urlencode($cat_name);
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, title_one, title_two, title_three, link, img1, img2, cat from sd_slide_mng
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('i', $url_string_item);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $title_one, $title_two, $title_three, $link, $img1, $img2, $cat);
			$stmt->fetch();
			$stmt->close();	


	global $mysqli;
    $stmt = $mysqli->prepare("SELECT menu_id, menu_name FROM menu 
                  ORDER BY menu_id ASC");
     $stmt->execute();
     $stmt->bind_result($menu_id, $menu_name);

	echo 
		' 
		<div class="form-group">
         <input type="hidden" name="id" placeholder="Item name" value="'.$id.'" class="form-control" required="required">
		 <input type="hidden" name="pro_img1" placeholder="Item name" value="'.$img1.'" class="form-control" required="required">
		 <input type="hidden" name="pro_img2" placeholder="Item name" value="'.$img2.'" class="form-control" required="required">
	
				<div id="upload_area" class="corners align_center"></div>
                     <img src="../images/slider/'.$img1.'" width="60" alt="img" />
                 </div>

		<div class="form-group col-md-6 hidden">
            <label>Title 1 </label>
            <input type="text" name="title_one" value="'.$title_one.'" class="form-control">
        </div>
		
		<div class="form-group col-md-6 hidden">
            <label>Title 2</label>
            <input type="text" name="title_two" value="'.$title_two.'" class="form-control">
        </div>
		
		<div class="form-group col-md-6 hidden">
            <label>Title 3</label>
            <input type="text" name="title_three" value="'.$title_three.'" class="form-control">
        </div>
		
		<div class="form-group col-md-12">
            <label>Link</label>
            <input type="text" name="link" value="'.$link.'" class="form-control">
        </div>
		   
		   ';
}	
	
public function update_more_post() 
	{
	if (isset($_GET['ItemID'])) { 
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_item = urlencode($cat_name);
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, title, full_desc, img1, img2 FROM sd_posts
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('i', $url_string_item);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $title,	$full_desc, $img1, $img2);
			$stmt->fetch();
			$stmt->close();
			
						 
			 if ($img1 == NULL){ $image = "photo.png"; } else { $image = $img1;}
			 if ($up_date == NULL)
			 		{ 
						$last_updated = $date; 
					} 
				else 
					{ 
						$last_updated = $up_date;
					}
			 
			echo 
			' 
		<div class="form-group">
            <input type="hidden" name="id" placeholder="Item name" value="'.$id.'" class="form-control" required="required">			
							
						  <div class="form-group">
                               <label>Title </label>
                               <input type="text" name="title" placeholder="Item Code" value="'.$title.'" class="form-control">
                            </div>

                     
							<div class="form-group">
                                <label>Details</label>
								<textarea name="editor1"  class="input-style" id="ditor">'.$full_desc.'</textarea>
								 <script>
								  CKEDITOR.replace( "ditor", {
									fullPage: true,
									allowedContent: true,
									extraPlugins: "wysiwygarea"
								  });
							
								</script>


                            </div>';							   ;
			}
	}		
	
	
}
$data_out = new edit_cat();
?>
