<?php
// Put all of your general functions in this file
class inc_classes {
    
  public function setProperty($headery)
  {
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/inc_classes_files/".$this->headery."");
  }
 
  public function ftr($footerly)
  {
	$this->footer = $footerly;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/functions/".$this->footer."");
  }
  
    public function ccenter($center)
  {
	$this->center = $center;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/inc_classes_files/".$this->center."");
  }
 
}

$obj = new inc_classes();
// Header Value
$obj->setProperty("common_head.inc.php");

// Center Value
$obj->ccenter("center.inc.php");

// Footer Value
$obj->ftr("hre-config.inc.php");

unset($obj);

?>
