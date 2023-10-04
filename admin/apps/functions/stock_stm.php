<?php
class stock_mngmnt {

public function add_stock() 
	{
	global $mysqli;
   	 $stmt = $mysqli->prepare("SELECT menu_id, menu_name FROM menu 
                  ORDER BY menu_name ASC");
     $stmt->execute();
     $stmt->bind_result($id, $menu_name);
	 	echo 
		'   <div class="form-group">
                                <label>Category name <span class="red_star">*</span></label>
                                   <select name="cat" id="drop1" class="form-control" required>
                                     <option value="">Select A Category Name</option>';
								     		 while ($stmt->fetch()) {
            									  echo "<option value='$id'>$menu_name</option>";
												  }
    									 $stmt->close();   
                                  echo '</select>
                            </div>
					<div class="form-group">			
				 		<span id="person"></span>		
				 			   </div>
							   							
							  <div class="form-group">
                                <label>Quantity  <span class="red_star">*</span></label>
                                    <input type="text" name="qty" placeholder="e.g 5" class="form-control" required="required">
                            </div>

					';
			}
			
public function invoice_data() 
	{
	global $mysqli;
	 global $mysqli;
   	 $stmt = $mysqli->prepare("SELECT menu_id, menu_name FROM menu 
                  ORDER BY menu_name ASC");
     $stmt->execute();
     $stmt->bind_result($id, $menu_name);
	 	echo 
		'
		<div class="col-md-4">  
		<div class="form-group">
                                <label>Category name <span class="red_star">*</span></label>
                                   <select name="cat" id="drop1" class="form-control" required>
                                     <option value="">Select A Category Name</option>';
								     		 while ($stmt->fetch()) {
            									  echo "<option value='$id'>$menu_name</option>";
												  }
    									 $stmt->close();   
                                  echo '</select>
                        	    </div>
							</div>
							
				<div class="col-md-6"> 
					<div class="form-group "><span id="person"></span></div>
				</div>
					';
			}	
			
public function member_l() 
	{
	global $mysqli;
   	 $stmt = $mysqli->prepare("SELECT id, name, customer_id, mobile FROM sd_client 
	 	WHERE type = 1
                  ORDER BY id ASC");
     $stmt->execute();
     $stmt->bind_result($id, $name, $customer_id, $mobile);

	 while ($stmt->fetch()) {
            echo "<option value='$id'>$customer_id ($name)</option>";
				  }
     $stmt->close();   

}		
	
public function area_officer() 
	{
	global $mysqli;
   	 $stmt = $mysqli->prepare("SELECT id, name, mobile FROM sd_client 
	 WHERE type = 2
                  ORDER BY id ASC");
     $stmt->execute();
     $stmt->bind_result($id, $name, $mobile);

	 while ($stmt->fetch()) {
            echo "<option value='$id'>$name ($mobile)</option>";
				  }
     $stmt->close();   

}		
		
public function update_client() 
	{
	if (isset($_GET['ClientID'])) { 
	
		$sanitize = true;
		$cat_name = isset($_GET['ClientID']) ? $_GET['ClientID'] : '';
		$client_id = urlencode($cat_name);

			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, name, mobile, email, address, date from sd_client
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('i', $client_id);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
            $stmt->bind_result($client_id, $name, $mobile, $email, $address, $date);
			$stmt->fetch();
			$stmt->close();
			 
			echo 
			'<div class="form-group">
                                <label class="col-sm-2 control-label">Person name <span class="red_star">*</span></label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" placeholder="Item name" value="'.$client_id.'" class="form-control" required="required">
                                    <input type="text" name="name" placeholder="e.g Md. Monir Hossain" value="'.$name.'" class="form-control" required="required">
                                </div>
                            </div>
							
							  <div class="form-group">
                                <label class="col-sm-2 control-label">Mobile <span class="red_star">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="mobile" placeholder="Mobile Number" value="'.$mobile.'" class="form-control" required="required">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" placeholder="e.g example@stardesignbd.com" value="'.$email.'" class="form-control" required="required">
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Sell Price <span class="red_star">*</span></label>
                                <div class="col-sm-8">
								 <textarea name="address" id="address" cols="50" rows="4" class="form-control" placeholder="City, State, Zip">'.$address.'</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <button class="btn-raised btn-success btn">Save Data <div class="ripple-container"></div></button>
                                </div>
                       </div>';
			}
	}	
		
		public function Randomnumber() {
  		  return substr(str_shuffle(MD5(microtime())), 0, 10);
		 
		}

}
$client_mng_out = new stock_mngmnt();
?>
