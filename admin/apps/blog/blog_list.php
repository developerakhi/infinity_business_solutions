<?php
require_once("apps/initialize.php"); 
$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
$country_id = filter_input(INPUT_POST, 'country_id', FILTER_SANITIZE_STRING);
$visa_type = filter_input(INPUT_POST, 'visa_type', FILTER_SANITIZE_STRING);
$agent_id = filter_input(INPUT_POST, 'agent_id', FILTER_SANITIZE_STRING);
$package_type = filter_input(INPUT_POST, 'package_type', FILTER_SANITIZE_STRING);
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
           url: "apps/blog/loadBlog.php",
		   data:{
		   search: '<?php echo $search; ?>',
		   country_id: '<?php echo $country_id; ?>',
		   visa_type: '<?php echo $visa_type; ?>',
		   package_type: '<?php echo $package_type; ?>',
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
<title>MRKBD-Blog</title>
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<a href="add_blog" class="mtn15 btn btn-lg btn-success btn-raised btn-label" ><i class="fa fa-plus"></i> Add Blog<div class="ripple-container"></div></a>
					</div>
					<form action="" method="POST">
						<div class="form-group col-md-3">
							<label>Search Blog</label>
							<input type="text" name="search" placeholder="<?php if ($search == NULL) {?>Name / Title <?php }else{ ?> <?php echo $search; ?> <?php }?>" class="form-control" required>  
							<button class="srcbtn" type="submit"> <i class="fa fa-search"></i> </button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Blog List</h3>
							</div>
							<div id="loading"></div>
							<div id="pageData"></div> 
                        </div>
      			    </div>
     			</div>
			</div>
		</div>
    </section>
 </div>  
          