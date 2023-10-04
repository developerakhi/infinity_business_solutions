<div class="mobile-menu-holder">
	<div class="modal-menu-container">
		<div class="exit-mobile"> <span class="icon-bar1"></span> <span class="icon-bar2"></span></div>
		<ul class="menu-mobile">
			
			<li class="menu-item menu-item-has-children">
				<a href="<?php echo $weburl; ?>">Services</a>
				<ul class="sub-menu">
					<?php 
					global $mysqli;
					$servMenu = $mysqli->prepare("SELECT id, title from services WHERE activity	= 1 ORDER BY id ASC");
					$servMenu->execute();   
					$servMenu->bind_result($sid, $sName);
					$servMenu->store_result();
						while ($servMenu->fetch()) { 
						$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $sName));
					?>
						<li class="menu-item"><a href="<?php echo $weburl; ?>service/<?php echo $sid ?>/<?php echo $slug ?>"> <?php echo $sName; ?></a></li>
					<?php }$servMenu->close();?>					
				</ul>
			</li>
			<li class="menu-item"><a href="<?php echo $weburl; ?>ourprocess">Our Process</a></li>
			<!--<li class="menu-item"><a href="<?php echo $weburl; ?>blogs"> Blog</a></li>-->
			<li class="menu-item"><a href="<?php echo $weburl; ?>about"> About</a></li>
			<li class="menu-item"><a href="<?php echo $weburl; ?>carrer"> Careers</a></li>
			<li class="menu-item"><a href="<?php echo $weburl; ?>contactus"> Contact</a></li>
		</ul>
	</div>
</div>
<header id="header-bar" class="header-1">
	<div class="container">
		<div class="header-wrap">
			<div class="logo logo-2"><a href="<?php echo $weburl; ?>"><img class="img-fluid" src="<?php echo $weburl; ?>public/upload/<?php echo $webLogo; ?>" alt=""></a></div>
			<div class="nav-holder nav-holder-1">
				<ul class="menu-nav  menu-nav-1">
				
				<li class="menu-item menu-item-has-children">
					<a href="#">Services</a>
					<ul class="sub-menu">
						<?php 
						global $mysqli;
						$servMenu = $mysqli->prepare("SELECT id, title from services WHERE activity	= 1 ORDER BY id ASC");
						$servMenu->execute();   
						$servMenu->bind_result($sid, $sName);
						$servMenu->store_result();
							while ($servMenu->fetch()) { 
							$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $sName));
						?> 
						<li class="menu-item"><a href="<?php echo $weburl; ?>service/<?php echo $sid ?>/<?php echo $slug ?>"> <?php echo $sName; ?></a></li>
						<?php }$servMenu->close();?>
					</ul>
				</li>
				<li class="menu-item"><a href="<?php echo $weburl; ?>ourprocess">Our Process</a></li>
				<li class="menu-item"><a href="<?php echo $weburl; ?>about">About</a></li>
				<li class="menu-item"><a href="<?php echo $weburl; ?>carrer">Careers</a></li>
				<li class="menu-item"><a class="component-wrap" style="color: #fff;" href="<?php echo $weburl; ?>contactus">Contact</a></li>
			</ul>
			</div>
			<div class="nav-button-holder"> <button type="button" class="nav-button"> <span class="icon-bar"></span> </button></div>
		</div>
	</div>
</header>
		
		

		