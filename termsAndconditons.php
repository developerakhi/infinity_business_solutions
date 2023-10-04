<?php
include_once 'include/functions.php';
$query ="SELECT * FROM pages WHERE id = 8";
$results = $mysqli->query($query);
$about = $results->fetch_assoc();  
?>
<!DOCTYPE html>
<html lang="en-US">
<title><?php echo $about['title']; ?></title>
<?php include ("include/css_file.php"); ?>
	<body>
		<div class="menu-mask"></div>
		<?php include ("include/header.php"); ?>
		<div class="page-head " style="background-image:url('<?php echo $weburl; ?>images/all/terms-and-conditions.png');">
			<div class="inner-desc">
				<div class="container">
					<h1 class="page-title"><?php echo $about['title']; ?></h1>
				</div>
			</div>
		</div>
		<div class="page-holder custom-page-template page-full fullscreen-page clearfix">
			<section class="section-holder">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12">
							<h2 class="section-heading-title margin-b16"><?php echo $about['title']; ?></h2>
							<p><?php echo $about['description']; ?></p>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include ("include/footer.php"); ?>
	</body>
</html>