<?php	require_once("apps/initialize.php"); 
		include_once("sales_stm.php");
		include_once("register.inc.php");
		 ?>
                      <script type="text/JavaScript" src="js/sha512.js"></script> 
            <script type="text/JavaScript" src="js/forms.js"></script>
            <script type="text/javascript" src="js/wow.min.js"></script>
            <script>
                  new WOW().init();
            </script>
        
 <title>Add New Sales Person</title>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <p>
            <!-- general form elements -->
          </p>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Sales Person</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br/>
             Required Fields <span class="red_star">*</span>
                        <div class="box-body">
								<?php 		
								$url_link = isset($_GET['msgID']) ? $_GET['msgID'] : 'nothing_yet';
								$u_link = urlencode($url_link);
								if ($u_link == "success"){
									echo '<div class="alert alert-dismissable alert-warning" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
											<i class="fa fa-check"></i>&nbsp; <strong>New Sales Person Add Successful!</strong> 
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											</div>';
										}
										else{}
										
									echo "<span style='color: red;'>" . $error_msg . "</span>";
									?>
                                    
                                    </div>
       
             <form action="" enctype="multipart/form-data"  method="POST">
             <input type="hidden" name="date" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d"); ?>">
              <div class="box-body">
               
                <div class="form-group">
                  
           		<?php echo $sales_mng->add_new_person();?>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer button-demo">
              <button class="ladda-button" name="published" data-color="green" data-size="l" onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);">Save Data</button>
                
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
<link rel="stylesheet" href="dist/ladda.min.css">
