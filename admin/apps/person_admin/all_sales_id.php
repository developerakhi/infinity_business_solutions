<?php require_once("apps/initialize.php"); ?>
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
           url: "apps/load_data/load_sales_id.php",
           data:{
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

  <title>View All Sales Person</title>
  <div class="content-wrapper">
  
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
      <a href="add_new_person" class="btn btn-lg btn-success  btn-raised btn-label"><i class="fa fa-pencil-square-o"></i>&nbsp; Add New Sales Person<div class="ripple-container"></div></a>
          <p>
          
          <div class="row">
          
        <div class="col-xs-12">
        
        
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data List</h3>

              <div class="box-tools">
                                
               
              </div>
            </div>
            <!-- /.box-header -->
            
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
           
          	  <div class="box-footer clearfix">
             <span class="flash"></span>  
          
            </div>
                             <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
      				  </div>
     			 </div>
           </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>  
       