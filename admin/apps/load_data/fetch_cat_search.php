<?php
require_once("../functions/functions.php");

?>
<label>Select A Item <span class="red_star">*</span></label>             
<select name="sub_cat" id="product" class='select2 form-control'>
 <option value="">Select A Item</option>
	
<?php global $mysqli;
$country_id = urlencode($_POST["country_id"]);

$stmt = $mysqli->prepare("SELECT id, category, item_name, item_code, color, size  FROM sd_item_l 
  WHERE category = ? 
  ORDER BY id ASC");
$stmt->bind_param('s', $country_id); 
$stmt->execute();
$stmt->bind_result($id, $category, $item_name, $item_code, $color, $size);
while ($stmt->fetch()) {
	echo "<option value='$id'>$item_name, &nbsp; $item_code, &nbsp;$color,&nbsp; $size</option>";
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