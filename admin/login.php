<?php
include_once 'apps/functions/functions.php';

global $mysqli;
$websiteIn = $mysqli->prepare("SELECT id, name, admin FROM website_setting WHERE id = 1");
$websiteIn->execute();   
$websiteIn->store_result();
$websiteIn->bind_result($id, $webname, $adminurl);
$websiteIn->fetch();
$websiteIn->close();

if (login_check($mysqli) == true) {
    header("Location:".$adminurl."");
	exit;
} else {
    $logged = 'out';
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $webname; ?> - Login</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<link rel="stylesheet" href="dist/css/animate.min.css">

</head>
<body class="hold-transition login-page">    
    
		<div class="login-box">
			<div class="text-center"><a class="webttl" href="<?php echo $adminurl; ?>"><?php echo $webname; ?></a></div>
			<div class="login-box-body">
			  <p class="login-box-msg">Sign in to start your account</p>
			  <form action="includes/process_login.php" method="post" name="login_form" class="form" role="form">   
				<div class="form-group has-feedback">
				  <input name="email" type="email" class="form-control" placeholder="Email" >
				  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
				  <input name="password" type="password" class="form-control" placeholder="Password" >
				  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<?php
				if (isset($_GET['error'])) {
				   echo '<p class="error pull-right bg-danger wow shake">Not Matched</p>';
						 }
				?>  
				<div class="row">
				  <div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat" onclick="formhash(this.form, this.form.password);">Sign In</button>
				  </div>
				  <!-- /.col -->
				</div>
			  </form>
			</div>
		</div>
    

    
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script>
	new WOW().init();
</script>
</body>
  </html>




