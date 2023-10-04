<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/stn_stm.php");
?>
<title>Change Social Information</title>
 <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Social Information</h3>
            </div>
			<form action="apps/ac_settings/upd_ct.php" enctype="multipart/form-data"  method="POST">
             <input type="hidden" name="date" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d"); ?>">
				<div class="box-body">
                <div class="form-group">
					<?php 		
					$url_link = isset($_GET['msgID']) ? $_GET['msgID'] : 'nothing_yet';
					$u_link = urlencode($url_link);
					if ($u_link == "success"){
					echo '<div class="alert alert-dismissable alert-warning" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
					<i class="fa fa-check"></i>&nbsp; <strong>Edit Successful!</strong>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					</div>';
					}
					else{}
					?>	
					<?php echo $data_out->social_data();?>           
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
     
   