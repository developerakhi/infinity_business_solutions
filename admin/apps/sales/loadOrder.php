<?php	
require_once("../functions/functions.php");
$search = $_POST['search'];
$link = $_POST['page_name']. "/" .$_POST['catID'];
$payment_method = $_POST['payment_method'];
$payment_status = $_POST['payment_status'];
$delivery_status = $_POST['delivery_status'];


$query = "select * from order_list WHERE activity = 1";

if ($search != ''){
$query = "select * from order_list WHERE name = '".$search."' ";
}
elseif ($payment_method != ''){
$query = "select * from order_list WHERE activity = 1 AND payment_method = '".$payment_method."' ";
}
elseif ($payment_status != ''){
$query = "select * from order_list WHERE activity = 1 AND payment_status = '".$payment_status."' ";
}
elseif ($delivery_status != ''){
$query = "select * from order_list WHERE activity = 1 AND delivery_status = '".$delivery_status."' ";
}


$res    = mysqli_query($mysqli,$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 15;
$start = ($page-1) * $recordsPerPage;
$adjacents = "2";
    
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count/$recordsPerPage);
$lpm1 = $lastpage - 1;   
$pagination = "";
if($lastpage > 1)
    {   
        $pagination .= "<ul class='pagination pull-right'>";
        if ($page > 1)
            $pagination.= "<li><a href=\"all_order#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='all_order'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"all_order#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<li class='active'><span>$counter</span></li>";
                    else
                        $pagination.= "<li><a href=\"all_order#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"all_order#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"all_order#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"all_order#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"all_order#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"all_order#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"all_order#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"all_order#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           }
           else
           {
               $pagination.= "<li><a href=\"Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                        $pagination.= "<li><a href=\"all_order#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"all_order#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='all_order'>Next &raquo;</a></li>";
        
        $pagination.= "</ul>";       
    }
    
if(isset($_POST['pageId']) && !empty($_POST['pageId']))
{
    $id=$_POST['pageId'];
}
else
{
    $id='0';
}
?>
<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
	    <thead>
            <tr class="info_member">
                <th width="5%">Sl</th>
                <th width="8%">Order</th>
				<th width="">Name</th>
				<th width="">Mobile </th>
				<th width="">Payment Method </th>
				<th width="">Payment Status</th>
				<th width="">Delivery Status</th>
				<th width="8%">Total</th>
                <th width="7%" style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
    	    <?php
			
    	    $sl = 0;
			if ($search != ''){
			global $mysqli;
    		$stmt = $mysqli->prepare("SELECT id, order_code, customer_name, mobile, email, total, payment_method, payment_status, delivery_status, delivery_type, activity from order_list
			WHERE order_code LIKE '%$search%' || customer_name LIKE '%$search%' || mobile LIKE '%$search%' || email LIKE '%$search%'
    		ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage");
    		$stmt->execute();    
    		$stmt->bind_result($id, $order_code, $customer_name, $mobile, $email, $total, $payment_method, $payment_status, $delivery_status, $delivery_type, $activity);
    		$stmt->store_result();
			}
			
			elseif ($payment_method != ''){
			global $mysqli;
    		$stmt = $mysqli->prepare("SELECT id, order_code, customer_name, mobile, email, total, payment_method, payment_status, delivery_status, delivery_type, activity from order_list
			WHERE payment_method = '".$payment_method."'
    		ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage");
    		$stmt->execute();    
    		$stmt->bind_result($id, $order_code, $customer_name, $mobile, $email, $total, $payment_method, $payment_status, $delivery_status, $delivery_type, $activity);
    		$stmt->store_result();
			}
			
			elseif ($payment_status != ''){
			global $mysqli;
    		$stmt = $mysqli->prepare("SELECT id, order_code, customer_name, mobile, email, total, payment_method, payment_status, delivery_status, delivery_type, activity from order_list
			WHERE payment_status = '".$payment_status."'
    		ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage");
    		$stmt->execute();    
    		$stmt->bind_result($id, $order_code, $customer_name, $mobile, $email, $total, $payment_method, $payment_status, $delivery_status, $delivery_type, $activity);
    		$stmt->store_result();
			}
			
			elseif ($delivery_status != ''){
			global $mysqli;
    		$stmt = $mysqli->prepare("SELECT id, order_code, customer_name, mobile, email, total, payment_method, payment_status, delivery_status, delivery_type, activity from order_list
			WHERE delivery_status = '".$delivery_status."'
    		ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage");
    		$stmt->execute();    
    		$stmt->bind_result($id, $order_code, $customer_name, $mobile, $email, $total, $payment_method, $payment_status, $delivery_status, $delivery_type, $activity);
    		$stmt->store_result();
			}
			
			else{
    		global $mysqli;
    		$stmt = $mysqli->prepare("SELECT id, order_code, customer_name, mobile, email, total, payment_method, payment_status, delivery_status, delivery_type, activity from order_list
    		ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage");
    		$stmt->execute();    
    		$stmt->bind_result($id, $order_code, $customer_name, $mobile, $email, $total, $payment_method, $payment_status, $delivery_status, $delivery_type, $activity);
    		$stmt->store_result();
    		}
			
	    	while ($stmt->fetch()) {
	    	
	    	if ($moreStm = $mysqli->prepare("SELECT status from delivery_status WHERE id = ? ")){
                $moreStm->bind_param('s', $delivery_status); 
                $moreStm->execute();    
                $moreStm->bind_result($statusName);
                $moreStm->store_result();
                $moreStm->fetch();
                $moreStm->close();
                }
				
			if ($moreStm = $mysqli->prepare("SELECT method from payment_method WHERE id = ? ")){
                $moreStm->bind_param('s', $payment_method); 
                $moreStm->execute();    
                $moreStm->bind_result($pMethod);
                $moreStm->store_result();
                $moreStm->fetch();
                $moreStm->close();
                }
				
	    	?>               
				<tr>
					<td><?php echo ++$sl; ?></td>
					<td><?php echo $order_code; ?></td>
					<td><?php echo $customer_name; ?></td>
					<td><?php echo $mobile;  ?></td>
					<td><?php if($payment_method == 0){ ?> Cash on Delivery <?php  }else{?> <?php echo ucfirst($pMethod); ?> <?php } ?></td>
					<td><?php echo ucfirst($payment_status); ?></td>
					<td><?php echo ucfirst($statusName); ?></td>
					<td>৳<?php echo number_format($total); ?></td>
					<td style="text-align: center;">
					<a href="order_view/<?php echo $id; ?>" class="btn btn-success btn-raised btn-xs" title="Edit" ><i class="fa fa-eye"></i></a>
					<a href="apps/sales/delete_order.php?actionID=all_order&order_id=<?php echo $id; ?>" class="btn btn-danger btn-raised btn-xs" onClick="return confirm('Are you sure to delete ?')"><i class="fa fa-close"></i></a>
					</td>
				</tr>
			<?php }$stmt->close(); ?>
        </tbody>
    </table>
</div>
                

<?php echo $pagination; ?>
