<?php include("sanitizing_urls.php"); ?> 
 
 <aside class="main-sidebar">
    <section class="sidebar">
  
    <ul class="sidebar-menu">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
	
        <li class="treeview <?php echo $active1; ?>">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Categories</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li <?php echo $active1_1; ?>><a href="categories"><i class="fa fa-th-list"></i>  All Category</a></li>
           </ul>
        </li>
		<li class="treeview <?php echo $msg21; ?>">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Services</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li <?php echo $msg21_1; ?>><a href="add_service"><i class="fa fa-plus"></i> Add Service</a></li>
            <li <?php echo $msg21_2; ?>><a href="all_services"><i class="fa fa-list"></i> All Services</a></li>
          </ul>
        </li>
        
        <li class="treeview <?php echo $msg21; ?>">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Our Process</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li <?php echo $msg21_1; ?>><a href="add_process"><i class="fa fa-plus"></i> Add Our Process</a></li>
            <li <?php echo $msg21_2; ?>><a href="all_process"><i class="fa fa-list"></i> All Our Process</a></li>
          </ul>
        </li>
        
		<li class="treeview <?php echo $msg55; ?>">
          <a href="blog"><i class="fa fa-newspaper-o"></i> <span>Blog</span></a>
        </li>
		<li class="treeview <?php echo $msgTeam; ?>">
          <a href="#">
            <i class="fa fa-user"></i> <span>Team </span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
			<li <?php echo $msgTeam_1; ?>><a href="team"><i class="fa fa-list"></i> Team List </a></li>
          </ul>
        </li>
		<li class="treeview <?php echo $msg201; ?>">
          <a href="all_pages"><i class="fa fa-newspaper-o"></i> <span>Pages</span></a>
        </li>
        
        <li class="treeview <?php echo $msg55; ?>">
          <a href="all_contactUs"><i class="fa fa-newspaper-o"></i> <span>ContactUs</span></a>
        </li>

        <li class="treeview <?php echo $msg55; ?>">
          <a href="all_career"><i class="carrer_icon fa fa-briefcase"></i> <span>Career</span></a>
        </li>
        
		<li class="treeview <?php echo $msgsld; ?>">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>Slide </span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
			<li <?php echo $msgsld_1; ?>><a href="slider"><i class="fa fa-list"></i> All Slide </a></li>
          </ul>
        </li>
        <li class="treeview <?php echo $msgWS; ?>">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Settings</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
			<li <?php echo $msgWS_1; ?>><a href="website_setting"><i class="fa fa-cog"></i>Website Settings</a></li>
          </ul>
        </li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>