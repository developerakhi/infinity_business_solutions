<?php
class advertise_mng {
	
public function update_ads() 
	{
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$url_string_item = urlencode($cat_name);
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, image, url, adsence,  p_1, p_2, p_3, p_4, p_5, p_6, date from sd_ads
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('i', $url_string_item);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($id, $image, $url, $adsence, $p_1, $p_2, $p_3, $p_4, $p_5, $p_6, $date);
			$stmt->fetch();
			$stmt->close();	
			
			if ($p_1 == 1){$checked_1 = 'checked="checked"';}
			if ($p_2 == 1){$checked_2 = 'checked="checked"';}
			if ($p_3 == 1){$checked_3 = 'checked="checked"';}
			if ($p_4 == 1){$checked_4 = 'checked="checked"';}
			if ($p_5 == 1){$checked_5 = 'checked="checked"';}
			if ($p_6 == 1){$checked_6 = 'checked="checked"';}
		
	echo 
		' 
		<div class="form-group">
         <input type="hidden" name="id" placeholder="Item name" value="'.$id.'" class="form-control" required="required">
		 <input type="hidden" name="img" placeholder="Item name" value="'.$image.'" class="form-control" required="required">
	
				<div id="preview" align="center" ></div>     
				 <img src="../images/ads/'.$image.'" width="60" alt="img" />
			</div>
	
		  <label for="exampleInputEmail1">Select Positions</label>        
                  <br />  <br />              
                  <p>
                       <label>
                         <input type="checkbox" name="home_1" value="1" '.$checked_1.' id="CheckboxGroup1_0" />
                         Home Part 01 (W: 260px) </label>
                     
                       <label>
                         <input type="checkbox" name="home_2" value="1" '.$checked_2.' id="CheckboxGroup1_1" />
                         Home Part 02 (W: 555px)
                    </label>
                         
                       <label>
                         <input type="checkbox" name="home_3" value="1" '.$checked_3.' id="CheckboxGroup1_1" />
                         Home Part 03 (W: 260px)
                    </label>
                         
                       <label>
                         <input type="checkbox" name="home_4" value="1" '.$checked_4.' id="CheckboxGroup1_1" />
                         Home Part 04 (W: 555px)
                       </label>
                         
                    <br />
                       
                       <label>
                         <input type="checkbox" name="cat_1" value="1" '.$checked_5.' id="CheckboxGroup1_1" />
                         Category Page Left (W: 260px) </label>
                     

                       <label>
                         <input type="checkbox" name="cat_2" value="1" '.$checked_6.' id="CheckboxGroup1_1" />
                         Details Page Right (W: 260px) </label>
                      
                       
                  </p>
				  
		<div class="form-group">
             <label>Advertise Url <span class="red_star">*</span></label>
             <input type="text" name="ads_url" value="'.$url.'" class="form-control" required="required">
           </div>
					    
		   <div class="form-group">
              <label>Adsence Url <span class="red_star">*</span></label>
			   <textarea name="adsence" class="form-control">'.$adsence.'</textarea>
           </div>';
}	
	
	
}
$advertise_mng = new advertise_mng();
?>
