<?php
include_once 'include/functions.php';
$query ="SELECT * FROM pages WHERE id = 3";
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
		<div class="page-head " style="background-image:url('<?php echo $weburl; ?>images/infinit.jpg');">
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
							<h3 class="section-heading-title margin-b16" style="color: #57b6b2;"><?php echo $about['title']; ?></h3>
							<h2>Our Background</h2>
							<p><?php echo $about['description']; ?></p>
						</div>
					</div>
				</div>
			</section>
		</div>
			<section>
			    <!--<div class="case-study2 case-2col2 blog-item-masonry finance">-->
					<div class="case-img-holder2">
						<div class="left-div-about">
                            <div class="top-icon-img2 about-values">
                                <h2 class="wp-block-heading">We Stand For</h2>
                                <hr class="wp-block-separator has-text-color has-neve-link-color-color has-alpha-channel-opacity has-neve-link-color-background-color has-background about-values-separator">
                                <figure class="wp-block-image size-full is-resized"><img decoding="async" src="images/icon-brainstorm-75x75.png" alt="icon-brainstorm" class="wp-image-2578" width="70" height="70" srcset="images/icon-brainstorm-75x75.png 140w, images/icon-brainstorm-75x75.png 75w" sizes="(max-width: 70px) 100vw, 70px"></figure>
                                <h3 class="wp-block-heading" style="font-style:normal;font-weight:600">We look after our employees</h3>
                                <p>We value our staff beyond all else. They are the only ones who can ensure that we can fulfill our promise to many of the most dynamic businesses in the globe to provide them with high-quality service and knowledgeable business solutions. We are aware that only talented, content, and motivated individuals can deliver the level of quality and service that Infinity Business Solution does.</p>
                                
                                <figure class="wp-block-image size-full is-resized"><img decoding="async" src="images/icon-discussion.png" alt="icon-brainstorm" class="wp-image-2578" width="70" height="70" srcset="images/icon-discussion.png 140w, images/icon-discussion.png 75w" sizes="(max-width: 70px) 100vw, 70px"></figure>
                                <h3 class="wp-block-heading" style="font-style:normal;font-weight:600">We're Associated with Our Neighborhood</h3>
                                <p>Passion for our local communities and a strong sense of CSR are deeply ingrained values at the core of Infinity Business Solution. We frequently collaborate with neighborhood organizations to aid their initiatives. Our workers help the Thrive organization in Bangladesh fill nutrition shortages for neighborhood kids. Our office in El Salvador routinely contributes to the Fusate organization, which offers complete senior care. US employees are given time to volunteer for issues in their neighborhood communities. For their altruistic desire to help others, our colleagues have made us very proud.</p>
                                
                                <figure class="wp-block-image size-full is-resized"><img decoding="async" src="images/icon-meet-75x75.png" alt="icon-brainstorm" class="wp-image-2578" width="70" height="70" srcset="images/icon-meet-75x75.png 140w, images/icon-meet-75x75.png 75w" sizes="(max-width: 70px) 100vw, 70px"></figure>
                                <h3 class="wp-block-heading" style="font-style:normal;font-weight:600">We're Fixated on Process</h3>
                                <p>Our dedication to process governance is another factor in our success. Reliability, openness, constant feedback, and consistency of delivery, in our opinion, foster meaningful and long-lasting cooperation.</p>
                                
                                
                                <figure class="wp-block-image size-full is-resized"><img decoding="async" src="images/icon-alignment-75x75.png" alt="icon-brainstorm" class="wp-image-2578" width="70" height="70" srcset="images/icon-alignment-75x75.png 140w, images/icon-alignment-75x75.png 75w" sizes="(max-width: 70px) 100vw, 70px"></figure>
                                <h3 class="wp-block-heading" style="font-style:normal;font-weight:600">We Place Relationships Above Instant Success</h3>
                                <p>More than just outsourcing, Infinity Business Solution. We are our clients' reliable partners. Making your life a little bit simpler is our main goal. In all we do, we work very closely together. We go above and above to get to know you and your company so that we can provide strategic, consultative help at every turn.</p>
                                
                                <figure class="wp-block-image size-full is-resized"><img decoding="async" src="images/icon-reports.png" alt="icon-brainstorm" class="wp-image-2578" width="70" height="70" srcset="images/icon-reports.png 140w, images/icon-reports.png 75w" sizes="(max-width: 70px) 100vw, 70px"></figure>
                                <h3 class="wp-block-heading" style="font-style:normal;font-weight:600">We Truly Enjoy What We Do</h3>
                                <p>We are aware of the importance of strong outsourcing partnerships. Many of the members of our team were once clients, partners, or seasoned professionals in the sector who used Infinity Business Solution, trusted the services we offer, and eventually joined our team. We are fully aware of the advantages outsourcing may offer a company, particularly in terms of the quality of the work-life balance for your staff. We believe that what we do enables you to build a stronger workplace with happier people who are better able to concentrate on strategic, value-added tasks.</p>
                                
                            </div>
                        </div>
                        <div class="right-case-img2">
    					    <div class="right-img-2"><img src="images/successful-co-workers-with-digital-tablet.jpg" /></div>
    					</div>
					</div>
				<!--</div>-->
					
				
			</section>

			<section class="section-holder mt-5">
    			<div class="container">
    				<div class="row">
    					<div class="col-lg-8 offset-lg-2 alignc">
    						<h2 class="section-heading-title">Our Team</h2>
    					</div>
    				</div>
    				<div class="row">
    					<?php 
    					global $mysqli;
    					$teamList = $mysqli->prepare("SELECT id, name, designation, photo from team ORDER BY id ASC");
    					$teamList->execute();   
    					$teamList->bind_result($tid, $tName, $tdesignation, $tphoto);
    					$teamList->store_result();
    						while ($teamList->fetch()) { 
    					?> 
    					<div class="col-lg-3">
    						<div class="lawyer-holder lawyer-3col">
    							<img src="<?php echo $weburl; ?>public/upload/<?php echo $tphoto; ?>" class="img-fluid" alt="">
    							<div class="lawyer-position"><?php echo $tdesignation; ?></div>
    							<h2 class="lawyer-title"><a href="#"><?php echo $tName; ?></a></h2>
    						</div>
    					</div>
    					<?php }$teamList->close();?>
				</div>
			</div>
		</section>
		
		<?php include ("include/footer.php"); ?>
	</body>
</html>