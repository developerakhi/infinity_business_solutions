<?php
class client_mng {

public function add_client() 
	{
	global $mysqli;
		return '
		<div class="form-group">
                   <label>Person ID  <span class="red_star">*</span></label>
                       <input type="text" name="p_id"  class="form-control" required="required">
                            </div>
		
		<div class="form-group">
                   <label>Person name  <span class="red_star">*</span></label>
                       <input type="text" name="name" placeholder="e.g Md. Monir Hossain" class="form-control" required="required">
                            </div>
							
				 <div class="form-group">
                      <label>Mobile No <span class="red_star">*</span></label>
                           <input type="text" name="mobile" placeholder="Mobile Number" class="form-control" required="required">
                            </div>
							
							  <div class="form-group">
                                <label>Email </label>
                                    <input type="text" name="email" placeholder="e.g example@stardesignbd.com" class="form-control">
                            </div>
														
							<div class="form-group">
                                <label>Address <span class="red_star">*</span></label>
								<textarea name="address" id="address" cols="50" rows="4" class="form-control" placeholder="City, State, Zip"></textarea>
                            </div>
               		 ';
		}
		
		
		
public function update_client() 
	{
	if (isset($_GET['ItemID'])) { 
	
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$client_id = urlencode($cat_name);

			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, name, mobile, email, address, img1, img2, activity, date from sd_client
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('i', $client_id);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
            $stmt->bind_result($client_id, $name, $mobile,  $email, $address, $img1, $img2, $activity, $date);
			$stmt->fetch();
			$stmt->close();
			 
			echo 
			'			<input type="hidden" name="id" placeholder="Item name" value="'.$client_id.'" class="form-control" required="required">
							<div class="form-group col-md-4">
                                <label>First name <span class="red_star">*</span></label>
                                <input type="text" name="name" placeholder="e.g Md. Monir Hossain" value="'.$name.'" class="form-control" required="required">
                            </div>

							
							  <div class="form-group col-md-4">
                                <label>Mobile </label>
                                    <input type="text" name="mobile" placeholder="Mobile Number" value="'.$mobile.'" class="form-control">
                            </div>

							<div class="form-group col-md-4">
                                <label>Email </label>
                                    <input type="text" name="email" placeholder="" value="'.$email.'" class="form-control">
                            </div>
							
							<div class="form-group col-md-12">
                                <label>Address </label>
								 <textarea name="address" id="address" cols="50" rows="4" class="form-control" placeholder="City, State, Zip">'.$address.'</textarea>
                            </div>
							
						
                          ';
			}
	}	
	
public function add_supplier() 
		{
		global $mysqli;
			return '<div class="form-group">
					   <label>Officer Name  <span class="red_star">*</span></label>
						   <input type="hidden" name="type" class="form-control" required="required" value="2">
						   <input type="text" name="name" placeholder="e.g Abdul Hamid" class="form-control" required="required">
						</div>
								
						 <div class="form-group">
							  <label>Mobile No <span class="red_star">*</span></label>
							   <input type="text" name="mobile" placeholder="Mobile Number" class="form-control" required="required">
						</div>
										
					<div class="form-group">
							<label>Address <span class="red_star">*</span></label>
							<textarea name="address" id="address" cols="50" rows="4" class="form-control" placeholder="City, State, Zip"></textarea>
			 		</div>
						 ';
			}	
			
public function update_supplier() 
	{
	if (isset($_GET['ItemID'])) { 
	
		$sanitize = true;
		$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
		$client_id = urlencode($cat_name);

			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, name, mobile, address, date from sd_client
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('i', $client_id);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
            $stmt->bind_result($client_id, $name, $mobile, $address, $date);
			$stmt->fetch();
			$stmt->close();
			 
			echo 
			'<div class="form-group">
                                <label>Officer name <span class="red_star">*</span></label>
                                    <input type="hidden" name="id" placeholder="Item name" value="'.$client_id.'" class="form-control" required="required">
                                    <input type="text" name="name" placeholder="e.g Md. Monir Hossain" value="'.$name.'" class="form-control" required="required">
                            </div>
							
							  <div class="form-group">
                                <label>Mobile <span class="red_star">*</span></label>
                                    <input type="text" name="mobile" placeholder="Mobile Number" value="'.$mobile.'" class="form-control" required="required">
                            </div>
							
							
							<div class="form-group">
                                <label>Address <span class="red_star">*</span></label>
								 <textarea name="address" id="address" cols="50" rows="4" class="form-control" placeholder="City, State, Zip">'.$address.'</textarea>
                            </div>
                            
                          ';
			}
	}			
public function edit_profile() 
	{
			global $mysqli;
			 $client_id = 9;
			$stmt = $mysqli->prepare("SELECT id, email, password from members
			  WHERE id = ?
				LIMIT 1");
			$stmt->bind_param('i', $client_id);  // Bind "$email" to parameter.
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
            $stmt->bind_result($client_id, $email, $password);
			$stmt->fetch();
			$stmt->close();
			 
			echo 
			'
				
							<div class="form-group">
                                <label>Email</label> 
								 <input type="hidden" name="id" placeholder="Item name" value="'.$client_id.'" class="form-control" required="required">
                                    <input type="text" name="email" placeholder="e.g example@stardesignbd.com" value="'.$email.'" class="form-control">
                            </div>
		
                            <div class="form-group">
                                <label>Password <span class="red_star">*</span></label>
                       <input type="password" id="password" name="password" placeholder="Mobile Number" value="'.$password.'" class="form-control" required="required">
                            </div>
							
                          ';
		}	
}
$client_mng_out = new client_mng();
?>
