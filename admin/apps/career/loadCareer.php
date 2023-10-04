<?php	
require_once("../functions/functions.php");
testing_loggin(); 

$search = $_POST['search'];

if ($search != ''){
$query = "select * from carrer WHERE name = '".$search."' ";
}
else 
{
$query = "select * from carrer";
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
            $pagination.= "<li><a href=\"all_career#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"all_career#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"all_career#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"all_career#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"all_career#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"all_career#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"all_career#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"all_career#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"all_career#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"all_career#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"all_career#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"all_career#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
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
				<th width="7%">Position</th>
				<th width="10%">Name</th>
				<th width="7%">Present Address</th>
				<th width="7%">Permanent Address</th>
				<th width="7%">Mobile</th>
				<th width="7%">Expectation Salary</th>
				<th width="7%" style="text-align: center;">Action</th>
				<th width="7%">Download Pdf</th>
            </tr>
        </thead>
        <tbody>
      
		<?php 		
		$i = 0; 
		if ($search != ''){
			global $mysqli;
			if ($stmt = $mysqli->prepare("SELECT id, position, name, present_address, permanent_address, mobile, expectation_salary, image from carrer
            position LIKE '%$search%' || name LIKE '%$search%' || mobile LIKE '%$search%'
			ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
			$stmt->execute();   
			$stmt->bind_result($id, $position, $name, $present_address, $permanent_address, $mobile, $expectation_salary, $image);
			$stmt->store_result();
			  }
		}
		else{
			global $mysqli;
			if ($stmt = $mysqli->prepare("SELECT id, position, name, present_address, permanent_address, mobile, expectation_salary, image from carrer
            ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage")){
			$stmt->execute();    
			$stmt->bind_result($id, $position, $name, $present_address, $permanent_address, $mobile, $expectation_salary, $image);
			$stmt->store_result();
			}
		 }
		while ($stmt->fetch()) { 
		
		
		
			 ?>               
			<tr>
				<td><?php echo ++$i;?></td>
				<td><?php echo $position;?></td>
				<td><?php echo $name;?></td>
				<td><?php echo $present_address; ?></td>
				<td><?php echo $permanent_address; ?></td>
				<td><?php echo $mobile; ?></td>
				<td><?php echo $expectation_salary; ?></td>
				<td style="text-align: center;">
					<!--<a href="all_career/<?php echo $id; ?>" class="btn btn-success btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Information" ><i class="fa fa-pencil"></i></a>-->
					<a href="apps/career/delete_career.php?actionID=all_career&c_id=<?php echo $id; ?>" class="btn btn-danger btn-raised btn-xs" data-toggle="tooltip" data-placement="top" onClick="return confirm('Are you sure to delete ?')"><i class="fa fa-close"></i></a>
				</td>
				<td><a href="../../images/all/<?php echo $image?>" download class="btn btn-info btn-raised btn-xs"><i class="fa fa-download"></i></a></td>
			</tr>
			 <?php }
				$stmt->close();
			?>
        </tbody>
    </table>
</div>
                

<?php echo $pagination; ?>
