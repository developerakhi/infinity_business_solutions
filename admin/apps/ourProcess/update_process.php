<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/functions/general_stm.php");

$query_id = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
$url_string = urlencode($query_id);

global $mysqli;
$serviceStm = $mysqli->prepare("SELECT id, title, process_color, description, short_title, photo from our_process
WHERE activity =  1 and id = ".$url_string." ORDER BY id DESC");
$serviceStm->execute();
$serviceStm->bind_result($id, $title, $process_color, $description, $short_title, $photo);
$serviceStm->store_result();
$serviceStm->fetch();
?>
 <title><?php echo $title; ?></title>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
		<a href="all_process" class="btn btn-lg btn-danger btn-raised btn-label" ><i class="fa fa-newspaper-o"></i> Our Process List</a>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $title; ?></h3>
            </div>
            <form action="apps/ourProcess/update_process_code.php" enctype="multipart/form-data" method="POST">
             <input type="hidden" name="id" value="<?php echo $url_string; ?>" class="form-control">
              <div class="box-body">
				<div class="form-group col-md-4">
					<label>Photo  </label> <a class="passportdown" download href="../public/upload/<?php echo $photo; ?>">Download </a>
					<input type="file" class="form-control" name="photo">
					<input type="hidden" name="photo" value="<?php echo $photo; ?>">
				</div>
				<div class="form-group col-md-8">
					<label>Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
				</div>
				<div class="form-group col-md-12">
					<label>Short Title</label>
					<input type="text" class="form-control" name="short_title" value="<?php echo $short_title; ?>">
				</div>
				<div class="form-group col-md-12">
					<label>Description</label>
					<textarea type="text" class="form-control" rows="4" name="description"> <?php echo $description; ?> </textarea>
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
   