<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/general_stm.php");
$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
$cat_id = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
$url_string_id = urlencode($cat_id);

global $mysqli;
$categorystm = $mysqli->prepare("SELECT id, name, photo, link, menushow FROM categories WHERE id = ? LIMIT 1");
$categorystm->bind_param('s', $url_string_id); 
$categorystm->execute();    
$categorystm->store_result();
$categorystm->bind_result($id, $categoryName, $catPhoto, $cat_link, $menushow);
$categorystm->fetch();
$categorystm->close();
?>
<script type="text/javascript">
$(document).ready(function(){
changePagination('0');    
});
function changePagination(pageId){
     $(".flash").show();
     $(".flash").fadeIn(400).html
        ('Loading <img src="dist/img/ajax-loader.gif" />');
     var dataString = 'pageId='+ pageId;
     $.ajax({
           type: "POST",
           url: "apps/category/load_category.php",
           data:{
		   search: '<?php echo $search; ?>',
           pageId: pageId
			},
           cache: false,
           success: function(result){
           $(".flash").hide();
                 $("#pageData").html(result);
           }
      });

}
</script>

<title>Category List</title>
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <!-- left column -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-xs-8">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Category List</h3>
								<form action="" method="POST" class="counntrysrc">
									<input type="text" name="search" placeholder="<?php if ($search == NULL) {?>Search Category & Press Enter<?php }else{ ?><?php echo $search; ?> <?php }?>" class="form-control" required>  
								</form>
							</div>
							<div id="loading" ></div>
							<div id="pageData"></div> 
						</div>
      			    </div>
					<?php if ($url_string_id == NULL) {?>
					<div class="col-xs-4">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Add Category</h3>
							</div>
							<form action="apps/category/category_insert_code.php" enctype="multipart/form-data" method="POST">
								<div class="box-body">
									<div class="col-md-12">
										<label>Photo</label>
										<input type="file" name="photo"class="btn btn-default btn-file" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
										<img class="caticon" id="pic" src="dist/img/example.png"/>
									</div>
									<div class="form-group col-md-12">
										<label>Category Name <span class="red_star">*</span></label>
										<input type="text" required class="form-control" required name="name" placeholder="Category Name">
									</div>
									<div class="form-group col-md-12">
										<label>Category URL </label>
										<input type="text" required class="form-control" name="link" placeholder="URL">
									</div>
									<div class="box-footer button-demo col-md-12">
										 <button class="ladda-button" name="published" data-color="green" data-style="expand-right" data-size="l">Save Data</button>
									 </div>
								</div>
							</form>
						</div>
      			    </div>
					<?php } else {?>
					<div class="col-xs-4">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Update Category</h3>
							</div>
							<form action="apps/category/update_category_code.php" enctype="multipart/form-data"  method="POST">
							 <input type="hidden" name="date" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d h:i:sa"); ?>">
							 <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
							  <div class="box-body">
								<div class="col-md-12">
									<label>Photo</label>
									<input type="file" name="photo"class="btn btn-default btn-file" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
									<input type="hidden" name="photo" value="<?php echo $catPhoto; ?>">
									<?php if ($catPhoto == NULL ) { ?>
										<img class="caticon" id="pic" src="dist/img/example.png"/>
									<?php }else{ ?>
										<img class="caticon" id="pic" src="../images/all/<?php echo $catPhoto; ?>"/>
									<?php } ?>
								</div>
								<div class="form-group col-md-12">
								  <label>Category Name</label>
								  <input type="text" class="form-control" required value="<?php echo $categoryName; ?>" required name="name">
								</div>
								<div class="form-group col-md-12">
								  <label>Category URL</label>
								  <input type="text" class="form-control" value="<?php echo $cat_link; ?>" name="link">
								</div>
								<div class="form-group col-md-12">
								  <label>Show Header Menu</label>
								  <select name="menushow" class="form-control">
										<option <?php if($menushow == 1) { ?> selected <?php } ?> value="1"> Yes </option>
										<option <?php if($menushow == 0) { ?> selected <?php } ?> value="0"> No </option>
								  </select>
								</div>
								<div class="box-footer button-demo">
									<button class="ladda-button" name="published" data-color="green" data-style="expand-right" data-size="l">Save Data</button>
								</div>
							  </div>
							</form>
						</div>
      			    </div>
					<?php } ?>
     			</div>
			</div>
		</div>
    </section>
 </div>
<link rel="stylesheet" href="dist/ladda.min.css"> 
          