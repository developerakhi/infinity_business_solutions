<?php ob_start();
include_once 'apps/functions/functions.php'; 
$sanitize = true;
$from = filter_input(INPUT_GET, 'from', FILTER_SANITIZE_STRING);
$to = filter_input(INPUT_GET, 'to', FILTER_SANITIZE_STRING);
testing_loggin();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
  window.onload = function() { window.print(); }
  </script>

<style>
 @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
        </style>
    <script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
</head>
<body>
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>  
            <small class="pull-right">Print Date: <?php echo date('d-M-Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
    
      <!-- Table row -->
      <div class="row">
      <h4 style="text-align:center;"> Cash Received Statement <br>
								From <?php echo $from; ?> To <?php echo $to; ?> </h4>
       <div class="col-xs-12 table-responsive">
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
                        if ($stmt = $mysqli->prepare("SELECT date, pro_id, title, item_code, img, price, qty, line_total 
							from sd_order_list
								WHERE   `date` BETWEEN '" . $from . "' AND  '" . $to . "'")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
				        $stmt->store_result();
                        $stmt->bind_result($date, $pro_id, $title, $item_code, $img, $price, $qty, $line_total);
                          }
                        
						while ($stmt->fetch()) { 

                    		  ?>   
                              <span  class="price" style="visibility:hidden; float:left; height:2px;"><?php echo $sell; ?></span>
                            <tr style="background-color: #fbfbfb;">
                               
                                <td style="text-align: center;"><?php echo ++$i;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $title;?><br />
										Code: <?php echo $item_code; ?></td>
                                <td style="text-align: center;"><?php echo $price; ?></td>
                                <td style="text-align: center;"><?php echo $qty; ?></td>
                                <td style="text-align:right;"><?php echo $line_total; ?></td>

                            </tr>					  
   						 	 <?php }
							 		$stmt->close();
					 }
								?>   
                        </tbody>
                    </table>
                </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
             <div class="col-xs-12 table-responsive">

        <!-- accepted payments column -->
        <div class="col-xs-5">
          <p class="lead">&nbsp;</p>
</div>
        <!-- /.col -->
   <div class="col-md-7" style="padding: 0;">
		<?php 			
			$sql = "select sum(line_total) from sd_order_list WHERE   date BETWEEN '" . $from . "' AND  '" . $to . "'";
			$sold = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
			$row_in_total = mysqli_fetch_array($sold); 


			$sql = "select sum(shipping) from sd_order_more WHERE  date BETWEEN '" . $from . "' AND  '" . $to . "'";
			$install = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
			$row_in_retail = mysqli_fetch_array($install); 

											
				?>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%"><h4><strong>Total Order</strong></h4></th>
                <td style="text-align:right;"><h4><strong><?php echo $row_in_total[0]; ?></strong></h4></td>
              </tr>
              <tr>
                <th style="width:50%"><h4><strong>Total Shipping Charge Received</strong></h4></th>
                <td style="text-align:right;"><h4><strong><?php echo $row_in_retail[0]; ?></strong></h4></td>
              </tr>
              <tr>
                <th style="width:50%"><h4><strong>Total Received</strong></h4></th>
                <td style="text-align:right;"><h4><strong><?php echo $row_in_total[0]  + $row_in_retail[0]; ?></strong></h4></td>
              </tr>
             
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>

    </section>
    <table width="307" border="0" align="center" class="no-print">
   <tr>
     <td width="238" align="center"><input id="printpagebutton" type="button" value="Print this page" onclick="printpage()"/>
&nbsp;</td>
     <td width="145" align="center"><a href="sales_statement">Go Back</a></td>
   </tr>
 </table>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  </body>
  </html>