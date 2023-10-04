<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/general_stm.php");

$query_id = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
$url_string = urlencode($query_id);

global $mysqli;
$appointment = $mysqli->prepare("SELECT id, title, name, short_title, photo, description from blog
WHERE activity =  1 and id = ".$url_string." ORDER BY id DESC");
$appointment->execute();
$appointment->bind_result($bid, $btitle, $bname, $short_title, $bphoto, $bdescription);
$appointment->store_result();
$appointment->fetch();
?>
 <title><?php echo $btitle; ?></title>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
		<a href="blog" class="btn btn-lg btn-danger btn-raised btn-label" ><i class="fa fa-newspaper-o"></i> Blog List</a>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $btitle; ?></h3>
            </div>
            <form action="apps/blog/update_blog_code.php" enctype="multipart/form-data" method="POST">
             <input type="hidden" name="id" value="<?php echo $url_string; ?>" class="form-control">
              <div class="box-body">
				<div class="form-group col-md-4">
					<label>Photo  </label> <a class="passportdown" download href="../public/upload/<?php echo $bphoto; ?>">Download </a>
					<input type="file" class="form-control" name="photo">
					<input type="hidden" name="photo" value="<?php echo $bphoto; ?>">
				</div>
				<div class="form-group col-md-5">
					<label>Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo $btitle; ?>">
				</div>
				
				<div class="form-group col-md-3">
					<label>Name</label>
					<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $bname; ?>">
				</div>
				
				<div class="form-group col-md-12">
					<label>Short Title</label>
					<input type="text" class="form-control" name="short_title" value="<?php echo $short_title; ?>">
				</div>
			
				<div class="form-group col-md-12">
					<label>Description</label>
					<textarea type="text" class="form-control" rows="4" name="description"> <?php echo $bdescription; ?> </textarea>
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
   