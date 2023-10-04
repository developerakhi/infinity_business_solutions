<?php
require_once("../functions/functions.php");
$country_id = urlencode($_POST["country_id"]); ?>

<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		  <thead>
            <tr class="info_member">
                                <th>ID</th>
                                <th style="text-align: center;">Item Image</th>
                               
                                <th>Item Name</th>
                                <th>Category Name</th>
                                <th>Price (BDT)</th>
                                <th width="8%" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                       <tbody>
					 <?php 		
                        global $mysqli;
                        if ($stmt = $mysqli->prepare("SELECT id, item_name, item_code, category,  price, img1 from sd_item_l
						WHERE category = ? AND deal = 1
                            ORDER BY id DESC")){
                        $stmt->bind_param('s', $country_id);  // Bind "$email" to parameter.
                        $stmt->execute();    // Execute the prepared query.
                        // get variables from result.
                        $stmt->bind_result($item_id, $item_name, $item_code, $category, $sell, $img1);
                        $stmt->store_result();
						$total_r = $stmt->num_rows;
                          }
						 if ($total_r > 0){
                         while ($stmt->fetch()) { 
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
                    		  ?>               
                            <tr>
                                <td><?php echo $item_id; ?></td>
                                <td style="text-align: center;"><img src="../images/products/<?php if ($img1 == NULL){echo"photo.png";}else{echo $img1;} ?>" width="60" alt="img" /></td>
                                
                                <td><?php echo $item_name;?></td>
                                <td><?php echo $menu_name;?></td>
                                <td><?php echo $sell;?></td>

                                <td style="text-align: center;">
                                <a href="update_item/<?php echo $item_id; ?>" class="btn btn-success btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Information" ><i class="fa fa-pencil"></i><div class="ripple-container"></div></a>
                                
                                <a href="apps/bin_cat/delete_item.php?actionID=view_all_item&itemID=<?php echo $item_id; ?>" class="btn btn-danger btn-raised btn-xs" data-toggle="tooltip" data-placement="top" title="Delete This Row" onClick="return confirm('Are you sure to Delete this Item?')"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
                           
							</td>
                            </tr>
   						 	 <?php }
							 		$stmt->close();
						 				}
										else{
											echo "There Is No Data Found!";
										}
								?>
                        </tbody>
                    </table>
                </div>