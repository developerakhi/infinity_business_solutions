<?php
require_once("../functions/functions.php");

?>

<label> SubCategory Name<span class="red_star">*</span></label>             
<select name="sub_cat" id="product" class='select2 form-control' required style="border: 0px none;">
 <option value="">Select A SubCategory Name</option>
	
<?php global $mysqli;
$country_id = urlencode($_POST["country_id"]);

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
      $('.select2').select2({ placeholder : '' });

      $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});

      $('button[data-select2-open]').click(function(){
        $('#' + $(this).data('select2-open')).select2('open');
      });
    </script>