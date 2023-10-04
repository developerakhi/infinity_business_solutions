<?php ob_start();
include_once 'apps/functions/functions.php'; 

global $mysqli;
$webSettings = $mysqli->prepare("SELECT id, name, logo, mobile, email, address FROM website_setting WHERE id = 1");
$webSettings->execute();   
$webSettings->store_result();
$webSettings->bind_result($id, $webName, $webLogo, $webMobile, $webEmail, $webAddress);
$webSettings->fetch();
$webSettings->close();	

$sanitize = true;
$orderid = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
$order_id = urlencode($orderid);
						
global $mysqli;
if ($orderView = $mysqli->prepare("SELECT id, order_code, customer_id, customer_name, mobile, email, address, total, shipping, tray, payment_method, payment_status, delivery_status, delivery_type, create_at FROM order_list
WHERE id = ? ")){
$orderView->bind_param('s', $order_id);  
$orderView->execute();    
$orderView->store_result();
$orderView->bind_result($id, $order_code, $customer_id, $customer_name, $customer_mobile, $customer_email, $customer_address, $total_cost, $shipping, $tray, $payment_method, $payment_status, $delivery_status, $delivery_type, $create_at);
$orderView->fetch();
$orderView->close();
}
$orderDate = date( 'j F Y',strtotime($create_at) ) ;

global $mysqli;
$ordStatus = $mysqli->prepare("SELECT status FROM delivery_status WHERE id = ".$delivery_status."");
$ordStatus->execute();   
$ordStatus->store_result();
$ordStatus->bind_result($DstatusName);
$ordStatus->fetch();
$ordStatus->close();

global $mysqli;
$pMethods = $mysqli->prepare("SELECT method, number FROM payment_method WHERE id = ".$payment_method."");
$pMethods->execute();   
$pMethods->store_result();
$pMethods->bind_result($methodName, $methodNumber);
$pMethods->fetch();
$pMethods->close();						  			 
?>
<title><?php echo $webName; ?> - <?php echo $order_code; ?></title>
	<div class="content-wrapper">
    
	<section class="content-header">
		<div class="row">
			<div class="col-md-3">
				<form action="apps/sales/update_order_status.php" enctype="multipart/form-data"  method="POST">
					<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" class="form-control">
					<div class="col-sm-12">
						<label>Select Payment Status</label>
						<select name="payment_status" class="form-control search_bx" onchange='this.form.submit()'>
							<option value="">Select Payment Status</option>
							<option <?php if($payment_status == 'paid') {?> selected <?php } ?> value="paid">Paid</option>
							<option <?php if($payment_status == 'unpaid') {?> selected <?php } ?> value="unpaid">Unpaid</option>
						</select>
					</div>
				</form>
			</div>
			
			<div class="col-md-3">
				<form action="apps/sales/update_order_status.php" enctype="multipart/form-data"  method="POST">
					<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" class="form-control">
					<div class="col-sm-12">
						<label>Select Delivery Status</label>
						<select name="delivery_status" class="form-control search_bx" onchange='this.form.submit()'>
							<option value="">Select Delivery Status</option>
							<?php
							if ($dStatus = $mysqli->prepare("SELECT id, status from delivery_status WHERE activity = 1 AND type = 'sale'
							ORDER BY id ASC ")){
							$dStatus->execute(); 
							$dStatus->bind_result($status_id, $statusName );
							$dStatus->store_result();}
							while ($dStatus->fetch()) {
								echo'
								<option '; if ($status_id == $delivery_status){echo 'selected="selected"';} echo ' value="'.$status_id.'">'.$statusName.'</option>';
							}
							?>
						</select>
					</div>
				</form>
			</div>
			
		</div>
    </section>

    <section class="invoice pd0">
		<div class="col-sm-12 invhead">
			<div class="row invhtop">
				<div class="col-sm-6">
					<table width="100%" border="0" cellspacing="5" cellpadding="5">
					  <tr>
						<td width="" align="">
							<div class="invcompay"><?php echo $webName; ?></div>
							<div><strong> Phone : <?php echo $webMobile; ?></strong></div>
							<div><strong> Email : <?php echo $webEmail; ?></strong></div>
							<div><strong> Address : <?php echo $webAddress; ?></strong></div>
						</td>
					  </tr>
					</table>
				</div>
				<div class="col-sm-6 text-right">
					<div>
						<div class="billin"> BILL/INVOICE </div>
						<strong> Order : <?php echo $order_code; ?></strong><br>
						<strong> Date : <?php echo $orderDate; ?></strong></br>
						<strong> Payment Status : <?php echo ucfirst($payment_status); ?></strong></br>
						<strong> Payment Method : <?php if($payment_method == 0){ ?> Cash on Delivery <?php  }else{?> <?php echo ucfirst($methodName); ?> <?php } ?></strong></br>
						<strong> Delivery Status : <?php echo $DstatusName; ?></strong>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class=""><b> BILL TO </b></div>
					<div><strong> Name : <?php echo $customer_name; ?></strong></div>
					<div><strong> Mobile : <?php echo $customer_mobile; ?></strong></div>
					<div><strong> Email : <?php echo $customer_email; ?></strong></div>
					<div><strong> Address : <?php echo $customer_address; ?></strong></div>
				</div>
				<div class="col-sm-4 text-right">
					<div>
						<script type="text/javascript" src="../assets/qrcode/jquery.qrcode.min.js"></script>
						<div id="output"></div>
						<script>
							jQuery('#output').qrcode({
								type: 'text', 
								text	: "Mobile: <?php echo $customer_mobile; ?>, Order: <?php echo $order_code; ?>",
								'width' : 80,
								'height' : 80
							});
						</script>
					</div>
				</div>
			</div>
		</div>		
    

		<div class="row">
			<div class="col-xs-12 table-responsive">
			  <table class="table table-striped">
				<thead>
				<tr>
					<th style="width:3%;text-align: center;">#</th>
					<th style="width:3%;">Image</th>
					<th style="width:15%;">Product Name</th>
					<th style="width:7%;text-align: center;"> Price</th>
					<th style="width:4%;text-align: center;">Quantity</th>
					<th style="text-align:right;width:10%;">Total</th>
				</tr>
				</thead>
					<tbody id="show">
						<?php 		
							global $mysqli;
							if ($ordrDetail = $mysqli->prepare("SELECT id, name, image, price, quantity, subtotal, tray_position, total_tray, tray_price from order_details
							WHERE order_id = ? ")){
							$ordrDetail->bind_param('s', $order_id);  
							$ordrDetail->execute();    
							$ordrDetail->store_result();
							$ordrDetail->bind_result($id, $pname, $image, $price, $quantity, $subtotal, $tray_position, $total_tray, $tray_price);
							}
							while ($ordrDetail->fetch()) { 
							?>   
							<tr style="background-color: #fbfbfb;">
								<td style="text-align: center;"><?php echo ++$i;?></td>
								<td>  <img  src="../images/products/<?php echo $image; ?>" width="50"></td>
								<td><?php echo $pname;?>
								<?php if($tray_price > 0) {?>
								<form action="apps/sales/update_order_egg_tray.php" enctype="multipart/form-data" method="post">
									<input type="hidden" name="order_id" value="<?php echo $id; ?>" class="form-control">
									<div> <b> Tray : <?php echo ucfirst($tray_position);?> </b>
										<select name="tray_position" class="ueggtry">
											<option <?php if($tray_position == 'buy') {?> selected <?php } ?> value="buy"> Buy </option>
											<option <?php if($tray_position == 'return') {?> selected <?php } ?> value="return"> Return </option>
										</select>
									</div>
									<div> <b> Total Tray : </b> <input type="" class="ueggtry" name="total_tray" value="<?php echo $total_tray;?>"></div>
									<div> <b> Tray Price : Tk</b> <input type="" class="ueggtry" name="tray_price" value="<?php echo $tray_price;?>"> </div>
									<button type="submit"> Update </button>
								</form>
								<?php } ?>
								</td>
								<td style="text-align: center;">Tk <?php echo number_format ($price); ?></td>
								<td style="text-align: center;"><?php echo $quantity; ?></td>
								<td style="text-align:right;">Tk <?php echo number_format ($subtotal); ?></td>
							</tr>
						<?php } $ordrDetail->close();?>   
					</tbody>
			  </table>
			</div>
		</div>

      <div class="row">
        <div class="col-sm-6">
			<p class="lead">&nbsp;</p>
		</div>
		<?php
		global $mysqli;
		$statement = $mysqli->prepare("SELECT sum(subtotal), sum(tray_price) FROM order_details WHERE order_id = ".$order_id."");
		$statement->execute();   
		$statement->store_result();
		$statement->bind_result($subttl, $tray_price);
		$statement->fetch();
		$statement->close();
		
		global $mysqli;
		$statement = $mysqli->prepare("SELECT  tray_position FROM order_details WHERE order_id = ".$order_id."");
		$statement->execute();   
		$statement->store_result();
		$statement->bind_result($trayPosition);
		$statement->fetch();
		$statement->close();
		
		$totalOrder = $subttl + $shipping + $tray_price;
		?>
        <div class="col-sm-6">
          <div class="table-responsive">
            <table class="table">
				<tr>
					<th align="right"><strong>Sub Total</strong></th>
					<td style="text-align:right;"><strong>Tk <?php echo $subttl; ?> </strong></td>
				</tr>
				<tr>
					<th align="right">Delivery Cost</th>
					<td style="text-align:right;"><strong>Tk <?php echo $shipping; ?></strong></td>
				</tr>
				<?php if($trayPosition == 'buy') {?>
				<tr>
					<th align="right">Tray Charge </th>
					<td style="text-align:right;"><strong>Tk <?php echo $tray_price; ?></strong></td>
				</tr>
				<tr>
					<th align="right">Grand Total</th>
					<td style="text-align:right;"><strong>Tk <?php echo $totalOrder; ?></strong></td>
				</tr>
				<?php }else{ ?>
				<tr>
					<th align="right">Tray Charge</th>
					<td style="text-align:right;"><strong>Tk 0</strong></td>
				</tr>
				<tr>
					<th align="right">Grand Total</th>
					<td style="text-align:right;"><strong>Tk <?php echo $total_cost - $tray_price; ?></strong></td>
				</tr>
				<?php } ?>
            </table>
          </div>
        </div>
      </div>

		<div class="row no-print">
			<div class="col-xs-12">
				<a href="#" target="_blank" class="btn btn-default pull-left">
				<i class="fa fa-print"></i> Print</a>
				<a href="all_order" class="btn btn-primary  pull-left" style="margin-left:15px;">
				<i class="fa fa-reply" aria-hidden="true" ></i>&nbsp; Back</a>
			</div>
		</div>
    </section>

    <div class="clearfix"></div>
  </div>