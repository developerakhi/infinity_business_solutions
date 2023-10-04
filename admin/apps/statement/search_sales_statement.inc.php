<?php ob_start();
include_once 'apps/functions/functions.php'; 
						$sanitize = true;
						$from = isset($_POST['from']) ? $_POST['from'] : '';
						$to = isset($_POST['to']) ? $_POST['to'] : '';
						
						global $mysqli;
						if ($stmt_m = $mysqli->prepare("SELECT customerID, order_id, date FROM sd_order_more
						  WHERE order_id = ? ")){
						$stmt_m->bind_param('s', $client_id);  // Bind "$email" to parameter.
						$stmt_m->execute();    // Execute the prepared query.
						// get variables from result.
						$stmt_m->store_result();
						$stmt_m->bind_result($customerID,  $orderID, $date);
						$stmt_m->fetch();
						$stmt_m->close();
						  }
						  
						$sql = "SELECT id, name, mobile, address, email FROM sd_client  WHERE  id = '".$customerID."'";
						$member = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
						$row_member = mysqli_fetch_assoc($member); 
			 ?>
  <title>Invoice</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#<?php echo $orderID; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
   

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                                <th style="width:3%;text-align: center;">SL</th>
                                <th style="width:20%;">Item Name</th>
                                <th style="width:8%;">Item Code</th>
                                <th style="width:10%;text-align: center;">Unit Price</th>
                                <th style="width:4%;text-align: center;">Qty</th>
                                <th style="text-align:right;width:10%;">Line Total</th>
            </tr>
            </thead>
            <tbody id="show">
                
                	<?php $i = 0; ?>
          			   <?php 		
                        global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT cat, pro_id, title, item_code,	price, qty, line_total from sd_order_list
						WHERE orderID = ? ")){
						$stmt->bind_param('s', $client_id);  // Bind "$email" to parameter.
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
				        $stmt->store_result();
                        $stmt->bind_result($cat, $pro_id, $title, $item_code, $price, $qty, $line_total );
                          }
						  
						  while ($stmt->fetch()) { 
						 	if ($stmt_m = $mysqli->prepare("SELECT  menu_id, menu_name from menu
                                    WHERE menu_id = ? ")){
                                $stmt_m->bind_param('s', $cat);  // Bind "$email" to parameter.
                                $stmt_m->execute();    // Execute the prepared query.
                                // get variables from result.
                                $stmt_m->bind_result($menu_id, $menu_name);
                                $stmt_m->store_result();
                                $stmt_m->fetch();
                                $stmt_m->close();
                                  }	
                         if ($stmt_m = $mysqli->prepare("SELECT  id, item_name, item_code, category, sell from sd_item_l
                                    WHERE id = ? ")){
                                $stmt_m->bind_param('s', $pro_id);  // Bind "$email" to parameter.
                                $stmt_m->execute();    // Execute the prepared query.
                                // get variables from result.
                                $stmt_m->bind_result($pro_id, $item_name, $item_code, $category, $sell);
                                $stmt_m->store_result();
                                $stmt_m->fetch();
                                $stmt_m->close();
                                  }	
								  
								$sql = "select sum(sell) from sd_item_l  WHERE id = '".$pro_id."'";
								$q = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
								$row_sales = mysqli_fetch_array($q);
							  
                    		  ?>   
                              <span  class="price" style="visibility:hidden; float:left; height:2px;"><?php echo $sell; ?></span>
                            <tr style="background-color: #fbfbfb;">
                               
                                <td style="text-align: center;"><?php echo ++$i;?></td>
                                <td><?php echo $item_name;?></td>
                                <td><?php echo $item_code; ?></td>
                                <td style="text-align: center;"><?php echo $sell; ?></td>
                                <td style="text-align: center;"><?php echo $qty; ?></td>
                                <td style="text-align:right;">
                                <?php echo $line_total; ?>
                               </td>
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
        <div class="col-xs-6">
          <p class="lead">&nbsp;</p>
</div>
        <!-- /.col -->
        <div class="col-xs-6">
				<?php 			
						$sql = "select sum(line_total) from sd_order_list  WHERE  orderID = '".$client_id."'";
						$sold = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
						$row_in_total = mysqli_fetch_array($sold); 
				
						global $mysqli;
						if ($stmt_m = $mysqli->prepare("SELECT customerID, discount, shipping FROM sd_order_more
						  WHERE order_id = ? ")){
						$stmt_m->bind_param('s', $client_id);  // Bind "$email" to parameter.
						$stmt_m->execute();    // Execute the prepared query.
						// get variables from result.
						$stmt_m->store_result();
						$stmt_m->bind_result($customer_id,  $discount, $shipping);
						$stmt_m->fetch();
						$stmt_m->close();
						  }		
						?>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%"><strong>Subtotal:</strong></th>
                <td style="text-align:right;"><strong><?php echo $row_in_total[0]; ?></strong></td>
              </tr>
              <tr>
                <th><strong>Discount (-)</strong></th>
                <td style="text-align:right;"><strong><?php echo $discount; ?></strong></td>
              </tr>
              <tr>
                <th><strong>Shipping (+)</strong></th>
                <td style="text-align:right;"><strong><?php echo $shipping; ?></strong></td>
              </tr>
              <tr>
                <th><strong>Geand Total:</strong></th>
                <td style="text-align:right;"><strong><?php echo $row_in_total[0] - $discount + $shipping; ?></strong></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="print_invoice.php?ItemID=<?php echo $orderID; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>