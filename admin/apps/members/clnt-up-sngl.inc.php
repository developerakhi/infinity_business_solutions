<?php	
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/client_stm.php");
?>
<title>Edit Customer</title>
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <a href="all_customer" class="btn btn-lg btn-danger btn-raised btn-label" ><i class="fa fa-users"></i> &nbsp; All Customer <div class="ripple-container"></div></a>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Details</h3>
            </div>
				
			<form action="apps/members/cd-u-cl.php" enctype="multipart/form-data"  method="POST">
				<input type="hidden" name="date" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d"); ?>">
				<div class="box-body">
					<div class="form-group">
						<?php echo $client_mng_out->update_client();?>
					</div>
				</div>
				<div class="box-footer button-demo">
					<button class="ladda-button" name="published" data-color="green" data-style="expand-right" data-size="l">Save Data</button>
				</div>
			</form>
          </div>
        </div>
      </div>
    </section>
  </div>
  
<link rel="stylesheet" href="dist/ladda.min.css">
