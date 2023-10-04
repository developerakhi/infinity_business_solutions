<?php
require_once("apps/initialize.php"); 
$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
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
           url: "apps/services/loadServices.php",
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
<title>Services List</title>
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<a href="add_service" class="mtn15 btn btn-lg btn-success btn-raised btn-label" ><i class="fa fa-plus"></i> Add Services<div class="ripple-container"></div></a>
					</div>
					<form action="" method="POST">
						<div class="form-group col-md-3">
							<label>Search Service</label>
							<input type="text" name="search" placeholder="<?php if ($search == NULL) {?>Service Title <?php }else{ ?> <?php echo $search; ?> <?php }?>" class="form-control" required>  
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
								<h3 class="box-title">Service List</h3>
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
