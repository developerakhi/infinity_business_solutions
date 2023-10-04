		<footer id="footer-v1">
			<div id="footer-conten" >
				<div class="container">
					<div class="row">
						<div class="col-lg-4" >
							<?php
							$query ="SELECT * FROM pages WHERE id = 20";
							$results = $mysqli->query($query);
							$footer = $results->fetch_assoc();  
							?>
							<div class="foo-block">
								<h5 class="widgettitle" >About Us</h5>
								<div class="textwidget">
									<div class="textwidget">
										<p><?php echo $footer['description']; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="foo-block">
								<h5 class="widgettitle">Contact</h5>
								<div class="textwidget">
									<div class="textwidget">
										<p><?php echo $webAddress; ?></p>
										<p>Call: <?php echo $webMobile; ?></p>
										<p>Email: <?php echo $webEmail; ?></p>
										<p style="font-weight: bold; margin: 0 0 10px 0;">USA Office</p>
										<p style="margin: 0 0 10px 0;">438 Hardy Water Dr Lawrenceville Ga 30045</p>
										<p style="margin: 0 0 15px 0;">info@infinitybusinesssolution.org</p>
										<p style="font-weight: bold; margin: 0 0 10px 0;">BANGLADESH Office</p>
										<p style="margin: 0 0 10px 0;">21/4/A Jigatola, Dhanmondi, Dhaka-1209</p>
										<p style="margin: 0 0 10px 0;">Call: +8801603796000</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="foo-block">
								<h5 class="widgettitle">HELPFUL LINKS</h5>
								<div class="textwidget custom-html-widget">
									<ul>
										<li> <a href="<?php echo $weburl; ?>allservice">Services</a></li>
										<li> <a href="<?php echo $weburl; ?>about">About Us</a></li>
										<li> <a href="<?php echo $weburl; ?>mission&vision">Mission & Vision</a></li>
										<!--<li> <a href="<?php echo $weburl; ?>blogs">Blog</a></li>-->
										<li><a href="<?php echo $weburl; ?>privacy-policy">Privacy Policy</a></li>
										<li><a href="<?php echo $weburl; ?>terms-and-conditions">Terms and Conditions</a></li>
										<li><a href="<?php echo $weburl; ?>contactus">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<ul class="footer-social alignc">
						<li><a class="social-facebook" href="<?php echo $webFacebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a class="social-twitter" href="<?php echo $webTwitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a class="social-linkedin" href="<?php echo $webLinkedin; ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
					</ul>
					<div class="foo-copyright alignc">Copyright &copy; 2023 Infinity Business Solutions. Developed SARKARIT</div>
				</div>
			</div>
			
			   
		</footer>
		
<div class="scrollup"> <a class="scrolltop" href="#"> <i class="fa fa-chevron-up"></i> </a></div>

<script src='<?php echo $weburl; ?>js/jquery.js'></script>
<script src='<?php echo $weburl; ?>js/jquery-migrate.min.js'></script>
<script src='<?php echo $weburl; ?>css/bootstrap/js/popper.js'></script>
<script src='<?php echo $weburl; ?>css/bootstrap/js/bootstrap.js'></script>
<script src='<?php echo $weburl; ?>js/easing.js'></script>
<script src='<?php echo $weburl; ?>js/fitvids.js'></script>
<script src='<?php echo $weburl; ?>js/owl-carousel/owl.carousel.js'></script>
<script src='<?php echo $weburl; ?>js/isotope.js'></script>
<script src='<?php echo $weburl; ?>js/jquery.magnific-popup.min.js'></script>
<script src='<?php echo $weburl; ?>js/init.js'></script>
<script src='<?php echo $weburl; ?>js/jquery.form.min.js'></script>
<script src='<?php echo $weburl; ?>js/contactform.js'></script>
<script src='https://code.jquery.com/jquery-1.11.1.min.js'></script>

