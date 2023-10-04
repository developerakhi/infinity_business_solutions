<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/general_stm.php");
$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
$cat_id = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
$url_string_id = urlencode($cat_id);

global $mysqli;
$sliderStm = $mysqli->prepare("SELECT id, name, designation, photo FROM team WHERE id = ? LIMIT 1");
$sliderStm->bind_param('s', $url_string_id); 
$sliderStm->execute();    
$sliderStm->store_result();
$sliderStm->bind_result($id, $team_name, $team_designation, $team_photo);
$sliderStm->fetch();
$sliderStm->close();
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
           url: "apps/team/load_team.php",
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

<title>Team Member</title>
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <!-- left column -->
			<div class="col-md-12">
				<div class="row">
					<div class="col-xs-8">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Team Member</h3>
							</div>
							<div id="loading" ></div>
							<div id="pageData"></div> 
						</div>
      			    </div>
					<?php if ($url_string_id == NULL) {?>
					<div class="col-xs-4">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Add Member</h3>
							</div>
							<form action="apps/team/team_insert_code.php" enctype="multipart/form-data" method="POST">
								<div class="box-body">
									<div class="col-md-12">
										<label>Photo</label>
										<input type="file" name="photo"class="btn btn-default btn-file" required oninput="pic.src=window.URL.createObjectURL(this.files[0])">
										<img class="caticon" id="pic" src="dist/img/example.png"/>
									</div>
									<div class="form-group col-md-12">
										<label>Name</label>
										<input type="text" class="form-control" name="name" placeholder="Name">
									</div>
									<div class="form-group col-md-12">
										<label>Designation</label>
										<input type="text" placeholder="Designation" class="form-control" name="designation">
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
								<h3 class="box-title">Update Member</h3>
							</div>
							<form action="apps/team/update_team_code.php" enctype="multipart/form-data"  method="POST">
							 <input type="hidden" name="date" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d h:i:sa"); ?>">
							 <input type="hidden" name="id" value="<?php echo $url_string_id; ?>" class="form-control">
							  <div class="box-body">
								<div class="col-md-12">
									<label>Photo</label>
									<input type="file" name="photo"class="btn btn-default btn-file" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
									<input type="hidden" name="photo" value="<?php echo $team_photo; ?>">
									<?php if ($team_photo == NULL ) { ?>
										<img class="caticon" id="pic" src="dist/img/example.png"/>
									<?php }else{ ?>
										<img class="caticon" id="pic" src="../public/upload/<?php echo $team_photo; ?>"/>
									<?php } ?>
								</div>
								<div class="form-group col-md-12">
								  <label>Name</label>
								  <input type="text" class="form-control" value="<?php echo $team_name; ?>" name="name">
								</div>
								<div class="form-group col-md-12">
								  <label>Designation</label>
								  <input type="text" class="form-control" value="<?php echo $team_designation; ?>" name="designation">
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
          