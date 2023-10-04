<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/general_stm.php");

$query_id = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
$url_string = urlencode($query_id);

global $mysqli;
$pageStm = $mysqli->prepare("SELECT id, title, description, photo from pages
WHERE activity =  1 and id = ".$url_string." ORDER BY id DESC");
$pageStm->execute();
$pageStm->bind_result($pid, $ptitle, $pdescription, $pphoto);
$pageStm->store_result();
$pageStm->fetch();
?>
 <title><?php echo $ptitle; ?></title>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
		<a href="all_pages" class="btn btn-lg btn-danger btn-raised btn-label" ><i class="fa fa-newspaper-o"></i> Page List</a>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $ptitle; ?></h3>
            </div>
            <form action="apps/pages/update_code.php" enctype="multipart/form-data" method="POST">
             <input type="hidden" name="id" value="<?php echo $url_string; ?>" class="form-control">
              <div class="box-body">
				<div class="form-group col-md-4">
					<label>Photo  </label> <a class="passportdown" download href="../public/upload/<?php echo $pphoto; ?>">Download </a>
					<input type="file" class="form-control" name="photo">
					<input type="hidden" name="photo" value="<?php echo $pphoto; ?>">
				</div>
				<div class="form-group col-md-8">
					<label>Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo $ptitle; ?>">
				</div>
				
				<div class="form-group col-md-12">
					<label>Description</label>
					<textarea type="text" class="form-control" rows="4" name="description"> <?php echo $pdescription; ?> </textarea>
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


<link rel="stylesheet" href="dist/ladda.min.css">
 <script src="ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('description');
    $(".textarea").wysihtml5();
  });
</script>   
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: 'https://infinitybusinesssolution.org/admin/upload.php',
        filebrowserUploadMethod: 'form'
    });
</script> 
   