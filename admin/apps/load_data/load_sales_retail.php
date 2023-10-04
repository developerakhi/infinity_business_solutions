<?php	
require_once("../functions/functions.php"); 
testing_loggin();

$date = $_POST['date'];
$inID = $_POST['in_id'];
$userID = $_POST['userID'];

if ($date != ''){
$query = "select * from sd_order_more WHERE date = '".$date."' ORDER BY id DESC";
}

elseif ($inID != ''){
$query = "select * from sd_order_more WHERE order_id = '".$inID."' ORDER BY id DESC";
}

elseif ($userID != ''){
$query = "select * from sd_order_more WHERE customerID = '".$userID."' ORDER BY id DESC";
}

else 
{
$query = "select * from sd_order_more ORDER BY id DESC";
}



$res    = mysqli_query($mysqli,$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 60;
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
            $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"view_all_retail_invoices#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"view_all_retail_invoices#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"view_all_retail_invoices#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>Next &raquo;</a></li>";
        
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
$query="select id, orderID from sd_order_list order by id DESC
limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage";
//echo $query;
$res    =   mysqli_query($mysqli,$query);
$count  =   mysqli_num_rows($res);
$HTML='';

?>
 <div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		  <thead>
             <tr class="info_member">
                                <th>#</th>
                                <th width="10%">Order</th>
                                <th>Date</th>
                                <th> Name</th>
								<th> Mobile </th>
								<th> Method </th>
                                <th style="text-align:center;">Total</th>
                                <th>Delivery Status</th>
                                <th style="text-align:center;" width="6%">Invoice</th>
                         		<th width="6%" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                       <tbody>
					 <?php
					$sl = 0;
					if ($date != ''){
						global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, order_id, time from sd_order_more
								 WHERE date ='".$date."'
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($id, $order_id, $time);
                        $stmt->store_result();
							}
                        	  }
							  
					elseif ($inID != ''){
						global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, order_id, mathod from sd_order_more  
								WHERE order_id ='".$inID."'
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($id, $order_id, $mathod);
                        $stmt->store_result();
							}
                        	  }				
				
						elseif ($userID != ''){
						global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, order_id, mathod from sd_order_more  
								WHERE customerID = '".$userID."'
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($id, $order_id, $mathod);
                        $stmt->store_result();
							}
                        	  }
							  
					else {
						global $mysqli;		
                        if ($stmt = $mysqli->prepare("SELECT id, order_id, customer_name, mobile, g_total, mathod, trxid, delivery_status, date, activity from sd_order_more 
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($id, $order_id, $customer_name, $mobile, $g_total, $mathod, $trxid, $delivery_status, $date, $activity);
                        $stmt->store_result();
							}
						}
						
					while ($stmt->fetch()) { 
							$newDate = date( 'j F Y',strtotime($date) ) ;
					$sql = "SELECT id, name, mobile, address FROM sd_client  WHERE  id = '".$customer_id."'";
					$member = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
					$row_member = mysqli_fetch_assoc($member);
					
				
                    		  ?>               
                            <tr>
                                <td><?php echo ++$sl; ?></td>
                                <td><strong style="color:#E60101;text-transform: uppercase;font-family: arial;font-size: 11px;"><?php echo $order_id; ?></strong></td>
                                <td><?php echo $newDate ;?></td>
                                <td><?php echo $row_member['name'];?><?php echo $customer_name;?></td>
								<td><?php echo $mobile;?></td>
								<td>
								<?php if($mathod == 9){echo"<span>bKash</span>";}
									  if($mathod == 10){echo"<span>Nogod</span>";}
									  if($mathod == 8){echo"<span>Rocket</span>";}
									  if($mathod == 12){echo"<span>COD</span>";}
								?>
                                </td>
                                <td style="text-align:center;"><b>৳ <?php echo number_format ($g_total);?></b></td>
                                <td><?php echo ucfirst($delivery_status); ?></td>
                                <td> 
                                <a href="view_invoice_retail/<?php echo $order_id; ?>" class="btn btn-block btn-success" data-toggle="tooltip" data-placement="top" title="View Invoice" style="padding: 3px 5px;font-size: 12px;">
                                	View<div class="ripple-container"></div></a>
                                </td>
                                <td style="text-align: center;">
                                <a href="apps/bin_cat/delete_invoice.php?actionID=view_all_retail_invoices&itemID=<?php echo $order_id; ?>" class="btn btn-danger btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Delete This Row" style="font-size: 10px;" onClick="return confirm('Are you sure to Delete this Invoice?')"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
							</td>
                            </tr>
   						 	 <?php }
							 		$stmt->close();
								?>
                        </tbody>
                    </table>
                </div>
                

<?php echo  $pagination; ?>
