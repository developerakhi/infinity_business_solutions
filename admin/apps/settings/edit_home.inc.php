<?php
require_once("apps/initialize.php"); 
include_once(PRIVATE_PATH . "/settings/home_edit_insert_code.php"); 
?>
<title>Home Page Customization</title>
	<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
			<!--<a href="edit_home_step_one" class="btn btn-lg btn-danger btn-raised btn-label"><i class="fa fa-folder-o"></i> &nbsp;Position List</a>-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Home Page Position</h3>
            </div>
             <form action="" enctype="multipart/form-data"  method="POST">
             <input type="hidden" name="date" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d"); ?>">
              <div class="box-body">
                <div class="form-group">
                   <?php 		
					$sanitize = true;
					$cat_name = isset($_GET['ItemID']) ? $_GET['ItemID'] : '';
					$url_string_cat = urlencode($cat_name);
					global $mysqli;
					$stmt_m = $mysqli->prepare("SELECT id, menu, position FROM sd_home_edit
					  WHERE position = ? ");
					$stmt_m->bind_param('s', $url_string_cat);  
					$stmt_m->execute();   
					$stmt_m->store_result();
					$stmt_m->bind_result($id, $menu_id, $position);
					while ($stmt_m->fetch()) {
					?>
					<div class="form-group col-md-3">
						<input name="secID[]" type="hidden" value="<?php echo $id?>" />
						<input name="slID" type="hidden" id="catID" value="<?php echo $url_string_cat; ?>" />
						<label>Category name <span class="red_star">*</span></label>
						<select name="cat[]" class='form-control' required>
								<option value="0">No category selected</option>
								<?php global $mysqli;
                                    $stmt = $mysqli->prepare("SELECT id, name FROM categories 
                                      ORDER BY name ASC");
                                    $stmt->execute();
                                    $stmt->bind_result($m_id, $menu_name);
                                    while ($stmt->fetch()) {
                                    	  echo "<option value='$m_id'";  if (!(strcmp($m_id, $menu_id))) {echo "selected=\"selected\"";} 
                                  	      echo ">$menu_name</option>";
                                    		}
                            		        $stmt->close();?>
                        	            </select>
            			           </div>
								<?php } ?>
	            </div>
				</div>
              <div class="box-footer button-demo">
				<button class="ladda-button" name="published" data-color="green" data-style="expand-right" data-size="l">Save Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  
<link rel="stylesheet" href="dist/ladda.min.css">
