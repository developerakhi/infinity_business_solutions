<?php	
require_once("../functions/functions.php"); 
testing_loggin();

$date = $_POST['date'];
$inID = $_POST['in_id'];
$userID = $_POST['userID'];

if($userID != ''){
$query = "select * from sd_merchant WHERE activity > 0 AND id = '".$userID."' ORDER BY id DESC";
}

else 
{
$query = "select * from sd_merchant WHERE activity > 0 ORDER BY id DESC";
}



$res    = mysqli_query($mysqli,$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 30;
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
            $pagination.= "<li><a href=\"view_all_shop#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"view_all_shop#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"view_all_shop#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"view_all_shop#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"view_all_shop#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"view_all_shop#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"view_all_shop#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"view_all_shop#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"view_all_shop#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"view_all_shop#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"view_all_shop#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"view_all_shop#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
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
$query="select id, address from sd_merchant order by id ASC
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
                                <th>ID</th>
								<th>Date</th>
								<th>Shop Name</th>
								 <th>Proprietor</th>
								<th>Mobile</th>
                                <th style="text-align:center;">Activity</th>
                                <th style="text-align:center;" width="6%">Product</th>
								<th style="text-align:center;" width="6%">Shop</th>
                         		<th width="6%" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                       <tbody>
					 <?php 		
					 if ($userID != ''){
						global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, shop_name, address, mobile, activity, date from sd_merchant  
							WHERE activity > 0 AND id = '".$userID."'
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($id, $shop_name, $address, $mobile, $activity, $date);
                        $stmt->store_result();
							}
                        	  }
							  
					else {
						global $mysqli;		
                        if ($stmt = $mysqli->prepare("SELECT id, shop_name, name, address, mobile, activity, date from sd_merchant 
						WHERE activity > 0
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($id, $shop_name, $p_name, $address, $mobile, $activity, $date);
                        $stmt->store_result();
							}
						}
							  
                    while ($stmt->fetch()) {
						
							$newDate = date( 'j F, Y',strtotime($date) ) ;
						
                    		  ?>               
                            <tr>
                                <td><?php echo $id; ?></td>
								<td><?php echo $newDate; ?></td>
                                <td><?php echo $shop_name; ?></strong></td>
								 <td><?php echo $p_name;?></td>
								<td><?php echo $mobile; ?></td>
                                <td style="text-align:center;">
								<?php 
								if ($activity == 2){echo "<span style='color:#de0000;font-weight: bold;'>Pending...</span>";} 
								if ($activity == 1){echo "<span style='color: #14a41f;font-weight: bold;'>Active</span>";}
								?>
                                </td>
                              
								<td> 
								<a href="all_itm/<?php echo $id; ?>" class="btn btn-block btn-success" data-toggle="tooltip" data-placement="top" title="View Product" style="padding: 3px 5px;font-size: 12px; background: #337ab7; border: #337ab7">
                                	All Product<div class="ripple-container"></div></a>
                                </td>
								
								<td> 
								<a href="view_shop/<?php echo $id; ?>" class="btn btn-block btn-success" data-toggle="tooltip" data-placement="top" title="View Shop" style="padding: 3px 5px;font-size: 12px;">
                                	View Shop<div class="ripple-container"></div></a>
                                </td>
								
                                <td style="text-align: center;">
                                <a href="delete_shop/<?php echo $id; ?>" class="btn btn-danger btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Delete This Row" style="font-size: 10px;" onClick="return confirm('Are you sure to Delete this Shop?')"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
							</td>
                            </tr>
   						 	 <?php }
							 		$stmt->close();
								?>
                        </tbody>
                    </table>
                </div>
                

<?php echo  $pagination; ?>
