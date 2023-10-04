<?php require_once("apps/initialize.php"); 
if(isset($_POST['from']))
{
$from = filter_input(INPUT_POST, 'from', FILTER_SANITIZE_STRING);
$to = filter_input(INPUT_POST, 'to', FILTER_SANITIZE_STRING);
}

elseif(isset($_GET['ItemID']))
{
$from = filter_input(INPUT_GET, 'ItemID', FILTER_SANITIZE_STRING);
$to = filter_input(INPUT_GET, 'msgID', FILTER_SANITIZE_STRING);

}
?>

<!--Datepicker Start -->
  <link rel="stylesheet" href="dist/css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      altField: "#alternate",
      altFormat: "DD, d MM, yy"
    });
  });
  
  $(function() {
    $( "#datepicker2" ).datepicker({
      altField: "#alternate",
      altFormat: "DD, d MM, yy"
    });
  });
  </script>
 <!--Datepicker Close -->

 <title>Daily Sales Statement</title>
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
              <h3 class="box-title">Select Two Dates</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
       
             <form action="" enctype="multipart/form-data"  method="POST">
           <div class="box-body">
                <div class="col-md-5">  
                <strong>From</strong>
              	  <div class="form-group">
                 <input type="text" name="from" class="form-control pull-right" value="<?php echo $from; ?>" autocomplete="off" id="datepicker" placeholder="From">
                  </div>
			  </div>
                            
				<div class="col-md-5"> 
                <strong>To</strong>
				<div class="form-group ">			
                    <input type="text" name="to" class="form-control pull-right" autocomplete="off" id="datepicker2" value="<?php echo $to; ?>" placeholder="To">
		 		  </div>
			  </div>
                              
              <div class="col-md-2" style="margin-top: 12px;"> 
				<div class="box-footer button-demo">
              <button class="btn btn-success pull-right"><span class="ladda-label"><i class="fa fa-plus-square"></i> Search Data</span><span class="ladda-spinner"></span></button>
              </div>	 
 				</div>   
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data List</h3>
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            
                <div id="loading" ></div>
				 <div class="box-body table-responsive no-padding"> 
                   
				   <table class="table table-hover">
                          <thead>
							  <tr>
                                <th style="width:3%;text-align: center;">SL</th>
                                <th style="width:8%;">Date</th>
                                <th style="width:15%;">Name</th>
                                <th style="width:7%;text-align: center;">Unit Price</th>
                                <th style="width:4%;text-align: center;">Qty</th>
                                <th style="text-align:right;width:10%;">Total</th>
          					  </tr>
                        </thead>
                       
					   <tbody>
					 <?php 
					 if (isset($from))	{	

						$i = 0; 
                        global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT date, pro_id, title, img, price, qty, line_total 
							from sd_order_list
								WHERE `date` BETWEEN '" . $from . "' AND  '" . $to . "'")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
				        $stmt->store_result();
                        $stmt->bind_result($date, $pro_id, $title,  $img, $price, $qty, $line_total);
                          }
                        
						while ($stmt->fetch()) { 

                    		  ?>   
                              <span  class="price" style="visibility:hidden; float:left; height:2px;"><?php echo $sell; ?></span>
                            <tr style="background-color: #fbfbfb;">
                               
                                <td style="text-align: center;"><?php echo ++$i;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $title;?></td>
                                <td style="text-align: center;"><?php echo number_format ($price); ?></td>
                                <td style="text-align: center;"><?php echo $qty; ?></td>
                                <td style="text-align:right;"><?php echo number_format ($line_total); ?></td>

                            </tr>					  
   						 	 <?php }
							 		$stmt->close();
					 }
								?>   
                        </tbody>
						
						
                    </table>
					
					
                </div>
                
           <?php if (isset($from))	{	?>
            <div class="box-footer clearfix" style="margin: 0;padding: 0;">
             <span class="flash"></span>  
             
               <div class="col-md-6">
          <p class="lead">&nbsp;</p>
		</div>
        <!-- /.col -->
        <div class="col-md-6" style="padding: 0;">
		<?php 			
			$sql = "select sum(line_total) from sd_order_list WHERE date BETWEEN '" . $from . "' AND  '" . $to . "'";
			$sold = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
			$row_in_total = mysqli_fetch_array($sold); 


			$sql = "select sum(shipping) from sd_order_more WHERE date BETWEEN '" . $from . "' AND  '" . $to . "'";
			$install = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
			$row_in_retail = mysqli_fetch_array($install); 

											
				?>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%"><h4><strong>Total Order</strong></h4></th>
                <td style="text-align:right;"><h4><strong><?php echo number_format ($row_in_total[0]); ?></strong></h4></td>
              </tr>
              <tr>
                <th style="width:50%"><h4><strong>Total Shipping Charge Received</strong></h4></th>
                <td style="text-align:right;"><h4><strong><?php echo $row_in_retail[0]; ?></strong></h4></td>
              </tr>
              <tr>
                <th style="width:50%"><h4><strong>Total Received</strong></h4></th>
                <td style="text-align:right;"><h4><strong><?php echo number_format ($row_in_total[0]  + $row_in_retail[0]); ?></strong></h4></td>
              </tr>
             
            </table>
          </div>
        </div>
            </div>
                   <?php } ?>          <!-- /.box-body -->
                      </div>
                <!-- /.box -->
      		 </div>
     	</div> 
       <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="print_sales_statement.php?from=<?php echo $from; ?>&to=<?php echo $to; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  