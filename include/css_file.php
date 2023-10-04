<?php 
require_once("functions.php");

global $mysqli;
$webSettings = $mysqli->prepare("SELECT id, url, logo, mobile, email, address, copyright, facebook, google, twitter, instgram, linkedin FROM website_setting WHERE id = 1");
$webSettings->execute();   
$webSettings->store_result();
$webSettings->bind_result($id, $weburl, $webLogo, $webMobile, $webEmail, $webAddress, $webCopyright, $webFacebook, $webGoogle, $webTwitter, $webInstgram, $webLinkedin);
$webSettings->fetch();
$webSettings->close();	
?><head>
<meta charset="utf-8">
<meta name="viewport" content="width=1024">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="robots" content="<?php echo $weburl; ?>"/>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i%7CCrimson+Text:400,400i,700,700i' rel='stylesheet' type='text/css'>
<link rel='stylesheet' id='bootstrap-css'  href='<?php echo $weburl; ?>css/bootstrap/css/bootstrap.css' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome'  href='<?php echo $weburl; ?>css/fontawesome/css/all.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='owl-carousel'  href='<?php echo $weburl; ?>js/owl-carousel/owl.carousel.css' type='text/css' media='all' />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;700&display=swap" rel="stylesheet">

<link rel='stylesheet' id='lawyers-style-css'  href='<?php echo $weburl; ?>style.css' type='text/css' media='all' />
<link rel="icon" href="<?php echo $weburl; ?>images/all/favicon.png" sizes="32x32" />
<link rel="icon" href="<?php echo $weburl; ?>images/all/favicon.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="<?php echo $weburl; ?>images/all/favicon.png" />
</head>