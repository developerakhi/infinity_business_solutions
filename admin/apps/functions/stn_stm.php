<?php
class edit_cat {

public function social_data() {
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, fc, twitter, google, pin, instagram
				FROM sd_social
					LIMIT 1");
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($sc_id, $fc, $twit, $google, $pin, $instagram);
			$stmt->fetch();
			$stmt->close();
			return 
			'
				<div class="form-group col-md-6">
					<input type="hidden" name="id" value="'.$sc_id.'" class="form-control" required="required">
					<label>Facebook <span class="red_star">*</span></label>
					<input type="text" name="fc" placeholder="Facebook Link" value="'.$fc.'" class="form-control">
				</div>
				   
				<div class="form-group col-md-6">
				   <label>Twitter </label>
				   <input type="text" name="twitter" placeholder="Twitter Link" value="'.$twit.'" class="form-control">
				</div>

				<div class="form-group col-md-6">
				   <label>Google+ </label>
				   <input type="text" name="google" placeholder="Google Link" value="'.$google.'" class="form-control">
				</div>
				
				<div class="form-group col-md-6">
				   <label>Pinterest</label>
				   <input type="text" name="pin" placeholder="Pinterest" value="'.$pin.'" class="form-control">
				</div>
				
				 <div class="form-group col-md-12">
				   <label>Instagram  </label>
				   <input type="text" name="instagram" placeholder="Instagram" value="'.$instagram.'" class="form-control">
				</div>	
				
			';
		}
		
public function currency() {
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT id, currency, date FROM sd_currency WHERE activity = 1 
					LIMIT 1");
			$stmt->execute();    // Execute the prepared query.
			// get variables from result.
			$stmt->store_result();
			$stmt->bind_result($c_id, $currency, $date);
			$stmt->fetch();
			$stmt->close();
			return 
			'
			<div class="form-group col-md-6">
			    <input type="hidden" name="id" placeholder="ID" value="'.$c_id.'" class="form-control" required="required">
				<label>Update Currency <span class="red_star">*</span></label>
			    <input type="text" name="currency" placeholder="Category name" value="'.$currency.'" class="form-control">
			</div>
						  
						 
				
			';
		}
		
		
		
public function company_data() 
	{
			global $mysqli;
			$websiteSitting = $mysqli->prepare("SELECT id, name, mobile, email, address, copyright, logo, bkash, rocket, nagad FROM website_setting
				LIMIT 1");
			$websiteSitting->execute();    // Execute the prepared query.
			$websiteSitting->store_result();
			$websiteSitting->bind_result($id, $name, $mobile, $email, $address, $copyright, $logo, $bkash, $rocket, $nagad);
			$websiteSitting->fetch();
			$websiteSitting->close();
			return 
			'
							<div class="form-group col-md-4">
								<input type="hidden" name="id" value="'.$id.'" class="form-control" required="required">
								<label>Website Name </label>
								<input type="text" name="name" placeholder="Website Name" value="'.$name.'" class="form-control">
							</div>
							
							<div class="form-group col-md-4">
                               <label>Mobile </label>
                               <input type="text" name="mobile" placeholder="Mobile" value="'.$mobile.'" class="form-control">
                            </div>
							
							<div class="form-group col-md-4">
                               <label>Email </label>
                               <input type="email" name="email" placeholder="Email" value="'.$email.'" class="form-control">
                            </div>

							<div class="form-group col-md-12">
                               <label>Address </label>
                               <textarea type="text" name="address" rows="3" class="form-control"> '.$address.' </textarea>
                            </div>
							
							<div class="form-group col-md-4">
                               <label> bKash Number </label>
                               <input type="text" name="bkash" placeholder="bKash Number" value="'.$bkash.'" class="form-control">
                            </div>
							
							<div class="form-group col-md-4">
                               <label>Rocket Number </label>
                               <input type="text" name="rocket" placeholder="Rocket Number" value="'.$rocket.'" class="form-control">
                            </div>
						
							<div class="form-group col-md-4">
                               <label> Nogod Number </label>
                               <input type="text" name="nagad" placeholder="Nogod Number" value="'.$nagad.'" class="form-control">
                            </div>
							
							
				
			';
		}
		
		
}
$data_out = new edit_cat();
?>
