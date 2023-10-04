<?php 
include_once 'include/functions.php';
?>
<!DOCTYPE html>
<html lang="en-US">
    <style>
        #login-box {
	position: absolute;
	top: 25%;
	left: 50%;
	transform: translateX(-50%);
	min-width: 350px;
	margin: 0 auto;
	border: 1px solid black;
	background: rgba(48, 46, 45, 1);
	min-height: 250px;
	padding: 20px;
	z-index: 9999;
	border-radius: 25px;
}
    </style>
<title>Infinity Business Solutions</title>
<?php include ("include/css_file.php"); ?>
	<body>
		<div class="menu-mask"></div>
		<?php include ("include/header.php"); ?>
		<div class="slider-container">
			<div class="owl-carousel owl-theme home-slider">
				<?php 
				global $mysqli;
				$servHome = $mysqli->prepare("SELECT id, title, photo, link from slider WHERE activity = 1 ORDER BY id ASC");
				$servHome->execute();   
				$servHome->bind_result($sid, $slName, $sldphoto, $link);
				$servHome->store_result();
					while ($servHome->fetch()) { 
				?> 
				<div class="slider-post slider-item-box">
					<img class="img-fluid" src="public/upload/<?php echo $sldphoto; ?>" alt="">
					<div class="slider-caption">
						<div class="slider-text">
							<h2 class="has-x-large-font-size"><?php echo $slName; ?></h2>
							<h3 class="wp-block-heading">We'll handle the rest.</h3>
							<a class="btn-white learnmore" href="allservice">KNOW MORE ►</a>
						</div>
					</div>
				</div>
				<?php }$servHome->close();?>
			</div>
		</div>

	<div class="page-holder custom-page-template page-full fullscreen-page home-page-content clearfix">
		
		
		<section class="parallax" style="background-image:url('images/all/about_bg.png');">
			<?php
			$query ="SELECT * FROM pages WHERE id = 18";
			$results = $mysqli->query($query);
			$page1 = $results->fetch_assoc();  
			?>
			<div class="container-fluid parallax-content">
				<div class="row">
					<div class="col-lg-8">
						<h2 class="section-heading-title"><?php echo $page1['title']; ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 margin-bm32">
						<div class="aboutfont"><?php echo $page1['description']; ?></div>
					</div>
				</div>
				<div class="view-more margin-t54 alignc"><a class="know-more-btn-bg" href="ourprocess">Know More</a></div>
			</div>
		</section>

       
		
		<section class="">
			<div class="row">
			    
			    <div class="case-study case-2col blog-item-masonry finance" style="background-color: #fff3e7;">
					<div class="case-img-holder">
						<div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="top-icon-img"><img src="images/icon-services-75x75.png" width="75" height="75"></div>
                            <div class="" style="margin: 65px 25px; ">
    							<h4 style="font-family: 'sans-serif';">WHAT WE OFFER</h4>
    							<p style="color: #000;">The teams of our clients in the media, technology, and advertising sectors are extended by our teams. They can simply adapt, increase, and balance internal workloads since they use the same platforms, policies, and processes as our clients. Scale, Save, and Achieve.</p>
    						</div>
                        </div>
					</div>
				</div>
			    
			    
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

	
		
		
		<!--<div class="our-service-section">-->
  <!--              <div class="left-bg">-->
  <!--                  <div class="container">-->
  <!--                      <div class="row">-->
  <!--                          <div class="col-md-12 col-xs-12 col-sm-12">-->
  <!--                              <div class="top-icon-img"><img src="images/icon-services-75x75.png" width="75" height="75"></div>-->
  <!--                          </div>-->
  <!--                          <div class="text">-->
  <!--                              <h4 class="wp-block-heading">WHAT WE OFFER</h4>-->
  <!--                              <h2 class="wp-block-heading">Our work.</h2>-->
  <!--                              <p>The teams of our clients in the media, technology, and advertising sectors are extended by our teams. They can simply adapt, increase, and balance internal workloads since they use the same platforms, policies, and processes as our clients. Scale, Save, and Achieve.</p>-->
  <!--                          </div>-->
  <!--                      </div>-->
  <!--                  </div>-->
  <!--              </div>-->
  <!--              <div class="right-bg">-->
  <!--                  <div class="container">-->
  <!--                      <div class="row">-->
  <!--                          <section class="img-header">-->
  <!--                              <div class="ad-operations">-->
  <!--                                  <h3 class="wp-block-heading">Public Relations</h3>-->
  <!--                                  <p style="font-size: 16px; color: #000;"><strong>Centered on the Specifics. </strong>So that you may concentrate on what is truly important, our specialists handle time-consuming trafficking, reporting, billing, and ad operations responsibilities.</p>-->
  <!--                                  <p class="learnmore"><a href="https://infinitybusinesssolution.org/ad-operations/">KNOW MORE ►</a></p>-->
                                    
  <!--                              </div>-->
  <!--                          </section>-->
  <!--                      </div>-->
  <!--                  </div>-->
  <!--              </div>-->
  <!--          </div>-->
		
		
		
		<section class="howtowork">
			<div class="container-fluid">
				<div class="margin-b72">
					<?php
					$query ="SELECT * FROM pages WHERE id = 19";
					$results = $mysqli->query($query);
					$industry1 = $results->fetch_assoc();  
					?>
					<div class="intro-normal"><?php echo $industry1['title']; ?></div>
					<p><?php echo $industry1['description']; ?></p>
				</div>
				<div class="row practice-items-holder-v2">
					<div class="col-lg-3 col-md-6">
						<div class="practice-item-v2">
							<img src="images/all/work1.png" >
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="practice-item-v2">
							<img src="images/all/work2.png" >
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="practice-item-v2">
							<img src="images/all/work3.png" >
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="practice-item-v2">
							<img src="images/all/work4.png" >
						</div>
					</div>
				
				</div>
			</div>
		</section>
		
	
		<section class="parallax" style="background-image:url('images/all/about_bg.png');">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 alignc">
						<h2 class="paddingtop100 section-heading-title" style="color: #000;">What Our Clients Are Saying</h2>
					</div>
					<div class="col-lg-6">
						<div class="testimonials-container testmonilbg">
							<div class="owl-carousel owl-theme testimonials-slider">
								
								<div class="testimonial-item">
									<div class="testimonial-desc">
										<i class="fas fa-quote-left"></i>
										<h5>Curabitur sit amet ligula vitae lorem consequat condimentum id in mauris. Vivamus pretium aliquet sapien, ut commodo risus. Fusce erat orci, tempus vitae mi ac, interdum sollicitudin felis. Suspendisse elementum turpis vitae libero lobortis laoreet raesent lacinia volutpat.</h5>
									</div>
									<div class="client-name">John Doe</div>
								</div>
								<div class="testimonial-item">
									<div class="testimonial-desc">
										<i class="fas fa-quote-left"></i>
										<h5>Curabitur sit amet ligula vitae lorem consequat condimentum id in mauris. Vivamus pretium aliquet sapien, ut commodo risus. Fusce erat orci, tempus vitae mi ac, interdum sollicitudin felis. Suspendisse elementum turpis vitae libero lobortis laoreet raesent lacinia volutpat.</h5>
									</div>
									<div class="client-name">John Doe</div>
								</div>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="conversation">
			<div class="">
				<div class="row">
					<div class="col-lg-6 conLeft">
						<h2 class="section-heading-title margin-b16 headwhite">Start the Conversation</h2>
						<p>Provide us with your contact info, and a IBS Team Member will reach out to discuss your needs and where we can help.</p>
						<div id="">
							<form action="contact_us_inc.php" enctype="multipart/form-data"  method="POST">
								<div class="row">
								<div class="col-lg-4 margin-b16"><label class="headwhite">Conpany Name</label><input placeholder="Conpany Name" type="text" name="company_name" class="comm-field"/></div>
								<div class="col-lg-4 margin-b16"><label>Your Name</label><input placeholder="Your Name" type="text" name="name" class="comm-field"/> </div>
								<div class="col-lg-4 margin-b16"><label>Email</label><input placeholder="Email" type="email" name="email" class="comm-field" /> </div>
								<div class="col-lg-12 margin-b16"><label>Message</label><textarea placeholder="What Can We Help With?" type="text" name="message" id="msg-contact" rows="5" ></textarea></div>
								<p><input class="submitbtn" class="alignc" type="submit" value="Send message" id="submit"/></p>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 margin-bm54">
						<img class="img-fluid" src="images/all/skills-for-public-relations.jpg" >
					</div>
				</div>
			</div>
		</section>


	</div>
	
		
	<?php include ("include/footer.php"); ?>
	</body>
</html>