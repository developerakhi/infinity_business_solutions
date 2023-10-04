<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/general_stm.php");

$proID = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
$url_string = urlencode($proID);

global $mysqli;
$up_product = $mysqli->prepare("SELECT id, user_id, shop_id, name, category, code, sub_cat, sub_sub, quantity, price, discount_per, discount, discount_price, wholesale_price, wholesale_qty, tray_id, photo, short_details, full_details, video, top_pro, popular, date, activity from products
WHERE id = ".$url_string." ORDER BY id DESC");
$up_product->execute();
$up_product->bind_result($pid, $puser_id, $pshop_id, $pname, $pcategory, $pcode, $psub_cat, $psub_sub, $pquantity, $pprice, $pdiscount_per, $pdiscount, $pdiscount_price, $pwholesale_price, $pwholesale_qty, $tray_id, $pphoto, $pshort_details, $pfull_details, $pvideo, $ptop_pro, $ppopular, $pdate, $pactivity);
$up_product->store_result();
$up_product->fetch();



?>
 <title>Update Product</title>
 <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
		<a href="add_product" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Add Product</a>
		<a href="all_product" class="btn btn-lg btn-danger btn-raised btn-label" ><i class="fa fa-list"></i> All Product</a>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Product</h3>
            </div>
            <form action="apps/products/update_product_code.php" enctype="multipart/form-data"  method="POST">
				<input type="hidden" name="date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
				<input type="hidden" name="id" value="<?php echo $url_string; ?>" class="form-control">
				
				<div class="box-body">
					
					<div class="col-md-4">
						<label>Thumbnail Photo</label>
						<input type="file" name="photo"class="btn btn-default btn-file" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
						<input type="hidden" name="photo" value="<?php echo $pphoto; ?>">
						<?php if ($pphoto == NULL ) { ?>
							<img class="exampleb" id="pic" src="dist/img/example.png"/>
						<?php }else{ ?>
							<img class="exampleb" id="pic" src="../images/products/<?php echo $pphoto; ?>"/>
						<?php } ?>
					</div>
					
					<div class="col-md-8">
						<label>Gallery Photos</label>
						<input type="file" id="fileupload" name="multi_photos[]" class="btn btn-default btn-file" multiple  accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" >
						<?php
						$sl = 0;
						global $mysqli;
						$gPhoto = $mysqli->prepare("SELECT id, files from upload_files WHERE type =  1 AND pro_id = ".$url_string." ORDER BY id DESC");
						$gPhoto->execute();
						$gPhoto->bind_result($gid, $gFiles);
						$gPhoto->store_result();
						while ($gPhoto->fetch()) {
						echo'
							<div class="gimg" id="">
								<img class="exampleb" src="../images/products/'.$gFiles.'"/> 
								<a href="apps/products/delete_gallery_photo.php?gallery_id='.$gid.'&gfile='.$gFiles.'"><i class="gpdelete fa fa-trash"></i></a>
							</div>';
							 }
						$gPhoto->close();
						?>
					</div>
					
					<div class="col-md-12"> </div>
					
					<div class="form-group col-md-4">
						<label>Category Name <span class="red_star">*</span></label>
						<select name="category" id="category" class="form-control" required>
						  <option value="">Select Category</option>
						  <?php
							if ($addMenu = $mysqli->prepare("SELECT id, name from categories ORDER BY id ASC ")){
							$addMenu->execute(); 
							$addMenu->bind_result($mid, $menuName);
							$addMenu->store_result();}
							while ($addMenu->fetch()) {
								echo'
								<option '; if ($mid == $pcategory){echo 'selected="selected"';} echo ' value="'.$mid.'">'.$menuName.'</option>';
								}
							?>
						</select>
					</div>
					
					<div class="form-group col-md-4">
					 <label>Sub Category </label>
						<select name="sub_cat" class="form-control" id="subCategory">
                            <option value="">Select One </option>
							<?php
							if ($addSubMenu = $mysqli->prepare("SELECT id, name from sub_category where category_id = '".$pcategory."' ORDER BY id ASC ")){
							$addSubMenu->execute(); 
							$addSubMenu->bind_result($sub_id, $submenuName);
							$addSubMenu->store_result();}
							while ($addSubMenu->fetch()) {
								echo'
								<option '; if ($sub_id == $psub_cat){echo 'selected="selected"';} echo ' value="'.$sub_id.'">'.$submenuName.'</option>';
								}
							?>
						</select>
					</div>
					
					<div class="form-group col-md-4">
					 <label>Shop Name </label>
						<select name="shop_id" class="form-control">
                            <option value="">Select Shop </option>
							<?php
							if ($addShop = $mysqli->prepare("SELECT id, vendor_name from vendor ORDER BY id DESC ")){
							$addShop->execute(); 
							$addShop->bind_result($sid, $shopName);
							$addShop->store_result();}
							while ($addShop->fetch()) {
								echo'
								<option '; if ($sid == $pshop_id){echo 'selected="selected"';} echo ' value="'.$sid.'">'.$shopName.'</option>';
								}
							?>
						</select>
					</div>		
					<div class="form-group col-md-6">
						<label>Product Name <span class="red_star">*</span></label>
						<input type="text" required name="name" value="<?php echo $pname; ?>" class="form-control" required>
					</div>
					
					 <div class="form-group col-md-3">
						<label>Product Code </label>
						<input type="text" name="code" value="<?php echo $pcode; ?>" class="form-control" autocomplete="off">
					 </div>
					 
					<div class="form-group col-md-3">
						<label>Quantity</label>
						<input type="number" name="quantity" class="form-control" value="<?php echo $pquantity; ?>" autocomplete="off">
					</div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Price</label>
							<input type="text" required name="price" value="<?php echo $pprice; ?>" class="form-control" data-variavel="field1">
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Discount (%)</label>
							<input type="text" name="discount_per" value="<?php echo $pdiscount_per; ?>" class="form-control" data-variavel="field2">
						  </div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Discount </label>
							<input type="text" name="discount" value="<?php echo $pdiscount; ?>" class="form-control" data-formula="#field1# * #field2# / 100">
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >After Discount</label>
							<input type="text" name="discount_price" value="<?php echo $pdiscount_price; ?>" class="form-control" data-formula="#field1# - #field1# * #field2# / 100 "  >
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<label>Wholesale Price </label>
						<input type="text" name="wholesale_price" value="<?php echo $pwholesale_price; ?>" class="form-control" autocomplete="off">
					</div>
					<div class="form-group col-md-3">
						<label>Wholesale Quantity</label>
						<input type="number" name="wholesale_qty" class="form-control" value="<?php echo $pwholesale_qty; ?>" autocomplete="off">
					</div>
					
					<div class="form-group col-md-6">
						<label>Select Tray</label>
						<select name="tray_id" class="form-control">
							<option value=""> Select One </option>
							<?php
							if ($Eggtray = $mysqli->prepare("SELECT id, name, quantity, price from egg_tray ORDER BY id DESC")){
							$Eggtray->execute(); 
							$Eggtray->bind_result($tid, $tname, $tqunentity, $tprice);
							$Eggtray->store_result();}
							while ($Eggtray->fetch()) {
								echo'
								<option '; if ($tray_id == $tid){echo 'selected="selected"';} echo ' value="'.$tid.'">'.$tname.' - '.$tqunentity.' - BDT'.$tprice.'</option>';
								}
							?>
						</select>
					</div>
			
 					<div class="form-group col-md-12">
						<label>Short Description  </label>
						<textarea type="text" name="short_details" rows="5" class="form-control" autocomplete="off"><?php echo $pshort_details; ?></textarea>
					</div>

					<div class="form-group col-md-12">
						<label>Product Details</label>
						<textarea type="text" rows="4" class="form-control" name="full_details" placeholder="Product Details"><?php echo $pfull_details; ?></textarea>      
					</div>
						
					<div class="form-group col-md-12">
						<label> Video (Youtube Embed Code = width:100%; height: 420;) </label>
						<textarea type="text" name="video" rows="3" class="form-control"><?php echo $pvideo; ?></textarea>
                    </div>
					
					<div class="form-group col-md-3"> 
						<label>Color</label>
						<select name="color[]" class="form-control" multiple>
							<?php
							if ($colorAttr = $mysqli->prepare("SELECT id, name from attribute WHERE type ='color' ORDER BY id DESC")){
							$colorAttr->execute(); 
							$colorAttr->bind_result($cid, $colorName);
							$colorAttr->store_result();}
							while ($colorAttr->fetch()) {
								echo'
								<option value="'.$cid.'">'.$colorName.'</option>';
								}
							?>
						</select>
                    </div>
					
					<div class="form-group col-md-3"> 
						<?php
						global $mysqli;
						$colorstm = $mysqli->prepare("SELECT id, attr_id from product_attribute WHERE type= 'color' AND product_id = ? ORDER BY id ASC");
						$colorstm->bind_param('s', $url_string);  
						$colorstm->execute();
						$colorstm->store_result();
						$colorstm->bind_result($clid, $attr_id1);
						
						while ($colorstm->fetch()) {
							
							global $mysqli;
							$stmt = $mysqli->prepare("SELECT name, color FROM attribute where id = '".$attr_id1."' ");
							$stmt->execute();   
							$stmt->store_result();
							$stmt->bind_result($colorName1, $bgColor);
							$stmt->fetch();
							$stmt->close();
							
							echo'
							
							<a class="pcolorb" style="background:'.$bgColor.';" href="apps/products/delete_attribute.php?attri='.$clid.'">'.$colorName1.'</a>';
						}
						?>
					</div>
		
					
					<div class="form-group col-md-3"> 
						<label>Size</label>
						<select name="size[]" class="form-control" multiple>
							<?php
							if ($sizeAttr = $mysqli->prepare("SELECT id, size from attribute WHERE type ='size' ORDER BY id DESC")){
							$sizeAttr->execute(); 
							$sizeAttr->bind_result($sid, $sizeName);
							$sizeAttr->store_result();}
							while ($sizeAttr->fetch()) {
								echo'
								<option value="'.$sid.'">'.$sizeName.'</option>';
								}
							?>
						</select>
                    </div>
					
					<div class="form-group col-md-3"> 
						<?php
						global $mysqli;
						$sizStm = $mysqli->prepare("SELECT id, attr_id from product_attribute WHERE type= 'size' AND product_id = ? ORDER BY id ASC");
						$sizStm->bind_param('s', $url_string);  
						$sizStm->execute();
						$sizStm->store_result();
						$sizStm->bind_result($slid, $attr_id2);
						
						while ($sizStm->fetch()) {
							
							global $mysqli;
							$stmt_more = $mysqli->prepare("SELECT size FROM attribute where id = '".$attr_id2."' ");
							$stmt_more->execute();   
							$stmt_more->store_result();
							$stmt_more->bind_result($sizeName1);
							$stmt_more->fetch();
							$stmt_more->close();
							
							echo'
							
							<a class="pcolorb" href="apps/products/delete_attribute.php?attri='.$slid.'">'.$sizeName1.'</a>';
						}
						?>
					</div>
					
					<div class="form-group col-md-12"> </div>
					
					<div class="form-group col-md-4"> 
						<label>Top Product <span class="red_star">*</span></label>
					    <label><input type="radio" <?php if($ptop_pro == 1 ) echo 'checked' ?> name="top_pro" value="1" />Yes</label>
						<label><input type="radio" <?php if($ptop_pro == 0 ) echo 'checked' ?> name="top_pro" value="0" />No</label>
                    </div>
					<div class="form-group col-md-4"> 
						<label>Popular Product <span class="red_star">*</span></label>
					    <label><input type="radio" <?php if($ppopular == 1 ) echo 'checked' ?> name="popular" value="1" />Yes</label>
						<label><input type="radio" <?php if($ppopular == 0 ) echo 'checked' ?> name="popular" value="0" />No</label>
                    </div>
					<div class="form-group col-md-4"> 
						<label>Activition <span class="red_star">*</span></label>
					    <label><input type="radio" <?php if($pactivity == 1 )  { echo "checked='checked'"; } ?> name="activity" value="1" />Yes</label>
						<label><input type="radio" <?php if($pactivity == 0 )  { echo "checked='checked'"; } ?> name="activity" value="0"/>No</label>
                    </div>
		
					<div class="form-group col-md-12">
						<div class="box-footer button-demo">
							<button class="ladda-button" type="submit" data-color="green" data-style="expand-right" data-size="l">Save Data</button>
						</div>
					</div>
				</div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>


<script>
$(document).ready(function(){
$("select#category").change(function(){
	var category_id =  $("select#category option:selected").attr('value'); 
	$("#subCategory").html( "" );
	if (category_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "apps/products/showSubcategory.php",
			data: "category_id="+category_id,
			cache: false,
			success: function(html) {    
				$("#subCategory").html( html );
			}
		});
	} 
});
});
</script>


<!-- Price Calculation -->   
<script src="js/jquery.formula.js"></script>
<!-- CK Editor -->
<script src="ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('full_details');
    $(".textarea").wysihtml5();
  });
</script>

<!-- View Gallery Photo -->
<script language="javascript" type="text/javascript">
window.onload = function () {
    var fileUpload = document.getElementById("fileupload");
    fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = document.getElementById("dvPreview");
            dvPreview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.webp|.bmp)$/;
            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "100";
                        img.width = "100";
                        img.src = e.target.result;
                        dvPreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
};
</script>
<link rel="stylesheet" href="dist/ladda.min.css">