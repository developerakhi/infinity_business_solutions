<?php require_once("apps/initialize.php"); 
$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_STRING);
?>
<script type="text/javascript">
$(document).ready(function(){
changePagination('0');    
});
function changePagination(pageId){
     $(".flash").show();
     $(".flash").fadeIn(400).html
         ('<img src="dist/img/ajax-loader.gif" />');
     var dataString = 'pageId='+ pageId;
     $.ajax({
           type: "POST",
           url: "apps/products/LoadallProducts.php",
           data:{
		  search: '<?php echo $search; ?>',
		  category_id: '<?php echo $category_id; ?>',
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
<title>All Products</title>

<div class="content-wrapper">
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<a href="add_product" class="mtn15 btn btn-lg btn-success" ><i class="fa fa-plus"></i> Add Product</a>
					</div>
					<form action="" method="POST">
						<div class="form-group col-md-4">
							<label>Search Product</label>
							<input type="text" name="search" placeholder="<?php if ($search == NULL) {?>Search Product<?php }else{ ?> <?php echo $search; ?> <?php }?>" class="form-control" required>  
							<button class="srcbtn" type="submit"> <i class="fa fa-search"></i> </button>
						</div>
						<div class="form-group col-md-3">
							<label>Search by Category</label>
							<select name="category_id" class="form-control search_bx" onchange='this.form.submit()'>
								<option value="">Select a Category</option>
								<?php
								if ($stmtCont = $mysqli->prepare("SELECT id, name from categories
								ORDER BY id ASC ")){
								$stmtCont->execute(); 
								$stmtCont->bind_result($mid, $menu_name );
								$stmtCont->store_result();}
								while ($stmtCont->fetch()) {
									echo'
									<option '; if ($mid == $category_id){echo 'selected="selected"';} echo ' value="'.$mid.'">'.$menu_name.'</option>';
								}
								?>
							</select>
						</div>
					</form>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
							<h3 class="box-title">Product List</h3>
							</div>
							<span id="person">
								<div id="loading" ></div>
								<div id="pageData"></div>
								<span class="flash"></span>  
							</span>
                        </div>
      			    </div>
     			</div>
           </div>
		</div>
    </section>
 </div> 

    
          
