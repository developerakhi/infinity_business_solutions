<?php
require_once("../functions/functions.php");
$category_id = urlencode($_POST["category_id"]);
?>

<div class="form-group col-md-4">
	<label>Sub Category </label>
	<select name="sub_cat" class="form-control">
		<option value="">Select One</option>
		<?php
		if ($subCategory = $mysqli->prepare("SELECT id, name from sub_category WHERE activity = 1 AND category_id = '".$category_id."'
		ORDER BY name ASC ")){
		$subCategory->execute(); 
		$subCategory->bind_result($subId, $subName );
		$subCategory->store_result();}
		while ($subCategory->fetch()) {
			echo'
			<option value="'.$subId.'">'.$subName.'</option>';
		}
		?>
	</select>
</div>	
	
