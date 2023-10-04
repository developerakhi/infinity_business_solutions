<?php
include_once 'include/functions.php';
$query ="SELECT * FROM pages WHERE id = 21";
$results = $mysqli->query($query);
$about = $results->fetch_assoc();  

?>
<!DOCTYPE html>
<html lang="en-US">
<title>All Services</title>
<?php include ("include/css_file.php"); ?>
	<body>
		<div class="menu-mask"></div>
		<?php include ("include/header.php"); ?>
		<div class="page-head " style="background-image:url('images/p5.jpg');">
			<div class="inner-desc">
				<div class="container">
					<h1 class="page-title">Mission & Vision</h1>
				</div>
			</div>
		</div>
		
		<div class="about-area">
		    <div class="container">
    		    
                <div class="row">
                    <div class="col-12">
                        <p><?php echo $about['description']; ?></p>
                    </div>
                </div>
        </div>
    </div>
		

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