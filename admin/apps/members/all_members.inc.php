<?php require_once("apps/initialize.php"); 
$model_no = filter_input(INPUT_POST, 'model_no', FILTER_SANITIZE_STRING);
$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
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
           url: "apps/load_data/load_clients.php",
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

<title>All Customers </title>
	<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Search customer  </h3>
					</div>
				  
					<form action="" enctype="multipart/form-data"  method="POST">
						<div class="box-body" >
							<div class="col-md-10">  
								<div class="form-group">
									<label>Search Name/Mobile/Email</label>
									<input name="search" class='form-control' placeholder="<?php if ($search == NULL) {?>  Search Name/Mobile/Email  <?php }else{ ?> <?php echo $search; ?> <?php }?>"  required>
								</div>
							 </div>
							<div class="col-md-2" style="margin-top: 14px;"> 
								<div class="box-footer button-demo">
								  <button class="btn btn-success pull-right"><i class="fa fa-search"></i> Search</button>
							   </div>	 
							</div>   
					  </div>
					</form>
				</div>
          
				<div class="box box-danger">
					<div class="box-header with-border">
					  <h3 class="box-title">Data List</h3>
					</div>
						<?php 		
						$url_link = isset($_GET['msgID']) ? $_GET['msgID'] : 'nothing_yet';
						$u_link = urlencode($url_link);
						if ($u_link == "success"){
						echo '
						<div class="alert alert-dismissable alert-danger" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
						<i class="fa fa-close"></i>&nbsp; <strong>Delete Successful!</strong>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						</div>
						';
						}
						else{}
						?>
					 <span id="person">
					<div id="loading" ></div>
					<div id="pageData"></div>
				</div>
      		</div>
     	</div>
    </div>
    </div>
</section>
</div>  
<script src="dist/js/select2.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="dist/css/select2.css"/>
<link rel="stylesheet" type="text/css" href="dist/css/select2-bootstrap.css"/>
<script>
  $('.select2').select2({ placeholder : '' });

  $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});

  $('button[data-select2-open]').click(function(){
	$('#' + $(this).data('select2-open')).select2('open');
  });
</script>  