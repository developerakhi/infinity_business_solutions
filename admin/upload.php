<?php
if(isset($_FILES['upload']['name']))
{
 $file = $_FILES['upload']['tmp_name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 
 //we want to save the image with timestamp and randomnumber
 $new_image_name = time() . rand(). '.' . $extension;
 chmod('upload', 0777);
 $allowed_extension = array("jpg", "gif", "png");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, 'upload/' . $new_image_name);
  $file_path = ('upload/' . $new_image_name);
  $mobile_file =  ('../m/admin/upload/' . $new_image_name);
  copy ($file_path, $mobile_file);
  $function_number = $_GET['CKEditorFuncNum'];
  $url = 'https://infinitybusinesssolution.org/admin/upload/' . $new_image_name;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}

?>

