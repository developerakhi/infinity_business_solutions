<!DOCTYPE html>
<html lang="en-US">
<title>Infinity Business Solutions</title>
<?php include ("include/css_file.php"); ?>
	<body>
		<div class="menu-mask"></div>
		<?php include ("include/header.php"); ?>
		<div class="page-head " style="background-image:url('images/all/blog_banner.jpg');">
			<div class="inner-desc">
				<div class="container">
					<h1 class="page-title">Our Blog</h1>
				</div>
			</div>
		</div>

		<div class="page-holder custom-page-template page-full fullscreen-page clearfix">
		<section class="blog-1col-list-left">
			<div class="container">
				<div class="row">
					<?php 
					global $mysqli;
					$blogList = $mysqli->prepare("SELECT id, title, short_title, photo, name, create_at from blog WHERE activity = 1 ORDER BY id ASC");
					$blogList->execute();   
					$blogList->bind_result($bid, $btitle, $bshort_title, $bphoto, $bname, $bcreate_at);
					$blogList->store_result();
						while ($blogList->fetch()) { 
						$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $btitle));
						$dateFormate = date('j F Y', strtotime($bcreate_at));
					?> 
					<div class="col-lg-12 posts-holder post-sidebar ">
						<article class="blog-item blog-item-1col-list">
							<div class="post-image-list">
								<a href="<?php echo $weburl; ?>blog/<?php echo $bid; ?>/<?php echo $slug; ?>">
									<div class="list-image" style="background-image:url('public/upload/<?php echo $bphoto; ?>');"></div>
								</a>
							</div>
							<div class="post-holder ">
								<div class="list-holder">
									<ul class="blog-date">
										<li class="meta-date"><?php echo $dateFormate; ?></li>
									</ul>
									<h2 class="blog-title"><a href="<?php echo $weburl; ?>blog/<?php echo $bid; ?>/<?php echo $slug; ?>"><?php echo $btitle; ?></a></h2>
									<div class="article-excerpt"><?php echo $bshort_title; ?></div>
									<div class="blog-button"><a href="<?php echo $weburl; ?>blog/<?php echo $bid; ?>/<?php echo $slug; ?>">Read MOre</a></div>
								</div>
							</div>
						</article>
					</div>
					<?php }$blogList->close();?>
				</div>
			</div>
		</section>
		</div>

	<?php include ("include/footer.php"); ?>
	</body>

</html>