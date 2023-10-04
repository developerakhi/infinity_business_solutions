<?php
include_once 'psl-config.php';  
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
mysqli_set_charset($mysqli, 'utf8');

date_default_timezone_set('Asia/Dhaka');

?>