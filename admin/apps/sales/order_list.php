<?php require_once("apps/initialize.php"); 
$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
$payment_method = filter_input(INPUT_POST, 'payment_method', FILTER_SANITIZE_STRING);
$payment_status = filter_input(INPUT_POST, 'payment_status', FILTER_SANITIZE_STRING);
$delivery_status = filter_input(INPUT_POST, 'delivery_status', FILTER_SANITIZE_STRING);
?>
<script type="text/javascript">
$(document).ready(function(){
changePagination('0');    
});
function changePagination(pageId){
     $(".flash").show();
     $(".flash").fadeIn(400).html
        ('<div class="text-center"><img src="dist/img/ajax-loader.gif" /></div>');
     var dataString = 'pageId='+ pageId;
     $.ajax({
           type: "POST",
           url: "apps/sales/loadOrder.php",
           data:{
		   search: '<?php echo $search; ?>',
		   payment_method: '<?php echo $payment_method; ?>',
		   payment_status: '<?php echo $payment_status; ?>',
		   delivery_status: '<?php echo $delivery_status; ?>',
           pageId: pageId
        },
           cache: false,
           success: function(result){
           $(".flash").hide();
                 $("#pageData").html(result);
           }
      });

}
</script>

<title>All Order</title>
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<form action="" method="POST">
						<div class="form-group col-md-3">
							<label>Search Order</label>
							<input type="text" name="search" placeholder="<?php if ($search == NULL) {?>Order Code/Customer Name/Mobile/Email<?php }else{ ?> <?php echo $search; ?> <?php }?>" class="form-control" required>  
							<button class="srcbtn" type="submit"> <i class="fa fa-search"></i> </button>
						</div>
						<div class="form-group col-md-3">
							<label>Filter by Payment Method</label>
							<select name="payment_method" class="form-control search_bx" onchange='this.form.submit()'>
								<option value="">Select Payment Method</option>
								<?php
								if ($pMethod = $mysqli->prepare("SELECT id, method from payment_method WHERE activity = 1
								ORDER BY method ASC ")){
								$pMethod->execute(); 
								$pMethod->bind_result($method_id, $methodName );
								$pMethod->store_result();}
								while ($pMethod->fetch()) {
									echo'
									<option '; if ($method_id == $payment_method){echo 'selected="selected"';} echo ' value="'.$method_id.'">'.$methodName.'</option>';
								}
								?>
							</select>
						</div>
					
						<div class="form-group col-md-3">
							<label>Filter Payment Status</label>
							<select name="payment_status" class="form-control search_bx" onchange='this.form.submit()'>
								<option value="">Select Payment Status</option>
								<option <?php if($payment_status == 'paid') {?> selected <?php } ?> value="paid">Paid</option>
								<option <?php if($payment_status == 'unpaid') {?> selected <?php } ?> value="unpaid">Unpaid</option>
							</select>
						</div>
						
						<div class="form-group col-md-3">
							<label>Filter Delivery Status</label>
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
			
			<div class="col-md-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header"><h3 class="box-title">Order List</h3></div>
							<span>
								<div id="loading" ></div>
								<div id="pageData"></div> 
								<div class="box-footer clearfix">
									<span class="flash"></span>  
								</div>
							</span>
							
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
 </div>

