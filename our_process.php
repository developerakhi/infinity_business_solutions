
<!DOCTYPE html>
<html lang="en-US">
<title>All Our Process</title>
<?php include ("include/css_file.php"); ?>
	<body>
		<div class="menu-mask"></div>
		<?php include ("include/header.php"); ?>
		<div class="page-head " style="background-image:url('images/all/our-process.jpg');">
			<div class="inner-desc">
				<div class="container">
					<h1 class="page-title">Our Process</h1>
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
								<h3 class="" style="color: #57b6b2;">OUR PROCESS</h3>
								<h1 class="">More Than Just Outsourcing <br>Scale. Save. Succeed.</h1>
								<div class="article-excerpt">
									<p>Our team comes from similar fields and backgrounds. Because of this, working with Infinity Business Solution feels like turning to your favorite co-worker for advice and support. We work with you to develop a detailed plan so you can make the most of your resources while getting the support you need across a range of business functions. And, should you need to scale quickly, a Infinity Business Solution partnership brings a dedicated team of highly specialized support staff to your side at a moment’s notice.</p>
									<h2>Our Principles</h2>
									<p>An uncompromising commitment to meticulous process governance is essential to our success. We think that long-lasting and fruitful collaborations are facilitated by dependability, transparency, ongoing feedback, and constant delivery.</p>
								</div>
							</div>
						</article>
						
						</section>
					</div>
				</div>
			</div>
		</section>
		<section class="main-view">
		    <?php 
		        global $mysqli;
				$processHome = $mysqli->prepare("SELECT id, title, short_title, photo, description from our_process WHERE activity = 1 ORDER BY id ASC");
				$processHome->execute();   
				$processHome->bind_result($id, $Name, $Short_title, $photo, $description);
				$processHome->store_result();
				$i=0;
				while ($processHome->fetch()) { 
					$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $Name));
					if($i%2==0){
			?> 
			
			<div class="row">
			    <div class="img-bg">
					<div class="left-bg-our">
					    <img src="<?php echo $weburl; ?>public/upload/<?php echo $photo; ?>">
					</div>	
				</div>
				<div class="img-bg">
					<div class="right-bg-our">
					    <div class="right-text">
					        <h3><?php echo $Name; ?></h3>
					        <p><?php echo $description; ?></p>
					    </div>
					</div>	
				</div>
			</div>
			<?php 
			$i++;
					}
					else { ?>
					<div class="row">
        			    <div class="img-bg">
        					<div class="right-bg-our">
        					    <div class="right-text">
        					        <h3><?php echo $Name; ?></h3>
        					        <p><?php echo $description; ?></p>
        					    </div>
        					</div>	
        				</div>
        			    <div class="img-bg">
        					<div class="left-bg-our">
        					    <img src="<?php echo $weburl; ?>public/upload/<?php echo $photo; ?>">
        					</div>	
        				</div>
        			</div>
					
					
					<?php
					    
					   $i++; 
					}
			
			
			
			}$processHome->close();?>
		
			
		</section>
		
		
		<section class="mobile-view">
		    
			<div class="row">
			    <div class="img-bg">
					<div class="left-bg-our">
					    <img src="images/our-left-img.jpg">
					</div>	
				</div>
				<div class="img-bg">
					<div class="right-bg-our">
					    <div class="right-text">
					        <h3>Developmental Planning</h3>
					        <p>Infinity Business Solution creates a customized implementation plan for you following a thorough discovery process with your team. This road map ensures a successful launch and ongoing growth since it includes specific strategies for effectively integrating resources to fulfill both short-term requirements and long-term objectives.</p>
					    </div>
					</div>	
				</div>
			</div>
			
			<div class="row">
			    <div class="img-bg">
					<div class="left-bg-our">
					    <img src="images/our-2.jpeg">
					</div>	
				</div>
			    <div class="img-bg">
					<div class="right-bg-our">
					    <div class="right-text">
					        <h3>Comprehensive Documentation</h3>
					        <p>To make sure Infinity Business Solution and our clients are on the same page and that all documents are up to date, we maintain track of all operations. We are aware that as our collaboration develops, there will be new needs as well as changes to the ones we already have. In order to succeed, both parties must operate from a single, reliable source.</p>
					    </div>
					</div>	
				</div>
			    
			</div>
			
			<div class="row">
			    <div class="img-bg">
					<div class="left-bg-our">
					    <img src="images/our-3.png">
					</div>	
				</div>
				<div class="img-bg">
					<div class="right-bg-our">
					    <div class="right-text">
					        <h3>Repetitive Training Method</h3>
					        <p>The team members at Infinity Business Solution have experience using a variety of platforms for creative production and ad operation. Even though the technology may be identical, we understand that each customer uses these platforms in a unique way. For the purpose of developing a precise, repeatable training procedure, Infinity Business Solution collaborates with our clients' unique requirements. This guarantees that all newly hired remote workers are familiar with the subtleties of client operations. </p>
					    </div>
					</div>	
				</div>
			</div>
			
			<div class="row">
			    <div class="img-bg">
					<div class="left-bg-our">
					    <img src="images/our-4.jpeg">
					</div>	
				</div>
			    <div class="img-bg">
					<div class="right-bg-our">
					    <div class="right-text">
					        <h3>Process Management</h3>
					        <p>The core of Infinity Business Solution's activities is process governance. Reliability, openness, ongoing input, and regular delivery, in our opinion, produce lasting and fruitful cooperation. A Client Success Manager monitors and oversees Infinity Business Solution Teams to guarantee that these values are reflected in each partnership. This crucial function facilitates team management, discussions, and training to guarantee timely delivery of high-quality products with consistent outcomes.</p>
					    </div>
					</div>	
				</div>
			    
			</div>
			
			<div class="row">
			    <div class="img-bg">
					<div class="left-bg-our">
					    <img src="images/our-5.jpeg">
					</div>	
				</div>
				<div class="img-bg">
					<div class="right-bg-our">
					    <div class="right-text">
					        <h3>Review of Business</h3>
					        <p>The cornerstones of Infinity Business Solution business reviews are dedication, responsibility, adaptability, and transparency. Regarding general satisfaction, quality, communication, timeliness, and other critical KPIs that affect the overall health and welfare of our partnerships, we often solicit input from our clients. </p>
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