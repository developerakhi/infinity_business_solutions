<?php
require_once("../functions/functions.php");

?>

<label> Third Sub Menu Name </label>             
<select name="sub_sub_cat" id="product3" class='form-control' >
 <option value="">Select A Sub Sub Menu Name</option>
	
<?php global $mysqli;
$country_id = urlencode($_POST["country_id"]);

$stmt = $mysqli->prepare("SELECT id, sub_menu_id, name from sd_third_sub 
  WHERE sub_menu_id = ? 
  ORDER BY name ASC");
$stmt->bind_param('s', $country_id); 
$stmt->execute();
$stmt->bind_result($id, $sub_menu_id, $sub_menu);
while ($stmt->fetch()) {
	echo "<option value='$id'>$sub_menu</option>";
}
$stmt->close();?>
</select>
    
