<?php	
require_once("../functions/functions.php");
testing_loggin(); 

$search = $_POST['search'];

if ($search != ''){
$query = "select * from contact_us WHERE name = '".$search."' ";
}
else 
{
$query = "select * from contact_us";
}

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
            $pagination.= "<li><a href=\"all_contactUs#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"all_contactUs#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"all_contactUs#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"all_contactUs#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"all_contactUs#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"all_contactUs#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"all_contactUs#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"all_contactUs#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"all_contactUs#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"all_contactUs#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"all_contactUs#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"all_contactUs#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
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


?>
<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		<thead>
            <tr class="info_member">
				<th width="4%">#</th>
				<th width="7%">Company Name</th>
				<th width="10%">Name</th>
				<th width="7%">Email</th>
				<th width="7%">Message</th>
				<th width="7%" style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
      
		<?php 		
		$i = 0; 
		if ($search != ''){
			global $mysqli;
			if ($stmt = $mysqli->prepare("SELECT id, company_name, name, email, message from contact_us
            company_name LIKE '%$search%' || name LIKE '%$search%' || email LIKE '%$search%'
			ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
			$stmt->execute();   
			$stmt->bind_result($id, $company_name, $name, $email, $message);
			$stmt->store_result();
			  }
		}
		else{
			global $mysqli;
			if ($stmt = $mysqli->prepare("SELECT id, company_name, name, email, message from contact_us
            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
			$stmt->execute();    
			$stmt->bind_result($id, $company_name, $name, $email, $message);
			$stmt->store_result();
			}
		 }
		while ($stmt->fetch()) { 
		
		
		
			 ?>               
			<tr>
				<td><?php echo ++$i;?></td>
				<td><?php echo $company_name;?></td>
				<td><?php echo $name;?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $message; ?></td>
				<td style="text-align: center;">
					<!--<a href="all_contactUs/<?php echo $id; ?>" class="btn btn-success btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Information" ><i class="fa fa-pencil"></i></a>-->
					<a href="apps/contactUs/delete_contact_us.php?actionID=all_contactUs&c_id=<?php echo $id; ?>" class="btn btn-danger btn-raised btn-xs" data-toggle="tooltip" data-placement="top" onClick="return confirm('Are you sure to delete ?')"><i class="fa fa-close"></i></a>
				</td>
			</tr>
			 <?php }
				$stmt->close();
			?>
        </tbody>
    </table>
</div>
                

<?php echo $pagination; ?>
