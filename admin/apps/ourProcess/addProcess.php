<title>Add Our Process</title>
<div class="content-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <a href="all_process" class="btn btn-lg btn-danger btn-raised btn-label"><i class="fa fa-newspaper-o" aria-hidden="true"></i> &nbsp; Our Process List </a>
            <div class="box box-primary">
                <div class="box-header with-border">
					<h3 class="box-title">Add Our Process</h3>
				</div>
				<form action="apps/ourProcess/process_insert_code.php" enctype="multipart/form-data"  method="POST">
					  <div class="box-body">
						<div class="form-group col-md-3">
							<label>Photo </label>
							<input type="file" class="form-control" name="photo">
						</div>
						<div class="form-group col-md-9">
							<label>Title <span class="red_star">*</span></label>
							<input type="text" class="form-control" required name="title" placeholder="Title">
						</div>
						<div class="form-group col-md-12">
							<label>Short Title</label>
							<input type="text" class="form-control" name="short_title" placeholder="Short Title">
						</div>
						<div class="form-group col-md-12">
							<label>Description</label>
							<textarea type="text" rows="7" class="form-control" name="description" placeholder="Description">  </textarea>
						</div>
						
						<div class="box-footer button-demo col-md-12">
					        <button   name="submit" class="ladda-button" data-color="green" data-style="expand-right" data-size="l">Save Data</button>
					    </div>
						
					</div>
				</form>
          </div>
        </div>
      </div>
    </section>
  </div>
  

<script src="ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('description');
    $(".textarea").wysihtml5();
  });
</script>

<link rel="stylesheet" href="dist/ladda.min.css">

