<?php	
require_once("../functions/functions.php");
testing_loggin(); 

$search = $_POST['search'];

if ($search != ''){

$query = "select * from sd_client WHERE type = 1 AND name = '".$search."' ";
}

else 
{
$query = "select * from sd_client WHERE type = 1";
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
            $pagination.= "<li><a href=\"view_all_customer#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"view_all_customer#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"view_all_customer#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"view_all_customer#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"view_all_customer#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"view_all_customer#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"view_all_customer#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"view_all_customer#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"view_all_customer#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"view_all_customer#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"view_all_customer#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"view_all_customer#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
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
$query="select id, name from sd_client WHERE type = 1 order by id DESC
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
                                <th width="4%">#</th>
                                <th width="8%">Name</th>
                                <th width="8%">Email</th>
                                <th width="7%">Mobile</th>
                                <th width="10%">Address</th>
                          <?php  echo '<th width="7%" style="text-align: center;">Action</th>'; ?>
                          	</tr>
                        </thead>
                       <tbody>
					 <?php 		
					 $i = 0; 
					 if ($search != ''){
                        global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, name, mobile, email, address, activity, date 
							from sd_client
							WHERE type = 1 AND name LIKE '%$search%' || mobile LIKE '%$search%' || email LIKE '%$search%'
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        $stmt->bind_result($client_id, $name, $mobile, $email, $address, $type, $date);
                        $stmt->store_result();
                          }
					 }
					
					 else{
						global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, name, mobile, email, address, activity, date 
							from sd_client WHERE type = 1
                            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
                        $stmt->execute();    // Execute the prepared query.
                        $stmt->bind_result($client_id, $name, $mobile, $email, $address, $type, $date);
                        $stmt->store_result();
                        }
					 }
                         while ($stmt->fetch()) { 
						 ?>               
                            <tr>
                            
                                <td><?php echo ++$i;?></td>
                                <td><?php echo $name . $l_name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $mobile;?></td>
                                <td><?php echo $address;?></td>
                             
                                <td style="text-align: center;">
                                   <div class="btn-group">
                                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action</button>
                                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu" style="left: -84px;">
                                        <li><a href="update_customer/<?php echo $client_id; ?>"><i class="fa fa-pencil"></i>Edit</a></li>
                                        <li><a href="apps/bin_cat/delete_client.php?actionID=view_all_clients&ClientID=<?php echo $client_id; ?>" title="Delete This Row" onClick="return confirm('Are you sure to Delete this customer?')"><i class="fa fa-close"></i>Delete</a></li>
                                      </ul>
                                    </div>
                                
                               </td>
                            </tr>
   						 	 <?php }
							 		$stmt->close();

								?>
                        </tbody>
                    </table>
                </div>
                

<?php echo $pagination; ?>
