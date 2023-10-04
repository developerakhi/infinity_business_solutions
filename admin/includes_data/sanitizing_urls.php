<?php // URL sanitization

$sanitize = true;

$title = isset($_GET['actionID']) ? $_GET['actionID'] : 'nothing yet';
$url_string = urlencode($title);



//****** Dashboard
if($url_string == 'dashboard') 
	{
	$msg100_1 = 'class="active"';
	$msg100 = "active";
	}
	
//****** Category	
if($url_string == 'categories') 
	{
	$active1_1 = 'class="active"';
	$active1 = "active";
	}
	
if($url_string == 'portfolio') 
	{
	$active1_2 = 'class="active"';
	$active1 = "active";
	}
	


// Product
if($url_string == 'add_service') 
	{
	$msg21_1 = 'class="active"';
	$msg21 = "active";
	}
	
if($url_string == 'all_services' || $url_string == 'update_service')
	 {
	$msg21_2 = 'class="active"';
	$msg21 = "active";
	}

if($url_string == 'blog' || $url_string == 'update_blog')
	{
	$msg55_1 = 'class="active"';
	$msg55 = "active";
	}

//Gallery
if($url_string == 'slider')
	 {
	$msgsld_1 = 'class="active"';
	$msgsld = "active";
	}
	
if($url_string == 'team')
	 {
	$msgTeam_1 = 'class="active"';
	$msgTeam = "active";
	}

//Settings
if($url_string == 'website_setting')
	{
	$msgWS_1 = 'class="active"';
	$msgWS = "active";
	}	

	
//Customer
if($url_string == 'edit_home_step_one') 
	{
	$msg80_1 = 'class="active"';
	$msg80 = "active";
	}
	
if($url_string == 'update_home_position')
	 {
	$msg80_2 = 'class="active"';
	$msg80 = "active";
	}
	
if($url_string == 'social_networks')
	 {
	$msg80_3 = 'class="active"';
	$msg80 = "active";
	}
	

	



?>
