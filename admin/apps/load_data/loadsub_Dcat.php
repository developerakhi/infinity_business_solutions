<?php	
require_once("../functions/functions.php");
testing_loggin(); ?>
<?php

$query = "select * from sub_menu";

$res    = mysqli_query($mysqli,$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 20;
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
            $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='view_all_sub_cat'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"view_all_sub_cat#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"view_all_sub_cat#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"view_all_sub_cat#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='view_all_sub_cat'>Next &raquo;</a></li>";
        
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
$query="select sub_menu_id, sub_menu from sub_menu order by sub_menu_id DESC
limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage";
//echo $query;
$res    =   mysqli_query($mysqli,$query);
$count  =   mysqli_num_rows($res);
$HTML='';

?>
<div class="table-responsive">
	<table class="table">
			<thead>
             <tr class="info_member">
                                <th>#</th>
                                <th>Sub Category Name</th>
                                <th>Category Name</th>
                                <th width="13%" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                       <tbody>
					 <?php 
						$sl = 0;
                        global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT sub_menu_id, sub_menu, menu_id from sub_menu
                            ORDER BY sub_menu_id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($id, $sub_menu, $menu_id);
                        $stmt->store_result();
                          }
                         while ($stmt->fetch()) { 
                           		if ($stmt_m = $mysqli->prepare("SELECT  menu_id, menu_name from menu
                                    WHERE menu_id = ? ")){
                                $stmt_m->bind_param('s', $menu_id);  // Bind "$email" to parameter.
                                $stmt_m->execute();    // Execute the prepared query.
                                // get variables from result.
                                $stmt_m->bind_result($menu_id, $menu_name);
                                $stmt_m->store_result();
                                $stmt_m->fetch();
                                $stmt_m->close();
                                  }	
                    		  ?>               
                            <tr>
                                <td><?php echo ++$sl; ?></td>
                                <td><?php echo $sub_menu; ?></td>
                                <td><?php echo $menu_name;?></td>

                                <td style="text-align: center;">
								<a href="update_sub_category/<?php echo $id; ?>" class="btn btn-success btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Information" ><i class="fa fa-pencil"></i><div class="ripple-container"></div></a>
                               
                               <a href="apps/bin_cat/delete_sub_cat.php?actionID=view_all_sub_category&dltID=<?php echo $id; ?>" class="btn btn-danger btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Delete This Row" onClick="return confirm('Are you sure to Delete this Sub Menu?')"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
                            
							</td>
                            </tr>
   						 	 <?php }
							 		$stmt->close();

								?>
                        </tbody>
                    </table>
                </div>
                

<?php echo $pagination; ?>
