<?php require_once("apps/initialize.php"); 
		$cat_name = isset($_GET['actionID']) ? $_GET['actionID'] : '';
		$url_string_cat = urlencode($cat_name);

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
           url: "apps/pages/loadPages.php",
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
<title>All Pages</title>
  <div class="content-wrapper">
    <section class="content-header">
		<h1>All Pages</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
					  <h3 class="box-title">Data List</h3>
					</div>
					<span id="person"> </span>
					<div id="loading" ></div>
					<div id="pageData"></div>
                </div>
			</div>
        </div>
    </section>
  </div>  
