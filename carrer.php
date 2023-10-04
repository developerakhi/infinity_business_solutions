
<!DOCTYPE html>
<html lang="en-US">
<title>All Services</title>
<?php include ("include/css_file.php"); ?>
	<body>
		<div class="menu-mask"></div>
		<?php include ("include/header.php"); ?>
		<div class="page-head " style="background-image:url('images/1200400 (1200 × 400 px).png');">
			<div class="inner-desc">
				<div class="container">
					<h1 class="page-title">Carrer</h1>
				</div>
			</div>
		</div>
		<div class="page-holder custom-page-template page-full fullscreen-page clearfix">
		<section class="doctor-list py-4">
        <div class="container">
            <div class="row">
				<div class="col-md-3 col-xs-12"></div>
                <div class="col-md-6 col-xs-12">
                    <div class="row margin-bott">
                        <div class="col-md-2" style="float:left;">
                            <i class="carrer_icon fa fa-briefcase"></i>
                        </div>
                        <div class="col-md-10">
                            <h1>Carrer Application</h1>
                            <p>Please complete the form below to apply for a position with us.</p>
                        </div>
                    </div>
                </div>
	            <div class="col-md-3 col-xs-12"></div>
            </div>
           
                <!--<div class="row" style="margin-bottom: 40px;">-->
                    <div class="col-md-3 col-xs-12"></div>
                    <div class="card col-md-12">
                        <div class="card-body" style="padding: 2rem 2rem;">
                            <form action="include/carrer_inc.php" method="POST" enctype="multipart/form-data">
                              <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Position</label>
                                <div class="col-sm-6 form-group">
                                  <input type="text" class="form-control" name="position" id="position">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-6 form-group">
                                  <input type="text" class="form-control" name="name" id="name">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Present Address</label>
                                <div class="col-sm-6 form-group">
                                  <input type="text" class="form-control" name="present_address" id="present_address">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Permanent Address</label>
                                <div class="col-sm-6 form-group">
                                  <input type="text" class="form-control" name="permanent_address" id="permanent_address">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-6 form-group">
                                  <input type="text" pattern="[0-9]{11}" class="form-control" name="mobile" id="mobile">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Expectation Salary</label>
                                <div class="col-sm-6 form-group">
                                  <input type="text" class="form-control" name="expectation_salary" id="expectation_salary">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Upload Cv (PDF)</label>
                                <div class="col-sm-6 form-group">
                                  <input type="file" accept=".pdf" class="form-control" name="image" id="image">
                                </div>
                              </div>
                             
                                <div class="row">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-3">
                                        <input class="btn btn-info" style="color: #fff; background-color: #ff9d1b; border: 1px solid #ff9d1b;" type="submit" value="Submit" id="submit"/>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                             
                              <!--<a href="#" class="btn btn-success">Submit</a>-->
                              
                            </form>
                        </div>
                </div>
                <div class="col-md-3 col-xs-12"></div>
            <!--</div>-->
            
        </div>
    </section>
		<br>
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