<?php	
require_once("../functions/functions.php"); 
testing_loggin();

$search = $_POST['search'];
$category_id = $_POST['category_id'];

if ($search != ''){
$query = "select * from products WHERE name = '".$search."' ORDER BY id DESC";
}

elseif ($category_id != ''){
$query = "select * from products WHERE category = '".$category_id."' ORDER BY id DESC";
}

else 
{
$query = "select * from products ORDER BY id DESC";
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
            $pagination.= "<li><a href=\"all_product#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='previous disabled'><a href='#'>&laquo; Previous&nbsp;&nbsp;</a></li>";   
        if ($lastpage < 7 + ($adjacents * 2))

        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><span>$counter</span></li>";
                else
                    $pagination.= "<li><a href=\"all_product#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                         
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
                        $pagination.= "<li><a href=\"all_product#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href=\"all_product#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
                $pagination.= "<li><a href=\"all_product#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href=\"all_product#Page=\"1\"\" onClick='changePagination(1);'>1</a></li>";
               $pagination.= "<li><a href=\"all_product#Page=\"2\"\" onClick='changePagination(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><span>$counter</span></li>";
                   else
                       $pagination.= "<li><a href=\"all_product#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href=\"all_product#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a></li>";
               $pagination.= "<li><a href=\"all_product#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a></li>";   
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
                        $pagination.= "<li><a href=\"all_product#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href=\"all_product#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a></li>";
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
				<th>#</th>
				<th  width="12%">Shop Name</th>
				<th style="text-align: center;">Photo</th>
				<th>Name</th>
				<th>Category </th>
				<th>Quantity </th>
				<th>Price </th>
				<th width="8%" style="text-align: center;">Action</th>
			</tr>
        </thead>
		<tbody>
			<?php 
				$sl = 0;						
				if ($search != ''){
				global $mysqli;
				$productList = $mysqli->prepare("SELECT id, user_id, shop_id, name, code, category, price, quantity, photo from products
				WHERE name LIKE '%$search%' || short_details LIKE '%$search%'
				ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage");
				$productList->execute();    
				$productList->bind_result($id, $user_id, $shop_id, $name, $code, $category, $price, $quantity, $photo);
				$productList->store_result();
				}
				
				elseif ($category_id != ''){
				global $mysqli;
				if ($productList = $mysqli->prepare("SELECT id, user_id, shop_id, name, code, category, price, quantity, photo from products
				WHERE category = '".$category_id."'  ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage"))
				$productList->execute();    
				$productList->bind_result($id, $user_id, $shop_id, $name, $code, $category, $price, $quantity, $photo);
				$productList->store_result();
				}
			
				else{
				global $mysqli;
				if ($productList = $mysqli->prepare("SELECT id, user_id, shop_id, name, code, category, price, quantity, photo from products
				ORDER BY id DESC limit ".mysqli_real_escape_string($mysqli,$start).",$recordsPerPage"))
				$productList->execute();    
				$productList->bind_result($id, $user_id, $shop_id, $name, $code, $category, $price, $quantity, $photo);
				$productList->store_result();
				}
			

			   while ($productList->fetch()) { 
			 
				if ($more_data = $mysqli->prepare("SELECT id, name from categories WHERE id = ? ")){
				$more_data->bind_param('s', $category);  
				$more_data->execute();    
				$more_data->bind_result($mid, $menuName);
				$more_data->store_result();
				$more_data->fetch();
				$more_data->close();
				}
				
				if ($more_data = $mysqli->prepare("SELECT id, shop_name from shop WHERE id = ? ")){
				$more_data->bind_param('s', $shop_id);  
				$more_data->execute();    
				$more_data->bind_result($sid, $shopName);
				$more_data->store_result();
				$more_data->fetch();
				$more_data->close();
				}
				$available = $tm_d_quantity - $qty;
				
				?>               
				<tr>
					<td><?php echo ++$sl; ?></td>
					<td><?php if ($shop_id != 0){?> <a href="#"><?php echo $shopName; ?></a>  <?php }else{ ?> Admin <?php } ?></td>
					<td style="text-align: center;"><img src="../images/products/<?php if ($photo == NULL){echo"photo.png";}else{echo $photo;} ?>" width="30" alt="img" /></td>
					<td><?php echo $name;?></td>
					<td><?php echo $menuName;?></td>
					<td><?php echo $quantity;?></td>
					<td>৳<?php echo number_format($price);?></td>
					<td style="text-align: center;">
						<a href="update_product/<?php echo $id; ?>" class="btn btn-success btn-raised btn-xs" title="Edit" ><i class="fa fa-edit"></i></a>
						<a href="apps/products/delete_product.php?actionID=all_product&product_id=<?php echo $id; ?>&photoid=<?php echo $photo; ?>" class="btn btn-danger btn-raised btn-xs" title="Delete" onClick="return confirm('Are you sure to delete?')"><i class="fa fa-close"></i></a>
					</td>
				</tr>
				
			<?php } $productList->close();?>
		</tbody>
    </table>
</div>
<?php echo  $pagination; ?>
