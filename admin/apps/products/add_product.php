<?php	
ob_start();
include_once 'apps/functions/functions.php'; 
include_once(PRIVATE_PATH . "/functions/general_stm.php");
$user_id = $_SESSION['user_id'];
?>
<title>Add Product</title>
<div class="content-wrapper">
   <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
			<a href="all_product" class="btn btn-lg btn-danger btn-raised btn-label" ><i class="fa fa-th-list"></i> &nbsp;All Product</a>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add Product</h3>
				</div>
				<?php 		
				$url_link = isset($_GET['msgID']) ? $_GET['msgID'] : 'nothing_yet';
				$u_link = urlencode($url_link);
				if ($u_link == "success"){
				echo '<div class="alert alert-dismissable alert-success" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
				<i class="fa fa-check"></i>&nbsp; Data Successfully Inserted
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				</div>';
				}
				else{}
				?>
            <form action="apps/products/productInsertCode.php" enctype="multipart/form-data"  method="POST">
				<input type="hidden" name="date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
				<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id; ?>">
				<div class="box-body">
					<div class="col-md-4">
						<label>Thumbnail Photo</label>
						<input type="file" name="photo"class="btn btn-default btn-file" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
						<img class="exampleb" id="pic" src="dist/img/example.png"/>
					</div>
					<div class="col-md-8">
						<label>Gallery Photos</label>
						<input type="file" id="fileupload" name="multi_photos[]" class="btn btn-default btn-file" multiple  accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" >
						<div class="col-md-12" id="dvPreview"><img class="exampleb" src="dist/img/example.png"/></div>
					</div>
					
					<div class="form-group col-md-4">
						<label>Category Name <span class="red_star">*</span></label>
						<select name="category" id="category" class="form-control" required>
						  <option value="">Select Category</option>
						  <?php
							if ($addMenu = $mysqli->prepare("SELECT id, name from categories ORDER BY name ASC ")){
							$addMenu->execute(); 
							$addMenu->bind_result($mid, $menuName);
							$addMenu->store_result();}
							while ($addMenu->fetch()) {
								echo'
								<option value="'.$mid.'">'.$menuName.'</option>';
								}
							?>
						</select>
					</div>
					
					<div class="form-group col-md-4">
					 <label>Sub Category </label>
						<select name="sub_cat" class="form-control" id="subCategory">
                            <option value="">Select One </option>
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
								<option value="'.$sid.'">'.$shopName.'</option>';
								}
							?>
						</select>
					</div>		
					
					<div class="form-group col-md-6">
						<label>Product Name <span class="red_star">*</span></label>
						<input type="text" required name="name" placeholder="Product Name" class="form-control" required="required">
					</div>
					
					<div class="form-group col-md-3">
						<label>Product Code </label>
						<input type="text" name="code" value="<?php echo mt_rand(1000000,9999999); ?>" class="form-control" autocomplete="off">
					</div>
					 
					<div class="form-group col-md-3">
						<label>Total Quantity</label>
						<input type="number" name="quantity" class="form-control" value="10" autocomplete="off">
					</div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Price</label>
							<input type="text" required name="price" class="form-control" data-variavel="field1">
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Discount (%)</label>
							<input type="text" name="discount_per" class="form-control" data-variavel="field2">
						  </div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >Discount </label>
							<input type="text" name="discount" class="form-control" data-formula="#field1# * #field2# / 100">
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<div class="span4">
							<label >After Discount</label>
							<input type="text" name="discount_price" class="form-control" data-formula="#field1# - #field1# * #field2# / 100 "  >
						</div>
                    </div>
					
					<div class="form-group col-md-3">
						<label>Wholesale Price </label>
						<input type="text" name="wholesale_price" placeholder="Wholesale Price" class="form-control" autocomplete="off">
					</div>
					<div class="form-group col-md-3">
						<label>Wholesale Quantity</label>
						<input type="text" name="wholesale_qty" class="form-control" value="5" autocomplete="off">
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
								<option value="'.$tid.'">'.$tname.' - '.$tqunentity.' - BDT'.$tprice.'</option>';
								}
							?>
						</select>
                    </div>
			
 					<div class="form-group col-md-12">
						<label>Short Description  </label>
						<textarea type="text" name="short_details" rows="5" class="form-control" autocomplete="off"> </textarea>
					</div>

					<div class="form-group col-md-12">
						<label>Product Details</label>
						<textarea type="text" rows="4" class="form-control" name="full_details" placeholder="Product Details">  </textarea>      
					</div>
						
					<div class="form-group col-md-12">
						<label> Video (Youtube Embed Code = width:100%; height: 420;) </label>
						<textarea type="text" name="video" rows="3" class="form-control" > </textarea>
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
					<div class="form-group col-md-12"> </div>
					<div class="form-group col-md-4"> 
						<label>Top Product <span class="red_star">*</span></label>
					    <label><input type="radio" name="top_pro" value="1" />Yes</label>
						<label><input type="radio" name="top_pro" value="0" checked />No</label>
                    </div>
					<div class="form-group col-md-4"> 
						<label>Popular Product <span class="red_star">*</span></label>
					    <label><input type="radio" name="popular" value="1" />Yes</label>
						<label><input type="radio" name="popular" value="0" checked />No</label>
                    </div>
				</div>
				<div class="box-footer button-demo">
					<button class="ladda-button" type="submit" name="submit" data-color="green" data-style="expand-right" data-size="l">Save Data</button>
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
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
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
   
          
