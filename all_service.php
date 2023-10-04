
<!DOCTYPE html>
<html lang="en-US">
<title>All Services</title>
<?php include ("include/css_file.php"); ?>
	<body>
		<div class="menu-mask"></div>
		<?php include ("include/header.php"); ?>
		<div class="page-head " style="background-image:url('images/all/e07ca1812a46404aa3b8cea095b77f2f_business-service-landing-page.jpg');">
			<div class="inner-desc">
				<div class="container">
					<h1 class="page-title">All Services</h1>
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
									<li class="meta-date"></li>
								</ul>
								<h3 class="" style="color: #57b6b2;">SERVICES</h3>
								<h1 class="">Trusted Support Where and When You Need It Most</h1>
								<div class="article-excerpt">
									<p>Our team comes from similar fields and backgrounds. Because of this, working with Infinity Business Solution feels like turning to your favorite co-worker for advice and support. We work with you to develop a detailed plan so you can make the most of your resources while getting the support you need across a range of business functions. And, should you need to scale quickly, a Infinity Business Solution partnership brings a dedicated team of highly specialized support staff to your side at a moment’s notice.</p>
									<p>Our core capabilities can be divided into five essential functions. You can build a team or teams in one or multiple business areas depending on your specific needs.</p>
								</div>
							</div>
						</article>
						
						</section>
					</div>
				</div>
			</div>
		</section>
		<section class="">
			<div class="row">
				<?php 
				global $mysqli;
				$servHome = $mysqli->prepare("SELECT id, title, short_title, photo from services WHERE activity = 1 ORDER BY id ASC");
				$servHome->execute();   
				$servHome->bind_result($sid, $sName, $sShort_title, $Sphoto);
				$servHome->store_result();
				while ($servHome->fetch()) { 
					$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $sName));
				?> 
					<div class="case-study case-2col blog-item-masonry finance">
						<div class="case-img-holder">
							<a href="service/<?php echo $sid ?>/<?php echo $slug ?>">
								<div class="case-img" style="background-image:url(public/upload/<?php echo $Sphoto; ?>);"></div>
							</a>
						</div>
						<div class="case-content-v1">
							<h4><a href="service/<?php echo $sid ?>/<?php echo $slug ?>"><?php echo $sName; ?></a></h4>
							<ul class="case-categ">
								<li class="text"><?php echo $sShort_title; ?></li>
							</ul>
							<a href="service/<?php echo $sid ?>/<?php echo $slug ?>"><div class="case-plus">Know More <i class="fas fa-angle-double-right"></i></div></a>
						</div>
					</div>
				<?php }$servHome->close();?>
			</div>
		</section>
		</div>
	<?php include ("include/footer.php"); ?>
	</body>
</html>