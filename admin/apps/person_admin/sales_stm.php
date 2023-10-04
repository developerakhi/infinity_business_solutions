<?php
class sales_personADD {

public function add_new_person() 
	{
	global $mysqli;
		return '
            <div class="form-group">
                <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                <input type="text" required="required" name="username" id="username" class="form-control" /><br>    
            </div>
            							
				<div class="form-group">
                         <label>Email (Username)</label>
                           <input type="text" required="required" name="email" placeholder="e.g example@stardesignbd.com" class="form-control">
                      </div>
														
                <label for="password"><span class="glyphicon glyphicon-pencil"></span> Password</label>
                <input type="password" required="required" name="password" autocomplete="off" id="password" class="form-control"/><br>
           </div>
            


           <div class="form-group">
                <label for="confirmpwd"><span class="glyphicon glyphicon-pencil"></span>Confirm Password</label>
             <input type="password" name="confirmpwd" required="required" autocomplete="off" id="confirmpwd" class="form-control"/><br>
            </div>
							
							
               		 ';
		}
		
	
}
$sales_mng = new sales_personADD();
?>
