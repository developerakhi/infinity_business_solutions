<?php	
require_once("../functions/functions.php"); 
testing_loggin();

$inID = $_POST['in_id'];
$userID = $_POST['userID'];

if ($inID != ''){
$query = "select * from sd_item_l WHERE activity > 0 AND deal = 0 AND item_code = '".$inID."' ORDER BY id DESC";
}

elseif ($userID != ''){
$query = "select * from sd_item_l WHERE activity > 0 AND deal = 0 AND id = '".$userID."' ORDER BY id DESC";
}

else 
{
$query = "select * from sd_item_l WHERE activity > 0 AND deal = 0 ORDER BY id DESC";
}

$res    = mysqli_query($mysqli,$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 50;
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
            $pagination.= "<li><a href=\"view_all_item#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"view_all_item#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"view_all_item#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"view_all_item#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"view_all_item#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"view_all_item#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"view_all_item#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"view_all_item#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"view_all_item#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"view_all_item#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"view_all_item#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"view_all_item#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
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
$query="select id, item_name, item_code from sd_item_l WHERE activity > 0 AND deal = 0 order by id DESC
limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage";
//echo $query;
$res    =   mysqli_query($mysqli,$query);
$count  =   mysqli_num_rows($res);
$HTML='';



?>

 <div class="box-body table-responsive no-padding">

<?php echo  $pagination; ?>

 
	<table class="table table-hover">
		  <thead>
             <tr class="info_member">
                                <th>#</th>
								 <th  width="12%">Shop Name</th>
                                <th style="text-align: center;">Image</th>
                                <th>Name</th>
                                <th>Category </th>
								<th>Quantity </th>
                                <th>Price </th>
								<th>D.Price </th>
								<th>Status</th>
                                <th width="8%" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                       <tbody>
					 <?php 		
                        global $mysqli;
						$sl = 0;
						if ($inID != ''){
							if ($stmt = $mysqli->prepare("SELECT id, item_name, item_code, category, unit, price, discount_price, img1, deal, e_offer from sd_item_l
								  WHERE shop_id > 0 AND item_code = ?
								ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                            $stmt->bind_param('s', $inID);  // Bind "$email" to parameter.
							$stmt->execute();    // Execute the prepared query.
							// get variables from result.
							$stmt->bind_result($item_id, $item_name, $item_code, $category, $unit, $sell, $discount_price, $img1, $deal, $e_offer);
							$stmt->store_result();
							  }
							  
						}
						elseif ($userID != ''){
							if ($stmt = $mysqli->prepare("SELECT id, item_name, item_code, category, unit, price, discount_price, img1, deal, e_offer from sd_item_l
								  WHERE shop_id > 0 AND id = ?
								ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                            $stmt->bind_param('s', $userID);  // Bind "$email" to parameter.
							$stmt->execute();    // Execute the prepared query.
							// get variables from result.
							$stmt->bind_result($item_id, $item_name, $item_code, $category, $unit, $sell, $discount_price, $img1, $deal, $e_offer);
							$stmt->store_result();
							  }
						}
						else {
							if ($stmt = $mysqli->prepare("SELECT id, shop_id, item_name, item_code, category, unit, price, discount_price, img1, deal, e_offer, activity from sd_item_l
							WHERE shop_id > 0 
								ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
							$stmt->execute();    // Execute the prepared query.
							// get variables from result.
							$stmt->bind_result($item_id, $shop_id, $item_name,  $item_code, $category, $unit, $sell, $discount_price, $img1, $deal, $e_offer, $activity);
							$stmt->store_result();
							  }
						}

                         while ($stmt->fetch()) { 
                           		
								$newEDate = date( 'j F Y',strtotime($e_offer) ) ;
								
								if ($stmt_m = $mysqli->prepare("SELECT  menu_id, menu_name from menu
                                    WHERE menu_id = ? ")){
                                $stmt_m->bind_param('s', $category);  // Bind "$email" to parameter.
                                $stmt_m->execute();    // Execute the prepared query.
                                // get variables from result.
                                $stmt_m->bind_result($menu_id, $menu_name);
                                $stmt_m->store_result();
                                $stmt_m->fetch();
                                $stmt_m->close();
                                  }
								  
								if ($stmt_shop = $mysqli->prepare("SELECT id, shop_name, name from sd_merchant
                                    WHERE id = ? ")){
                                $stmt_shop->bind_param('s', $shop_id);  // Bind "$email" to parameter.
                                $stmt_shop->execute();    // Execute the prepared query.
                                // get variables from result.
                                $stmt_shop->bind_result($shop_id, $shop_name, $propt_name);
                                $stmt_shop->store_result();
                                $stmt_shop->fetch();
                                $stmt_shop->close();
                                  }
								  
                    		  ?>               
                            <tr>
                                <td><?php echo ++$sl; ?></td>
								<td><a href="all_itm/<?php echo $shop_id; ?>"><?php echo $shop_name; ?></a></td>
                                <td style="text-align: center;"><img src="../images/products/<?php if ($img1 == NULL){echo"photo.png";}else{echo $img1;} ?>" width="60" alt="img" /></td>
                                <td><?php echo $item_name;?></td>
                                <td><?php echo $menu_name;?></td>
								<td><?php echo $unit;?></td>
                                <td><?php echo number_format($sell);?></td>
								<td><?php echo number_format ($discount_price);?></td>
								<td> <?php 
										if($activity == 1){echo"<span style='color: #008347;'>Active</span>";}
										if($activity == 2){echo"<span style='color: red;'>Pending</span>"
									;}?>
								</td>
                                <td style="text-align: center;">
                                <a href="update_seller_item/<?php echo $item_id; ?>" class="btn btn-success btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Information" ><i class="fa fa-pencil"></i><div class="ripple-container"></div></a>
                                
                                <a href="apps/bin_cat/delete_seller_product.php?itemID=<?php echo $item_id; ?>" class="btn btn-danger btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Delete This Row" onClick="return confirm('Are you sure to Delete this Item?')"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
                           
							</td>
                            </tr>
   						 	 <?php }
							 		$stmt->close();

								?>
                        </tbody>
                    </table>
                </div>
                

<?php echo  $pagination; ?>
