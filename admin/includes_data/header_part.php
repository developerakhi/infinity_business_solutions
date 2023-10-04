<?php 
$getID = $_SESSION['user_id'];
if ($stmt = $mysqli->prepare("SELECT id, username, email
FROM members
WHERE id = ?
LIMIT 1")) {
$stmt->bind_param('s', $getID);  // Bind "$email" to parameter.
$stmt->execute();    // Execute the prepared query.
$stmt->store_result();
$stmt->bind_result($user_id, $username, $email);
$stmt->fetch();
}

global $mysqli;
$stmtSite = $mysqli->prepare("SELECT id, name, admin, url FROM website_setting WHERE id = 1");
$stmtSite->execute();   
$stmtSite->store_result();
$stmtSite->bind_result($id, $webname, $adminurl, $weburl);
$stmtSite->fetch();
$stmtSite->close();	
?> 
<header class="main-header">
    <a href="dashboard" class="logo">
		<span class="logo-mini"><?php echo $webname; ?></span>
		<span class="logo-lg"><?php echo $webname; ?></span>
    </a>
    <nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<a target="_new" class="globe" href="<?php echo $weburl; ?>"> <i class="fa fa-globe" aria-hidden="true"></i> </a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
					  <span class="hidden-xs"><?php echo $email; ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
							<p><?php echo $webname; ?><small><span class="hidden-xs"><?php echo $email; ?></span></small></p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
							  <a href="edit_profile" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
							  <a href="includes/logout.php" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
    </nav>
  </header>
  