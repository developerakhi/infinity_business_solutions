<!DOCTYPE html>
<?php
global $mysqli;
$websiteIn = $mysqli->prepare("SELECT id, name, admin FROM website_setting WHERE id = 1");
$websiteIn->execute();   
$websiteIn->store_result();
$websiteIn->bind_result($id, $webname, $adminurl);
$websiteIn->fetch();
$websiteIn->close();
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<BASE href="<?php echo $adminurl; ?>">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo/favicon.png">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes_data/header_part.php'; ?>

<?php include 'includes_data/left-bar.php'; ?>
