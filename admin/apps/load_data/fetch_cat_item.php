<?php
require_once("../functions/functions.php");
 global $mysqli;
$country_id = urlencode($_POST["country_id"]);
 

?>

<label> SubCategory Name </label>             
<select name="sub_cat" id="productf" class='form-control'>
 <option value="">Select SubCategory Name</option>
	
<?php
$stmt = $mysqli->prepare("SELECT sub_menu_id, sub_menu FROM sub_menu 
  WHERE menu_id = ? 
  ORDER BY sub_menu ASC");
$stmt->bind_param('s', $country_id); 
$stmt->execute();
$stmt->bind_result($id, $sub_menu);
while ($stmt->fetch()) {
	echo "<option value='$id'>$sub_menu</option>";
}
$stmt->close();?>
</select>
    
 
<script>
$(document).ready(function(){
$("select#productf").change(function(){

	var country_id =  $("select#productf option:selected").attr('value'); 
// alert(country_id);	
	$("#sub_sub").html( "" );
	if (country_id.length > 0 ) { 
		
	 $.ajax({
			type: "POST",
			url: "apps/load_data/fetch_t_cat.php",
			data: "country_id="+country_id,
			cache: false,
			beforeSend: function () { 
				$('#sub_sub').html('<img src="dist/img/ajax-loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#sub_sub").html( html );
			}
		});
	} 
});
});
</script>    