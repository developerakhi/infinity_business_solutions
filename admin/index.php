<?php 
require_once("apps/functions/functions.php");
sec_session_start(); 

if(login_check($mysqli) == true) {
	
               header("Location:dashboard");
            } 
            else { 
                    header("Location:login.php");
            }
        return ;
          
?>