<?php ob_start();
include_once 'apps/functions/functions.php'; 
testing_loggin();

include_once("apps/sales/sales_stm.php");

						$sanitize = true;
						$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
						$client_id = urlencode($cat_name);
						
						global $mysqli;
						if ($stmt_m = $mysqli->prepare("SELECT customerID, customer_name, mobile, extra_number, address, billing_address, order_id, discount,  date, time, l_time FROM sd_order_more
						  WHERE order_id = ? ")){
						$stmt_m->bind_param('s', $client_id);  // Bind "$email" to parameter.
						$stmt_m->execute();    // Execute the prepared query.
						// get variables from result.
						$stmt_m->store_result();
						$stmt_m->bind_result($customerID, $customer_name, $customer_mobile, $extra_number, $customer_address, $billing_address, $orderID, $discount, $date, $time, $l_time);
						$stmt_m->fetch();
						$stmt_m->close();
						  }
						  
						$sql = "SELECT id, name, mobile, address, email FROM sd_client  WHERE  id = '".$customerID."'";
						$member = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
						$row_member = mysqli_fetch_assoc($member); 
						
						 
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
  <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
  
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
html,body {
	margin:0;
	padding:0;
	height:99%;
}

.table > thead > tr > th, .table > tr > td, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 6px 8px;
    line-height: 1.45;
    vertical-align: middle;
    border-top: 1px solid #c5c5c5;
    border-right: 1px solid #d1d1d1;
    border-bottom: 1px solid #d1d1d1;
	    border-left: 1px solid #c5c5c5;
    font-size: 13px;
}
.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
        border-top: 1px solid #c5c5c5;
    padding: 8px;
    background-color: #d0e9ff;
}
 @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
		z-index:99;
    }
}


#wrapper {
	min-height:99%;
	position:relative;
	width: 800px;
	margin-right: auto;
	margin-left: auto;
}

#footer22 {
	width:100%;
	height:100px;
	position:absolute;
	bottom:0;
	left:0;
	z-index:0;
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

<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
function getTotal(){
    var total = 0;
    $('.price').each(function(){
        total += parseFloat(this.innerHTML)
    });
    $('.grandtotal').text(total);
}

getTotal();
});//]]> 


</script>

</head>
<body>
<div id="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
		<div style="text-align:center"> 
                <?php $sales_mng_out->company_details(); ?>
               		 </div>
             <hr />
        <!-- /.col -->
      </div>
      
      <!-- info row -->
    <div class="row invoice-info">
      <div class="col-xs-12">
        <div class="col-sm-8 invoice-col">
         <?php 
         	echo "Name: " . $customer_name , '<br>';
            echo "Mobile: " . $customer_mobile , '<br>';
            echo "Extra Number: " . $extra_number, '<br>';
            echo "Address: " .$customer_address, '<br>';
            echo "Billing Address: " .$billing_address;
 
	     ?>
        </div>
        <!-- /.col -->
        <div class="col-lg-4 invoice-col" style="text-align: right; float:right;">
         <address>
           <strong> Invoice ID# <?php echo $client_id; ?></strong><br>
           Date:  <?php echo $date; ?> <br>
           Time:  	<?php echo $l_time; ?>			 <br>
          </address>
        </div>
        </div>
     </div>
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                                <th style="width:3%;text-align: center;">SL</th>
                                <th style="width:8%;">Image</th>
                                <th style="width:15%;">Name</th>
                                <th style="width:7%;text-align: center;">Unit Price</th>
                                <th style="width:4%;text-align: center;">Qty</th>
                                <th style="text-align:right;width:10%;">Total</th>
            </tr>
            </thead>
            <tbody id="show">
                
                	<?php $i = 0; ?>
          			   <?php 		
                        global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT pro_id, title, item_code, img, price, qty, line_total from sd_order_list
						WHERE orderID = ? ")){
						$stmt->bind_param('s', $client_id);  // Bind "$email" to parameter.
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
				        $stmt->store_result();
                        $stmt->bind_result($pro_id, $title, $item_code, $img, $price, $qty, $line_total);
                          }
						  
						  while ($stmt->fetch()) { 

                         if ($stmt_m = $mysqli->prepare("SELECT  id, item_name, item_code from sd_item_l
                                    WHERE id = ? ")){
                                $stmt_m->bind_param('s', $pro_id);  // Bind "$email" to parameter.
                                $stmt_m->execute();    // Execute the prepared query.
                                // get variables from result.
                                $stmt_m->bind_result($pro_id, $item_name, $item_code);
                                $stmt_m->store_result();
                                $stmt_m->fetch();
                                $stmt_m->close();
                                  }	
								  
                    		  ?>   
                              <span  class="price" style="visibility:hidden; float:left; height:2px;"><?php echo $sell; ?></span>
                            <tr style="background-color: #fbfbfb;">
                               
                                <td style="text-align: center;"><?php echo ++$i;?></td>
                                 <td>  <img  src="../images/products/<?php echo $img; ?>" width="100" alt="<?php echo $img; ?>"></td>
                                <td><?php echo $title;?><br />
										Code: <?php echo $item_code; ?></td>
                                <td style="text-align: center;"><?php echo $price; ?></td>
                                <td style="text-align: center;"><?php echo $qty; ?></td>
                                <td style="text-align:right;"><?php echo $line_total; ?></td>
                            </tr>
   						 	 <?php }
							 		$stmt->close();
								?>   
          		 </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
       
        <!-- /.col -->
        <div class="col-sm-8 col-xs-6" style="float:right;">
				<?php 			
						$sql = "select sum(line_total) from sd_order_list  WHERE  orderID = '".$client_id."'";
						$sold = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
						$row_in_total = mysqli_fetch_array($sold); 
				
						global $mysqli;
						if ($stmt_m = $mysqli->prepare("SELECT customerID, discount, shipping, mathod, g_total FROM sd_order_more
						  WHERE order_id = ? ")){
						$stmt_m->bind_param('s', $client_id);  // Bind "$email" to parameter.
						$stmt_m->execute();    // Execute the prepared query.
						// get variables from result.
						$stmt_m->store_result();
						$stmt_m->bind_result($customer_id,  $discount, $shipping, $mathod, $g_total);
						$stmt_m->fetch();
						$stmt_m->close();
						  }		
						?>
          
        
          
            <table class="table">
              <tr>
                <th align="right"><strong>Sub Total</strong></th>
                <td style="text-align:right;"><strong><?php echo $row_in_total[0]; ?></strong></td>
              </tr>
              <tr>
                <th align="right">Discount</th>
                <td style="text-align:right;"><strong><?php echo $discount; ?></strong></td>
              </tr>
              
              <tr>
                <th align="right">Total Amount</th>
                <td style="text-align:right;"><strong><?php echo  $row_in_total[0]  - $discount; ?></strong></td>
              </tr>

              <tr>
                <th align="right">Payment Mathod</th>
                <td style="text-align:right;"><strong><?php echo  $mathod; ?></strong></td>
              </tr>

              <tr>
                <th align="right">Shipping Cost</th>
                <td style="text-align:right;"><strong><?php echo  $shipping; ?></strong></td>
              </tr>
              <tr>
                <th align="right">Grand Total</th>
                <td style="text-align:right;"><strong><?php echo  $row_in_total[0]  - $discount + $shipping; ?></strong></td>
              </tr>
              
              
            </table>
      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

  </div>
  
  <div id="footer22" style="margin-top: 55px;">
  <table width="100%" border="0">
    <tr>
      <td width="25%">Received By    </td>
      <td align="right" width="25%">Authorize Signature </td>
    </tr>
  </table>
  </div>
  
  
    <table width="307" border="0" align="center" class="no-print">
   <tr>
     <td width="238" align="center"><input id="printpagebutton" type="button" value="Print this page" onclick="printpage()"/>
&nbsp;</td>
     <td width="145" align="center"><a href="view_all_retail_invoices">Go Back</a></td>
   </tr>
 </table>
    <!-- /.content -->
    <div class="clearfix"></div>
  </body>
  </html>