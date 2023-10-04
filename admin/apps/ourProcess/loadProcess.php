<?php	
require_once("../functions/functions.php");

$search = $_POST['search'];

$link = $_POST['page_name']. "/" .$_POST['catID'];

if ($search != ''){
$query = "select * from our_process WHERE title = '".$search."' ";
}

else {
$query = "select * from our_process";
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
            $pagination.= "<li><a href=\"all_process#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='all_process'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"all_process#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"all_process#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"all_process#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"all_process#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"all_process#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"all_process#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"all_process#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"all_process#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"all_process#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"all_process#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"all_process#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='all_process'>Next &raquo;</a></li>";
        
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
                <th width="3%">#</th>
                <th width="">Photo</th>
				<th width="">Title</th>
				<th width="">Description</th>
                <th width="8%" style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
	    <?php
	    $sl = 0;
		if ($search != ''){
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT id, title, short_title, description, photo from our_process
		WHERE title LIKE '%$search%' || short_title LIKE '%$search%'
		ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage");
		$stmt->execute();    
		$stmt->bind_result($id, $title, $short_title,$description, $photo);
		$stmt->store_result();
		}
		
		else{
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT id, title, short_title, description, photo from our_process 
		ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage");
		$stmt->execute();    
		$stmt->bind_result($id, $title, $short_title, $description, $photo);
		$stmt->store_result();
		}	
		
	    while ($stmt->fetch()) { 
		
		
		?>               
			<tr>
				<td><?php echo ++$sl; ?></td>
				<td><img style="width: 50px;" src="../public/upload/<?php if ($photo == NULL){echo 'photo.jpg';}else{echo ($photo);} ?>" /></td>
				<td><?php echo $title; ?></td>
				<td><?php echo $short_title; ?></td>
				<td style="text-align: center;">
					<a href="update_process/<?php echo $id; ?>" class="btn btn-success btn-raised btn-xs"><i class="fa fa-edit"></i></a>
					<a href="apps/ourProcess/delete.php?actionID=all_process&bid=<?php echo $id; ?>&photoid=<?php echo $photo; ?>" class="btn btn-danger btn-raised btn-xs" data-toggle="tooltip" data-placement="top" onClick="return confirm('Are you sure to Delete ?')"><i class="fa fa-close"></i></a>
				</td>
			</tr>
			 <?php }
			   $stmt->close();
			?>
        </tbody>
    </table>
</div>
                

<?php echo $pagination; ?>
