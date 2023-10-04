<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/general_stm.php");

$url_string_id = 1;

global $mysqli;
$webSettings = $mysqli->prepare("SELECT id, name, mobile, email, address, logo, copyright, facebook, google, twitter, instgram, linkedin 
FROM website_setting WHERE id = ?");
$webSettings->bind_param('s', $url_string_id); 
$webSettings->execute();    
$webSettings->store_result();
$webSettings->bind_result($mid, $web_name, $web_mobile, $web_email, $web_address, $web_logo, $web_copyright, $web_facebook, $web_google, $web_twitter, $web_instgram, $web_linkedin);
$webSettings->fetch();
$webSettings->close();
?>
 <title>Website Settings </title>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Website Settings</h3>
				</div>
				<form action="apps/settings/updateSettingCode.php" enctype="multipart/form-data"  method="POST">
				 <input type="hidden" name="update_date" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d h:i:sa"); ?>">
				 <input type="hidden" name="id" value="<?php echo $url_string_id; ?>" class="form-control">
				  <div class="box-body">
					<div class="form-group col-md-4">
						<label>Company Logo</label>
						<input type="file" name="photo"class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
						<input type="hidden" name="photo" value="<?php echo $web_logo; ?>">
						<img id="pic" src="../public/upload/<?php echo $web_logo; ?>" class="weblogo"/>
					</div>
					<div class="form-group col-md-12"> </div>
					<div class="form-group col-md-4">
					  <label>Website Name</label>
					  <input type="text" class="form-control" value="<?php echo $web_name; ?>" name="name">
					</div>
					<div class="form-group col-md-4">
					  <label> Mobile Number </label>
					  <input type="text" class="form-control" value="<?php echo $web_mobile; ?>" name="mobile">
					</div>
					<div class="form-group col-md-4">
					  <label> Email </label>
					  <input type="text" class="form-control" value="<?php echo $web_email; ?>" name="email">
					</div>
					<div class="form-group col-md-6">
					  <label> Address </label>
					  <input type="text" class="form-control" value="<?php echo $web_address; ?>" name="address">
					</div>
					<div class="form-group col-md-6">
					  <label> Copyright </label>
					  <input type="text" class="form-control" value="<?php echo $web_copyright; ?>" name="copyright">
					</div>
					<div class="form-group col-md-4">
					  <label> Facebook </label>
					  <input type="text" class="form-control" value="<?php echo $web_facebook; ?>" name="facebook">
					</div>
					<div class="form-group col-md-4">
					  <label> Google </label>
					  <input type="text" class="form-control" value="<?php echo $web_google; ?>" name="google">
					</div>
					<div class="form-group col-md-4">
					  <label> Twitter </label>
					  <input type="text" class="form-control" value="<?php echo $web_twitter; ?>" name="twitter">
					</div>
					<div class="form-group col-md-4">
					  <label> Instgram </label>
					  <input type="text" class="form-control" value="<?php echo $web_instgram; ?>" name="instgram">
					</div>
					<div class="form-group col-md-4">
					  <label> Linkedin </label>
					  <input type="text" class="form-control" value="<?php echo $web_linkedin; ?>" name="linkedin">
					</div>
					<div class="box-footer button-demo col-md-12">
						<button class="ladda-button" name="published" data-color="green" data-style="expand-right" data-size="l">Save Data</button>
					</div>
				  </div>
				</form>
			</div>
		</div>
		
      </div>
    </section>
  </div>
  
<link rel="stylesheet" href="dist/ladda.min.css">
    
   