<?php 
ob_start();
include_once 'include/functions.php';
$sanitize = true;
$serviceID = isset($_GET['service_id']) ? $_GET['service_id'] : '';
$service_id = intval($serviceID);

global $mysqli;
$query ="SELECT * FROM services WHERE activity =  1 and id ='$service_id'";
$results = $mysqli->query($query);
$service = $results->fetch_assoc(); 
$dateFormate = date('j F Y', strtotime($service['create_at']));
?>
<!DOCTYPE html>
<html lang="en-US">
<title><?php echo $service['title']; ?></title>
<?php include ("include/css_file.php"); ?>
	<body>
		<div class="menu-mask"></div>
		<?php include ("include/header.php"); ?>
		<div class="page-head " style="background-image:url('<?php echo $weburl; ?>public/upload/<?php echo $service['photo']; ?>');">
			<div class="inner-desc">
				<div class="container">
					<h1 class="page-title"><?php echo $service['title']; ?></h1>
				</div>
			</div>
		</div>
		<div class="page-holder custom-page-template page-full fullscreen-page clearfix">
		<section class="blog-1col-list-left">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 posts-fullwidth">
						<section id="wrap-content" class="blog-1col layout-1col-fw">
						
						<article class="blog-item blog-item-1col">
							<div class="post-holder post-holder-all">
								<ul class="blog-date">
									<li class="meta-date"><?php echo $dateFormate; ?></li>
								</ul>
								<h2 class="blog-title"><?php echo $service['title']; ?></h2>
								<div class="article-excerpt">
									<p><?php echo $service['description']; ?></p>
								</div>
							</div>
						</article>
						
						</section>
					</div>
				</div>
			</div>
		</section>
		<section class="">
			<h2 class="section-heading-title">Other Services</h2>
			<div class="row">
				<?php 
				global $mysqli;
				$servHome = $mysqli->prepare("SELECT id, title, short_title, photo from services WHERE id != '$service_id' ORDER BY id ASC");
				$servHome->execute();   
				$servHome->bind_result($sid, $sName, $sShort_title, $Sphoto);
				$servHome->store_result();
					while ($servHome->fetch()) { 
					$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $sName));
				?> 
					<div class="case-study case-2col blog-item-masonry finance ">
						<div class="case-img-holder">
							<a href="<?php echo $weburl; ?>service/<?php echo $sid ?>/<?php echo $slug ?>">
								<div class="case-img" style="background-image:url(<?php echo $weburl; ?>public/upload/<?php echo $Sphoto; ?>);"></div>
							</a>
						</div>
						<div class="case-content-v1">
							<h4><a href="<?php echo $weburl; ?>service/<?php echo $sid ?>/<?php echo $slug ?>"><?php echo $sName; ?></a></h4>
							<ul class="case-categ">
								<li><?php echo $sShort_title; ?></li>
							</ul>
							<a href="<?php echo $weburl; ?>service/<?php echo $sid ?>/<?php echo $slug ?>"><div class="case-plus">Know More <i class="fas fa-angle-double-right"></i></div></a>
						</div>
					</div>
				<?php }$servHome->close();?>
			</div>
		</section>
		</div>
	<?php include ("include/footer.php"); ?>
	</body>
</html>