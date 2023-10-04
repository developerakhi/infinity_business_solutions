<?php	
require_once("../functions/functions.php");
testing_loggin(); 

$inID = $_POST['itemID'];
 
if ($inID != ''){

$query = "select * from sd_point_count WHERE  customerID = '".$inID."' ";
}
 
else 
{
$query = "select * from sd_point_count";
}

$res    = mysqli_query($mysqli,$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 35;
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
            $pagination.= "<li><a href=\"ref_bonus#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"ref_bonus#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"ref_bonus#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"ref_bonus#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"ref_bonus#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"ref_bonus#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"ref_bonus#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"ref_bonus#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"ref_bonus#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"ref_bonus#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"ref_bonus#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"ref_bonus#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
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
$query="select id from sd_point_count order by id DESC
limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage";
//echo $query;
$res    =   mysqli_query($mysqli,$query);
$count  =   mysqli_num_rows($res);
$HTML='';

?>
 <div class="box-body table-responsive no-padding" style="overflow-x: visible;">

 
	<table class="table table-hover">
		  <thead>
             <tr class="info_member">
                                <th width="4%">ID</th>
                                <th width="5%">Date</th>
                                <th width="4%">Invoice</th>
                                <th width="7%">Customer Name</th>
                                <th width="7%">Customer Mobile</th>
                                <th width="8%" style="text-align:right;">Amount</th>
                           	</tr>
                        </thead>
                       <tbody>
					 <?php 		
					 $i = 0; 
					 if ($inID != ''){
                        global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, in_id, customerID, total_order, amount, date 
							from sd_point_count
								WHERE  mobile = '".$inID."'
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($client_id, $in_id, $customerID, $total_order, $amount, $date);
                        $stmt->store_result();
                          }
					 }
					 
					 else
					 {
						global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, in_id, customerID, total_order, amount, date 
							from sd_point_count
                             ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($client_id, $in_id, $customerID, $total_order, $amount, $date);
                        $stmt->store_result();
                          }
					 }
                         while ($stmt->fetch()) { 
										$sql = "SELECT id, name, mobile, address FROM sd_client  WHERE  mobile = '".$customerID."'";
										$member = mysqli_query($mysqli, $sql) or die("Opps some thing went wrong");
										$row_member = mysqli_fetch_assoc($member); 
						 
						 
						 ?>               
                            <tr>
                            
                                <td><?php echo ++$i;?></td>
                                <td><?php echo $date; ?></td>
                                <td><a href="view_invoice_retail/<?php echo $in_id; ?>" title="View Invoice" target="new" class="btn btn-block btn-success" style="padding: 3px 5px;font-size: 12px;" data-toggle="tooltip" data-placement="top">
                                	View Invoice<div class="ripple-container"></div></a></td>
                                <td><?php echo $row_member['name'];?></td>
                                <td><?php echo $row_member['mobile'];?></td>
                                <td style="text-align:right;"><?php echo $amount; ?></td>
                                 
                         </tr>
   						 	 <?php }
							 		$stmt->close();

								?>
                        </tbody>
                    </table>
                </div>
                

<?php echo $pagination; ?>
